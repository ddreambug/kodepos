-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2023 at 04:08 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kodepos`
--

-- --------------------------------------------------------

--
-- Table structure for table `datakota`
--

CREATE TABLE `datakota` (
  `id` int(99) NOT NULL,
  `kode_wilayah` varchar(100) NOT NULL,
  `kode_pos` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `created_at` varchar(99) NOT NULL,
  `updated_at` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datakota`
--

INSERT INTO `datakota` (`id`, `kode_wilayah`, `kode_pos`, `provinsi`, `kota`, `kecamatan`, `kelurahan`, `created_at`, `updated_at`) VALUES
(1, '11.01.01.2002', '23773', 'Aceh', 'Kabupaten Aceh Selatan', 'Bakongan', 'Ujong Mangki', '2023-10-23 01:28:53', '2023-10-23 01:28:53'),
(2, '11.01.01.2003', '23773', 'Aceh', 'Kabupaten Aceh Selatan', 'Bakongan', 'Ujong Padang', '2023-10-23 01:29:08', '2023-10-23 01:29:08'),
(3, '36.01.01.2006', '42283', 'Banten', 'Kabupaten Pandeglang', 'Sumur', 'Tamanjaya', '2023-10-23 01:29:11', '2023-10-23 01:29:11'),
(4, '36.01.01.2007', '42283', 'Banten', 'Kabupaten Pandeglang', 'Sumur', 'Ujungjaya', '2023-10-23 01:29:15', '2023-10-23 01:29:15'),
(5, '76.01.02.2015', '91571', 'Sulawesi Barat', 'Kabupaten Pasangkayu', 'Pasangkayu', 'Ako', '2023-10-23 01:29:54', '2023-10-23 01:29:54'),
(6, '76.01.03.1001', '91572', 'Sulawesi Barat', 'Kabupaten Pasangkayu', 'Baras', 'Baras', '2023-10-23 01:29:57', '2023-10-23 01:29:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datakota`
--
ALTER TABLE `datakota`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datakota`
--
ALTER TABLE `datakota`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
