-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 15, 2020 at 02:39 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendaftaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `KODE_PROGRAM_KEAHLIAN` varchar(10) NOT NULL,
  `NO_PENDAFTARAN` varchar(10) DEFAULT NULL,
  `NAMA_CALON_SISWA` varchar(30) DEFAULT NULL,
  `PROGRAM_KEAHLIAN` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`KODE_PROGRAM_KEAHLIAN`, `NO_PENDAFTARAN`, `NAMA_CALON_SISWA`, `PROGRAM_KEAHLIAN`) VALUES
('T004', '0989', 'dimas alamsyah', 'KA');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `KODE_KELAS` varchar(10) NOT NULL,
  `NAMA_KELAS` varchar(10) DEFAULT NULL,
  `NAMA_JURUSAN` varchar(30) DEFAULT NULL,
  `KODE_PROGRAM_KEAHLIAN` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`KODE_KELAS`, `NAMA_KELAS`, `NAMA_JURUSAN`, `KODE_PROGRAM_KEAHLIAN`) VALUES
('KK001', 'Komputer', 'KA', 'T004'),
('KK002', 'Akutansi', 'KA', 'T004');

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `KODE_USER` varchar(10) NOT NULL,
  `NAMA_USER` varchar(10) DEFAULT NULL,
  `PASSWORD` varchar(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `pendaftaran` varchar(10) DEFAULT NULL,
  `pembayaran` varchar(10) DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `jurusan` varchar(10) DEFAULT NULL,
  `siswa` varchar(10) DEFAULT NULL,
  `laporan_master` varchar(10) DEFAULT NULL,
  `laporan_pendaftaran` varchar(10) DEFAULT NULL,
  `laporan_pembayaran` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `NO_PEMBAYARAN` varchar(10) NOT NULL,
  `JURUSAN` varchar(30) DEFAULT NULL,
  `NO_PENDAFTARAN` varchar(10) DEFAULT NULL,
  `NAMA_CALON_SISWA` varchar(30) DEFAULT NULL,
  `UNTUK_PEMBAYARAN` varchar(100) DEFAULT NULL,
  `JUMLAH` varchar(30) DEFAULT NULL,
  `TANGGAL_PEMBAYARAN` datetime DEFAULT NULL,
  `KETERANGAN` varchar(20) DEFAULT NULL,
  `BENDAHARA` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`NO_PEMBAYARAN`, `JURUSAN`, `NO_PENDAFTARAN`, `NAMA_CALON_SISWA`, `UNTUK_PEMBAYARAN`, `JUMLAH`, `TANGGAL_PEMBAYARAN`, `KETERANGAN`, `BENDAHARA`) VALUES
('NP002', 'T004', '7890', 'dimas', 'pembayaran daftar ulang', '2,000,040', '2020-10-20 18:33:00', 'keterangan edit', 'abdul rahman'),
('NP003', 'T004', '0989', 'dimas alamsyah', 'pembayaran uang masuk', '55,000,000', '2020-10-13 10:00:00', 'keterangan', 'bendahara');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `NO_PENDAFTARAN` varchar(10) NOT NULL,
  `NAMA_CALON_SISWA` varchar(50) DEFAULT NULL,
  `JENIS_KELAMIN` varchar(30) DEFAULT NULL,
  `TEMPAT` varchar(30) DEFAULT NULL,
  `TANGGAL_LAHIR` date DEFAULT NULL,
  `AGAMA` varchar(10) DEFAULT NULL,
  `SEKOLAH_ASAL` varchar(50) DEFAULT NULL,
  `TAHUN_IJAZAH` varchar(20) DEFAULT NULL,
  `NOMOR_IJAZAH` varchar(30) DEFAULT NULL,
  `NISN` varchar(30) DEFAULT NULL,
  `JURUSAN` varchar(50) DEFAULT NULL,
  `ALAMAT` varchar(50) DEFAULT NULL,
  `NAMA_ORANGTUA` varchar(30) DEFAULT NULL,
  `ALAMAT_ORANGTUA` varchar(50) DEFAULT NULL,
  `TELEPON` varchar(12) DEFAULT NULL,
  `C_IJAZAH` varchar(10) DEFAULT NULL,
  `C_KK` varchar(10) DEFAULT NULL,
  `C_SKHUN` varchar(10) DEFAULT NULL,
  `C_NISN` varchar(10) DEFAULT NULL,
  `TANGGAL_PENDAFTARAN` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`NO_PENDAFTARAN`, `NAMA_CALON_SISWA`, `JENIS_KELAMIN`, `TEMPAT`, `TANGGAL_LAHIR`, `AGAMA`, `SEKOLAH_ASAL`, `TAHUN_IJAZAH`, `NOMOR_IJAZAH`, `NISN`, `JURUSAN`, `ALAMAT`, `NAMA_ORANGTUA`, `ALAMAT_ORANGTUA`, `TELEPON`, `C_IJAZAH`, `C_KK`, `C_SKHUN`, `C_NISN`, `TANGGAL_PENDAFTARAN`) VALUES
('0989', 'dimas alamsyah', 'laki - laki', 'jakarta', '2020-10-06', 'islam', 'smp 1 n setu', '2020', '98989', '1201999', 'IPA', 'Jakarta  pusat', 'Ahmad', 'jonggol', '08121323', 'X', 'X', 'X', 'X', '2020-10-06 00:00:00'),
('7890', 'dimas', 'laki', 'jakarta', '2020-10-06', 'islam', 'smp 1 n setu', '2010', '98989', '1201999', 'IPA', 'Jakarta  pusat', 'Ahmad', 'jonggol', '08121323', NULL, NULL, NULL, NULL, '2020-10-06 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `NO_PEMBAYARAN` varchar(10) DEFAULT NULL,
  `KODE_SISWA` varchar(10) NOT NULL,
  `NAMA_SISWA` varchar(30) DEFAULT NULL,
  `KODE_KELAS` varchar(10) DEFAULT NULL,
  `NAMA_JURUSAN` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`KODE_PROGRAM_KEAHLIAN`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`KODE_KELAS`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`KODE_USER`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`NO_PEMBAYARAN`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`NO_PENDAFTARAN`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`KODE_SISWA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
