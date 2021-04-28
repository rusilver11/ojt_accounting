-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2019 at 03:29 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama`) VALUES
('admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `idakun` int(11) NOT NULL,
  `kodeakun` varchar(25) NOT NULL,
  `namaakun` text NOT NULL,
  `posisi` enum('debit','kredit','','') NOT NULL,
  `laporan` varchar(20) NOT NULL,
  `neraca` varchar(12) NOT NULL,
  `aruskas` enum('no','operasional','investasi','pendanaan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`idakun`, `kodeakun`, `namaakun`, `posisi`, `laporan`, `neraca`, `aruskas`) VALUES
(496, '101', 'Kas', 'debit', '0', '18', 'no'),
(497, '102', 'Piutang Usaha', 'debit', '0', '18', 'no'),
(498, '103', 'Bahan Habis Pakai', 'debit', '0', '18', 'no'),
(499, '104', 'Asuransi dibayar di Muka', 'debit', '0', '18', 'no'),
(500, '106', 'Sewa Dibayar Dimuka', 'debit', '0', '18', 'no'),
(501, '107', 'Komputer', 'debit', '0', '25', 'investasi'),
(502, '108', 'Akumulasi penyusutan Komputer', 'kredit', '0', '25', 'no'),
(503, '109', 'Gedung Kantor', 'debit', '0', '25', 'investasi'),
(504, '110', 'Akumulasi Penyusutan Gedung Kantor', 'kredit', '0', '25', 'no'),
(505, '111', 'Kendaraan', 'debit', '0', '25', 'investasi'),
(506, '112', 'Akumulasi Penyusutan Kendaraan', 'kredit', '0', '25', 'no'),
(507, '202', 'Utang Gaji dan Honor', 'kredit', '0', '26', 'no'),
(508, '203', 'Utang Bank', 'kredit', '0', '27', 'no'),
(509, '301', 'Modal Usaha', 'kredit', '22', '0', 'pendanaan'),
(510, '302', 'Prive', 'debit', '24', '0', 'pendanaan'),
(511, '303', 'Ikhtisar Laba Rugi', 'debit', '0', '0', 'no'),
(512, '401', 'Pendapatan Paket', 'kredit', '19', '0', 'operasional'),
(513, '402', 'Pendapatan Surat', 'kredit', '19', '0', 'operasional'),
(514, '403', 'Pendapatan Wesel', 'kredit', '19', '0', 'operasional'),
(515, '501', 'Beban Gaji dan Honor', 'debit', '20', '0', 'operasional'),
(516, '502', 'Beban transportasi', 'debit', '20', '0', 'operasional'),
(517, '503', 'Beban Telpon', 'debit', '20', '0', 'operasional'),
(518, '504', 'Beban Sewa', 'debit', '20', '0', 'operasional'),
(519, '505', 'Beban Penyusutan Gedung Kantor', 'debit', '20', '0', 'operasional'),
(520, '506', 'Beban penyusutan Kendaraan', 'debit', '20', '0', 'operasional'),
(521, '507', 'Beban Penyusutan Komputer', 'debit', '20', '0', 'operasional'),
(522, '508', 'Beban pemakaian bahan habis pakai', 'debit', '20', '0', 'operasional'),
(523, '509', 'Beban Asuransi', 'debit', '20', '0', 'operasional'),
(524, '510', 'Beban Lain-Lain', 'debit', '21', '0', 'operasional'),
(525, '105', 'Perlengkapan Kantor', 'debit', '0', '18', 'investasi'),
(526, '113', 'Tanah', 'debit', '0', '18', 'investasi'),
(527, '201', 'Utang Usaha', 'kredit', '0', '26', 'no'),
(528, '999', 'Pajak Coba', 'debit', '0', '0', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `anggaran`
--

CREATE TABLE `anggaran` (
  `idanggaran` int(11) NOT NULL,
  `kodeakun` varchar(25) NOT NULL,
  `nominal` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `idsoal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bukubesar`
--

CREATE TABLE `bukubesar` (
  `idbb` int(11) NOT NULL,
  `skpd` varchar(100) DEFAULT NULL,
  `kodeakun` varchar(25) DEFAULT NULL,
  `namaakun` text,
  `tgl` date DEFAULT NULL,
  `uraianbb` text,
  `ref` varchar(25) DEFAULT NULL,
  `debit` int(11) DEFAULT NULL,
  `kredit` int(11) DEFAULT NULL,
  `saldo` int(11) NOT NULL,
  `idtrx` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bukubesar`
--

