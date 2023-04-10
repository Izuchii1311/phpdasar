<?php
    // Koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "phpdasar");

    // Function Query -- Akan menerima parameter string query "SELECT * FROM mahasiswa"
    // query di halaman index di tangkap dan dimasukkan ke parameter dengan nama ($query)
    function query($query) {
        global $conn;
        // Mengambil semua data dalam 1 kotak
        $result = mysqli_query($conn, $query);

        // Membuat banyak kotak baru
        $rows = [];
        // Melakukan perulangan dan melakukan ambil data simpan ke kotak, ambil data lagi simpan ke kotak lagi
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }
?>