<?php

class Auth
{
    // Start session if not started
    public static function init()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Login function
    public static function login($username, $password)
    {
        self::init();
        require_once __DIR__ . '/../utils/dbConnection.util.php'; // adjust path if needed
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

    // Get current user
    public static function user()
    {
        self::init();
        return $_SESSION['user'] ?? null;
    }

    // Check if user is logged in
    public static function check()
    {
        self::init();
        return isset($_SESSION['user']);
    }

    // Logout
    public static function logout()
    {
        self::init();
        session_unset();
        session_destroy();
    }
}
