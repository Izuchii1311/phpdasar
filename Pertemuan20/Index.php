<?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: Login.php");
    }
    
    require "Functions.php";


    $mahasiswa = query ("SELECT * FROM mahasiswa");

    if( isset($_POST["search"]) ){
        $mahasiswa = search($_POST["keyword"]);
    }
?>  


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>body{text-align: center; position: relative;} table{margin-left: 18%;}.loader{width: 20px; position: absolute; display: none;}</style>
</head>
<body>
    
    <h1>Daftar Mahasiswa</h1>
    
    <a href="Tambah.php">Tambah Data Mahasiwa</a><br><br>

    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan Keyword Pencarian..." autocomplete="off" id="keyword">
        <button type="submit" name="search" id="tombol-cari">Search</button>

        <!-- 3. Download loader dan panggil loader beri style untuk loader-->
        <img src="img/Gif/Load.gif" alt="" class="loader">
    </form>

    <br>

    <div id="container">
        <table border="1" cellpadding="10" cellspacing="0">

            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>NPM</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>

            <?php $i=1; ?>
            <?php foreach($mahasiswa as $mhs) : ?>
            <tr>    
                <td><?= $i; ?></td>
                <td><?= $mhs["nama"]; ?></td>
                <td><?= $mhs["npm"]; ?></td>
                <td><?= $mhs["email"]; ?></td>
                <td><?= $mhs["jurusan"]; ?></td>
                <td><img src="img/<?= $mhs["gambar"]; ?>" alt="" width="50px" height="70px"></td>
                <td>
                    <a href="Update.php?id=<?= $mhs["id"]?>">EDIT</a>
                    || 
                    <a href="Hapus.php?id=<?= $mhs["id"]?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');">DELETE</a>
                </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>

        </table>
    </div>
    <br><br><a href="Logout.php">Logout</a><br><br>

    <!-- 1. Include JQuery -->
    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>