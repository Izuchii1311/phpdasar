<?php
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data)
{
    global $conn;
    // ambil data dari tiap element dalam form
    $nama = htmlspecialchars($data["nama"]);
    $npm = htmlspecialchars($data["npm"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    // upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    // query insert data
    $query = "INSERT INTO MAHASISWA VALUES ('', '$nama', '$npm', '$email', '$jurusan', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload 
    if ($error === 4) {
        echo "<script>
            alert('Pilih Gambar Terlebih Dahulu!');
        </script>";
        return false;
    }

    // cek apakah yang diupload itu gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
            alert('Yang anda upload bukan gambar!');
        </script>";
    }

    // cek jika ukurannya terlalu besar max 2 Mb = 2.000.000
    if ($ukuranFile > 2000000) {
        echo "<script>
            alert('Ukuran gambar terlalu besar!');
        </script>";
    }

    // lolos pengecekan gambar siap diupload
    // nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru = $ekstensiGambar;


    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}


function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM MAHASISWA WHERE id= $id");
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    // ambil data dari tiap element dalam form
    $id = $data['id'];
    $nama = htmlspecialchars($data["nama"]);
    $npm = htmlspecialchars($data["npm"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user menggunakan gambar baru atau lama 
    // jika user saat mengupdate tidak mengupload gambar saat pengeditan data, maka data gambar lama yang akan ditampilkan 
    if ($_FILES['gambar']['error'] = 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    $gambar = htmlspecialchars($data["gambar"]);

    // query untuk merubah dan menimpa data sebelumnya
    $query = "UPDATE MAHASISWA SET 
            nama = '$nama',
            npm = '$npm',
            email = '$email',
            jurusan = '$jurusan',
            gambar = '$gambar'
            WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function cari($keyword)
{
    $query = "SELECT * FROM mahasiswa 
                WHERE 
                nama LIKE '%$keyword%' OR 
                npm LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%'
                ";
    // Mencari nama berdasarkan inputan jika = diganti dengan LIKE(agar dapat mencari tidak sesuai dengan nama asli yang ada di DB)
    // Jika '%$keyword%' artinya saat melakukan pencarian maka tipe datanya akan string contoh pencarian nama maka harus diberi ' '
    // dan agar pencarian data dapat mencari berdasarkan nama yang terkait maka berikan % di awal dan di akhir variabelnya
    return query($query);
}


function registrasi($data)
{
    global $conn;

    // strtolower untuk merubah data yang dimasukkan menjadi lowercase
    // stripslashes untuk merubah inputan apabila ada symbol maka akan dihilangkan agar tidak masuk ke dalam database
    $username = strtolower(stripslashes($data["username"]));
    // mysqli_real_escape_string untuk memungkin kan user memasukkan password ada tanga " " dan akan dimasukkan ke database secara aman
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('Akun sudah terdaftar!');
            </script";
        // memberhentikan function
        return false;
    }

    /* Penjelasan jika saat pembuatan akun dan akun sudah terdaftar maka fungsi di bwh tidak akan dijalankan
    dan akan muncul alert jika akun telah ada.
    Tetapi jika akun belum ada maka fungsi di bwh akan dijalankan, dengan adanya pengecekan ketika password dan konfirmasi password harus sama
    ada juga enkripsi password agar pasword menjadi random dan tidak bisa dilihat oleh orang lain
    Dan jika berhasil maka akan ditambahkan ke dalam database
    */

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
            alert('Konfirmasi Password tidak sesuai!');
            </script";
        return false;
    }

    // enkripsi password
    // password_hash(1password apa yg mau diajak, 2.diacaknya dengan algoritma apa)
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database 
    mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password')");

    // Menghasilkan angka 1 jika berhasil menghasilkan angka -1 jika gagal
    return mysqli_affected_rows($conn);
}
