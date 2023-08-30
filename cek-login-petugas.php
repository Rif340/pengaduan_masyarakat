<?php
session_start();


if(!isset($_SESSION['username']) AND !isset($_SESSION['level'])){
    // echo "tidak ada ssesion <br />";
    header("location:login.php?pesan=Silahkan Login Terlebih Dahulu");
}
?>
