-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2017 at 12:35 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `new`
--

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE IF NOT EXISTS `designation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation_name` varchar(500) NOT NULL,
  `pay_commission_id` int(11) NOT NULL,
  `pay_scale_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `designation_name`, `pay_commission_id`, `pay_scale_id`) VALUES
(1, 'Computer Engineer', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_name` varchar(500) NOT NULL,
  `designation_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `member_name`, `designation_id`) VALUES
(1, 'Prakash', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pay_commission`
--

CREATE TABLE IF NOT EXISTS `pay_commission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commission_name` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pay_commission`
--

INSERT INTO `pay_commission` (`id`, `commission_name`) VALUES
(1, '7th Pay Commission');

-- --------------------------------------------------------

--
-- Table structure for table `pay_scale`
--

CREATE TABLE IF NOT EXISTS `pay_scale` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pay_commission_id` int(11) NOT NULL,
  `minimum` varchar(100) NOT NULL,
  `grade_pay` varchar(100) NOT NULL,
  `maximum` varchar(100) NOT NULL,
  `pay_name` varchar(100) NOT NULL,
  `entry_pay` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pay_scale`
--

INSERT INTO `pay_scale` (`id`, `pay_commission_id`, `minimum`, `grade_pay`, `maximum`, `pay_name`, `entry_pay`) VALUES
(1, 1, '37400', '10000', '67000', 'PB-4', '43000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
