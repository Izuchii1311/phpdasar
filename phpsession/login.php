<?php
session_start();

// isset = jika sudah ada
// (!)isset = jika belum ada
if ( isset($_SESSION["login"]) ) {
    header("Location: index.php");
    exit;
}

require 'functions.php';


if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // cek username apa ada saat login
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    // menghitung ada berapa baris yang dikembalikan fungsi select ini
    // jika username ada maka hasilnya 1 atau true
    if (mysqli_num_rows($result) === 1) {           // maka selanjutnya akan di cek password
        $row = mysqli_fetch_assoc($result);
        // password hash mengacak string password menjadi hash
        // sedangkan password verify mengubah string dan mengecek apakah sama dengan has jika sama maka benar
        if (password_verify($password, $row["password"])) {
            //set Session
            // jadi di cek jika user sudah login maka akan ditampilkan halaman index tpi jika user belum login maka tidak bisa menuju halaman index
            $_SESSION["login"] = true;

            header("Location: index.php");
            exit;
            // agar berhenti setelah ke header dan tidak berjalan lagi yang bawahnya 
        }
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        label {
            display: block;
        }
    </style>
</head>

<body>
    <h1>Halaman Login</h1>

    <?php
    if (isset($error)) :
    ?>

        <p style="color:red; font-style:italic;">username / password salah!</p>

    <?php
    endif;
    ?>

    <!-- atribut utama form dan Penting! 
    action="" dikosongkan karena datanya akan di kirim ke halaman ini sendiri
    dan method= jenis -->

    <form action="" method="POST">
        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <button type="sumbit" name="login">Login</button>
            </li>
        </ul>
    </form>
</body>

</html>