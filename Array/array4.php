<!-- <?php
        $mahasiswa =
            [["Luthfi Nur Ramadhan", "2142430", "Teknik Informatika", "luthfiramadhan.lr55@gmail.com"], ["Izuchii", "2142431", "Animator", "Izuchii@gmail.com"]];
        ?> -->

<!-- Array Assosiative -->
<?php
$mahasiswa = [
    [
        "nama" => "Luthfi Nur Ramadhan",
        "npm" => "2142430",
        "prodi" => "Teknik Informatika",
        "email" => "luthfiramadhan.lr55@gmail.com"
    ],
    [
        "nama" => "Luthfi Nur Ramadhan",
        "npm" => "2142430",
        "prodi" => "Teknik Informatika",
        "email" => "luthfiramadhan.lr55@gmail.com"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>

    <?php foreach ($mahasiswa as $mhs) : ?>
        <ul>
            <li>Nama : <?= $mhs["nama"]; ?></li>
            <li>NPM : <?= $mhs["npm"]; ?></li>
            <li>Prodi : <?= $mhs["prodi"]; ?></li>
            <li>Email : <?= $mhs["email"]; ?></li>
        </ul>
    <?php endforeach; ?>
</body>

</html>