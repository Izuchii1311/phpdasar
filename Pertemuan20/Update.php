<?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: Login.php");
    }

    require 'Functions.php';

    $id = $_GET["id"];
    $dataId = query("SELECT * FROM mahasiswa WHERE id = $id")[0];    

    if( isset($_POST["submit"]) ) {
        if ( update($_POST) > 0) {
            echo 
            "<script>
                alert('Data Berhasil Diubah!');
                document.location.href = 'Index.php';
            </script>";
        } else {
            echo 
            "<script>
                alert('Data Gagal Diubah!');
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
    <title>Update Data Mahasiswa</title>
    <style>body{text-align: center;} ul{list-style-type: none;} input{margin: 3px};</style>
</head>
<body>
    
    <h1>Update Daftar Mahasiswa</h1>
    
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $dataId["id"];?>">
        <input type="hidden" name="gambarLama" value="<?= $dataId["gambar"];?>">

        <ul>
            <li>
                <label for="nama">Nama          : </label>
                <input type="text" name="nama" id="nama" required value="<?= $dataId["nama"]?>"> 
            </li>
            <li>
                <label for="npm">NPM            :</label>
                <input type="text" name="npm" id="npm" required value="<?= $dataId["npm"]?>">
            </li>
            <li>
                <label for="email">Email        : </label>
                <input type="text" name="email" id="email" required value="<?= $dataId["email"]?>">
            </li>
            <li>
                <label for="jurusan">Jurusan    : </label>
                <input type="text" name="jurusan" id="jurusan" required value="<?= $dataId["jurusan"]?>">
            </li> 
                <img src="img/<?= $dataId['gambar']; ?>" alt="" width="100px" height="120px">
            <li>
                <label for="gambar">Gambar      : </label>
                <input type="file" name="gambar" id="gambar" required>
            </li>
            <li>
                <button type="sumbit" name="submit">Update Data</button>
            </li>
        </ul>
    </form>

    <a href="Index.php">Kembali</a><br><br>

</body>
</html>

