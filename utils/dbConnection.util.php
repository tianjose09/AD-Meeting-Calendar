<?php
require_once UTILS_PATH . '/envSetter.util.php';

class DBConnection {
    private static $pdo;

    public static function getConnection() {
        global $pgConfig;

        if (!self::$pdo) {
            $host = $pgConfig['host'];
            $port = $pgConfig['port'];
            $db   = $pgConfig['db'];
            $user = $pgConfig['user'];
            $pass = $pgConfig['pass'];

            $dsn = "pgsql:host=$host;port=$port;dbname=$db";

            try {
                self::$pdo = new PDO($dsn, $user, $pass, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]);
            } catch (PDOException $e) {
                die("❌ DB Connection failed: " . $e->getMessage());
            }
        }

        return self::$pdo;
    }
}
