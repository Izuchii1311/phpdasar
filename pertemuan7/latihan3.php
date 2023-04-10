<?php
    // Cek Apakah Tidak Ada Data di $_GET
    if ( !isset ($_GET["nama"]) || !isset ($_GET["npm"]) 
    || !isset ($_GET["email"]) || !isset ($_GET["jurusan"])){
        header ("Location: latihan2.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mahasiswa</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <ul>
        <!-- Menangkap data dari latihan 2 menggunakan $_GET -->
        <li>Nama : <?= $_GET["nama"]; ?></li>
        <li>NPM : <?= $_GET["npm"]; ?></li>
        <li>Email : <?= $_GET["email"]; ?></li>
        <li>Jurusan : <?= $_GET["jurusan"]; ?></li>
    </ul>

    <a href="latihan2.php">Kembali</a>
</body>
</html>