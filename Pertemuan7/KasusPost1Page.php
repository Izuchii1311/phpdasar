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
    
    <!-- Mengirimkan Data Ke halaman Ini Sendiri -->
    <!-- Menggunakan Metode Post (jika ingin menggunakan Get pun bisa) -->

    <!-- Buat Form dengan method post
    lalu buat input dengan name="nama" dan juga button dengan name="submit"
    lalu panggil data di dalam form agar tampil di header yang berada di tag h2 dan panggil metode requestnya
            <h2>Selamat Datang <?= $_POST["nama"] ?>
    Agar apa? agar setelah kalimat selamat datang akan menampilkan nama kita yang telah diinputkan di inputannya 
    
    jika button submit sudah ditekan atau belum?
    Jika sudah maka tampilkan data yang diinputannya dan tampilkan di h2-->

    <?php if ( isset($_POST["submit"])) : ?>
    <h2>Selamat Datang <?= $_POST["nama"] ?></h2>
    <?php endif; ?>

    <form action="" method="post">
        <label for="">Masukkan Nama :   </label>
        <input type="text" name="nama">
        <br><br>
        <button type="submit" name="submit">Kirim</button>
    </form>

</body>
</html>