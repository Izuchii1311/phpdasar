<?php

    // Melakukan Pemanggilan Array yang benar menggunakan looping
    // for atau foreach
    $angka = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Latihan Pemanggilan Array yang benar!</title>
    <style>
        .kotak {
            width: 50px;
            height: 50px;
            background-color: salmon;
            text-align: center;
            line-height: 50px;
            margin: 3px;
            float: left;
        }
        .clear {clear: both; /* Untuk Membersihkan Float */}
    </style>
</head>
<body>
    <!-- Cara 1 -->

    <!-- Membuat For terlebih dahulu - - $i < count($angka), count() ini adalah fungsi dimana untuk mengitung jumlah nilai di dalam Array -->
    <?php for($i=0; $i<count($angka); $i++) : ?>
            <!-- Panggil Data Array -->
        <div class="kotak"><?php echo $angka [$i]; ?> </div>
    <?php endfor; ?>


    <div class="clear"></div>


    <!-- Cara 2 -->

    <!-- Panggil foreach() kemudian panggil arraynya dan representasikan arraynya -->
    <?php foreach($angka as $a) : ?>
            <!-- Panggil array -->
        <div class="kotak"><?php echo $a; ?></div>
    <?php endforeach; ?>

</body>
</html>