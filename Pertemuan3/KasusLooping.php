<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Looping</title>
</head>
<body>
    <table border="1" cellpadding="10" cellspacing="10">
        <!-- Contoh 1 For
        <?php 
            for($i = 1; $i <= 3; $i++) {
                echo "<tr>";
                for($j = 1; $j <= 3; $j++) {
                    echo "<td>$i, $j</td>";
                }
                echo "</tr>";
            }
        ?> -->

        <!-- Contoh 2 For -->
            <?php for($i = 1; $i <=5; $i ++) : ?>
                <tr>
                <?php for($j = 1; $j <=5; $j ++) : ?>
                    <td><?= $j; ?></td>
                <?php endfor; ?>
                </tr>
            <?php endfor; ?>
    </table>
</body>
</html>