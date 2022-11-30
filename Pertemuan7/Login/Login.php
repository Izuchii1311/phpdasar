<?php

    // 3. Check All
    // cek tombol submit sudah pernah ditekan atau belum
    if (isset($_POST["submit"])){
        // Cek Username 
        if( $_POST["username"] == "admin" && $_POST["password"] == "123"){
            // Jika Username dan Pass benar maka pindahkan ke halaman Admin
            header("Location: admin.php");
            exit;
        } else {
            // Jika Salah
            $error = true;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>body{text-align: center;}li{margin: 3px;list-style-type: none;}</style>
</head>
<body>
    
    <!-- 1. Header -->
    <h1>Selamat Datang, !</h1>

    <!-- 4. Check Error -->
    <?php if( isset($error) ) : ?>
        <p style="color: red; font-style: italic;">Username / Password Salah</p>
    <?php endif; ?>

    <!-- 2. Membuat Form Data yang akan dikirimkan dengan menggunakan Metode Request POST -->
    <ul>
        <form action="Admin.php" method="post">
            <li>
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <button type="submit" name="submit">Kirim</button>
            </li>
        </form>
    </ul>
</body>
</html>