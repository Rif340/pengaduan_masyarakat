<?php 
include "cek-login-petugas.php";
include "koneksi.php";

$id = $_GET['id'];

$query = $koneksi->query("select * from pengaduan where id_pengaduan=$id");
$data = $query->fetch();

// ===== Tanggapan

$query = $koneksi->query("SELECT * 
from tanggapan 
inner join petugas on petugas.id_petugas = tanggapan.id_petugas
where id_pengaduan=$id
");
$pengaduan = $query->fetchAll();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PengaduanMasyarakat.com</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="bs/css/bootstrap.min.css">
</head>
<body>
    <?php include "navbar.php" ?>

    <div class="container p-5" style="background:#8080801a;border-radius:5px">
        <h1><?= $data['isi_laporan'] ?></h1>
        <small class="text-muted"><?= $data['tgl_pengaduan'] ?></small>
        <br>
        <span class="badge bg-success">Status : <?= $data['status'] ?></span>
        <hr>

        <img src="foto/<?= $data['foto'] ?>" width="500px" alt="">


        <div id="tanggapan" class="mt-5">
            <h2>Tanggapan</h2>
            <hr>
            <?php if(count($pengaduan) == 0) : ?>
                <h6>Belum Ada Tanggapan</h6>
            <?php endif ?>
            <div id="tanggapan-komen">
                <?php foreach($pengaduan as $pengaduan) : ?>
                <div class="p-3">
                    <div style="background:#80808024" class="p-3">
                        <h6><?= $pengaduan['nama_petugas'] ?></h6>
                        <p><?= $pengaduan['tanggapan'] ?></p>

                        <!-- <span class="badge bg-success mt-3"><?= $pengaduan['tgl_pengaduan'] ?></span> -->
                        <small class="text-muted"><?= $pengaduan['tgl_pengaduan'] ?></small>
                    </div>
                    <hr />
                </div>
                <?php endforeach ?>
                
            </div>
            <?php if(isset($_SESSION['level'])) : ?>
            <form action="procces-simpan-tanggapan.php" method="post">
                <input type="hidden" name="id" value="<?= $id ?>">
            <div class="mb-3">
              <label for="" class="form-label">Tanggapan</label>
              <textarea class="form-control" name="tanggapan" id="" rows="3"></textarea>
            </div>
                <button type="submit" class="btn btn-primary">Berikan Tanggapan</button>
            </form>
            <?php endif ?>
        </div>
    </div>
</body>
</html>