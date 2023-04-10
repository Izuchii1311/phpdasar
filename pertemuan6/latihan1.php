<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Numerik</title>
    <style>
        .kotak {
            width: 30px;
            height: 30px;
            background-color: pink;
            text-align: center;
            line-height: 30px;
            margin: 10px;   
            float: left;
        }
        .clear {
            clear: both;
        }
    </style>
</head>
<body>

    <?php 
        // Review Array Numerik
        $angka = [[1,2,3],[4,5,6],[7,8,9]];
    ?>

    <?php foreach ($angka as $a) : ?>
        <?php foreach ($a as $b) : ?>
            <div class="kotak"><?= $b; ?></div>
        <?php endforeach; ?>
        <div class="clear"></div>
    <?php endforeach; ?>
</body>
</html>