INSERT INTO `bukubesar` (`idbb`, `skpd`, `kodeakun`, `namaakun`, `tgl`, `uraianbb`, `ref`, `debit`, `kredit`, `saldo`, `idtrx`) VALUES
(120, 'Dinas Pendapatan Daerah', '101', 'Kas', '2018-11-30', 'Kas', '101', 215980000, 0, 215980000, 120),
(121, 'Dinas Pendapatan Daerah', '102', 'Piutang Usaha', '2018-11-30', 'Piutang Usaha', '102', 162500000, 0, 162500000, 121),
(122, 'Dinas Pendapatan Daerah', '103', 'Bahan Habis Pakai', '2018-11-30', 'Bahan Habis Pakai', '103', 26500000, 0, 26500000, 122),
(123, 'Dinas Pendapatan Daerah', '104', 'Asuransi dibayar di Muka', '2018-11-30', 'Asuransi dibayar di Muka', '104', 78000000, 0, 78000000, 123),
(133, 'Dinas Pendapatan Daerah', '105', 'Perlengkapan Kantor', '2018-11-30', 'Perlengkapan Kantor', '105', 24100000, 0, 24100000, 133),
(134, 'Dinas Pendapatan Daerah', '106', 'Sewa Dibayar Dimuka', '2018-11-30', 'Sewa Dibayar Dimuka', '106', 0, 0, 0, 134),
(135, 'Dinas Pendapatan Daerah', '107', 'Komputer', '2018-11-30', 'Komputer', '107', 0, 0, 0, 135),
(136, 'Dinas Pendapatan Daerah', '108', 'Akumulasi penyusutan Komputer', '2018-11-30', 'Akumulasi penyusutan Komputer', '108', 0, 0, 0, 136),
(137, 'Dinas Pendapatan Daerah', '109', 'Gedung Kantor', '2018-11-30', 'Gedung Kantor', '109', 546000000, 0, 546000000, 137),
(138, 'Dinas Pendapatan Daerah', '110', 'Akumulasi Penyusutan Gedung Kantor', '2018-11-30', 'Akumulasi Penyusutan Gedung Kantor', '110', 0, 70000000, -70000000, 138),
(139, 'Dinas Pendapatan Daerah', '111', 'Kendaraan', '2018-11-30', 'Kendaraan', '111', 460000000, 0, 460000000, 139),
(140, 'Dinas Pendapatan Daerah', '112', 'Akumulasi Penyusutan Kendaraan', '2018-11-30', 'Akumulasi Penyusutan Kendaraan', '112', 0, 102500000, -102500000, 140),
(141, 'Dinas Pendapatan Daerah', '113', 'Tanah', '2018-11-30', 'Tanah', '113', 1354975000, 0, 1354975000, 141),
(142, 'Dinas Pendapatan Daerah', '201', 'Utang Usaha', '2018-11-30', 'Utang Usaha', '201', 0, 85750000, -85750000, 142),
(143, 'Dinas Pendapatan Daerah', '202', 'Utang Gaji dan Honor', '2018-11-30', 'Utang Gaji dan Honor', '202', 0, 72500000, -72500000, 143),
(144, 'Dinas Pendapatan Daerah', '203', 'Utang Bank', '2018-11-30', 'Utang Bank', '203', 0, 301500000, -301500000, 144),
(145, 'Dinas Pendapatan Daerah', '301', 'Modal Usaha', '2018-11-30', 'Modal Usaha', '301', 0, 741165000, -741165000, 145),
(146, 'Dinas Pendapatan Daerah', '302', 'Prive', '2018-11-30', 'Prive', '302', 5000000, 0, 5000000, 146),
(147, 'Dinas Pendapatan Daerah', '303', 'Ikhtisar Laba Rugi', '2018-11-30', 'Ikhtisar Laba Rugi', '303', 0, 0, 0, 147),
(148, 'Dinas Pendapatan Daerah', '401', 'Pendapatan Paket', '2018-11-30', 'Pendapatan Paket', '401', 0, 687400000, -687400000, 148),
(149, 'Dinas Pendapatan Daerah', '402', 'Pendapatan Surat', '2018-11-30', 'Pendapatan Surat', '402', 0, 465000000, -465000000, 149),
(150, 'Dinas Pendapatan Daerah', '403', 'Pendapatan Wesel', '2018-11-30', 'Pendapatan Wesel', '403', 0, 865090000, -865090000, 150),
(151, 'Dinas Pendapatan Daerah', '501', 'Beban Gaji dan Honor', '2018-11-30', 'Beban Gaji dan Honor', '501', 240000000, 0, 240000000, 151),
(152, 'Dinas Pendapatan Daerah', '502', 'Beban transportasi', '2018-11-30', 'Beban transportasi', '502', 147600000, 0, 147600000, 152),
(153, 'Dinas Pendapatan Daerah', '503', 'Beban Telpon', '2018-11-30', 'Beban Telpon', '503', 24500000, 0, 24500000, 153),
(154, 'Dinas Pendapatan Daerah', '504', 'Beban Sewa', '2018-11-30', 'Beban Sewa', '504', 71250000, 0, 71250000, 154),
(155, 'Dinas Pendapatan Daerah', '505', 'Beban Penyusutan Gedung Kantor', '2018-11-30', 'Beban Penyusutan Gedung Kantor', '505', 0, 0, 0, 155),
(156, 'Dinas Pendapatan Daerah', '506', 'Beban penyusutan Kendaraan', '2018-11-30', 'Beban penyusutan Kendaraan', '506', 0, 0, 0, 156),
(157, 'Dinas Pendapatan Daerah', '507', 'Beban Penyusutan Komputer', '2018-11-30', 'Beban Penyusutan Komputer', '507', 0, 0, 0, 157),
(158, 'Dinas Pendapatan Daerah', '508', 'Beban pemakaian bahan habis pakai', '2018-11-30', 'Beban pemakaian bahan habis pakai', '508', 0, 0, 0, 158),
(159, 'Dinas Pendapatan Daerah', '509', 'Beban Asuransi', '2018-11-30', 'Beban Asuransi', '509', 0, 0, 0, 159),
(160, 'Dinas Pendapatan Daerah', '510', 'Beban Lain-Lain', '2018-11-30', 'Beban Lain-Lain', '501', 34500000, 0, 34500000, 160),
(161, 'Dinas Pendapatan Daerah', '201', 'Utang Usaha', '2018-12-02', 'Utang Usaha', '201', 16700000, 0, -69050000, 161),
(162, 'Dinas Pendapatan Daerah', '101', 'Kas', '2018-12-02', 'Kas', '101', 0, 16700000, 199280000, 162),
(163, 'Dinas Pendapatan Daerah', '102', 'Piutang Usaha', '2018-12-03', 'Piutang Usaha', '102', 9975000, 0, 172475000, 163),
(164, 'Dinas Pendapatan Daerah', '401', 'Pendapatan Paket', '2018-12-03', 'Pendapatan Paket', '401', 0, 9975000, -697375000, 164),
(165, 'Dinas Pendapatan Daerah', '103', 'Bahan Habis Pakai', '2018-12-03', 'Bahan Habis Pakai', '103', 1375000, 0, 27875000, 165),
(166, 'Dinas Pendapatan Daerah', '201', 'Utang Usaha', '2018-12-03', 'Utang Usaha', '201', 0, 1375000, -70425000, 166),
(167, 'Dinas Pendapatan Daerah', '101', 'Kas', '2018-12-06', 'Kas', '101', 14250000, 0, 213530000, 167),
(168, 'Dinas Pendapatan Daerah', '102', 'Piutang Usaha', '2018-12-06', 'Piutang Usaha', '102', 0, 14250000, 158225000, 168),
(169, 'Dinas Pendapatan Daerah', '107', 'Komputer', '2018-12-10', 'Komputer', '107', 55000000, 0, 55000000, 169),
(170, 'Dinas Pendapatan Daerah', '101', 'Kas', '2018-12-10', 'Kas', '101', 0, 55000000, 158530000, 170),
(171, 'Dinas Pendapatan Daerah', '101', 'Kas', '2018-12-13', 'Kas', '101', 8775000, 0, 167305000, 171),
(172, 'Dinas Pendapatan Daerah', '401', 'Pendapatan Paket', '2018-12-13', 'Pendapatan Paket', '401', 0, 8775000, -706150000, 172),
(191, 'Dinas Pendapatan Daerah', '101', 'Kas', '2018-12-13', 'Kas', '101', 46500000, 0, 213805000, 191),
(192, 'Dinas Pendapatan Daerah', '102', 'Piutang Usaha', '2018-12-13', 'Piutang Usaha', '102', 0, 46500000, 111725000, 192),
(193, 'Dinas Pendapatan Daerah', '102', 'Piutang Usaha', '2018-12-18', 'Piutang Usaha', '102', 33025000, 0, 144750000, 193),
(194, 'Dinas Pendapatan Daerah', '401', 'Pendapatan Paket', '2018-12-18', 'Pendapatan Paket', '401', 0, 33025000, -739175000, 194),
(195, 'Dinas Pendapatan Daerah', '201', 'Utang Usaha', '2018-12-28', 'Utang Usaha', '201', 13750000, 0, -56675000, 195),
(196, 'Dinas Pendapatan Daerah', '101', 'Kas', '2018-12-28', 'Kas', '101', 0, 13750000, 200055000, 196),
(199, 'Dinas Pendapatan Daerah', '508', 'Beban pemakaian bahan habis pakai', '2018-12-31', 'Beban pemakaian bahan habis pakai', '508', 16375000, 0, 16375000, 199),
(200, 'Dinas Pendapatan Daerah', '103', 'Bahan Habis Pakai', '2018-12-31', 'Bahan Habis Pakai', '103', 0, 16375000, 11500000, 200),
(201, 'Dinas Pendapatan Daerah', '509', 'Beban Asuransi', '2018-12-31', 'Beban Asuransi', '509', 19500000, 0, 19500000, 201),
(202, 'Dinas Pendapatan Daerah', '104', 'Asuransi dibayar di Muka', '2018-12-31', 'Asuransi dibayar di Muka', '104', 0, 19500000, 58500000, 202),
(203, 'Dinas Pendapatan Daerah', '106', 'Sewa Dibayar Dimuka', '2018-12-31', 'Sewa Dibayar Dimuka', '106', 66500000, 0, 66500000, 203),
(204, 'Dinas Pendapatan Daerah', '504', 'Beban Sewa', '2018-12-31', 'Beban Sewa', '504', 0, 66500000, 4750000, 204),
(205, 'Dinas Pendapatan Daerah', '505', 'Beban Penyusutan Gedung Kantor', '2018-12-31', 'Beban Penyusutan Gedung Kantor', '505', 54000000, 0, 54000000, 205),
(206, 'Dinas Pendapatan Daerah', '110', 'Akumulasi Penyusutan Gedung Kantor', '2018-12-31', 'Akumulasi Penyusutan Gedung Kantor', '110', 0, 54000000, -124000000, 206),
(207, 'Dinas Pendapatan Daerah', '506', 'Beban penyusutan Kendaraan', '2018-12-31', 'Beban penyusutan Kendaraan', '506', 30000000, 0, 30000000, 207),
(208, 'Dinas Pendapatan Daerah', '112', 'Akumulasi Penyusutan Kendaraan', '2018-12-31', 'Akumulasi Penyusutan Kendaraan', '112', 0, 30000000, -132500000, 208),
(213, 'Dinas Pendapatan Daerah', '507', 'Beban Penyusutan Komputer', '2018-12-31', 'Beban Penyusutan Komputer', '507', 458000, 0, 458000, 213),
(214, 'Dinas Pendapatan Daerah', '108', 'Akumulasi penyusutan Komputer', '2018-12-31', 'Akumulasi penyusutan Komputer', '108', 0, 458000, -458000, 214),
(215, 'Dinas Pendapatan Daerah', '501', 'Beban Gaji dan Honor', '2018-12-31', 'Beban Gaji dan Honor', '501', 9500000, 0, 249500000, 215),
(216, 'Dinas Pendapatan Daerah', '202', 'Utang Gaji dan Honor', '2018-12-31', 'Utang Gaji dan Honor', '202', 0, 9500000, -82000000, 216);

