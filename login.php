<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - KOSIIDIN Food</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Gunakan style yang sama dengan register */
        body { display: flex; justify-content: center; align-items: center; min-height: 100vh; background-color: rgb(253, 201, 133); }
        .form-container { background: white; padding: 40px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
        .form-container h2 { text-align: center; margin-bottom: 20px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; }
        .form-group input { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; }
        .form-container button { width: 100%; padding: 12px; background: #ff511c; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; }
        .form-container p { text-align: center; margin-top: 15px; }
        .form-container a { color: #ff511c; text-decoration: none; }
        .error-message { color: red; text-align: center; margin-bottom: 15px;}
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Login Akun</h2>
        <?php
            if (isset($_GET['error'])) {
                echo '<p class="error-message">' . htmlspecialchars($_GET['error']) . '</p>';
            }
        ?>
        <form action="php/process_login.php" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
    </div>
</body>
</html>