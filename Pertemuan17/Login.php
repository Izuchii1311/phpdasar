<?php
    session_start();

    require 'Functions.php';

    //Diganti
    // 3. Cek Cookienya jika ada berarti dia masih Login
    // if ( isset($_COOKIE['login']) ) {
    //     cek jika login true maka set Sessionnya jadi true 
    //     if ($_COOKIE['login'] == 'true'){ // boolean
    //         $_SESSION['login'] = true;
    //     }
    // }

    // 5. Cek Cookie (ada ga cookie id dan isset cookie key)
    if ( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
        // jika ada cek
        $id = $_COOKIE['id'];
        $key = $_COOKIE['key'];

        // mencari data mahasiswa berdasarkan id supaya mendapatkan username dan usernamenya dibandingkan dengan key
        $result = mysqli_query ($conn, "SELECT username FROM user WHERE id = $id");
        $row = mysqli_fetch_assoc($result);

        // Cek cookie dan username (sama atau tidak)
        // key adalah username yang sudah diacak dan menyambungkan dengan username yang telah di hash dan di cek sama tidak
        if ( $key === hash('sha256', $row['username'])){
            // jika benar, dan session loginnya ada maka akan langsung login dan pindah ke halaman index
            $_SESSION['login'] = true; 
        }
    }

        // jika sessionnya ada (true), pindahkan langsung ke index.php
    if ( isset($_SESSION["login"])){
        header("Location: Index.php");
        exit;
    }



    if ( isset($_POST["login"]) ){        
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
        if ( mysqli_num_rows($result) === 1 ) {
            
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row["password"])){
                $_SESSION["login"] = true;
                // 2. Cek Remember me
                if ( isset($_POST["remember"]) ){
                    // Buat Cookie
                    setcookie('id', $row['id'], time() +600);
                    // 4. Enkripsi Cookie
                    setcookie('key', hash('sha256', $row['username']), time() + 600);
                }

                header("Location: Index.php");
                exit;
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
    <title>Login</title>
    <style>body{text-align: center;} ul{list-style-type: none;} li{margin: 5px;}</style>
</head>
<body>
    
    <h1>Halaman Login</h1>

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
            <!-- 1. Membuat checkbox Remember Me -->
            <li>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember Me!</label>
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
    </form>

</body>
</html>