-- --------------------------------------------------------

--
-- Table structure for table `jurnalpenyesuaian`
--

CREATE TABLE `jurnalpenyesuaian` (
  `tgl` date NOT NULL,
  `nobukti` int(11) NOT NULL,
  `nojp` int(11) NOT NULL,
  `nosubjp` int(11) NOT NULL,
  `kodeakun` varchar(25) NOT NULL,
  `uraianjurnal` text NOT NULL,
  `ref` varchar(25) NOT NULL,
  `debit` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `idtrx` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurnalpenyesuaian`
--

INSERT INTO `jurnalpenyesuaian` (`tgl`, `nobukti`, `nojp`, `nosubjp`, `kodeakun`, `uraianjurnal`, `ref`, `debit`, `kredit`, `idtrx`) VALUES
('2018-12-31', 1, 9, 1, '508', 'Beban pemakaian bahan habis pakai', '508', 16375000, 0, 199),
('2018-12-31', 2, 9, 2, '103', 'Bahan Habis Pakai', '103', 0, 16375000, 200),
('2018-12-31', 3, 9, 3, '509', 'Beban Asuransi', '509', 19500000, 0, 201),
('2018-12-31', 4, 9, 4, '104', 'Asuransi dibayar dimuka', '104', 0, 19500000, 202),
('2018-12-31', 5, 9, 5, '106', 'Sewa Dibayar Dimuka', '106', 66500000, 0, 203),
('2018-12-31', 6, 9, 6, '504', 'Beban Sewa', '504', 0, 66500000, 204),
('2018-12-31', 7, 9, 7, '505', 'Beban Penyusutan Gedung Kantor', '505', 54000000, 0, 205),
('2018-12-31', 8, 9, 8, '110', 'Akumulasi Penyusutan Gedung Kantor', '110', 0, 54000000, 206),
('2018-12-31', 9, 9, 9, '506', 'Beban Penyusutan Kendaraan', '506', 30000000, 0, 207),
('2018-12-31', 10, 9, 10, '112', 'Akumulasi Penyusutan Kendaraan', '112', 0, 30000000, 208),
('2018-12-31', 15, 9, 11, '507', 'Beban Penyusutan Komputer', '507', 458000, 0, 213),
('2018-12-31', 16, 9, 12, '108', 'Akumulasi Penyusutan Komputer', '108', 0, 458000, 214),
('2018-12-31', 17, 9, 13, '501', 'Beban gaji dan honor', '501', 9500000, 0, 215),
('2018-12-31', 18, 9, 14, '202', 'Utang Gaji dan Honor', '202', 0, 9500000, 216);

-- --------------------------------------------------------

--
-- Table structure for table `jurnalumum`
--

CREATE TABLE `jurnalumum` (
  `tgl` date NOT NULL,
  `nobukti` int(11) NOT NULL,
  `noju` int(11) DEFAULT NULL,
  `nosubju` int(11) DEFAULT NULL,
  `kodeakun` varchar(25) NOT NULL,
  `uraianjurnal` text NOT NULL,
  `ref` varchar(25) DEFAULT NULL,
  `debit` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `idtrx` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurnalumum`
--

INSERT INTO `jurnalumum` (`tgl`, `nobukti`, `noju`, `nosubju`, `kodeakun`, `uraianjurnal`, `ref`, `debit`, `kredit`, `idtrx`) VALUES
('2018-11-30', 120, 1, 1, '101', 'Kas', '101', 215980000, 0, 120),
('2018-11-30', 121, 1, 2, '102', 'Piutang Usaha', '102', 162500000, 0, 121),
('2018-11-30', 122, 1, 3, '103', 'Bahan Habis Pakai', '103', 26500000, 0, 122),
('2018-11-30', 123, 1, 4, '104', 'Asuransi dibayar dimuka', '104', 78000000, 0, 123),
('2018-11-30', 133, 1, 5, '105', 'Perlengkapan Kantor', '105', 24100000, 0, 133),
('2018-11-30', 134, 1, 6, '106', 'Sewa Dibayar Dimuka', '106', 0, 0, 134),
('2018-11-30', 135, 1, 7, '107', 'Komputer', '107', 0, 0, 135),
('2018-11-30', 136, 1, 8, '108', 'Akumulasi Penyusutan Komputer', '108', 0, 0, 136),
('2018-11-30', 137, 1, 9, '109', 'Gedung Kantor', '109', 546000000, 0, 137),
('2018-11-30', 138, 1, 10, '110', 'Akumulasi Penyusutan Gedung Kantor', '110', 0, 70000000, 138),
('2018-11-30', 139, 1, 11, '111', 'Kendaraan', '111', 460000000, 0, 139),
('2018-11-30', 140, 1, 12, '112', 'Akumulasi Penyusutan Kendaraan', '112', 0, 102500000, 140),
('2018-11-30', 141, 1, 13, '113', 'Tanah', '113', 1354975000, 0, 141),
('2018-11-30', 142, 1, 14, '201', 'Utang Usaha', '201', 0, 85750000, 142),
('2018-11-30', 143, 1, 15, '202', 'Utang Gaji dan Honor', '202', 0, 72500000, 143),
('2018-11-30', 144, 1, 16, '203', 'Utang Bank', '203', 0, 301500000, 144),
('2018-11-30', 145, 1, 17, '301', 'Modal Usaha', '301', 0, 741165000, 145),
('2018-11-30', 146, 1, 18, '302', 'Prive', '302', 5000000, 0, 146),
('2018-11-30', 147, 1, 19, '303', 'Ikhtisar Laba Rugi', '303', 0, 0, 147),
('2018-11-30', 148, 1, 20, '401', 'Pendapatan Paket', '401', 0, 687400000, 148),
('2018-11-30', 149, 1, 21, '402', 'Pendapatan Surat', '402', 0, 465000000, 149),
('2018-11-30', 150, 1, 22, '403', 'Pendapatan Wesel', '403', 0, 865090000, 150),
('2018-11-30', 151, 1, 23, '501', 'Beban Gaji Honor', '501', 240000000, 0, 151),
('2018-11-30', 152, 1, 24, '502', 'Beban Transportasi', '502', 147600000, 0, 152),
('2018-11-30', 153, 1, 25, '503', 'Beban Telpon', '503', 24500000, 0, 153),
('2018-11-30', 154, 1, 26, '504', 'Beban Sewa', '504', 71250000, 0, 154),
('2018-11-30', 155, 1, 27, '505', 'Beban Penyusutan Gedung Kantor', '505', 0, 0, 155),
('2018-11-30', 156, 1, 28, '506', 'Beban Penyusutan Kendaraan', '506', 0, 0, 156),
('2018-11-30', 157, 1, 29, '507', 'Beban Penyusutan Komputer', '507', 0, 0, 157),
('2018-11-30', 158, 1, 30, '508', 'Beban pemakaian bahan habis pakai', '508', 0, 0, 158),
('2018-11-30', 159, 1, 31, '509', 'Beban Asuransi', '509', 0, 0, 159),
('2018-11-30', 160, 1, 32, '510', 'Beban Lain-Lain', '501', 34500000, 0, 160),
('2018-12-02', 161, 2, 1, '201', 'Utang Usaha', '201', 16700000, 0, 161),
('2018-12-02', 162, 2, 2, '101', 'Kas', '101', 0, 16700000, 162),
('2018-12-03', 163, 3, 1, '102', 'Piutang Usaha', '102', 9975000, 0, 163),
('2018-12-03', 164, 3, 2, '401', 'Pendapatan Paket', '401', 0, 9975000, 164),
('2018-12-03', 165, 3, 3, '103', 'Bahan Habis Pakai', '103', 1375000, 0, 165),
('2018-12-03', 166, 3, 4, '201', 'Utang Usaha', '201', 0, 1375000, 166),
('2018-12-06', 167, 4, 1, '101', 'Kas', '101', 14250000, 0, 167),
('2018-12-06', 168, 4, 2, '102', 'Piutang Usaha', '102', 0, 14250000, 168),
('2018-12-10', 169, 5, 1, '107', 'Komputer', '107', 55000000, 0, 169),
('2018-12-10', 170, 5, 2, '101', 'Kas', '101', 0, 55000000, 170),
('2018-12-13', 171, 6, 1, '101', 'Kas', '101', 8775000, 0, 171),
('2018-12-13', 172, 6, 2, '401', 'Pendapatan Paket', '401', 0, 8775000, 172),
('2018-12-13', 191, 6, 3, '101', 'Kas', '101', 46500000, 0, 191),
('2018-12-13', 192, 6, 4, '102', 'Piutang Usaha', '102', 0, 46500000, 192),
('2018-12-18', 193, 8, 1, '102', 'Piutang Usaha', '102', 33025000, 0, 193),
('2018-12-18', 194, 8, 2, '401', 'Pendapatan Paket', '401', 0, 33025000, 194),
('2018-12-28', 195, 7, 3, '201', 'utang usaha', '201', 13750000, 0, 195),
('2018-12-28', 196, 7, 4, '101', 'Kas', '101', 0, 13750000, 196);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `nokategori` int(2) DEFAULT NULL,
  `namakategori` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`nokategori`, `namakategori`) VALUES
