<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POTS</title>
</head>

<body>
    <?php
    if (isset($_POST["submit"])) : ?>
        <h1>Hello, <?= $_POST["nama"]; ?></h1>
    <?php endif; ?>

    <form method="post">
        <label for="text">Masukan Nama : </label>
        <input type="text" name="nama">
        <br>
        <button type="submit" name="submit">Kirim</button>
    </form>

    <!-- Perbedaan GET dan POST
Jika GET akan menampilkan hasilnya baik di tampilan webnya dan urlnya
namun jika POST akan menampilkan hasilnya hanya di tampilan webnya -->

    <!-- Jika form 
action = (kosong) artinya data yang di dapat dikirim ke halaman itu sendiri
        dan akan muncul error jika tidak ada data yang dikirim terlebih darhulu-->

</body>

</html>