-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 24, 2020 at 07:32 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lpggas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `regid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `gastype` varchar(50) NOT NULL,
  `bookingdate` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'not delivered',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `regid`, `name`, `email`, `mob`, `address`, `gastype`, `bookingdate`, `status`) VALUES
(4, 7, 'mohan das', 'mohan@gmail.com', '2434353', 'tedi pulia', 'household', '20-Aug-2020', 'not delivered'),
(5, 7, 'mohan das', 'mohan@gmail.com', '2434353', 'sfgfhg', 'household', '20-Aug-2020', 'not delivered'),
(6, 7, 'mohan das', 'mohan@gmail.com', '2434353', 'sfgfhg', 'household', '21-Aug-2020', 'not delivered'),
(7, 7, 'mohan das', 'mohan@gmail.com', '2434353', 'sfgfhg', 'household', '22-Aug-2020', 'delivered'),
(8, 7, 'mohan das', 'mohan@gmail.com', '2434353', 'sfgfhg', 'household', '22-Aug-2020', 'not delivered');

-- --------------------------------------------------------

--
-- Table structure for table `connection`
--

DROP TABLE IF EXISTS `connection`;
CREATE TABLE IF NOT EXISTS `connection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `regid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `gastype` varchar(50) NOT NULL,
  `proof` varchar(200) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'not approved',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12345004 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `connection`
--

INSERT INTO `connection` (`id`, `regid`, `name`, `email`, `mob`, `gastype`, `proof`, `status`) VALUES
(12345001, 1, 'abc', 'abc@gmail.com', '12234', 'household', 'dettj.jpg', 'approved'),
(12345002, 7, 'mohan das', 'mohan@gmail.com', '2434353', 'household', 'tect.txt', 'approved'),
(12345003, 10, 'shubham', 'shubham@gmail.com', '12336568', 'commercial', 'blog-image02.jpg', 'rejected');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `sub` varchar(200) NOT NULL,
  `msg` varchar(250) NOT NULL,
  `reply` varchar(250) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `mob`, `sub`, `msg`, `reply`, `status`) VALUES
(1, 'mohan', '22457', 'dggn', 'fgfgh,.', 'cdgfhgh', '1'),
(2, 'ram', '223357', 'dfggh', 'dfhjj,k', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `lpg`
--

DROP TABLE IF EXISTS `lpg`;
CREATE TABLE IF NOT EXISTS `lpg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(50) DEFAULT NULL,
  `stock` varchar(10) DEFAULT NULL,
  `vehiclename` varchar(50) DEFAULT NULL,
  `vehicleno` varchar(50) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `subsidy` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lpg`
--

INSERT INTO `lpg` (`id`, `date`, `stock`, `vehiclename`, `vehicleno`, `price`, `subsidy`) VALUES
(5, '20-Aug-2020', '50', 'truck', 'up 32 233kh', '750', '150'),
(6, '21-Aug-2020', '30', 'pickup', '3344565', '750', '180'),
(4, '20-Aug-2020', '30', 'truck', 'up 32 12345', '750', '150'),
(7, '22-Aug-2020', '30', 'pickup', '22456', '600', '100');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bookingid` int(11) NOT NULL,
  `cardtype` varchar(50) NOT NULL,
  `cardno` varchar(16) NOT NULL,
  `nameoncard` varchar(100) NOT NULL,
  `expiry` varchar(100) NOT NULL,
  `cvv` varchar(200) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'unpaid',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `bookingid`, `cardtype`, `cardno`, `nameoncard`, `expiry`, `cvv`, `amount`, `status`) VALUES
(2, 6, 'credit', '13344556', 'ram', '2020-11', '$2y$10$5MVUkYACUlZZgnG74kMA9u4cybEDrgtCRyhvylz6tdiIlh3lcu4zq', '930', 'paid'),
(3, 6, 'credit', '3244657', 'ram', '2020-10', '$2y$10$FP/ERGOR14hrwo3NRjH/1Ow0pssXfz8UpfK4ZGEFlGjdKqM9xdv5C', '930', 'paid'),
(4, 6, 'credit', '233455678', 'ram', '2020-11', '$2y$10$pHtdoDxRCYs5nFi/DZcRZeMLwIe20EXL2PffBfZ0N8jCUnQicg4Rq', '930', 'paid'),
(5, 8, 'credit', '2355676', 'ram', '2020-11', '$2y$10$vETQiQEl5g1kRwlum7dfROtE5FVM8P.DEP.L7rsI6w92tgJqjL5vG', '700', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `adhar` varchar(12) NOT NULL,
  `adress` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `email`, `mob`, `adhar`, `adress`, `photo`, `password`) VALUES
(1, 'abc', 'abc@gmail.com', '243', '32435', 'eeff', 'logo.png', '123'),
(2, 'pqrs', 'pqrs@gmail.com', '23546', '12355', 'whg', 'iety.JPG', '1234'),
(3, 'xyz', 'xyz@gmail.com', '23546', '12355', 'whgfdfhg', 'dfd1.JPG', '$2y$10$R9w3Z82/16/O58.7bENorunlsroGn3XxSsNiB5E7aq6uvpZb3nnQa'),
(4, 'asd', 'asd@gmail.com', '133435', '345', '3445vhbf', 'dfd1.JPG', '$2y$10$D9Bjscl89QioVwnNz0mbAupZVfxelSn3wegh/WI7Dl3fvukgoWUvi'),
(8, 'krishna', 'krishna@gmail.com', '35576', '33576', 'sdggjh', '02.png', '$2y$10$dUU6zBpJKdyE81nj84sQu.S7KMFgdVCpRqT51dCzVB4uVFsfSrGz2'),
(6, 'fggqgh', 'ffhg@gmail.com', '233445', '446565', 'dggjh', 'dfd0.JPG', '$2y$10$Nt/7ROkZkk1649HDBd5NIeRHhsbMa4We6ukL3rxtl5q4lLqRcvipa'),
(7, 'mohan', 'mohan@gmail.com', '2434353', '3243544', 'sfgfhg', 'free-fb-f1199-fashion-basket-original-imaf4ec7gamryhn6.jpeg', '$2y$10$0kHup.5zlOSonKhP0RgJqeBpuQbkWvYoZzJXlRvIggWyKuxC3HZI2'),
(9, 'hari', 'hari@gmail.com', '35556', '56546', 'sffg', '01.png', '$2y$10$Dxl9BxaNYaFyPHXuxVx5cO0PgypPf1meQMA0gS5npIzd.ZVkmu5JW'),
(10, 'shubham', 'shubham@gmail.com', '12336568', '13357', 'ddgjh', 'menu.gif', '$2y$10$ILA3fH8Sejc.flrZomy3femlKNBHIIV4jfldzz2C.TpmrA7juhk12');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
