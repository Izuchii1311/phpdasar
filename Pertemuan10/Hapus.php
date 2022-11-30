<?php
    // 21. Menghubungkan ke halaman Functions.php
    require "Functions.php";

    // 19. Membuat variabel id untuk menangkap variabel id dari urlnya
    $id = $_GET["id"];

    // 20. Membuat Function untuk mengirimkan id hapus
    if ( hapus($id) > 0) {
        echo 
        "<script>
            alert('Data Berhasil Dihapus');
            document.location.href = 'Index.php';
        </script>";
        } else {
            echo 
            "<script>
                alert('Data Gagal Dihapus');
                document.location.href = 'Index.php';
            </script>";
        }

?>