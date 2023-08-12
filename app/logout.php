<?php
session_start();
session_unset();
session_destroy();

// Mengarahkan pengguna kembali ke halaman login atau halaman utama
header("Location: ../index.php"); // Ganti login.php dengan halaman tujuan setelah logout
exit();

?>