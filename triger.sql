-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Sep 2023 pada 04.17
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `triger`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `AmbilMasyarakat` ()   BEGIN
    SELECT * FROM masyarakat;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_mahasiswa`
--

CREATE TABLE `log_mahasiswa` (
  `id` int(10) NOT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `alamat_lama` varchar(100) DEFAULT NULL,
  `alamat_baru` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('p','L') DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(10) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('P','L') DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `alamat`, `jenis_kelamin`, `telp`) VALUES
(1, 'faqih', 'bandung', 'L', '0888-9999-2222'),
(2, 'ina', 'jakarta', 'P', '0888-9999-2222');

--
-- Trigger `mahasiswa`
--
DELIMITER $$
CREATE TRIGGER `update_alamat_mahasiswa` BEFORE UPDATE ON `mahasiswa` FOR EACH ROW BEGIN
    INSERT INTO log_mahasiswa
    set id = OLD.id,
    alamat_lama=old.alamat,
    alamat_baru=new.alamat,
    jenis_kelamin = old.jenis_kelamin,
    telp = old.telp; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telelpon` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `telelpon`) VALUES
('12344', 'ucok', 'ucok', '1234', '214342'),
('214234', 'asep', 'asep', '1234', '231421'),
('2344', 'dedi', 'dedi', '1234', '12345'),
('9090', 'cecil', 'cecilion', '1234', '23213');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(20) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` int(16) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('0','proses','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`) VALUES
(12, '2023-08-31', 214234, 'asep udh jago ', 'Sad-Anime-Boy-Wallpapers.jpg', 'selesai'),
(13, '2023-08-31', 214234, ' asep lagi makan ', 'wallpaperflare.com_wallpaper (1).jpg', 'proses'),
(14, '2023-08-31', 2344, 'dedi sudah besar', '1319293.jpeg', 'proses'),
(16, '2023-08-31', 12344, 'ucok blom mandi', 'download.jpg', 'proses'),
(19, '2023-09-01', 214234, 'Asep pengen Jago', 'demon-slayer-3840x5270-10716.jpg', 'selesai'),
(20, '0000-00-00', 0, '', '', 'selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(35) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`) VALUES
(1, 'jamet', 'jamet', '1234', '123455', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(25) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_pengaduan`, `tanggapan`, `id_petugas`) VALUES
(3, 12, '2023-09-01', 'Mang Eak ', 1),
(4, 13, '2023-09-01', 'Ga nanya Dek', 1),
(5, 14, '2023-09-01', 'Anaknya Aktif Ya Bund', 1),
(6, 16, '2023-09-01', 'Mandi Blok', 1),
(7, 19, '2023-09-01', 'Makanya Sekolah Asep :https://youtu.be/7ZfniYhjW5M?si=w95RIZUxpqP4gOF6', 1);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `update_alamat_mahasiswa`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `update_alamat_mahasiswa` (
`id` int(10)
,`nama` varchar(100)
,`alamat_lama` varchar(100)
,`alamat_baru` varchar(100)
,`telp` varchar(20)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `update_alamat_mahasiswa`
--
DROP TABLE IF EXISTS `update_alamat_mahasiswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `update_alamat_mahasiswa`  AS SELECT `mahasiswa`.`id` AS `id`, `mahasiswa`.`nama` AS `nama`, `log_mahasiswa`.`alamat_lama` AS `alamat_lama`, `log_mahasiswa`.`alamat_baru` AS `alamat_baru`, `log_mahasiswa`.`telp` AS `telp` FROM (`mahasiswa` join `log_mahasiswa` on(`mahasiswa`.`id` = `log_mahasiswa`.`id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `log_mahasiswa`
--
ALTER TABLE `log_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_pengaduan` (`id_pengaduan`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `log_mahasiswa`
--
ALTER TABLE `log_mahasiswa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
