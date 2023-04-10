<?php
    // Array 
    // Cara membuat Array

    // Cara Lama 
    $hari = array("Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");

    // Cara baru
    $bulan = ["January", "February", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];


    // Cara Menampilkan Array
    // var_dump() atau print_r()
    // var_dump($hari);
    // echo "<hr>";
    // print_r($bulan);
    // echo "<hr>";

    // Menampilkan 1 element pada array
    // echo $hari[1];

    // Menambahkann Element baru pada array
    var_dump($hari);
    $hari [] = "Minggu";
    echo "<br>";
    var_dump($hari);
?>