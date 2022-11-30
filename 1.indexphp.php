<!-- Sintaks Php -->

<!-- Cara Membuka file Php
1. Buka Xampp   >> Lalu Aktifkan Apache dan MySql
2. Buka Localhost/(nama_folder)/(nama_file)
    Contoh : Localhost/phpdasar/index.php

Localhost adalah dimana kita membuka sebuah file xampp>>htdocs
dan di dalam htdocs kita buat folder lalu isikan file, dan panggil dengan cara diatas
Jika 
Localhost/phpmyadmin    >> maka akan membuka sebuag database-->

<!-- Standar Output Php
echo, print, print_r, var_dump 

echo "Hello World";                 >> Mencetak string dapat memanggil dengan " " atau ' '
echo 123;                           >> Angka dapat dipanggil tanpa " "
echo true / false;                  >> Mencetak boolean True(1) / False(0)

print "Hello World";                >> Mencetak string
print_r ("Hello World");            >> Mencetak string atau array
var_dump ("Hello World");           >> Memerikan informasi tipe data dan jumlahnya dari output yang ditampilkan 
-->


<!-- Penulisan sintaks PHP
1. PHP di dalam HTML (Recomended)
2. HTML di dalam PHP -->


<!-- Variabel dan Tipe Data 
Contoh : $nama = "Luthfi nur ramadhan";                 
echo "$nama";                       >> Maka akan menampilkan Nama dari Variabel Nama
-->


<!-- Operator 
Aritmatika (+ - * / %)
$x = 10;
$y = 20;
echo "$x + $y = ";                  >> Maka 10 + 20 dan hasilnya akan 30


Penggabung string / Concenation / Concat
dengan menggunakan .
$nama_depan = "Luthfi Nur";
$nama_belakang = "Ramadhan";
echo $nama_depan . " " . $nama_belakang;            >> Maka hasilnya akan Luthfi Nur Ramadhan   


Assignment =, +=, -=, *=, /=, %=, .=
$x = 1;
$x += 5;
echo $x;                            >> Maka hasilnya adalah 1 + 5 = '6'

$nama = "Luthfi";
$nama .= " ";
$nama .= "Nur Ramadhan";
echo $nama;                         >> Maka hasilnya adalah Luthfi Nur Ramadhan


Perbandingan
<, >, <=, >=, ==, !=
var_dump(1 < 5);                    >> Maka hasilnya akan boolean(true)
atau var_dump(1 == "1");            >> Maka hasilnya akan boolean(true) karena sama hasilnya


Identitas
===, !==
var_dump(1 === "1");                >> Maka hasilnya akan boolean(false) hasilnya sama namun tipe datanya beda


Logika
&&  (Keduanya harus benar)
Contoh :
Apakah x kurang dari 20? Ya dan Apakah x dibagi 2 sama dengan 0? Ya                 >> Maka output boolean(true)
$x = 10;
var_dump($x < 20 && $x % 2 == 0);  

||  (Salah satunya benar)
Contoh :
Apakah x kurang dari 20? Tidak dan Apakah x dibagi 2 sama dengan 0? Ya              >> Maka output boolean(true)
$x = 30;
var_dump($x < 20 || $x % 2 == 0);

!    (Salah Keduanya)
Contoh :
Apakah x kurang dari 20? Tidak dan Apakah x dibagi 2 sama dengan 0? Tidak           >> Maka output boolean(true)
$x = 33;
var_dump($x < 20 || $x % 2 == 0);
-->


<!-- Penulisan sintaks PHP
1. PHP di dalam HTML (Recomended)
2. HTML di dalam PHP -->




<!-- Pengulangan "for, while, do while, foreach(array)"-->
<!-- Pengkondisian "if else, if else if else, ternary, switch -->
<?php
// Pengulangan
// for 
// while
// do.. while
// foreach : pengulangan khusus array


// for ($i = 0; $i < 5; $i++) {
//     echo "Hello World! <br>";
// }


// $i = 0;                                     // Memberikan nilai
// while ($i < 5) {
//     echo "Hello World! <br>";
//     $i++;                                   // Harus memberikan looping increment, karena jika tidak akan ada looping tidak pernah berhenti
// }


// $i = 0;                                         // Memberikan nilai
// do {
//     echo "Hello World! <br>";
//     $i++;                                       // Looping Increment
// } while ($i < 5);
// Perbedaan While dengan do While 
// Jika While cek dulu lalu jalankan ( artinya jika ada error atau kesalahan maka output tidak akan muncul)
// Sedangkan jika Do While jalankan dulu 1x lalu cek ( artinya jika ada error atau kesalahan maka akan tetap dijalankan dulu 1x dan sisanya tidak )




// Pengkondisian / Percabangan
// if else
// if else if else
// ternary
// switch


// $x = 20;
// if ($x < 20) {
//     echo "Benar";
// } else if ($x = 20) {
//     echo "Sama";
// } else {
//     echo "Salah";
// }

?>