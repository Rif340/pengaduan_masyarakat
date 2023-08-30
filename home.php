<?php
session_start();
if (!isset($_SESSION['nik'])) {
  header("location:login.php");
}

$koneksi = new PDO("mysql:host=localhost;dbname=triger", "root", "");
$nik = $_SESSION['nik'];

$query = $koneksi->query("SELECT * from pengaduan where nik='$nik'");
$data = $query->fetchALL();
?>

<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>

  <?php include 'sidebar.php' ?>
  <!--Main layout-->
  <main style="margin-top:53px;">
    <div class="container pt-4">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">tanggal Laporan</th>
            <th scope="col">nik</th>
            <th scope="col">Isi laporan</th>
            <th scope="col">Nama Foto</th>
            <th scope="col">status</th>
            <th scope="col">edit</th>
          </tr>
        </thead>
        <tbody>

          <?php foreach ($data as $pengaduan) { ?>
            <tr scope="row">
              <td><?= $pengaduan['id_pengaduan'] ?></td>
              <td><?= $pengaduan['tgl_pengaduan'] ?></td>
              <td><?= $pengaduan['nik'] ?></td>
              <td><?= $pengaduan['isi_laporan'] ?></td>
              <td><img src="foto/<?= $pengaduan['foto'] ?>" style="width: 100px; height:100px; border-radius:10px;"></td>
              <td><?= $pengaduan['status'] ?></td>
              <td>
                <a href="detail-pengaduan.php?id=<?=$pengaduan['id_pengaduan']?>" class="btn btn-primary btn-sm">proses</a>
                <a href="halaman-edit.php?id=<?= $pengaduan['id_pengaduan']?>" class="btn btn-success btn-sm">Update</a>
                <a href="procces-hapus.php?id=<?= $pengaduan['id_pengaduan'] ?>" class="btn btn-danger btn-sm">Delete</a>
              </td>
            </tr>
          <?php } ?>

        </tbody>
      </table>
    </div>
  </main>
</body>

</html>