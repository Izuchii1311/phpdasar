<?php

    // 5. Cek Apakah tidak ada data di $_GET
        // Function Isset -- dibuat $_GET sebanyak data di Variabelnya agar user tidak dapat mencoba memasukkan data secara manual melalui url
    if (!isset($_GET["nama"]) || 
        !isset($_GET["npm"]) ||
        !isset($_GET["email"]) ||
        !isset($_GET["prodi"]) ||
        !isset($_GET["gambar"])) {
        // redirect
        header("Location: KasusGet.php");
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
    <ul>
        <!-- 4. Tangkap dan Panggil Data Array -->
        <li><img src="img/<?= $_GET["gambar"]; ?>" alt="" width="50" height="50"></li>
        <li><?= $_GET["nama"]; ?></li>
        <li><?= $_GET["npm"]; ?></li>
        <li><?= $_GET["email"]; ?></li>
        <li><?= $_GET["prodi"]; ?></li>
    </ul>

    <a href="KasusGet.php">Kembali</a>
</body>
</html>