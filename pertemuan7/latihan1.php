<?php
    // Variabel Scope / Lingkup Variabel

    // $x adalah variabel local untuk halaman latihan1.php
    $x = 10;

    function tampilX() {
        global $x;
        echo $x;
    }

    tampilX();
?>