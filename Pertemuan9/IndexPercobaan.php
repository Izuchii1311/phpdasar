<?php
    // 2. PHP melakukan koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "phplatihan");

    // 3. Ambil data dari table mahasiswa yang ada di database
    $result = mysqli_query($conn, "SELECT * FROM mahasiswa");

    // 4. Ambil data (fetch) mahasiswa dari object result
    // 5. menggunakan While agar data dapat diambil semua
    // while ($mhs = mysqli_fetch_assoc($result) ) {
    // var_dump($mhs);
    // }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>body{text-align: center;} table{margin-left: 20%;}</style>
</head>
<body>
    
    <h1>Daftar Mahasiswa</h1>

    <!-- 1. Membuat Table untuk tempat data -->
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

        <!-- 6. Lakukan Pengambilan data di dalam table agar data masuk ke dalam table -->
        <!-- 7. Lakukan Looping untuk Id -->
        <?php $i=1; ?>
        <?php while($row = mysqli_fetch_assoc($result)) :?>
        <tr>    
            <td><?= $i; ?></td>
            <td>
                <a href="">EDIT</a> || <a href="">DELETE</a>
            </td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["npm"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["jurusan"]; ?></td>
            <td><img src="img/<?= $row["gambar"]; ?>" alt="" width="50px" height="70px"></td>
        </tr>
        <?php $i++; ?>
        <?php endwhile; ?>
    </table>

</body>
</html>