-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2017 at 03:47 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sistem_mrp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbbahanbaku`
--

CREATE TABLE IF NOT EXISTS `tbbahanbaku` (
  `idBhnBaku` varchar(20) NOT NULL,
  `nmBhnBaku` varchar(50) NOT NULL,
  `lvlBhnBaku` varchar(30) NOT NULL,
  `jmlDibutuhkan` int(11) NOT NULL,
  `jmlInventori` int(11) NOT NULL,
  `leadTime` int(11) NOT NULL,
  `sumber` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbbahanbaku`
--

INSERT INTO `tbbahanbaku` (`idBhnBaku`, `nmBhnBaku`, `lvlBhnBaku`, `jmlDibutuhkan`, `jmlInventori`, `leadTime`, `sumber`) VALUES
('BHN0001', 'Kain', 'Level 2', 2, 70, 7, 'Beli'),
('BHN0002', 'Benang', 'Level 2', 1, 70, 1, 'Beli');

-- --------------------------------------------------------

--
-- Table structure for table `tbbom`
--

CREATE TABLE IF NOT EXISTS `tbbom` (
  `idBOM` varchar(20) NOT NULL,
  `idProduk` varchar(20) NOT NULL,
  `idKomponen` varchar(20) NOT NULL,
  `idBhnBaku` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbdetailkomponen`
--

CREATE TABLE IF NOT EXISTS `tbdetailkomponen` (
  `idBOMKomponen` int(11) NOT NULL,
  `nmBOM` varchar(50) NOT NULL,
  `idKomponen` varchar(20) NOT NULL,
  `idBhnBaku` varchar(20) NOT NULL,
  `jmlButuh` int(5) NOT NULL,
  `level` varchar(10) NOT NULL,
  `sumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbdetailproduk`
--

CREATE TABLE IF NOT EXISTS `tbdetailproduk` (
  `idDetailKomponen` int(11) NOT NULL,
  `idProduk` varchar(20) NOT NULL,
  `idKomponen` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbdetailproduk`
--

INSERT INTO `tbdetailproduk` (`idDetailKomponen`, `idProduk`, `idKomponen`) VALUES
(1, '', 'KOMP0001'),
(2, '', 'KOMP0002'),
(3, 'PRO00012', 'KOMP0001'),
(4, '', 'KOMP0002'),
(5, 'PRO0001', 'KOMP0001'),
(6, 'PRO0001', 'KOMP0001'),
(7, 'PRO0001', 'KOMP0001'),
(8, '', 'KOMP0002'),
(9, '', 'KOMP0002'),
(10, '', 'KOMP0002'),
(11, 'PRO0001', 'KOMP0001'),
(12, 'PRO0001', 'KOMP0001'),
(13, 'PRO0001', 'KOMP0001'),
(14, '', 'KOMP0001'),
(15, '', 'KOMP0001'),
(16, '', 'KOMP0001'),
(17, 'PRO0001', 'KOMP0001'),
(18, 'PRO0001', 'KOMP0001'),
(19, 'PRO0001', 'KOMP0001'),
(20, 'PRO0001', 'KOMP0001'),
(21, '', 'KOMP0002'),
(22, '', 'KOMP0002'),
(23, '', 'KOMP0002'),
(24, '', 'KOMP0002'),
(25, '', ''),
(26, '', ''),
(27, '', ''),
(28, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbinventori`
--

CREATE TABLE IF NOT EXISTS `tbinventori` (
  `idInv` varchar(20) NOT NULL,
  `idBOM` varchar(20) NOT NULL,
  `nmKomponen` varchar(50) NOT NULL,
  `JadwalPenerimaan` int(11) NOT NULL,
  `LotSize` int(11) NOT NULL,
  `LeadTime` int(11) NOT NULL,
  `JmlInvAwal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbkomponen`
--

CREATE TABLE IF NOT EXISTS `tbkomponen` (
  `idKomponen` varchar(20) NOT NULL,
  `nmKomponen` varchar(50) NOT NULL,
  `lvlKomponen` varchar(30) NOT NULL,
  `jmlDibutuhkan` int(11) NOT NULL,
  `jmlInventori` int(11) NOT NULL,
  `leadTime` int(11) NOT NULL,
  `sumber` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbkomponen`
--

INSERT INTO `tbkomponen` (`idKomponen`, `nmKomponen`, `lvlKomponen`, `jmlDibutuhkan`, `jmlInventori`, `leadTime`, `sumber`) VALUES
('KOMP0001', 'Lengan1', 'Level 2', 2, 21, 1, 'Buat'),
('KOMP0002', 'Bagian Badan', 'Level 1', 1, 700, 1, 'Buat');

-- --------------------------------------------------------

--
-- Table structure for table `tbmps`
--

CREATE TABLE IF NOT EXISTS `tbmps` (
  `idMPS` varchar(20) NOT NULL,
  `PeriodeMPS` varchar(20) NOT NULL,
  `idAgregat` varchar(20) NOT NULL,
  `Pt` int(11) NOT NULL,
  `idBOM` varchar(20) NOT NULL,
  `jmlBhnBaku` int(11) NOT NULL,
  `Forecast` int(11) NOT NULL,
  `PesananAktual` int(11) NOT NULL,
  `PermintaanTotal` int(11) NOT NULL,
  `SafetyStock` int(11) NOT NULL,
  `RencanaKebutuhan` int(11) NOT NULL,
  `idHariKerja` varchar(20) NOT NULL,
  `Jml` int(11) NOT NULL,
  `KebProduksiHarian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbmrp`
--

CREATE TABLE IF NOT EXISTS `tbmrp` (
  `idMRP` varchar(20) NOT NULL,
  `PeriodeMRP` varchar(50) NOT NULL,
  `idInv` varchar(20) NOT NULL,
  `nmKomponen` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL,
  `LeadTime` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `PeriodeAgregat` varchar(50) NOT NULL,
  `idAgregat` varchar(20) NOT NULL,
  `Pt` int(11) NOT NULL,
  `idBOM` varchar(20) NOT NULL,
  `jml` int(11) NOT NULL,
  `JadwalPenerimaan` int(11) NOT NULL,
  `JmlInvAwal` int(11) NOT NULL,
  `GR` int(11) NOT NULL,
  `NR` int(11) NOT NULL,
  `PORt` int(11) NOT NULL,
  `PEI` int(11) NOT NULL,
  `PORel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbpag`
--

CREATE TABLE IF NOT EXISTS `tbpag` (
  `idAgregat` varchar(20) NOT NULL,
  `PeriodeAgregat` text NOT NULL,
  `tglproses` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpag`
--

INSERT INTO `tbpag` (`idAgregat`, `PeriodeAgregat`, `tglproses`) VALUES
('IDAGR030420170000001', 'Agregat Periode Jan 2017 s.d Jun 2017', '2017-04-03'),
('IDAGR060720170000002', 'Agregat Periode Jan 2017 s.d Jun 2017', '2017-07-06'),
('IDAGR060720170000003', 'Agregat Periode Jan 2017 s.d Jul 2017', '2017-07-06');

-- --------------------------------------------------------

--
-- Table structure for table `tbpag_pers1`
--

CREATE TABLE IF NOT EXISTS `tbpag_pers1` (
  `ids` int(10) NOT NULL,
  `idAgregat` varchar(20) NOT NULL,
  `bn` float NOT NULL,
  `periode` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpag_pers1`
--

INSERT INTO `tbpag_pers1` (`ids`, `idAgregat`, `bn`, `periode`) VALUES
(19, 'IDAGR030420170000001', 1, 1),
(20, 'IDAGR030420170000001', 0.5, 1),
(21, 'IDAGR030420170000001', 0.33333, 1),
(22, 'IDAGR030420170000001', 0.25, 1),
(23, 'IDAGR030420170000001', 0.2, 1),
(24, 'IDAGR030420170000001', 0.16667, 1),
(25, 'IDAGR030420170000001', 1, 1),
(26, 'IDAGR030420170000001', 0.5, 1),
(27, 'IDAGR030420170000001', 0.33333, 1),
(28, 'IDAGR030420170000001', 0.25, 1),
(29, 'IDAGR030420170000001', 0.2, 1),
(30, 'IDAGR030420170000001', 0.16667, 1),
(31, 'IDAGR060720170000002', 1, 2),
(32, 'IDAGR060720170000002', 0.5, 2),
(33, 'IDAGR060720170000002', 0.33333, 2),
(34, 'IDAGR060720170000002', 0.25, 2),
(35, 'IDAGR060720170000002', 0.2, 2),
(36, 'IDAGR060720170000002', 0.16667, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbpag_pers2`
--

CREATE TABLE IF NOT EXISTS `tbpag_pers2` (
  `ids` int(10) NOT NULL,
  `idAgregat` varchar(20) NOT NULL,
  `W_bintang` float NOT NULL,
  `K` int(10) NOT NULL,
  `periode` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpag_pers2`
--

INSERT INTO `tbpag_pers2` (`ids`, `idAgregat`, `W_bintang`, `K`, `periode`) VALUES
(1, 'IDAGR030420170000001', 0, 4, 1),
(2, 'IDAGR030420170000001', 600, 4, 1),
(3, 'IDAGR030420170000001', 560, 4, 1),
(4, 'IDAGR030420170000001', 400, 4, 1),
(5, 'IDAGR030420170000001', 280, 4, 1),
(6, 'IDAGR030420170000001', 361, 4, 1),
(7, 'IDAGR060720170000002', 0, 4, 2),
(8, 'IDAGR060720170000002', 0, 4, 2),
(9, 'IDAGR060720170000002', 0, 4, 2),
(10, 'IDAGR060720170000002', 0, 4, 2),
(11, 'IDAGR060720170000002', 0, 4, 2),
(12, 'IDAGR060720170000002', 0, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbpag_pers3`
--

CREATE TABLE IF NOT EXISTS `tbpag_pers3` (
  `ids` int(10) NOT NULL,
  `idAgregat` varchar(20) NOT NULL,
  `Wt` int(10) NOT NULL,
  `A` float NOT NULL,
  `periode` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpag_pers3`
--

INSERT INTO `tbpag_pers3` (`ids`, `idAgregat`, `Wt`, `A`, `periode`) VALUES
(1, 'IDAGR030420170000001', 4, 0.5, 1),
(2, 'IDAGR030420170000001', 306, 0.5, 1),
(3, 'IDAGR030420170000001', 286, 0.5, 1),
(4, 'IDAGR030420170000001', 204, 0.5, 1),
(5, 'IDAGR030420170000001', 146, 0.5, 1),
(6, 'IDAGR030420170000001', 184, 0.5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbpag_pers4`
--

CREATE TABLE IF NOT EXISTS `tbpag_pers4` (
  `ids` int(10) NOT NULL,
  `idAgregat` varchar(20) NOT NULL,
  `I_adj` int(10) NOT NULL,
  `periode` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpag_pers4`
--

INSERT INTO `tbpag_pers4` (`ids`, `idAgregat`, `I_adj`, `periode`) VALUES
(1, 'IDAGR030420170000001', -2800, 1),
(2, 'IDAGR030420170000001', 300, 1),
(3, 'IDAGR030420170000001', 187, 1),
(4, 'IDAGR030420170000001', 100, 1),
(5, 'IDAGR030420170000001', 56, 1),
(6, 'IDAGR030420170000001', 60, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbperamalan`
--

CREATE TABLE IF NOT EXISTS `tbperamalan` (
  `idforecast` varchar(20) NOT NULL,
  `sse` float NOT NULL,
  `mse` float NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbperamalan`
--

INSERT INTO `tbperamalan` (`idforecast`, `sse`, `mse`, `keterangan`) VALUES
('IDFRC170320170000001', 32300, 5383, 'Forecast periode Januari 2017 sd Juni 2017');

-- --------------------------------------------------------

--
-- Table structure for table `tbperamalan_detail`
--

CREATE TABLE IF NOT EXISTS `tbperamalan_detail` (
  `idPeramalan` int(10) NOT NULL,
  `idforecast` varchar(20) NOT NULL,
  `Periode` varchar(10) NOT NULL,
  `Bulan` date NOT NULL,
  `SMA` int(11) NOT NULL,
  `ForecastError` int(11) NOT NULL,
  `KesalahanKuadrat` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbperamalan_detail`
--

INSERT INTO `tbperamalan_detail` (`idPeramalan`, `idforecast`, `Periode`, `Bulan`, `SMA`, `ForecastError`, `KesalahanKuadrat`) VALUES
(61, 'IDFRC170320170000001', '1', '2017-01-24', 0, 170, 28900),
(62, 'IDFRC170320170000001', '1', '2017-02-17', 150, -20, 400),
(63, 'IDFRC170320170000001', '1', '2017-03-01', 140, 10, 100),
(64, 'IDFRC170320170000001', '1', '2017-04-11', 100, -50, 2500),
(65, 'IDFRC170320170000001', '1', '2017-05-01', 70, 20, 400),
(66, 'IDFRC170320170000001', '1', '2017-06-20', 90, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbperencanaanagregat`
--

CREATE TABLE IF NOT EXISTS `tbperencanaanagregat` (
  `idAgregat` varchar(20) NOT NULL,
  `PeriodeAgregat` varchar(10) NOT NULL,
  `bn` int(11) NOT NULL,
  `K` int(11) NOT NULL,
  `idPeramalan` varchar(20) NOT NULL,
  `Ft` int(11) NOT NULL,
  `B` int(11) NOT NULL,
  `W*` int(11) NOT NULL,
  `Wt` int(11) NOT NULL,
  `I` int(11) NOT NULL,
  `dn` int(11) NOT NULL,
  `Pt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbpesanan`
--

CREATE TABLE IF NOT EXISTS `tbpesanan` (
  `kdnota` varchar(20) NOT NULL,
  `namaplg` varchar(50) NOT NULL,
  `alamatplg` varchar(50) NOT NULL,
  `produk` varchar(30) NOT NULL,
  `jml` int(11) NOT NULL,
  `tglpesan` date NOT NULL,
  `proses` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpesanan`
--

INSERT INTO `tbpesanan` (`kdnota`, `namaplg`, `alamatplg`, `produk`, `jml`, `tglpesan`, `proses`) VALUES
('201702190001', 'Fitrianaa', 'Bojaa', 'Gamis 11', 701, '0000-00-00', '0'),
('201702190002', 'Dedy', 'Boja', 'Gamis', 80, '2017-02-15', '0'),
('201702190003', 'Joko', 'Semarang', 'Gamis', 100, '2017-01-24', '0'),
('201702190004', 'Ani', 'Semarang', 'Gamis', 70, '2017-01-01', '0'),
('201702190005', 'Fitri', 'Ngaliyan', 'Gamis', 50, '2017-03-01', '0'),
('201702190006', 'Danu', 'Semarang', 'Gamis', 100, '2017-03-01', '0'),
('201702190007', 'Jono', 'Semarang', 'Gamis', 50, '2017-04-11', '0'),
('201702190008', 'Ana', 'Demak', 'Gamis', 90, '2017-05-01', '0'),
('201702190009', 'Siti', 'Kudus', 'Gamis', 90, '2017-06-20', '0'),
('201707160001', 'Ana', 'Boja', 'Gamis', 20, '0000-00-00', '0'),
('201707160002', 'Ana', 'Boja', 'Gamis', 20, '0000-00-00', ''),
('201707160003', 'Danu', 'Boja', 'Gamis', 10, '0000-00-00', ''),
('201707160004', 'Ana', 'Boja', 'Gamis', 20, '0000-00-00', ''),
('201707160005', 'Danu', 'Boja', 'Gamis', 10, '0000-00-00', ''),
('201707160006', 'Ana', 'Boja', 'Gamis', 20, '0000-00-00', '0'),
('201707160007', 'Danu', 'Boja', 'Gamis', 10, '0000-00-00', '0'),
('201707160008', 'Ana', 'Boja', 'Gamis', 20, '1970-01-01', '0'),
('201707160009', 'Danu', 'Boja', 'Gamis', 10, '1970-01-01', '0'),
('201707160012', 'Ana', 'Boja', 'Gamis', 20, '2023-09-21', '0'),
('201707160014', 'Danu', 'Boja', 'Gamis', 10, '2023-09-21', '0'),
('201707160015', 'Ana', 'Boja', 'Gamis', 20, '0000-00-00', '0'),
('201707160016', 'Danu', 'Boja', 'Gamis', 10, '0000-00-00', '0'),
('201707160017', 'Danu', 'Boja', 'Gamis', 50, '2017-09-09', '0'),
('201707160018', 'Ana', 'Boja', 'Gamis', 10, '2017-07-17', '1'),
('201707160019', 'Danu', 'Boja', 'Gamis', 10, '2017-07-17', '1'),
('201707160020', 'Ana', 'Boja', 'Gamis', 20, '2017-07-19', '0'),
('201707160021', 'Danu', 'Boja', 'Gamis', 10, '2017-07-18', '0'),
('201707160022', 'Ana', 'Boja', 'Gamis', 20, '2017-07-14', '0'),
('201707160023', 'Danu', 'Boja', 'Gamis', 10, '2017-07-18', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbproduk`
--

CREATE TABLE IF NOT EXISTS `tbproduk` (
  `idProduk` varchar(20) NOT NULL,
  `nmProduk` varchar(50) NOT NULL,
  `jmlInventori` int(11) NOT NULL,
  `leadTime` int(11) NOT NULL,
  `sumber` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbproduk`
--

INSERT INTO `tbproduk` (`idProduk`, `nmProduk`, `jmlInventori`, `leadTime`, `sumber`) VALUES
('PRO0001', 'Gamisa', 400, 2, 'Buatt'),
('PRO00012', 'Gamis', 700, 1, 'Buat'),
('PRO0003', 'Celana Pendek', 70, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE IF NOT EXISTS `tbuser` (
  `idUser` int(11) NOT NULL,
  `nmUser` varchar(30) NOT NULL,
  `psswd` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`idUser`, `nmUser`, `psswd`, `level`) VALUES
(1, 'Danu', '81dc9bdb52d04dc20036dbd8313ed055', 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbbahanbaku`
--
ALTER TABLE `tbbahanbaku`
  ADD PRIMARY KEY (`idBhnBaku`);

--
-- Indexes for table `tbbom`
--
ALTER TABLE `tbbom`
  ADD PRIMARY KEY (`idBOM`), ADD KEY `idxProduk` (`idProduk`), ADD KEY `idxKomponen` (`idKomponen`), ADD KEY `idxBhnBaku` (`idBhnBaku`);

--
-- Indexes for table `tbdetailkomponen`
--
ALTER TABLE `tbdetailkomponen`
  ADD PRIMARY KEY (`idBOMKomponen`), ADD KEY `idBhnBaku` (`idBhnBaku`), ADD KEY `idKomponen` (`idKomponen`);

--
-- Indexes for table `tbdetailproduk`
--
ALTER TABLE `tbdetailproduk`
  ADD PRIMARY KEY (`idDetailKomponen`);

--
-- Indexes for table `tbinventori`
--
ALTER TABLE `tbinventori`
  ADD PRIMARY KEY (`idInv`), ADD KEY `idBOM` (`idBOM`);

--
-- Indexes for table `tbkomponen`
--
ALTER TABLE `tbkomponen`
  ADD PRIMARY KEY (`idKomponen`) COMMENT 'idKomponen';

--
-- Indexes for table `tbmps`
--
ALTER TABLE `tbmps`
  ADD PRIMARY KEY (`idMPS`), ADD KEY `idAgregat` (`idAgregat`), ADD KEY `PeriodeMPS` (`PeriodeMPS`);

--
-- Indexes for table `tbmrp`
--
ALTER TABLE `tbmrp`
  ADD PRIMARY KEY (`idMRP`), ADD KEY `idInv` (`idInv`), ADD KEY `idAgregat` (`idAgregat`), ADD KEY `PeriodeMRP` (`PeriodeMRP`(20));

--
-- Indexes for table `tbpag`
--
ALTER TABLE `tbpag`
  ADD PRIMARY KEY (`idAgregat`);

--
-- Indexes for table `tbpag_pers1`
--
ALTER TABLE `tbpag_pers1`
  ADD PRIMARY KEY (`ids`);

--
-- Indexes for table `tbpag_pers2`
--
ALTER TABLE `tbpag_pers2`
  ADD PRIMARY KEY (`ids`);

--
-- Indexes for table `tbpag_pers3`
--
ALTER TABLE `tbpag_pers3`
  ADD PRIMARY KEY (`ids`);

--
-- Indexes for table `tbpag_pers4`
--
ALTER TABLE `tbpag_pers4`
  ADD PRIMARY KEY (`ids`);

--
-- Indexes for table `tbperamalan`
--
ALTER TABLE `tbperamalan`
  ADD PRIMARY KEY (`idforecast`);

--
-- Indexes for table `tbperamalan_detail`
--
ALTER TABLE `tbperamalan_detail`
  ADD PRIMARY KEY (`idPeramalan`);

--
-- Indexes for table `tbperencanaanagregat`
--
ALTER TABLE `tbperencanaanagregat`
  ADD PRIMARY KEY (`idAgregat`), ADD KEY `idPeramalan` (`idPeramalan`);

--
-- Indexes for table `tbpesanan`
--
ALTER TABLE `tbpesanan`
  ADD PRIMARY KEY (`kdnota`);

--
-- Indexes for table `tbproduk`
--
ALTER TABLE `tbproduk`
  ADD PRIMARY KEY (`idProduk`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbdetailkomponen`
--
ALTER TABLE `tbdetailkomponen`
  MODIFY `idBOMKomponen` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbdetailproduk`
--
ALTER TABLE `tbdetailproduk`
  MODIFY `idDetailKomponen` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tbpag_pers1`
--
ALTER TABLE `tbpag_pers1`
  MODIFY `ids` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `tbpag_pers2`
--
ALTER TABLE `tbpag_pers2`
  MODIFY `ids` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbpag_pers3`
--
ALTER TABLE `tbpag_pers3`
  MODIFY `ids` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbpag_pers4`
--
ALTER TABLE `tbpag_pers4`
  MODIFY `ids` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbperamalan_detail`
--
ALTER TABLE `tbperamalan_detail`
  MODIFY `idPeramalan` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
