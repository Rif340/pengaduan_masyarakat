<?php
session_start();
include 'koneksi.php';
var_dump($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
<?php  include 'sidebar.php'  ?>
  <main>
    <div class="container pt-4">
      <form action="procces-laporan.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">

          <label for="exampleFormControlTextarea1" class="form-label">Isi Laporan Disini :</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="isi_laporan"></textarea>
        </div>

        <div class="input-group mb-3">
          <input type="file" class="form-control" id="inputGroupFile02" name="foto">
          <label class="input-group-text" for="inputGroupFile02">Upload</label>
        </div>


        <button type="submit" class="btn btn-success">Success</button>
      </form>
    </div>
  </main>
  <!--Main layout-->
</body>

</html>