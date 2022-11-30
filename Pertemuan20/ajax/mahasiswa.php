<?php 
// 6. Membuat halaman ini sleep terlebih dahulu -- agar loader muncul selama beberapa detik
sleep(2);
    require '../Functions.php';

    $keyword = $_GET["keyword"];

    $query = "SELECT * FROM mahasiswa WHERE
                    nama LIKE '$keyword%' OR
                    npm LIKE '$keyword%' OR
                    email LIKE '$keyword%' OR
                    jurusan LIKE '$keyword%'
                    ";
    $mahasiswa = query($query);

?>

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