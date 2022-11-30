<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .warna_baris {
            background-color: aqua;
        }

        .warna_baris2 {
            background-color: salmon;
        }
    </style>
</head>

<body>
    <table border="1" cellpadding="10" cellspacing="0">
        <!-- <?php
                for ($i = 1; $i <= 3; $i++) {
                    echo "<tr>";
                    for ($j = 1; $j <= 5; $j++) {
                        echo "<td> $i, $j </td>";
                    }
                    echo "</tr>";
                }
                ?> -->

        <!-- <?php for ($i = 1; $i <= 3; $i++) : ?>
            <tr>
                <?php for ($j = 1; $j <= 5; $j++) : ?>
                    <td> <?= "$i, $j"; ?></td>  fungsi hanya untuk melakukan pemanggilan
                <?php endfor; ?>
            </tr>
            <?php endfor; ?>
                    Di dalam php kita melakukan perulangan dan apa yang di ulang?
                    yang diulang adalah tr maka kita harus memisahkan penutup for yang ada di php menjadi di akhir
                    lalu buat tag php perulangan lagi dan di dalamnya ada tag html <td>
                    kemudian panggil variabel perulangan tersebut
        -->

        <?php for ($i = 1; $i <= 5; $i++) : ?>
            <?php if ($i % 2 == 1) : ?>
                <tr class="warna_baris">
                <?php else : ?>
                <tr>
                <?php endif; ?>

                <?php for ($j = 1; $j <= 5; $j++) : ?>
                    <td> <?= "$i, $j"; ?></td> <!-- fungsi hanya untuk melakukan pemanggilan -->
                <?php endfor; ?>
            <?php endfor; ?>
    </table>
</body>

</html>