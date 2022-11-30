<?php
$students = [
    ["Luthfi Nur Ramadhan", "2142430", "Teknik Informatika", "luthfiramadhan.lr55@gmail.com"],
    ["Izuchii", "2142431", "Animator", "Izuchii@gmail.com"]
];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>

<body>
    <h1>Data Mahasiswa</h1>

    <!-- <ul>
        <?php foreach ($students as $student) : ?>
            <li><?= $student; ?></li>
        <?php endforeach; ?>
    </ul> -->

    <br>

    <?php foreach ($students as $student) : ?>
        <ul>
            <li>Nama : <?= $student[0]; ?> </li>
            <li>NPM : <?= $student[1]; ?> </li>
            <li>Prodi: <?= $student[2]; ?> </li>
            <li>Email: <?= $student[3]; ?> </li>
        </ul>
    <?php endforeach; ?>
</body>

</html>