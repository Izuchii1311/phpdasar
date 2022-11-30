<?php

    $mahasiswa = [
        ["Luthfi Nur Ramadhan", "2142430", "luthfiramadhan.lr55@gmail.com", "Teknik Informatika"],
        ["Luthfi Nur Ramadhan", "2142430", "luthfiramadhan.lr55@gmail.com", "Teknik Informatika"],
        ["Luthfi Nur Ramadhan", "2142430", "luthfiramadhan.lr55@gmail.com", "Teknik Informatika"],
        ["Luthfi Nur Ramadhan", "2142430", "luthfiramadhan.lr55@gmail.com", "Teknik Informatika"]];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Mahasiswa</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>

    <?php foreach($mahasiswa as $mhs) : ?>
    <ul>
        <li>Nama : <?= $mhs[0]; ?></li>
        <li>NPM : <?= $mhs[1]; ?></li>
        <li>Email : <?= $mhs[2]; ?></li>
        <li>Prodi : <?= $mhs[3]; ?></li>
    </ul>
    <?php endforeach; ?>
</body>
</html>