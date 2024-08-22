<?php

namespace Api\Model;

use Api\Core\Database;
use PDO;

class Product
{
    private $conn;
    private Book $book;
    private Dvd $dvd;
    private Furniture $furniture;

    private $table = 'products';


    public function __construct()
    {
        $this->conn = Database::getConnection();
        $this->book = new Book();
        $this->dvd = new Dvd();
        $this->furniture = new Furniture();
    }

    public function getAll()
    {
        // this query is complex and can be improved but this what we sacrifice to normalize the database
        $query = "SELECT 
    p.id, 
    p.sku, 
    p.name, 
    p.price, 
    p.product_type,
    CASE
        WHEN f.dimensions IS NOT NULL THEN CONCAT('Dimensions: ', f.dimensions)
        WHEN d.size_mb IS NOT NULL THEN CONCAT('Size MB: ', d.size_mb)
        WHEN b.weight IS NOT NULL THEN CONCAT('Weight: ', b.weight)
        ELSE 'No property available'
    END AS property
FROM 
    products p
LEFT JOIN 
    books b ON p.id = b.id 
LEFT JOIN 
    dvds d ON p.id = d.id 
LEFT JOIN 
    furniture f ON p.id = f.id  ;

";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function store()
    {
        $sku = $_POST['sku'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $product_type = $_POST['product_type'];
        $insert = "INSERT INTO products (sku, name, price, product_type) VALUES (:sku, :name, :price, :product_type)";
        var_dump($this->conn);
        $stmt = $this->conn->prepare($insert);
        $stmt->execute(['sku' => $sku, 'name' => $name, 'price' => $price, 'product_type' => $product_type]);
        switch ($product_type) {
            case 'DVD-disc':
                $this->dvd->setBySku($sku);
                header('Location: ../api/View/ProductList.php');
                break;
            case 'Book':
                $this->book->setBySku($sku);
                header('Location: ../api/View/ProductList.php');
                break;
            case 'Furniture':
                $this->furniture->setBySku($sku);
                header('Location: ../api/View/ProductList.php');
                break;
        }
    }

    public function delete()
    {
        $ids = $_POST['product'];

        foreach ($ids as $id) {
            $delete = "DELETE FROM products WHERE id = :id";
            $stmt = $this->conn->prepare($delete);
            $stmt->execute(['id' => $id]);
        }
        header('Location: ../api/View/ProductList.php');
    }

    // Other CRUD methods (create, update, delete) can be added here
}
