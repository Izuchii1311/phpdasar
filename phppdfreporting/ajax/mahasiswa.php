<?php 
sleep(1);

    require '../functions.php';
    $keyword = $_GET["keyword"];
    $query = "SELECT * FROM mahasiswa 
                WHERE 
                nama LIKE '%$keyword%' OR 
                npm LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%'
                ";
    $mahasiswa = query($query);

?>  

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
            <?php foreach ($mahasiswa as $row) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td>
                        <a href="ubah.php?id=<?= $row["id"]; ?>">Edit</a> |
                        <a href=" hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Ya');">Hapus</a>
                    </td>
                    <td><img src=" img/<?= $row['gambar']; ?>" alt="" width="50px" height="50px">
                    </td>
                    <td><?= $row["npm"]; ?></td>
                    <td><?= $row["nama"]; ?></td>
                    <td><?= $row["email"]; ?></td>
                    <td><?= $row["jurusan"]; ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </table>