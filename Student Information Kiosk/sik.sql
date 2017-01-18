-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 03, 2016 at 03:45 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sik`
--
CREATE DATABASE IF NOT EXISTS `sik` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sik`;

-- --------------------------------------------------------

--
-- Table structure for table `stud_details`
--

CREATE TABLE IF NOT EXISTS `stud_details` (
  `regno` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `accommodation` varchar(1) NOT NULL,
  `mobile` int(10) NOT NULL,
  `vmail` varchar(255) NOT NULL,
  `room` int(5) NOT NULL,
  `block` varchar(5) NOT NULL,
  PRIMARY KEY (`regno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stud_details`
--

INSERT INTO `stud_details` (`regno`, `name`, `gender`, `accommodation`, `mobile`, `vmail`, `room`, `block`) VALUES
('15bce1330', 'ishank saxena', 'm', 'h', 2147483647, 'isn.sxn@gmail.com', 446, 'a'),
('15bce1334', 'aman  tiwari', 'm', 'h', 2147483647, 'aman.tiwari85@gmail.com', 446, 'a'),
('15bce1346', 'Krishna Agarwal', 'm', 'h', 2147483647, 'kriaga3@gmail.com', 446, 'b');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
