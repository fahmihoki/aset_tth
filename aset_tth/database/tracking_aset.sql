-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2023 at 07:15 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tracking_aset`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat_ukur`
--

CREATE TABLE `alat_ukur` (
  `id_alat_ukur` int(11) NOT NULL,
  `no_aset` varchar(255) NOT NULL,
  `nama_alat_ukur` varchar(255) NOT NULL,
  `merek` varchar(255) NOT NULL,
  `tipe_model` varchar(255) NOT NULL,
  `no_seri` varchar(255) NOT NULL,
  `buku_manual` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alat_ukur`
--

INSERT INTO `alat_ukur` (`id_alat_ukur`, `no_aset`, `nama_alat_ukur`, `merek`, `tipe_model`, `no_seri`, `buku_manual`) VALUES
(1, '031/TRA', 'True RMS Multimeter', 'Fluke', '87', '65940593', 'ADA'),
(2, '032/TRA', 'True RMS Multimeter', 'Fluke', '87', '77150791', 'ADA'),
(4, '049/TRA', 'Thermohygrograph', 'Hisamatsu', 'TN 2500', '4558', 'ADA'),
(5, '067/TRA', '30 Db Attenuator', 'HP', '30dB', '2702A06832', 'TIDAK ADA'),
(6, '068/TRA', 'Step Attenuator 11 dB', 'HP', '8494B', '2812A19946', 'TIDAK ADA'),
(7, '069/TRA', 'Step Attenuator 70 dB', 'HP', '8495B', '3308A17465', 'TIDAK ADA'),
(8, '083/TRA', 'Fix Attenuator', 'HP', '11708A (30 dB)', '23007 06165', 'TIDAK ADA'),
(9, '084/TRA', 'Fix Attenuator', 'HP', '10 Db', '21660.32634', 'TIDAK ADA'),
(10, '085/TRA', 'Fix Attenuator', 'HP', '8491 B (6 Db)', '2708 A 20132', 'TIDAK ADA'),
(11, '086/TRA', 'Fix Attenuator', 'HP', '8491 B (3 DB)', '18507', 'TIDAK ADA'),
(12, '095/TRA', 'Optical Attenuator', 'HP', '8156A', '3328G03174', 'TIDAK ADA'),
(13, '096/TRA', 'Lightwave Multi Meter', 'HP', '81531A', '2946G07883', 'ADA'),
(14, '099/TRA', 'Temperature Chamber', 'ETAC', 'HS240', '129706037', 'ADA'),
(15, '105/TRA', 'Optical Spectrum Analyzer', 'Anritsu', 'MS9710B', '6100043092', 'ADA'),
(16, '109/TRA', 'DWDM Laser Source', 'Net Test', 'ECL-1600, ECL-1560', '10-9881, 10-9611', 'ADA'),
(17, '111/TRA', 'Performance Analysis System', 'Spirent', 'SmartBits 600B', 'N06011082', 'ADA'),
(18, '112/TRA', 'Spectrum Analyzer', 'Advantest', 'R3182', '150301800', 'ADA'),
(19, '113/TRA', 'RF Step Attenuator', 'Weinschel', '9012-70', '20943', 'TIDAK ADA'),
(20, '115/TRA', 'Universal Test System', 'EXFO', 'FTB 400', '359969', 'ADA'),
(21, '117/TRA', 'Modular Optical Test Platform', 'JDSU', 'MTS 8000', '2163', 'ADA'),
(22, '118/TRA', 'Advanced Network Tester', 'JDSU', 'ANT-20 SE', 'GD-0001', 'ADA'),
(23, '119/TRA', 'Advanced Network Tester', 'JDSU', 'ANT-10Gig', 'GD-0003', 'ADA'),
(24, '120/TRA', 'Traffic Generator / Performance Analyser', 'Ixia', 'IXIA 400T', '400T-0473100', '-'),
(25, '122/TRA', 'Microwave Synthesizer', 'Gigatronic', '2440 B, 01-40 GHz ', '0825001,  1838049', 'ADA'),
(26, '124/TRA', 'Optical DWDM Analyzer', 'JDSU', 'OSA-320', 'O-0027', ''),
(27, '125/TRA', 'Optical Return Loss Meter', 'JDSU', 'ORL-55', 'F-0117', ''),
(28, '126/TRA', 'Optical MM Attenuator', 'JDSU', 'OLA-54', 'N-0204', ''),
(29, '127/TRA', 'Optical SM Attenuator', 'JDSU', 'OLA-55', 'N-0266', ''),
(30, '130/TRA', 'RF Step Attenuator (11 Db)', 'Agilent', '8494 B', 'MY 42149290', ''),
(31, '131/TRA', '40G, OTN & Fiber Channel Analyzer', 'JDSU', 'MTS-8000, 40G TRANSPORT MODULE', 'B-0068', ''),
(32, '132/TRA', 'Vector Signal Generator', 'LitePoint', 'ZT8651PXIe, ZT8751PXIe', '23914, 23998', ''),
(33, '133/TRA', 'Network Master Flex', 'Anritsu', 'MT1100A, MU110001A, MU110011A', '6201476992, 621478509, 6201464889', ''),
(34, '134/TRA', 'Signal & Spectrum Analyzer', 'Rohde & Schwartz', 'FSW43', '103952', ''),
(35, '135/TRA', 'Spectrum Analyser', 'Rigol', 'DSA832E-TG', 'DSA8H194800240', ''),
(36, '137/TRA', 'Temperature Alarm', 'Krisbow', 'KW06-797', '-', ''),
(37, '139/TRA', 'Spectrum Analyzer (9 kHz - 6,5 GHz)', 'Rigol', 'RSA 5065-T6', '28nf50-2', ''),
(38, '140/TRA', 'Analog Signal Generator (250 kHz - 6 GHz)', 'Agilent', 'N5181A', 'MY50140391', ''),
(39, '142/TRA', 'Line Impedance Stabilization Network (LISN)', 'Com-Power Corp', 'LI-220A', '192047', ''),
(40, '143/TRA', 'Artificial Mains Network', 'Tekbox', 'TLBC 08', 'TLBC08-15556', ''),
(41, '144/TRA', 'Conducted Immunity Test System ', 'Frankonia', 'CIT-10', '19901997-0101', ''),
(42, '145/TRA', 'Field Strength Meter', 'Frankonia', 'EFS-10', 'PFC180280803', ''),
(43, '147/TRA', 'Vector Network Analyzer (VNA) DC 6 GHz', 'Anritsu', 'MS2036C', '1911038', ''),
(44, '153/TRA', 'Coupling/Decoupling Network 4 Balanced Pairs - Unscreened (150kHz to 230 MHz) Plus 2 Adaptor For Telecom Series', 'Com-Power Corp', 'CDN T8E, CDN ADA-T4/T8E ', '34250018', ''),
(45, '154/TRA', 'Transmision & Synchronization', 'ALBEDO', 'xGenius', 'LEX0211P', ''),
(46, '158/TRA', 'IP Performance Tester (Besar)', 'Ixia', 'OPTIXIA XM12', 'XM12-0702206', ''),
(47, '159/TRA', 'IP Performance Tester (Kecil)', 'Ixia', 'OPTIXIA XM2', 'XM2-0301041', ''),
(48, '161/TRA', 'Bluetooth Tester', 'Anritsu', 'MT 8852-B', '6262007597', ''),
(49, '162/TRA', 'Radio Communication Analyzer', 'Anritsu', 'MT 8820-C', '6261760911', ''),
(50, '163/TRA', 'Wireless Connectivity Test Set', 'Anritsu', 'MT 8862-A', '6262021089', ''),
(51, '165/TRA', 'Traffic Generator & Analyzer', 'Spirent', 'CHS-N4U-220', 'E19310269', ''),
(52, '166/TRA', 'Traffic Generator & Analyzer', 'Spirent', 'CHS-3U', 'E11511216', ''),
(53, '167/TRA', 'Temperature And Humidity Data Logger', 'Elitech', 'GSP-6', 'EFG19CE02445', ''),
(54, '168/TRA', 'Wireless Temperature And Humidity Data Logger', 'Elitech', 'RCW-800 WiFi', '-', ''),
(55, '169/TRA', 'DekTec Digital Video', 'DekTec', '2115B R5', '2115011386', ''),
(56, '170/TRA', 'Dvb-S2/T-2/C Combo', 'Satlink', 'WS-6980', '698020080383', ''),
(57, '171/TRA', 'Scan & Generate Data Logger', 'Enmos', 'ENMOS V2.0', 'ENM005', ''),
(58, '172/TRA', 'Scan & Generate Data Logger', 'Enmos', 'ENMOS V2.0', 'ENM004', ''),
(59, '173/TRA', 'Scan & Generate Data Logger', 'Enmos', 'ENMOS V2.0', 'ENM006', ''),
(60, '174/TRA', 'Optical Power Expert', 'EXFO', 'PX1', '1410709', ''),
(61, '175/TRA', 'Switch Programmable Power', 'APM Technology', 'SP80VDC3000W', '1535120000000000000', ''),
(62, '176/TRA', '5G Radio Communication Test Station', 'Anritsu', 'MT8000A', '6272354133', ''),
(63, '177/TRA', '4G & NB-IoT Tester', 'Anritsu', 'MT8821C', '6261953013', ''),
(64, '178/TRA', 'Line Impedance Stabilization Network (LISN)', 'Com-Power Corp', 'LI-350', '20100060-20100061', ''),
(65, '179/TRA', 'Fixed Attenuator 500 W Up To 3 GHz', 'Pasternack', 'PE7AP418-30', '-', ''),
(66, '180/TRA', 'Transmision & Synchronization', 'ALBEDO', 'xGenius', 'LEX0648P', ''),
(67, '181/TRA', 'Network Master Pro', 'Anritsu', 'MT1040A', '6272388196', ''),
(68, '182/TRA', 'LISN DC 5uH +/-', 'Tekbox', 'TBOH01', 'TBOH0116533', ''),
(69, '183/TRA', 'LISN DC 5uH +/-', 'Tekbox', 'TBOH01', 'TBOH0116534', ''),
(70, '186/TRA', 'LISN Mate', 'Tekbox', 'TBLM01', 'TBLM118619', ''),
(71, '187/TRA', 'Optical Power Meter And Variable Attenuator', 'EXFO', 'LTB-1', '1501047', ''),
(72, '188/TRA', 'Sound Level Meter', 'Krisbow', '10176566', '180808063', ''),
(73, '189/TRA ', 'Scan & Generate Data Logger  ', 'Enmos  ', 'ENMOS V2.0  ', 'ENM007  ', '');

-- --------------------------------------------------------

--
-- Table structure for table `data_input`
--

CREATE TABLE `data_input` (
  `id_input` int(11) NOT NULL,
  `no_aset_dt` varchar(255) NOT NULL,
  `nama_alat_ukur_dt` varchar(255) NOT NULL,
  `merek_dt` varchar(255) NOT NULL,
  `tipe_model_dt` varchar(255) NOT NULL,
  `no_seri_dt` varchar(255) NOT NULL,
  `nama_users` varchar(255) NOT NULL,
  `lokasi_aset` varchar(255) NOT NULL,
  `tanggal_pinjam` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username_admin` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username_admin`, `password`, `level`) VALUES
(28, 'admintransmisi', '$2y$10$1fD5OCUfbv3lTrPiE2l2QORz.jwARNY4mnIKOITivgiNldSIHggiW', 'admin'),
(30, 'roleengineer', '$2y$10$QW6tfzj/xLsPlkYVLYYpSuj2oPeYqYW97Jty8ViLmV5OIl2j6fqwe', 'engineer'),
(31, 'adminmet', '$2y$10$XUtsktEk9sTteyDEUqjkZuqt0s8bKJUHoValvYDja1B3TUJhZG.Qy', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat_ukur`
--
ALTER TABLE `alat_ukur`
  ADD PRIMARY KEY (`id_alat_ukur`);

--
-- Indexes for table `data_input`
--
ALTER TABLE `data_input`
  ADD PRIMARY KEY (`id_input`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alat_ukur`
--
ALTER TABLE `alat_ukur`
  MODIFY `id_alat_ukur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `data_input`
--
ALTER TABLE `data_input`
  MODIFY `id_input` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
