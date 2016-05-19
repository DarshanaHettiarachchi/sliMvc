<?php

namespace Core;

use PDO;
use App\Config;

abstract class Model
{
    protected static function getDB()
    {
        static $db = null;

        if ($db === null) {
            $host = 'localhost';
            $dbname = 'mvc';
            $username = 'root';
            $password = 'root';

            $dsn = "mysql:host=" . Config::DB_HOST . ";dbname=" .
                    Config::DB_NAME . ";charset=utf8";

            try {
                $db = new PDO(
                    "mysql:host=$host;dbname=$dbname;charset=utf8",
                    $username,
                    $password
                );
                $db->setAttribute(
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION
                );
                return $db;
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        return $db;
    }
}