(1, 'Aset'),
(2, 'Kewajiban'),
(3, 'Ekuitas'),
(4, 'Pendapatan'),
(5, 'Belanja'),
(6, 'Beban'),
(7, 'Ekuitas(SaldoAwal)'),
(8, 'deviden'),
(9, 'pajak');

-- --------------------------------------------------------

--
-- Table structure for table `subkategori`
--

CREATE TABLE `subkategori` (
  `idkategori` int(11) NOT NULL,
  `laporan` varchar(50) NOT NULL,
  `kategori` int(11) NOT NULL,
  `idsubkategori` int(5) DEFAULT NULL,
  `subkategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkategori`
--

INSERT INTO `subkategori` (`idkategori`, `laporan`, `kategori`, `idsubkategori`, `subkategori`) VALUES
(18, 'Neraca', 1, 11, 'Aset Lancar'),
(19, 'Laporan Laba Rugi', 4, 41, 'Pendapatan'),
(20, 'Laporan Laba Rugi', 6, 61, 'Biaya Operasi'),
(21, 'Laporan Laba Rugi', 6, 62, 'Pendapatan (Biaya ) non operasi'),
(22, 'Laporan Perubahan Ekuitas', 7, 71, 'Modal '),
(23, 'Laporan Perubahan Ekuitas', 8, 81, 'deviden'),
(24, 'Laporan Perubahan Ekuitas', 3, 31, 'Ekuitas'),
(25, 'Neraca', 1, 12, 'Aset Tetap'),
(26, 'Neraca', 2, 21, 'Kewajiban Lancar'),
(27, 'Neraca', 2, 22, 'Kewajiban Jangka Panjang');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `tgl` date DEFAULT NULL,
  `nobukti` int(11) NOT NULL,
  `notrx` int(11) NOT NULL,
  `nosubtrx` int(11) NOT NULL,
  `idakun` varchar(25) NOT NULL,
  `uraianjurnal` longtext,
  `uraianbb` longtext,
  `jurnal` enum('umum','penyesuaian','','') NOT NULL,
  `ref` varchar(25) DEFAULT NULL,
  `debit` int(11) DEFAULT '0',
  `kredit` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`tgl`, `nobukti`, `notrx`, `nosubtrx`, `idakun`, `uraianjurnal`, `uraianbb`, `jurnal`, `ref`, `debit`, `kredit`) VALUES
