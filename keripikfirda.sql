-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2022 at 09:03 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keripikfirda`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan_mentah`
--

CREATE TABLE `bahan_mentah` (
  `id_bahan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `jumlah` char(15) NOT NULL,
  `banyak_barang` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bahan_mentah`
--

INSERT INTO `bahan_mentah` (`id_bahan`, `nama`, `jenis`, `jumlah`, `banyak_barang`, `harga`, `gambar`) VALUES
(1, 'Nangka', 'Nangka Dulang', 'Ton', 50, 70000, 'nangka.jpg'),
(2, 'Beras', 'Beras Premium', 'Ton', 100, 9000000, 'beras.jpg'),
(3, 'Garam', 'Garam Meja', 'Kilogram', 100, 5000, 'garam.jpg'),
(4, 'Gula', 'Gula Mentah', 'Kilogram', 100, 13500, 'gula.jpg'),
(5, 'Jagung', 'Jagung Manis', 'Ton', 79, 250000, 'jagung.jpg'),
(6, 'Margarin', 'Margarin (Filma)', 'Kilogram', 100, 33000, 'margarin.jpg'),
(7, 'Minyak', 'Minyak (Berlian)', 'Liter', 1000, 35000, 'minyak.jpg'),
(8, 'Susu', 'Susu Sapi', 'Liter', 1000, 10000, 'susu.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `email`, `password`) VALUES
(5, 'dev@gmail.com', '$2y$10$EHDB/aUw02/u409SQ8aseOZ0j4C.kE5PcQeCNcOdxJx1UWznafpGO'),
(6, 'admin@gmail.com', '$2y$10$Jxb0IaJy/nxoOA4UPuUjx.STomyPleJ6gVgMpwdmia/6GIPk0Hq9.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan_mentah`
--
ALTER TABLE `bahan_mentah`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan_mentah`
--
ALTER TABLE `bahan_mentah`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
