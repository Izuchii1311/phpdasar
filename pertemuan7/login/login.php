<?php
    // Cek apakah tombol submit sudah ditekan atau belum
    if (isset ($_POST["submit"])) {

    // Cek username & password
        if ( $_POST["username"] == "Izuchii" && $_POST["password"] == "12345") {
    // Jika benar, redirect ke halaman admin
            header("Location: admin.php");
            exit;
        } else {
    // Jika salah tampilkan pesan kesalahan
            $err = true;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
</head>
<body>
    
    <h1>Login Admin</h1>    

    <!-- Ketika error maka akan tampil ini -->
    <?php if (isset ($err)) : ?>
        <p style="color:red; font-style:italic;">Username / Password salah !</p>
    <?php endif; ?>

    <form action="" method="post">
        <label for="username">Username : </label>
        <input type="text" name="username" id="username">
        <br>
        <label for="password">Password : </label>
        <input type="password" name="password" id="password">
        <br>
        <button type="submit" name="submit">Kirim</button>
    </form>


</body>
</html>