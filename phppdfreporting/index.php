<?php
session_start();

if ( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY nama ASC");

if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Latihan</title>
    <style>
        .loader {
            width: 20px;
            position: absolute;
            display: none;
        }

        /* 1.Syntax CSS */
        /* Syntax CSS yang berlaku ketika di print */
        /* CSS tolong panggil class berikut ketika user melakukan print class tersebut dihilangkan */
        @media print {
            .logout, .tambah, .cari, .aksi{ 
                display: none;
            }
        }
    </style>
    <script src="js/jquery-3.6.1.min.js"></script>
</head>

<body>

    <h1>Daftar Mahasiswa</h1>
    <!-- Menambahkan Class -->
    <a href="logout.php" class="logout">Logout</a>
    <!-- Menambahkan Class -->
    <a href="tambah.php" class="tambah">Tambah Data Mahasiswa</a><br><br>

    <form action="" method="post">
        <!-- Menambahkan class -->
        <input type="text" name="keyword" size="30" autofocus placeholder="Cari Mahasiswa!" autocomplete="off" id="keyword" class="cari">
        <button type="submit" name="cari" id="tombol-cari">Cari</button>
        <img src="img/Loader.gif" alt="" class="loader">
    </form>

    <div id="container">
        <table border="1" cellpadding="20" cellspacing="0">
            <tr>
                <th>No.</th>
                <!-- Menambahkan class -->
                <th class="aksi">Aksi</th>
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
                    <!-- Menambahkan classs -->
                    <td class="aksi">
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