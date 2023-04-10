<?php
    // Standar Output
    /*
    echo "Hello World <br>";
    print "Hello World <br>";
    var_dump("Hello World");
    */

    // Penulisan Sintaks PHP
    // PHP di dalam HTML
    // HTML di dalam PHP
    
    // Variabel & Tipe Data
    // Variabel
    // $nama = "Luthfi Nur Ramadhan";
    // echo "Halo nama saya, $nama <br>";
    // echo 'Halo nama saya, $nama';

    // Operator
    // 1. Aritmatika
    // + - * / %
    // echo 1 + 1;

    // 2. Penggabung string / Concatenation
    // .
    // $nama_depan = "Luthfi";
    // $nama_belakang = "Nur Ramadhan";
    // echo $nama_depan . $nama_belakang;

    // 3. Assignment
    // = += -= *= /= %= .=
    // $x = 1;
    // $x += 5;
    // echo $x;
    // X awalnya 1 + X nilainya 5 = hasilnya 6

    // 4. Perbandingan
    // < > <= >= == !=
    // Biasanya dipake saat membuat pengkondisian
    // Apakah 1 lebih kecil dari 5 ? hasilnya akan berupa boolean 
    // var_dump(1 < 5); //Boolean (true)

    // 5. Identitas
    // === !--
    // var_dump(1 === "1"); //Boolean (False)

    // 6. Logika
    // && || !
    // Biasanya dipake saat membuat pengkondisian
    $x = 10;
    var_dump($x < 20 && $x % 2 == 0);
    // Apakah $x lebih kecil dari 20 (true), dan
    // Apakah $x habis dibagi 2 (true)
?>  