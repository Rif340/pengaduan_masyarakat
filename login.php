<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <style>
        @font-face /*perintah untuk memanggil font eksternal*/
        {
            font-family: 'moto-verse.otf';
            src: url('./moto-verse.otf');/*memanggil file font eksternalnya di folder nexa*/
        }
        body{
              background: url('https://github.com/MuhammadArif175/Gambar-Gambar/blob/main/deviant.png?raw=true');
            }

      form{
        background-color: white;
        margin-top: 3rem;
        width: 750px;
        height: 450px;
        margin-top: 10%;
        margin-left: auto;
        margin-right: auto ;
        margin-bottom: auto;
        border-radius: 9px;
        opacity: 0.8;
      }
      
      label,input,button,p{
        margin-top: 1rem;
        margin-left: 1rem;
      }

      .judul{
        margin-left: 3rem;
        font-family: 'moto-verse.otf';
        padding-top: 1rem;
        font-size: 2rem;
        font-weight: bold;
        
      }

      label,button{
        font-family: 'Poppins', sans-serif;
      }
      
    </style>
    <title>PengaduanMasyarakat.com</title>
</head>
<body>

    <form action="procces-login.php" method="POST">
      <p class="judul">pengaduan Masyarakat</p>        
      <label>Masukan Username Disni :</label><br>
      <input type="text" id="" name="username"><br>

      <label>Masukan Password Disni :</label><br>
      <input type="password" id="" name="password"><br>
      
      <br>
      <button type="submit">Masuk !</button>
      <p>Belum Punya Akun ?<a href="register.php">Daftar Disni !</a></p>
    </form>

</body>
</html>