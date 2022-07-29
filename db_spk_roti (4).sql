-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2022 at 10:35 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk_roti`
--

-- --------------------------------------------------------

--
-- Table structure for table `himpunan`
--

CREATE TABLE `himpunan` (
  `Id_himpunan` int(11) NOT NULL,
  `Id_variabel` int(11) NOT NULL,
  `Nama_himpunan` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `himpunan`
--

INSERT INTO `himpunan` (`Id_himpunan`, `Id_variabel`, `Nama_himpunan`) VALUES
(1, 1, 'NAIK'),
(2, 1, 'TURUN'),
(3, 2, 'BANYAK'),
(4, 2, 'SEDIKIT'),
(5, 3, 'BERTAMBAH'),
(6, 3, 'BERKURANG'),
(7, 1, 'NAIK'),
(8, 1, 'TURUN'),
(9, 2, 'BANYAK'),
(10, 2, 'SEDIKIT');

-- --------------------------------------------------------

--
-- Table structure for table `perhitungan`
--

CREATE TABLE `perhitungan` (
  `Id_perhitungan` int(11) NOT NULL,
  `Id_roti` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `Permintaan_naik` double NOT NULL,
  `Permintaan_turun` double NOT NULL,
  `Persediaan_banyak` double NOT NULL,
  `Persediaan_sedikit` double NOT NULL,
  `Tenaga_kerja_banyak` double NOT NULL,
  `Tenaga_kerja_sedikit` double NOT NULL,
  `Produksi_terbanyak` double NOT NULL,
  `Produksi_sedikit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perhitungan`
--

INSERT INTO `perhitungan` (`Id_perhitungan`, `Id_roti`, `tanggal`, `Permintaan_naik`, `Permintaan_turun`, `Persediaan_banyak`, `Persediaan_sedikit`, `Tenaga_kerja_banyak`, `Tenaga_kerja_sedikit`, `Produksi_terbanyak`, `Produksi_sedikit`) VALUES
(15, 3, '2021-08-31', 360, 250, 100, 25, 11, 7, 400, 230),
(16, 8, '2021-08-31', 420, 300, 110, 20, 11, 7, 450, 270),
(17, 10, '2021-08-31', 600, 450, 120, 30, 11, 7, 600, 440),
(18, 11, '2021-08-31', 340, 250, 90, 5, 11, 7, 350, 220),
(19, 14, '2021-08-31', 470, 350, 110, 10, 11, 7, 500, 340),
(21, 3, '2021-09-30', 340, 150, 100, 10, 12, 8, 350, 200),
(22, 8, '2021-09-30', 380, 230, 110, 5, 12, 8, 400, 200),
(23, 10, '2021-09-30', 470, 280, 120, 20, 12, 8, 500, 300),
(24, 11, '2021-09-30', 330, 170, 90, 10, 12, 8, 350, 150),
(25, 14, '2021-09-30', 390, 200, 110, 0, 12, 8, 450, 250);

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `Id_produksi` int(11) NOT NULL,
  `Id_perhitungan` int(11) NOT NULL,
  `Tanggal_Produksi` date DEFAULT NULL,
  `Permintaan` double NOT NULL,
  `Persediaan` double NOT NULL,
  `Tenaga_kerja` double NOT NULL,
  `Total_produksi` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`Id_produksi`, `Id_perhitungan`, `Tanggal_Produksi`, `Permintaan`, `Persediaan`, `Tenaga_kerja`, `Total_produksi`) VALUES
(155, 21, '2021-10-02', 320, 70, 11, 287),
(156, 22, '2021-10-02', 350, 30, 11, 322),
(157, 23, '2021-10-02', 430, 60, 11, 412),
(158, 24, '2021-10-02', 270, 50, 11, 259),
(162, 21, '2021-10-03', 240, 40, 9, 263),
(163, 22, '2021-10-03', 270, 10, 9, 263),
(164, 23, '2021-10-03', 360, 50, 9, 394),
(165, 24, '2021-10-03', 200, 30, 9, 228),
(172, 21, '2021-10-04', 270, 20, 12, 277),
(173, 22, '2021-10-04', 350, 20, 12, 328),
(174, 23, '2021-10-04', 450, 80, 12, 403),
(175, 24, '2021-10-04', 300, 60, 12, 255),
(177, 25, '2021-10-04', 390, 20, 12, 390),
(178, 25, '2021-10-02', 340, 70, 11, 360),
(179, 25, '2021-10-03', 280, 50, 9, 340),
(180, 21, '2021-10-05', 220, 50, 12, 283),
(181, 22, '2021-10-05', 380, 20, 12, 351),
(183, 23, '2021-10-05', 400, 60, 12, 402),
(184, 24, '2021-10-05', 330, 60, 12, 256),
(185, 25, '2021-10-05', 400, 60, 12, 351),
(186, 21, '2021-10-06', 340, 80, 12, 298),
(187, 22, '2021-10-06', 350, 40, 12, 308),
(188, 23, '2021-10-06', 470, 80, 12, 404),
(189, 24, '2021-10-06', 300, 90, 12, 312),
(190, 25, '2021-10-06', 340, 10, 12, 355),
(191, 21, '2021-10-07', 250, 40, 12, 279),
(192, 22, '2021-10-07', 360, 90, 12, 330),
(193, 23, '2021-10-07', 400, 60, 12, 402),
(194, 24, '2021-10-07', 280, 40, 12, 254),
(195, 25, '2021-10-07', 370, 30, 12, 366),
(197, 21, '2021-10-09', 300, 70, 12, 280),
(198, 22, '2021-10-09', 300, 60, 12, 294),
(199, 23, '2021-10-09', 440, 60, 12, 403),
(200, 24, '2021-10-09', 280, 60, 12, 254),
(201, 25, '2021-10-09', 280, 60, 12, 327),
(202, 21, '2021-10-10', 230, 50, 8, 274),
(203, 22, '2021-10-10', 340, 60, 8, 313),
(204, 23, '2021-10-10', 330, 40, 8, 383),
(205, 24, '2021-10-10', 330, 40, 8, 275),
(206, 25, '2021-10-10', 260, 110, 8, 250),
(207, 21, '2021-10-11', 300, 50, 12, 276),
(208, 22, '2021-10-11', 350, 20, 12, 328),
(209, 23, '2021-10-11', 480, 20, 12, 500),
(210, 24, '2021-10-11', 250, 10, 12, 250),
(211, 25, '2021-10-11', 350, 50, 12, 351),
(212, 21, '2021-10-12', 340, 70, 12, 283),
(213, 22, '2021-10-12', 380, 40, 12, 311),
(214, 23, '2021-10-12', 410, 40, 12, 410),
(215, 24, '2021-10-12', 300, 60, 12, 255),
(216, 25, '2021-10-12', 370, 50, 12, 351),
(217, 21, '2021-10-13', 350, 30, 12, 298),
(218, 22, '2021-10-13', 360, 10, 12, 349),
(219, 23, '2021-10-13', 500, 40, 12, 436),
(220, 24, '2021-10-13', 250, 10, 12, 250),
(221, 25, '2021-10-13', 400, 30, 12, 371),
(222, 21, '2021-10-14', 320, 30, 12, 292),
(223, 22, '2021-10-14', 250, 50, 12, 296),
(224, 23, '2021-10-14', 410, 40, 12, 410),
(225, 24, '2021-10-14', 350, 60, 12, 256),
(226, 25, '2021-10-14', 370, 0, 12, 398),
(227, 21, '2021-10-16', 270, 10, 12, 277),
(228, 22, '2021-10-16', 350, 100, 12, 337),
(229, 23, '2021-10-16', 450, 40, 12, 430),
(230, 24, '2021-10-16', 300, 10, 12, 289),
(231, 25, '2021-10-16', 390, 30, 12, 371),
(233, 21, '2021-10-17', 300, 40, 8, 300),
(234, 22, '2021-10-17', 250, 80, 8, 285),
(235, 23, '2021-10-17', 300, 20, 8, 321),
(236, 24, '2021-10-17', 170, 60, 8, 244),
(237, 25, '2021-10-17', 250, 40, 8, 343),
(244, 21, '2021-10-18', 340, 10, 12, 350),
(245, 22, '2021-10-18', 350, 30, 12, 320),
(246, 23, '2021-10-18', 470, 20, 12, 500),
(247, 24, '2021-10-18', 300, 40, 12, 255),
(248, 25, '2021-10-18', 380, 40, 12, 356),
(249, 21, '2021-10-19', 250, 30, 11, 291),
(250, 22, '2021-10-19', 350, 30, 11, 322),
(251, 23, '2021-10-19', 450, 80, 11, 411),
(252, 24, '2021-10-19', 250, 40, 11, 259),
(253, 25, '2021-10-19', 380, 20, 11, 373),
(254, 21, '2021-10-20', 350, 70, 12, 283),
(255, 22, '2021-10-20', 380, 10, 12, 382),
(256, 23, '2021-10-20', 430, 40, 12, 424),
(257, 24, '2021-10-20', 300, 50, 12, 250),
(258, 25, '2021-10-20', 350, 10, 12, 363),
(259, 21, '2021-10-21', 300, 20, 12, 282),
(260, 22, '2021-10-21', 360, 30, 12, 322),
(261, 23, '2021-10-21', 350, 40, 12, 405),
(262, 24, '2021-10-21', 240, 50, 12, 244),
(263, 25, '2021-10-21', 330, 30, 12, 350),
(264, 21, '2021-10-23', 320, 20, 12, 302),
(265, 22, '2021-10-23', 330, 20, 12, 309),
(266, 23, '2021-10-23', 430, 90, 12, 411),
(267, 24, '2021-10-23', 250, 60, 12, 239),
(268, 25, '2021-10-23', 340, 50, 12, 350),
(269, 21, '2021-10-24', 290, 10, 9, 271),
(270, 22, '2021-10-24', 270, 40, 9, 286),
(271, 23, '2021-10-24', 360, 70, 9, 391),
(272, 24, '2021-10-24', 200, 50, 9, 240),
(273, 25, '2021-10-24', 280, 60, 9, 340),
(274, 21, '2021-10-25', 340, 20, 12, 320),
(275, 22, '2021-10-25', 380, 50, 12, 302),
(276, 23, '2021-10-25', 470, 90, 12, 416),
(277, 24, '2021-10-25', 320, 90, 12, 337),
(278, 25, '2021-10-25', 380, 80, 12, 368),
(279, 21, '2021-10-26', 280, 30, 12, 275),
(280, 22, '2021-10-26', 350, 70, 12, 304),
(281, 23, '2021-10-26', 400, 40, 12, 405),
(282, 24, '2021-10-26', 200, 70, 12, 197),
(283, 25, '2021-10-26', 370, 70, 12, 356),
(284, 21, '2021-10-27', 300, 50, 12, 276),
(285, 22, '2021-10-27', 250, 20, 12, 341),
(286, 23, '2021-10-27', 450, 50, 12, 413),
(287, 24, '2021-10-27', 300, 70, 12, 268),
(288, 25, '2021-10-27', 320, 50, 12, 350),
(289, 21, '2021-10-28', 300, 20, 12, 282),
(290, 22, '2021-10-28', 350, 110, 12, 360),
(291, 23, '2021-10-28', 450, 20, 12, 462),
(292, 24, '2021-10-28', 280, 40, 12, 254),
(293, 25, '2021-10-28', 350, 80, 12, 359),
(294, 21, '2021-10-30', 270, 20, 12, 279),
(295, 22, '2021-10-30', 350, 60, 12, 300),
(296, 23, '2021-10-30', 450, 30, 12, 452),
(297, 24, '2021-10-30', 300, 40, 12, 255),
(298, 25, '2021-10-30', 390, 80, 12, 371),
(299, 21, '2021-10-31', 300, 30, 9, 291),
(300, 22, '2021-10-31', 360, 10, 9, 323),
(301, 23, '2021-10-31', 350, 30, 9, 381),
(302, 24, '2021-10-31', 240, 40, 9, 243),
(304, 25, '2021-10-31', 300, 60, 9, 341),
(314, 21, '2022-01-20', 280, 52, 12, 275),
(315, 21, '2022-01-13', 250, 50, 9, 272);

-- --------------------------------------------------------

--
-- Table structure for table `produk_roti`
--

CREATE TABLE `produk_roti` (
  `Id_roti` int(11) NOT NULL,
  `Nama` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_roti`
