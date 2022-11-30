<?php
require('functions.php');
$toko = query("SELECT * FROM tokoku");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan File Toko</title>
</head>

<body>
    <h1>Data Toko</h1>

    <table border="1" cellpadding="10" cellspacing="5">
        <tr>
            <th>No.</th>
            <th>Id Pekerja</th>
            <th>Nama Pekerja</th>
            <th>Pekerjaan</th>
        </tr>


        <?php $i = 1; ?>
        <?php
        foreach ($toko as $tk) :
        ?>
            <tr>
                <td><?= $tk['no']; ?></td>
                <td><?= $tk['id']; ?></td>
                <td><?= $tk['nama']; ?></td>
                <td><?= $tk['pekerjaan']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>