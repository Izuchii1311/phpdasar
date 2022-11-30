<?php
    // 3. Menghubungkan dengan halaman Functions.php
    require "Functions.php";

    // 4. Membuat function dengan nama query dan memanggil isinya mau apa
    // 6. Memasukkan ke dalam variabel mahasiswa
    $mahasiswa = query ("SELECT * FROM mahasiswa");

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

    <!-- 1. Membuat Table Data Mahasiswa -->
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
            <td>
                <a href="">EDIT</a> || <a href="">DELETE</a>
            </td>
            <td><?= $mhs["nama"]; ?></td>
            <td><?= $mhs["npm"]; ?></td>
            <td><?= $mhs["email"]; ?></td>
            <td><?= $mhs["jurusan"]; ?></td>
            <td><img src="img/<?= $mhs["gambar"]; ?>" alt="" width="50px" height="70px"></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>

</body>
</html>