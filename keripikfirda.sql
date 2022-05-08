-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2022 at 09:00 AM
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
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id_pemasukan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total harga` int(11) NOT NULL,
  `keterangan lain` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id_pemasukan`, `tanggal`, `keterangan`, `jumlah`, `total harga`, `keterangan lain`) VALUES
(1, '2022-05-01', 'Kripik Nangka', 10, 50000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama` char(100) NOT NULL,
  `jenis_barang` varchar(150) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama`, `jenis_barang`, `harga`, `deskripsi`) VALUES
(1, 'Kripik Nangka Firda', 'kripik nangka', 5000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stok_barang`
--

CREATE TABLE `stok_barang` (
  `id_stok` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `stok_dimasukkan` int(11) NOT NULL,
  `stok_terjual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok_barang`
--

INSERT INTO `stok_barang` (`id_stok`, `id_toko`, `id_produk`, `stok`, `stok_dimasukkan`, `stok_terjual`) VALUES
(1, 1, 1, 10, 15, 5),
(2, 2, 1, 10, 15, 5),
(3, 3, 1, 10, 15, 5);

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama toko` char(100) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `nama toko`, `alamat`, `deskripsi`) VALUES
(1, 'Jati Arum', 'Jl. Kapten Suwandak Jogotrunan Lumajang', NULL),
(2, 'Lumajang Store', 'Jl. Cik Ditiro No. 17 Lumajang', NULL),
(3, 'Sumber Rasa', 'Jl. Kapten Suwandak no.79', NULL);

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
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `stok_barang`
--
ALTER TABLE `stok_barang`
  ADD PRIMARY KEY (`id_stok`),
  ADD KEY `id_toko` (`id_toko`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

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
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stok_barang`
--
ALTER TABLE `stok_barang`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `stok_barang`
--
ALTER TABLE `stok_barang`
  ADD CONSTRAINT `stok_barang_ibfk_1` FOREIGN KEY (`id_toko`) REFERENCES `toko` (`id_toko`),
  ADD CONSTRAINT `stok_barang_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
