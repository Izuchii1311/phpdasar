<?php
// Variabel Scope / lingkup variabel


// Variabel Global
// $x = 10;

// function tampilX()          // Function tidak dapat memanggil variabel diuar function
// {
//     global $x;              // untuk memanggilnya menggunakan global dan memasukan variabel yang diluar function
//     echo $x;
// }
// tampilX();



// Variabel SuperGlobal
// $_GET, $_POST, $_REQUEST, $_SESSION, $_COOKIE, $_SERVER, $_ENV       <= Array Assosiatif

// $_GET        -- Metode pengiriman data melalui url dan data tersebut dapat diambil dan ditangkap oleh superglobal $_GET
//              -- Sehingga jika kita tidak mengirimkan url dan meloncati url maka akan terjadi error
// http://localhost/phpdasar/getpost.php?nama=Luthfi Nur Ramadhan
// Contoh kasus ketika memasukkan data ke dalam $_GET maka url akan berubah seperti tersebut
// $_GET["Nama"] = "Luthfi Nur Ramadhan";
// $_GET["Npm"] = "2142430";
// var_dump($_GET);

$anime = [
    [
        "title" => "Kimi no Nawa",
        "genre" => "Romance/Fantasy",
        "author" => "Makoto Shinkai",
        "studio" => "CoMix Wave Films",
        "image" => "yourname.jpg"
    ],
    [
        "title" => "Fate series",
        "genre" => "Visual novel, Eroge, Fantasy, Action",
        "author" => "Kinoko Nasu",
        "studio" => "Type-moon, Ufotable",
        "image" => "fate.jpg"
    ]
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
    <h1>Daftar Anime</h1>

    <ul>
        <?php foreach ($anime as $anim) : ?>
            <li><a href="6.getpost2.php?title=<?= $anim["title"]; ?>&genre=<?= $anim["genre"]; ?>&author=<?= $anim["author"]; ?>&studio=<?= $anim["studio"]; ?>"> <?= $anim["title"]; ?> </a></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>


Assalamualaikum
Ini Luthfi angkatan 21, yang cabem kelompok 2
Buat persiapan LKTM yang kelompoknya nya mau kapan dibagi baginya ya?
Ada groupnya ngga?