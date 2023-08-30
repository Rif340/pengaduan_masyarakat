<?php
session_start();
include 'koneksi.php';

$nik = $_SESSION['nik'];
$isi = $_POST ['isi_laporan'];
$nama_foto = $_FILES['foto']['name'];
$asal_foto = $_FILES['foto']['tmp_name'];
$tanggal= date('y-m-d');


$koneksi->query("INSERT INTO pengaduan VALUES ('','$tanggal','$nik','$isi','$nama_foto','0');");

echo 'laporan terkirim';

move_uploaded_file($asal_foto, "foto/$nama_foto");

header("location:home.php");
?>