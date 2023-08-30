<?php
    include("cek_login.php");
    include("koneksi.php");

    $query = $koneksi->query("select * from pengaduan");
    $data = $query->fetchAll();
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
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../bs/css/bootstrap.min.css">
</head>
<body>
    <?php include "navbar.php" ?>
    <div class="container">
        <h2 class="text-center mb-5">Selamat Datang <br /> Di Aplikasi Pengaduan Masyarakat</h2>
        <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Tgl Pengaduan</th>
                <th>isi_laporan</th>
                <th>Foto</th>
                <th>status</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>

        <?php foreach($data as $data) : ?>
            <tr>
                <td><?= $data['tgl_pengaduan'] ?></td>
                <td><?= $data['isi_laporan'] ?></td>
                <td><img width="100px" src="foto/<?= $data['foto'] ?>"></td>
                <td><?= $data['status'] ?></td>
                <td>
                    <a href="detail-pengaduan.php?id=<?= $data['id_pengaduan'] ?>" class="btn btn-primary btn-sm"><img src="foto/detail.svg" width="20px"></a>
                    <a href="procces-hapus-pengaduan.php?id=<?= $data['id_pengaduan'] ?>" class="btn btn-danger btn-sm"><img src="foto/delete.svg" width="20px"></a>
                </td>
            </tr>
        <?php endforeach ?>

        <tfoot>
            <tr>
                <th>Tgl Pengaduan</th>
                <th>isi_laporan</th>
                <th>Foto</th>
                <th>status</th>
                <th>#</th>
            </tr>
        </tfoot>
    </table>

    </div>


    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        new DataTable('#example');
    </script>
</body>
</html>
