<?php

    session_start();
    require 'functions.php';

    // cek cookie
    if( isset( $_COOKIE['id'] ) && isset ( $_COOKIE['key'] )){
        // ambil id dan key ke dalam variabel
        $id = $_COOKIE['id'];
        $key = $_COOKIE['key'];

        // ambil username berdasarkan id
        $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
        $row = mysqli_fetch_assoc($result);

        // cek cookie dan username sama tidak
        // $key adalah username, $row["username"] adalah username di database 
        if ( $key === hash('sha265', $row['username'])){
            // kalo benar maka session dibentuk
            $_SESSION['login'] = true;
        }

    }

    if( isset($_SESSION["login"])){
        header("Location: index.php");
        exit;
    }


    if( isset($_POST["login"]) ) {
        
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

        if( mysqli_num_rows($result) === 1 ){
            $row = mysqli_fetch_assoc($result);
            if( password_verify($password, $row["password"])) {
                $_SESSION["login"] = true;

                    // coookie
                    // Check remember me
                    if ( isset ($_POST["remember"])){
                        // mengenkripsikan user id dan username (enkripsi)
                        setcookie('id', $_row['id'], time()+1200); 
                        // enkripsi menggunakan hash
                        setcookie('key', hash('sha256', $row['username']), time()+1200); 

                    }

                header("Location: index.php");
                exit;
            }
        }
        
        $error = true;
    }

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .bg-custom {
            background-size: cover;
        }

        .gradient-custom-button {
        /* fallback for old browsers */
        background: #84fab0;
        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
        }
    </style>
  </head>
  <body>

    <section class="bg-custom" style="background-image: url('https://images.unsplash.com/photo-1678212599034-8df812307128?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=877&q=80'); height:658px;">
        <div class="mask d-flex align-items-center">
            <div class="container mt-5 mb-3">
                
                <div class="row d-flex justify-content-center align-items-center">

                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Login</h2>

                                <form action="" method="POST">
                                    <div class="mb-2">
                                        <label class="form-label" for="username">Username : </label>
                                        <input type="text" id="username" name="username" class="form-control" required autocomplete="off" placeholder="Masukkan Username akun...">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" id="password" name="password" class="form-control" required autocomplete="off" placeholder="Password...">
                                    </div>

                                    <div class="form-check d-flex mb-4">
                                        <input class="form-check-input me-2" type="checkbox" name="remember" id="remember">
                                        <label class="form-check-label" for="remember">Remember me...</label>
                                    </div>

                                    <div class="mb-3">
                                        <?php if( isset($error)) : ?>
                                            <p style="color:red; font-style:italic;">Username atau Password Salah!!!</p>
                                        <?php endif; ?>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" name="login" class="btn btn-success btn-block btn-lg gradient-custom-button text-body">Login</button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">Belum punya? <a href="registrasi.php"
                                        class="fw-bold text-body"><u>Daftar Disini!</u></a></p>

                                </form>

                            </div><!--End Card Body-->
                        </div><!--End Card-->
                    </div><!--End Col-->
                </div><!--End Row-->
            </div> <!--End Container-->
        </div>

    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>