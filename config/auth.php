<?php
session_start();
include "connection.php";

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE username='$username'");
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $storedPassword = $row["password"];
        // var_dump(password_verify($password, $storedPassword));
        // die();
        if (password_verify($password, $storedPassword)) {
            $_SESSION["login"] = true;
            $_SESSION["user"] = $row["nama"];
            header("Location: ../app");
            exit();
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
        echo 'salah';
    }
}

?>