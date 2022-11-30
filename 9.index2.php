<!-- 9. Index.php   - PHP & MySQL -->
<!DOCTYPE html>
<html lang="en">
<?php
// 9. PHP & MySQL
// PHP Connection to database

use LDAP\Result;

$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// Ambil data dari tabel Mahasiswa
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

// Cek Error
// if (!$result) {
//     echo mysqli_error($conn);
// }

// Ambil data mahasiswa dari object result (fetch)
// mysqli_fetch_row()       Mengembalikan nilai array numerik(angka)
// mysqli_fetch_assoc()     Mengembalikan nilai array assosiatif   
// mysqli_fetch_array()     Mengembalikan nilai array numerik dan assosiatif (double)
// mysqli_fetch_object()    Mengembalikan nilai array assosiatif var_dump($mhs->nama);


// while ($mhs = mysqli_fetch_assoc($result)) {
//     var_dump($mhs);
// }
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>
    <table border="1" cellpadding="20" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NPM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>

        <?php $i = 1; ?>
        <?php
        while ($row = mysqli_fetch_assoc($result)) :
        ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="">Edit</a> |
                    <a href="">Hapus</a>
                </td>
                <td><img src="/Array/img/<?php echo $row["gambar"]; ?>" alt="Fate" width="50"></td>
                <td><?= $row["npm"]; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["jurusan"]; ?></td>
            </tr>
            <?= $i++; ?>
        <?php endwhile; ?>
    </table>
</body>

</html>