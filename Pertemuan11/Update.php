<?php 
    require 'Functions.php';

    // 5. Mengambil data dari Id yang berada di url
    $id = $_GET["id"];
    // 6. Query data mahasiswa berdasarkan idnya
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
    
    <form action="" method="post">
        <!-- 9. Menambahkan inputan hidden untuk id -->
        <input type="hidden" name="id" value="<?= $dataId["id"];?>">
        <ul>
            <li>
                <label for="nama">Nama          : </label>
                <!-- 7. Menambahkan atribut Value -->
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
            <li>
                <label for="gambar">Gambar      : </label>
                <input type="text" name="gambar" id="gambar" required value="<?= $dataId["gambar"]?>">
            </li>
            <li>
                <button type="sumbit" name="submit">Update Data</button>
            </li>
        </ul>
    </form>

    <a href="Index.php">Kembali</a><br><br>

</body>
</html>

