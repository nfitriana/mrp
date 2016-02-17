-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2016 at 05:52 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbmrp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_inventori`
--

CREATE TABLE IF NOT EXISTS `tb_inventori` (
  `kdbahan` varchar(10) NOT NULL,
  `nmbahan` varchar(30) NOT NULL,
  `jml` int(10) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `tingkat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_inventori`
--

INSERT INTO `tb_inventori` (`kdbahan`, `nmbahan`, `jml`, `satuan`, `tingkat`) VALUES
('AAAA', 'AAA', 1, 'Pcs', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE IF NOT EXISTS `tb_pesanan` (
  `kdnota` varchar(20) NOT NULL,
  `namaplg` varchar(50) NOT NULL,
  `alamatplg` varchar(50) NOT NULL,
  `produk` varchar(30) NOT NULL,
  `jml` int(5) NOT NULL,
  `tglpesan` date NOT NULL,
  `tglambil` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`kdnota`, `namaplg`, `alamatplg`, `produk`, `jml`, `tglpesan`, `tglambil`) VALUES
('201601250001', 'Ahmad Fauzi', 'Jl. Pemuda No 7 Tegal', 'Kebaya', 1, '0000-00-00', '0000-00-00'),
('201601250002', 'Ahmad Fauzi', 'Jl. Pemuda No 7 Tegal', 'Kebaya', 1, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int(11) NOT NULL,
  `nmuser` varchar(20) NOT NULL,
  `psswd` varchar(20) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nmuser`, `psswd`, `level`) VALUES
(1, 'Ana', '123', 'Administrator'),
(2, 'Fella', '123', 'Koordinator Pemesanan'),
(3, 'admin', '202cb962ac59075b964b', 'Koordinator Produksi'),
(4, 'admin', '202cb962ac59075b964b', 'Koordinator Gudang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_inventori`
--
ALTER TABLE `tb_inventori`
  ADD PRIMARY KEY (`kdbahan`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`kdnota`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
