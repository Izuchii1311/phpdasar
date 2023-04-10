<?php
  session_start();

    if(!isset($_SESSION["login"])){
      header("Location: login.php");
    }

    require 'functions.php';

    $mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id ASC"); 

    if (isset($_POST["cari"])){
      $mahasiswa = cari($_POST["keyword"]);
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Admin -- Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw=" crossorigin="anonymous"></script>
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
        
        <form action="" method="post">
          <div class="row mb-3">

            <div class="col-9">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari data mahasiswa..." name="keyword" autofocus autocomplete="off" id="keyword">
                <!-- <button type="submit" name="cari" id="tombol-cari" class="btn btn-primary">Cari Data</button> -->
              </div>
            </div>
            
            <!-- loader  -->
            <div class="col-1">
              <img src="img/loader.gif.gif" alt="loader" width="25px" height="25px" style="display:none;" id="loader" class="loader">
            </div>

            <div class="col-2">
              <a href="tambah.php" type="button" class="btn btn-success">+ Tambah Data Baru</a>
            </div>
          </div>
        </form>

        <div id="content">
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

    <a href="logout.php" type="submit" name="logout" class="btn btn-danger mt-3 mb-5" style="margin-left:1020px">Logout</a>

    </div>

    <!-- Pemanggilan jQuery Sebaiknya dipanggil sebelum melakukan pemanggilan script js kita sendiri -->
    <!-- jQuery -->
    <script src="js/jquery-3.6.4.min.js"></script>
    <!-- script.js -->
    <script src="js/script.js"></script>



  </body>
</html>