-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 21, 2021 at 12:21 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `creativehubs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`, `email`, `created`) VALUES
(1, 'eren dogan', '2727', 'eren@test.com', '2021-10-01 07:29:54');

-- --------------------------------------------------------

--
-- Table structure for table `edges`
--

CREATE TABLE `edges` (
  `tid` int(11) NOT NULL,
  `id` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `source` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `target` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `bg` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT '#cccccc',
  `arrowline` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT 'straight'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `edges`
--

INSERT INTO `edges` (`tid`, `id`, `source`, `target`, `bg`, `arrowline`) VALUES
(102, '1-2', '1', '2', '#ec0909', 'unbundled-bezier'),
(103, '1-3', '1', '3', '#ec0909', 'unbundled-bezier'),
(104, 'A-B', 'A', 'B', '#0ca68c', 'straight'),
(105, 'A-C', 'A', 'C', '#0ca68c', 'straight'),
(106, '1-4', '1', '4', '#ec0909', 'unbundled-bezier'),
(107, '1-5', '1', '5', '#ec0909', 'unbundled-bezier'),
(108, '1-6', '1', '6', '#ec0909', 'unbundled-bezier'),
(109, '1-7', '1', '7', '#ec0909', 'unbundled-bezier'),
(110, '1-8', '1', '8', '#ec0909', 'unbundled-bezier'),
(111, 'Buyuksehir-Sahinbey', 'Buyuksehir', 'Sahinbey', '#41a6c8', 'unbundled-bezier'),
(112, 'Buyuksehir-Sehitkamil', 'Buyuksehir', 'Sehitkamil', '#41a6c8', 'unbundled-bezier'),
(113, 'Buyuksehir-Araban', 'Buyuksehir', 'Araban', '#41a6c8', 'unbundled-bezier'),
(114, 'Buyuksehir-Yavuzeli', 'Buyuksehir', 'Yavuzeli', '#41a6c8', 'unbundled-bezier'),
(115, 'Buyuksehir-Oguzeli', 'Buyuksehir', 'Oguzeli', '#41a6c8', 'unbundled-bezier'),
(116, 'Buyuksehir-Islahiye', 'Buyuksehir', 'Islahiye', '#41a6c8', 'unbundled-bezier'),
(117, 'Buyuksehir-Nurdagi', 'Buyuksehir', 'Nurdagi', '#41a6c8', 'unbundled-bezier'),
(118, 'Buyuksehir-Nizip', 'Buyuksehir', 'Nizip', '#41a6c8', 'unbundled-bezier');

-- --------------------------------------------------------

--
-- Table structure for table `nodes`
--

CREATE TABLE `nodes` (
  `tid` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `id` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `source` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `sh` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT 'ellipse',
  `bg` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT '#cccccc',
  `bw` varchar(2) COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT '1',
  `bc` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT '#333333',
  `text` varchar(300) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `link` varchar(200) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `location` text COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `category` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `nodes`
--

INSERT INTO `nodes` (`tid`, `type`, `id`, `source`, `sh`, `bg`, `bw`, `bc`, `text`, `link`, `address`, `location`, `category`) VALUES
(127, 'title', '1', '1', 'ellipse', '#ec0909', '1', '#17181c', NULL, NULL, NULL, NULL, 'resmi'),
(128, 'main', '2', '1', 'ellipse', '#ec0909', '1', '#17181c', NULL, NULL, NULL, NULL, 'resmi'),
(129, 'main', '3', '1', 'ellipse', '#ec0909', '1', '#17181c', NULL, NULL, NULL, NULL, 'resmi'),
(130, 'title', 'A', 'A', 'ellipse', '#0ca68c', '1', '#333333', NULL, NULL, NULL, NULL, 'resmi'),
(131, 'main', 'B', 'A', 'ellipse', '#0ca68c', '1', '#333333', NULL, NULL, NULL, NULL, 'resmi'),
(132, 'main', 'C', 'A', 'ellipse', '#0ca68c', '1', '#333333', NULL, NULL, NULL, NULL, 'resmi'),
(134, 'main', '5', '1', 'ellipse', '#ec0909', '1', '#17181c', 'vfv', 'vf', 'vf', 'fv', 'Resmi'),
(135, 'main', '4', '1', 'ellipse', '#ec0909', '1', '#17181c', 'vfv', 'vf', 'vf', 'fv', 'Resmi'),
(136, 'main', '6', '1', 'ellipse', '#ec0909', '1', '#17181c', 'vfv', 'vf', 'vf', 'fv', 'Resmi'),
(137, 'main', '7', '1', 'ellipse', '#ec0909', '1', '#17181c', NULL, NULL, NULL, NULL, 'vfvf'),
(138, 'main', '8', '1', 'ellipse', '#ec0909', '1', '#17181c', NULL, NULL, NULL, NULL, 'vfvf'),
(139, 'title', 'Buyuksehir', 'Buyuksehir', 'ellipse', '#41a6c8', '1', '#333333', NULL, NULL, NULL, NULL, 'Resmi'),
(140, 'main', 'Sahinbey', 'Buyuksehir', 'ellipse', '#41a6c8', '1', '#333333', NULL, NULL, NULL, NULL, 'Resmi'),
(141, 'main', 'Sehitkamil', 'Buyuksehir', 'ellipse', '#41a6c8', '1', '#333333', NULL, NULL, NULL, NULL, 'Resmi'),
(142, 'main', 'Yavuzeli', 'Buyuksehir', 'ellipse', '#41a6c8', '1', '#333333', NULL, NULL, NULL, NULL, 'Resmi'),
(143, 'main', 'Nizip', 'Buyuksehir', 'ellipse', '#41a6c8', '1', '#333333', NULL, NULL, NULL, NULL, 'Resmi'),
(144, 'main', 'Araban', 'Buyuksehir', 'ellipse', '#41a6c8', '1', '#333333', NULL, NULL, NULL, NULL, 'Resmi'),
(145, 'main', 'Oguzeli', 'Buyuksehir', 'ellipse', '#41a6c8', '1', '#333333', NULL, NULL, NULL, NULL, 'Resmi'),
(146, 'main', 'Nurdagi', 'Buyuksehir', 'ellipse', '#41a6c8', '1', '#333333', NULL, NULL, NULL, NULL, 'Resmi'),
(147, 'main', 'Islahiye', 'Buyuksehir', 'ellipse', '#41a6c8', '1', '#333333', NULL, NULL, NULL, NULL, 'Resmi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edges`
--
ALTER TABLE `edges`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `nodes`
--
ALTER TABLE `nodes`
  ADD PRIMARY KEY (`tid`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `edges`
--
ALTER TABLE `edges`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `nodes`
--
ALTER TABLE `nodes`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
