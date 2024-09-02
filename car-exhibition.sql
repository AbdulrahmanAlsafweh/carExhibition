-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 01, 2023 at 06:22 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car-exhibition`
--

-- --------------------------------------------------------

--
-- Table structure for table `carexhibition`
--

DROP TABLE IF EXISTS `carexhibition`;
CREATE TABLE IF NOT EXISTS `carexhibition` (
  `exhibition-id` int NOT NULL,
  `exhibition-name` varchar(255) COLLATE utf16_bin NOT NULL,
  `location` varchar(255) COLLATE utf16_bin NOT NULL,
  `car-capacity` int NOT NULL,
  PRIMARY KEY (`exhibition-id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `carexhibition`
--

INSERT INTO `carexhibition` (`exhibition-id`, `exhibition-name`, `location`, `car-capacity`) VALUES
(2, 'Car Show 2022', 'Damascus', 60),
(3, 'Mega Auto Fair ', 'Tokyo ', 100),
(4, 'International Show', 'Paris', 75);

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
CREATE TABLE IF NOT EXISTS `cars` (
  `car-id` int NOT NULL,
  `manufacturing-company-id` int NOT NULL,
  `model` varchar(255) COLLATE utf16_bin NOT NULL,
  `year` date NOT NULL,
  `top-speed` int NOT NULL,
  `color` varchar(255) COLLATE utf16_bin NOT NULL,
  `price` int NOT NULL,
  `fuel-type` varchar(255) COLLATE utf16_bin NOT NULL,
  `transmission-type` varchar(255) COLLATE utf16_bin NOT NULL,
  `imagename` varchar(255) COLLATE utf16_bin NOT NULL,
  `exhibition-id` int NOT NULL,
  `views` int NOT NULL,
  PRIMARY KEY (`car-id`),
  KEY `exhibition-id` (`exhibition-id`),
  KEY `manufacturing-company-id` (`manufacturing-company-id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car-id`, `manufacturing-company-id`, `model`, `year`, `top-speed`, `color`, `price`, `fuel-type`, `transmission-type`, `imagename`, `exhibition-id`, `views`) VALUES
(4442, 3, 'Toyota Camry', '2023-08-15', 0, 'Red', 25000, 'petrol', 'manual', '3_4442.jpeg', 2, 10),
(11111, 17, 'Mercedes-Benz C-Class', '2022-01-25', 195, 'Blue', 30000, 'petrol', 'manual', '17_11111.jpg', 2, 17),
(13579, 3, 'Nissan Altima', '2021-06-14', 170, 'Red', 21000, 'petrol', 'automatic', '3_13579.jpg', 3, 14),
(22222, 7, 'Audi A4', '2023-07-05', 185, 'Blue', 32000, 'petrol', 'automatic', '7_22222.jpg', 3, 12),
(24680, 16, 'Chevrolet Camaro', '2023-07-04', 185, 'Blue', 27000, 'petrol', 'automatic', '16_24680.jpg', 4, 11),
(54321, 4, 'BMW 5 Series', '2023-07-12', 200, 'Light Gray', 35000, 'diesel', 'automatic', '4_54321.jpg', 3, 11),
(77634, 11, ' Ford Mustang', '2022-05-18', 190, 'Yellow', 28000, 'petrol', 'manual', '11_77634.jpg', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `username` varchar(255) COLLATE utf16_bin NOT NULL,
  `password` varchar(255) COLLATE utf16_bin NOT NULL,
  `role` varchar(255) COLLATE utf16_bin NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `profileImage` varchar(255) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`username`, `password`, `role`, `id`, `profileImage`) VALUES
('aboudi', '123456788', '0', 4, 'sdsd'),
('admin', '12345678', '1', 1, 'admin_1.png'),
('ahmad', '12345678', '0', 6, 'profileImage.jpg'),
('alsafweh', '12345678', '0', 5, 'profileImage.jpg'),
('asdasd', '13132123123', '0', 3, 'profileImage.jpg'),
('ayda', '12345678', '0', 8, 'ayda_8.png'),
('karim', '12345678', '0', 9, 'profileImage.png'),
('ziad', '12345678', '0', 7, 'profileImage.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturing-company`
--

DROP TABLE IF EXISTS `manufacturing-company`;
CREATE TABLE IF NOT EXISTS `manufacturing-company` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `manufacturing-company`
--

INSERT INTO `manufacturing-company` (`id`, `name`) VALUES
(3, 'nissan'),
(4, 'bmw'),
(6, 'lexus'),
(7, 'audi'),
(8, 'renault'),
(9, 'honda'),
(10, 'toyota'),
(11, 'ford'),
(12, 'tesla'),
(13, 'mazda'),
(14, 'jeep'),
(15, 'volkswagen'),
(16, 'chevrolet'),
(17, 'mercedes'),
(18, 'ferrari'),
(19, 'bentley'),
(20, 'hyundai'),
(21, 'kia'),
(22, 'gmc');

-- --------------------------------------------------------

--
-- Table structure for table `userfav`
--

DROP TABLE IF EXISTS `userfav`;
CREATE TABLE IF NOT EXISTS `userfav` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf16_bin NOT NULL,
  `car-id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `car-id` (`car-id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `userfav`
--

INSERT INTO `userfav` (`id`, `username`, `car-id`) VALUES
(1, 'admin', 77634),
(2, 'ayda', 54321);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`exhibition-id`) REFERENCES `carexhibition` (`exhibition-id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cars_ibfk_2` FOREIGN KEY (`manufacturing-company-id`) REFERENCES `manufacturing-company` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `userfav`
--
ALTER TABLE `userfav`
  ADD CONSTRAINT `userfav_ibfk_1` FOREIGN KEY (`car-id`) REFERENCES `cars` (`car-id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `userfav_ibfk_2` FOREIGN KEY (`username`) REFERENCES `customers` (`username`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
