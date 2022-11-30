<?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: Login.php");
    }
    
    require "Functions.php";

    // 1. Configurasi Pagination (untuk menentukan dalam 1 halaman ingin tampil berapa data dan dilakukan sebelum menampilkan querynya)
        // jika ingin rapih pindahkan ke function
    $jumlahDataPerHalaman = 2;
    // 3. Menghitung akan ada berapa halaman (Jumlah Halaman = Total data / data per halaman)
    $result = mysqli_query($conn, " SELECT * FROM mahasiswa");
    // akan menghasilkan ada berapa baris dari $result 
    // count untuk menghitung data di dalam array dari query
    $jumlahData = count(query("SELECT * FROM mahasiswa")); 
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    // jumlah data halaman = jumlah semua data dibagi jumlah data 2
    // round membulatkan bilangan terdekatnya dan (GA BISA MENGGUNAKAN ROUND TIDAK BENAR JIKA DATA ADA BANYAK)
    // floor pembulatan ke bawah brapa pun nilai pecahannya 
    // ceil pembulatan ke atas berapa pun nilai pecahannya (DIGUNAKAN)


    // 4. Halaman Yang Aktif (Untuk menentukan lagi di halaman berapa)
    // diisi dari data yang aktif di url 
    // Operator Ternary -- Cek Halaman aktif ambil data dari url 
    // isset $_GET halaman jika kondisinya bernilai true maka halaman aktif diisi dengan $_GET["halaman"] tapi jika false diisi angka 1;
    $halamanAktif = (isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;


    // 5. Menghitung Awal Data
    // awal data = (2 * misal halaman 2) - 2;
    // awal data = 4 - 2 = 2                    (maka data awal di halaman 2 akan dimulai dari index ke 2)
    $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman ;


    // 2. Menambahkan keyword LIMIT di query untuk membatasi data
    // LIMIT (data dimulai dari berapa, mau berapa data yang ditampilkan)
    $mahasiswa = query ("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");

    if( isset($_POST["search"]) ){
        $mahasiswa = search($_POST["keyword"]);
    }
?>  


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>body{text-align: center;} table{margin-left: 18%;}</style>
</head>
<body>
    
    <h1>Daftar Mahasiswa</h1>
    
    <a href="Tambah.php">Tambah Data Mahasiwa</a><br><br>

    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan Keyword Pencarian..." autocomplete="off">
        <button type="submit" name="search">Search</button>
    </form>
    <br>

    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>NPM</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>

        <?php $i=1; ?>
        <?php foreach($mahasiswa as $mhs) : ?>
        <tr>    
            <td><?= $i; ?></td>
            <td><?= $mhs["nama"]; ?></td>
            <td><?= $mhs["npm"]; ?></td>
            <td><?= $mhs["email"]; ?></td>
            <td><?= $mhs["jurusan"]; ?></td>
            <td><img src="img/<?= $mhs["gambar"]; ?>" alt="" width="50px" height="70px"></td>
            <td>
                <a href="Update.php?id=<?= $mhs["id"]?>">EDIT</a>
                || 
                <a href="Hapus.php?id=<?= $mhs["id"]?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');">DELETE</a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>

    </table>

    <!-- 6. Membuat Navigasi -->
    <!-- Menghitung jumlah sebuah hyperlink dan dihitung dari $jumlahHalaman -->
    <!-- tag a href di isi dengan Index.php?halaman=< ?= $i; ?> -->
    <br><br>
        <!-- Memberikan Pref -->
        <!-- akan dimunculkan ketika halaman aktif lebih dari 1 -->
        <?php  if ($halamanAktif > 1) : ?>
            <a href="?halaman=<?= $halamanAktif-1; ?>">&laquo;</a>
        <?php endif; ?>

        <?php for($i = 1; $i <= $jumlahHalaman; $i++): ?>
            <!-- Cek Halaman Aktif yang ditandai dengan Bold -->
            <?php if( $i == $halamanAktif ): ?>
                <!-- jika halaman aktif maka beri style css -->
                <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
            <?php else: ?>
                <!-- jika halaman tidak aktif jangan beri sytle css -->
                <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
            <?php endif; ?>
        <?php endfor; ?>

        <!-- Memberikan Next -->
        <?php  if ($halamanAktif < $jumlahHalaman) : ?>
            <a href="?halaman=<?= $halamanAktif+1; ?>">&raquo;</a>
        <?php endif; ?>

    <br><br>

    <br><br><a href="Logout.php">Logout</a><br><br>

</body>
</html>