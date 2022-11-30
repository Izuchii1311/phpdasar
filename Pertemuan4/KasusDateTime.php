<?php 

    // Contoh Penggabungan 2 Function Untuk Mengecek 100 hari dari sekarang
    echo date("D - M - Y", time()+60*60*24*100);


    // Contoh Pengecekan Hari dan detik sejak 13 nov 2002
    echo date("l", mktime(0,0,0,11,13,2002));


    // Contoh Pengecekan Hari dan detik sejak 13 nov 2002 dari string menjadi detik
    echo date("l", strtotime("13 nov 2002"));

?>