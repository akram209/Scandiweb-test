<?php

namespace Api\Model;

use Api\Core\Database;
use PDO;

class Product
{
    private $conn;

    private $table = 'products';

    public function __construct()
    {
        $this->conn = (new Database())->getConnection();
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

    // Other CRUD methods (create, update, delete) can be added here
}
