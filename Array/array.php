<?php
// Array
// Sebuah variabel yang bisa menampung lebih dari satu nilai
// Element dalam array boleh memiliki tipe data yang berbeda
// Key Index dimulai dari 0

// Cara membuat Array
// Cara Lama
// $hari = array("Senin", "Selasa", "Rabu");

// Cara Baru
// $bulan = ["January", "February", "Maret"];



// Menampilkan Array
// Echo tidak dapat menampilkan array

// var_dump() atau print_r()
// var_dump($hari);
// echo "<br>";
// print_r($bulan);
// echo "<br>";



// Menampilkan 1 element di dalam Array dapat menggunakan echo
// echo $hari[2];
// echo "<br>";
// echo $bulan[2];
// echo "<br>";



// Menambahkan Element baru pada Array
// var_dump($hari);
// $hari[] = "Kamis";
// $hari[] = "Jum'at";
// $hari[] = "Sabtu";
// $hari[] = "Minggu";
// echo "<br>";
// var_dump($hari);



// Pengulangan pada Array
// for / foreach
$angka = [3, 2, 15, 20, 11, 77, 89, 1, 2, 4, 52, 21];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan</title>
    <style>
        .kotak {
            width: 100px;
            height: 100px;
            background-color: salmon;
            text-align: center;
            line-height: 100px;
            font-size: 50px;
            color: white;
            margin: 5px;
            float: left;
        }

        .clear {
            clear: both;
        }
    </style>
</head>

<body>
    <?php for ($i = 0; $i < count($angka); $i++) { ?>
        <div class="kotak"> <?php echo $angka[$i] ?> </div>
    <?php } ?>

    <div class="clear"></div>

    <?php foreach ($angka as $a) { ?>
        <div class="kotak"> <?php echo $a; ?> </div>
    <?php } ?>

    <div class="clear"></div>

    <?php foreach ($angka as $a) : ?>
        <div class="kotak"> <?= $a; ?> </div>
    <?php endforeach; ?>
</body>

</html>