<?php
    require 'Functions.php';

    // 2. Cek apakah tombol submit sudah di tekan atau belum
    if ( isset($_POST["login"]) ){
        
        // Menangkap data username dari post dan disimpan ke dalam variabel
        $username = $_POST["username"];
        $password = $_POST["password"];

        // cek username di dalam db yang sama ketika diinputkan saat login, jika ada cek passwordnya
        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
        if ( mysqli_num_rows($result) === 1 ) { //ada berapa baris yang dikembalikan dari fungsi select jika ketemu pasti 1
            
            // cek password (jika ada cek passwordnya, ambil pass dari db user yg tadi)
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row["password"])){
            // password_hash = untuk mengacak string jadi hash
            // password_verify = untuk mengembalikan hash menjadi string
            
                header("Location: Index.php");
                exit;
            }
        }
        // Error ketika gagal login
        // Jika username tidak ada maka masuk ke error = true jika ada maka akan di cek pass wordnya
        $error = true;
    }

?>

<!-- 1. Membuat Halaman Login -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>body{text-align: center;} ul{list-style-type: none;} li{margin: 5px;}</style>
</head>
<body>
    
    <h1>Halaman Login</h1>

    <!-- 3. Pesan Kesalahan (error) -->
    <?php if( isset($error) ) : ?>
        <p style="color: red; font-style:italic; ">Username / Password Salah!</p>
    <?php endif; ?>
    
    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username : </label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password : </label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
    </form>

</body>
</html>