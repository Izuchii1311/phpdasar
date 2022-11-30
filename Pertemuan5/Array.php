<?php

    // Contoh Kasus
    // Array
    $hari = ["Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu", "Minggu"];

    // Menampilkan Array menggunakan var_dump()
    var_dump($hari);
    echo "<br>";

    // Menampilkan Array menggunakan print_r()
    print_r($hari);
    echo "<br>";

    // Menampilkan satu elemen pada Array
    echo $hari[0];
    echo "<br>";


    // Contoh Kasus
    // Menambahkan elemen baru pada array
    $nama = ["Luthfi", "Nur"];

    // untuk menambahkan array
    $nama[] = "Ramadhan";
    echo "<br>";

    // untuk menampilkan array yang ditambahkan
    var_dump($nama);

?>