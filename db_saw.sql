-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Mar 2023 pada 10.24
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_saw`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `saw_hasil`
--

CREATE TABLE `saw_hasil` (
  `id` int(11) NOT NULL,
  `tanggal_penghitungan` date NOT NULL,
  `laptop_terpilih` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `saw_hasil`
--

INSERT INTO `saw_hasil` (`id`, `tanggal_penghitungan`, `laptop_terpilih`) VALUES
(9, '2023-03-01', 'Acer Aspire 5 Slim'),
(10, '2023-03-01', 'Acer Aspire 5 Slim'),
(11, '2023-03-01', 'Acer Aspire 5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saw_kriteria`
--

CREATE TABLE `saw_kriteria` (
  `id` int(11) NOT NULL,
  `nama_kriteria` varchar(256) NOT NULL,
  `penjelasan_kriteria` text NOT NULL,
  `bobot_kriteria` varchar(10) NOT NULL,
  `kategori_bobot` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `saw_kriteria`
--

INSERT INTO `saw_kriteria` (`id`, `nama_kriteria`, `penjelasan_kriteria`, `bobot_kriteria`, `kategori_bobot`) VALUES
(13, 'Processor', 'Menilai tingkat processor', '20', 'Benefit'),
(14, 'RAM', 'Menilai ukuran kapasitas RAM', '20', 'Benefit'),
(15, 'Harga', 'Menilai harga laptop', '20', 'Cost'),
(16, 'VGA', 'Menilai performa VGA', '15', 'Benefit'),
(17, 'Penyimpanan', 'Menilai kapasitas memori internal', '15', 'Benefit'),
(18, 'Resolusi Layar', 'Menilai ukuran resolusi layar', '10', 'Benefit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saw_laptop`
--

CREATE TABLE `saw_laptop` (
  `id` int(11) NOT NULL,
  `nama_laptop` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `saw_laptop`
--

INSERT INTO `saw_laptop` (`id`, `nama_laptop`) VALUES
(1, 'Acer Aspire 5 Slim'),
(2, 'Lenovo V14 G2'),
(3, 'Acer Aspire 3 Slim'),
(4, 'MSI Modern 14'),
(5, 'Acer Aspire 5'),
(6, 'Asus E410MAO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saw_pegawai`
--

CREATE TABLE `saw_pegawai` (
  `id` int(11) NOT NULL,
  `nama_pegawai` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `saw_pegawai`
--

INSERT INTO `saw_pegawai` (`id`, `nama_pegawai`) VALUES
(1, 'Ardan Anjung'),
(2, 'Riza Zulfahnur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saw_sub_kriteria`
--

CREATE TABLE `saw_sub_kriteria` (
  `id` int(11) NOT NULL,
  `nama_kriteria` varchar(100) DEFAULT NULL,
  `bobot_1` varchar(255) DEFAULT NULL,
  `bobot_2` varchar(255) DEFAULT NULL,
  `bobot_3` varchar(255) DEFAULT NULL,
  `bobot_4` varchar(255) DEFAULT NULL,
  `bobot_5` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `saw_sub_kriteria`
--

INSERT INTO `saw_sub_kriteria` (`id`, `nama_kriteria`, `bobot_1`, `bobot_2`, `bobot_3`, `bobot_4`, `bobot_5`) VALUES
(4, 'Processor', 'Intel Pentium', 'Intel Celeron', 'Intel Core i3', 'Intel Core i5', 'Intel Core i7'),
(5, 'RAM', '2 GB', '4 GB', '8 GB', '16 GB', '32 GB'),
(6, 'Harga', '&gt; 10.000.000', '8.000.000 - 9.999.000', '6.000.000 - 7.999.000', '4.000.000 - 5.999.000', '&amp;lt; 3.999.999'),
(7, 'VGA', 'Intel UHD', 'Intel Iris', 'Geforce MX', 'Geforce GTX', 'Geforce RTX'),
(8, 'Penyimpanan', 'HDD 250 GB', 'HDD 500 GB', 'HDD 1 TB', 'SSD 256 GB', 'SSD 512 GB'),
(9, 'Resolusi Layar', '1366 x 768 pixel', '1600 x 900 pixel', '1920 x 1080 pixel', '2560 x 1440 pixel', '3840 x 2160 pixel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_nama` varchar(50) DEFAULT NULL,
  `pengguna_username` varchar(35) DEFAULT NULL,
  `pengguna_password` varchar(255) DEFAULT NULL,
  `pengguna_level` varchar(20) DEFAULT NULL,
  `pengguna_photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`pengguna_id`, `pengguna_nama`, `pengguna_username`, `pengguna_password`, `pengguna_level`, `pengguna_photo`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'asdasdadsad'),
(2, 'Testing', 'asd', '7815696ecbf1c96e6894b779456d330e', 'User', '9f5eb4dd9eb3dad5aaedeedfa50b1815.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `saw_hasil`
--
ALTER TABLE `saw_hasil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `saw_kriteria`
--
ALTER TABLE `saw_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `saw_laptop`
--
ALTER TABLE `saw_laptop`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `saw_pegawai`
--
ALTER TABLE `saw_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `saw_sub_kriteria`
--
ALTER TABLE `saw_sub_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `saw_hasil`
--
ALTER TABLE `saw_hasil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `saw_kriteria`
--
ALTER TABLE `saw_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `saw_laptop`
--
ALTER TABLE `saw_laptop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `saw_pegawai`
--
ALTER TABLE `saw_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `saw_sub_kriteria`
--
ALTER TABLE `saw_sub_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
