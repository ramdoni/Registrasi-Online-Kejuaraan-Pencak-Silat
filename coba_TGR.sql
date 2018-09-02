-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 09, 2018 at 05:48 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simulasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userID` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userID`, `username`, `password`) VALUES
(1, 'admin', 'c8837b23ff8aaa8a2dde915473ce0991');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_tanding`
--

CREATE TABLE `jadwal_tanding` (
  `id_partai` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `kelas` varchar(55) NOT NULL,
  `gelanggang` varchar(2) NOT NULL,
  `partai` varchar(4) NOT NULL,
  `nm_merah` varchar(55) NOT NULL,
  `kontingen_merah` varchar(55) NOT NULL,
  `nm_biru` varchar(55) NOT NULL,
  `kontingen_biru` varchar(55) NOT NULL,
  `status` varchar(55) NOT NULL DEFAULT '-',
  `pemenang` varchar(150) NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_tanding`
--

INSERT INTO `jadwal_tanding` (`id_partai`, `tgl`, `kelas`, `gelanggang`, `partai`, `nm_merah`, `kontingen_merah`, `nm_biru`, `kontingen_biru`, `status`, `pemenang`) VALUES
(1, '2018-07-08', 'A Pi DEWASA', 'A', '1', ' Maria', 'Kab Tangerang', 'Yuli', 'Kab Tangerang', '( 5-0 )', ' Maria (Kab Tangerang)'),
(2, '2018-07-08', 'A Pi DEWASA', 'A', '2', 'Sulis', 'Kab Tangerang', 'Puri', 'Kab Tangerang', '( 0-5 )', 'Puri (Kab Tangerang)'),
(3, '2018-07-08', 'A Pa DEWASA', 'A', '3', 'Khoir', 'Kab Tangerang', 'Munir', 'Kab Tangerang', '( 2-3 )', 'Munir (Kab Tangerang)');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_tgr`
--

CREATE TABLE `jadwal_tgr` (
  `id_partai` int(11) NOT NULL,
  `kategori` varchar(15) NOT NULL,
  `golongan` varchar(55) NOT NULL,
  `noundian` varchar(4) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `kontingen` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_tgr`
--

INSERT INTO `jadwal_tgr` (`id_partai`, `kategori`, `golongan`, `noundian`, `nama`, `kontingen`) VALUES
(1, 'Tunggal', 'Putra Pelajar', '1', 'Raden', 'Kab Tangerang'),
(2, 'Tunggal', 'Putra Pelajar', '2', 'Sehan', 'Kab Tangerang'),
(3, 'Tunggal', 'Putri Pelajar', '1', 'Amel', 'Kab Tangerang'),
(4, 'Tunggal', 'Putri Pelajar', '2', 'Putri', 'Kab Tangerang'),
(5, 'Ganda', 'Putra Pelajar', '1', 'Dimas<br>Adrian', 'Kab Tangerang'),
(6, 'Ganda', 'Putra Dewasa', '1', 'Rian<br>Ryan', 'Kab Tangerang'),
(7, 'Ganda', 'Putri Dewasa', '1', 'Meilani<br>Anis', 'Kab Tangerang'),
(8, 'Regu', 'Putri Pelajar', '1', 'Putri<br>Erika<br>Noname', 'Kab Tangerang');

-- --------------------------------------------------------

--
-- Table structure for table `kelastanding`
--

