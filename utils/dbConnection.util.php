<?php

class DBConnection
{
    private static $pdo;

    public static function getConnection()
    {
        if (!self::$pdo) {
            $host = 'localhost';
            $db   = 'your_database';
            $user = 'your_user';
            $pass = 'your_password';
            $charset = 'utf8mb4';

            $dsn = "pgsql:host=$host;dbname=$db;options='--client_encoding=$charset'";
            try {
                self::$pdo = new PDO($dsn, $user, $pass, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]);
            } catch (PDOException $e) {
                die('DB Connection failed: ' . $e->getMessage());
            }
        }

        return self::$pdo;
    }
}
