<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Array 3</title>
    <style>
        .kotak {
            width: 50px;
            height: 50px;
            background-color: salmon;
            text-align: center;
            line-height: 50px;
            margin: 5px;
            float: left;
            transition: 0.5s;
        }

        .kotak:hover {
            transform: rotate(360deg);
            border-radius: 25px;
        }

        .clear {
            clear: both;
        }
    </style>
</head>

<body>
    <?php $numbers = [[1, 2, 3, 4], [5, 6, 7, 8], [9, 10, 11, 12]];
    //echo $numbers[1][1] 
    ?>
    <!-- Mencetak dari array multi dimensi array 1 kolom 1 hasilnya angka 6-->


    <?php foreach ($numbers as $number) : ?>
        <?php foreach ($number as $a) : ?>
            <div class="kotak"> <?= $a ?> </div>
        <?php endforeach; ?>
        <div class="clear"></div>
    <?php endforeach; ?>

</body>

</html>