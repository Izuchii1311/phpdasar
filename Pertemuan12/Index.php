<?php
    require "Functions.php";
    $mahasiswa = query ("SELECT * FROM mahasiswa");

    // 2. Logic Search
    // ketika tombol cari diketik maka akan timpa data dari $mahasiswa
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
    <style>body{text-align: center;} table{margin-left: 18%;}</style>
</head>
<body>
    
    <h1>Daftar Mahasiswa</h1>
    
    <a href="Tambah.php">Tambah Data Mahasiwa</a><br><br>

    <!-- 1. Membuat Form Pencarian -->
    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan Keyword Pencarian..." autocomplete="off">
        <button type="submit" name="search">Search</button>
    </form>
    <br>

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
                <!-- 2. Menghubungkan ke halaman Update.php -->
                <a href="Update.php?id=<?= $mhs["id"]?>">EDIT</a>
                || 
                <a href="Hapus.php?id=<?= $mhs["id"]?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');">DELETE</a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>

    </table>

</body>
</html>