<?php

    // 9. Membuat Logout
    session_start();   // Memulai Session
    $_SESSION = [];    // Ditimpa dengan Array kosong supaya yakin Sessionnya Hilang
    session_unset();   // Menghilangkan Session
    session_destroy(); // Hapus Session

    header("Location: Login.php"); // Melemparkan ke halaman Login.php
    exit;

?>
