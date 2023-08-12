<?php
include 'function.php';
session_start();

if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == "add") {

        $berhasil = tambah($_POST);
        // var_dump($_POST['aksi']);
        // die();
        if ($berhasil) {
            $_SESSION['tambah'] = "Data berhasil ditambahkan";
            header("location: ../app/tables.php");
            echo "DATA BERHASIL!";
        } else {
            echo "query errorrrr" . $query;
        }

    } elseif ($_POST['aksi'] == "edit") {
        $berhasil = update($_POST);
        // var_dump($berhasil);
        // die();
        if ($berhasil) {
            header("location: ../app/tables.php");
            echo "DATA BERHASIL!";
        } else {
            echo "query errorrrr";
        }
    }
}

/* ------------ UNTUK DELETE DATA DAN FILE -----------------*/

if (isset($_GET['hapus'])) {
    $id_peserta = $_GET['hapus'];
    $berhasil = delete($id_peserta);
    if ($berhasil) {
        header("location: ../app/tables.php");
    } else {
        echo "query errorrrr" . $query;
    }
}
?>