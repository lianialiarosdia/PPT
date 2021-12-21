-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2021 at 06:00 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tol_delameta`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_golongan`
--

CREATE TABLE `tb_golongan` (
  `id_golongan` int(11) NOT NULL,
  `id_tol` int(11) NOT NULL,
  `nama_golongan` enum('golongan_1','golongan_2','','') NOT NULL,
  `tarif` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rfid`
--

CREATE TABLE `tb_rfid` (
  `id_rfid` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` int(20) NOT NULL,
  `foto_ktp` varchar(5000) NOT NULL,
  `saldo` int(11) NOT NULL,
  `nomor_rfid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rfid`
--

INSERT INTO `tb_rfid` (`id_rfid`, `nama_lengkap`, `alamat`, `telepon`, `foto_ktp`, `saldo`, `nomor_rfid`) VALUES
(1, 'Carinna', 'SCBD', 843985284, '', 100000, 'AACC'),
(2, 'Bento', 'Joglo', 843984484, '', 100000, 'AABB');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tol`
--

CREATE TABLE `tb_tol` (
  `id_tol` int(11) NOT NULL,
  `nama_tol` varchar(100) NOT NULL,
  `golongan` enum('Golongan I','Golongan II','','') NOT NULL,
  `tarif` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_topup`
--

CREATE TABLE `tb_topup` (
  `id_topup` int(11) NOT NULL,
  `id_rfid` int(11) NOT NULL,
  `tanggal_topup` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `topup` int(100) NOT NULL,
  `status` enum('berhasil','gagal','tunggu') NOT NULL,
  `no_transaksi` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi_tol`
--

CREATE TABLE `tb_transaksi_tol` (
  `id_pembayaran` int(11) NOT NULL,
  `id_tol` int(11) NOT NULL,
  `id_rfid` int(11) NOT NULL,
  `tanggal_transaksi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('berhasil','gagal') NOT NULL,
  `saldo_akhir` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `id_rfid` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `id_rfid`, `password`, `username`, `level`, `email`) VALUES
(1, 1, 'carin', 'carin', 'user', 'carin@gmail.com'),
(2, 2, 'bento', 'bento', 'user', 'bndtkr@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_golongan`
--
ALTER TABLE `tb_golongan`
  ADD PRIMARY KEY (`id_golongan`),
  ADD KEY `id_tol` (`id_tol`);

--
-- Indexes for table `tb_rfid`
--
ALTER TABLE `tb_rfid`
  ADD PRIMARY KEY (`id_rfid`);

--
-- Indexes for table `tb_tol`
--
ALTER TABLE `tb_tol`
  ADD PRIMARY KEY (`id_tol`);

--
-- Indexes for table `tb_topup`
--
ALTER TABLE `tb_topup`
  ADD PRIMARY KEY (`id_topup`),
  ADD KEY `id_rfid` (`id_rfid`);

--
-- Indexes for table `tb_transaksi_tol`
--
ALTER TABLE `tb_transaksi_tol`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_tol` (`id_tol`),
  ADD KEY `id_rfid` (`id_rfid`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_rfid` (`id_rfid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_rfid`
--
ALTER TABLE `tb_rfid`
  MODIFY `id_rfid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_tol`
--
ALTER TABLE `tb_tol`
  MODIFY `id_tol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_topup`
--
ALTER TABLE `tb_topup`
  MODIFY `id_topup` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_transaksi_tol`
--
ALTER TABLE `tb_transaksi_tol`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_golongan`
--
ALTER TABLE `tb_golongan`
  ADD CONSTRAINT `tb_golongan_ibfk_1` FOREIGN KEY (`id_tol`) REFERENCES `tb_tol` (`id_tol`);

--
-- Constraints for table `tb_topup`
--
ALTER TABLE `tb_topup`
  ADD CONSTRAINT `tb_topup_ibfk_1` FOREIGN KEY (`id_rfid`) REFERENCES `tb_rfid` (`id_rfid`);

--
-- Constraints for table `tb_transaksi_tol`
--
ALTER TABLE `tb_transaksi_tol`
  ADD CONSTRAINT `tb_transaksi_tol_ibfk_1` FOREIGN KEY (`id_tol`) REFERENCES `tb_tol` (`id_tol`),
  ADD CONSTRAINT `tb_transaksi_tol_ibfk_2` FOREIGN KEY (`id_rfid`) REFERENCES `tb_rfid` (`id_rfid`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_rfid`) REFERENCES `tb_rfid` (`id_rfid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
