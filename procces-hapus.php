<?php

include "koneksi.php";

$id = $_GET['id'];

$query = $koneksi->query("delete from pengaduan where id_pengaduan=$id");
header("location:home.php");
?>