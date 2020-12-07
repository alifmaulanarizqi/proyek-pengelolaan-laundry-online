-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2020 at 05:22 PM
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
(41, 'test1', 2, 'test1@email.com');

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
(8, 'test4', '7', 'test4@email.com', 18, 'wanita', '2020-12-04', '300000', '', '', ''),
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
('LNDRY1', 'Produk Laundry 1', '10000', 'Cuci + Setrika', 1),
('LNDRY2', 'Produk Laundry 2', '7000', 'Cuci', 1),
('LNDRY3', 'Produk Laundry 3', '6000', 'Setrika', 0),
('LNDRY4', 'Produk Laundry 4', '13000', 'Cuci + Setrika + Cepat', 0),
('LNDRY5', 'Produk Laundry 5', '15000', 'Cuci + Setrika + Cepat + Wangi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `total_transactions`
--

CREATE TABLE `total_transactions` (
  `tanggal` date NOT NULL,
  `total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `total_transactions`
--

INSERT INTO `total_transactions` (`tanggal`, `total`) VALUES
('2020-12-06', '42000'),
('2020-12-07', '0'),
('2020-12-08', '50000');

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
(57, 'LNDRY2', 41, 6, '2020-12-06', '42000'),
(58, 'LNDRY1', 41, 5, '2020-12-08', '50000');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
