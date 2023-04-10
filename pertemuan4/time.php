<?php
    // Menampilkan Time
    // UNIX Timestamp / EPOCH time 
    // Asal Mula Waktu di Dunia Komputer
    // Detik yang sudah berlalu sejak 1 January 1970

    // echo time();

    // 864000 = 10 Hari
    echo date("l, d-M-y", time()+60*60*24*10);
?>

