<?php

    // Data Array
    $mahasiswa = [["Luthfi Nur Ramadhan", "2142430", "Teknik Informatika", "luthfiramadhan.lr55@gmail.com"],
    ["Anisa Liviana", "21424308", "Teknik Informatika", "livianaanisa@gmail.com"],
    ["Rianda Fuad", "21424321", "Design Grafis", "negevianid@gmail.com"]
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Mahasiswa</title>
</head>
<body>
    
    <h1>Data Mahasiswa</h1>

    <!-- Menampilkan Data -->
    <!-- Maka Akan menampilkan semua isi di dalam array -->
    <?php foreach($mahasiswa as $mhs) : ?>
    <ul>
        <!-- Contoh Pemanggilan Array Manual -->
        <li>Nama : <?= $mhs[0]; ?></li>
        <li>NPM : <?= $mhs[1]; ?></li>
        <li>Jurusan : <?= $mhs[2]; ?></li>
        <li>Email : <?= $mhs[3]; ?></li>
    </ul>
    <?php endforeach; ?>
</body>
</html>