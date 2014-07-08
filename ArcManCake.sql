-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 08, 2014 at 10:11 
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
-- Table structure for table `bought_extras`
--

CREATE TABLE IF NOT EXISTS `bought_extras` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `price` int(11) NOT NULL,
  `factor` int(11) NOT NULL,
  `extra_id` int(11) DEFAULT NULL,
  `proposal_id` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `bought_extras`
--

INSERT INTO `bought_extras` (`id`, `price`, `factor`, `extra_id`, `proposal_id`, `created`, `modified`) VALUES
(1, 100000, 1, 14, 2, '2014-07-04', '2014-07-04'),
(2, 765, 1, 15, 2, '2014-07-04', '2014-07-04'),
(3, 8765, 1, 13, 2, '2014-07-04', '2014-07-04'),
(4, 3, 1, 16, 2, '2014-07-04', '2014-07-04'),
(5, 1050, 1, 17, 2, '2014-07-04', '2014-07-04'),
(6, 100, 1, 14, 3, '2014-07-05', '2014-07-05'),
(7, 1000, 1, 15, 3, '2014-07-05', '2014-07-05'),
(8, 1567, 2, 15, 4, '2014-07-08', '2014-07-08'),
(9, 478, 3, 14, 4, '2014-07-08', '2014-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `user_id`, `created`, `modified`) VALUES
(1, 'Kitchen', 3, '2014-07-02', '2014-07-02'),
(2, 'Lair', 3, '2014-07-02', '2014-07-02'),
(3, 'Office', 3, '2014-07-02', '2014-07-02'),
(4, 'Bedroom', 4, '2014-07-02', '2014-07-02'),
(5, 'Living room', 4, '2014-07-02', '2014-07-02'),
(6, 'Garden', 6, '2014-07-04', '2014-07-04');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `notes` text NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address1` varchar(200) NOT NULL,
  `address2` varchar(200) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `city` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `surname`, `notes`, `phone`, `email`, `address1`, `address2`, `zipcode`, `city`, `user_id`, `created`, `modified`) VALUES
(1, 'cus', 'a', '', 2147483647, 'dhf@kjaefh.com', '', '', 0, '', 3, '2014-07-01', '2014-07-01'),
(2, 'cus', 'a2', '', 1631728215, 'sfvn@jsn.com', '', '', 0, '', 3, '2014-07-01', '2014-07-01'),
(3, 'cus', 'b', '', 23456789, 'yasgevb@hgsjb.com', '', '', 0, '', 4, '2014-07-01', '2014-07-01'),
(4, 'cus', 'b2', '', 45689, 'akejnm@kand.com', '', '', 0, '', 4, '2014-07-01', '2014-07-01'),
(5, 'cus', 'own', 'Cus Own is cool', 679, 'sdjf@ikshf.com', 'sdfghj, 7', 'IAP', 45678, 'tutupa', 2, '2014-07-01', '2014-07-07'),
(6, 'Jose Carlos', 'Gallego', 'Penis!', 34567890, 'jcgallegof@gmail.com', 'Endenichalle, 76', '', 59115, 'Bonn', 6, '2014-07-07', '2014-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_type_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `all_day` tinyint(1) NOT NULL DEFAULT '1',
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Scheduled',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_type_id`, `title`, `details`, `start`, `end`, `all_day`, `status`, `active`, `created`, `modified`) VALUES
(1, 1, 'The boss is angry!', '', '2014-08-14 11:21:00', '2014-08-18 11:21:00', 1, 'Scheduled', 1, '2014-07-07', '2014-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `event_types`
--

CREATE TABLE IF NOT EXISTS `event_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `event_types`
--

INSERT INTO `event_types` (`id`, `name`, `color`) VALUES
(1, 'Meeting', 'Green'),
(2, 'Customer appointment', 'Blue');

-- --------------------------------------------------------

--
-- Table structure for table `extras`
--

CREATE TABLE IF NOT EXISTS `extras` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `default_price` int(11) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `bool_size_dependent` tinyint(1) NOT NULL,
  `bool_custom` tinyint(1) NOT NULL,
  `bool_external` tinyint(1) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `extras`
--

INSERT INTO `extras` (`id`, `name`, `description`, `default_price`, `picture`, `bool_size_dependent`, `bool_custom`, `bool_external`, `category_id`, `user_id`, `created`, `modified`) VALUES
(13, 'Cellar', 'Wet and dark', 1000, 'cellar.jpg', 0, 0, 0, 2, 3, '2014-07-02', '2014-07-02'),
(14, 'Jacuzzi', '^^', 1050, 'jacuzzi.jpg', 0, 1, 0, 2, 4, '2014-07-02', '2014-07-02'),
(15, 'Garden maze', 'Get lost!', 2000, 'maze.jpg', 0, 1, 1, 3, 4, '2014-07-02', '2014-07-02'),
(16, 'Something boring', 'Booooooooooooooring', 5, '', 0, 1, 0, 1, 4, '2014-07-04', '2014-07-04'),
(17, 'T-Rex', 'Rooooooooaarr', 1000, 'trex.jpg', 0, 0, 1, 6, 6, '2014-07-04', '2014-07-04');

-- --------------------------------------------------------

--
-- Table structure for table `home_pictures`
--

CREATE TABLE IF NOT EXISTS `home_pictures` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `picture` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `home_pictures`
--

INSERT INTO `home_pictures` (`id`, `picture`, `title`, `description`, `user_id`, `created`, `modified`) VALUES
(5, 'home3.jpg', 'Gugen', 'Bilbao', 4, '2014-07-02', '2014-07-02'),
(7, 'home2.jpg', 'weird house', 'lkdvn', 4, '2014-07-02', '2014-07-02'),
(9, 'home1.png', 'Gehry something', 'png yes!', 4, '2014-07-02', '2014-07-02');

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE IF NOT EXISTS `houses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `size` int(11) NOT NULL,
  `floors` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `name`, `description`, `size`, `floors`, `price`, `type`, `user_id`, `created`, `modified`) VALUES
