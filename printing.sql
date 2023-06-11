-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2023 at 03:05 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `printing`
--

-- --------------------------------------------------------

--
-- Table structure for table `laminatings`
--

CREATE TABLE `laminatings` (
  `id` int(25) NOT NULL,
  `tanggal` date NOT NULL,
  `no_ik` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `no_laminating` varchar(25) NOT NULL,
  `jumlah_meter` varchar(25) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `id_user` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laminatings`
--

INSERT INTO `laminatings` (`id`, `tanggal`, `no_ik`, `nama_barang`, `no_laminating`, `jumlah_meter`, `keterangan`, `id_user`, `created_at`) VALUES
(1, '2023-05-13', '1', 'a', '1', '12', NULL, '1', '2023-05-13 05:48:37'),
(2, '2023-05-13', '1', 'aa', '1', '10', NULL, '1', '2023-05-13 07:51:26'),
(3, '2023-05-18', '1', 'aa', 'sefsef', '10', NULL, '1', '2023-05-18 11:34:21'),
(4, '2023-05-18', '1', 'aa', 'asa', '10', NULL, '1', '2023-05-18 11:37:22'),
(5, '2023-05-18', '1', 'aa', 'asa', '10', NULL, '1', '2023-05-18 11:38:15'),
(6, '2023-05-18', '1', 'aa', 'asa', '10', 'efsefsefse', '1', '2023-05-18 11:40:56'),
(7, '2023-05-18', '1', 'aa', 'asa', '10', 'sefes', '1', '2023-05-18 11:41:15');

-- --------------------------------------------------------

--
-- Table structure for table `printings`
--

CREATE TABLE `printings` (
  `id` int(25) NOT NULL,
  `tanggal` date NOT NULL,
  `no_ik` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `no_printing` varchar(25) NOT NULL,
  `jumlah_meter` varchar(25) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `id_user` int(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `printings`
--

INSERT INTO `printings` (`id`, `tanggal`, `no_ik`, `nama_barang`, `no_printing`, `jumlah_meter`, `keterangan`, `id_user`, `created_at`) VALUES
(1, '2023-05-11', '1', 'aa', '1', '10', NULL, 1, '2023-05-12 12:08:16'),
(2, '2023-05-12', '1', 'aa', '1', '100', NULL, 1, '2023-05-12 12:08:16'),
(3, '2023-05-12', '1', 'aa', '1', '10', NULL, 1, '2023-05-12 12:08:16'),
(4, '2023-05-11', '1', 'aa', '1', '10', NULL, 1, '2023-05-12 12:08:16'),
(11, '2023-05-12', '1', 'aa', '1', '10', NULL, 1, '2023-05-12 12:08:16'),
(12, '2023-05-13', '1', 'aa', '1', '12', NULL, 1, '2023-05-12 12:08:16'),
(13, '2023-05-13', '1', 'aa', '1', '13', NULL, 1, '2023-05-12 12:08:16'),
(14, '2023-05-14', '1', 'aa', '1', '14', NULL, 1, '2023-05-12 12:08:16'),
(15, '2023-05-15', '1', 'aa', '1', '15', NULL, 1, '2023-05-12 12:08:16'),
(16, '2023-05-12', '1', 'aa', '1', '16', NULL, 1, '2023-05-12 12:08:16'),
(17, '2023-05-12', '1', 'aa', '1', '17', NULL, 1, '2023-05-12 12:08:16'),
(18, '2023-05-13', '1', 'aa', '1', '18', NULL, 1, '2023-05-12 12:08:16'),
(19, '2023-05-13', '1', 'aa', '1', '18', NULL, 1, '2023-05-12 12:08:16'),
(20, '2023-05-13', '1', 'aa', '1', '14', NULL, 1, '2023-05-12 12:08:16'),
(21, '2023-05-12', '1', 'aa', '1', '15', NULL, 1, '2023-05-12 12:08:16'),
(22, '2023-05-19', '1', 'aa', '1', '16', NULL, 1, '2023-05-12 12:08:16'),
(23, '2023-05-13', '1', 'aa', '1', '17', NULL, 1, '2023-05-12 12:08:16'),
(24, '2023-05-13', '1', 'aa', '1', '18', NULL, 1, '2023-05-12 12:08:16'),
(25, '2023-05-12', '1', 'aa', '1', '10', NULL, 1, '2023-05-12 12:08:16'),
(26, '2023-05-12', '1', 'aa', '1', '20', NULL, 1, '2023-05-12 12:08:16'),
(27, '2023-05-19', '1', 'aa', '1', '14', NULL, 1, '2023-05-12 12:08:16'),
(28, '2023-05-26', '1', 'aa', '1', '100', NULL, 1, '2023-05-12 12:08:16'),
(29, '2023-05-18', '1', 'aa', '1', '14', NULL, 1, '2023-05-12 12:08:16'),
(30, '2023-05-11', '1', 'aa', '1', '17', NULL, 1, '2023-05-12 12:08:16'),
(31, '2023-05-13', '1', 'aa', '1', '17', NULL, 1, '2023-05-12 12:08:16'),
(32, '2023-05-13', '1', 'aa', '1', '17', NULL, 1, '2023-05-12 12:08:16'),
(33, '2023-05-12', '1', 'aa', '1', '17', NULL, 1, '2023-05-12 12:08:16'),
(34, '2023-05-12', '1', 'aa', '1', '10', NULL, 1, '2023-05-12 12:08:16'),
(35, '2023-05-12', '1', 'aa', '1', '17', NULL, 1, '2023-05-12 12:08:16'),
(36, '2023-05-12', '1', 'aa', '1', '37', NULL, 1, '2023-05-12 12:08:16'),
(37, '2023-05-19', '1', 'aa', '1', '10', NULL, 1, '2023-05-12 12:26:27'),
(38, '2023-05-12', '1', 'aa', '1', '10', NULL, 1, '2023-05-12 13:18:34'),
(39, '2023-05-12', '1', 'aa', '1', '1000', NULL, 1, '2023-05-12 13:36:17'),
(40, '2023-05-20', '1', 'aa', '1', '121', NULL, 1, '2023-05-12 13:39:40'),
(41, '2023-05-12', '1', 'aa', '1', '10', NULL, 1, '2023-05-12 13:43:34'),
(42, '2023-05-12', '1', 'aa', '1', '5000', NULL, 1, '2023-05-12 13:56:53'),
(43, '2023-05-31', '1', 'aa', '1', '211', NULL, 1, '2023-05-13 04:12:47'),
(44, '2023-05-13', '1', 'aa', '1', '101', NULL, 1, '2023-05-13 07:35:46'),
(45, '2023-05-13', '1', 'aa', '1', '102', NULL, 1, '2023-05-13 07:38:06'),
(46, '2023-05-13', '1', 'aa', '1', '103', NULL, 1, '2023-05-13 07:42:17'),
(47, '2023-05-14', '2', 'anu', '112', '10', NULL, 1, '2023-05-14 10:19:27'),
(48, '2023-05-14', '1', 'nganu', '889', '12', NULL, 1, '2023-05-14 10:21:29'),
(49, '2023-05-14', '1', 'qwer', '11', '123', NULL, 1, '2023-05-14 10:44:50'),
(50, '2023-05-18', '1', 'aa', '1a', '10', 'sefesfse', 1, '2023-05-18 11:47:17');

-- --------------------------------------------------------

--
-- Table structure for table `slittings`
--

CREATE TABLE `slittings` (
  `id` int(25) NOT NULL,
  `tanggal` date NOT NULL,
  `no_ik` varchar(255) NOT NULL,
  `barang_jadi` varchar(255) NOT NULL,
  `no_slitting` varchar(25) NOT NULL,
  `jumlah_meter` varchar(25) NOT NULL,
  `hasil_fg_utuh` varchar(25) NOT NULL,
  `hasil_fg_riwen` varchar(25) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `id_user` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slittings`
--

INSERT INTO `slittings` (`id`, `tanggal`, `no_ik`, `barang_jadi`, `no_slitting`, `jumlah_meter`, `hasil_fg_utuh`, `hasil_fg_riwen`, `keterangan`, `id_user`, `created_at`) VALUES
(1, '2023-05-16', '1', 'aa', '1', '10', '', '', '', '1', '2023-05-16 01:54:23'),
(2, '2023-05-16', '1', 'aa', '1', '10', '', '', NULL, '1', '2023-05-16 02:30:26'),
(3, '2023-05-16', '1', 'aa', '1', '10', '', '', 'ket', '1', '2023-05-16 02:42:23'),
(4, '2023-05-18', '1', 'aa', '1', '10', '', '', '121212', '1', '2023-05-18 10:06:11'),
(5, '2023-05-18', '1', 'abc', '1', '10', '1', '1', 'keterangan keterangan keterangan ', '1', '2023-05-18 11:12:23'),
(6, '2023-05-18', '1', 'abc', '1', '10', '1', '1', 'ket ket', '1', '2023-05-18 11:12:58'),
(7, '2023-05-18', '1', 'eee', '1', '10', '1', '1', 'eeeeee', '1', '2023-05-18 11:16:56'),
(8, '2023-05-18', '1', 'sefsef', '1', '10', '1', '1', 's grd rd rdgd rd ', '1', '2023-05-18 11:17:59'),
(9, '2023-05-18', '1', 'aa', '1', '10', '1', '1', 'aaaa', '1', '2023-05-18 11:20:44'),
(10, '2023-05-18', '1', 'sesef', '1', '10', '1', '1', 'esfsef', '1', '2023-05-18 11:22:25'),
(11, '2023-05-18', '1', 'sefe', '1', 'se', 'se', 'se', 'se', '1', '2023-05-18 11:23:26'),
(12, '2023-05-18', '1', '1', '1', '10', '1', '1', 'sesef', '1', '2023-05-18 11:24:55'),
(13, '2023-05-18', '1', 'a', '1', '1', '1', '1', '', '1', '2023-05-18 11:27:23'),
(14, '2023-05-18', '1', 'a', '1', '10', '1', '1', 'sefesf', '1', '2023-05-18 11:27:53'),
(15, '2023-05-18', '1', 'a', '1', '10', '1', '1', 'asaswas', '1', '2023-05-18 11:32:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('user','admin') NOT NULL DEFAULT 'user' COMMENT 'user,admin',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `password`, `level`, `created_at`) VALUES
(1, 'fiki', '$2y$10$pGWGo1XgszGDTmASxTZfru2d1vr8lxLvygW7VOPZTN4o1DeZ7Srxi', 'user', '2023-05-09 03:41:30'),
(3, 'admin', '$2y$10$pGWGo1XgszGDTmASxTZfru2d1vr8lxLvygW7VOPZTN4o1DeZ7Srxi', 'admin', '2023-05-13 06:41:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laminatings`
--
ALTER TABLE `laminatings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `printings`
--
ALTER TABLE `printings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slittings`
--
ALTER TABLE `slittings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `name_2` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laminatings`
--
ALTER TABLE `laminatings`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `printings`
--
ALTER TABLE `printings`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `slittings`
--
ALTER TABLE `slittings`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
