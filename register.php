<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Minified CSS and JS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
  <meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <title>pengaduanMasyarakat.com</title>
  <style>
    body {
      background: url('https://github.com/MuhammadArif175/Gambar-Gambar/blob/main/deviant.png?raw=true');
    }

    #bungkusPertama {
      overflow: hidden;
      width: 900px;
      margin: 15%;
      height: 544px;
      background-color: white;
      display: flex;
      border-top-left-radius: 20px;
      border-bottom-left-radius: 20px;
      border-top-right-radius: 20px;
      border-bottom-right-radius: 20px;
    }


    .bungkusform h1 {
      margin-top: 12px;
      color: #241468;
    }

    label {
      color: #333;
      margin-bottom: 0px;
    }

    label,
    p {
      margin-top: 12px;
    }

    input {
      margin-top: 2px;
    }

    #bungkusGambar img {
      width: 450px;
      height: auto;
      border-top-left-radius: 20px;
      border-bottom-left-radius: 20px;
    }


    button {
      color: navajowhite;
      border-radius: 11px;
      padding: 15px;
      align-items: center;
      margin-top: 2rem;
      border: none;
      outline: none;
      background-color: #8922E5;
      width: 300px;
      height: 40px;
    }

    form {
      margin-top: 12px;
      margin-left: 15px;
      margin-right: 15px;
      width: 400px;
      height: 100%;
    }

    input {
      width: 300px;
      height: 30px;
      padding: 0px;
      border-radius: 2px;
      outline: #24E836;
      border: 1px solid #24E836;
    }
  </style>


</head>

<body>
  <div id="bungkusPertama">

    <div id="bungkusGambar">
      <img src="https://raw.githubusercontent.com/MuhammadArif175/Gambar-Gambar/main/background5.jpg">
    </div>

    <div class="bungkusform">
      <center>
        <h1>Form Regisrastrasi</h1>
      </center>
      <form action="procces-register.php" method="post">

        <label for="nik">Masukan NIK Sesuai KTP:</label>
        <input type="text" name="nik" class="form-control" id="nik" aria-describedby="nik" placeholder="Nik" autocomplete="off">

        <label for="nama">Masukan nama Anda:</label>
        <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama" placeholder="nama" autocomplete="off">

        <label for="username">Buat Username Anda:</label>
        <input type="text" name="username" class="form-control" id="username" aria-describedby="nama" placeholder="nama" autocomplete="off">

        <label for="password">Password :</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Password">


        <label for="notelp" class="form-label">No. Telepon</label>
        <input type="text" name="notelp" id="notelp" class="form-control" placeholder="No. Telepon" aria-describedby="helpId">
        <center>
          <button type="submit" class="btn btn-primary">Register</button>
          <p>Sudah Punya Akun?<a href="login.php"> Masuk Lewat sini !</a></p>
          <div id="my-signin2"></div>
          <script>
            function onSuccess(googleUser) {
              console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
            }

            function onFailure(error) {
              console.log(error);
            }

            function renderButton() {
              gapi.signin2.render('my-signin2', {
                'scope': 'profile email',
                'width': 240,
                'height': 50,
                'longtitle': true,
                'theme': 'dark',
                'onsuccess': onSuccess,
                'onfailure': onFailure
              });
            }
          </script>

          <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
        </center>
    </div>

    </form>
  </div>

  </div>

</body>

</html>