<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array MultiDimensi</title>
    <style>
        .kotak {
            width: 30px;
            height: 30px;
            background-color: salmon;
            text-align: center;
            line-height: 30px;
            margin: 3px;
            float: left;
        }
        .clear {
            clear: both;
        }
    </style>
</head>
<body>
    <!-- Array Multidimensi -->
    <!-- Array Numerik -->
    <?php 
        $angka = [[1,2,3],[4,5,6],[7,8,9],[10,11,12],[13,14,15]];
        // Contoh Pemanggilan echo $angka[1][1];
    ?>
    
    <!-- Untuk Memanggil Semua Array maka buat foreach 2x untuk mereseprentasikan Arraynya -->
    <?php foreach ($angka as $a) : ?>
        <?php foreach ($a as $x) : ?>
            <div class="kotak"><?= $x; ?></div>
        <?php endforeach; ?>
        <div class="clear"></div>
    <?php endforeach; ?>
</body>
</html>