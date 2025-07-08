<?php
require_once __DIR__ . '/../bootstrap.php';
require_once UTILS_PATH . '/auth.util.php';

Auth::init();
if (!Auth::check()) {
    header('Location: /index.php?error=unauthorized');
    exit;
}

$user = Auth::user();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome, <?= htmlspecialchars($user['first_name']) ?>!</h2>
    <p>You are logged in as: <?= htmlspecialchars($user['role']) ?></p>
    <form method="POST" action="/handlers/logout.handler.php">
        <button type="submit">Logout</button>
    </form>
</body>
</html>