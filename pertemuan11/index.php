<?php
    // Memanggil file functions
    require 'functions.php';

    $mahasiswa = query("SELECT * FROM mahasiswa");

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Admin -- Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
      .cover {
        object-fit: cover;
        border-radius: 50%;
      }
    </style>
  </head>

  <body>

    <div class="container">

        <h1 class="mt-5 text-center mb-5">Daftar Mahasiswa</h1>
        
        <!-- Membuat link menuju halaman tambah  -->
        <a href="tambah.php" type="button" class="btn btn-success mb-2">+ Tambah Data Baru</a>
        

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

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>