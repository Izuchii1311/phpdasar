<?php
require 'functions.php';

// ambil data di url
$id = $_GET["id"];
// query data mahasiswa berdasarkan data
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];


// cek apakah tombol submit sudah pernah ditekan atau belum
if (isset($_POST["submit"])) {
    // var_dump($_POST);        cek menguji fungsi button

    // Cek Apakah Data berhasil ditambahkan atau tid
    if (ubah($_POST) > 0) {
        echo " 
            <script> 
                alert('Data berhasil diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "  
            <script> 
                alert('Data gagal diubah!');
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
    <title>Form Ubah</title>
</head>

<body>
    <h1>Ubah Data Mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
        <!-- jika gambar lama dipake maka nama gambar ditampilkan jika tidak maka akan ditimpa dengan gambar yang baru-->
        <input type="hidden" name="gambar" value="<?= $mhs["gambar"]; ?>">
        <ul>
            <li>
                <label for="nama"> Nama Lengkap : </label>
                <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>">
            </li>
            <li>
                <label for="npm">NPM Mahasiswa : </label>
                <input type="text" name="npm" id="npm" required value="<?= $mhs["npm"]; ?>">
            </li>
            <li>
                <label for="email"> Email : </label>
                <input type="text" name="email" id="email" required value="<?= $mhs["email"]; ?>">
            </li>
            <li>
                <label for="jurusan"> Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]; ?>">
            </li>
            <li>
                <label for="gambar"> Gambar : </label><br>
                <img src="img/<?= $mhs['gambar']; ?>" alt="" width="200" height="350"><br>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Ubah</button>
            </li>
        </ul>
    </form>

</body>

</html>