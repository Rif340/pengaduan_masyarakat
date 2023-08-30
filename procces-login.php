<?php
session_start();
include('koneksi.php');


$username = $_POST['username'];
$password = $_POST['password'];


$query = $koneksi->query("SELECT * from masyarakat where username='$username' AND password='$password'");
if(!$query){
    print_r($koneksi->errorInfo());
    die();
}

$data = $query->rowCount(); //menampilkan berapa banyak data, yang didapat pada query select diatas

if($data > 0){ // jika data lebih dari 0 ( yang artinya terdapat akun yang sesuai )
    $result = $query->fetch();


    $_SESSION['nik'] = $result['nik'];
    $_SESSION['username'] = $_POST['username'];


    header("location:home.php"); // arahakn ke halaman home
}else{
    $query = $koneksi->query("SELECT * from petugas where username='$username' AND password='$password'");
    $data = $query->rowCount();
    if($data > 0){
        $result = $query->fetch();
        $_SESSION['level'] = $result['level'];
        $_SESSION['username'] = $result['username'];
        $_SESSION['id_petugas'] = $result['id_petugas'];

        header("location:petugas.php");
        
    }else{
        header("location:login.php?pesan=username atau password salah"); // jika tidak ada, maka arahkan ke halaman login kembali
    }
}
?>