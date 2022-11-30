<?php

    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();

    // 6. Hapus Cookie ketika Logout
    setcookie('id', '', time() - 3600);
    setcookie('key', '', time() - 3600);

    header("Location: Login.php");
    exit;

?>
