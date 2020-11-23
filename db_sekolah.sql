-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2020 at 07:22 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_matapelajaran`
--

CREATE TABLE `tb_matapelajaran` (
  `id_matapelajaran` int(11) NOT NULL,
  `mata_pelajaran` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_matapelajaran`
--

INSERT INTO `tb_matapelajaran` (`id_matapelajaran`, `mata_pelajaran`) VALUES
(2, 'Bahasa Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id_role`, `role`) VALUES
(1, 'Administrator'),
(2, 'Guru'),
(3, 'Siswa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nisn` varchar(12) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(16) NOT NULL,
  `agama` varchar(16) NOT NULL,
  `tempat_lahir` varchar(64) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nisn`, `nama`, `jenis_kelamin`, `agama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `password`, `image`, `id_role`) VALUES
(2, '1002000124', 'Restu Gusti Pratama', 'Laki-Laki', 'Islam', 'Jakarta', '2020-11-04', 'Kemayoran', '$2y$10$GFQRGp/qlsqv2H08q1xpRO2x3h7eRh6LMl5yD3cdAttVVM36U6XR2', 'profile.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `date_added` date NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `image`, `date_added`, `id_role`) VALUES
(5, 'Admin R', 'admin', '$2y$10$Isq98Ip5Iie4rFaOhUDEMufjr7uzrhNHR9JacQHa8PMMCmIRbzOLe', 'default.jpg', '2020-11-19', 1),
(6, 'Restu Gusti Pratama', 'admin1', '$2y$10$YJpLOV2knOMAxQ228NJs7.B36ZFIuP7SUSxs0KjyThTslrxcTynfe', 'default.jpg', '2020-11-19', 1),
(7, 'Restu Gusti Pratama', 'restugstama', '$2y$10$bTQ8r3V/jrsFV8h0msn4feRIIlEIvaXovDg1uXy.zv4O.g6e0N0t2', '', '2020-11-22', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_matapelajaran`
--
ALTER TABLE `tb_matapelajaran`
  ADD PRIMARY KEY (`id_matapelajaran`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_matapelajaran`
--
ALTER TABLE `tb_matapelajaran`
  MODIFY `id_matapelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
