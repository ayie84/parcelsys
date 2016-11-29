-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 28, 2016 at 04:14 PM
-- Server version: 5.5.52-cll
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `walimatu_pusatmel`
--

-- --------------------------------------------------------

--
-- Table structure for table `courier`
--

CREATE TABLE IF NOT EXISTS `courier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courier_name` text NOT NULL COMMENT 'Courier Name',
  `courier_address` varchar(255) NOT NULL COMMENT 'Courier Address',
  `courier_contact_no` varchar(50) NOT NULL COMMENT 'Courier Contact Number',
  `courier_fax_no` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `courier`
--

INSERT INTO `courier` (`id`, `courier_name`, `courier_address`, `courier_contact_no`, `courier_fax_no`) VALUES
(1, 'POS LAJU', 'ADDRESS', 'CONTACT NUMBER', ''),
(2, 'POS EKSPRESS', 'ADDRESS', 'CONTACT NUMBER', ''),
(3, 'SKY NET', 'ADDRESS', 'CONTACT NUMBER', ''),
(4, 'CITY-LINK', 'ADDRESS', 'CONTACT NUMBER', ''),
(5, 'NATION WIDE EXPRESS', 'ADDRESS', 'CONTACT NUMBER', ''),
(6, 'GDEX', 'ADDRESS', 'CONTACT NUMBER', ''),
(7, 'TA-Q-BIN', 'ADDRESS', 'CONTACT NUMBER', ''),
(8, 'SURE REACH', 'ADDRESS', 'CONTACT NUMBER', ''),
(9, 'FedEx', 'ADDRESS', 'CONTACT NUMBER', ''),
(10, 'DHL', 'ADDRESS', 'CONTACT NUMBER', ''),
(11, 'UPS', 'ADDRESS', 'CONTACT NUMBER', ''),
(12, 'TNT', 'ADDRESS', 'CONTACT NUMBER', ''),
(13, 'ARAMEX', 'ADDRESS', 'CONTACT NUMBER', ''),
(14, 'abx EXPRESS', 'ADDRESS', 'CONTACT NUMBER', ''),
(15, 'KANGAROO', 'ADDRESS', 'CONTACT NUMBER', ''),
(16, 'AIRPAK EXPRESS', 'ADDRESS', 'CONTACT NUMBER', ''),
(17, 'ASIAXPRESS', 'ADDRESS', 'CONTACT NUMBER', ''),
(18, 'DPEX', 'ADDRESS', 'CONTACT NUMBER', '994');

-- --------------------------------------------------------

--
-- Table structure for table `login_user`
--

