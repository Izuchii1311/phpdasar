<?php 

    $mahasiswa = [[
        "gambar" => "Hutao.jpg",
        "nama" => "Luthfi Nur Ramadhan",
        "npm" => "2142430",
        "email" => "luthfiramadhan.lr55@gmail.com",
        "prodi" => "Teknik Informatika"
    ],
    [
        "gambar" => "Lamy.png",
        "nama" => "Luthfi Nur Ramadhan",
        "npm" => "2142430",
        "email" => "luthfiramadhan.lr55@gmail.com",
        "prodi" => "Teknik Informatika"
    ],
    [
        "gambar" => "Suisei.jpg",
        "nama" => "Luthfi Nur Ramadhan",
        "npm" => "2142430",
        "email" => "luthfiramadhan.lr55@gmail.com",
        "prodi" => "Teknik Informatika"
    ]];

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
        <li>
            <img src="img/<?= $mhs["gambar"]; ?>" alt="" width="40px" height="70px">
        </li>
        <li>Nama : <?= $mhs["nama"]; ?></li>
        <li>NPM : <?= $mhs["npm"]; ?></li>
        <li>Email : <?= $mhs["email"]; ?></li>
        <li>Prodi : <?= $mhs["prodi"]; ?></li>
    </ul>
    <?php endforeach; ?>
</body>
</html>