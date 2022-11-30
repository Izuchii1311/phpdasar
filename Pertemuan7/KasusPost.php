<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasus Post -- Latihan</title>
    <style>body { text-align: center;}</style>
</head>
<body>
    
    <h2>Latihan Metode Request $_POST</h2>

    <!-- Untuk Menentukan Mau dikirim kemana Memerlukan 2 atribut wajib di dalam Form -->
    <!-- Action & Method -->
    <!-- 1. Membuat Form dengan Metode Requestnya Post -->
    <form action="KasusPost2.php" method="post">
        <label for="nama">Masukkan Nama :   </label>
        <input type="text" name="nama" id="nama">
        <br><br>
        <button type="submit" name="submit">Kirim</button>
    </form>

</body>
</html>