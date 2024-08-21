<?php

namespace Api\Model;

use Api\Core\Database;
use PDO;

class Furniture
{
    private $conn;
    private $table = 'furniture';

    public function __construct()
    {
        $this->conn = (new Database())->getConnection();
    }

    // public function getAll()
    // {
    //     $query = "SELECT * FROM $this->table";
    //     $stmt = $this->conn->prepare($query);
    //     $stmt->execute();

    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }

    // Other CRUD methods (create, update, delete) can be added here
}
