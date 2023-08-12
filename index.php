<?php
// session_start();
include "config/connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="app/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="app/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                                    </div>
                                    <form action="config/auth.php" name="login" method="post">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            placeholder="enter your username" />
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="enter your password" />
                                        <br>
                                        <input type="submit" name="login" id="login" class="btn btn-primary"
                                            value="LOGIN"><a class="d-inline text-white-900">
                                        </a></input><br>
                                        <a href="#" class="text-center">Buat Akun ? Hubungi Superadmin</a>
                                    </form>

                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="#">Forgot Password?</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="app/vendor/jquery/jquery.min.js"></script>
    <script src="app/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="app/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="app/js/sb-admin-2.min.js"></script>
    <style>
        .bg-unila {

            background-image: url("buk.jpg");
            
        }
    </style>

</body>

</html>