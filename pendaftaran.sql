-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2020 at 02:08 PM
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
-- Database: `pendaftaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `datakelas`
--

CREATE TABLE `datakelas` (
  `kode_kelas` varchar(10) NOT NULL,
  `nama_kelas` varchar(15) DEFAULT NULL,
  `kode_jurusan` varchar(50) DEFAULT NULL,
  `nama_jurusan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datakelas`
--

INSERT INTO `datakelas` (`kode_kelas`, `nama_kelas`, `kode_jurusan`, `nama_jurusan`) VALUES
('AK01', 'AK01', 'AK', 'Akuntansi'),
('AP01', 'AP01', 'AP', 'Administrasi Perkantoran'),
('TIPL01', 'TIPL01', 'TIPL', 'Teknik Instalasi Pemasangan Tenaga Listrik'),
('TKR01', 'TKR01', 'TKR', 'Teknik Kendaraan Ringan'),
('TP01', 'TP01', 'TP', 'Teknik Permesinan');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `kode_jurusan` varchar(50) NOT NULL,
  `nama_jurusan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`kode_jurusan`, `nama_jurusan`) VALUES
('AK', 'Akuntansi'),
('AP', 'Administrasi Perkantoran'),
('TIPL', 'Teknik Instalasi Pemasangan Tenaga Listrik'),
('TKR', 'Teknik Kendaraan Ringan'),
('TP', 'Teknik Permesinan');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `kode_matpel` varchar(10) NOT NULL,
  `nama_matpel` varchar(30) DEFAULT NULL,
  `kb` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`kode_matpel`, `nama_matpel`, `kb`) VALUES
('IPA', 'IPA', 100),
('IPS', 'IPS', 100),
('MTK', 'MTK', 100);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `kode_nilai` varchar(10) NOT NULL,
  `kode_kelas` varchar(10) DEFAULT NULL,
  `nama_kelas` varchar(15) DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `nisn` varchar(35) DEFAULT NULL,
  `nama_siswa` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_detail`
--

CREATE TABLE `nilai_detail` (
  `no` int(11) NOT NULL,
  `kode_nilai` varchar(10) DEFAULT NULL,
  `kode_matpel` varchar(10) DEFAULT NULL,
  `nama_matpel` varchar(30) DEFAULT NULL,
  `kb` int(11) DEFAULT NULL,
  `angka` int(11) DEFAULT NULL,
  `Predikat` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` varchar(35) NOT NULL,
  `nama_siswa` varchar(20) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `status_dalamkeluarga` varchar(30) DEFAULT NULL,
  `anak_ke` varchar(10) DEFAULT NULL,
  `alamat_siswa` varchar(50) DEFAULT NULL,
  `no_telponsiswa` varchar(12) DEFAULT NULL,
  `sekolah_asal` varchar(50) DEFAULT NULL,
  `diterima_dikelas` varchar(20) DEFAULT NULL,
  `pada_tanggal` date DEFAULT NULL,
  `nama_ayah` varchar(30) DEFAULT NULL,
  `nama_ibu` varchar(30) DEFAULT NULL,
  `alamat_ortu` varchar(50) DEFAULT NULL,
  `no_telponortu` varchar(12) DEFAULT NULL,
  `pekerjaan_ayah` varchar(30) DEFAULT NULL,
  `pekerjaan_ibu` varchar(30) DEFAULT NULL,
  `nama_walisiswa` varchar(30) DEFAULT NULL,
  `alamat_walisiswa` varchar(50) DEFAULT NULL,
  `no_teleponrumah` varchar(12) DEFAULT NULL,
  `pekerjaan_walisiswa` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nama_siswa`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `status_dalamkeluarga`, `anak_ke`, `alamat_siswa`, `no_telponsiswa`, `sekolah_asal`, `diterima_dikelas`, `pada_tanggal`, `nama_ayah`, `nama_ibu`, `alamat_ortu`, `no_telponortu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `nama_walisiswa`, `alamat_walisiswa`, `no_teleponrumah`, `pekerjaan_walisiswa`) VALUES
('012345', 'Akbar aja', 'Bekasi', '2020-10-08', '', '', 'Anak', '2', 'Bekasi', '-', 'SMPN 1 Setu', '7', '2020-11-09', 'Anton', 'Mutia', 'Bekasi', '-', '-', '-', '-', '-', '-', '-'),
('1234', 'Wahyu', 'Bekasi', '2019-11-09', 'Laki - Lak', 'Islam', '-', '2', 'Bekasi', '-', '-', '-', '0000-00-00', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `user_password`
--

CREATE TABLE `user_password` (
  `username` varchar(10) NOT NULL,
  `nama_user` varchar(25) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `tipe_user` varchar(15) DEFAULT NULL,
  `menu_admin` varchar(5) DEFAULT NULL,
  `menu_transaksi` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datakelas`
--
ALTER TABLE `datakelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kode_jurusan`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`kode_matpel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`kode_nilai`);

--
-- Indexes for table `nilai_detail`
--
ALTER TABLE `nilai_detail`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `user_password`
--
ALTER TABLE `user_password`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nilai_detail`
--
ALTER TABLE `nilai_detail`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
