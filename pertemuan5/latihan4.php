<?php

    $mahasiswa = [["Luthfi Nur Ramadhan", "2142430", "Teknik Informatika", "luthfiramadhan.lr55@gmail.com"],
    ["Luthfi Nur Ramadhan", "2142430", "Teknik Informatika", "luthfiramadhan.lr55@gmail.com"]];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <!-- <ul>
        <?php foreach($mahasiswa as $mhs): ?>
            <li><?= $mhs; ?></li>
        <?php endforeach; ?>
    </ul> -->


    <?php foreach($mahasiswa as $mhs) : ?>
        <ul>
            <li>Nama : <?= $mhs[0]; ?></li>
            <li>NPM : <?= $mhs[1]; ?></li>
            <li>Jurusan : <?= $mhs[2]; ?></li>
            <li>Email : <?= $mhs[3]; ?></li>
        </ul>
    <?php endforeach; ?>
</body>
</html>