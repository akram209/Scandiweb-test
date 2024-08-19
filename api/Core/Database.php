<?php

namespace Api\Core;

use PDO;
use PDOException;

class Database
{
    private $sql;

    public function __construct()
    {
        try {
            $dsn = "mysql:host=localhost;port=3306;dbname=products";
            $username = "root";
            $password = 'akram209';
            $this->sql = new PDO($dsn, $username, $password);
            $this->sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Handle the PDO-specific exception
            echo "Connection failed: " . $e->getMessage();
        } catch (PDOException $e) {
            // Handle other exceptions
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getConnection()
    {
        return $this->sql;
    }
}
