-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 26, 2016 at 09:17 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mess`
--
CREATE DATABASE IF NOT EXISTS `mess` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mess`;

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE IF NOT EXISTS `dishes` (
  `dish_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `n_veg` tinyint(1) NOT NULL,
  `empty_time` int(11) DEFAULT NULL,
  `upvotes` int(11) NOT NULL,
  `downvotes` int(11) NOT NULL,
  `refil_time` int(11) NOT NULL,
  `Protein` int(4) DEFAULT '0',
  `Carb` int(4) DEFAULT '0',
  `Fat` int(4) DEFAULT '0',
  PRIMARY KEY (`dish_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1005 ;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`dish_id`, `name`, `n_veg`, `empty_time`, `upvotes`, `downvotes`, `refil_time`, `Protein`, `Carb`, `Fat`) VALUES
(1000, 'Chapathi', 0, NULL, 7, 2, 15, 0, 200, 0),
(1001, 'Dal', 0, NULL, 28, 10, 20, 150, 0, 0),
(1002, 'Shahi Paneer', 0, NULL, 56, 0, 20, 200, 0, 200),
(1003, 'Fried rice', 0, NULL, 80, 21, 50, 50, 100, 20),
(1004, 'Chilli Chicken', 1, NULL, 99, 1, 70, 100, 25, 20);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` varchar(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` int(4) NOT NULL,
  `privilege` set('1','2') NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `name`, `password`, `privilege`) VALUES
('1500', 'Mahesh Babu', 1234, '1');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `day` set('sun','mon','tue','wed','thu','fri','sat') NOT NULL,
  `dish_id` int(5) NOT NULL,
  `meal_id` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dish_id` (`dish_id`),
  KEY `dish_id_2` (`dish_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `day`, `dish_id`, `meal_id`) VALUES
(1, 'sun', 1000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `mess_data`
--

CREATE TABLE IF NOT EXISTS `mess_data` (
  `reg_no` varchar(9) NOT NULL,
  `dish_id` int(5) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  KEY `reg_no` (`reg_no`),
  KEY `dish_id` (`dish_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mess_data`
--

INSERT INTO `mess_data` (`reg_no`, `dish_id`, `date`, `time`) VALUES
('15BCE1330', 1000, '2016-10-10', '13:15:00'),
('15BCE1330', 1000, '2016-10-25', '12:00:00'),
('15BCE1330', 1001, '2016-10-26', '12:00:00'),
('15BCE1330', 1000, '2016-11-01', '13:00:00'),
('15BCE1330', 1001, '2016-11-01', '13:05:00'),
('15BCE1330', 1001, '2016-11-01', '13:20:00'),
('15BCE1330', 1002, '2016-11-01', '13:25:00'),
('15BCE1229', 1002, '2016-11-10', '13:00:00'),
('15BCE1229', 1003, '2016-11-09', '13:01:00'),
('15BCE1229', 1002, '2016-11-09', '15:00:00'),
('15BCE1229', 1002, '2016-11-10', '13:25:00'),
('15BCE1229', 1003, '2016-11-10', '13:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `reg_no` varchar(9) NOT NULL,
  `password` int(4) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fav_dish` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`reg_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`reg_no`, `password`, `name`, `email`, `fav_dish`) VALUES
('15BCE1229', 1234, 'Vishakha Sangtani', 'vishakha.sangtani2015@vit.ac.i', '1002'),
('15BCE1330', 1234, 'Ishank Saxena', 'ishank.saxena2015@vit.ac.in', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_dishid_fk` FOREIGN KEY (`dish_id`) REFERENCES `dishes` (`dish_id`);

--
-- Constraints for table `mess_data`
--
ALTER TABLE `mess_data`
  ADD CONSTRAINT `mess_data_dishid_fk` FOREIGN KEY (`dish_id`) REFERENCES `dishes` (`dish_id`),
  ADD CONSTRAINT `mess_data_fk` FOREIGN KEY (`reg_no`) REFERENCES `student` (`reg_no`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
