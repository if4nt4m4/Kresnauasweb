<?php
include "koneksi.php";
$db = new database();
?>
<!DOCTYPE html>
<html>

<head>
    <title> LOGIN -Selamat Datang- </title>
	<link rel="icon" type="png/jpg" href="gambar/icon.png" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="logo">
        <img src="gambar/icon.png" alt="logo">
    </div>
    <div class="container">
        <div class="form-container">
            <h2>Login</h2>
            <form method="POST" action="proses_login.php">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Login" name="Login">
                </div>
                <div class="button">
                    <h4>Sudah punya akun?
                        <a href="Signup.php">Sign Up</a>
                    </h4>
                </div>
            </form>
        </div>
    </div>
    </div>
</body>

</html>