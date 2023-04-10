<?php

sleep(1);
    require '../functions.php'; 

    $keyword = $_GET["keyword"];

    $query = "SELECT * FROM mahasiswa WHERE 
            nama LIKE '%$keyword%' OR
            npm LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%'
            ";
    $mahasiswa = query($query);
?>

<table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NPM</th>
                    <th scope="col">Email</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php $no = 1; ?>
                  <?php foreach ($mahasiswa as $row) :?>
                      <tr>
                          <td scope="row"><?= $no; ?></td>
                          <td scope="row"><img src="img/<?= $row["gambar"]; ?>" alt="" width="75px" height="75px" class="cover"></td>
                          <td scope="row"><?= $row['nama']; ?></td>
                          <td scope="row"><?= $row['npm']; ?></td>
                          <td scope="row"><?= $row['email']; ?></td>
                          <td scope="row"><?= $row['jurusan']; ?></td>
                          <td scope="row">
                              <a href="ubah.php?id=<?= $row['id']; ?>" type="button" class="btn btn-warning">Edit</a>
                              <a href="hapus.php?id=<?= $row['id']; ?>" type="button" class="btn btn-danger" onclick="return confirm('Apakah data ini akan dihapus?');">Hapus</a>
                          </td>
                      </tr>
                  <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>