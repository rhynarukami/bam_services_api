-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 04, 2024 at 08:24 AM
-- Server version: 10.6.19-MariaDB-cll-lve
-- PHP Version: 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bamservices`
--

-- --------------------------------------------------------

CREATE DATABASE IF NOT EXISTS `bamservices` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bamservices`;

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` bigint(20) NOT NULL,
  `noserv` varchar(20) NOT NULL,
  `jebar` varchar(255) DEFAULT NULL,
  `acc` varchar(255) DEFAULT NULL,
  `atn` varchar(255) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `kel` varchar(255) DEFAULT NULL,
  `wkt_dtg` datetime DEFAULT NULL,
  `wkt_updt` datetime DEFAULT NULL,
  `wkt_ambl` datetime DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `stat` tinyint(1) DEFAULT NULL,
  `op_tek` varchar(20) DEFAULT NULL,
  `rep_tek` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `noserv`, `jebar`, `acc`, `atn`, `telp`, `kel`, `wkt_dtg`, `wkt_updt`, `wkt_ambl`, `ket`, `stat`, `op_tek`, `rep_tek`) VALUES
(1, 'SB - 1', 'Laptop Acer', '-', 'Yessy', '081255332512', 'Cek', '2023-06-06 19:36:06', '2023-06-06 20:36:06', '2023-06-06 20:36:06', 'Mobo Error', 0, 'AGUS', 'AGUS'),
(2, 'SB - 2', 'Laptop Asus ROG', '-', 'Gusti', '087812482827', 'Mati Total', '2023-06-07 19:36:06', '2023-06-06 20:36:06', '0000-00-00 00:00:00', 'Mobo Error', 8, 'HADI', 'AGUS'),
(3, 'SB - 3', 'Printer Canon MP287', 'Kabel Data', 'BLP', '082149248249', 'Cek', '2023-06-07 19:40:28', '2023-06-06 20:36:06', '0000-00-00 00:00:00', 'Ganti Catrid Hitam', 2, 'DAYAT', 'HADI'),
(4, 'SB - 4', 'Notebook Asus', 'Charger, Tas', 'Lala', '08154274827', 'Keyboard lengket', '2023-06-07 19:41:09', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Ganti Keyboard', 3, 'DAYAT', 'AGUS'),
(5, 'SB - 5', 'Printer Epson L3110', '-', 'SDCI', '0542', 'Cek', '2023-06-07 19:42:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Ganti Head', 2, 'HADI', 'HADI'),
(6, 'SB - 6', 'Laptop Acer Nitro 5', 'Tas, Charger', 'Reksy', '0899424857261', 'Baikin engsel', '2023-06-08 19:43:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Dibatalkan', 9, 'RIZAL', 'RIZAL'),
(7, 'SB - 7', 'Laptop Lenovo Legion 5', '-', 'Erlangga', '0852428148271', 'Cek keyboard, install ulang', '2023-06-08 19:43:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Ganti Keyboard, Siap Install Ulang', 2, 'IVAN', 'AGUS'),
(8, 'SB - 8', 'Notebook Asus', 'Charger', 'Tia', '0898412472348', 'Cek Lambat', '2023-06-08 19:45:45', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 'HADI', ''),
(9, 'SB - 9', 'UPS Prolink', '-', 'Bank BTN', '0542', 'Cek', '2023-06-08 19:46:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 'HADI', ''),
(10, 'SB - 10', 'PC AIO HP', 'Adaptor, HDD Ext 1TB', 'Grand Medica', '081242849420', 'Cek lambat. backup ke external dan install ulang format', '2023-06-08 19:48:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 'DAYAT', ''),
(11, 'SB - 11', 'Laptop HP', '-', 'Ridho', '081237312411', 'Blue screen terus', '2023-06-08 21:57:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 'DAYAT', ''),
(12, 'SB - 12', 'PC Simbadda', '-', 'RSDD', '0542', 'Cek', '2023-06-08 22:00:00', '2023-06-09 11:28:31', '0000-00-00 00:00:00', 'Ganti SSD', 3, 'RIZAL', 'IVAN'),
(13, 'SB - 13', 'PC Brizz', '-', 'Wahana Safety', '081234423287', 'Cek Mati total', '2023-06-09 01:11:23', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 'RIZAL', ''),
(14, 'SB - 14', 'Monitor LG', 'Adaptor', 'Masjid BDI', '0542', 'Cek', '2023-06-09 11:29:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 'IVAN', ''),
(15, 'SB - 15', 'LED Samsung', '-', 'Fauzan', '081123133929', 'Cek', '2023-06-09 08:10:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 'DAYAT', ''),
(18, 'SB - 16', 'UPS Prolink', '-', 'Indra', '087812217382', 'Cek', '2023-06-12 03:36:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 'RIZAL', ''),
(19, 'SB - 17', 'Laptop Acer', 'Charger, HDD Ext 1TB', 'Tari', '087819492723', 'Backup Data ke HDD Ext dari Laptop', '2023-06-12 03:41:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 'RIZAL', ''),
(20, 'SB - 18', 'PC Brizz', '-', 'Toko Fulan', '08781384824', 'Cek', '2023-06-12 03:43:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 'HADI', ''),
(22, 'SB - 19', 'Laptop Asus ROG', 'Charger, Tas ROG', 'Juna', '087823283726', 'Install Ulang Format. Buat 3 partisi', '2023-06-12 03:55:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 'HADI', ''),
(23, 'SB - 20', 'Printer Epson LX - 310', '-', 'Yani', '087832474834', 'Hasil warna bergaris', '2023-06-12 04:00:06', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 'RIZAL', ''),
(24, 'SB - 21', 'Laptop Lenovo', 'Charger, Tas totebag kuning', 'IKU (Mb. Jemi)', '0542', 'Cek. gak bisa buka beberapa website', '2023-06-16 08:58:09', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 'RIZAL', ''),
(25, 'SB - 22', 'PC Simbadda', '-', 'Jalil', '08781391382', 'Cek mati total', '2023-06-16 09:03:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 'RIZAL', ''),
(26, 'SB - 23', 'Laptop Asus', 'charger, tas', 'Pak Agus', '0811531508', 'install windows', '2023-06-17 12:48:47', '2023-06-17 12:49:53', '0000-00-00 00:00:00', 'Install win 10', 3, 'AGUS', 'AGUS'),
(27, 'SB - 24', 'PC AIO Asus', 'Kotak,  Keyboard, Mouse, Adaptor', 'Trend Variasi', '0542', 'Cek Lambat', '2023-06-19 08:53:24', '2023-06-19 11:09:48', '0000-00-00 00:00:00', 'ganti ssd 256gb, ganti ram 8gb ddr4, hdd lama dipasang casing ext hdd ', 3, 'RIZAL', 'AGUS');

-- --------------------------------------------------------

--
-- Table structure for table `panggilan`
--

CREATE TABLE `panggilan` (
  `id_pgl` bigint(20) NOT NULL,
  `lok` varchar(255) DEFAULT NULL,
  `kel` varchar(255) DEFAULT NULL,
  `ket` varchar(255) NOT NULL,
  `wkt_pgl` datetime NOT NULL,
  `wkt_updt` datetime NOT NULL,
  `wkt_done` datetime NOT NULL,
  `stat` tinyint(1) NOT NULL DEFAULT 0,
  `id_tek` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `panggilan`
--

INSERT INTO `panggilan` (`id_pgl`, `lok`, `kel`, `ket`, `wkt_pgl`, `wkt_updt`, `wkt_done`, `stat`, `id_tek`) VALUES
(1, 'Grand Medica', 'CCTV', 'Selesai', '2023-06-09 12:07:30', '2023-06-12 01:32:47', '2023-06-12 01:32:47', 0, 'IVAN'),
(2, 'Saras Farma', 'Ambil PC', '', '2023-06-09 12:34:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'HADI'),
(3, 'BLP', 'Cek PC', '', '2023-06-09 12:47:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'IVAN'),
(4, 'Karindo', 'Cek Jaringan', 'etuio', '2023-06-09 12:48:23', '2023-06-12 02:47:29', '0000-00-00 00:00:00', 2, 'AGUS'),
(5, 'Etika Swalayan', 'Cek Printer', 'dfgb', '2023-06-09 12:49:12', '2023-06-12 02:47:14', '2023-06-12 02:47:14', 9, 'HADI'),
(6, 'Wahana Safety BSB', 'Setting Komputer', '', '2023-06-09 12:49:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'RIZAL'),
(7, 'Baruna', 'Cek Printer', '', '2023-06-09 12:49:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'HADI'),
(8, 'Toko Harum', 'Ambil UPS', '', '2023-06-09 12:50:23', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'HADI'),
(9, 'Bank BTN', 'Ambil UPS', '', '2023-06-09 12:50:42', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'HADI'),
(10, 'Univ Mulia', 'Cek Jaringan', 'Lagi dikerjain', '2023-06-09 11:48:16', '2023-06-09 11:48:36', '0000-00-00 00:00:00', 2, 'RIZAL'),
(11, 'Toko Baut', 'Cek Jaringan Komputer', '', '2023-06-12 03:55:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'AGUS'),
(12, 'PT Maju Mundur', 'Ambil Laptop', '', '2023-06-12 03:58:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'DAYAT'),
(13, 'RSDD', 'Ambil PC', '', '2023-06-16 08:59:13', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'DAYAT'),
(14, 'BRP', 'Cek Jaringan', '', '2023-06-16 09:03:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'AGUS'),
(15, 'Autorent', 'PC Konslet. temui mbak dara', 'PC Dibawa ke bam', '2023-06-19 08:26:54', '2023-06-19 11:08:48', '2023-06-19 11:08:48', 0, 'IVAN'),
(16, 'Trend Variasi', 'Ambil AIO PC Sama Hadi', 'Ngambil sama dayat. AIO PC Asus 1 set sama keyboard, mouse, adaptor.', '2023-06-19 08:27:48', '2023-06-19 08:52:43', '2023-06-19 08:52:43', 0, 'RIZAL');

-- --------------------------------------------------------

--
-- Table structure for table `teknisi`
--

CREATE TABLE `teknisi` (
  `id_tek` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teknisi`
--

INSERT INTO `teknisi` (`id_tek`, `name`, `username`, `password`) VALUES
('AGUS', 'Agus', NULL, NULL),
('DAYAT', 'Dayat', NULL, NULL),
('HADI', 'Hadi', NULL, NULL),
('IVAN', 'Ivan', NULL, NULL),
('RIZAL', 'Rizal', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panggilan`
--
ALTER TABLE `panggilan`
  ADD PRIMARY KEY (`id_pgl`);

--
-- Indexes for table `teknisi`
--
ALTER TABLE `teknisi`
  ADD PRIMARY KEY (`id_tek`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `panggilan`
--
ALTER TABLE `panggilan`
  MODIFY `id_pgl` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
