-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2022 at 02:27 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(10) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `satuan` varchar(225) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`, `satuan`, `gambar`) VALUES
(31, 'oooo', 8000, 'kertas', 'pbo.jpg'),
(35, 'kentang', 4000, 'botol', 'admin2.png'),
(36, 'jj', 3000, 'kertas', 'pbo1.jpg'),
(37, 'sepatu', 120000, 'kerdus', 'overdosis.jpg'),
(38, 'ikan', 30000, 'kg', '');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` int(10) NOT NULL,
  `id_transaksi` int(10) DEFAULT NULL,
  `id_barang` int(10) DEFAULT NULL,
  `id_sales` int(10) DEFAULT NULL,
  `jlh_pinjam` int(10) DEFAULT NULL,
  `total_harga_pinjam` int(10) DEFAULT NULL,
  `jlh_kembali` int(10) DEFAULT NULL,
  `total_harga_kembali` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `id_transaksi`, `id_barang`, `id_sales`, `jlh_pinjam`, `total_harga_pinjam`, `jlh_kembali`, `total_harga_kembali`) VALUES
(28, 1, 31, 5, 3, 120000, 2, 0),
(32, 1, 36, 5, 2, 6000, 0, 0),
(37, 34, 35, 12, 123, 492000, NULL, NULL),
(38, 5, NULL, 5, 4, 0, NULL, NULL),
(39, 5, NULL, 5, 20, 80000, 1, 0),
(40, 20, NULL, 5, 12, 480000, 2, 0),
(41, 19, 31, 5, 12, 480000, NULL, NULL),
(42, 1, NULL, 5, 123, 492000, 3, 0),
(43, 1, 35, 5, 12, 48000, 3, 0),
(44, 1, 35, 5, 3, 12000, 2, 8000),
(45, 1, 36, 5, 12, 36000, 2, 6000);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id_sales` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id_sales`, `nama`, `alamat`, `telepon`) VALUES
(5, '1111', '11', '4443'),
(8, 'budi', 'bangko kanna', '23211'),
(9, 'andi', 'jalan rowo', '221322'),
(10, 'hh', 'sdfds', '+6282361655755'),
(11, 'assd', 'sdcsdf', '45464'),
(12, 'hhh', 'hhh', '88');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `id_sales` int(10) NOT NULL,
  `tgl_peminjaman` varchar(25) NOT NULL,
  `tgl_pengembalian` varchar(25) DEFAULT NULL,
  `total_harga_peminjaman` int(100) DEFAULT NULL,
  `total_harga_pengembalian` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_sales`, `tgl_peminjaman`, `tgl_pengembalian`, `total_harga_peminjaman`, `total_harga_pengembalian`) VALUES
(1, 5, 'kkk', 'jj', 9, 9),
(3, 8, 'sdas ', '2022-07-07', 2312, 1212),
(4, 9, 'sdfsd', 'sfds', 324224, 2423),
(5, 5, '2022-07-08', '2022-07-23', NULL, NULL),
(19, 5, '2022-07-07', '2022-07-22', NULL, NULL),
(20, 5, '2022-07-07', '2022-07-30', NULL, NULL),
(21, 5, '2022-07-12', '2022-07-28', NULL, NULL),
(22, 5, '2022-07-05', NULL, NULL, NULL),
(23, 5, '2022-07-08', NULL, NULL, NULL),
(24, 9, '2022-07-13', NULL, NULL, NULL),
(25, 9, '2022-07-13', NULL, NULL, NULL),
(26, 9, '2022-07-12', NULL, NULL, NULL),
(27, 9, '2022-07-05', NULL, NULL, NULL),
(28, 8, '2022-07-13', '2022-07-23', NULL, NULL),
(29, 10, 'kk', NULL, NULL, NULL),
(30, 11, '2022-07-19', NULL, NULL, NULL),
(31, 5, '2022-07-13', NULL, NULL, NULL),
(32, 5, '2022-07-14', NULL, NULL, NULL),
(33, 5, '2022-07-16', NULL, NULL, NULL),
(34, 12, '2022-07-14', '2022-07-21', NULL, NULL),
(35, 5, 'dw', '2022-07-15', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `id_sales` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(12) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'user',
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_sales`, `username`, `password`, `role`, `date_created`) VALUES
(1, 5, 'anwar', 'sdds', 'user', '2022-07-16'),
(8, 8, 'babe14', 'q3ewe', 'user', '2022-07-18'),
(9, 9, 'anwar20ti@mahasiswa.pcr.a', '123', 'user', '2022-07-18'),
(10, 12, 'admin', 'admin1', 'user', '2022-07-12'),
(11, 10, 'bara', '123', 'Admin', '2022-07-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `pinjam_tr` (`id_barang`),
  ADD KEY `sales_[` (`id_sales`),
  ADD KEY `trk` (`id_transaksi`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id_sales`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `kasir_` (`id_sales`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sales` (`id_sales`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id_sales` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `pinjam_tr` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `sales_[` FOREIGN KEY (`id_sales`) REFERENCES `sales` (`id_sales`),
  ADD CONSTRAINT `trk` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `kasir_` FOREIGN KEY (`id_sales`) REFERENCES `sales` (`id_sales`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_sales`) REFERENCES `sales` (`id_sales`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
