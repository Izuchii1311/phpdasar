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
    $gambar = htmlspecialchars($data["gambar"]);

    // query insert data
    $query = "INSERT INTO MAHASISWA VALUES ('', '$nama', '$npm', '$email', '$jurusan', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
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