CREATE TABLE `kelastanding` (
  `ID_kelastanding` int(11) NOT NULL,
  `nm_kelastanding` varchar(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelastanding`
--

INSERT INTO `kelastanding` (`ID_kelastanding`, `nm_kelastanding`) VALUES
(1, 'KELAS A'),
(2, 'KELAS B'),
(3, 'KELAS C'),
(4, 'KELAS D'),
(5, 'KELAS E'),
(6, 'KELAS F'),
(7, 'KELAS G'),
(8, 'KELAS H'),
(9, 'KELAS I'),
(10, 'KELAS J');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `ID_konfirmasi` int(11) NOT NULL,
  `bank_tujuan` varchar(55) NOT NULL,
  `bank_pengirim` varchar(55) NOT NULL,
  `norek_pengirim` varchar(35) NOT NULL,
  `nm_pengirim` varchar(35) NOT NULL,
  `kontak` varchar(35) NOT NULL,
  `tgl_transfer` varchar(15) NOT NULL,
  `jumlah` varchar(35) NOT NULL,
  `bukti` varchar(128) NOT NULL,
  `catatan` text NOT NULL,
  `datetime` varchar(35) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'OPEN'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_ganda`
--

CREATE TABLE `nilai_ganda` (
  `id_nilai` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_juri` int(11) NOT NULL,
  `teknik_serang` int(11) NOT NULL,
  `mantap_kompak` int(11) NOT NULL,
  `serasi` int(11) NOT NULL,
  `hukum_1` int(11) NOT NULL,
  `hukum_2` int(11) NOT NULL,
  `hukum_3` int(11) NOT NULL,
  `hukum_4` int(11) NOT NULL,
  `hukum_5` int(11) NOT NULL,
  `hukum_6` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_ganda`
--

INSERT INTO `nilai_ganda` (`id_nilai`, `id_jadwal`, `id_juri`, `teknik_serang`, `mantap_kompak`, `serasi`, `hukum_1`, `hukum_2`, `hukum_3`, `hukum_4`, `hukum_5`, `hukum_6`) VALUES
(1, 5, 3, 67, 55, 55, 0, 0, 0, 0, 0, 0),
(2, 5, 5, 72, 56, 57, 0, 0, 0, 0, 0, 0),
(3, 5, 4, 65, 55, 55, 0, 0, 0, 0, 0, 0),
(4, 5, 1, 72, 58, 57, 0, 0, 0, 0, 0, 0),
(5, 5, 2, 72, 58, 56, 0, 0, 0, 0, 0, 0),
(6, 6, 4, 65, 54, 52, 0, 0, 0, -10, 0, 0),
(7, 6, 3, 70, 57, 56, 0, 0, 0, 0, 0, 0),
(8, 6, 1, 74, 58, 58, -10, 0, -10, 0, 0, 0),
(9, 6, 5, 73, 56, 57, 0, 0, -10, 0, 0, 0),
(10, 6, 2, 73, 58, 57, 0, 0, 0, 0, 0, 0),
(11, 7, 5, 68, 57, 57, -10, 0, 0, 0, 0, 0),
(12, 7, 4, 63, 53, 50, -10, 0, 0, 0, 0, 0),
(13, 7, 1, 74, 57, 57, -10, 0, 0, 0, 0, 0),
(14, 7, 3, 69, 57, 56, -10, 0, 0, 0, 0, 0),
(15, 7, 2, 75, 53, 56, -10, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_regu`
--

CREATE TABLE `nilai_regu` (
  `id_nilai` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_juri` int(11) NOT NULL,
  `jurus1` int(11) NOT NULL,
  `jurus2` int(11) NOT NULL,
  `jurus3` int(11) NOT NULL,
  `jurus4` int(11) NOT NULL,
  `jurus5` int(11) NOT NULL,
  `jurus6` int(11) NOT NULL,
  `jurus7` int(11) NOT NULL,
  `jurus8` int(11) NOT NULL,
  `jurus9` int(11) NOT NULL,
  `jurus10` int(11) NOT NULL,
  `jurus11` int(11) NOT NULL,
  `jurus12` int(11) NOT NULL,
  `kemantapan` int(11) NOT NULL,
  `hukum_1` int(11) NOT NULL,
  `hukum_2` int(11) NOT NULL,
  `hukum_3` int(11) NOT NULL,
  `hukum_4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_regu`
--

INSERT INTO `nilai_regu` (`id_nilai`, `id_jadwal`, `id_juri`, `jurus1`, `jurus2`, `jurus3`, `jurus4`, `jurus5`, `jurus6`, `jurus7`, `jurus8`, `jurus9`, `jurus10`, `jurus11`, `jurus12`, `kemantapan`, `hukum_1`, `hukum_2`, `hukum_3`, `hukum_4`) VALUES
(1, 8, 1, 0, -1, -1, -1, 0, -1, -1, -1, -1, -2, -1, -1, 57, 0, 0, 0, 0),
(2, 8, 5, 0, -3, -1, -1, -1, -1, -1, -1, 0, -2, -1, 0, 55, 0, 0, 0, 0),
(3, 8, 4, 0, -1, -2, -1, -1, 0, -1, -1, -1, -2, -1, -1, 55, 0, 0, 0, 0),
(4, 8, 2, 0, 0, 0, 0, 0, -1, -1, 0, 0, 0, -1, -1, 56, 0, 0, 0, 0),
(5, 8, 3, 0, 0, 0, -1, 0, -2, -1, -1, 0, 0, -1, -1, 58, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_tanding`
--

CREATE TABLE `nilai_tanding` (
  `id_nilai` int(11) NOT NULL,
  `id_jadwal` varchar(5) NOT NULL,
  `id_juri` varchar(1) NOT NULL,
  `button` varchar(55) NOT NULL,
  `nilai` int(11) NOT NULL,
  `sudut` varchar(55) NOT NULL,
  `babak` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_tanding`
--

INSERT INTO `nilai_tanding` (`id_nilai`, `id_jadwal`, `id_juri`, `button`, `nilai`, `sudut`, `babak`) VALUES
(1, '1', '2', '1', 1, 'BIRU', '1'),
(3, '1', '2', '2', 2, 'MERAH', '1'),
(4, '1', '5', '1+3', 4, 'MERAH', '1'),
(5, '1', '3', '1', 1, 'BIRU', '1'),
(6, '1', '1', '1+3', 4, 'MERAH', '1'),
(7, '1', '2', '1+3', 4, 'MERAH', '1'),
(8, '1', '3', '1+3', 4, 'MERAH', '1'),
(9, '1', '4', '1+3', 4, 'MERAH', '1'),
(10, '1', '4', '1', 1, 'BIRU', '1'),
(11, '1', '2', '1', 1, 'BIRU', '1'),
(12, '1', '1', '1', 1, 'BIRU', '1'),
(13, '1', '2', '2', 2, 'MERAH', '1'),
(14, '1', '3', '1', 1, 'MERAH', '1'),
(15, '1', '2', '1', 1, 'MERAH', '1'),
(16, '1', '1', '2', 2, 'MERAH', '1'),
(17, '1', '3', '2', 2, 'MERAH', '1'),
(18, '1', '5', '2', 2, 'MERAH', '1'),
(19, '1', '1', '1', 1, 'MERAH', '1'),
(21, '1', '5', '1', 1, 'MERAH', '1'),
(22, '1', '2', '1', 1, 'BIRU', '1'),
(23, '1', '3', '1', 1, 'BIRU', '1'),
(24, '1', '4', '2', 2, 'MERAH', '1'),
(25, '1', '4', '1', 1, 'MERAH', '1'),
(26, '1', '4', '1', 1, 'BIRU', '1'),
(27, '1', '3', '1', 1, 'MERAH', '1'),
(28, '1', '3', '1', 1, 'BIRU', '1'),
(29, '1', '4', '2', 2, 'BIRU', '1'),
(30, '1', '2', '2', 2, 'MERAH', '2'),
(31, '1', '2', '1', 1, 'MERAH', '2'),
(32, '1', '4', '2', 2, 'MERAH', '2'),
(33, '1', '5', '2', 2, 'MERAH', '2'),
(34, '1', '4', '1', 1, 'MERAH', '2'),
(35, '1', '2', '1', 1, 'BIRU', '2'),
(36, '1', '5', '1', 1, 'MERAH', '2'),
(37, '1', '3', '2', 2, 'MERAH', '2'),
(38, '1', '3', '1', 1, 'MERAH', '2'),
(40, '1', '1', '1', 1, 'MERAH', '2'),
(41, '1', '3', '1', 1, 'BIRU', '2'),
(42, '1', '1', '1', 1, 'MERAH', '2'),
(43, '1', '2', '1', 1, 'BIRU', '2'),
(44, '1', '4', '1', 1, 'BIRU', '2'),
(45, '1', '3', '2', 2, 'MERAH', '2'),
(46, '1', '3', '1', 1, 'MERAH', '2'),
(47, '1', '3', '1', 1, 'BIRU', '2'),
(48, '1', '3', '1', 1, 'BIRU', '2'),
(49, '1', '2', '2', 2, 'MERAH', '2'),
(50, '1', '3', '2', 2, 'MERAH', '2'),
(51, '1', '5', '2', 2, 'MERAH', '2'),
(52, '1', '4', '2', 2, 'MERAH', '2'),
(53, '1', '1', '2', 2, 'MERAH', '2'),
(54, '1', '4', '-1', -1, 'BIRU', '2'),
(55, '1', '5', '-1', -1, 'BIRU', '2'),
(56, '1', '3', '-1', -1, 'BIRU', '2'),
(57, '1', '3', '2', 2, 'BIRU', '2'),
(58, '1', '2', '2', 2, 'BIRU', '2'),
(59, '1', '4', '2', 2, 'BIRU', '2'),
(60, '1', '5', '2', 2, 'BIRU', '2'),
(61, '1', '4', '2', 2, 'BIRU', '2'),
(62, '1', '4', '1', 1, 'BIRU', '2'),
(63, '1', '2', '2', 2, 'MERAH', '2'),
(64, '1', '3', '1', 1, 'BIRU', '2'),
(65, '1', '3', '2', 2, 'BIRU', '2'),
(66, '1', '3', '2', 2, 'MERAH', '2'),
(67, '1', '1', '1', 1, 'BIRU', '2'),
(68, '1', '1', '2', 2, 'MERAH', '2'),
(69, '1', '4', '2', 2, 'MERAH', '2'),
(70, '1', '3', '2', 2, 'MERAH', '2'),
(71, '1', '3', '1', 1, 'MERAH', '2'),
(72, '1', '4', '1', 1, 'MERAH', '2'),
(73, '1', '2', '2', 2, 'MERAH', '2'),
(74, '1', '2', '1', 1, 'MERAH', '2'),
(75, '1', '1', '1', 1, 'MERAH', '2'),
(76, '1', '1', '-1', -1, 'BIRU', '2'),
(77, '2', '2', '2', 2, 'MERAH', '1'),
(78, '2', '2', '1', 1, 'MERAH', '1'),
(79, '2', '1', '2', 2, 'MERAH', '1'),
(80, '2', '3', '1', 1, 'MERAH', '1'),
(81, '2', '3', '2', 2, 'MERAH', '1'),
(82, '2', '3', '1', 1, 'BIRU', '1'),
(83, '2', '3', '2', 2, 'BIRU', '1'),
(84, '2', '3', '1', 1, 'MERAH', '1'),
(85, '2', '4', '1', 1, 'MERAH', '1'),
(86, '2', '3', '1', 1, 'BIRU', '1'),
(87, '2', '2', '1+3', 4, 'BIRU', '1'),
(88, '2', '3', '1+3', 4, 'BIRU', '1'),
(89, '2', '4', '1+3', 4, 'BIRU', '1'),
(90, '2', '5', '1+3', 4, 'BIRU', '1'),
(91, '2', '1', '1+3', 4, 'BIRU', '1'),
(92, '2', '2', '2', 2, 'BIRU', '1'),
(93, '2', '4', '2', 2, 'BIRU', '1'),
(94, '2', '5', '2', 2, 'BIRU', '1'),
(95, '2', '1', '2', 2, 'BIRU', '1'),
(96, '2', '3', '2', 2, 'BIRU', '1'),
(97, '2', '2', '2', 2, 'BIRU', '1'),
(98, '2', '4', '2', 2, 'BIRU', '1'),
(99, '2', '5', '2', 2, 'BIRU', '1'),
(100, '2', '3', '2', 2, 'BIRU', '1'),
(101, '2', '4', '1', 1, 'MERAH', '1'),
(102, '2', '1', '2', 2, 'BIRU', '1'),
(103, '2', '3', '1', 1, 'MERAH', '1'),
(104, '2', '3', '2', 2, 'MERAH', '1'),
(105, '2', '3', '1', 1, 'BIRU', '1'),
(106, '2', '4', '1', 1, 'MERAH', '1'),
(107, '2', '3', '1', 1, 'BIRU', '1'),
(108, '2', '4', '2', 2, 'BIRU', '1'),
(109, '2', '2', '1', 1, 'BIRU', '1'),
(110, '2', '3', '1', 1, 'MERAH', '1'),
(111, '2', '2', '2', 2, 'BIRU', '1'),
(112, '2', '1', '2', 2, 'BIRU', '1'),
(113, '2', '4', '2', 2, 'BIRU', '1'),
(114, '2', '3', '2', 2, 'BIRU', '1'),
(115, '2', '5', '2', 2, 'BIRU', '1'),
(116, '2', '4', '2', 2, 'MERAH', '1'),
(117, '2', '4', '2', 2, 'MERAH', '1'),
(118, '2', '5', '2', 2, 'MERAH', '1'),
(119, '2', '4', '1', 1, 'MERAH', '1'),
(120, '2', '3', '1', 1, 'BIRU', '1'),
(121, '2', '3', '1', 1, 'MERAH', '1'),
(122, '2', '3', '2', 2, 'BIRU', '1'),
(123, '2', '1', '1', 1, 'BIRU', '1'),
(124, '2', '1', '1', 1, 'MERAH', '1'),
(125, '2', '4', '1', 1, 'MERAH', '1'),
(126, '2', '3', '1', 1, 'MERAH', '1'),
(127, '2', '2', '2', 2, 'BIRU', '1'),
(128, '2', '3', '2', 2, 'BIRU', '1'),
(129, '2', '4', '2', 2, 'BIRU', '1'),
(130, '2', '4', '1', 1, 'BIRU', '1'),
(131, '2', '5', '2', 2, 'BIRU', '1'),
(132, '2', '5', '1', 1, 'BIRU', '1'),
(133, '2', '1', '2', 2, 'BIRU', '1'),
(134, '2', '5', '1', 1, 'BIRU', '1'),
(135, '2', '4', '2', 2, 'MERAH', '2'),
(136, '2', '4', '1', 1, 'MERAH', '2'),
(137, '2', '3', '1', 1, 'MERAH', '2'),
(138, '2', '2', '3', 3, 'BIRU', '2'),
(139, '2', '2', '1', 1, 'BIRU', '2'),
(140, '2', '3', '1', 1, 'BIRU', '2'),
(141, '2', '4', '1', 1, 'BIRU', '2'),
(142, '2', '5', '1', 1, 'BIRU', '2'),
(143, '2', '1', '1', 1, 'BIRU', '2'),
(144, '2', '3', '1', 1, 'BIRU', '2'),
(145, '2', '4', '1', 1, 'MERAH', '2'),
(146, '2', '2', '2', 2, 'BIRU', '2'),
(147, '2', '2', '1', 1, 'MERAH', '2'),
(148, '2', '3', '1', 1, 'BIRU', '2'),
(149, '2', '4', '1', 1, 'BIRU', '2'),
(150, '2', '3', '2', 2, 'BIRU', '2'),
(151, '2', '1', '2', 2, 'BIRU', '2'),
(152, '2', '5', '1', 1, 'BIRU', '2'),
(153, '2', '1', '1', 1, 'BIRU', '2'),
(154, '2', '3', '1', 1, 'MERAH', '2'),
(155, '2', '4', '2', 2, 'BIRU', '2'),
(156, '2', '2', '2', 2, 'BIRU', '2'),
(157, '2', '1', '1', 1, 'BIRU', '2'),
(158, '2', '4', '1', 1, 'MERAH', '2'),
(159, '2', '2', '1', 1, 'BIRU', '2'),
(160, '2', '2', '1', 1, 'MERAH', '2'),
(161, '2', '5', '1', 1, 'BIRU', '2'),
(162, '2', '3', '1', 1, 'MERAH', '2'),
(163, '2', '4', '2', 2, 'BIRU', '2'),
(164, '2', '2', '1', 1, 'BIRU', '2'),
(165, '2', '4', '1', 1, 'MERAH', '2'),
(166, '2', '5', '1', 1, 'MERAH', '2'),
(167, '2', '3', '1', 1, 'BIRU', '2'),
(168, '2', '4', '1', 1, 'BIRU', '2'),
(169, '2', '1', '2', 2, 'BIRU', '2'),
(170, '2', '3', '2', 2, 'BIRU', '2'),
(171, '2', '5', '1', 1, 'BIRU', '2'),
(172, '2', '2', '1', 1, 'BIRU', '2'),
(173, '2', '3', '1', 1, 'BIRU', '2'),
(174, '2', '3', '1', 1, 'BIRU', '2'),
(175, '2', '5', '1', 1, 'BIRU', '2'),
(176, '2', '4', '1', 1, 'BIRU', '2'),
(177, '2', '1', '1', 1, 'BIRU', '2'),
(178, '2', '3', '1', 1, 'MERAH', '2'),
(179, '2', '4', '2', 2, 'BIRU', '2'),
(180, '2', '3', '2', 2, 'MERAH', '2'),
(181, '2', '2', '1', 1, 'MERAH', '2'),
(182, '2', '2', '2', 2, 'BIRU', '2'),
(183, '2', '5', '1', 1, 'BIRU', '2'),
(184, '2', '4', '1', 1, 'MERAH', '2'),
(185, '2', '4', '1', 1, 'MERAH', '2'),
(186, '2', '4', '1', 1, 'BIRU', '2'),
(187, '2', '5', '1', 1, 'BIRU', '2'),
(188, '2', '3', '2', 2, 'BIRU', '2'),
(189, '2', '3', '1', 1, 'BIRU', '2'),
(190, '2', '5', '1', 1, 'MERAH', '2'),
(192, '3', '1', '1', 1, 'MERAH', '1'),
(193, '3', '3', '1', 1, 'MERAH', '1'),
(194, '3', '3', '1', 1, 'MERAH', '1'),
(195, '3', '2', '1', 1, 'MERAH', '1'),
(196, '3', '2', '2', 2, 'BIRU', '1'),
(197, '3', '3', '2', 2, 'BIRU', '1'),
(198, '3', '4', '1', 1, 'MERAH', '1'),
(199, '3', '4', '2', 2, 'BIRU', '1'),
(200, '3', '1', '2', 2, 'BIRU', '1'),
(201, '3', '5', '2', 2, 'BIRU', '1'),
(202, '3', '2', '1', 1, 'MERAH', '1'),
(203, '3', '3', '1', 1, 'MERAH', '1'),
(204, '3', '2', '2', 2, 'BIRU', '1'),
(205, '3', '4', '1', 1, 'BIRU', '1'),
(206, '3', '4', '1', 1, 'MERAH', '1'),
(207, '3', '4', '1', 1, 'MERAH', '1'),
(208, '3', '3', '1', 1, 'MERAH', '1'),
(209, '3', '1', '1', 1, 'MERAH', '1'),
(210, '3', '5', '1', 1, 'MERAH', '1'),
(211, '3', '2', '1', 1, 'MERAH', '1'),
(212, '3', '2', '2', 2, 'BIRU', '1'),
(213, '3', '4', '2', 2, 'BIRU', '1'),
(214, '3', '5', '2', 2, 'BIRU', '1'),
(215, '3', '5', '1+3', 4, 'MERAH', '1'),
(216, '3', '1', '1+3', 4, 'MERAH', '1'),
(217, '3', '4', '1+3', 4, 'MERAH', '1'),
(218, '3', '2', '1+3', 4, 'MERAH', '1'),
(219, '3', '2', '-2', -2, 'BIRU', '1'),
(220, '3', '2', '-2', -2, 'BIRU', '1'),
(221, '3', '2', '2', 2, 'BIRU', '1'),
(222, '3', '2', '1', 1, 'MERAH', '2'),
(223, '3', '2', '2', 2, 'BIRU', '2'),
(224, '3', '3', '1', 1, 'MERAH', '2'),
(225, '3', '4', '2', 2, 'BIRU', '2'),
(226, '3', '5', '2', 2, 'BIRU', '2'),
(227, '3', '1', '2', 2, 'BIRU', '2'),
(228, '3', '4', '1', 1, 'BIRU', '2'),
(229, '3', '3', '2', 2, 'BIRU', '2'),
(230, '3', '5', '1', 1, 'BIRU', '2'),
(231, '3', '2', '1', 1, 'BIRU', '2'),
(232, '3', '4', '1', 1, 'BIRU', '2'),
(233, '3', '3', '1', 1, 'BIRU', '2'),
(234, '3', '4', '1', 1, 'BIRU', '2'),
(235, '3', '5', '1', 1, 'BIRU', '2'),
(236, '3', '3', '1', 1, 'BIRU', '2'),
(237, '3', '1', '1', 1, 'BIRU', '2'),
(238, '3', '5', '-1', -1, 'MERAH', '2'),
(239, '3', '4', '-1', -1, 'MERAH', '2'),
(240, '3', '3', '-1', -1, 'MERAH', '2'),
(241, '3', '2', '-1', -1, 'MERAH', '2'),
(242, '3', '1', '-1', -1, 'MERAH', '2'),
(243, '3', '4', '1', 1, 'MERAH', '2'),
(244, '3', '3', '1', 1, 'MERAH', '2'),
(245, '3', '1', '1', 1, 'MERAH', '2'),
(246, '3', '2', '1', 1, 'MERAH', '2');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_tunggal`
--

CREATE TABLE `nilai_tunggal` (
  `id_nilai` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_juri` int(11) NOT NULL,
  `jurus1` int(11) NOT NULL,
  `jurus2` int(11) NOT NULL,
  `jurus3` int(11) NOT NULL,
  `jurus4` int(11) NOT NULL,
  `jurus5` int(11) NOT NULL,
  `jurus6` int(11) NOT NULL,
  `jurus7` int(11) NOT NULL,
  `jurus8` int(11) NOT NULL,
  `jurus9` int(11) NOT NULL,
  `jurus10` int(11) NOT NULL,
  `jurus11` int(11) NOT NULL,
  `jurus12` int(11) NOT NULL,
  `jurus13` int(11) NOT NULL,
  `jurus14` int(11) NOT NULL,
  `kemantapan` int(11) NOT NULL,
  `hukum_1` int(11) NOT NULL,
  `hukum_2` int(11) NOT NULL,
  `hukum_3` int(11) NOT NULL,
  `hukum_4` int(11) NOT NULL,
  `hukum_5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_tunggal`
--

INSERT INTO `nilai_tunggal` (`id_nilai`, `id_jadwal`, `id_juri`, `jurus1`, `jurus2`, `jurus3`, `jurus4`, `jurus5`, `jurus6`, `jurus7`, `jurus8`, `jurus9`, `jurus10`, `jurus11`, `jurus12`, `jurus13`, `jurus14`, `kemantapan`, `hukum_1`, `hukum_2`, `hukum_3`, `hukum_4`, `hukum_5`) VALUES
(1, 1, 2, 0, 0, -1, 0, 0, -1, 0, 0, -1, 0, 0, -1, 0, 0, 55, 0, 0, 0, 0, 0),
(2, 1, 4, 0, 0, 0, -1, -1, -1, -1, -1, -1, 0, -1, -1, 0, -1, 55, 0, 0, 0, 0, 0),
(3, 1, 5, 0, -1, 0, -2, -1, -1, -1, -1, -1, -2, -1, -1, -1, -2, 55, 0, 0, 0, 0, 0),
(4, 1, 1, 0, 0, 0, -1, 0, 0, -1, -1, 0, 0, 0, 0, -1, 0, 56, 0, 0, 0, 0, 0),
(5, 1, 3, 0, 0, -1, -1, -1, -1, -1, -1, -1, 0, -1, -1, 0, -1, 57, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `ID_peserta` int(11) NOT NULL,
  `nm_lengkap` varchar(35) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `tpt_lahir` varchar(55) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tb` int(11) NOT NULL,
  `bb` int(11) NOT NULL,
  `kelas` varchar(21) NOT NULL,
  `asal_sekolah` varchar(55) NOT NULL,
  `kategori_tanding` varchar(10) NOT NULL,
  `golongan` varchar(15) NOT NULL,
  `kode_gr` varchar(32) NOT NULL,
  `kelas_tanding_FK` varchar(4) NOT NULL,
  `kontingen` varchar(100) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `ktp` varchar(128) NOT NULL,
  `akta_lahir` varchar(128) NOT NULL,
  `ijazah` varchar(128) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `undian`
--

CREATE TABLE `undian` (
  `id_undian` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `no_undian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `undian_tgr`
--

CREATE TABLE `undian_tgr` (
  `id_undiantgr` int(11) NOT NULL,
  `idpesertatgr` varchar(32) NOT NULL,
  `no_undian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wasit_juri`
--

CREATE TABLE `wasit_juri` (
  `id_juri` int(11) NOT NULL,
  `nm_juri` varchar(55) NOT NULL,
  `pass_juri` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wasit_juri`
--

INSERT INTO `wasit_juri` (`id_juri`, `nm_juri`, `pass_juri`) VALUES
(1, 'JURI 1', '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, 'JURI 2', '5f4dcc3b5aa765d61d8327deb882cf99'),
(3, 'JURI 3', '5f4dcc3b5aa765d61d8327deb882cf99'),
(4, 'JURI 4', '5f4dcc3b5aa765d61d8327deb882cf99'),
(5, 'JURI 5', '5f4dcc3b5aa765d61d8327deb882cf99');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `jadwal_tanding`
--
ALTER TABLE `jadwal_tanding`
  ADD PRIMARY KEY (`id_partai`);

--
-- Indexes for table `jadwal_tgr`
--
ALTER TABLE `jadwal_tgr`
  ADD PRIMARY KEY (`id_partai`);

--
-- Indexes for table `kelastanding`
--
ALTER TABLE `kelastanding`
  ADD PRIMARY KEY (`ID_kelastanding`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`ID_konfirmasi`);

--
-- Indexes for table `nilai_ganda`
--
ALTER TABLE `nilai_ganda`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `nilai_regu`
--
ALTER TABLE `nilai_regu`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `nilai_tanding`
--
ALTER TABLE `nilai_tanding`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `nilai_tunggal`
--
ALTER TABLE `nilai_tunggal`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`ID_peserta`);

--
-- Indexes for table `undian`
--
ALTER TABLE `undian`
  ADD PRIMARY KEY (`id_undian`);

--
-- Indexes for table `undian_tgr`
--
ALTER TABLE `undian_tgr`
  ADD PRIMARY KEY (`id_undiantgr`);

--
-- Indexes for table `wasit_juri`
--
ALTER TABLE `wasit_juri`
  ADD PRIMARY KEY (`id_juri`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwal_tanding`
--
ALTER TABLE `jadwal_tanding`
  MODIFY `id_partai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwal_tgr`
--
ALTER TABLE `jadwal_tgr`
  MODIFY `id_partai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kelastanding`
--
ALTER TABLE `kelastanding`
  MODIFY `ID_kelastanding` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `ID_konfirmasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_ganda`
--
ALTER TABLE `nilai_ganda`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `nilai_regu`
--
ALTER TABLE `nilai_regu`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nilai_tanding`
--
ALTER TABLE `nilai_tanding`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `nilai_tunggal`
--
ALTER TABLE `nilai_tunggal`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `ID_peserta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `undian`
--
ALTER TABLE `undian`
  MODIFY `id_undian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `undian_tgr`
--
ALTER TABLE `undian_tgr`
  MODIFY `id_undiantgr` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wasit_juri`
--
ALTER TABLE `wasit_juri`
  MODIFY `id_juri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
