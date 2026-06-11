-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 13, 2026 at 06:16 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

DROP TABLE IF EXISTS `layanan`;
CREATE TABLE IF NOT EXISTS `layanan` (
  `id_layanan` int NOT NULL AUTO_INCREMENT,
  `nama_layanan` varchar(100) NOT NULL,
  `harga` int NOT NULL,
  PRIMARY KEY (`id_layanan`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `harga`) VALUES
(11, 'laundry', 7000),
(2, 'Laundry express', 12000),
(3, 'Cuci Selimut', 15000),
(4, 'Setrika Saja', 5000),
(5, 'Laundry Kiloan', 7000),
(6, 'Laundry Express', 12000),
(7, 'Cuci Selimut', 15000),
(8, 'Setrika Saja', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id_pembayaran` int NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `metode` varchar(50) NOT NULL,
  `total_harga` int NOT NULL,
  `status_bayar` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pembayaran`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_user`, `metode`, `total_harga`, `status_bayar`) VALUES
(1, 1, 'Cash', 14000, 'Lunas'),
(2, 2, 'Transfer', 12000, 'Belum Lunas'),
(3, 1, 'Cash', 14000, 'Lunas'),
(4, 1, 'Transfer', 12000, 'Belum Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

DROP TABLE IF EXISTS `pesanan`;
CREATE TABLE IF NOT EXISTS `pesanan` (
  `id_pesanan` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_layanan` int NOT NULL,
  `berat` int NOT NULL,
  `total_harga` int NOT NULL,
  `metode_pembayaran` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT 'Menunggu',
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pesanan`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_user`, `id_layanan`, `berat`, `total_harga`, `metode_pembayaran`, `status`, `tanggal`) VALUES
(1, 1, 11, 2, 14000, 'Cash', 'Selesai', '2026-05-13 04:32:24'),
(2, 3, 2, 7, 84000, 'QRIS', 'Sedang Disetrika', '2026-05-13 04:37:43'),
(3, 1, 11, 1, 7000, 'Cash', 'Menunggu', '2026-05-13 04:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `status_laundry`
--

DROP TABLE IF EXISTS `status_laundry`;
CREATE TABLE IF NOT EXISTS `status_laundry` (
  `id_tracking` int NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `status_laundry` varchar(50) NOT NULL,
  `tanggal_update` date NOT NULL,
  PRIMARY KEY (`id_tracking`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_laundry`
--

INSERT INTO `status_laundry` (`id_tracking`, `id_user`, `status_laundry`, `tanggal_update`) VALUES
(1, 1, 'Sedang Dicuci', '2026-04-28'),
(2, 2, 'Selesai', '2026-04-28'),
(4, 1, 'Sedang Disetrika', '2026-04-29'),
(5, 1, 'Selesai', '2026-04-29'),
(6, 3, 'Sedang Dicuci', '2026-08-05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`) VALUES
(1, 'dinda', '111'),
(2, 'winata', '1212'),
(3, 'je', '1212');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
