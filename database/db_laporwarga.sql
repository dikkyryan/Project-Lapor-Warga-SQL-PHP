-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2021 at 04:07 AM
-- Server version: 10.4.18-MariaDB-log
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laporwarga`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(10) NOT NULL,
  `nama_admin` varchar(20) NOT NULL,
  `jk_admin` enum('L','P') NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `tlp_admin` varchar(12) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `rt` varchar(3) NOT NULL,
  `rw` varchar(3) NOT NULL,
  `kelurahan` varchar(20) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `provinsi` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `jk_admin`, `jabatan`, `tlp_admin`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kota`, `provinsi`, `username`, `password`, `level`) VALUES
('ADM001', 'Super Admin', 'L', 'Ketua RT 01', '021021021021', 'Jalan Jalan no.9', '1', '4', 'Sekayu', 'Semarang Timur', 'Semarang', 'Jawa Tengah', 'superadmin', '21232f297a57a5a743894a0e4a801fc3', 'admin1'),
('ADM002', 'Admin Ketua RT', 'L', 'Ketua RT 01', '021021021021', 'Jalan Jalan no.9 rt 01/rw 04', '1', '4', 'Sekayu', 'Semarang Timur', 'Semarang', 'Jawa Tengah', 'ketuart', '21232f297a57a5a743894a0e4a801fc3', 'admin1'),
('ADM003', 'Admin Sekayu', 'L', 'Petugas Kelurahan', '021021021021', 'jl.m.ali.2 no.9', '1', '4', 'Sekayu', 'Semarang Timur', 'Semarang', 'Jawa Tengah', 'kelurahan', '21232f297a57a5a743894a0e4a801fc3', 'admin2'),
('ADM004', 'Admin Pukesmas', 'L', 'Petugas Puskesmas', '021021021021', 'Jalan Jalan no.9 rt 01/rw 04', '1', '4', 'Sekayu', 'Semarang Timur', 'Semarang', 'Jawa Tengah', 'puskesmas', '21232f297a57a5a743894a0e4a801fc3', 'admin3');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(1) NOT NULL,
  `kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Keamanan dan Ketertiban'),
(2, 'Kebersihan Lingkungan'),
(3, 'Kesehatan'),
(4, 'Dampak Lingkungan'),
(5, 'Lain-Lain');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` varchar(10) NOT NULL,
  `foto_laporan` varchar(100) NOT NULL,
  `judul_laporan` varchar(30) NOT NULL,
  `isi_laporan` text NOT NULL,
  `id_kategori` int(1) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `status_pelapor` enum('Warga Asli','Bukan Waraga Asli') NOT NULL,
  `lat` varchar(17) NOT NULL,
  `lon` varchar(16) NOT NULL,
  `status_laporan` enum('lapor','periksa','valid','tidak valid','tindaklanjut','selesai') NOT NULL,
  `tgl_kirim` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `foto_laporan`, `judul_laporan`, `isi_laporan`, `id_kategori`, `id_user`, `status_pelapor`, `lat`, `lon`, `status_laporan`, `tgl_kirim`) VALUES
