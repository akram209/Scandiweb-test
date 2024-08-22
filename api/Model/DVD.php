<?php

namespace Api\Model;

use Api\Abstract\SpecialProperity;
use Api\Core\Database;
use PDO;

class DVD extends SpecialProperity
{
    private $conn;
    private $sku;

    private $table = 'dvds';

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    // public function getAll()
    // {
    //     $query = "SELECT * FROM $this->table";
    //     $stmt = $this->conn->prepare($query);
    //     $stmt->execute();

    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }

    // Other CRUD methods (create, update, delete) can be added here
    public function setBySku($sku)
    {
        $this->sku = $sku;
        $sql = 'SELECT * FROM products WHERE sku = :sku';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['sku' => $this->sku]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            // i can get the id by the lastInsertId but i work on the worst case scenario
            $insert = 'INSERT INTO ' . $this->table . ' (id, size_mb) VALUES (:id, :size_mb)';
            $stmt = $this->conn->prepare($insert);
            $stmt->execute(['id' => $row['id'], 'size_mb' => $_POST['size_mb']]);
        }
    }
}
