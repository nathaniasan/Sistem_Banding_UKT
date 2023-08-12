<?php
session_start();

include "../config/connection.php";
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit();

}
if (isset($_POST["register"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $nama = $_POST["nama"];
    $email = $_POST["email"];

    // Periksa apakah username sudah digunakan
    $checkQuery = "SELECT * FROM tbl_admin WHERE username='$username'";
    $checkResult = mysqli_query($conn, $checkQuery);
    if (mysqli_num_rows($checkResult) > 0) {
        $error = "Username sudah digunakan!";
    } else {
        // Hash password sebelum disimpan ke database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Simpan data pengguna baru ke database

        $insertQuery = "INSERT INTO `tbl_admin` (`id`, `username`, `password`, `nama`, `email`) VALUES (NULL, '$username', '$hashedPassword', '$nama', '$email');";

        if (mysqli_query($conn, $insertQuery)) {
            // Tampilkan konfirmasi popup
            echo '<script>alert("Data berhasil ditambahkan!");</script>';

            // Redirect ke halaman index setelah popup diklik OK
            echo '<script>window.location.href = "charts.php";</script>';
        } else {
            $error = "Terjadi kesalahan saat menyimpan data!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sistem Informasi2 - Charts</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">

                <div class="sidebar-brand-text mx-3">Sistem Informasi</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0" />

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider" />

            <!-- Heading -->
            <div class="sidebar-heading">Interface</div>

            <!-- Nav Item - Pages Collapse Menu -->

            <!-- Divider -->
            <hr class="sidebar-divider" />

            <!-- Heading -->

            <!-- Nav Item - Charts -->
            <li class="nav-item active">
                <a class="nav-link" href="charts.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Form Admin</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Mahasiswa</span></a>
            </li>

            <!-- Divider -->

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require_once 'navbar.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tambah Admin</h1>
                    <p class="mb-4">INI UNTUK MENAMBAH AKUN ADMIN.</p>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-xl-12 col-lg-12">

                            <!-- Area Chart -->
                            <div class="card shadow p-4">
                                <h3>Silakan Masukan Data Anda dengan Benar!</h3>
                                <form method="POST" action="">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" required class="form-control" id="username" name="username"
                                            placeholder="Masukkan username">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" required class="form-control" id="password"
                                            name="password" placeholder="Masukkan password">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" required class="form-control" id="nama" name="nama"
                                            placeholder="Masukkan nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" required class="form-control" id="email" name="email"
                                            placeholder="Masukkan alamat email">
                                    </div>
                                    <input type="submit" name="register" class="btn btn-primary" value="Daftar">

                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <?php include 'footer.php'; ?>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah anda yakin ingin logout? .</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>

</body>


</html>