('LPR001', './img/laporan/Desert.jpg', 'test lapor 1', 'Mohon maaf saya hanya mencoba fungsi lapor apakah berfungsi atau tidak', 1, 'USR001', 'Warga Asli', '-6.37740036122224', '106.806110143661', 'lapor', '2019-07-26'),
('LPR002', './img/laporan/Lighthouse.jpg', 'test lapor 2', 'Mohon maaf saya hanya mencoba fungsi lapor apakah berfungsi atau tidak', 3, 'USR001', 'Warga Asli', '-6.37733638655439', '106.806346178054', 'tindaklanjut', '2019-07-26'),
('LPR003', './img/laporan/1564243005275933910359.jpg', 'Test kamera', 'Test fungsi kamera', 3, 'USR001', 'Warga Asli', '-6.41663931576164', '106.813479751290', 'lapor', '2019-07-27'),
('LPR004', './img/laporan/15642459887971906954658.jpg', 'Test Kamera kedua', 'Percobaah fungsi kamera pada android', 2, 'USR001', 'Warga Asli', '-6.4147994350286', '106.815296303866', 'lapor', '2019-07-27'),
('LPR005', './img/laporan/13731546_1049373105154344_6909105132843238821_n.jpg', 'Pengujian Fitur Lapor', 'Menguji Fitur Lapor apakah berfungsi atau tidak', 4, 'USR002', 'Warga Asli', '-6.37750698565094', '106.806217432022', 'tindaklanjut', '2019-07-29'),
('LPR006', './img/laporan/1564425346031223867744.jpg', 'Kipas angin saya rusak', 'Kipas angin saya rusak tolong dibenerin', 5, 'USR002', 'Warga Asli', '-6.40827786751657', '106.814489364624', 'lapor', '2019-07-29'),
('LPR007', './img/laporan/401ac6a72b2f4d9525e055bc9a0e805a.jpg', 'Nyamuk demam berdarah', 'Di rumah saya banyak sekali nyamuk dan anak saya terkena penyakit DBD, mohon diberantas nyamuknya pak', 4, 'USR002', 'Warga Asli', '-6.37618702325150', '106.806368484067', 'lapor', '2019-07-29'),
('LPR008', './img/laporan/15648129947211234688827.jpg', 'Laporan orang hilang', 'Lapor pak saya ingin melapor', 4, 'USR002', 'Warga Asli', '-6.37616579723203', '106.801698002491', 'lapor', '2019-08-03'),
('LPR009', './img/laporan/15648138656851203615628.jpg', 'Laporan kesehatan warga', 'Warga terjangkit penyakit aneh tolong segera ditangani', 3, 'USR002', 'Warga Asli', '-6.37731814052262', '106.808185928202', 'lapor', '2019-08-03'),
('LPR010', './img/laporan/15649730141411040002379.jpg', 'Listrik', 'Listrik mati', 5, 'USR002', 'Warga Asli', '-6.40707574812874', '106.813365707639', 'selesai', '2019-08-05'),
('LPR011', './img/laporan/???.jpg', 'faawd', 'awdadaw', 1, 'USR007', 'Warga Asli', '-6.98385102681511', '110.395517349243', 'lapor', '2021-04-18'),
('LPR012', './img/laporan/maling-ketangkap-1.jpg', 'Copet', 'Telah Terjadi Aksi Pencopetan Di RT 03 RW 1 Kelurahan Sekayu', 1, 'USR007', 'Warga Asli', '-6.99264721056435', '110.398360490798', 'lapor', '2021-04-18'),
('LPR013', './img/laporan/Badge red flag with logo (2).png', 'cek', 'sada', 2, 'USR008', 'Warga Asli', '-6.99425876133768', '110.407958426461', 'lapor', '2021-06-06'),
('LPR014', './img/laporan/MVIMG_20201019_195641 (1).jpg', 'wadadadw', 'awda', 1, 'USR008', 'Warga Asli', '-6.98385102681511', '110.395517349243', 'lapor', '2021-06-06'),
('LPR015', './img/laporan/Badge red flag with logo (2).png', 'pencurian', 'telah terjadi pencurian di rt 3', 1, 'USR009', 'Warga Asli', '-6.99423036404147', '110.407692328893', 'lapor', '2021-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pgmn` varchar(10) NOT NULL,
  `judul_pgmn` varchar(50) NOT NULL,
  `isi_pgmn` text NOT NULL,
  `id_admin` varchar(10) NOT NULL,
  `tgl_pgmn` date NOT NULL,
  `tgl_acara` date NOT NULL,
  `mulai_acara` time NOT NULL,
  `selesai_acara` time NOT NULL,
  `tempat_acara` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pgmn`, `judul_pgmn`, `isi_pgmn`, `id_admin`, `tgl_pgmn`, `tgl_acara`, `mulai_acara`, `selesai_acara`, `tempat_acara`) VALUES
('PGN005', 'Terjadi Kemalingan ', 'Telah terjadi kemalingan di rumah bapak sabar di rw 2 rt 1 dini hari tadi', 'ADM001', '2021-04-05', '2021-04-05', '01:02:00', '03:04:00', 'rumah pak sabar'),
('PGN006', 'Kerja Bakti Di Halaman Kelurahan', 'Di Beritahukan Seluruh Warga Akan Di adakan Kerja Wakti', 'ADM001', '2021-04-08', '2021-04-08', '15:08:00', '19:09:00', 'kerja Bakti'),
('PGN007', 'sfesf', 'sefsfsf', 'ADM002', '2021-06-06', '2021-06-08', '00:00:00', '00:00:00', 'sefsfs'),
('PGN008', 'Kerja Bakti', 'kerja bakti bersama', 'ADM002', '2021-06-06', '2021-06-07', '00:00:00', '00:00:00', 'balai rw 3');

-- --------------------------------------------------------

--
-- Table structure for table `selesai`
--

CREATE TABLE `selesai` (
  `id_selesai` int(11) NOT NULL,
  `id_laporan` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `id_admin` varchar(10) NOT NULL,
  `tgl_selesai` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selesai`
--

INSERT INTO `selesai` (`id_selesai`, `id_laporan`, `id_user`, `id_admin`, `tgl_selesai`, `keterangan`) VALUES
(1, 'LPR001', 'USR001', 'ADM004', '2019-07-30', 'laporan telah selesai ditindaklanjuti'),
(2, 'LPR010', 'USR002', 'ADM004', '2019-08-05', 'listrik nyl');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(10) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `jk_user` enum('L','P') NOT NULL,
  `tlp_user` varchar(12) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `rt` varchar(3) NOT NULL,
  `rw` varchar(3) NOT NULL,
  `kelurahan` varchar(20) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `provinsi` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `jk_user`, `tlp_user`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kota`, `provinsi`, `username`, `password`, `level`) VALUES
('USR001', 'Dikky', 'L', '081261461404', 'jl.m.ali.2 no.9', '1', '4', 'Tanah Baru', 'Beji', 'semarangg', 'Jawa Tengah', 'cobaan', 'bf0c98cd233487cb4db2db0a221a818a', 'user'),
('USR002', 'Warga', 'L', '021021021021', 'jl.m.ali.2 no.9', '1', '4', 'Tanah Baru', 'Beji', 'semarang', 'Jateng', 'warga', 'bf0c98cd233487cb4db2db0a221a818a', 'user'),
('USR003', 'test', 'L', '02199665544', 'jl.m.ali.2', '1', '2', 'Tanah Baru', 'Beji', 'smg', 'Jateng', 'test', '81dc9bdb52d04dc20036dbd8313ed055', 'user'),
('USR004', 'test2', 'L', '02199665544', 'jl.m.ali.2', '1', '2', 'Tanah Baru', 'Beji', 'semarang', 'Jawa Tengah', 'test2', '81dc9bdb52d04dc20036dbd8313ed055', 'user'),
('USR005', 'Subali', 'P', '02199665544', 'jl.m.ali.2', '1', '2', 'Tanah Baru', 'Beji', 'Semarang', 'Jawa Tengah', 'cobaan', 'd93591bdf7860e1e4ee2fca799911215', 'user'),
('USR006', 'aodaiowkdoi', '', '088229887396', 'Knappenstr. 172', '2', '23', 'ADAWD', 'AAWDAWD', 'bochum', 'ADAD', 'amin', '30ae43ad1aa0a416699051b73a3dfcf6', 'user'),
('USR007', 'Dikky Ryan Pratama', 'L', '088229887396', 'Knappenstr. 172', '2', '23', 'Sekayu', 'Semarang Timur', 'Semarang', 'Jawa Tengah', 'dikky', '748f9a05a1cba0aaef913b42e0b92d0a', 'user'),
('USR008', 'asdadad', 'L', '3424234', 'jalan kumudasmoro dalam', '3', '4', 'sfs', 'esfsef', 'semarang', 'sfss', 'coba', 'c3ec0f7b054e729c5a716c8125839829', 'user'),
('USR009', 'bayu', 'L', '088229887396', 'Knappenstr. 172', '23', '1', 'Sekayu', 'Semarang Timur', 'semarang', 'Jawa Tengah', 'bayu', 'a430e06de5ce438d499c2e4063d60fd6', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pgmn`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `selesai`
--
ALTER TABLE `selesai`
  ADD PRIMARY KEY (`id_selesai`),
  ADD KEY `id_laporan` (`id_laporan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `selesai`
--
ALTER TABLE `selesai`
  MODIFY `id_selesai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `laporan_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `pengumuman_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `selesai`
--
ALTER TABLE `selesai`
  ADD CONSTRAINT `selesai_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `selesai_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `selesai_ibfk_4` FOREIGN KEY (`id_laporan`) REFERENCES `laporan` (`id_laporan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