('2018-11-30', 120, 1, 1, '101', 'Kas', 'Kas', 'umum', '101', 215980000, 0),
('2018-11-30', 121, 1, 2, '102', 'Piutang Usaha', 'Piutang Usaha', 'umum', '102', 162500000, 0),
('2018-11-30', 122, 1, 3, '103', 'Bahan Habis Pakai', 'Bahan Habis Pakai', 'umum', '103', 26500000, 0),
('2018-11-30', 123, 1, 4, '104', 'Asuransi dibayar dimuka', 'Asuransi dibayar di Muka', 'umum', '104', 78000000, 0),
('2018-11-30', 133, 1, 5, '105', 'Perlengkapan Kantor', 'Perlengkapan Kantor', 'umum', '105', 24100000, 0),
('2018-11-30', 134, 1, 6, '106', 'Sewa Dibayar Dimuka', 'Sewa Dibayar Dimuka', 'umum', '106', 0, 0),
('2018-11-30', 135, 1, 7, '107', 'Komputer', 'Komputer', 'umum', '107', 0, 0),
('2018-11-30', 136, 1, 8, '108', 'Akumulasi Penyusutan Komputer', 'Akumulasi penyusutan Komputer', 'umum', '108', 0, 0),
('2018-11-30', 137, 1, 9, '109', 'Gedung Kantor', 'Gedung Kantor', 'umum', '109', 546000000, 0),
('2018-11-30', 138, 1, 10, '110', 'Akumulasi Penyusutan Gedung Kantor', 'Akumulasi Penyusutan Gedung Kantor', 'umum', '110', 0, 70000000),
('2018-11-30', 139, 1, 11, '111', 'Kendaraan', 'Kendaraan', 'umum', '111', 460000000, 0),
('2018-11-30', 140, 1, 12, '112', 'Akumulasi Penyusutan Kendaraan', 'Akumulasi Penyusutan Kendaraan', 'umum', '112', 0, 102500000),
('2018-11-30', 141, 1, 13, '113', 'Tanah', 'Tanah', 'umum', '113', 1354975000, 0),
('2018-11-30', 142, 1, 14, '201', 'Utang Usaha', 'Utang Usaha', 'umum', '201', 0, 85750000),
('2018-11-30', 143, 1, 15, '202', 'Utang Gaji dan Honor', 'Utang Gaji dan Honor', 'umum', '202', 0, 72500000),
('2018-11-30', 144, 1, 16, '203', 'Utang Bank', 'Utang Bank', 'umum', '203', 0, 301500000),
('2018-11-30', 145, 1, 17, '301', 'Modal Usaha', 'Modal Usaha', 'umum', '301', 0, 741165000),
('2018-11-30', 146, 1, 18, '302', 'Prive', 'Prive', 'umum', '302', 5000000, 0),
('2018-11-30', 147, 1, 19, '303', 'Ikhtisar Laba Rugi', 'Ikhtisar Laba Rugi', 'umum', '303', 0, 0),
('2018-11-30', 148, 1, 20, '401', 'Pendapatan Paket', 'Pendapatan Paket', 'umum', '401', 0, 687400000),
('2018-11-30', 149, 1, 21, '402', 'Pendapatan Surat', 'Pendapatan Surat', 'umum', '402', 0, 465000000),
('2018-11-30', 150, 1, 22, '403', 'Pendapatan Wesel', 'Pendapatan Wesel', 'umum', '403', 0, 865090000),
('2018-11-30', 151, 1, 23, '501', 'Beban Gaji Honor', 'Beban Gaji dan Honor', 'umum', '501', 240000000, 0),
('2018-11-30', 152, 1, 24, '502', 'Beban Transportasi', 'Beban transportasi', 'umum', '502', 147600000, 0),
('2018-11-30', 153, 1, 25, '503', 'Beban Telpon', 'Beban Telpon', 'umum', '503', 24500000, 0),
('2018-11-30', 154, 1, 26, '504', 'Beban Sewa', 'Beban Sewa', 'umum', '504', 71250000, 0),
('2018-11-30', 155, 1, 27, '505', 'Beban Penyusutan Gedung Kantor', 'Beban Penyusutan Gedung Kantor', 'umum', '505', 0, 0),
('2018-11-30', 156, 1, 28, '506', 'Beban Penyusutan Kendaraan', 'Beban penyusutan Kendaraan', 'umum', '506', 0, 0),
('2018-11-30', 157, 1, 29, '507', 'Beban Penyusutan Komputer', 'Beban Penyusutan Komputer', 'umum', '507', 0, 0),
('2018-11-30', 158, 1, 30, '508', 'Beban pemakaian bahan habis pakai', 'Beban pemakaian bahan habis pakai', 'umum', '508', 0, 0),
('2018-11-30', 159, 1, 31, '509', 'Beban Asuransi', 'Beban Asuransi', 'umum', '509', 0, 0),
('2018-11-30', 160, 1, 32, '510', 'Beban Lain-Lain', 'Beban Lain-Lain', 'umum', '501', 34500000, 0),
('2018-12-02', 161, 2, 1, '201', 'Utang Usaha', 'Utang Usaha', 'umum', '201', 16700000, 0),
('2018-12-02', 162, 2, 2, '101', 'Kas', 'Kas', 'umum', '101', 0, 16700000),
('2018-12-03', 163, 3, 1, '102', 'Piutang Usaha', 'Piutang Usaha', 'umum', '102', 9975000, 0),
('2018-12-03', 164, 3, 2, '401', 'Pendapatan Paket', 'Pendapatan Paket', 'umum', '401', 0, 9975000),
('2018-12-03', 165, 3, 3, '103', 'Bahan Habis Pakai', 'Bahan Habis Pakai', 'umum', '103', 1375000, 0),
('2018-12-03', 166, 3, 4, '201', 'Utang Usaha', 'Utang Usaha', 'umum', '201', 0, 1375000),
('2018-12-06', 167, 4, 1, '101', 'Kas', 'Kas', 'umum', '101', 14250000, 0),
('2018-12-06', 168, 4, 2, '102', 'Piutang Usaha', 'Piutang Usaha', 'umum', '102', 0, 14250000),
('2018-12-10', 169, 5, 1, '107', 'Komputer', 'Komputer', 'umum', '107', 55000000, 0),
('2018-12-10', 170, 5, 2, '101', 'Kas', 'Kas', 'umum', '101', 0, 55000000),
('2018-12-13', 171, 6, 1, '101', 'Kas', 'Kas', 'umum', '101', 8775000, 0),
('2018-12-13', 172, 6, 2, '401', 'Pendapatan Paket', 'Pendapatan Paket', 'umum', '401', 0, 8775000),
('2018-12-13', 191, 6, 3, '101', 'Kas', 'Kas', 'umum', '101', 46500000, 0),
('2018-12-13', 192, 6, 4, '102', 'Piutang Usaha', 'Piutang Usaha', 'umum', '102', 0, 46500000),
('2018-12-18', 193, 8, 1, '102', 'Piutang Usaha', 'Piutang Usaha', 'umum', '102', 33025000, 0),
('2018-12-18', 194, 8, 2, '401', 'Pendapatan Paket', 'Pendapatan Paket', 'umum', '401', 0, 33025000),
('2018-12-28', 195, 7, 3, '201', 'utang usaha', 'Utang Usaha', 'umum', '201', 13750000, 0),
('2018-12-28', 196, 7, 4, '101', 'Kas', 'Kas', 'umum', '101', 0, 13750000),
('2018-12-31', 199, 9, 1, '508', 'Beban pemakaian bahan habis pakai', 'Beban pemakaian bahan habis pakai', 'penyesuaian', '508', 16375000, 0),
('2018-12-31', 200, 9, 2, '103', 'Bahan Habis Pakai', 'Bahan Habis Pakai', 'penyesuaian', '103', 0, 16375000),
('2018-12-31', 201, 9, 3, '509', 'Beban Asuransi', 'Beban Asuransi', 'penyesuaian', '509', 19500000, 0),
('2018-12-31', 202, 9, 4, '104', 'Asuransi dibayar dimuka', 'Asuransi dibayar di Muka', 'penyesuaian', '104', 0, 19500000),
('2018-12-31', 203, 9, 5, '106', 'Sewa Dibayar Dimuka', 'Sewa Dibayar Dimuka', 'penyesuaian', '106', 66500000, 0),
('2018-12-31', 204, 9, 6, '504', 'Beban Sewa', 'Beban Sewa', 'penyesuaian', '504', 0, 66500000),
('2018-12-31', 205, 9, 7, '505', 'Beban Penyusutan Gedung Kantor', 'Beban Penyusutan Gedung Kantor', 'penyesuaian', '505', 54000000, 0),
('2018-12-31', 206, 9, 8, '110', 'Akumulasi Penyusutan Gedung Kantor', 'Akumulasi Penyusutan Gedung Kantor', 'penyesuaian', '110', 0, 54000000),
('2018-12-31', 207, 9, 9, '506', 'Beban Penyusutan Kendaraan', 'Beban penyusutan Kendaraan', 'penyesuaian', '506', 30000000, 0),
('2018-12-31', 208, 9, 10, '112', 'Akumulasi Penyusutan Kendaraan', 'Akumulasi Penyusutan Kendaraan', 'penyesuaian', '112', 0, 30000000),
('2018-12-31', 213, 9, 11, '507', 'Beban Penyusutan Komputer', 'Beban Penyusutan Komputer', 'penyesuaian', '507', 458000, 0),
('2018-12-31', 214, 9, 12, '108', 'Akumulasi Penyusutan Komputer', 'Akumulasi penyusutan Komputer', 'penyesuaian', '108', 0, 458000),
('2018-12-31', 215, 9, 13, '501', 'Beban gaji dan honor', 'Beban Gaji dan Honor', 'penyesuaian', '501', 9500000, 0),
('2018-12-31', 216, 9, 14, '202', 'Utang Gaji dan Honor', 'Utang Gaji dan Honor', 'penyesuaian', '202', 0, 9500000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama`) VALUES
('ari', 'ari', 'ari'),
('user', 'user1', 'user1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`idakun`);

--
-- Indexes for table `anggaran`
--
ALTER TABLE `anggaran`
  ADD PRIMARY KEY (`idanggaran`);

--
-- Indexes for table `bukubesar`
--
ALTER TABLE `bukubesar`
  ADD PRIMARY KEY (`idbb`);

--
-- Indexes for table `jurnalpenyesuaian`
--
ALTER TABLE `jurnalpenyesuaian`
  ADD PRIMARY KEY (`nobukti`);

--
-- Indexes for table `jurnalumum`
--
ALTER TABLE `jurnalumum`
  ADD KEY `nobukti` (`nobukti`);

--
-- Indexes for table `subkategori`
--
ALTER TABLE `subkategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`nobukti`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `idakun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=529;
--
-- AUTO_INCREMENT for table `anggaran`
--
ALTER TABLE `anggaran`
  MODIFY `idanggaran` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bukubesar`
--
ALTER TABLE `bukubesar`
  MODIFY `idbb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;
--
-- AUTO_INCREMENT for table `jurnalpenyesuaian`
--
ALTER TABLE `jurnalpenyesuaian`
  MODIFY `nobukti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `jurnalumum`
--
ALTER TABLE `jurnalumum`
  MODIFY `nobukti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;
--
-- AUTO_INCREMENT for table `subkategori`
--
ALTER TABLE `subkategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `nobukti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
