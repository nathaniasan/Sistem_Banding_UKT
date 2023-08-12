<?php

include '../config/connection.php';
// Fungsi untuk melakukan operasi CREATE
function tambah($data)
{
    // Simpan data ke database atau lakukan proses lainnya di sini
    $nama = $data['nama'];
    $npm = $data['npm'];
    $fakultas = $data['fakultas'];
    $jurusan = $data['jurusan'];
    $nama_bank = $data['nama_bank'];
    $jumlah_dibayarkan = $data['jumlah_dibayarkan'];
    $jumlah_dikembalikan = $data['jumlah_dikembalikan'];
    $transfer_bank = $data['transfer_bank'];
    $no_rekening = $data['no_rekening'];
    $nama_pemilik_rekening = $data['nama_pemilik_rekening'];
    $keterangan = $data['keterangan'];

    // Contoh: Simpan data ke database
    $conn = $GLOBALS['conn'];
    $query = "INSERT INTO `peserta`
            VALUES (NULL,'$nama', '$npm', '$fakultas', '$jurusan', '$nama_bank', '$jumlah_dibayarkan', '$jumlah_dikembalikan', '$transfer_bank', '$no_rekening', '$nama_pemilik_rekening', '$keterangan')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        return true; // Proses tambah data berhasil
    } else {
        return false; // Proses tambah data gagal
    }


}

// Fungsi untuk melakukan operasi READ
function getData($id)
{
    // Dapatkan data dari database berdasarkan ID atau lakukan proses lainnya di sini
    $conn = $GLOBALS['conn'];
    $query = "SELECT * FROM `peserta` WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    return $data;
}

// Fungsi untuk melakukan operasi UPDATE
function update($data)
{
    // Update data di database berdasarkan ID atau lakukan proses lainnya di sini
    $id_peserta = $data['id_peserta'];
    $nama = $data['nama'];
    $npm = $data['npm'];
    $fakultas = $data['fakultas'];
    $jurusan = $data['jurusan'];
    $nama_bank = $data['nama_bank'];
    $jumlah_dibayarkan = $data['jumlah_dibayarkan'];
    $jumlah_dikembalikan = $data['jumlah_dikembalikan'];
    $transfer_bank = $data['transfer_bank'];
    $no_rekening = $data['no_rekening'];
    $nama_pemilik_rekening = $data['nama_pemilik_rekening'];
    $keterangan = $data['keterangan'];
    // Contoh: Update data di database
    $conn = $GLOBALS['conn'];
    $query = "UPDATE `peserta` SET nama='$nama', npm='$npm', fakultas='$fakultas', jurusan='$jurusan', nama_bank='$nama_bank', jumlah_dibayarkan='$jumlah_dibayarkan', 
            jumlah_dikembalikan='$jumlah_dikembalikan', transfer_bank='$transfer_bank', no_rekening='$no_rekening', nama_pemilik_rekening='$nama_pemilik_rekening', 
            keterangan='$keterangan' WHERE `peserta`.`id_peserta` = '$id_peserta';";
    $result = mysqli_query($conn, $query);

    if ($result) {
        return true; // Proses tambah data berhasil
    } else {
        return mysqli_error($conn); // Proses tambah data gagal
    }
}

// Fungsi untuk melakukan operasi DELETE
function delete($id_peserta)
{
    // Hapus data dari database berdasarkan ID atau lakukan proses lainnya di sini
    $conn = $GLOBALS['conn'];
    $query = "DELETE FROM `peserta` WHERE id_peserta=$id_peserta";
    $result = mysqli_query($conn, $query);

    if ($result) {
        return true; // Proses tambah data berhasil
    } else {
        return false; // Proses tambah data gagal
    }

}

// Memproses form jika ada request POST
?>