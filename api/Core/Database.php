
<?php

namespace Api\Core;

use PDO;
use PDOException;
use Exception;

class DataBase
{
    private $sql;

    public function __construct()
    {

        try {
            $dns = "mysql:host=localhost;dbname=products";
            $dns = "mysql:host=localhost:3306;dbname=products";
            $username = "root";
            $pass = 'akram209';
            $this->sql = new PDO($dns, $username, $pass);
            $this->sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
        } catch (Exception $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getConnection()
    {
        return $this->sql;
    }
}
