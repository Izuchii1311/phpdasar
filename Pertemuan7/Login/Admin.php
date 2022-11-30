<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <style>body{text-align: center;}</style>
</head>
<body>
    
    <!-- 5.Panggil Username yang dikirimkan -->
    <h1>Selamat Datang, <?= $_POST["username"] ?>!</h1>

    <a href="Login.php">Logout</a>

</body>
</html>