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
$no = 1; //untuk penomoran agar beda dari database
$nama = '';
$npm = '';
$fakultas = '';
$jurusan = '';
$nama_bank = '';
$jumlah_dibayarkan = '';
$jumlah_dikembalikan = '';
$transfer_bank = '';
$no_rekening = '';
$nama_pemilik_rekening = '';
$keterangan = '';

if (isset($_GET['ubah'])) {
    $id_peserta = $_GET['ubah'];

    $query = "SELECT * FROM `peserta` WHERE id_peserta = '$id_peserta';";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);

    $nama = $result['nama'];
    $npm = $result['npm'];
    $fakultas = $result['fakultas'];
    $jurusan = $result['jurusan'];
    $nama_bank = $result['nama_bank'];
    $jumlah_dibayarkan = $result['jumlah_dibayarkan'];
    $jumlah_dikembalikan = $result['jumlah_dikembalikan'];
    $transfer_bank = $result['transfer_bank'];
    $no_rekening = $result['no_rekening'];
    $nama_pemilik_rekening = $result['nama_pemilik_rekening'];
    $keterangan = $result['keterangan'];
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

    <title>EDIT DATA</title>

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
                    <span>Edit data Mahasiswa</span></a>
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
                    <h1 class="h3 mb-2 text-gray-800">Edit Data</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">

                            <!-- <h6 class="m-0 font-weight-bold text-primary">DATA BNBP Example</h6> -->
                        </div>
                        <div class="card-body">
                            <!-- Button untuk membuka modal Tambah Data Baru -->
                            <!-- form edit ygy -->

                            <form method="POST" action="../controllers/proses.php">
                                <input type="hidden" value="<?php echo $id_peserta ?>" name="id_peserta">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input required type="text" class="form-control" id="nama" name="nama"
                                        placeholder="Masukkan nama" value="<?php echo $nama; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="npm">NPM</label>
                                    <input required type="number" class="form-control" name="npm"
                                        placeholder="Masukkan NPM" value="<?php echo $result['npm']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="fakultas">Fakultas</label>
                                    <select class="form-control" name="fakultas" id="fakultas">
    <?php
    $fakultas = array(
        "FEB" => "Fakultas Ekonomi dan Bisnis",
        "FH" => "Fakultas Hukum",
        "FKIP" => "Fakultas Keguruan dan Ilmu Pendidikan",
        "FT" => "Fakultas Teknik",
        "FP" => "Fakultas Pertanian",
        "FK" => "Fakultas Kedokteran",
        "FMIPA" => "Fakultas Matematika dan Ilmu Pengetahuan Alam"
    );

    foreach ($fakultas as $key => $value) {
        $selected = "";
        if (isset($_POST['fakultas']) && $_POST['fakultas'] === $key) {
            $selected = "selected";
        }
        echo "<option value=\"$key\" $selected>$value</option>";
    }
    ?>
</select>
                                </div>

                                <div class="form-group">
                                    <label for="jurusan">Jurusan</label>
                                    <select name="jurusan" class="form-control" id="jurusan" >
    <?php
    $jurusanUnila = [
        "Sosiologi",
    "Hubungan Internasional",
    "Ilmu Komunikasi",
    "Ilmu Administrasi Bisnis",
    "Ilmu Administrasi Negara",
    "Ilmu Pemerintahan",
    "Ilmu Perpustakaan",
    "Teknik Mesin",
    "Ilmu Teknik",
    "Teknik Kimia",
    "Teknik Elektro",
    "Teknik Industri",
    "Teknik Pertambangan",
    "Teknik Geomatika",
    "Teknik Geodesi",
    "Teknik Sipil",
    "Teknik Informatika",
    "Teknik Geofisika",
    "Arsitektur",
    "Teknik Geografi",
    "Ilmu Tanah",
    "Agribisnis",
    "Teknik Pertanian",
    "Kehutanan",
    "Penyuluhan dan Komunikasi Pertanian",
    "Agroteknologi",
    "Peternakan",
    "Budidaya Perairan",
    "Manajemen Sumber Daya Perairan",
    "Proteksi Tanaman",
    "Teknologi Industri Pertanian",
    "Kelautan",
    "Kedokteran",
    "Farmasi",
    "PGSD",
    "Pendidikan Bahasa dan Sastra Indonesia",
    "Pendidikan Kimia",
    "Pendidikan Fisika",
    "Pendidikan Matematika",
    "Pendidikan Bahasa Inggris",
    "Pendidikan Anak Usia Dini",
    "Pendidikan Jasmani dan Kesehatan",
    "Pendidikan Teknologi Informasi",
    "Bimbingan dan Konseling",
    "Seni Tari",
    "Seni Musik",
    "Pendidikan Geografi",
    "Pendidikan Bahasa Lampung",
    "Pendidikan Bahasa Perancis",
    "Perbankan",
    "Ilmu Ekonomi",
    "Akuntansi",
    "Manajemen",
    "Ekonomi Pembangunan",
    "Perpajakan",
    "Manajemen Keuangan",
    "Ilmu Hukum",
    "Fisika",
    "Matematika",
    "Ilmu Komputer",
    "Biologi",
    "Kimia"
    ];

    foreach ($jurusanUnila as $jurusan) {
        $selected = "selected";
        echo "<option value=\"$jurusan\" $selected>$jurusan</option>";
    }
    ?>
