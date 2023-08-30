<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = $koneksi->query("SELECT * from pengaduan where id_pengaduan='$id'");
$data = $query->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	
</head>
<body>
<?php  include 'sidebar.php'  ?>
<main>
  <br><br>
  <div class="container pt-4">
  <form action="procces-edit.php?id=<?= $id ?>" method="post">
  <div class="mb-3">
  <h1>halaman edit</h1>
  <label for="exampleFormControlTextarea1" class="form-label">Isi Laporan Disini :</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="isi_laporan"> <?php echo $data['isi_laporan']?> </textarea>
</div>

<button type="submit" class="btn btn-success">Update</button>
</form>
  </div>
</main>
</body>
</html>