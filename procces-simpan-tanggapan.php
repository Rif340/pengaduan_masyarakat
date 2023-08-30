<?php
include "cek_login.php";
include "koneksi.php";

$id = $_POST['id'];
$tanggal = date("Y-m-d");
$tanggapan = $_POST['tanggapan'];
$id_petugas = $_SESSION['username'];
$query = $koneksi->query("INSERT into tanggapan values(null, $id, '$tanggal', '$tanggapan', $id_petugas)");

if($query){
    header("location:detail-pengaduan.php?id='$id'");
}else{
    print_r($koneksi->errorInfo());
    die();
}
?>
