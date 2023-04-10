<?php
  session_start();

  if(!isset($_SESSION["login"])){
    header("Location: login.php");
  }
  
    require 'functions.php';

    $id = $_GET["id"];

    $mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

    if ( isset ($_POST["submit"]) ){
        if ( ubah($_POST) > 0 ) {
            echo "
                <script>
                    alert('Data Berhasil Diubah');
                    document.location.href = 'index.php';
                </script>        
            ";
        } else {
            echo "
            <script>
                alert('Data Gagal Diubah');
            </script>        
        ";
        }
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ubah Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        li{
            margin-bottom: 20px;
        }
      .cover {
        object-fit: cover;
        border-radius: 50%;
      }
    </style>
  </head>
  <body>
    <div class="container">

    <h1 class="mt-5 text-center mb-5">Ubah Data Mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data" class="mb-5">

        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">

        <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap :</label>
            <input type="text" class="form-control" id="nama" name="nama" required value="<?= $mhs["nama"]; ?>" autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="npm" class="form-label">NPM Mahasiswa :</label>
            <input type="text" class="form-control" id="npm" name="npm" required value="<?= $mhs["npm"]; ?>" autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Alamat Email :</label>
            <input type="email" class="form-control" id="email" name="email" required value="<?= $mhs["email"]; ?>" autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan :</label>
            <input type="text" class="form-control" id="jurusan" name="jurusan" required value="<?= $mhs["jurusan"]; ?>" autocomplete="off">
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-2">
                    <img src="img/<?= $mhs['gambar']; ?>" width="150px" height="150px" class="cover" alt="">
                </div>

                <div class="col-9">
                    <label for="gambar" class="form-label">Ubah Gambar :</label>
                    <input type="file" class="form-control" id="gambar" name="gambar">
                </div>
            </div>
        </div>

        <a href="index.php" type="button" name="kembali" class="btn btn-danger">Kembali</a>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        
    </form>

    </div>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>