<?php
require_once UTILS_PATH . '/dbConnection.util.php';

class Auth {
    public static function init() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function login($username, $password) {
        self::init();
        $pdo = DBConnection::getConnection();

        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            return true;
        }
        return false;
    }

    public static function user() {
        self::init();
        return $_SESSION['user'] ?? null;
    }

    public static function check() {
        self::init();
        return isset($_SESSION['user']);
    }

    public static function logout() {
        self::init();
        session_unset();
        session_destroy();
    }
}