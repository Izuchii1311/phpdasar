<?php
    // SUPERGLOBALS -- Variabel Global Milik PHP (Array Assosiatif).

    $mahasiswa = [
        [
        "nama" => "Luthfi Nur Ramadhan", 
        "npm" => "2142430", 
        "email" => "luthfiramadhan.lr55@gmail.com", 
        "jurusan" => "Teknik Informatika"
        ],
        [
        "nama" => "Izuchii", 
        "npm" => "2142431", 
        "email" => "izuchii@gmail.com", 
        "jurusan" => "Design Komunikasi Visual"
        ],
    ];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET</title>
</head>
<body>
    <h1> Daftar Mahasiswa </h1>
    <ul>
        <?php foreach($mahasiswa as $mhs) : ?>
            <li>
                <!-- Mengirimkan data melalui href -->
                <a href="latihan3.php?nama=<?= $mhs["nama"]; ?>&npm=<?= $mhs["npm"]; ?>&email=<?= $mhs["email"]; ?>&jurusan=<?= $mhs["jurusan"]; ?>"><?= $mhs["nama"]; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>