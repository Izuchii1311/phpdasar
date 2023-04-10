<?php
  session_start();

  // jadi jika tidak ada $_SESSION["login"] maka kembalikan ke halaman login
  if(!isset($_SESSION["login"])){
    header("Location: login.php");
  }
  
    require 'functions.php';

    $id = $_GET["id"];

    if( hapus($id) > 0 ) {
        echo "
        <script>
            alert('Data Berhasil Dihapus');
            document.location.href = 'index.php';
        </script>        
    ";
    } else {
        echo "
        <script>
            alert('Data Gagal Dihapus');
            document.location.href = 'index.php';
        </script>        
    ";
    }

?>