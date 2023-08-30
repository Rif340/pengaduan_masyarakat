<?php
include "koneksi.php";

$nik = $_POST['nik'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$telp = $_POST['notelp'];

$query = $koneksi->query("INSERT into masyarakat values ('$nik', '$nama', '$username', '$password', '$telp')");
if($query){
    session_start();
   
    $_SESSION['nik'] =  $result['nik'];
    $_SESSION['username'] = $_POST['username'];

    header("location:home.php"); // arahakn ke halaman home
}else{
    header("register.php?pesan=Kesalahan saat Mendaftar, harap mencoba lagi"); // jika tidak ada, maka arahkan ke halaman login kembali
}


?>