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

    // Product attributes
    private $sku;
    private $name;
    private $price;
    private $product_type;


    public function __construct($sku = null, $name = null, $price = null, $product_type = null)
    {
        $this->conn = Database::getConnection();
        $this->book = new Book();
        $this->dvd = new Dvd();
        $this->furniture = new Furniture();
        if ($sku) {
            $this->sku = $sku;
            $this->name = $name;
            $this->price = $price;
            $this->product_type = $product_type;
        }
    }



    // Getter and Setter for sku
    public function getSku()
    {
        return $this->sku;
    }

    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    // Getter and Setter for name
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    // Getter and Setter for price
    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    // Getter and Setter for product_type
    public function getProductType()
    {
        return $this->product_type;
    }

    public function setProductType($product_type)
    {
        $this->product_type = $product_type;
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
        $sku = $this->sku;
        $name = $this->name;
        $price = $this->price;
        $product_type = $this->product_type;
        $insert = "INSERT INTO products (sku, name, price, product_type) VALUES (:sku, :name, :price, :product_type)";
        $stmt = $this->conn->prepare($insert);
        $stmt->execute(['sku' => $sku, 'name' => $name, 'price' => $price, 'product_type' => $product_type]);
        $map = ['Book' => $this->book, 'DVD-disc' => $this->dvd, 'Furniture' => $this->furniture];
        $map[$product_type]->setBySku($sku);
        header('Location: ../api/View/ProductList.php');
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
