<?php
include "koneksi.php";
if(!isset($_GET['id'])){
    die("Halaman Error");
}

$isi = $_POST['isi_laporan'];
$id = $_GET['id'];

$query = $koneksi->query("UPDATE pengaduan set isi_laporan='$isi' where id_pengaduan=$id");

header("location:home.php");
?>
