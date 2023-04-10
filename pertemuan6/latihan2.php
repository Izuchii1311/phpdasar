<?php
    // Array Numerik
    // $mahasiswa = [["Luthfi Nur Ramadhan", "2142430", "luthfiramadhan.lr55@gmail.com", "Teknik Informatika"], 
    // ["Izuchii", "2142431", "izuchiikawai@gmail.com", "Design Komunikasi Visual"],
    // ["Hutao", "2142432", "taotao@gmail.com", "Sistem Informasi"]
    // ];

    // Array Assosiatif
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
    // pemanggilan Array Assosiatif tanpa foreach
    // echo $mahasiswa[1]["nama"];
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Assosiatif</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>

    <?php foreach ( $mahasiswa as $mhs ) : ?>
        <ul>
                <li>Nama : <?= $mhs["nama"]; ?></li>
                <li>NPM : <?= $mhs["npm"]; ?></li>
                <li>Email : <?= $mhs["email"]; ?></li>
                <li>Jurusan : <?= $mhs["jurusan"]; ?></li>
        </ul>
    <?php endforeach; ?>
</body>
</html>