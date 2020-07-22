-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2020 at 07:21 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webprogrammingdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(6) UNSIGNED NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_contactnum` varchar(12) NOT NULL,
  `customer_rent_date` date NOT NULL,
  `customer_return_date` date DEFAULT NULL,
  `dvdid` int(6) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_name`, `customer_contactnum`, `customer_rent_date`, `customer_return_date`, `dvdid`) VALUES
(1, 'Muhammad Aniq Asyraaf Bin Zainal Abidin', '01112345678', '2020-07-01', '2020-07-07', 7),
(3, 'Muhammad Danial Hakimi Bin Habibullah', '01111223344', '2020-06-29', '0000-00-00', 3),
(4, 'Muhammad Afiq Bin Zaidin', '01111122456', '2020-06-29', '2020-07-06', 2),
(5, 'Muhammad Amir Syafiq', '01919283747', '2020-06-27', '0000-00-00', 4),
(6, 'Muhammad Kamil', '01114561234', '2020-06-28', '0000-00-00', 4),
(9, 'Muhammad burhanuddin', '01927364537', '2020-06-26', '2020-07-07', 8);

-- --------------------------------------------------------

--
-- Table structure for table `dvd`
--

CREATE TABLE `dvd` (
  `dvdid` int(6) UNSIGNED NOT NULL,
  `dvdname` varchar(100) DEFAULT NULL,
  `dvdquantity` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dvd`
--

INSERT INTO `dvd` (`dvdid`, `dvdname`, `dvdquantity`) VALUES
(2, 'Avengers The Endgame', 7),
(3, 'Cinderella The Movie', 6),
(4, 'Rapunzel The Movie', 6),
(5, 'Snow White The Movie', 8),
(6, 'Superman The Movie', 9),
(7, 'Batman The Movie', 10),
(8, 'Batman The Dark Knight', 10),
(9, 'Batman The Dark Knight Rises', 9),
(10, 'Superman Return The Movie', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(12) DEFAULT NULL,
  `level` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`) VALUES
(3, 'user_3', 'password_3', 3),
(7, 'user_1', 'password_1', 1),
(8, 'user_2', 'password_2', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dvdid` (`dvdid`);

--
-- Indexes for table `dvd`
--
ALTER TABLE `dvd`
  ADD PRIMARY KEY (`dvdid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dvd`
--
ALTER TABLE `dvd`
  MODIFY `dvdid` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`dvdid`) REFERENCES `dvd` (`dvdid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
