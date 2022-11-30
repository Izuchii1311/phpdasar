<?php
require 'functions.php';

// cek apakah tombol submit sudah pernah ditekan atau belum
if (isset($_POST["submit"])) {
    // var_dump($_POST);        cek menguji fungsi button

    // Cek Apakah Data berhasil ditambahkan atau tid
    if (tambah($_POST) > 0) {
        echo " 
            <script> 
                alert('Data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo " 
            <script> 
                alert('Data gagal ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>

<body>
    <h1>Tambah Data Mahasiswa</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="nama"> Nama Lengkap : </label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="npm">NPM Mahasiswa : </label>
                <input type="text" name="npm" id="npm" required>
            </li>
            <li>
                <label for="email"> Email : </label>
                <input type="text" name="email" id="email" required>
            </li>
            <li>
                <label for="jurusan"> Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan" required>
            </li>
            <li>
                <label for="gambar"> Gambar : </label>
                <input type="text" name="gambar" id="gambar" required>
            </li>
            <li>
                <button type="submit" name="submit">Kirim</button>
            </li>
        </ul>
    </form>

</body>

</html>