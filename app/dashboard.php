<?php
include "../config/connection.php";

$count = "SELECT COUNT(*) AS total FROM peserta";
$count1 = "SELECT COUNT(*) AS total FROM tbl_admin";

$result = mysqli_query($conn, $count);
$row = mysqli_fetch_assoc($result);
$total = $row['total'];
$result1 = mysqli_query($conn, $count1);
$row1 = mysqli_fetch_assoc($result1);
$total1 = $row1['total'];
// Periksa apakah pengguna telah login
?>

<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            <h3>Jumlah Data Masuk</h3>
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php echo $total . " data"; ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            <h3>Total Pengguna</h3>
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php echo $total1 . " pengguna"; ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->

</div>