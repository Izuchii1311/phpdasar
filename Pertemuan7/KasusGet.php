<?php

    // Variabel Superglobals $_GET
    // 1. Buat Array
    $mahasiswa = [[
        "gambar" => "Hutao.jpg",
        "nama" => "Luthfi Nur Ramadhan",
        "npm" => "2142430",
        "email" => "luthfiramadhan.lr55@gmail.com",
        "prodi" => "Teknik Informatika"
    ],
    [
        "gambar" => "Lamy.png",
        "nama" => "Liviana",
        "npm" => "203345",
        "email" => "ipiw@gmail.com",
        "prodi" => "Teknik Ayang"
    ],
    [
        "gambar" => "Suisei.jpg",
        "nama" => "Hutao    ",
        "npm" => "223344",
        "email" => "Whotao",
        "prodi" => "DKV"
    ]];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <ul>
        <!-- 2. Tampilkan Array -->
        <?php foreach($mahasiswa as $mhs) : ?>
            <li>
                <!-- 3. Kirimkan Data Array agar dapat di buka di Page lain -->
                <a href="KasusGet2.php?nama=<?= $mhs["nama"]; ?>&npm=<?= $mhs["npm"]; ?>&email=<?= $mhs["email"]; ?>&prodi=<?= $mhs["prodi"]; ?>&gambar=<?= $mhs["gambar"]; ?>"><?= $mhs["nama"] ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>