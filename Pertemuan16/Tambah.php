<?php 
    session_start();
    // 5. Cek Session Login (Jika tidak ada SESSION login maka tendang paksa ke halaman login)
    if (!isset($_SESSION["login"])) {
        header("Location: Login.php");
    }
    require 'Functions.php';

    if( isset($_POST["submit"]) ) {
        if ( tambah($_POST) > 0) {
            echo 
            "<script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'Index.php';
            </script>";
        } else {
            echo 
            "<script>
                alert('Data Gagal Ditambahkan');
                document.location.href = 'Index.php';
            </script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <style>body{text-align: center;} ul{list-style-type: none;} input{margin: 3px};</style>
</head>
<body>
    
    <h1>Tambah Daftar Mahasiswa</h1>
    
    <!-- 3. Menambahkan atribut untuk mengelola Gambar -->
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nama">Nama          : </label>
                <input type="text" name="nama" id="nama" required autocomplete="off"> 
            </li>
            <li>
                <label for="npm">NPM            :</label>
                <input type="text" name="npm" id="npm" required autocomplete="off">
            </li>
            <li>
                <label for="email">Email        : </label>
                <input type="text" name="email" id="email" required autocomplete="off">
            </li>
            <li>
                <label for="jurusan">Jurusan    : </label>
                <input type="text" name="jurusan" id="jurusan" required autocomplete="off">
            </li>
            <li>
                <label for="gambar">Gambar      : </label>
                <!-- 1. Edit type inputnya menjadi File -->
                <input type="file" name="gambar" id="gambar" required autocomplete="off">
            </li>
            <li>
                <button type="sumbit" name="submit">Kirim Data</button>
            </li>
        </ul>
    </form>

    <a href="Index.php">Kembali</a><br><br>

</body>
</html>

