<?php 
    $conn = mysqli_connect("localhost", "root", "", "phplatihan");

    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    // 9. Membuat Funtion Tambah
    function tambah($data /*Nama parameter ini bebas*/) {
        global $conn;   
        // 6 / 10. Ambil data dari tiap element di dalam form
        $nama = htmlspecialchars($data["nama"]);
        $npm = htmlspecialchars($data["npm"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $gambar = htmlspecialchars($data["gambar"]);

        // 7. Query insert data
        $query = "INSERT INTO mahasiswa VALUES('', '$nama', '$npm', '$email', '$jurusan', '$gambar')";
        mysqli_query($conn, $query);

        // 13. Melakukan return yang diambil dari mysqli_affected_rows
        return mysqli_affected_rows($conn);
    }


    // 22. Membuat Function Hapus
    function hapus($id) {
        global $conn;
        mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

        return mysqli_affected_rows($conn);
    }
?>