<?php
  session_start();

    // jadi jika tidak ada $_SESSION["login"] maka kembalikan ke halaman login
    if(!isset($_SESSION["login"])){
      header("Location: login.php");
    }

    require 'functions.php';

    // Konfigurasi pagination untuk menentukan batas data yang ditampilkan
    $jumlahDataPerhalaman =  3;

    // jumlah halaman = total data / jumlahDataPerhalaman
    // menghitung total data

    // dapat dengan cara ini
    // $result = mysqli_query($conn, "SELECT * FROM mahasiswa");
    // $totalData = mysqli_num_rows($result);
    
    // atau
    $totalData = count(query("SELECT * FROM mahasiswa"));
    var_dump($totalData);

    // jumlah halaman
    // round membulatkan bilangan pecahan ke terdekatnya. Misalkan : 1.2  maka -> 1
    // floor membulatkan bilangan pecahan ke bawah. Misalnya : 1.2  maka -> 1
    // ceil membulatkan bilangan pecahan ke atas. Misalnya : 1.2  maka -> 2
    $jumlahHalaman = ceil($totalData / $jumlahDataPerhalaman);
    
    // Menangkap halaman dari url, tetapi jika baru pertama kali membuka index tidak akan ada halaman diurlnya. Maka akan diasumsikan sebagai halaman 1
    // if ( isset($_GET["halaman"])){
    //   // halaman aktif
    //   $halamanAktif = $_GET["halaman"];
    // } /* jika halaman belum ada */ else {
    //   $halamanAktif = 1 ;
    // }

    // atau
    $halamanAktif = ( isset($_GET['halaman']))? $_GET['halaman'] : 1;

    // Menghitung Awaldata pada halaman berbeda
    $awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;

    // memberikan LIMIT (index pertama, data yang akan ditampilkan)
    $mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id ASC LIMIT $awalData, $jumlahDataPerhalaman"); 

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
              <!-- Search Input -->
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari data mahasiswa..." name="keyword" autofocus autocomplete="off">
                <button type="submit" name="cari" class="btn btn-primary">Cari Data</button>
              </div>
            </div>
            
            <div class="col-1">
              <!-- Loading -->
            </div>

            <div class="col-2">
              <!-- Button New Data   -->
              <a href="tambah.php" type="button" class="btn btn-success">+ Tambah Data Baru</a>
            </div>
          </div>
        </form>

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


        <?php if($halamanAktif > 1) : ?>
          <a href="?halaman=<?= $halamanAktif - 1; ?>" type="button" class="btn btn-success"><</a>
        <?php endif; ?>

        <!-- Navigasi Halaman -->
        <?php for( $i = 1; $i <= $jumlahHalaman; $i++) :?>
          <?php if( $i == $halamanAktif ) : ?>
            <a href="?halaman=<?= $i; ?>" type="button" class="btn btn-warning"><?= $i; ?></a>
          <?php else : ?>
            <a href="?halaman=<?= $i; ?>" type="button" class="btn btn-success"><?= $i; ?></a>
          <?php endif; ?>
        <?php endfor; ?>

        <?php if( $halamanAktif < $jumlahHalaman) : ?>
          <a href="?halaman=<?= $halamanAktif + 1; ?>" type="button" class="btn btn-success">></a>
        <?php endif; ?>

    <a href="logout.php" type="submit" name="logout" class="btn btn-danger" style="margin-left:1020px">Logout</a>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>