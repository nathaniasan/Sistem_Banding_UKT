<?php
session_start();

include "config/connection.php";
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
            header("Location: index.php"); // Arahkan ke halaman login setelah mendaftar
            exit();
        } else {
            $error = "Terjadi kesalahan saat menyimpan data!";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Registrasi Pengguna</title>
</head>

<body>
    <h1>Registrasi Pengguna</h1>
    <?php
    if (isset($error)) {
        echo "<p style='color: red;'>$error</p>";
    }
    ?>
    <form method="POST" action="">
        <label>Username:</label>
        <input type="text" name="username" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <label>Nama:</label>
        <input type="text" name="nama" required><br>

        <label>Email:</label>
        <input type="email" name="email" required><br>

        <input type="submit" name="register" value="Register">
    </form>
</body>

</html>