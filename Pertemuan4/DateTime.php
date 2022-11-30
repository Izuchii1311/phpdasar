<?php
    // Time
    // UNIX time stamp (asal mula waktu di dunia IT / detik yang sudah berlalu sejak 1 January 1970)
    echo time();

    // Date
    echo date("l-d-M-y"); 

    // MKTIME (membuat detik sendiri)
    // Parameter mktime()
    // (jam, menit, detik, bulan, tanggal, tahun)
    echo mktime(0,0,0,11,13,2002);

    // STRTOTIME
    // Merubah memasukkan format tanggal yang akan diubah menjadi detik
    echo strtotime("13 nov 2022");

?>