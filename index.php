<?php
// index.php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <style>
        body {
            background: #ffffff;
            color: #000000;
            font-family: Arial, sans-serif;
        }

        .login-container {
            max-width: 400px;
            margin: 80px auto;
            padding: 2rem;
            border: 1px solid #000;
            border-radius: 5px;
            background: #fff;
        }

        h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .input {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 20px;
            border: 1px solid #000;
            border-radius: 3px;
            font-size: 16px;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #000;
            color: #fff;
            border: none;
            border-radius: 3px;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #333;
        }

        .error {
            color: red;
            margin-top: 10px;
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Login</h2>

        <!-- ✅ Ensure this points to your login handler -->
        <form method="POST" action="/handlers/login.handler.php">
            <input type="hidden" name="action" value="login" />
            
            <input 
                type="text" 
                id="username" 
                name="username" 
                placeholder="Username" 
                required 
                class="input" 
            />

            <input 
                type="password" 
                id="password" 
                name="password" 
                placeholder="Password" 
                required 
                class="input"
            />

            <button type="submit" class="btn">Login</button>

            <?php if (isset($_GET['error'])): ?>
                <div class="error"><?php echo htmlspecialchars($_GET['error']); ?></div>
            <?php endif; ?>
        </form>
    </div>

</body>
</html>
