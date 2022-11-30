<?php
// Cek apakah tidak ada data di $_GET
if (!isset($_GET["image"]) || !isset($_GET["title"]) || !isset($_GET["genre"]) || !isset($_GET["author"]) || !isset($_GET["studio"])) {                   // Mengecek apakah url pernah dibuka (Jika isset() berarti pernah, namun jika !isset() berarti belum pernah)
    // redirect
    header("Location: getpost.php");            // Lalu header untuk mengarahkan lokasi jika ada pengguna mencoba meloncati url
    exit;                                       // contoh pengguna ingin meloncat ke getpost2.php, dengan menggunakan !isset maka user tidak akan dapat melompatinya tetapi akan terlempar ke getpost.php
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Post 2</title>
</head>

<body>

    <ul>
        <li><img src="" alt=""></li>
        <li><?= $_GET["title"]; ?></li>
        <li><?= $_GET["genre"]; ?></li>
        <li><?= $_GET["author"]; ?></li>
        <li><?= $_GET["studio"]; ?></li>
    </ul>

    <a href="5.getpost.php">Kembali</a>

</body>

</html>