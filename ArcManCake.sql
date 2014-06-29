-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 29, 2014 at 02:48 
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ArcManCake`
--

-- --------------------------------------------------------

--
-- Table structure for table `costumers`
--

CREATE TABLE IF NOT EXISTS `costumers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `notes` text,
  `phone` varchar(20) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `costumers`
--

INSERT INTO `costumers` (`id`, `name`, `surname`, `notes`, `phone`, `email`, `created`, `modified`, `user_id`) VALUES
(1, 'Stefan', 'Brakhane', '', '1234', 's@no.com', '2014-06-01', '2014-06-12', 1),
(3, 'Jonatan', 'Zopes', 'Joooooooooooooonatan', '4321', '', '2014-06-04', '2014-06-12', 2),
(5, 'Carla', 'Hallabrin', '^^', '666', 'nu@ha.com', '2014-06-16', '2014-06-16', 2),
(6, 'costum', 'a', 'for a', '456789', '', '2014-06-16', '2014-06-16', 4),
(7, 'costum ', 'a 2', 'aedf', '35', '', '2014-06-16', '2014-06-16', 4);

-- --------------------------------------------------------

--
-- Table structure for table `extras`
--

CREATE TABLE IF NOT EXISTS `extras` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` int(11) NOT NULL,
  `notes` text NOT NULL,
  `price` int(11) NOT NULL,
  `factorA` int(11) NOT NULL,
  `factorB` int(11) NOT NULL,
  `factorC` int(11) NOT NULL,
  `factorD` int(11) NOT NULL,
  `factorE` int(11) NOT NULL,
  `factorF` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `floorplans`
--

CREATE TABLE IF NOT EXISTS `floorplans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `house_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE IF NOT EXISTS `houses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `notes` text,
  `size` int(11) NOT NULL,
  `stores` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `name`, `notes`, `size`, `stores`, `type`, `price`, `created`, `modified`) VALUES
(1, 'Wayne''s Manor', 'Batcave not included', 300, 4, 3, 2000000, '2014-06-18', '2014-06-18'),
(2, 'Batcave', 'Wayne Manor requiered', 500, 2, 50, 2147483647, '2014-06-18', '2014-06-18');

-- --------------------------------------------------------

--
-- Table structure for table `i18n`
--

CREATE TABLE IF NOT EXISTS `i18n` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `locale` varchar(6) NOT NULL,
  `model` varchar(255) NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) NOT NULL,
  `content` text,
  PRIMARY KEY (`id`),
  KEY `locale` (`locale`),
  KEY `model` (`model`),
  KEY `row_id` (`foreign_key`),
  KEY `field` (`field`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lands`
--

CREATE TABLE IF NOT EXISTS `lands` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `notes` text NOT NULL,
  `price` int(11) NOT NULL,
  `costumer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE IF NOT EXISTS `proposals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `notes` text,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `costumer_id` int(11) NOT NULL,
  `land_id` int(11) NOT NULL,
  `house_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `proposals`
--

INSERT INTO `proposals` (`id`, `name`, `notes`, `created`, `modified`, `user_id`, `costumer_id`, `land_id`, `house_id`) VALUES
(7, 'Big House', 'For Stefan', '2014-06-15', '2014-06-15', 2, 1, 1, 1),
(8, 'Small house', 'For Jonatan', '2014-06-15', '2014-06-15', 2, 3, 2, 2),
(11, 'A sales proposal', '', '2014-06-16', '2014-06-16', 4, 6, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `role` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created`, `modified`, `role`) VALUES
(1, 'b4lrog', '0467e2ad120b7eba8d03de2f14152ee8ad29bdc1', '2014-06-01', '2014-06-12', 0),
(2, 'Ricardo', '3bdbc7fecbbed14dc303ef207f84b63dff5649fc', '2014-06-04', '2014-06-12', 0),
(3, '1234', '935dc0b6dcfaf42c9be2fa2b4b11ceeb59bf7492', '2014-06-12', '2014-06-12', 1),
(4, 'a', '23befc93ce658cead70bf62c2eb177fc3f42c2c9', '2014-06-12', '2014-06-12', 2),
(5, 'b', '5721e6c49c4039e4a78581633709b7ec3aeee276', '2014-06-12', '2014-06-12', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
