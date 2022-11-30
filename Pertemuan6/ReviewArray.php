<?php

    // Array
    // Membuat Array (Versi Lama)
    $hari = array ("Senin", "Selasa", "Rabu");

    // Membuat Array (Versi Baru)
    $bulan = ["January", "February", "Maret"];

    // Array dengan tipe data yang berbeda
    $arr = [100, "test", true];


    // Menampilkan Array
    // var_dump()
    echo "<h4> Menampilkan Array Menggunakan var_dump </h4>";
    var_dump($hari);
    echo "<br><br>";

    // print_r
    echo "<h4> Menampilkan Array Menggunakan print_r </h4>";
    print_r($bulan);
    echo "<br><br>";

    // Menampilkan element Array
    echo "<h4> Menampilkan element Array </h4>";
    echo $arr[1];
    echo "<br><br>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Array</title>
    <style>
        .kotak {
            width: 30px;
            height: 30px;
            background-color: salmon;
            text-align: center;
            line-height: 30px;
            margin: 3px;
            float: left;
        }
    </style>
</head>
<body>
    <!-- Array Numerik -->
    <?php 
        $angka = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15];
    ?>

    <h2>Menampilkan Array Menggunakan Looping</h2>

    <!-- Memanggil Array Menggunakan ForEach -->
    <?php foreach($angka as $a) : ?>
        <div class="kotak"><?= $a ?></div>
    <?php endforeach; ?>
</body>
</html>
