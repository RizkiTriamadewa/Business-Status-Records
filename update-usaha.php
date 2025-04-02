<?php

// Include koneksi database
include('koneksi.php');

// Get data dari form
$id_usaha     = $_POST['id_usaha'];
$nama_usaha   = $_POST['nama_usaha'];
$alamat_usaha = $_POST['alamat_usaha'];
$status_usaha = $_POST['status_usaha'];

// Query update data ke dalam database berdasarkan ID
$query = "UPDATE usaha SET nama_usaha = '$nama_usaha', alamat_usaha = '$alamat_usaha', status_usaha = '$status_usaha' WHERE id_usaha = '$id_usaha'";

// Kondisi pengecekan apakah data berhasil diupdate atau tidak
if($connection->query($query)) {
    // Redirect ke halaman index.php 
    header("location: index.php");
} else {
    // Pesan error gagal update data
    echo "Data Gagal Diupdate: " . $connection->error;
}

?>
