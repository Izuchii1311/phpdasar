<?php

    require 'functions.php';

    // jika tombol registrasi dibuat maka jalankan fungsi berikut
    if (isset($_POST["registrasi"])){

        if( registrasi($_POST) > 0){
            echo "
            <script>
                alert('Akun berhasil dibuat...');
            </script>        
        ";
        } else {
            echo mysqli_error($conn);
        }
    }

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi Akun</title>
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

    <section class="bg-custom" style="background-image: url('https://images.unsplash.com/photo-1678212599034-8df812307128?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=877&q=80');">
        <div class="mask d-flex align-items-center">
            <div class="container mt-3 mb-3">
                
                <div class="row d-flex justify-content-center align-items-center">

                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Registrasi Akun Baru</h2>

                                <form action="" method="POST">
                                    <div class="mb-2">
                                        <label class="form-label" for="username">Username : </label>
                                        <input type="text" id="username" name="username" class="form-control" required autocomplete="off" placeholder="Masukkan Username akun...">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" id="password" name="password" class="form-control" required autocomplete="off" placeholder="Password...">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="password2">Konfirmasi Password</label>
                                        <input type="password" id="password2" name="password2" class="form-control" required autocomplete="off" placeholder="Konfirmasi Password...">
                                    </div>

                                    <div class="form-check d-flex mb-4">
                                        <input class="form-check-input me-2" type="checkbox">
                                        <label class="form-check-label" for="">
                                        Saya setuju semua pernyataan <a href="#!" class="text-body"><u>Ketentuan Layanan.</u></a>
                                        </label>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" name="registrasi" class="btn btn-success btn-block btn-lg gradient-custom-button text-body">Registrasi</button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">Sudah Punya Akun? <a href="#!"
                                        class="fw-bold text-body"><u>Login Disini!</u></a></p>

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