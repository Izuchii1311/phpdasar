<?php
session_start();

// jika tidak ada session login maka kembalikan usernya ke halaman login
if ( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
// Mengurutkan berdasarkan nama A - Z
$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY nama ASC");

// tombol cari ditekan
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Latihan</title>
</head>

<body>

    <h1>Daftar Mahasiswa</h1>
    <a href="logout.php">Logout</a>

    <a href="tambah.php">Tambah Data Mahasiswa</a><br><br>

    <form action="" method="post">

        <input type="text" name="keyword" size="30" autofocus placeholder="Cari Mahasiswa!" autocomplete="off" id="keyword">
        <button type="submit" name="cari" id="tombol-cari">Cari</button>
    </form>

    <div id="container">
        <table border="1" cellpadding="20" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Aksi</th>
                <th>Gambar</th>
                <th>NPM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
            </tr>

            <?php $i = 1; ?>
            <?php foreach ($mahasiswa as $row) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td>
                        <a href="ubah.php?id=<?= $row["id"]; ?>">Edit</a> |
                        <a href=" hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Ya');">Hapus</a>
                    </td>
                    <td><img src=" img/<?= $row['gambar']; ?>" alt="" width="50px" height="50px">
                    </td>
                    <td><?= $row["npm"]; ?></td>
                    <td><?= $row["nama"]; ?></td>
                    <td><?= $row["email"]; ?></td>
                    <td><?= $row["jurusan"]; ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </div>
</body>

<script src="js/script.js"></script>
</html>