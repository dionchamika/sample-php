-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 04, 2025 at 09:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slt_clothing`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(10) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `username`, `email`, `password`, `date_time`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin123', '2024-02-12 12:20:20');

-- --------------------------------------------------------

--
-- Table structure for table `customize`
--

CREATE TABLE `customize` (
  `id` int(11) NOT NULL,
  `first` varchar(100) DEFAULT NULL,
  `second` varchar(100) DEFAULT NULL,
  `third` varchar(100) DEFAULT NULL,
  `img1` varchar(130) DEFAULT NULL,
  `clients` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customize`
--

INSERT INTO `customize` (`id`, `first`, `second`, `third`, `img1`, `clients`) VALUES
(4, 'Where style', 'meets elegance', 'Discover timeless pieces that elevate every moment.', 'uploads/pic_2050125135920_900460_c0449381-800px-wm.jpg', NULL),
(5, 'Where style', 'meets elegance', 'Discover timeless pieces that elevate every moment.', 'uploads/pic_20250125172818_750757_beauty-fashion-concept-full-length-beautiful-young-lady-going-party-heels-black-dress.jpg', NULL),
(6, 'Where style', 'meets elegance.', 'Discover timeless pieces that elevate every moment.', 'uploads/pic_20250125173530_605660_tender-flirty-feminine-redhead-woman-playing-with-hair-tilting-head-shoulder-smiling-cute.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `shirt` varchar(120) DEFAULT NULL,
  `bottoms` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `userid` int(10) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `firstname` varchar(60) DEFAULT NULL,
  `lastname` varchar(60) DEFAULT NULL,
  `adress` varchar(100) DEFAULT NULL,
  `country` varchar(60) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `zip` varchar(100) DEFAULT NULL,
  `contactnumber` varchar(20) DEFAULT NULL,
  `pname` varchar(80) DEFAULT NULL,
  `size` varchar(30) DEFAULT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  `img` varchar(150) DEFAULT NULL,
  `price` varchar(120) DEFAULT NULL,
  `order_datetime` datetime DEFAULT NULL,
  `status` varchar(40) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(10) NOT NULL,
  `category` varchar(30) DEFAULT NULL,
  `shirtcategory` varchar(20) DEFAULT NULL,
  `quantity` varchar(50) DEFAULT NULL,
  `sizes` varchar(20) DEFAULT NULL,
  `pname` varchar(70) DEFAULT NULL,
  `Brand` varchar(50) DEFAULT NULL,
  `Style` varchar(80) DEFAULT NULL,
  `Colour` varchar(70) DEFAULT NULL,
  `Material` varchar(80) DEFAULT NULL,
  `Thickness` varchar(70) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` int(15) DEFAULT NULL,
  `img` varchar(140) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `status` int(4) NOT NULL DEFAULT 1,
  `view_count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(60) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `remember_token` varchar(150) DEFAULT NULL,
  `role` varchar(10) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `customize`
--
ALTER TABLE `customize`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customize`
--
ALTER TABLE `customize`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
