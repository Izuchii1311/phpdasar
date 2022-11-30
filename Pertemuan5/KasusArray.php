<?php

    // Data Array
    $mahasiswa = ["Luthfi Nur Ramadhan", "2142430", "Teknik Informatika", "luthfiramadhan.lr55@gmail.com"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Mahasiswa</title>
</head>
<body>
    
    <h1>Data Mahasiswa</h1>

    <!-- Menampilkan Data -->
    <ul>
        <!-- Contoh Pemanggilan Menggunakan Looping -->
        <?php foreach($mahasiswa as $mhs) : ?>
            <li><?= $mhs; ?></li>
        <?php endforeach; ?>
    </ul>

    <ul>
        <!-- Contoh Pemanggilan Array Manual -->
        <li><?= $mahasiswa[0]; ?></li>
        <li><?= $mahasiswa[1]; ?></li>
        <li><?= $mahasiswa[2]; ?></li>
        <li><?= $mahasiswa[3]; ?></li>
    </ul>

</body>
</html>