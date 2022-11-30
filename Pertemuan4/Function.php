<?php
    // Function salam dengan memberikan parameter
    function salam ($waktu = "Datang", $nama = "Admin"){
        return "Selamat $waktu, $nama!";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Function</title>
</head>
<body>
    <h1><?php echo salam("Pagi", "Luthfi"); ?></h1>
</body>
</html>