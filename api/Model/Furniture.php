<?php

namespace Api\Model;

use Api\Abstract\SpecialProperity;
use Api\Core\Database;
use PDO;

class Furniture extends SpecialProperity
{
    private $conn;
    private $sku;
    private $table = 'furniture';

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
            $insert = 'INSERT INTO ' . $this->table . ' (id, dimensions) VALUES (:id, :dimensions)';
            $stmt = $this->conn->prepare($insert);
            $dimensions = $_POST['height'] . 'x' . $_POST['width'] . 'x' . $_POST['length'];
            $stmt->execute(['id' => $row['id'], 'dimensions' => $dimensions]);
        }
    }
}
