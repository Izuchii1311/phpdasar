<?php
session_start();
require 'functions.php';

// cek cookie jika ada dia masih login tergantung dari time yang dibuat
if ( isset($_COOKIE['id']) && isset($_COOKIE['key'])){
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    //ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username 
    if ( $key === hash('sha256', $row['username']) ) {
        $_SESSION['login'] = true ;
    }
}

// isset = jika sudah ada
// (!)isset = jika belum ada
if ( isset($_SESSION["login"]) ) {
    header("Location: index.php");
    exit;
}



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

            // cek remember me
            if (isset($_POST['remember'])){
                // buat cookie
                // enkripsi cookie > mengambil data user data id dan username maka yang akan diambil username

                setcookie('id', $row['id'], time()+60);  
                setcookie('key', hash('sha256', $row['username']), time()+60);  
            }

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
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">remember me</label>
            </li>
            <li>
                <button type="sumbit" name="login">Login</button>
            </li>
        </ul>
    </form>
</body>

</html>


<!-- Cookie 
Mirip seperti session yaitu informasi yang bisa kita akses di halaman mana saja di web kita.
Namun cookie disimpan di browser atau di client -- sehingga client dapat memanipulasi cookie
Sedangkan session informasi yang disimpan di server 

Cookie dapat digunakan untuk 
- mengenali user 
- shopping cart (fitur)
- personalisasi (untuk mengetahui perilaku dari seorang user misal iklan atau kesukaan orang ini apa kesukaan orng ini apa)

Tujuan dibuat cookie sekarang adalah membuat 'remember me' pada saat login tujuan nya agar membuat kenyamanan sehingga user tidak harus terus menerus login.

$_COOKIE    -> variabel super global
setcookie() -> function 

Contoh Simple 
Page 1
setcookie('parameter', 'parameter namanya', 'parameter berapa lama waktu expire cookie' );
setcookie('nama', 'Luthfi', time()+60);
                            time()+60 artinya saat cookie dibuat maka itu hanya berlaku selama 60 menit

Page 2
echo $_COOKIE['nama'];

Result
jika membuka halaman 2 secara langsung maka akan terjadi error belum tau apa itu variabel nama
maka kita harus membuka terlebih dahulu halaman 1 kemudian saat ke halaman 2 akan tampil nama Luthfi

Perbedaan dengan session kita dapat memeriksanya dengan 
inspect page -> Application -> Cookies (maka akan ada cookie yang telah ada)
Cookie berlaku hanya 1 sesi, jika browser di close cookienya akan hilang 

-->