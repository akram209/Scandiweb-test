<?php

namespace Api\Core;

use PDO;
use PDOException;

class Database
{
    private static $sql;

    // Private constructor to prevent multiple instances
    private function __construct() {}

    public static function getConnection()
    {
        if (self::$sql === null) {
            try {
                $dsn = "mysql:host=localhost;port=3306;dbname=products";
                $username = "root";
                $password = 'akram209';

                // Create a new PDO instance
                self::$sql = new PDO($dsn, $username, $password);
                self::$sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                // Handle PDO-specific exceptions
                echo "Connection failed: " . $e->getMessage();
                exit; // Stop further execution if the connection fails
            }
        }

        return self::$sql;
    }
}