(3, 'Wayne''s Manor', 'Beautiful palace. For a long time it has been home for the illustrious Wayne familie\r\n\r\nNote: Batcave not included', 2000, 2, 1234567890, 2, 6, '2014-07-01', '2014-07-01'),
(4, 'Batcave', 'HQ of Batman\r\n\r\nNote: Waynes Manor not included', 1000, 2, 2147483647, 3, 3, '2014-07-01', '2014-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `house_pictures`
--

CREATE TABLE IF NOT EXISTS `house_pictures` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(200) NOT NULL,
  `type_flag` int(11) NOT NULL,
  `house_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `house_pictures`
--

INSERT INTO `house_pictures` (`id`, `name`, `description`, `picture`, `type_flag`, `house_id`, `user_id`, `created`, `modified`) VALUES
(7, 'Bat', 'sdnj', 'batcave.jpg', 0, 4, 2, '2014-07-03', '2014-07-03'),
(8, 'Batcave entry', 'sefsf', 'batcave2.jpg', 0, 4, 2, '2014-07-03', '2014-07-03'),
(9, 'pool', 'ksjdfnsn', 'cool.jpg', 0, 3, 2, '2014-07-03', '2014-07-03'),
(10, 'Front', 'sdgfgdfrgdf', 'wayne.jpg', 0, 3, 2, '2014-07-03', '2014-07-03'),
(11, 'first-floor', '', 'floorplan1-wayneManor.jpg', 2, 3, 6, '2014-07-07', '2014-07-07'),
(12, 'Basement', 'thbgvfc', 'basement manor.jpg', -1, 3, 6, '2014-07-07', '2014-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `lands`
--

CREATE TABLE IF NOT EXISTS `lands` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `notes` text NOT NULL,
  `land_size` int(11) NOT NULL,
  `land_price_per_m2` int(11) NOT NULL,
  `dev_size` int(11) NOT NULL,
  `dev_cost_per_m2` int(11) NOT NULL,
  `notary_cost` int(11) NOT NULL,
  `land_agent_cost` int(11) NOT NULL,
  `land_tax` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `lands`
--

INSERT INTO `lands` (`id`, `name`, `notes`, `land_size`, `land_price_per_m2`, `dev_size`, `dev_cost_per_m2`, `notary_cost`, `land_agent_cost`, `land_tax`, `customer_id`, `user_id`, `created`, `modified`) VALUES
(1, 'Terminus', 'Desertic, no natural resources', 39999999, 1, 888888, 2, 30, 20, 21, 0, 3, '2014-07-02', '2014-07-02'),
(2, 'Hyperion', 'Careful with the Shriek!', 2147483647, 3, 1234234, 2, 25, 23, 21, 0, 3, '2014-07-02', '2014-07-02'),
(4, 'Alderaan', 'Set your house on an asteroid!', 3000, 1, 600, 30, 1, 1, 0, 0, 3, '2014-07-02', '2014-07-02'),
(5, 'land for cus a2', '', 234, 120, 123, 123, 2, 3, 21, 2, 3, '2014-07-02', '2014-07-02'),
(6, 'land cus b', '', 4567, 456789, 5678, 5678, 5, 6, 21, 3, 4, '2014-07-04', '2014-07-04'),
(7, 'land cus b2', '', 5678, 567, 567, 5678, 3, 7, 21, 4, 4, '2014-07-04', '2014-07-04');

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE IF NOT EXISTS `proposals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `notes` text NOT NULL,
  `customer_id` int(11) NOT NULL,
  `land_id` int(11) NOT NULL,
  `house_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `proposals`
--

INSERT INTO `proposals` (`id`, `name`, `notes`, `customer_id`, `land_id`, `house_id`, `user_id`, `created`, `modified`) VALUES
(2, 'Prop for cus b 1', '', 3, 4, 3, 4, '2014-07-04', '2014-07-04'),
(3, 'Prop for cus a 33', 'trfyhjkl;[', 1, 1, 4, 3, '2014-07-05', '2014-07-05'),
(4, 'Very expensive house', 'Tooooooooooooo expensive', 6, 1, 3, 6, '2014-07-07', '2014-07-07'),
(5, 'Secret Lair', 'Cool', 6, 2, 4, 6, '2014-07-07', '2014-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `name`, `surname`, `phone`, `email`, `created`, `modified`) VALUES
(2, 'owner', '046d8cbb16e26dba35ddced9d4daa7b84468ef19', 1, 'O', 'wner', 1234689, 'ra@sfh.com', '2014-07-01', '2014-07-01'),
(3, 'salea', '5a03b6bf4af5c6a37fdc095fd22269d415cc3943', 2, 'sale', 'a', 3467890, 'fghjkl@ghjk.de', '2014-07-01', '2014-07-01'),
(4, 'saleb', '0afabdee6502c9fcefea4332883535d6e5c50cc0', 2, 'sale', 'b', 234567890, 'dfghjkl@dfghjkl.es', '2014-07-01', '2014-07-01'),
(5, 'over', '6d0d62f180b14912b182b45e49fe55fbab9be1b6', 3, 'ov', 'er', 9876543, 'vjnhwhoiu@asuhcn.cad', '2014-07-01', '2014-07-01'),
(6, 'elgatil', '3bdbc7fecbbed14dc303ef207f84b63dff5649fc', 0, 'Ricardo', 'Gomez', 345678, 'elgatil@gmail.com', '2014-07-01', '2014-07-01');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
