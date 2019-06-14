-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 13, 2019 at 03:42 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ddphotography`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(13, 'test', '$2y$10$Wz0cewgjS3mTQ1aLBd42qeLhnkZPu4IXtp6FA9NA890xPsA84ylgu'),
(14, 'te', '$2y$10$kztSIztvRoqn.rPAiQS.0uiH/zZ7gmh9EcMUHoIkqU9/VimXh/QpW'),
(15, 'test', '$2y$10$fRNKc7hzevv1LdnPARiB6ey17UCaDWN5YZoEBXnFF4dC16GwvoIyO'),
(16, 'test', '$2y$10$TKxzzbkqscfXixv5wiEqHuhkbMCgtIQ9zS05unjUC7/btSnWqVuRa'),
(17, 'test', '$2y$10$HkKJVH5G54jOv0inFwFXHOaWjqo/cLvmeCLzxzPAN3TB/TYeg57Di'),
(18, 'test', '$2y$10$lttYlPFMvIawcG6EMi0HB.ErXP9mvQkz4qriW8ezhHlUB43hRslkW');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `id_booking` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `surname` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `message` varchar(256) NOT NULL,
  PRIMARY KEY (`id_booking`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `name`, `surname`, `email`, `phone_number`, `date`, `time`, `message`) VALUES
(39, 'Tatjana', 'Ivosevic', 'tatjana.ivosevic1@gmail.com', '0637231107', '2019-06-12', '00:12:00', 'Poruka'),
(40, 'Filip', 'Suput', 'f.suput@gmail.com', '063121213', '2019-06-13', '01:13:00', 'poruka'),
(41, 'chole', 'chole', 'chole@vts.su.ac.rs', '0636648978', '2019-06-28', '11:58:00', 'fotografisanje');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
