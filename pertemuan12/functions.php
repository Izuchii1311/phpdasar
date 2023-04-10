<?php
    // Koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "phpdasar");

    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    // parameter $data menerima inputan dari form untuk memberitakuhan ini didapatkan dari post
    function tambah($data) {
        global $conn;

        $nama = htmlspecialchars($data["nama"]);
        $npm = htmlspecialchars($data["npm"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $gambar = htmlspecialchars($data["gambar"]);

        // query insert data
        $query = "INSERT INTO mahasiswa VALUES ('', '$nama', '$npm', '$email', '$jurusan', '$gambar')";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function hapus($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

        return mysqli_affected_rows($conn);
    }

    function ubah($data) {
        global $conn;

        // Panggil id untuk melakukan perubahan query berdasarkan id
        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $npm = htmlspecialchars($data["npm"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $gambar = htmlspecialchars($data["gambar"]);

        // query update data - ambil data dan timpa dengan data baru
        $query = "UPDATE mahasiswa SET 
                    nama = '$nama',
                    npm = '$npm',
                    email = '$email',
                    jurusan = '$jurusan',
                    gambar = '$gambar'
                    WHERE id = '$id'
                    ";
        mysqli_query($conn, $query);

        // Kembalikan Nilai Bool Jika Ada data yang di update
        return mysqli_affected_rows($conn);
    }

    // data keyword diambil
    function cari($keyword){
        // lalu buat query untuk menimpa data sebelumnya
        $query = "SELECT * FROM mahasiswa WHERE 
            nama LIKE '%$keyword%' OR
            npm LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%'
            ";

        // Panggil function query untuk merapihkan data, dengan memasukan data $query di function cari
        return query($query);
    }
?>