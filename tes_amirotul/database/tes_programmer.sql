-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 09:18 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tes_programmer`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'L QUEENLY'),
(2, 'L MTH AKSESORIS (IM)'),
(3, 'L MTH TABUNG (LK)'),
(4, 'CI MTH TINTA LAIN (IM)'),
(5, 'L MTH AKSESORIS (LK)'),
(6, 'S MTH STEMPEL (IM)'),
(7, 'SP MTH SPAREPART (LK)'),
(8, 'L MTH AKSESORIS (LK)');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `harga` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `kategori_id`, `status_id`) VALUES
(1, 'ALCOHOL GEL POLISH CLEANSER GP-CLN01', 12500, 1, 1),
(2, 'ALUMUNIUM FOIL ALL IN ONE BULAT 23mm IM', 1000, 2, 1),
(3, 'ALUMUNIUM FOIL ALL IN ONE BULAT 30mm IM', 1000, 2, 1),
(4, 'ALUMUNIUM FOIL ALL IN ONE SHEET 250mm IM', 12500, 2, 2),
(5, 'ALUMUNIUM FOIL HDPE/PE BULAT 23mm IM', 12500, 2, 1),
(6, 'ALUMUNIUM FOIL HDPE/PE BULAT 30mm IM', 1000, 2, 1),
(7, 'ALUMUNIUM FOIL HDPE/PE SHEET 250mm IM', 13000, 2, 2),
(8, 'ALUMUNIUM FOIL PET SHEET 250mm IM', 1000, 2, 2),
(9, 'ARM PENDEK MODEL U', 13000, 2, 1),
(10, 'ARM SUPPORT KECIL', 13000, 3, 2),
(11, 'ARM SUPPORT KOTAK PUTIH', 13000, 2, 2),
(12, 'ARM SUPPORT PENDEK POLOS', 13000, 3, 1),
(13, 'ARM SUPPORT S IM', 1000, 2, 2),
(14, 'ARM SUPPORT T (IMPORT)', 13000, 2, 1),
(15, 'ARM SUPPORT T - MODEL 1 ( LOKAL )', 10000, 3, 1),
(16, 'BLACK LASER TONER FP-T3 (100gr)', 13000, 2, 2),
(17, 'BODY PRINTER CANON IP2770', 500, 7, 1),
(18, 'BODY PRINTER T13X', 15000, 7, 1),
(19, 'BOTOL 1000ML BLUE KHUSUS UNTUK EPSON R1800/R800 - 4180 IM (T054920)', 10000, 4, 1),
(20, 'BOTOL 1000ML CYAN KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4120 IM (T054220)', 10000, 4, 2),
(21, 'BOTOL 1000ML GLOSS OPTIMIZER KHUSUS UNTUK EPSON R1800/R800/R1900/R2000/IX7000/MG6170 - 4100 IM (T054020)', 1500, 4, 1),
(22, 'BOTOL 1000ML L.LIGHT BLACK KHUSUS UNTUK EPSON 2400 - 0599 IM', 1500, 4, 2),
(23, 'BOTOL 1000ML LIGHT BLACK KHUSUS UNTUK EPSON 2400 - 0597 IM', 1500, 4, 2),
(24, 'BOTOL 1000ML MAGENTA KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4140 IM (T054320)', 1000, 4, 1),
(25, 'BOTOL 1000ML MATTE BLACK KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 3503 IM (T054820)', 1500, 4, 2),
(26, 'BOTOL 1000ML ORANGE KHUSUS UNTUK EPSON R1900/R2000 IM - 4190 (T087920)', 1500, 4, 1),
(27, 'BOTOL 1000ML RED KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4170 IM (T054720)', 1000, 4, 2),
(28, 'BOTOL 1000ML YELLOW KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4160 IM (T054420)', 1500, 4, 2),
(29, 'BOTOL KOTAK 100ML LK', 1000, 8, 1),
(30, 'BOTOL 10ML IM', 1000, 6, 2),
(34, 'ABCD', 200000, 5, 2),
(40, 'TES1', 10000, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `nama_status`) VALUES
(1, 'bisa dijual'),
(2, 'tidak bisa dijual');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
