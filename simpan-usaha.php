<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$id_usaha     = $_POST['id_usaha'];
$nama_usaha   = $_POST['nama_usaha'];
$alamat_usaha = $_POST['alamat_usaha'];
$status_usaha = $_POST['status_usaha'];

//query insert data ke dalam database
$query = "INSERT INTO usaha (id_usaha, nama_usaha, alamat_usaha, status_usaha) VALUES ('$id_usaha', '$nama_usaha','$alamat_usaha', '$status_usaha')";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($connection->query($query)) {

    //redirect ke halaman index.php 
    header("location: index.php");

} else {

    //pesan error gagal insert data
    echo "Data Gagal Disimpan!";

}

?>