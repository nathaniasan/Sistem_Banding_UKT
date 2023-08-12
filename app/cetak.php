<?php
include '../config/connection.php';
session_start();
// var_dump($_SESSION['login']);

if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}

$query = "SELECT * FROM `peserta`";
$koneksi = mysqli_query($conn, $query); //koneksi ke ddatabase
if (!$koneksi) {
    die();
}
$no = 1; //untuk penomoran agar beda dari database
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"> -->

</head>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable({
            responsive: true
        });
    });
</script>

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
            <!-- Divider -->
            <hr class="sidebar-divider" />

            <!-- Heading -->

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Form Admin</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
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
                <?php include 'navbar.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Pembayaran Mahasiswa</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahdata">
                                + Tambah Data
                            </button>
                            <!-- <h6 class="m-0 font-weight-bold text-primary">DATA BNBP Example</h6> -->
                        </div>
                        <div class="card-body">
                            <!-- Button untuk membuka modal Tambah Data Baru -->
                            <?php require_once 'form_data.php' ?>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NPM</th>
                                        <th>Fakultas</th>
                                        <th>Jurusan</th>
                                        <th>Nama Bank</th>
                                        <th>Jumlah Dibayarkan</th>
                                        <th>Jumlah Dikembalikan</th>
                                        <th>Transfer Bank</th>
                                        <th>No Rekening</th>
                                        <th>Nama Pemilik Rekening</th>
                                        <th>Keterangan</th>
                                        <th class="kolom-aksi">Aksi</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($result = mysqli_fetch_assoc($koneksi)) {
                                            ?>
                                            <tr>
                                                <td>

                                                    <?php echo $no++ . "."; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['nama']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['npm']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['fakultas']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['jurusan']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['nama_bank']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['jumlah_dibayarkan']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['jumlah_dikembalikan']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['transfer_bank']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['no_rekening']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['nama_pemilik_rekening']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['keterangan']; ?>
                                                </td>

                                                <td>
                                                    <!-- edit button -->
                                                    <!-- mengubah/edit data dengan id siswa -->
                                                    <a href="edit_data.php?ubah=<?php echo $result['id_peserta']; ?>"
                                                        class="btn btn-success btn-sm" type="button"><i
                                                            class="fa fa-pencil"></i></a>
                                                    <!-- delete button -->

                                                    <a href="../controllers/proses.php?hapus=<?php echo $result['id_peserta']; ?>"
                                                        class="btn btn-danger btn-sm" type="button"
                                                        onClick="return confirm('Apakah anda yakin ingin menghapus data?')"><i
                                                            class="fa fa-trash"></i>
                                                    </a>

                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
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
                    <a class="btn btn-primary" href="../index.php">Logout</a>
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

    <!-- Page level plugins setting datatables -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="https://use.fontawesome.com/0ad399e9a6.js"></script>


    <style>
        .kolom-aksi {
            width: 20px !important;
        }
    </style>

</body>

</html>