-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 17, 2013 at 04:41 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `addchit`
--

CREATE TABLE IF NOT EXISTS `addchit` (
  `cname` varchar(20) NOT NULL DEFAULT '',
  `cvalue` int(11) DEFAULT NULL,
  `jdate` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`cname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addchit`
--

INSERT INTO `addchit` (`cname`, `cvalue`, `jdate`) VALUES
('TQ', 7800, '02feb13');

-- --------------------------------------------------------

--
-- Table structure for table `chusers`
--

CREATE TABLE IF NOT EXISTS `chusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `prof` varchar(20) DEFAULT NULL,
  `mob1` int(12) DEFAULT NULL,
  `mob2` int(12) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `chusers`
--

INSERT INTO `chusers` (`id`, `name`, `prof`, `mob1`, `mob2`, `email`, `date`) VALUES
(6, 'SARA', 'ashokemp', 99987842, 2147483647, 'asa@gmail.com', '03feb13'),
(7, 'SAJ', 'Business', 456789, 123456, 'saw@gm.com', '03feb13');

-- --------------------------------------------------------

--
-- Table structure for table `delusers`
--

CREATE TABLE IF NOT EXISTS `delusers` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `prof` varchar(15) DEFAULT NULL,
  `mob1` varchar(13) DEFAULT NULL,
  `mob2` varchar(13) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delusers`
--


-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `user` varchar(25) DEFAULT NULL,
  `pwd` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user`, `pwd`) VALUES
('anandlic', '9443093469');

-- --------------------------------------------------------

--
-- Table structure for table `mchit`
--

CREATE TABLE IF NOT EXISTS `mchit` (
  `cname` varchar(40) DEFAULT NULL,
  `cvalue` int(11) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mchit`
--

INSERT INTO `mchit` (`cname`, `cvalue`, `date`) VALUES
('TQ', 7800, '02feb13');

-- --------------------------------------------------------

--
-- Table structure for table `selchits`
--

CREATE TABLE IF NOT EXISTS `selchits` (
  `id` int(11) NOT NULL,
  `cname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selchits`
--

INSERT INTO `selchits` (`id`, `cname`) VALUES
(6, 'TQ'),
(6, 'TQ'),
(6, 'TQ'),
(7, 'TQ');

-- --------------------------------------------------------

--
-- Table structure for table `trans`
--

CREATE TABLE IF NOT EXISTS `trans` (
  `id` int(11) DEFAULT NULL,
  `date` varchar(8) DEFAULT NULL,
  `method` varchar(7) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `cheque` int(11) DEFAULT NULL,
  `bank` varchar(40) DEFAULT NULL,
  `cdate` varchar(8) DEFAULT NULL,
  `act` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans`
--


-- --------------------------------------------------------

--
-- Table structure for table `transact`
--

CREATE TABLE IF NOT EXISTS `transact` (
  `id` int(11) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `ctotal` int(11) DEFAULT NULL,
  `intadd` int(11) DEFAULT '0',
  `intsub` int(11) DEFAULT '0',
  `star` int(11) DEFAULT '0',
  `lic` int(11) DEFAULT '0',
  `prev` int(11) DEFAULT '0',
  `total` int(11) DEFAULT '0',
  `newbal` int(11) DEFAULT '0',
  `mode` varchar(10) DEFAULT NULL,
  `account` varchar(15) DEFAULT NULL,
  `cno` varchar(20) DEFAULT NULL,
  `cdate` varchar(10) DEFAULT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `nchits` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT '0',
  `chitl` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transact`
--

INSERT INTO `transact` (`id`, `date`, `ctotal`, `intadd`, `intsub`, `star`, `lic`, `prev`, `total`, `newbal`, `mode`, `account`, `cno`, `cdate`, `bank`, `nchits`, `amount`, `chitl`) VALUES
(6, '05feb13', 23400, 0, 0, 0, 0, 22900, 22900, 17300, 'account', '7404ICICI', NULL, NULL, NULL, 3, 5600, ',TQ,TQ,TQ'),
(7, '01jan12', 7800, 435, 0, 45, 35, 48613, 48613, 48664, 'account', '3324ICICI', NULL, NULL, NULL, 1, 464, ',TQ');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) DEFAULT NULL,
  `prev` int(11) DEFAULT '0',
  `ind` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `prev`, `ind`) VALUES
(1, 0, 1),
(2, 0, 1),
(3, 500, 0),
(4, 0, 1),
(5, 0, 1),
(6, 16300, 0),
(7, 48664, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(14) DEFAULT NULL,
  `mobile1` varchar(12) DEFAULT NULL,
  `mobile2` varchar(12) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `fin` varchar(10) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL,
  `cheque` int(11) DEFAULT NULL,
  `bankname` varchar(80) DEFAULT NULL,
  `chequedate` varchar(10) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `date` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user`
--

