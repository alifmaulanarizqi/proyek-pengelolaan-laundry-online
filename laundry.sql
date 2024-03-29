-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2020 at 02:06 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jml_transaksi` int(3) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `nama`, `jml_transaksi`, `email`) VALUES
(50, 'test1', 6, 'test1@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(3) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `umur` int(2) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `gaji` decimal(10,0) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_laundry` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `nama`, `posisi`, `email`, `umur`, `gender`, `start_date`, `gaji`, `username`, `password`, `nama_laundry`) VALUES
(8, 'test4', '7', 'test4@email.com', 19, 'wanita', '2020-12-04', '300000', '', '', ''),
(9, 'test2', '7', 'test2@email.com', 18, 'pria', '2020-12-04', '250000', '', '', ''),
(28, 'alif', '6', 'alifdeadpool333@gmail.com', 20, 'pria', '2020-12-06', '400000', 'alif', '$2y$10$usesomesillystringforeTeroxHu44nz6r2P7zLyMaCiQNdWofN.', 'Laundry Dong'),
(29, 'test1', '6', 'test1@email.com', 19, 'pria', '2020-12-06', '300000', 'test1', '$2y$10$usesomesillystringforeyrv6JhTDfkc8S9AuhIexKF6NNhnUEOm', 'Laundry Dong');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(3) NOT NULL,
  `posisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `posisi`) VALUES
(6, 'Admin'),
(7, 'Pencuci');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `jml_transaksi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `nama`, `harga`, `keterangan`, `jml_transaksi`) VALUES
('LNDRY1', 'Produk Laundry 1', '10000', 'Cuci + Setrika', 5),
('LNDRY2', 'Produk Laundry 2', '7000', 'Cuci', 0),
('LNDRY3', 'Produk Laundry 3', '6000', 'Setrika', 0),
('LNDRY4', 'Produk Laundry 4', '13000', 'Cuci + Setrika + Cepat', 0),
('LNDRY5', 'Produk Laundry 5', '15000', 'Cuci + Setrika + Cepat + Wangi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `total_transactions`
--

CREATE TABLE `total_transactions` (
  `tanggal` date NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `total_per_bulan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `total_transactions`
--

INSERT INTO `total_transactions` (`tanggal`, `total`, `bulan`, `total_per_bulan`) VALUES
('2020-11-01', '20000', 'November', '20000'),
('2020-12-09', '10000', 'December', '40000'),
('2020-12-10', '0', 'December', '40000'),
('2020-12-11', '30000', 'December', '40000'),
('2021-01-01', '50000', 'January', '50000'),
('2021-02-01', '10000', 'February', '10000'),
('2021-03-01', '45000', 'March', '45000'),
('2021-04-01', '0', 'April', '0');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(255) NOT NULL,
  `id_produk` varchar(255) NOT NULL,
  `id_customer` int(255) NOT NULL,
  `berat_laundry` int(3) NOT NULL,
  `tanggal` date NOT NULL,
  `harga` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `id_produk`, `id_customer`, `berat_laundry`, `tanggal`, `harga`) VALUES
(117, 'LNDRY1', 50, 1, '2020-12-09', '10000'),
(118, 'LNDRY1', 50, 1, '2021-02-01', '10000'),
(129, 'LNDRY1', 50, 2, '2020-11-01', '20000'),
(130, 'LNDRY1', 50, 3, '2020-12-11', '30000'),
(131, 'LNDRY1', 50, 5, '2021-01-01', '50000'),
(132, 'LNDRY5', 50, 3, '2021-03-01', '45000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_transactions`
--
ALTER TABLE `total_transactions`
  ADD PRIMARY KEY (`tanggal`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
