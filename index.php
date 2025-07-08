<?php
require_once __DIR__ . '/bootstrap.php';
require_once UTILS_PATH . '/auth.util.php';

Auth::init();

if (Auth::check()) {
    header("Location: /pages/dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body { background: #fff; color: #000; font-family: Arial; }
        .login-container {
            max-width: 400px; margin: 80px auto; padding: 2rem;
            border: 1px solid #000; border-radius: 5px; background: #fff;
        }
        .input, .btn { width: 100%; padding: 10px; margin-top: 10px; }
        .btn { background: #000; color: #fff; border: none; }
        .btn:hover { background-color: #333; }
        .error { color: red; margin-top: 10px; text-align: center; }
    </style>
</head>
<body>
<div class="login-container">
    <h2>Login</h2>
    <form method="POST" action="/handlers/login.handler.php">
        <input type="text" name="username" placeholder="Username" required class="input">
        <input type="password" name="password" placeholder="Password" required class="input">
        <button type="submit" class="btn">Login</button>
        <?php if (isset($_GET['error'])): ?>
            <div class="error"><?php echo htmlspecialchars($_GET['error']); ?></div>
        <?php endif; ?>
    </form>
</div>
</body>
</html>