CREATE TABLE IF NOT EXISTS `login_user` (
  `member_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `login` varchar(100) NOT NULL DEFAULT '',
  `passwd` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login_user`
--

INSERT INTO `login_user` (`member_id`, `firstname`, `lastname`, `login`, `passwd`) VALUES
(1, 'admin', 'admin', 'root', '7b24afc8bc80e548d66c4e7ff72171c5');

-- --------------------------------------------------------

--
-- Table structure for table `parcel`
--

CREATE TABLE IF NOT EXISTS `parcel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parcel_cnumber` varchar(50) NOT NULL COMMENT 'Parcel Tracking Number',
  `parcel_rcpt_name` varchar(80) NOT NULL COMMENT 'Receipent Name',
  `parcel_ptj` varchar(80) NOT NULL COMMENT 'Distributor',
  `parcel_takenby` varchar(255) NOT NULL,
  `parcel_courier` varchar(80) NOT NULL COMMENT 'Courier Name',
  `parcel_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `parcel_timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `parcel`
--

INSERT INTO `parcel` (`id`, `parcel_cnumber`, `parcel_rcpt_name`, `parcel_ptj`, `parcel_takenby`, `parcel_courier`, `parcel_update_timestamp`, `parcel_timestamp`) VALUES
(1, 'EN2965783MY', 'HERMA DINA BINTI SETIABUDI', 'PTMK', '', 'GDEX', '2016-11-12 07:29:45', '2016-11-12 07:10:16'),
(2, 'EN2965784MY', 'NORAZWINA BINTI ZAINOL', 'PIMPIN', '', 'DPEX', '2016-11-12 07:29:29', '2016-11-12 07:10:16'),
(3, 'EN2965785MY', 'AHMAD AZAFAR BIN KASSIM', 'AUE', '', 'CITY-LINK', '2016-11-12 07:29:17', '2016-11-12 07:10:16'),
(4, 'EN2965786MY', 'FATIMAHNOR BINTI HAJI BESAR', 'HR', '', 'KANGAROO', '2016-11-12 07:29:03', '2016-11-12 07:10:16'),
(5, 'EN2965787MY', 'MUSFAFIKRI BIN MUSA', 'BPA', '', 'DHL', '2016-11-12 07:28:51', '2016-11-12 07:10:16'),
(6, 'EN2965788MY', 'NOR HANUNI BINTI RAMLI @ SAID', 'JHEPA', '', 'GDEX', '2016-11-12 07:28:36', '2016-11-12 07:10:16'),
(7, 'EN2965789MY', 'NUR HIDAYAH BINTI MAT YASIN', 'PTMK', '', 'KANGAROO', '2016-11-12 07:28:23', '2016-11-12 07:10:16'),
(8, 'EN2965790MY', 'MAHADHIR BIN MUHAMMAD', 'PIMPIN', '', 'CITY-LINK', '2016-11-12 07:28:10', '2016-11-12 07:10:16'),
(9, 'EN2965791MY', 'AZIZAN BIN RAMLI', 'AUE', '', 'FedEx', '2016-11-12 07:27:56', '2016-11-12 07:10:16'),
(10, 'EN2965792MY', 'RUWAIDA BINTI ABDUL RASID', 'HR', '', 'POS EKSPRESS', '2016-11-12 07:27:42', '2016-11-12 07:10:16'),
(11, 'EN2965793MY', 'AZIZUL HELMI BIN SOFIAN', 'BPA', '', 'POS EKSPRESS', '2016-11-12 07:27:23', '2016-11-12 07:10:16'),
(12, 'EN2965794MY', 'MOHD NAFFIDI BIN ABD LATIF', 'JHEPA', '', 'AIRPAK EXPRESS', '2016-11-12 07:27:08', '2016-11-12 07:10:16'),
(13, 'EN2965795MY', 'SULIHAAKMA BINTI KAMARUDIN', 'PTMK', '', 'SKY NET', '2016-11-12 07:26:54', '2016-11-12 07:10:16'),
(14, 'EN2965796MY', 'NURUL AZRA BINTI BAKARUDDIN', 'PIMPIN', '', 'SURE REACH', '2016-11-12 07:26:38', '2016-11-12 07:10:16'),
(15, 'EN2965797MY', 'RUZINAH BINTI ISHA', 'AUE', '', 'ASIAXPRESS', '2016-11-12 07:26:24', '2016-11-12 07:10:16'),
(16, 'EN2965798MY', 'MOHD AIZUDIN BIN ABD AZIZ', 'HR', '', 'SKY NET', '2016-11-12 07:26:10', '2016-11-12 07:10:16'),
(17, 'EN2965799MY', 'HAIRUL HISHAM BIN ISMAIL', 'BPA', '', 'CITY-LINK', '2016-11-12 07:25:58', '2016-11-12 07:10:16'),
(18, 'EN2965800MY', 'VO NGUYEN DAI VIET', 'JHEPA', '', 'FedEx', '2016-11-12 07:25:42', '2016-11-12 07:10:16'),
(19, 'EN2965801MY', 'ANWARUDDIN HISYAM', 'PTMK', '', 'POS LAJU', '2016-11-12 07:25:28', '2016-11-12 07:10:16'),
(20, 'EN2965802MY', 'NORASHIKIN BINTI MAT ZAIN', 'PIMPIN', '', 'NATION WIDE EXPRESS', '2016-11-12 07:25:17', '2016-11-12 07:10:16'),
(21, 'EN2965803MY', 'JOLIUS BIN GIMBUN', 'AUE', '', 'DHL', '2016-11-12 07:25:07', '2016-11-12 07:10:16'),
(22, 'EN2965804MY', 'WAN FARID BIN WAN RUSLI', 'HR', '', 'KANGAROO', '2016-11-12 07:24:48', '2016-11-12 07:10:16'),
(23, 'EN2965805MY', 'SHAFIE BIN MOHAMMAD', 'BPA', '', 'GDEX', '2016-11-12 07:24:39', '2016-11-12 07:10:16'),
(24, 'EN2965806MY', 'ABDUL HALIM BIN ABDUL RAZIK', 'JHEPA', '', 'POS EKSPRESS', '2016-11-12 07:24:27', '2016-11-12 07:10:16'),
(25, 'EN2965807MY', 'MOHD NAJIB BIN MOHD NASOHA', 'PTMK', '', 'abx EXPRESS', '2016-11-12 07:23:36', '2016-11-12 07:10:16'),
(26, 'EN2965808MY', 'KHAIRATUN NAJWA BINTI MOHD AMIN', 'PIMPIN', '', 'TNT', '2016-11-12 07:23:25', '2016-11-12 07:10:16'),
(27, 'EN2965809MY', 'SURIYATI BINTI SALEH', 'AUE', '', 'CITY-LINK', '2016-11-12 07:23:16', '2016-11-12 07:10:16'),
(28, 'EN2965810MY', 'MOHD ARMAN BIN ABD KADIR', 'HR', '', 'UPS', '2016-11-12 07:23:05', '2016-11-12 07:10:16'),
(29, 'EN2965811MY', 'EMAN N. ALI', 'BPA', 'Ismail', 'POS EKSPRESS', '2016-11-13 18:15:16', '2016-11-14 07:10:16'),
(30, 'PR2962762MY', 'ISMAIL BIN ABU', 'FAKULTI PENGURUSAN INDUSTRI', '', 'CITY-LINK', '2016-11-12 21:51:02', '2016-11-12 21:51:02'),
(31, 'RF29012862MY', 'HANAFIAH BIN SAMAH', 'PUSAT PENGAJIAN BERTERUSAN & PEMBANGUNAN PROFESIONAL', '', 'NATION WIDE EXPRESS', '2016-11-13 05:53:29', '2016-11-13 05:53:29'),
(32, 'RF29012862MY', 'HANAFIAH BIN SAMAH', 'PUSAT PENGAJIAN BERTERUSAN & PEMBANGUNAN PROFESIONAL', '', 'NATION WIDE EXPRESS', '2016-11-13 05:54:25', '2016-11-13 05:54:25'),
(33, 'SP89445103MY', 'MIKE', 'JABATAN BENDAHARI', '', 'KANGAROO', '2016-11-13 05:54:50', '2016-11-13 05:54:50'),
(35, 'SP89445103MY', 'FASHA', 'PERPUSTAKAAN', '', 'KANGAROO', '2016-11-13 19:10:38', '2016-11-13 19:10:38'),
(36, 'SP89445103MY', 'WANI', 'PUSAT TEKNOLOGI MAKLUMAT & KOMUNIKASI', 'MUHAMMAD BIN ALI HANAFIAH', 'POS LAJU', '2016-11-15 06:20:39', '2016-11-15 06:20:18');

-- --------------------------------------------------------

--
-- Table structure for table `ptj`
--

CREATE TABLE IF NOT EXISTS `ptj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ptj_name` text NOT NULL COMMENT 'Dsitributor Name',
  `ptj_acro` varchar(20) NOT NULL,
  `ptj_code` varchar(50) NOT NULL COMMENT 'Distributor Code',
  `ptj_staff` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `ptj`
--

INSERT INTO `ptj` (`id`, `ptj_name`, `ptj_acro`, `ptj_code`, `ptj_staff`) VALUES
(1, 'AUDIT DALAM', 'AUDIT', 'AUD1000', NULL),
(2, 'JABATAN JARINGAN INDUSTRI & MASYARAKAT', 'BJIM', 'BJIM1000', NULL),
(3, 'BAHAGIAN KESELAMATAN', 'Keselamatan', 'BKS1000', NULL),
(4, 'PUSAT PENGAJIAN BERTERUSAN & PEMBANGUNAN PROFESIONAL', 'UAE/CENFED', 'CEN1000', NULL),
(5, 'INSTITUT PENGAJIAN SISWAZAH', 'IPS', 'CGS1000', NULL),
(6, 'PUSAT TEKNOLOGI MAKLUMAT & KOMUNIKASI', 'PTMK', 'COM1000', NULL),
(7, 'FAKULTI PENGURUSAN INDUSTRI', 'FIM', 'FIM1000', NULL),
(8, 'FAKULTI KEJURUTERAAN MEKANIKAL', 'FKM', 'FKM1000', NULL),
(9, 'FAKULTI KEJURUTERAAN PEMBUATAN', 'FKP', 'FKP1000', NULL),
(10, 'FAKULTI SISTEM KOMPUTER & KEJURUTERAAN PERISIAN', 'FSKKP', 'FSK1000', NULL),
(11, 'FAKULTI SAINS & TEKNOLOGI INDUSTRI', 'FSTI', 'FSTI1000', NULL),
(12, 'FAKULTI KEJURUTERAAN KIMIA & SUMBER ASLI', 'FKKSA', 'FTA1000', NULL),
(13, 'FAKULTI TEKNOLOGI KEJURUTERAAN', 'FTeK', 'FTEC1000', NULL),
(14, 'FAKULTI KEJURUTERAAN ELEKTRIK & ELEKTRONIK', 'FKEE', 'FTK1000', NULL),
(15, 'FAKULTI KEJURUTERAAN AWAM & SUMBER ALAM', 'FKASA', 'FTKA1000', NULL),
(16, 'JABATAN HAL EHWAL PELAJAR & ALUMNI', 'JHEPA', 'HEP1000', NULL),
(17, 'PEJABAT ANTARABANGSA', 'IO', 'IO1000', NULL),
(18, 'JABATAN BENDAHARI', 'Finance', 'KEW1000', NULL),
(19, 'PERPUSTAKAAN', 'Library', 'KMC1000', NULL),
(20, 'JABATAN PENDAFTAR', 'HR', 'PEN1000', NULL),
(21, 'PUSAT ISLAM & PEMBANGUNAN INSAN', 'PIMPIN', 'PIPI1000', NULL),
(22, 'PUSAT KESIHATAN PELAJAR', 'PKP', 'PKP1000', NULL),
(23, 'PUSAT KEUSAHAWANAN', 'P.Keusahawanan', 'PKUS1000', NULL),
(24, 'JABATAN PEMBANGUNAN & PENGURUSAN HARTA', 'JPPH', 'PPH1000', NULL),
(25, 'JABATAN HAL EHWAL KORPORAT & KUALITI', 'PPKPK', 'PPK1000', NULL),
(26, 'PUSAT BAHASA MODEN & SAINS KEMANUSIAAN', 'PBMSK', 'PPS1000', NULL),
(27, 'PENERBIT UMP', 'Penerbit', 'PRESS1000', NULL),
(28, 'PUSAT SUKAN DAN KEBUDAYAAN', 'PSU&B', 'PSU1000', NULL),
(29, 'PEJABAT NAIB CANSELOR', 'PNC', 'REK1000', NULL),
(30, 'JABATAN HAL EHWAL AKADEMIK & ANTARABANGSA', 'JHEAA', 'TRAP1000', NULL),
(31, 'JABATAN PENYELIDIKAN & INOVASI', 'P&I', 'TRPI1000', NULL),
(32, 'MAKMAL BERPUSAT UMP', 'CentralLab', 'UCL1000', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
