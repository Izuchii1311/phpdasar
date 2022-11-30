<?php 
    // 2. Lakukan Koneksi
    $conn = mysqli_connect("localhost", "root", "", "phplatihan");

    // 5. Membuat Function Query
    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        // Wadah dari data
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        // Kembalikan wadah data
        return $rows;
    }
?>