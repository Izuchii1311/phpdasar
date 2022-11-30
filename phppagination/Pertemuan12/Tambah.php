<?php 
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
    
    <form action="" method="post">
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
                <input type="text" name="gambar" id="gambar" required autocomplete="off">
            </li>
            <li>
                <button type="sumbit" name="submit">Kirim Data</button>
            </li>
        </ul>
    </form>

    <a href="Index.php">Kembali</a><br><br>

</body>
</html>

