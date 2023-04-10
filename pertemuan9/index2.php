<?php
    // Koneksi Ke Database
    // mysqli("nama_host", "admin", "Password","nama_database")
    $conn = mysqli_connect("localhost", "root", "", "phpdasar");

    // Ambil data dari tabel mahasiswa
    // mysqli_query (koneksinya, querynya " ")
    $result = mysqli_query($conn, "SELECT * FROM mahasiswa");

    // Ambil data (fetch) mahasiswa dari $result
    // mysqli_fetch_row() 1 baris data -- Array Numerik
    // mysqli_fetch_assoc() 1 baris data -- Array Assosiatif
    // mysqli_fetch_array() semua data dan double ada numerik dan assosiatif -- Array Numerik & Assosiatif
    // mysqli_fetch_object()

    // Menampilkan semua datanya menggunakan while
    // while ( $mhs = mysqli_fetch_assoc($result) ) {
    //     var_dump($mhs);
    // }

    // // Notice Jika Error Connect ke database
    // if (!result){
    //     echo mysqli_error($conn);
    // }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa</title>
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
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td scope="row"><?= $no; ?></td>
                        <td scope="row"><img src="img/<?= $row["gambar"]; ?>" alt="" width="75px" height="75px" class="cover"></td>
                        <td scope="row"><?= $row['nama']; ?></td>
                        <td scope="row"><?= $row['npm']; ?></td>
                        <td scope="row"><?= $row['email']; ?></td>
                        <td scope="row"><?= $row['jurusan']; ?></td>
                        <td scope="row">
                            <button type="button" class="btn btn-warning">Edit</button>
                            <button type="button" class="btn btn-danger">Hapus</button>
                        </td>
                    </tr>
                <?php $no++; ?>
                <?php endwhile; ?>
            </tbody>
        </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>