<?php

include "koneksi.php";

$id = $_GET['id'];

$query = $koneksi->query("DELETE from pengaduan where id_pengaduan=$id");

if($query){
    header("location:petugas.php");
}else{
    print_r($koneksi->errorInfo());
    die();
}
?>