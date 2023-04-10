<?php
    // User-Defined Function
    // Mengdefinisikan terlebih dahulu dan sebuah function biasanya mengembalikan Nilai
    
    function salam($waktu = "Datang",$nama = "Website"){
        return "Selamat $waktu, Admin $nama!";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Function</title>
</head>
<body>
    <h1><?= salam("Pagi ","Luthfi Nur Ramadhan"); ?> </h1>
</body>
</html>

