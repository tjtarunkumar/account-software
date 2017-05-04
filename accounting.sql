-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2017 at 03:58 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `accounting`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `designation_name`, `pay_commission_id`, `pay_scale_id`) VALUES
(1, 'Computer Engineer', 1, 1),
(2, 'Hacker', 1, 1),
(3, 'Hacker 5', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_name` varchar(500) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `work_place` varchar(500) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `pan` varchar(100) NOT NULL,
  `incre_month` varchar(100) NOT NULL,
  `salary_bank` varchar(500) NOT NULL,
  `save_acc` varchar(100) NOT NULL,
  `pf_bank` varchar(500) NOT NULL,
  `pf_acc` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `doj` varchar(100) NOT NULL,
  `pf_bal` varchar(100) NOT NULL,
  `el_bal` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `employee_name`, `designation_id`, `emp_id`, `work_place`, `sex`, `pan`, `incre_month`, `salary_bank`, `save_acc`, `pf_bank`, `pf_acc`, `dob`, `doj`, `pf_bal`, `el_bal`, `mobile`) VALUES
(1, 'Prakash Ranjan Kumar', 1, '25', 'Muzaffarpur', 'male', '1524364759522', '5000', 'State Bank of India', '32843475345', 'Bank of Baroda', '43853457834578', '19-05-1990', '20-04-2015', '2500000', '3500000', '8092585042'),
(2, 'Prakash', 2, '25', 'dsfsdfgsdg', 'female', '1524364759522', 'ert3434', '435345', '45dfgdfgdf', '34534', 'dfdfg', '19-15-2015', '20-14-1664', '435', '456', '54645654656'),
(3, 'Prakash', 2, '25', 'Muzaffarpur', 'male', '1524364759522', '5000', '435345', '45dfgdfgdf', '34534', 'dfdfg', '04/21/2017', '01/09/2017', '435', '456', '54645654656'),
(4, 'Prakash', 2, '25', 'patna', 'male', '1524364759522', '', '435345', '45dfgdfgdf', '34534', 'dfdfg', '19-15-2015', '20-14-1664', '435', '456', '54645654656'),
(5, 'Prakash', 2, '25', 'delhi', 'female', '1524364759522', '', '435345', '45dfgdfgdf', '34534', 'dfdfg', '19-15-2015', '20-14-1664', '435', '456', '54645654656'),
(15, 'Prakash', 2, '25', 'goa', 'female', '1524364759522', '', '435345', '45dfgdfgdf', '34534', 'dfdfg', '19-15-2015', '20-14-1664', '435', '456', '54645654656'),
(16, 'Prakash', 2, '25', 'puna', 'male', '1524364759522', '', '435345', '45dfgdfgdf', '34534', 'dfdfg', '19-15-2015', '20-14-1664', '435', '456', '54645654656'),
(17, 'rtyreyter', 3, '54645645', '45rtdrtdrtgd', 'female', 'fgfdgdfgd', 'gdfhgfdhgfhf', 'ghfghfghfgh', 'fghfghfgh', 'fghfghfg', 'gjghjfghjfg', '04/20/2017', 'fghgfh', 'hfghfhfg', 'hfghfgjfgjgj', '675675675676'),
(18, 'fgdf', 3, 'gdfgd', 'fgd', 'male', 'fdg', 'fdgdf', 'dfgdfg', 'dfg', 'fdg', 'dfg', '04/18/2017', '04/22/2017', 'dfgdfg', 'fdgdfg', 'dfgdg'),
(19, 'Final Testing', 3, '768', 'Muzaffarpur', 'female', '456456', '45645', '435345', '243654759581', '34534', '631458541854', '05/26/2017', '05/19/2017', '435', '3500000', '9852522389'),
(20, 'Final Testing', 3, '76856', 'Muzaffarpur', 'male', '456456', '45645', '435345', '243654759581', '34534', '631458541854', '05/01/2017', '05/27/2017', '435', '3500000', '9852522389');

-- --------------------------------------------------------

--
-- Table structure for table `pay_commission`
--

CREATE TABLE IF NOT EXISTS `pay_commission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commission_name` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `pay_commission`
--

INSERT INTO `pay_commission` (`id`, `commission_name`) VALUES
(1, '4th Pay'),
(3, '5th'),
(4, 'ty'),
(5, 'ty56'),
(6, 'ty565656'),
(7, 'ty56565656'),
(8, 'ty56565656ty'),
(9, 'hj'),
(10, 'hjf'),
(11, 'hjfd'),
(12, 'hjfdd'),
(13, 'hjfddh'),
(14, 'hjfddhnm,'),
(15, 'five'),
(16, 'six'),
(17, 'four');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `pay_scale`
--

INSERT INTO `pay_scale` (`id`, `pay_commission_id`, `minimum`, `grade_pay`, `maximum`, `pay_name`, `entry_pay`) VALUES
(1, 1, '15000', '1500', '30000', 'PB-3', '25000'),
(3, 3, '25000', '10000', '50000', 'pb-5', '35000'),
(4, 6, '56', '56', '567', '56', '657'),
(5, 7, '56', '56', '567', '56', '657'),
(6, 9, '56', '5654', '567', '56', '657'),
(7, 4, '56', '5654', '567', '56', '657'),
(8, 10, '56', '5654', '567', '56', '65754'),
(9, 5, '5645', '5654', '567', '56', '65754'),
(10, 1, '56', '4', '65', '65', '65'),
(11, 1, '56', '4', '65', '65', '65'),
(12, 1, '56', '4', '65', '65', '65'),
(13, 1, '56', '456', '6565', '65', '65'),
(14, 1, '56657', '456', '6565', '65', '65'),
(15, 1, '5665745', '456', '6565', '65', '65'),
(16, 1, '456', '456', '6565', '65', '65'),
(17, 1, '4565', '456', '6565', '65', '65'),
(18, 1, '456578', '456', '6565', '65', '65'),
(19, 1, '5665745', '67', '769', '80', '435'),
(20, 1, '345', '45', '567', '67', '6578');

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
