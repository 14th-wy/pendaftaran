-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2020 at 04:37 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendaftaran2`
--

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `KODE_PROGRAM_KEAHLIAN` varchar(10) NOT NULL,
  `PROGRAM_KEAHLIAN` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`KODE_PROGRAM_KEAHLIAN`, `PROGRAM_KEAHLIAN`) VALUES
('AK2020', 'Akuntansi'),
('AP2020', 'Administrasi Perkantoran'),
('TIP2020', 'Tek. Inst. Pemanfaatan Tenaga '),
('TKR2020', 'Teknik Kendaraan Ringan'),
('TP2020', 'Teknik Permesinan');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `kode_matpel` varchar(5) NOT NULL,
  `nama_matpel` varchar(30) NOT NULL,
  `kb` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`kode_matpel`, `nama_matpel`, `kb`) VALUES
('BG', 'Biologi', '100'),
('IPA', 'Ilmu Pengetahuan Alam', '100'),
('IPS', 'Ilmu Pengetahuan Sosial', '100'),
('KM', 'Kimia', '100'),
('MTK', 'Matematika', '100');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` varchar(15) NOT NULL,
  `nama_siswa` text DEFAULT NULL,
  `tempat_lahir` text DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` text DEFAULT NULL,
  `agama` text DEFAULT NULL,
  `anak_ke` varchar(5) DEFAULT NULL,
  `alamat_siswa` varchar(255) DEFAULT NULL,
  `no_telepon_siswa` varchar(15) DEFAULT NULL,
  `status_dalam_keluarga` varchar(30) DEFAULT NULL,
  `sekolah_asal` varchar(50) DEFAULT NULL,
  `diterima_dikelas` varchar(5) DEFAULT NULL,
  `pada_tanggal` date DEFAULT NULL,
  `nama_ayah` text DEFAULT NULL,
  `nama_ibu` text DEFAULT NULL,
  `alamat_orangtua` text DEFAULT NULL,
  `no_telepon_orangtua` varchar(15) DEFAULT NULL,
  `pekerjaan_ayah` varchar(50) DEFAULT NULL,
  `pekerjaan_ibu` varchar(50) DEFAULT NULL,
  `nama_walisiswa` text DEFAULT NULL,
  `alamat_walisiswa` text DEFAULT NULL,
  `no_telepon_rumah` varchar(15) DEFAULT NULL,
  `pekerjaan_walisiswa` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nama_siswa`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `anak_ke`, `alamat_siswa`, `no_telepon_siswa`, `status_dalam_keluarga`, `sekolah_asal`, `diterima_dikelas`, `pada_tanggal`, `nama_ayah`, `nama_ibu`, `alamat_orangtua`, `no_telepon_orangtua`, `pekerjaan_ayah`, `pekerjaan_ibu`, `nama_walisiswa`, `alamat_walisiswa`, `no_telepon_rumah`, `pekerjaan_walisiswa`) VALUES
('1', 'Wahyu Dani', 'Bekasi', '2020-12-09', '', '', '2', '', '', '', '', '', '0000-00-00', '', '', '', NULL, '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`KODE_PROGRAM_KEAHLIAN`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`kode_matpel`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
