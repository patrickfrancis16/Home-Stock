<?php

namespace AndersonLucas\HomeStock\Config;

use PDO;
use PDOException;

class Database
{

    private static $connection;

    public static function getConnection()
    {
        if (!self::$connection) {
            $host = getenv('DB_HOST');
            $db = getenv('DB_NAME');
            $user = getenv('DB_USER');
            $password = getenv('DB_PASSWORD');

            $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

            try {
                $pdo = new PDO($dsn, $user, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
            } catch (PDOException $e) {
                echo "Erro na conexão: " . $e->getMessage();
            }
        }
        return self::$connection;
    }

    public static function closeConnection()
    {
        self::$connection = null;
    }
}