</select>

                                </div>
                                <div class="form-group">
                                    <label for="nama_bank">Nama Bank</label>
                                    <select class="form-control" name="nama_bank">
                                        <option value="BRI">BRI</option>
                                        <option value="BNI">BNI</option>
                                        <option value="BSI">BSI</option>
                                        <option value="BTN">BTN</option>
                                        <option value="KB Bukopin">KB Bukopin</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_dibayarkan">Jumlah Dibayarkan</label>
                                    <input required type="text" class="form-control" name="jumlah_dibayarkan" value="<?php echo $jumlah_dibayarkan ?>"
                                        placeholder="Masukkan jumlah yang dibayarkan" >
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_dikembalikan">Jumlah Dikembalikan</label>
                                    <input required type="number" class="form-control" name="jumlah_dikembalikan" value="<?php echo $jumlah_dikembalikan ?>"
                                        placeholder="Masukkan jumlah yang dikembalikan">
                                </div>
                                <div class="form-group">
                                    <label for="transfer_bank">Transfer Bank</label>
                                    <input required type="number" class="form-control" name="transfer_bank" value="<?php echo $transfer_bank?>"
                                        placeholder="Masukkan transfer bank">
                                </div>
                                <div class="form-group">
                                    <label for="no_rekening">Nomor Rekening</label>
                                    <input required type="number" class="form-control" name="no_rekening" value="<?php echo  $no_rekening?>"
                                        placeholder="Masukkan nomor rekening">
                                </div>
                                <div class="form-group">
                                    <label for="nama_pemilik_rekening">Nama Pemilik Rekening</label>
                                    <input required type="text" class="form-control" name="nama_pemilik_rekening"  value="<?php echo  $nama_pemilik_rekening?>"
                                        placeholder="Masukkan nama pemilik rekening">
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <select required class="form-control" name="keterangan" value="<?php echo $keterangan?>" >
                                        <option <?php if ($keterangan == "Pengembalian PNBP") {
              echo "selected";
            } ?> value="Pengembalian PNBP">Pengembalian PNBP</option>
                                        <option <?php if ($keterangan == "Hasil Banding UKT") {
              echo "selected";
            } ?> value="Hasil Banding UKT">Hasil Banding UKT</option>
                                        
                                    </select>
                                </div>
                                <div class="col-sm-8 mb-5">
                                    <?php
                                    if (isset($_GET['ubah'])) {
                                        ?>
                                        <button type="submit" name="aksi" value="edit" class="btn btn-primary"><i
                                                class="fa fa-floppy-o" aria-hidden="true"></i> Simpan Perubahan</button>
                                        <?php
                                    } else {
                                        ?>
                                        <button onClick="return confirm('Apakah anda yakin ingin simpan data?')"
                                            type="submit" name="aksi" value="add" class="btn btn-primary"><i
                                                class="fa fa-floppy-o" aria-hidden="true"></i> Tambah</button>
                                        <?php
                                    }
                                    ?>
                                    <a type="button" href="tables.php" class="btn btn-danger"><i class="fa fa-reply"
                                            aria-hidden="true"></i>
                                        Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
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
    <!-- script fakultas dan jurusan -->

    <script>
        function updateJurusan() {
            var fakultas = document.getElementById("fakultas").value;
            var jurusan = document.getElementById("jurusan");

            // Menghapus opsi jurusan yang ada sebelumnya
            jurusan.innerHTML = "";

            // Menambahkan opsi jurusan berdasarkan pilihan fakultas
            if (fakultas === "FK") {
                var jurusanFakultas1 = ["Jurusan", "Jurusan 1.2", "Jurusan 1.3"];
                for (var i = 0; i < jurusanFakultas1.length; i++) {
                    var option = document.createElement("option");
                    option.text = jurusanFakultas1[i];
                    option.value = jurusanFakultas1[i];
                    if (jurusanFakultas1[i] === "<?php echo $postedJurusan; ?>") {
                        option.selected = true;
                    }
                    jurusan.add(option);
                }
            } else if (fakultas === "fakultas2") {
                var jurusanFakultas2 = ["Jurusan 2.1", "Jurusan 2.2", "Jurusan 2.3"];
                for (var i = 0; i < jurusanFakultas2.length; i++) {
                    var option = document.createElement("option");
                    option.text = jurusanFakultas2[i];
                    option.value = jurusanFakultas2[i];
                    if (jurusanFakultas2[i] === "<?php echo $postedJurusan; ?>") {
                        option.selected = true;
                    }
                    jurusan.add(option);
                }
            }
            // Tambahkan blok if else untuk setiap fakultas yang ada
        }
    </script>

</body>

</html>