--

INSERT INTO `produk_roti` (`Id_roti`, `Nama`) VALUES
(3, 'Roti isi vanila'),
(8, 'Roti donat manis'),
(10, 'Roti isi pisang'),
(11, 'Roti isi strawberry'),
(14, 'Roti isi coklat manis');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `Nama` varchar(80) NOT NULL,
  `Username` varchar(80) NOT NULL,
  `Password` varchar(80) NOT NULL,
  `Level` enum('Pemilik','Operator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Nama`, `Username`, `Password`, `Level`) VALUES
(0, 'Suratno', 'suratno', '21232f297a57a5a743894a0e4a801fc3', 'Pemilik'),
(35, 'Bambang N', 'bambang', '4b583376b2767b923c3e1da60d10de59', 'Operator');

-- --------------------------------------------------------

--
-- Table structure for table `variabel`
--

CREATE TABLE `variabel` (
  `Id_variabel` int(11) NOT NULL,
  `Nama_variabel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variabel`
--

INSERT INTO `variabel` (`Id_variabel`, `Nama_variabel`) VALUES
(1, 'PERMINTAAN'),
(2, 'PERSEDIAAN'),
(3, 'PRODUKSI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `himpunan`
--
ALTER TABLE `himpunan`
  ADD PRIMARY KEY (`Id_himpunan`);

--
-- Indexes for table `perhitungan`
--
ALTER TABLE `perhitungan`
  ADD PRIMARY KEY (`Id_perhitungan`),
  ADD KEY `Id_roti` (`Id_roti`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`Id_produksi`),
  ADD KEY `Id_perhitungan` (`Id_perhitungan`);

--
-- Indexes for table `produk_roti`
--
ALTER TABLE `produk_roti`
  ADD PRIMARY KEY (`Id_roti`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `variabel`
--
ALTER TABLE `variabel`
  ADD PRIMARY KEY (`Id_variabel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `himpunan`
--
ALTER TABLE `himpunan`
  MODIFY `Id_himpunan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `perhitungan`
--
ALTER TABLE `perhitungan`
  MODIFY `Id_perhitungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `produksi`
--
ALTER TABLE `produksi`
  MODIFY `Id_produksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;

--
-- AUTO_INCREMENT for table `produk_roti`
--
ALTER TABLE `produk_roti`
  MODIFY `Id_roti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `variabel`
--
ALTER TABLE `variabel`
  MODIFY `Id_variabel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `perhitungan`
--
ALTER TABLE `perhitungan`
  ADD CONSTRAINT `Id_roti` FOREIGN KEY (`Id_roti`) REFERENCES `produk_roti` (`Id_roti`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `produksi`
--
ALTER TABLE `produksi`
  ADD CONSTRAINT `perhitungan` FOREIGN KEY (`Id_perhitungan`) REFERENCES `perhitungan` (`Id_perhitungan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
