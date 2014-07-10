-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 10, 2014 at 08:22 
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
  `price` float NOT NULL,
  `factor` float NOT NULL,
  `extra_id` int(11) DEFAULT NULL,
  `proposal_id` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `bought_extras`
--

INSERT INTO `bought_extras` (`id`, `price`, `factor`, `extra_id`, `proposal_id`, `created`, `modified`) VALUES
(1, 100000, 1, 14, 2, '2014-07-04', '2014-07-04'),
(2, 765, 1, 15, 2, '2014-07-04', '2014-07-04'),
(3, 8765, 1, 13, 2, '2014-07-04', '2014-07-04'),
(5, 1050, 1, 17, 2, '2014-07-04', '2014-07-04'),
(6, 100, 1, 14, 3, '2014-07-05', '2014-07-05'),
(7, 1000, 1, 15, 3, '2014-07-05', '2014-07-05'),
(16, 345, 1, 33, 4, '2014-07-09', '2014-07-09'),
(20, 2234, 1, 17, 4, '2014-07-10', '2014-07-10'),
(21, 126, 1, 35, 4, '2014-07-10', '2014-07-10'),
(24, 0, 0, NULL, NULL, '2014-07-10', '2014-07-10'),
(25, 0, 0, NULL, NULL, '2014-07-10', '2014-07-10'),
(26, 0, 0, NULL, NULL, '2014-07-10', '2014-07-10'),
(27, 1000, 1, 13, 4, '2014-07-10', '2014-07-10'),
(28, 1050, 1, 14, 4, '2014-07-10', '2014-07-10'),
(30, 2000, 1, 15, 4, '2014-07-10', '2014-07-10');

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
  `default_price` float NOT NULL,
  `picture` varchar(200) NOT NULL,
  `bool_size_dependent` tinyint(1) NOT NULL,
  `bool_custom` tinyint(1) NOT NULL,
  `bool_external` tinyint(1) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `extras`
--

INSERT INTO `extras` (`id`, `name`, `description`, `default_price`, `picture`, `bool_size_dependent`, `bool_custom`, `bool_external`, `category_id`, `user_id`, `created`, `modified`) VALUES
(13, 'Cellar', 'Wet and dark', 1000, 'cellar.jpg', 0, 0, 0, 2, 3, '2014-07-02', '2014-07-02'),
(14, 'Jacuzzi', '^^', 1050, 'jacuzzi.jpg', 0, 0, 0, 2, 4, '2014-07-02', '2014-07-09'),
(15, 'Garden maze', 'Get lost!', 2000, 'maze.jpg', 0, 0, 1, 3, 4, '2014-07-02', '2014-07-09'),
(17, 'T-Rex', 'Rooooooooaarr', 1000, 'trex.jpg', 0, 0, 1, 6, 6, '2014-07-04', '2014-07-04'),
(31, 'Something boring', 'This tutorial is written for Django 1.6 and Python 2.x. If the Django version doesnâ€™t match, you can refer to the tutorial for your version of Django by using the version switcher at the bottom right corner of this page, or update Django to the newest version. If you are using Python 3.x, be aware that your code may need to differ from what is in the tutorial and you should continue using the tutorial only if you know what you are doing with Python 3.x.', 59, '', 0, 0, 0, 3, 6, '2014-07-09', '2014-07-09'),
(33, 'stupid custom extra', 'f your background is in plain old PHP (with no use of modern frameworks), youâ€™re probably used to putting code under the Web serverâ€™s document root (in a place such as /var/www). With Django, you donâ€™t do that. Itâ€™s not a good idea to put any of this Python code within your Web serverâ€™s document root, because it risks the possibility that people may be able to view your code over the Web. Thatâ€™s not good for security.', 345, '', 1, 1, 0, 1, 6, '2014-07-09', '2014-07-09'),
(35, 'Custom stupid external extra for Jose', 'Youâ€™ve started the Django development server, a lightweight Web server written purely in Python. Weâ€™ve included this with Django so you can develop things rapidly, without having to deal with configuring a production server â€“ such as Apache â€“ until youâ€™re ready for production.\r\n\r\nNowâ€™s a good time to note: Donâ€™t use this server in anything resembling a production environment. Itâ€™s intended only for use while developing. (Weâ€™re in the business of making Web frameworks, not Web servers.)', 126, '', 0, 1, 1, 4, 6, '2014-07-10', '2014-07-10');

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
  `size` float NOT NULL,
  `floors` int(11) NOT NULL,
  `price` float NOT NULL,
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
(3, 'Wayne''s Manor', 'Beautiful palace. For a long time it has been home for the illustrious Wayne familie\r\n\r\nNote: Batcave not included', 2000, 2, 1234570000, 2, 6, '2014-07-01', '2014-07-01'),
(4, 'Batcave', 'HQ of Batman\r\n\r\nNote: Waynes Manor not included', 1000, 2, 2147480000, 3, 3, '2014-07-01', '2014-07-01');

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
  `land_size` float NOT NULL,
  `land_price_per_m2` float NOT NULL,
  `dev_size` float NOT NULL,
  `dev_cost_per_m2` float NOT NULL,
  `notary_cost` float NOT NULL,
  `land_agent_cost` float NOT NULL,
  `land_tax` float NOT NULL,
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
(1, 'Terminus', 'Desertic, no natural resources', 40000000, 1, 888888, 2, 30, 20, 21, 0, 3, '2014-07-02', '2014-07-02'),
(2, 'Hyperion', 'Careful with the Shriek!', 2147480000, 3, 1234230, 2, 25, 23, 21, 0, 3, '2014-07-02', '2014-07-02'),
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
  `default_house_picture_id` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `proposals`
--

INSERT INTO `proposals` (`id`, `name`, `notes`, `customer_id`, `land_id`, `house_id`, `default_house_picture_id`, `user_id`, `created`, `modified`) VALUES
(2, 'Prop for cus b 1', '', 3, 4, 3, '', 4, '2014-07-04', '2014-07-04'),
(3, 'Prop for cus a 33', 'trfyhjkl;[', 1, 1, 4, '', 3, '2014-07-05', '2014-07-05'),
(4, 'Very expensive house', 'Tooooooooooooo expensive', 6, 4, 3, '10', 6, '2014-07-07', '2014-07-10'),
(5, 'Secret Lair', 'Cool', 6, 2, 4, '', 6, '2014-07-07', '2014-07-07'),
(6, 'Prop for cus a2: Cheap House', '', 2, 0, 0, '', 3, '2014-07-09', '2014-07-09');

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
