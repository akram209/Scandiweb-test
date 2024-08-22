<?php

namespace Api\Model;

use Api\Core\Database;
use Api\Abstract\SpecialProperity;
use PDO;

class Book extends SpecialProperity
{
    private $sku;
    private $conn;
    private $table = 'books';

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function setBySku($sku)
    {
        $this->sku = $sku;
        $sql = 'SELECT * FROM products WHERE sku = :sku';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['sku' => $this->sku]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            // i can get the id by the lastInsertId but i work on the worst case scenario
            $insert = 'INSERT INTO ' . $this->table . ' (id, weight) VALUES (:id, :weight)';
            $stmt = $this->conn->prepare($insert);
            $stmt->execute(['id' => $row['id'], 'weight' => $_POST['weight']]);
        }
    }
}
