-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 28, 2014 at 04:07 
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
  `comment` text,
  `extra_id` int(11) DEFAULT NULL,
  `proposal_id` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `bought_extras`
--

INSERT INTO `bought_extras` (`id`, `price`, `factor`, `comment`, `extra_id`, `proposal_id`, `created`, `modified`) VALUES
(25, 5000, 1, NULL, 105, 4, '2014-08-23', '2014-08-23'),
(26, 3000, 1, NULL, 107, 4, '2014-08-23', '2014-08-23'),
(27, 5000, 1, NULL, 108, 4, '2014-08-23', '2014-08-23'),
(28, 5000, 1, NULL, 109, 4, '2014-08-23', '2014-08-23'),
(29, 8000, 1, NULL, 110, 4, '2014-08-23', '2014-08-23'),
(30, 9000, 1, NULL, 111, 4, '2014-08-23', '2014-08-23'),
(31, 1000, 1, NULL, 112, 4, '2014-08-23', '2014-08-23'),
(32, 4400, 1, NULL, 113, 4, '2014-08-23', '2014-08-23'),
(38, 50, 1, '', 2, 4, '2014-09-20', '2014-09-26'),
(43, 58, 1, NULL, 41, 4, '2014-09-21', '2014-09-21'),
(44, 90, 20, '', 53, 4, '2014-09-22', '2014-09-22'),
(49, 52, 1, NULL, 21, 4, '2014-09-26', '2014-09-26'),
(50, 5000, 1, NULL, 105, 5, '2014-09-28', '2014-09-28'),
(51, 3000, 1, NULL, 107, 5, '2014-09-28', '2014-09-28'),
(52, 5000, 1, NULL, 108, 5, '2014-09-28', '2014-09-28'),
(53, 5000, 1, NULL, 109, 5, '2014-09-28', '2014-09-28'),
(54, 8000, 0, NULL, 110, 5, '2014-09-28', '2014-09-28'),
(55, 9000, 1, NULL, 111, 5, '2014-09-28', '2014-09-28'),
(56, 1000, 1, NULL, 112, 5, '2014-09-28', '2014-09-28'),
(57, 4400, 1, NULL, 113, 5, '2014-09-28', '2014-09-28'),
(58, 50, 1, NULL, 2, 5, '2014-09-28', '2014-09-28'),
(59, 8600, 1, NULL, 25, 5, '2014-09-28', '2014-09-28'),
(60, 650, 1, NULL, 42, 5, '2014-09-28', '2014-09-28'),
(61, 8900, 1, NULL, 52, 5, '2014-09-28', '2014-09-28'),
(62, 1050, 1, NULL, 123, 5, '2014-09-28', '2014-09-28'),
(63, 1790, 1, NULL, 124, 5, '2014-09-28', '2014-09-28'),
(64, 700, 1, NULL, 71, 5, '2014-09-28', '2014-09-28'),
(65, 1080, 1, NULL, 11, 5, '2014-09-28', '2014-09-28'),
(66, 999, 1, NULL, 129, 5, '2014-09-28', '2014-09-28'),
(67, 5000, 1, NULL, 105, 6, '2014-09-28', '2014-09-28'),
(68, 3000, 1, NULL, 107, 6, '2014-09-28', '2014-09-28'),
(69, 5000, 1, NULL, 108, 6, '2014-09-28', '2014-09-28'),
(70, 5000, 1, NULL, 109, 6, '2014-09-28', '2014-09-28'),
(71, 8000, 1, NULL, 110, 6, '2014-09-28', '2014-09-28'),
(72, 9000, 1, NULL, 111, 6, '2014-09-28', '2014-09-28'),
(73, 1000, 1, NULL, 112, 6, '2014-09-28', '2014-09-28'),
(74, 4400, 1, NULL, 113, 6, '2014-09-28', '2014-09-28');

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
(2, 'AuÃŸen', 2, '2014-08-22', '2014-08-22'),
(3, 'Keller', 2, '2014-08-22', '2014-08-22'),
(4, 'Innen', 2, '2014-08-22', '2014-08-22'),
(5, 'Technik', 2, '2014-08-22', '2014-08-22'),
(6, 'External', 2, '2014-08-23', '2014-08-23');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `notes` text NOT NULL,
  `phone_private` varchar(20) NOT NULL,
  `phone_work` varchar(20) DEFAULT NULL,
  `birthday` date NOT NULL,
  `email` varchar(200) NOT NULL,
  `address1` varchar(200) NOT NULL,
  `address2` varchar(200) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `city` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `2nd_name` varchar(200) NOT NULL,
  `2nd_surname` varchar(200) NOT NULL,
  `2nd_maiden_surname` varchar(200) NOT NULL,
  `2nd_birthday` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `surname`, `notes`, `phone_private`, `phone_work`, `birthday`, `email`, `address1`, `address2`, `zipcode`, `city`, `user_id`, `created`, `modified`, `2nd_name`, `2nd_surname`, `2nd_maiden_surname`, `2nd_birthday`) VALUES
(6, 'Jose Carlos', 'Gallego', 'this are additional notes this are additional notes this are additional notes this are additional notes', '34567890', '12345', '1983-04-07', 'jcgallegof@gmail.com', 'Endenichalle, 76', '', 59115, 'Bonn', 6, '2014-07-07', '2014-08-23', 'Lucy', 'Paulet', '', '1981-07-16');

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
  `user_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_type_id`, `title`, `details`, `start`, `end`, `all_day`, `status`, `active`, `user_id`, `created`, `modified`) VALUES
(21, 1, 'Beispieltermin fÃ¼r ein Meeting', 'Nutzen Sie diesen Text fÃ¼r zusÃ¤tzliche Informationen', '2014-10-10 14:15:00', '2014-10-10 15:15:00', 0, 'Scheduled', 1, 6, '2014-09-28', '2014-09-28'),
(23, 4, 'Beispieltermin fÃ¼r eine Besichtigung des Bauvorhabens', 'Nutzen Sie diesen Text fÃ¼r zusÃ¤tzliche Informationen', '2014-10-09 10:17:00', '2014-10-09 14:17:00', 1, 'Scheduled', 1, 6, '2014-09-28', '2014-09-28'),
(22, 3, 'Beispieltermin fÃ¼r einen Kundentermin', 'Nutzen Sie diesen Text fÃ¼r zusÃ¤tzliche Informationen', '2014-10-10 10:16:00', '2014-10-10 12:16:00', 0, 'Scheduled', 1, 6, '2014-09-28', '2014-09-28');

-- --------------------------------------------------------

--
-- Table structure for table `event_types`
--

CREATE TABLE IF NOT EXISTS `event_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `event_types`
--

INSERT INTO `event_types` (`id`, `name`, `color`) VALUES
(1, 'Meeting', 'Red'),
(3, 'Kundentermin', 'Green'),
(4, 'Besichtigung des Bauvorhabens', 'Blue');

-- --------------------------------------------------------

--
-- Table structure for table `extras`
--

CREATE TABLE IF NOT EXISTS `extras` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `default_priceA` float NOT NULL,
  `default_priceB` float NOT NULL,
  `default_priceC` float NOT NULL,
  `units` int(11) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `size_dependent_flag` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `depends_on` int(11) NOT NULL,
  `depends_on_house` int(11) NOT NULL,
  `bool_unique` tinyint(1) NOT NULL,
  `bool_uneditable` tinyint(1) NOT NULL,
  `bool_custom` tinyint(1) NOT NULL,
  `bool_external` tinyint(1) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=130 ;

--
-- Dumping data for table `extras`
--

INSERT INTO `extras` (`id`, `name`, `description`, `default_priceA`, `default_priceB`, `default_priceC`, `units`, `picture`, `size_dependent_flag`, `type`, `depends_on`, `depends_on_house`, `bool_unique`, `bool_uneditable`, `bool_custom`, `bool_external`, `category_id`, `user_id`, `created`, `modified`) VALUES
(2, 'Dachneigung um 5Â° Ã¤ndern', 'Die Dachneigung wird angepasst. Die Dachneigung wird auf Wunsch um 5Â° verÃ¤ndert. Es kÃ¶nnen sich VerÃ¤nderungen der WohnflÃ¤che ergeben. GewÃ¼nschte Dachneigung 5Â° Die Trauf- und FirsthÃ¶hen werden entsprechend angepasst.	', 50, 50, 50, 0, '', -1, 0, 0, 0, 1, 0, 0, 0, 2, 2, '2014-08-22', '2014-09-27'),
(3, 'DrempelerhÃ¶hung um 50 cm', 'Im ausgebauten Dachgeschoss des Wohnhauses wird der Kniestock um 50 cm gemÃ¤ÃŸ Bau und\r\nLeistungsbeschreibung erhÃ¶ht. Die Dachneigung bleibt unverÃ¤ndert. Die Trauf-und FirsthÃ¶hen erhÃ¶hen sich um jeweils 50 cm.  Eventuell vorhandene DachflÃ¤chenfenster sind anzupassen.\r\nDurch die ErhÃ¶hung des Kniestockes vergrÃ¶ÃŸert sich die WohnflÃ¤che im Dachgeschoss.', 84, 84, 84, 0, '', -1, 0, 0, 0, 1, 0, 0, 0, 2, 2, '2014-08-22', '2014-09-27'),
(7, 'Giebelseitigen DachÃ¼berstand auf ca. 50 cm vergrÃ¶ÃŸern', 'Der DachÃ¼berstand wird an allen Giebelseiten, einschlieÃŸlich Zwerchgiegel auf jeweils 50 cm verlÃ¤ngert. Der DachÃ¼berstand erhÃ¤lt auf jeder Giebelseite sichtbare PfettenkÃ¶pfe und einen Flugsparren. Die AusfÃ¼hrung entspricht der Bau- und Leistungsbeschreibung. ', 50, 70, 90, 0, '', -1, 0, 0, 0, 1, 0, 0, 0, 2, 2, '2014-08-22', '2014-09-27'),
(9, 'Flachdachgaube statt einer Stadtgaube', 'Die Gaube wird als Flachdachgaube ausgefÃ¼hrt. Die Dacheindeckung erfolgt als Doppelstehfalzdeckung mit Titanzinkblech. Die Unterkonstruktion wird mit einer Vollholzschalung und einer diffusionsoffenen Trennlage ausgefÃ¼hrt. Die Dachrinnen und Fallrohre sind witterungsbestÃ¤ndig in Titanzink ausgefÃ¼hrt. \r\nDie Fenster werden gemÃ¤ÃŸ Â§ 15 Bau- und Leistungsbeschreibung und nachfolgender Zeichnung ausgefÃ¼hrt.\r\nDie bodentiefen Fenster im Dachgeschoss erhalten ein GelÃ¤nder aus verzinktem Stahl entsprechend Zeichnung. ', 3050, 3050, 3050, 0, '', 0, 0, 0, 0, 1, 0, 0, 0, 2, 2, '2014-08-22', '2014-08-22'),
(10, 'Fenster und HaustÃ¼r in Sonderfarbe', 'Es werden die Kunststoff- Fenster (auÃŸer DachflÃ¤chenfenster) und die Kunststoff- HaustÃ¼r mit der auÃŸenseitigen OberflÃ¤chenfarbe nach Wahl des Auftraggebers gemÃ¤ÃŸ Standard- Farbkarte des Fensterherstellers eingebaut. Die rauminnenseitige Rahmenfarbe ist weiÃŸ. Die AusfÃ¼hrung der AuÃŸen- und Innenseiten in der gleichen Sonderfarbe wird mit einem Aufschlag berechnet.', 1900, 2700, 3700, 0, '', 0, 0, 0, 0, 1, 0, 0, 0, 2, 2, '2014-08-22', '2014-08-22'),
(11, 'ZusÃ¤tzliches Fenster', 'ZusÃ¤tzliche Fenster, Abmessung 1,00 x 1,375 m (B x H), AusfÃ¼hrung gemÃ¤ÃŸ Bau- und Leistungsbeschreibung. Die Lage der zusÃ¤tzlichen Fenster sind in die Zeichnungen einzufÃ¼gen. Die endgÃ¼ltige Anordnung der Fenster erfolgt durch den Auftragnehmer im Rahmen der Zeichnungen fÃ¼r das Baugesuch. Die Anordnung muss statisch mÃ¶glich sein. ', 1080, 1080, 1080, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 2, 2, '2014-08-22', '2014-09-27'),
(12, 'ZusÃ¤tzliche FenstertÃ¼r im EG', 'ZusÃ¤tzliche FenstertÃ¼r im Erdgeschoss, Abmessung 1,00 x 2,395 m (B x H), AusfÃ¼hrung gemÃ¤ÃŸ Bau- und Leistungsbeschreibung. Die Lage der zusÃ¤tzlichen FenstertÃ¼ren sind in die Zeichnungen einzufÃ¼gen. Die endgÃ¼ltige Anordnung der Fenster erfolgt durch den Auftragnehmer im Rahmen der Zeichnungen fÃ¼r das Baugesuch. Die Anordnung muss statisch mÃ¶glich sein. ', 1570, 1570, 1570, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 2, 2, '2014-08-22', '2014-09-27'),
(13, 'ZusÃ¤tzliche FenstertÃ¼r im EG statt Fenster  100 x 137,5 cm  ', 'Ersatz vorhandener Fenster im Erdgeschoss durch bodentiefe FenstertÃ¼ren, Breite entsprechend Fenster, HÃ¶he bis Unterkante Sturz, AusfÃ¼hrung gemÃ¤ÃŸ Bau- und Leistungsbeschreibung. \r\nDie endgÃ¼ltige Anordnung der FenstertÃ¼ren erfolgt durch den Auftragnehmer im Rahmen der Zeichnungen fÃ¼r das Baugesuch.\r\n', 870, 870, 870, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 2, 2, '2014-08-22', '2014-09-27'),
(14, 'ZusÃ¤tzliche FenstertÃ¼r im OG statt Fenster  100 x 137,5 cm   ', 'Ersatz vorhandener Fenster durch bodentiefe FenstertÃ¼ren im Obergeschoss, Breite entsprechend Fenster, HÃ¶he bis Unterkante Sturz, AusfÃ¼hrung gemÃ¤ÃŸ Bau- und Leistungsbeschreibung. \r\nDie GelÃ¤nder an den FenstertÃ¼ren werden aus verzinktem Stahl entsprechend Zeichnung hergestellt.\r\nDie endgÃ¼ltige Anordnung der FenstertÃ¼ren erfolgt durch den Auftragnehmer im Rahmen der Zeichnungen fÃ¼r das Baugesuch.  ', 970, 970, 970, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 2, 2, '2014-08-22', '2014-09-27'),
(15, 'ZusÃ¤tzliches DachflÃ¤chenfenster ', 'ZusÃ¤tzliches Kunststoff-DachflÃ¤chenfenster (Hersteller Roto / Typ -Hoch-Schwingfenster, WDF R7.K, GrÃ¶ÃŸe 7/11 oder gleichwertig nach Wahl des Auftragnehmers gemÃ¤ÃŸ Â§ 15, "Sonstiges"), Farbe: weiÃŸ; mit 2-Scheiben-WÃ¤rmeschutzverglasung (Uw = 1,3 W/mÂ²K). Das FensterauÃŸenmaÃŸ betrÃ¤gt ca. 740 x 1180 mm. Die endgÃ¼ltige Anordnung des DachflÃ¤chenfensters erfolgt durch den Auftragnehmer im Rahmen der Zeichnungen fÃ¼r das Baugesuch. FÃ¼r die Verschattung des DachflÃ¤chenfensters wird das Aussenrollo Screen (System Roto oder gleichwertig nach Wahl des Auftragnehmers gemÃ¤ÃŸ Â§ 15, "Sonstiges") eingebaut. Das Aussenrolllo besteht aus kunststoffbeschichteten Glasfasergewebe. Mit einem Bedienstab kann das Rollo in der Putzstellung bequem Ã¼ber Ã–sen eingehÃ¤ngt werden.   ', 1490, 1490, 1490, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 2, 2, '2014-08-22', '2014-09-27'),
(16, 'Sicherheits-Paket', 'Das Sicherheits-Paket umfasst folgende Leistungen: \r\n-Einbruchhemmendes Sicherheitsglas P2A, Ã¤uÃŸere Scheibe 9 mm stark, in den Fenstern und FenstertÃ¼ren im Erdgeschoss. \r\n-GeprÃ¼fter Sicherheitsbeschlag AHS (Aushebelschutz) an den Fenstern und FenstertÃ¼ren im Erdgeschoss \r\n-AbschlieÃŸbare Griff-Oliven an den Fenstern und FenstertÃ¼ren im Erdgeschoss. \r\n-HaustÃ¼r: 3-fach Verriegelung mit Haken, VSG-Verglasung. Bei der Wahl von farbigen Fenstern wird die HaustÃ¼r der Fensterfarbe angepasst. \r\n', 2500, 3500, 4500, 0, '', 0, 0, 0, 0, 1, 0, 0, 0, 2, 2, '2014-08-22', '2014-08-22'),
(17, 'Elektromotoren fÃ¼r Rollopanzer ', 'Der Rollladen wird anstelle des schwenkbaren Gurtwicklers oder des Kurbelwicklers mit einer Elektro- Motorbedienung inkl. eines Wandschalters eingebaut. ', 400, 400, 400, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 2, 2, '2014-08-22', '2014-09-27'),
(18, 'HaustÃ¼r in SonderausfÃ¼hrung', 'Es wird eine HaustÃ¼r mit FÃ¼llung eingebaut. Der Auftraggeber hat die Wahl zwischen gleichwertigen HaustÃ¼ren gemÃ¤ÃŸ Bemusterungskatalog des Herstellers. Diese bestehen aus Kunststoff in der Farbe weiÃŸ und sind teilverglast. \r\nBei der Wahl von farbigen Fenstern wird die HaustÃ¼r der Fensterfarbe angepasst.', 990, 990, 990, 0, '', 0, 0, 0, 0, 1, 0, 0, 0, 2, 2, '2014-08-22', '2014-08-22'),
(19, 'Eingangsnische', 'Eingangsnische ca. 60 cm tief, ca. 137 cm breit als Wetterschutz', 990, 990, 990, 0, '', 0, 0, 0, 0, 1, 0, 0, 0, 2, 2, '2014-08-22', '2014-08-22'),
(20, 'Schornstein ab EG', 'EinzÃ¼giger Luft- Abgas- Schornstein mit externer Verbrennungsluftzufuhr fÃ¼r FeuerstÃ¤tten mit festen Brennstoffen in raumluftunabhÃ¤ngiger Betriebsweise, System: KAMTEC LAS-W oder gleichwertig nach Wahl des Auftragnehmers gemÃ¤ÃŸ Â§ 15, "Sonstiges", bestehend aus komplett gedÃ¤mmten Mantelsteinen. Die Lage ist den Grundrissen zu entnehmen. Der Schornstein, Ã¸ 18 cm, AuÃŸenmaÃŸ ca. 42 x 42 cm, wird vom Erdgeschoss bis Ã¼ber Dach gefÃ¼hrt. \r\nDer Schornsteinkopf ist verschiefert (Kunstschiefer). Die Dachausstiegsluke und benÃ¶tigte Trittroste sind im Preis enthalten. \r\nDie Lage und HÃ¶he des Schornsteines kann nach den Vorgaben des Bundes- Immissionsschutzgesetzes in Zusammenwirken mit der umgebenden Bebauung variieren. \r\nDie Kalkulation des Schornsteinpreises beruht auf folgenden Voraussetzungen: \r\nDer Schornstein wird 2,30 m Ã¼ber die DachflÃ¤che bzw. 40 cm Ã¼ber First gefÃ¼hrt. \r\nDie Oberkanten von LÃ¼ftungsÃ¶ffnungen, Fenster- und TÃ¼rÃ¶ffnungen der umgebenden Bebauung im Umkreis von 15 m liegen mindestens 1,0 m unterhalb der AustrittsÃ¶ffnung des Schornsteines. \r\nSind diese Voraussetzungen nicht erfÃ¼llt, hat der Auftragnehmer gegen den Auftraggeber einen Anspruch auf VergÃ¼tung der (hieraus bedingten) Mehraufwendungen.\r\n', 6540, 6540, 6540, 0, '', 0, 0, 0, 0, 1, 0, 0, 0, 2, 2, '2014-08-22', '2014-08-22'),
(21, 'AuÃŸenwand Porenbeton 30 cm dick', 'Die AuÃŸenwÃ¤nde werden aus Porenbetonmauerwerk mit einer WandstÃ¤rke von 30 cm ausgefÃ¼hrt. Die AuÃŸenabmessungen des Hauses vergrÃ¶ÃŸern sich entsprechend. Der DachÃ¼berstand bleibt erhalten (z.B. beim Standardhaus Traufe 50 cm, Giebel 20 cm). ', 52, 70, 90, 0, '', -1, 0, 0, 0, 1, 0, 0, 0, 2, 2, '2014-08-22', '2014-09-27'),
(22, 'AuÃŸenwand Porenbeton 36,5 cm dick', 'Die AuÃŸenwÃ¤nde werden aus Porenbetonmauerwerk mit einer WandstÃ¤rke von 36,5 cm ausgefÃ¼hrt. Die AuÃŸenabmessungen des Hauses vergrÃ¶ÃŸern sich entsprechend. Der DachÃ¼berstand bleibt erhalten (z.B. beim Standardhaus Traufe 50 cm, Giebel 20 cm). ', 100, 136, 160, 0, '', -1, 0, 0, 0, 1, 0, 0, 0, 2, 2, '2014-08-22', '2014-09-27'),
(23, 'KfW-70 Standard erfÃ¼llt', 'Zwischen den Sparren und Kehlbalken im ausgebauten Bereich des Dachgeschosses wird eine 24 cm dicke MineralwolledÃ¤mmung WLG 035 vorgesehen. \r\nUnterhalb der Sparren bzw. Kehlbalken wird eine 5cm starke UntersparrendÃ¤mmung WLG 035 eingebaut. \r\nDie DÃ¤mmung im ausgebauten Bereich des Dachgeschosses gemÃ¤ÃŸ Â§ 12, Bau- und Leistungsbeschreibung entfÃ¤llt. \r\nAuf den gemauerten AuÃŸenwÃ¤nden wird eine WÃ¤rmedÃ¤mmfassade bestehend aus 12 cm dicken Hartschaumplatten mindestens WLG 040, mehrlagigem Putz mit Vliesarmierung und Deckputz, KÃ¶rnung 2-3 mm vorgesehen. Der Farbton wird gemeinsam vor Baubeginn nach Farbkarte des Auftragnehmers festgelegt. Im Bereich des Sockels kommen spezielle SockeldÃ¤mmplatten zur Anwendung. \r\nBei gleichzeitiger Wahl der Sonderausstattung Verblendmauerwerk wird die FassadendÃ¤mmung als KerndÃ¤mmung gegen Aufpreis ausgefÃ¼hrt. \r\nDie AuÃŸenabmessungen des Hauses vergrÃ¶ÃŸern sich entsprechend. Die sichtbaren DachÃ¼berstÃ¤nde verringern sich um das MaÃŸ des WÃ¤rmedÃ¤mmverbundsystems. \r\nBei gleichzeitiger Wahl der Sonderausstattung AuÃŸenwand Porenbeton 30 oder 36,5 cm vergrÃ¶ÃŸern sich die AuÃŸenabmessungen zusÃ¤tzlich zu denen des gewÃ¤hlten Bausystems. \r\nDer AuÃŸenputz gemÃ¤ÃŸ Â§ 15, Bau- und Leistungsbeschreibung entfÃ¤llt.', 80, 100, 120, 0, '', -2, 0, 0, 0, 1, 0, 0, 0, 2, 2, '2014-08-22', '2014-09-27'),
(24, 'KfW-55 Standard erfÃ¼llt', 'DÃ¤mmung unter Bodenplatte: \r\nUm WÃ¤rmebrÃ¼cken zu vermeiden wird ganzflÃ¤chig unterhalb der Bodenplatte eine 5 cm starke DÃ¤mmung aus Styrodur C Hartschaumplatten WLG 035, auf einem Feinplanum eingebaut und mit einer PE- Folie als Schutzschicht abgedeckt.\r\nUnterhalb der DÃ¤mmung wird ein Ringerder aus Edelstahl vorgesehen.\r\nDer Banderder gemÃ¤ÃŸ Bau-und Leistungsbeschreibung entfÃ¤llt. \r\nBei gleichzeitiger Wahl eines Kellers entfÃ¤llt die DÃ¤mmung unterhalb der Bodenplatte, stattdessen wird bis auf den Kellervorraumeine 5 cm starke DÃ¤mmung unterhalb der Kellerdecke vorgesehen. \r\n12 cm FassadendÃ¤mmung: \r\nAuf den gemauerten AuÃŸenwÃ¤nden wird eine WÃ¤rmedÃ¤mmfassade bestehend aus 12 cm dicken Hartschaumplatten mindestens WLG 040, mehrlagigem Putz mit Vliesarmierung und Deckputz, KÃ¶rnung 2-3 mm vorgesehen. Der Farbton wird gemeinsam vor Baubeginn nach Farbkarte des Auftragnehmers festgelegt. Im Bereich des Sockels kommen spezielle SockeldÃ¤mmplatten zur Anwendung. \r\nDie GesamtauÃŸenwandstÃ¤rke betrÃ¤gt ca. 36 cm. Die AuÃŸenabmessungen des Hauses vergrÃ¶ÃŸern sich entsprechend. Die sichtbaren DachÃ¼berstÃ¤nde verringern sich um das MaÃŸ des WÃ¤rmedÃ¤mmverbundsystems. \r\nBei gleichzeitiger Wahl der Sonderausstattung Verblendmauerwerk wird die FassadendÃ¤mmung als KerndÃ¤mmung ausgefÃ¼hrt. \r\nDachdÃ¤mmung: \r\nZwischen den Sparren und Kehlbalken im ausgebauten Bereich des Dachgeschosses wird eine 24 cm dicke MineralwolledÃ¤mmung WLG 035 vorgesehen. \r\nUm die DÃ¤mmwirkung im Dachbereich zu optimieren, wird eine zusÃ¤tzliche UntersparrendÃ¤mmung aus Mineralwolle WLG 035 StÃ¤rke 5 cm eingebaut. \r\nDer AuÃŸenputz, sowie die DÃ¤mmung im ausgebauten Bereich des Dachgeschosses gemÃ¤ÃŸ Â§ 12, Bau- und Leistungsbeschreibung entfallen.\r\nKontrollierte dezentrale WohnungslÃ¼ftung mit WÃ¤rmerÃ¼ckgewinnung:\r\nJe Wohnung werden vorwiegend in den AufenthaltsrÃ¤umen wie Wohnzimmer, Kinderzimmer, GÃ¤stezimmer und Schlafzimmer mindestens vier WÃ¤rmerÃ¼ckgewinnungsgerÃ¤te, System LUNOS eÂ² (oder gleichwertig nach Wahl des Auftragnehmers gemÃ¤ÃŸ Â§12, "Sonstiges") in der AuÃŸenwand gemÃ¤ÃŸ LÃ¼ftungsplanung vorgesehen. Die dezentralen WÃ¤rmerÃ¼ckgewinnungsgerÃ¤te arbeiten nach dem Prinzip des regenerativen WÃ¤rmetausches. Der innerhalb der WÃ¤rmerÃ¼ckgewinnungsgerÃ¤te befindliche WÃ¤rmespeicher aus einem Keramik-Verbundwerkstoff lÃ¤dt sich durch den Luftstrom des Ventilators mit der WÃ¤rmeenergie der Raumluft auf und gibt sie an die zugefÃ¼hrte AuÃŸenluft wieder ab. \r\nDie WÃ¤rmerÃ¼ckgewinnungsgerÃ¤te werden zentral Ã¼ber mindestens einen 12V Trafo inkl. Steuerelektronik gesteuert. Die Zentralsteuerung wird dabei in Unterputzdosen vorgesehen. \r\nAus den AbluftrÃ¤umen wie KÃ¼che, GÃ¤ste-WC, Badezimmer oder Hausanschlussraum wird die Abluft gemÃ¤ÃŸ LÃ¼ftungsplanung je Wohnung mit mindestens einem schaltbaren AbluftgerÃ¤t zum Wandeinbau, Ãœber-Dach-LÃ¼ftern oder ÃœberstrÃ¶mluftdurchlÃ¤ssen abgesaugt. \r\nAuÃŸenseitig werden sowohl die wandeingebauten AbluftgerÃ¤te als auch die WÃ¤rmerÃ¼ckgewinnungsgerÃ¤te mit einem schlagregendichten Wetterschutzgitter mit Insektenschutz versehen, innenseitig werden Innenblenden mit Filter eingebaut. \r\nAuÃŸengitter, rund, weiÃŸ : d=180 mm \r\nInnenblende weiÃŸ : 180 x 180 x 35 (mm) \r\nUm den Luftaustausch zwischen den einzelnen RÃ¤umen zu gewÃ¤hrleisten, werden die InnentÃ¼ren mit einem ca. 1,0 cm breitem Luftspalt unterhalb des TÃ¼rblattes ausgefÃ¼hrt. \r\nGegebenenfalls wird aus PlatzgrÃ¼nden die Lage des Fensters im GÃ¤ste-WC geringfÃ¼gig angepasst. \r\nDie Frischluftautomatik (Kontrollierte WohnungslÃ¼ftung System LUNOS) gemÃ¤ÃŸ Â§ 15 Bau- und Leistungsbeschreibung entfÃ¤llt.\r\nBei der Wahl des Kellers muss der Keller wÃ¤rmegedÃ¤mmt werden.', 130, 150, 170, 0, '', 0, 0, 0, 0, 1, 0, 0, 0, 2, 2, '2014-08-22', '2014-08-22'),
(25, 'Garage 6 m lang', 'Die Lieferung und Montage der Garage beinhaltet: das Fundament, ein Schwingtor und eine TÃ¼r mittig in der hinteren Wand. Zufahrtsweg und GrundstÃ¼ck sind so herzurichten und zu befestigen, dass mit Schwerlastfahrzeugen (LÃ¤nge: 20 m, Breite: 3,00 m, DurchfahrtshÃ¶he: 4,00 m) eine ungehinderte Zufahrt bis unmittelbar zur geplanten Lage der Garage mÃ¶glich ist. Muss ein Autokran benutzt werden, hat der Auftragnehmer gegen den Auftraggeber einen Anspruch auf VergÃ¼tung der (hieraus bedingten) Mehraufwendungen.	', 8600, 8600, 8600, 1, '', 0, 1, 0, 0, 0, 0, 0, 0, 2, 2, '2014-08-22', '2014-09-27'),
(26, 'Garage 9 m lang', 'Die Lieferung und Montage der Garage beinhaltet: das Fundament, ein Schwingtor und eine TÃ¼r mittig in der hinteren Wand. Zufahrtsweg und GrundstÃ¼ck sind so herzurichten und zu befestigen, dass mit Schwerlastfahrzeugen (LÃ¤nge: 20 m, Breite: 3,00 m, DurchfahrtshÃ¶he: 4,00 m) eine ungehinderte Zufahrt bis unmittelbar zur geplanten Lage der Garage mÃ¶glich ist. Muss ein Autokran benutzt werden, hat der Auftragnehmer gegen den Auftraggeber einen Anspruch auf VergÃ¼tung der (hieraus bedingten) Mehraufwendungen.', 12900, 12900, 12900, 1, '', 0, 1, 0, 0, 0, 0, 0, 0, 2, 2, '2014-08-22', '2014-09-27'),
(27, 'Verblendung ohne Keller', 'Die Fassade wird als hinterlÃ¼ftete Verblendfassade mit NF-Verblendsteinen in den Farben Rotbunt oder Dunkelrot in einer StÃ¤rke von ca. 10,0 cm - 11,5 cm nach Wahl des Auftragnehmers ausgefÃ¼hrt (Hersteller Wienerberger oder gleichwertig nach Wahl des Auftragnehmers gemÃ¤ÃŸ Â§ 15, "Sonstiges"), Materialpreis ca. 450,00 EUR (inkl. MwSt.)/1000 StÃ¼ck. \r\nDie AuÃŸenmaÃŸe des Hauses werden entsprechend angepasst. DachÃ¼berstÃ¤nde bei verblendeten HÃ¤usern werden an der Traufseite als Dachkasten ausgefÃ¼hrt. Die GrÃ¶ÃŸe der giebel- und traufseitigen DachÃ¼berstÃ¤nde wird konstruktiv festgelegt. \r\nBei gleichzeitiger Wahl eines Erkers wird der Erker nicht verblendet, sondern verputzt. Bei gleichzeitiger Wahl einer Gaube werden die Gaubenseiten mit Kunstschiefer verkleidet.\r\nDie sichtbaren DachÃ¼berstÃ¤nde verringern sich um das MaÃŸ der Klinkerverblendung.\r\nHinweis zum Verblendmauerwerk: \r\nDer Verblender wird in einem Arbeitsgang im wilden Verband vermauert und die Fuge glattgestrichen. Die Farbe der Fuge ist zementgrau. An den Hausecken wird eine dauerelastische StoÃŸfuge als Dehnungsfuge (Wartungsfuge) angeordnet. Die StÃ¼rze werden als Grenadierschicht oder Verblend- FertigstÃ¼rze ausgefÃ¼hrt. \r\nDie Putzarbeiten gemÃ¤ÃŸ Â§ 15, Bau- und Leistungsbeschreibung entfallen.\r\n', 260, 260, 260, 0, '', -1, 0, 0, 0, 1, 0, 0, 0, 2, 2, '2014-08-22', '2014-09-27'),
(28, 'KÃ¼chenfenster', 'AusfÃ¼hrung gemÃ¤ÃŸ Bau- und Leistungsbeschreibung. Um dem Trend zu hÃ¶heren Arbeitsplatten bzw. KÃ¼cheneinrichtungen entgegenzukommen und gleichzeitig zu gewÃ¤hrleisten, dass das Fenster in der KÃ¼che zu Ã¶ffnen bleibt wird es einmal horizontal geteilt. Der untere Teil des Fensters wird als feststehendes Element ausgefÃ¼hrt, der obere entsprechend Bauleistungsbeschreibung.  ', 300, 300, 300, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 2, 2, '2014-08-22', '2014-09-27'),
(29, 'Fenstersprossen', 'Die Fenster und bodentiefe FenstertÃ¼ren erhalten innenliegende Aluminium-Sprossen entsprechend Zeichnung. Die Farbe der Sprossen entspricht der gewÃ¤hlten Fensterfarbe. \r\nDie Drei-Scheiben-WÃ¤rmeschutzverglasung wird dabei mit einem Ug-Wert 0,50 W/mÂ²K ausgefÃ¼hrt. Fenster mit Fensterbreiten von 62,5 cm und kleiner erhalten keine Sprossen.    \r\n', 18, 18, 18, 0, '', -2, 0, 0, 0, 1, 0, 0, 0, 2, 2, '2014-08-22', '2014-09-27'),
(30, 'FensterbÃ¤nke (AuÃŸen)', 'Die AuÃŸenfensterbÃ¤nke werden als NatursteinfensterbÃ¤nke in Granit ausgefÃ¼hrt. Der Auftraggeber hat die Wahl gemÃ¤ÃŸ Farbkarte des Auftragnehmers. \r\nDie AuÃŸenfensterbÃ¤nke gemÃ¤ÃŸ Bau- und Leistungsbeschreibung entfallen.\r\n\r\n', 90, 90, 90, 3, '', 0, 0, 0, 0, 0, 0, 0, 0, 2, 2, '2014-08-22', '2014-09-27'),
(31, 'ErhÃ¶hter Schallschutz bei DHH', 'FÃ¼r einen erhÃ¶hten Schallschutz nach DIN 4109 Teil 10 von GerÃ¤uschen aus fremden Wohnbereichen wird die Haustrennwand zwischen den HÃ¤usern als zweischalige schalldÃ¤mmende Kalksandstein- Plansteinwand (Rohdichteklasse 2,0) mit innenliegender DÃ¤mmung aus Mineralwolle erstellt. \r\nDie WandstÃ¤rke der Trennwand erhÃ¶ht sich auf 20 cm. Die AuÃŸenabmessungen des Hauses bleiben unverÃ¤ndert. Die WohnflÃ¤che verringert sich geringfÃ¼gig. \r\nDie Dachgeschossdecke sowie DachschrÃ¤gen werden innenseitig doppelt beplankt. Die HaustrennwÃ¤nde gemÃ¤ÃŸ Bau- und Leistungsbeschreibung entfallen. \r\nHinweis: \r\nVorbehaltlich der PrÃ¼fung, dass das anschlieÃŸende Doppel- oder Reihenhaus keine abweichende Trennwandkonstruktion vertraglich beinhaltet.\r\n', 4990, 4990, 4990, 0, '', 0, 0, 0, 0, 1, 0, 0, 0, 2, 2, '2014-08-22', '2014-08-22'),
(32, 'Dacheindeckung Tegalit', 'Die Dacheindeckung erfolgt mit BRAAS- Dachsteinen "Tegalit Protegon matt"  in den Farben Granit, Klassisch-Rot, Steingrau (Hellgrau) oder Tiefrot (Dunkelrot). \r\nEs entfÃ¤llt die Dacheindeckung mit BRAAS- Dachsteinen "Harzer Pfanne BIG" gemÃ¤ÃŸ Â§ 15 Bau- und Leistungsbeschreibung.	\r\n', 54, 54, 54, 0, '', -1, 0, 0, 0, 1, 0, 0, 0, 2, 2, '2014-08-22', '2014-09-27'),
(33, 'Seitenteil fÃ¼r HaustÃ¼r', 'Ihre HaustÃ¼r erhÃ¤lt ein passendes Seitenteil, Breite 62,5 cm. \r\nBei der Wahl von farbigen Fenstern wird das Seitenteil der Fensterfarbe angepasst.\r\n', 890, 890, 890, 0, '', 0, 0, 0, 0, 1, 0, 0, 0, 2, 2, '2014-08-22', '2014-08-22'),
(34, 'Schornstein ab Keller', 'EinzÃ¼giger Luft- Abgas- Schornstein mit externer Verbrennungsluftzufuhr fÃ¼r FeuerstÃ¤tten mit festen Brennstoffen in raumluftunabhÃ¤ngiger Betriebsweise, System: KAMTEC LAS-W oder gleichwertig nach Wahl des Auftragnehmers gemÃ¤ÃŸ Â§ 15, "Sonstiges", bestehend aus komplett gedÃ¤mmten Mantelsteinen. Die Lage ist den Grundrissen zu entnehmen. Der Schornstein, Ã¸ 18 cm, AuÃŸenmaÃŸ ca. 42 x 42 cm, wird vom Kellergeschoss bis Ã¼ber Dach gefÃ¼hrt. \r\nDer Schornsteinkopf ist verschiefert (Kunstschiefer). Die Dachausstiegsluke und benÃ¶tigte Trittroste sind im Preis enthalten. \r\nDie Lage und HÃ¶he des Schornsteines kann nach den Vorgaben des Bundes- Immissionsschutzgesetzes in Zusammenwirken mit der umgebenden Bebauung variieren. \r\nDie Kalkulation des Schornsteinpreises beruht auf folgenden Voraussetzungen: \r\nDer Schornstein wird 2,30 m Ã¼ber die DachflÃ¤che bzw. 40 cm Ã¼ber First gefÃ¼hrt. \r\nDie Oberkanten von LÃ¼ftungsÃ¶ffnungen, Fenster- und TÃ¼rÃ¶ffnungen der umgebenden Bebauung im Umkreis von 15 m liegen mindestens 1,0 m unterhalb der AustrittsÃ¶ffnung des Schornsteines. \r\nSind diese Voraussetzungen nicht erfÃ¼llt, hat der Auftragnehmer gegen den Auftraggeber einen Anspruch auf VergÃ¼tung der (hieraus bedingten) Mehraufwendungen.  \r\n', 7250, 7250, 7250, 0, '', 0, 0, 71, 0, 1, 0, 0, 0, 3, 2, '2014-08-22', '2014-09-21'),
(35, 'Druckwasserdichter Lichtschacht', 'Lieferung und Einbau eines druckwasserdichten Lichtschachtes (ca. 1,25 m x 0,6 m) mit\r\nEntwÃ¤sserungsanschlussstutzen. Im Bereich des Lichtschachtes wird die AuÃŸenwandflÃ¤che mit Sockeputz versehen. Die RÃ¼ckstausicherung, sowie der Anschluss an die Grundleitung ist Eigenleistung des Auftraggebers.\r\n', 1500, 1500, 1500, 1, '', 0, 0, 71, 0, 0, 0, 0, 0, 3, 2, '2014-08-22', '2014-09-27'),
(36, 'Haustechnik im Keller', 'Der Hausanschlussraum mit dem Standort der Haustechnik (Heizungsanlage und TrinkwassererwÃ¤rmung) wird im Keller des Wohnhauses vorgesehen. Der Hausanschlussanschlussraum im EG wird nun Hauswirtschaftsraum. Der\r\nHausanschlussraum im Keller befindet sich, wenn nicht anders angegeben, unterhalb des neuen\r\nHauswirtschaftsraumes des Erdgeschosses.\r\nEine Hebeanlage fÃ¼r das Abwasser, sowie eine Kondensatpumpe bei Gas-BrennwertheizgerÃ¤ten oder Schornsteinen ist nicht vereinbart.	', 1600, 1600, 1600, 0, '', 0, 0, 71, 0, 1, 0, 0, 0, 3, 2, '2014-08-22', '2014-09-21'),
(37, 'Keller lichte Roh-RaumhÃ¶he ca. 260 cm', 'ErhÃ¶hung der lichten RohbauhÃ¶he des Kellers von 2,25 m auf ca. 2,60 m.\r\nBei DoppelhaushÃ¤lften muss die lichte RohbauhÃ¶he des Kellers in beiden HÃ¤user gleich sein.     ', 4850, 6890, 8890, 0, '', 0, 0, 71, 0, 1, 0, 0, 0, 3, 2, '2014-08-22', '2014-09-21'),
(38, 'Mehraufwand VergrÃ¶ÃŸerung Keller fÃ¼r AuÃŸenwand Porenbeton 30 cm', 'Durch das gewÃ¤hlte Bausystem vergrÃ¶ÃŸern sich die AuÃŸenabmessungen des Hauses. Der Keller wird an die vergrÃ¶ÃŸerten AuÃŸenabmessungen angepasst.	', 22, 30, 38, 0, '', -1, 0, 71, 0, 1, 0, 0, 0, 3, 2, '2014-08-22', '2014-09-27'),
(39, 'Mehraufwand VergrÃ¶ÃŸerung Keller fÃ¼r AuÃŸenwand Porenbeton 36,5 cm', 'Durch das gewÃ¤hlte Bausystem vergrÃ¶ÃŸern sich die AuÃŸenabmessungen des Hauses. Der Keller wird an die vergrÃ¶ÃŸerten AuÃŸenabmessungen angepasst.', 42, 46, 60, 0, '', -1, 0, 71, 0, 1, 0, 0, 0, 3, 2, '2014-08-22', '2014-09-27'),
(40, 'Mehraufwand bei Wahl der FassadendÃ¤mmung', 'Die SockeldÃ¤mmplatten der FassadendÃ¤mmung werden bei gleichzeitiger Wahl eines Kellers bis ca. 30 cm unterhalb der Kellerdecke gefÃ¼hrt.\r\n', 650, 650, 650, 0, '', 0, 0, 71, 0, 1, 0, 0, 0, 3, 2, '2014-08-22', '2014-09-21'),
(41, 'FuÃŸbodenheizung im EG und DG', 'Warmwasser- FuÃŸbodenheizung nach WÃ¤rmebedarfberechnung mit Kunststoffverrohrung auf TrÃ¤gerplatte und Raumregelung. Anstelle der FlachheizkÃ¶rper in den ausgebauten WohnrÃ¤umen wird im gesamten Haus (auÃŸer Kellergeschoss) pro ausgebauten Wohnraum (auÃŸer Hauswirtschaftsraum) ein FuÃŸbodenheizkreis installiert. Die GesamtaufbauhÃ¶he des FuÃŸbodens kann sich nach Wahl des Auftragnehmers um ca. 2 cm erhÃ¶hen. Die lichten RaumhÃ¶hen reduzieren sich entsprechend um das MaÃŸ des hÃ¶heren FuÃŸbodenaufbaus. Nach Wahl des Auftragnehmers wird ein Zement- oder Anhydritestrich eingebaut. \r\nJe Geschoss wird ein Heizkreisverteiler vorgesehen. \r\nDie Fenster im Dachgeschoss erhalten, wenn erforderlich, eine Absturzsicherung (GelÃ¤nderstab verzinkt), um die notwendigen BrÃ¼stungshÃ¶hen gemÃ¤ÃŸ Landesbauordnung einzuhalten. \r\nZum Aufheizen des Heizestrichs mÃ¼ssen rechtzeitig mit dem Einbau des Estrichs der Strom, Gas- und Wasseranschluss vom Auftraggeber bereitgestellt werden. \r\nZusÃ¤tzlich wird je Bad ein Bad-HeizkÃ¶rper (GrÃ¶ÃŸe nach WÃ¤rmebedarfberechnung) mit horizontal in Gruppen angeordneten geschwungenen Rundrohren, Farbe weiÃŸ, (Hersteller BrÃ¶tje / Serie exclusiv oder gleichwertig nach Wahl des Auftragnehmers gemÃ¤ÃŸ Â§ 15, "Sonstiges") eingebaut.', 58, 58, 58, 0, '', -2, 0, 0, 0, 1, 0, 0, 0, 4, 2, '2014-08-22', '2014-09-27'),
(42, 'GrundrissÃ¤nderung pro Geschoss   ', 'Individuelle Ã„nderungen in den Grundrissen je Geschoss der Haustypen nach Wunsch des Kunden, jedoch ohne Eingriffe in die Statik und ohne Materialmehrkosten.', 650, 650, 650, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 4, 2, '2014-08-22', '2014-09-27'),
(43, 'Bad-HeizkÃ¶rper mit Handtuchhalter-Funktion', 'Bad- HeizkÃ¶rper eines Markenherstellers mit horizontal in Gruppen angeordneten geschwungenen Rundrohren, Farbe weiÃŸ ', 600, 600, 600, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 4, 2, '2014-08-22', '2014-09-27'),
(44, 'Eckbadewanne', 'Eckbadewanne Acryl 140 cm \r\nStatt der eingefliesten Badewanne wird eine Eckbadewanne aus Acryl mit SchÃ¼rze eines Markenherstellers auf FÃ¼ÃŸen, ca. 140 cm, mit verchromter Einhand- Badebatterie mit Wannenset eingebaut. Die Armaturen eines Markenherstellers werden als Aufputzarmaturen ausgefÃ¼hrt. \r\nDie eingeflieste Badewanne aus Acryl gemÃ¤ÃŸ Â§ 15 Bau- und Leistungsbeschreibung entfÃ¤llt.', 700, 700, 700, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 4, 2, '2014-08-22', '2014-09-27'),
(45, 'Bodengleiche Dusche ', 'Eingeflieste Brausewanne aus Acryl (Hersteller: Ideal Standard oder gleichwertig nach Wahl des Auftragnehmers gemÃ¤ÃŸ Â§ 15,"Sonstiges"), ca. 80 cm x 80 cm mit verchromter Einhand-Brausebatterie mit Brauseset. Die Armaturen (Hersteller VIGOUR - produziert durch Villeroy & Boch, Serie Clivia oder gleichwertig nach Wahl des Auftragnehmers gemÃ¤ÃŸ Â§ 15,"Sonstiges") werden als Aufputzarmaturen ausgefÃ¼hrt. Ablaufgarnitur aus Kunststoff, mit StandrohrÃ¼berlauf, verchromt.  Eine Duschtrennwand oder Kabine ist nicht vereinbart.	', 950, 950, 950, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 4, 2, '2014-08-22', '2014-09-27'),
(46, 'ZusÃ¤tzliche Dusche', 'Eingeflieste Brausewanne aus Acryl (Hersteller: Ideal Standard oder gleichwertig nach Wahl des Auftragnehmers gemÃ¤ÃŸ Â§ 15,"Sonstiges"), ca. 80 cm x 80 cm mit verchromter Einhand- Brausebatterie mit Brauseset. Die Armaturen (Hersteller VIGOUR - produziert durch Villeroy & Boch, Serie Clivia oder gleichwertig nach Wahl des Auftragnehmers gemÃ¤ÃŸ Â§ 15,"Sonstiges") werden als Aufputzarmaturen ausgefÃ¼hrt. Ablaufgarnitur aus Kunststoff, mit StandrohrÃ¼berlauf, verchromt.  Eine Duschtrennwand oder Kabine ist nicht vereinbart. \r\nIm Anschlussbereich Duschwanne/Wand werden Wandfliesen gemÃ¤ÃŸ Bau- und Leistungsbeschreibung tÃ¼rhoch vorgesehen.	\r\n', 1850, 1850, 1850, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 4, 2, '2014-08-22', '2014-09-27'),
(47, 'EinflÃ¼gelige Ganzglas-InnentÃ¼r', 'Eine InnentÃ¼r wird als GanzglasinnentÃ¼r mit Zarge von, OberflÃ¤che Dekor Buche, Eiche-Natur oder Esche-classic-weiÃŸ nach Wahl des Auftraggebers, eingebaut. Die TÃ¼rblÃ¤tter bestehen aus ESG 8 mm, Typ ESG Satinato o. Typ ESG MastercarreÃ© nach Bemusterungsauswahl. Die TÃ¼r wird mit einem\r\nSchloÃŸkasten Studio-Classic oder gleichwertig und einer DrÃ¼ckergarnitur in Edelstahl versehen.\r\nEine InnentÃ¼r gemÃ¤ÃŸ Bau- und Leistungsbeschreibung entfÃ¤llt.	\r\n', 750, 750, 750, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 4, 2, '2014-08-22', '2014-09-27'),
(48, 'ZusÃ¤tzliche InnentÃ¼r ', 'AusfÃ¼hrung gemÃ¤ÃŸ Bau- und Leistungsbeschreibung. Die Lage der zusÃ¤tzlichen InnentÃ¼ren, GrÃ¶ÃŸe 88,5 x 201 cm, sind in die Zeichnungen einzufÃ¼gen. Die endgÃ¼ltige Anordnung der InnentÃ¼ren erfolgt durch den Auftragnehmer im Rahmen der Zeichnungen fÃ¼r das Baugesuch. Die Anordnung muss statisch mÃ¶glich sein. ', 300, 300, 300, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 4, 2, '2014-08-22', '2014-09-27'),
(49, 'ZusÃ¤tzliches Zimmer', 'Im Erdgeschoss des Wohnhauses wird ein zusÃ¤tzliches Kinderzimmer ausgefÃ¼hrt. \r\nDas Wohnzimmer wird dabei durch den Einbau einer 11,5 cm starken Innenwand gemÃ¤ÃŸ Bausystem geteilt, so dass ein zusÃ¤tzliches Zimmer entsteht. Eine InnentÃ¼r wird eingebaut.\r\nDie AusfÃ¼hrung der RÃ¤ume erfolgt gemÃ¤ÃŸ der Bau- und Leistungsbeschreibung.\r\n', 3700, 3700, 3700, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 4, 2, '2014-08-22', '2014-09-27'),
(50, 'Ausbau vom Spitzboden  in einer DoppelhaushÃ¤lfte', 'Der Ausbau vom Spitzboden  in einer DoppelhaushÃ¤lfte beinhaltet eine Treppe zum Spitzboden inkl. WandverstÃ¤rkung im Dachgeschoss, den Trockenbau der Umfassung der Treppe und der DachschrÃ¤gen im Spitzboden, einer InnentÃ¼r, OSB-Platten als Ersatz fÃ¼r den Estrich, ein HeizkÃ¶rper und Elektroarbeiten mit zwei Steckdosen, zwei Doppelsteckdosen, einen Deckenauslass mit Schalter, einen Antennenanschluss und Telefonanschluss. Sollte ein Fenster im Spitzboden eingebaut werden, entfÃ¤llt dabei der Rollladenkasten.', 12900, 12900, 12900, 0, '', 0, 0, 0, 0, 1, 0, 0, 0, 4, 2, '2014-08-22', '2014-08-22'),
(51, 'Treppe aus Stahlbeton', 'Treppe aus Stahlbeton ohne GelÃ¤nder und Belag statt der Standardtreppe', 1500, 1500, 1500, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 4, 2, '2014-08-22', '2014-09-27'),
(52, 'Kontrollierte Vaillant WohnungslÃ¼ftung mit WÃ¤rmerÃ¼ckgewinnung  ', 'Das Haus wird mit einer kontrollierten LÃ¼ftungsanlage mit WÃ¤rmerÃ¼ckgewinnung gemÃ¤ÃŸ E DIN 1946 ausgestattet. \r\nDie frische AuÃŸenluft wird vom FrischluftgerÃ¤t im Hausanschlussraum angesaugt und Ã¼ber die zentrale Steigleitung verteilt, im FuÃŸboden DachgeschoÃŸ, den ZuluftrÃ¤umen (Wohn-, Arbeits- und SchlafrÃ¤ume) zugefÃ¼hrt. Der Luftaustritt erfolgt Ã¼ber einen Auslass, der im Dachgeschoss und im Erdgeschoss in und an der Decke untergebracht und im Zuge der Bodenbelags- oder Malerarbeiten abgedeckt wird. \r\nDann strÃ¶mt die Luft zu den ÃœberstrÃ¶mrÃ¤umen (Flur, Diele). Ãœber die TÃ¼rspalte strÃ¶mt die Luft weiter zu den AbluftrÃ¤umen (KÃ¼che, Bad, WC). Die feuchte verbrauchte Luft wird dort als Abluft zum Abluftsammler geleitet und wird dann Ã¼ber die AuÃŸenwand im Hauswirtschaftsraum aus dem Haus gefÃ¼hrt. \r\nDas FrischluftgerÃ¤t Vaillant recoVAIR (oder gleichwertig nach Wahl des Auftragnehmers gemÃ¤ÃŸ Â§15, "Sonstiges") wird im Hausanschlusssraum installiert bestehend aus: \r\n1.	Aluminium- HochleistungswÃ¤rmetauscher \r\n2.	optimale Luftvolumenstromeinstellung durch Konstantvolumenstromventilatoren \r\n3.	integrierter 3-stufiger Sommerbypass zur 100%igen oder 50 %igen Umgehung der WÃ¤rmerÃ¼ckgewinnung fÃ¼r den Sommerbetrieb \r\n4.	Mit digitalem FernbediengerÃ¤t zur Einstellung des Luftvolumenstroms zur BelÃ¼ftung der RÃ¤ume. Die Montage der Fernbedienung erfolgt im Hausanschlussraum am LÃ¼ftungsgerÃ¤t. \r\n5.	Die Frischluft- und FortluftfÃ¼hrung erfolgt Ã¼ber AuÃŸenwandgitter im Hausanschlussraum.\r\nDie Frischluftautomatik (Kontrollierte WohnungslÃ¼ftung System LUNOS) gemÃ¤ÃŸ Â§ 15 Bau- und Leistungsbeschreibung entfÃ¤llt.	', 7900, 8900, 9900, 0, '', 0, 0, 0, 0, 1, 0, 0, 0, 4, 2, '2014-08-22', '2014-08-22'),
(53, 'FensterbÃ¤nke (Innen)', 'Die InnenfensterbÃ¤nke werden als NatursteinfensterbÃ¤nke in Marmor oder Granit ausgefÃ¼hrt. Der Auftraggeber hat die Wahl gemÃ¤ÃŸ Farbkarte des Auftragnehmers. \r\nDie FensterbÃ¤nke im Bad sind abweichend hiervon gefliest. \r\nDie InnenfensterbÃ¤nke gemÃ¤ÃŸ Bau- und Leistungsbeschreibung entfallen.\r\n', 90, 90, 90, 3, '', 0, 0, 0, 0, 0, 0, 0, 0, 4, 2, '2014-08-22', '2014-09-27'),
(54, 'SchiebetÃ¼r zweiteilig', 'Die DurchgangsÃ¶ffnung erhÃ¤lt eine zweiteilige, auf der Wand laufende SchiebetÃ¼r. \r\nDie TÃ¼rblatter sind RÃ¶hrenspantÃ¼ren (Typ ASTRA Cell oder gleichwertig gemÃ¤ÃŸ Â§ 15, "Sonstiges"). \r\nDer Auftraggeber kann bei der Verkleidung der FÃ¼hrungsschien aus folgenden OberflÃ¤chen- Dekoren wÃ¤hlen: Buche, Eiche natur, WeiÃŸlack P05, Goldahorn und Esche classic weiÃŸ. \r\nDie TÃ¼ren erhallten eine silberfarbige Griffmuschel. ', 1850, 1850, 1850, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 4, 2, '2014-08-22', '2014-09-27'),
(55, 'SchiebetÃ¼r Vollglas zweiteilig', 'Die DurchgangsÃ¶ffnung erhÃ¤lt eine zweiteilige, auf der Wand laufende SchiebetÃ¼r. \r\nDie TÃ¼rblatter bestehen aus hochwertigen GanzglastÃ¼ren (Typ Satinato oder gleichwertig gemÃ¤ÃŸ Â§ 15, "Sonstiges"). \r\nDer Auftraggeber kann bei der Verkleidung der FÃ¼hrungsschien aus folgenden OberflÃ¤chen- Dekoren wÃ¤hlen: Buche, Eiche natur, WeiÃŸlack P05, Goldahorn und Esche classic weiÃŸ. \r\nDie TÃ¼ren erhallten eine silberfarbige Griffmuschel.', 2890, 2890, 2890, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 4, 2, '2014-08-22', '2014-09-27'),
(56, 'Vaillant WÃ¤rmepumpe mit Erdsonde ohne Solar', 'Sole/Wasser- WÃ¤rmepumpe (ErdwÃ¤rmepumpe) System Vaillant.\r\nEnergiequelle: Erdreich \r\nHeizungswÃ¤rmepumpe geoTHERM plus VWS xxx/2 gemÃ¤ÃŸ WÃ¤rmebedarfsberechnung zur Beheizung und Warmwasserbereitung mit integriertem 175 L Edelstahl- Doppelmantelspeicher, HeizungsumwÃ¤lzpumpe, SoleumwÃ¤lzpumpe, Elektro- Zusatzheizung 6KW, witterungsgefÃ¼hrtem Energiebilanzregler und WÃ¤rmemengenzÃ¤hler. \r\nStandort: Hausanschlussraum \r\nAbmessungen: 60x180x83,5cm (BxHxT).\r\nErsonde ca. 100 m tief als WÃ¤rmequelle fÃ¼r Sole/Wasser-WÃ¤rempumpen.\r\nZum Hochheizen und Trockenheizen des Estrichs wird ausschlieÃŸlich die Elektro- Zusatzheizung der WÃ¤rmepumpe verwendet.\r\nIm Hausanschlussraum wird ein zweiter ElektrozÃ¤hlerplatz gemÃ¤ÃŸ Vorschriften des Energieversorgers mit den entsprechenden Sicherungsarmaturen vorgesehen. \r\nEs entfÃ¤llt die Gas- Brennwerttherme und die Warmwasserversorgung gemÃ¤ÃŸ Â§ 12, "Heizungsanlage und TrinkwassererwÃ¤rmung".	', 18200, 18200, 18200, 0, '', 0, 0, 41, 0, 1, 0, 0, 0, 5, 2, '2014-08-22', '2014-09-21'),
(57, 'Vaillant WÃ¤rmepumpe mit Erdsonde mit Solar', 'Sole/Wasser- WÃ¤rmepumpe (ErdwÃ¤rmepumpe) System Vaillant.\r\nEnergiequelle: Erdreich \r\nHeizungswÃ¤rmepumpe geoTHERM plus VWS xxx/2 gemÃ¤ÃŸ WÃ¤rmebedarfsberechnung zur Beheizung und Warmwasserbereitung mit integriertem 175 L Edelstahl- Doppelmantelspeicher, HeizungsumwÃ¤lzpumpe, SoleumwÃ¤lzpumpe, Elektro- Zusatzheizung 6KW, witterungsgefÃ¼hrtem Energiebilanzregler und WÃ¤rmemengenzÃ¤hler. \r\nStandort: Hausanschlussraum \r\nAbmessungen: ca. 60x120x83,5cm (BxHxT). \r\nWarmwasserbereitung:\r\nWarmwasserbereitung mit 300 L Multi-Funktionsspeicher VPS 300/2 als Pufferspeicher.\r\nStandort: Hausanschlussraum \r\nAbmessungen: HÃ¶he ca.180 cm, Durchmesser ca. 70 cm. \r\nDer Pufferspeicher wird beheizt durch drei auf das System abgestimmte, Solar-Flachkollektoren Typ auroTHERM VFK 145 fÃ¼r Aufdachmontage, KollektorflÃ¤che ca. 7,5 mÂ² und dient der solaren Warmwasserbereitung. Bei nicht ausreichendem solaren Ertrag erfolgt die Beheizung des Pufferspeichers durch die WÃ¤rmepumpe. \r\nHinweis: \r\nDer maximale Ertrag ist bei reiner SÃ¼dausrichtung und 45Â° Dachneigung zu erzielen. In der Praxis kommt es jedoch bei Ausrichtungen zwischen SÃ¼dost und SÃ¼dwest, sowie Dachneigungen von 30Â° bis 50Â° kaum zu EinbuÃŸen. \r\nFÃ¼r einen maximalen Wirkungsgrad der Solaranlage sollte das Dach nicht von Bebauungen oder BÃ¤umen verschattet werden.\r\nErsonde ca. 100 m tief als WÃ¤rmequelle fÃ¼r Sole/Wasser-WÃ¤rempumpen.\r\nZum Hochheizen und Trockenheizen des Estrichs wird ausschlieÃŸlich die Elektro- Zusatzheizung der WÃ¤rmepumpe verwendet.\r\nIm Hausanschlussraum wird ein zweiter ElektrozÃ¤hlerplatz gemÃ¤ÃŸ Vorschriften des Energieversorgers mit den entsprechenden Sicherungsarmaturen vorgesehen. \r\nEs entfÃ¤llt die Gas- Brennwerttherme und die Warmwasserversorgung gemÃ¤ÃŸ Â§ 12, "Heizungsanlage und TrinkwassererwÃ¤rmung".	', 26300, 26300, 26300, 0, '', 0, 0, 41, 0, 1, 0, 0, 0, 5, 2, '2014-08-22', '2014-09-21'),
(58, 'Vaillant Luft-WÃ¤rmepumpe mit Solar', 'Vaillant Luft-Wasser-WÃ¤rmepumpe "aroTHERM VWL 85/2" mit Solaranlage. \r\nKann nur zusammen mit der FuÃŸbodenheizung im EG und DG bestellt werden!\r\nEnergiequelle: AuÃŸenluft \r\nSplit- System bestehend aus einem AuÃŸengerÃ¤t, Hydraulikstation (Inneneinheit) und Warmwasserspeicher \r\nMerkmale: \r\n- Nennleistung 2,3 bis 8,3 KW gemÃ¤ÃŸ WÃ¤rmebedarfsberechnung\r\n- leistungsmodulierender Betrieb\r\nWarmwasserbereitung:\r\nWarmwasserbereitung mit 300 L Multi-Funktionsspeicher VPS 300/2 als Pufferspeicher.\r\nStandort: Hausanschlussraum \r\nAbmessungen: HÃ¶he ca.180 cm, Durchmesser ca. 70 cm. \r\nDer Pufferspeicher wird beheizt durch drei auf das System abgestimmte, Solar-Flachkollektoren Typ auroTHERM VFK 145 fÃ¼r Aufdachmontage, KollektorflÃ¤che ca. 7,5 mÂ² und dient der solaren Warmwasserbereitung. Bei nicht ausreichendem solaren Ertrag erfolgt die Beheizung des Pufferspeichers durch die WÃ¤rmepumpe. \r\nHinweis: \r\nDer maximale Ertrag ist bei reiner SÃ¼dausrichtung und 45Â° Dachneigung zu erzielen. In der Praxis kommt es jedoch bei Ausrichtungen zwischen SÃ¼dost und SÃ¼dwest, sowie Dachneigungen von 30Â° bis 50Â° kaum zu EinbuÃŸen. \r\nFÃ¼r einen maximalen Wirkungsgrad der Solaranlage sollte das Dach nicht von Bebauungen oder BÃ¤umen verschattet werden.\r\nStandort AuÃŸengerÃ¤t: \r\nBefestigung des AuÃŸengerÃ¤tes mit Wandhalterung an der AuÃŸenwand im Bereich des Hausanschlussraumes \r\n(Schalldruckpegel - MindestabstÃ¤nde zum NachbargebÃ¤ude sind zu beachten!) \r\nAbmessungen AuÃŸengerÃ¤t: ca. 97,3 x 110,3 x 46,3 cm (BxHxT) \r\nBei einem abweichenden Standort des AuÃŸengerÃ¤tes erhÃ¤lt der Auftragnehmer die Mehrleistungen vom Auftraggeber vergÃ¼tet. \r\nStandort Inneneinheit/Speicher: Hausanschlussraum \r\nZum Hochheizen und Trockenheizen des Estrichs wird ausschlieÃŸlich die Elektro- Zusatzheizung der WÃ¤rmepumpe verwendet. \r\nIm Hausanschlussraum wird ein zweiter ElektrozÃ¤hlerplatz gemÃ¤ÃŸ Vorschriften des Energieversorgers mit den entsprechenden Sicherungsarmaturen vorgesehen. \r\nEs entfÃ¤llt die Gas- Brennwerttherme und die Warmwasserversorgung gemÃ¤ÃŸ Â§ 12, "Heizungsanlage und TrinkwassererwÃ¤rmung".	', 8700, 8700, 8700, 0, '', 0, 0, 41, 0, 1, 0, 0, 0, 5, 2, '2014-08-22', '2014-09-21'),
(59, 'KÃ¼hlfunktion fÃ¼r Ihre Vaillant WÃ¤rmepumpe', 'Die KÃ¼hlfunktion erfolgt Ã¼ber die Umkehr des WÃ¤rmepumpen- KÃ¤ltekreises. Die WÃ¤rmepumpen-Heizungsregelung sorgt fÃ¼r vollautomatisches Umschalten auf KÃ¼hlen bei heiÃŸen AuÃŸentemperaturen.', 2500, 2500, 2500, 0, '', 0, 0, 41, 0, 1, 0, 0, 0, 5, 2, '2014-08-22', '2014-09-21'),
(60, 'Vaillant Luft-WÃ¤rmepumpe ohne Solar', 'Vaillant Luft-Wasser-WÃ¤rmepumpe "aroTHERM VWL 85/2" ohne Solaranlage \r\nKann nur zusammen mit der FuÃŸbodenheizung im EG und DG bestellt werden!\r\nEnergiequelle: AuÃŸenluft \r\nSplit- System bestehend aus einem AuÃŸengerÃ¤t, Hydraulikstation (Inneneinheit) und Warmwasserspeicher \r\nMerkmale: \r\n- Nennleistung 2,3 bis 8,3 KW gemÃ¤ÃŸ WÃ¤rmebedarfsberechnung\r\n- leistungsmodulierender Betrieb\r\n- Warmwasserspeicher geoSTOR VIH RW 300\r\n- Speicherinhalt 285 l\r\n- komplette Steuer- und RegelausrÃ¼stung\r\n- Elektroheizstab/Hydraulikstation max. 6KW zur Spitzenlastabdeckung\r\n- Hocheffizienz - Pumpe (Energieeffizeinzklasse A)\r\n- WÃ¤rmemengenzÃ¤hler \r\nStandort AuÃŸengerÃ¤t: \r\nBefestigung des AuÃŸengerÃ¤tes mit Wandhalterung an der AuÃŸenwand im Bereich des Hausanschlussraumes \r\n(Schalldruckpegel - MindestabstÃ¤nde zum NachbargebÃ¤ude sind zu beachten!) \r\nAbmessungen AuÃŸengerÃ¤t: ca. 97,3 x 110,3 x 46,3 cm (BxHxT) \r\nBei einem abweichenden Standort des AuÃŸengerÃ¤tes erhÃ¤lt der Auftragnehmer die Mehrleistungen vom Auftraggeber vergÃ¼tet. \r\nStandort Inneneinheit/Speicher: Hausanschlussraum \r\nAbmessungen Speicher: 66 x 177,5 x 72,5 cm (BxHxT)\r\nZum Hochheizen und Trockenheizen des Estrichs wird ausschlieÃŸlich die Elektro- Zusatzheizung der WÃ¤rmepumpe verwendet. \r\nIm Hausanschlussraum wird ein zweiter ElektrozÃ¤hlerplatz gemÃ¤ÃŸ Vorschriften des Energieversorgers mit den entsprechenden Sicherungsarmaturen vorgesehen. \r\nEs entfÃ¤llt die Gas- Brennwerttherme und die Warmwasserversorgung gemÃ¤ÃŸ Â§ 12, "Heizungsanlage und TrinkwassererwÃ¤rmung".	', 2900, 2900, 2900, 0, '', 0, 0, 41, 0, 1, 0, 0, 0, 5, 2, '2014-08-22', '2014-09-27'),
(61, 'DHH Stadt 118 als freistehendes Haus (ohne Keller)', 'Eine DoppelhaushÃ¤lfte wird als freistehendes Einzelhaus errichtet. \r\nDie Haustrennwand wird als AuÃŸenwand gemÃ¤ÃŸ Â§ 15 "AuÃŸen- und Innenwand" errichtet und mit einem AuÃŸenputzsystem gemÃ¤ÃŸ Â§ 15 "Putzarbeiten" ausgefÃ¼hrt. Die Haustrennwand entfÃ¤llt. \r\nDie AuÃŸenabmessungen des Hauses vergrÃ¶ÃŸern sich entsprechend. \r\nBei gleichzeitiger Wahl der Sonderausstattung Porenbeton 30 oder 36,5 cm erfolgt die AusfÃ¼hrung entsprechend des gewÃ¤hlten Bausystems.', 9650, 9650, 9650, 0, '', 0, 3, 0, 1, 1, 0, 0, 0, 2, 2, '2014-08-22', '2014-09-20'),
(63, 'DHH Stadt 130 als freistehendes Haus (ohne Keller)', 'Eine DoppelhaushÃ¤lfte wird als freistehendes Einzelhaus errichtet. \r\nDie Haustrennwand wird als AuÃŸenwand gemÃ¤ÃŸ Â§ 15 "AuÃŸen- und Innenwand" errichtet und mit einem AuÃŸenputzsystem gemÃ¤ÃŸ Â§ 15 "Putzarbeiten" ausgefÃ¼hrt. Die Haustrennwand entfÃ¤llt. \r\nDie AuÃŸenabmessungen des Hauses vergrÃ¶ÃŸern sich entsprechend. \r\nBei gleichzeitiger Wahl der Sonderausstattung Porenbeton 30 oder 36,5 cm erfolgt die AusfÃ¼hrung entsprechend des gewÃ¤hlten Bausystems.', 9650, 9650, 9650, 0, '', 0, 3, 0, 3, 1, 0, 0, 0, 2, 2, '2014-08-22', '2014-09-20'),
(70, 'DHH Stadt 118 als freistehendes Haus (mit Keller)', 'Eine DoppelhaushÃ¤lfte wird als freistehendes Einzelhaus errichtet. \r\nDie Haustrennwand wird als AuÃŸenwand gemÃ¤ÃŸ Â§ 15 "AuÃŸen- und Innenwand" errichtet und mit einem AuÃŸenputzsystem gemÃ¤ÃŸ Â§ 15 "Putzarbeiten" ausgefÃ¼hrt. Die Haustrennwand entfÃ¤llt. \r\nDie AuÃŸenabmessungen des Hauses vergrÃ¶ÃŸern sich entsprechend.  ', 12450, 12450, 12450, 0, '', 0, 3, 0, 1, 1, 0, 0, 0, 2, 2, '2014-08-22', '2014-09-20');
INSERT INTO `extras` (`id`, `name`, `description`, `default_priceA`, `default_priceB`, `default_priceC`, `units`, `picture`, `size_dependent_flag`, `type`, `depends_on`, `depends_on_house`, `bool_unique`, `bool_uneditable`, `bool_custom`, `bool_external`, `category_id`, `user_id`, `created`, `modified`) VALUES
(71, 'WU-Betonkeller', 'Beschreibung der Standardleistungen fÃ¼r Keller aus Beton fÃ¼r aufstauendes Sickerwasser und drÃ¼ckendes Wasser (Vertragsgrundlage)\r\nHinweis: Alle Keller sind Nutzkeller. \r\nDie HÃ¶henlage des Hauses bezogen auf OK Kellerdecke betrÃ¤gt ca. 35 cm Ã¼ber OK GelÃ¤nde.\r\nZufahrtsweg und GrundstÃ¼ck sind so herzurichten und zu befestigen, dass mit Schwerlastfahrzeugen (LÃ¤nge: 20 m, Breite: 3,00 m, DurchfahrtshÃ¶he: 4,00 m) und Autokran eine ungehinderte Zufahrt bis unmittelbar zum BaukÃ¶rper mÃ¶glich ist.\r\nEbenso sind die eventuellen AbsperrmaÃŸnahmen Ã¼ber das Ordnungsamt vom Auftraggeber zu stellen.\r\nâ€¢ Erdarbeiten:\r\nDer Mutterboden wird bis zu einer StÃ¤rke von 30 cm abgetragen. Nach dem Mutterbodenabtrag erfolgt der Aushub der Baugrube bis zu einer Tiefe von ca. 2,25 m. Der Bodenaushub verbleibt auf dem GrundstÃ¼ck. Unterhalb der Bodenplatte wird eine 15 cm starke Ausgleichsschicht/ Kiesschicht eingebaut. Auf dieser Schicht wird als Trennlage eine PE- Folie aufgebracht. Das Freihalten der Baugrube von Wasser, sowie die VerfÃ¼llung der Baugrube ist Eigenleistung des Auftraggebers.\r\nHinweis: Aus praktischen GrÃ¼nden sollte das GelÃ¤nde im Bereich des gedÃ¤mmten Kellers bis Ã¼ber die Oberkante der DÃ¤mmung wieder angefÃ¼llt werden (Eigenleistung des Auftraggebers).\r\nâ€¢ EntwÃ¤sserungsarbeiten:\r\nDie Abwasserleitungen aus dem Erdgeschoss werden Ã¼ber Fallrohre bis unterhalb der Kellerdecke gefÃ¼hrt und zusammengefasst. FÃ¼r die EntwÃ¤sserung sind in der KellerauÃŸenwand bis zu 2 druckwasserdichte WanddurchfÃ¼hrungen Ã˜ 100 (Lastfall aufstauendes Sickerwasser und\r\ndrÃ¼ckendes Wasser) vorgesehen, durch die die Abwasserleitungen bis 50 cm vor die HausauÃŸenkante gefÃ¼hrt werden. Die Leerrohre (Lastfall aufstauendes Sickerwasser und drÃ¼ckendes Wasser) fÃ¼r die MedienzufÃ¼hrung werden im Bereich des Hausanschlussraumes durch die KellerauÃŸenwÃ¤nde gefÃ¼hrt. Eine Hebeanlage fÃ¼r das Abwasser, sowie eine Kondensatpumpe bei\r\nGas-BrennwertheizgerÃ¤ten oder Schornsteinen ist nicht vereinbart.\r\nâ€¢ Erdungsanlage:\r\nIm Arbeitsraum bzw. unterhalb der Kellerbodenplatte wird ein Ringerder (Edelstahl oder gleichwertig) inkl. Anschlussfahne ausgefÃ¼hrt. In die KellerauÃŸenwand wird eine DurchfÃ¼hrung aus Edelstahl fÃ¼r den Erdungsanschluss eingebaut.\r\nâ€¢ Bodenplatte:\r\nDie Bodenplatte wird aus Beton in C25/30 hergestellt. Die Dicke der Bodenplatte betrÃ¤gt ca. 25 cm. Die erforderliche Bewehrung sowie die Anschlussbewehrung fÃ¼r die KellerauÃŸenwÃ¤nde erfolgt gemÃ¤ÃŸ statischer Berechnung. Auf der Bodenplatte wird eine Trennlage aus PE- Folie vorgesehen.\r\nâ€¢ KellerauÃŸenwÃ¤nde:\r\nDie KellerauÃŸenwÃ¤nde werden aus Beton in C25/30 hergestellt, Wanddicke ca. 24 cm. Die erforderliche Bewehrung fÃ¼r die KellerauÃŸenwÃ¤nde erfolgt gemÃ¤ÃŸ statischer Berechnung. Im Bereich des Kellervorraumes wird eine 8 cm starke PerimeterdÃ¤mmung, WLG gemÃ¤ÃŸ Energieeinsparverordnung, vorgesehen.\r\nâ€¢ KellerinnenwÃ¤nde:\r\nDie KellerinnenwÃ¤nde werden aus Beton in C20/25 hergestellt, Wanddicke ca. 10-12 cm. Die erforderliche Bewehrung fÃ¼r die KellerinnenwÃ¤nde erfolgt gemÃ¤ÃŸ statischer Berechnung.\r\nIm Bereich des Kellervorraumes werden die InnenwandflÃ¤chen an der vom Vorraum abgewandten Seite mit einer WÃ¤rmedÃ¤mmung aus Polystyrol-Hartschaum, gemÃ¤ÃŸ den Vorgaben der Energieeinsparverordnung, ausgefÃ¼hrt.\r\nâ€¢ KellerraumhÃ¶he:\r\nDie lichte RohbauhÃ¶he betrÃ¤gt ca. 2,25 m. Achtung! Die lichte RaumhÃ¶he verringert sich um das MaÃŸ des FuÃŸbodenaufbaus.\r\nâ€¢ FuÃŸboden:\r\nDer FuÃŸboden wird als schwimmender Estrich auf einer WÃ¤rmedÃ¤mmschicht ausgefÃ¼hrt.\r\nDer Aufbau ergibt sich folgend:\r\nca. 40 mm WÃ¤rmedÃ¤mmung (PS-Hartschaum, WLG 035)\r\n1 Lage PE-Folie\r\nca. 45 mm Estrich\r\nâ€¢ Kellerdecke:\r\nDie Kellerdecke wird als GroÃŸflÃ¤chendecke in C20/25, Dicke ca. 18 cm - 22 cm gemÃ¤ÃŸ Statik hergestellt.\r\nâ€¢ Innenputz:\r\nDie InnenwandflÃ¤chen sind schalungsglatt ausgefÃ¼hrt, die Fugen im Kellervorraum werden tapezierfÃ¤hig verspachtelt. Die DeckenflÃ¤chen der Geschossdecke sind schalungsglatt ausgefÃ¼hrt, die\r\nFugen im Kellervorraum werden tapezierfÃ¤hig verspachtelt. Die Innenputzarbeiten der weiteren KellerrÃ¤ume sind Eigenleistung des Auftraggebers.\r\nâ€¢ Abdichtung nach System Glatthaar fÃ¼r den Lastfall aufstauendes Sickerwasser \r\nund drÃ¼ckendes Wasser oder gleichwertig nach Wahl des Auftragnehmers \r\ngemÃ¤ÃŸ Â§ 15,"Sonstiges".\r\nDer verwendete wasserundurchlÃ¤ssige Beton zur Herstellung der AuÃŸenwÃ¤nde und der Bodenplatte bildet die FlÃ¤chenabdichtung gemÃ¤ÃŸ WU- Richtlinie. Die druckwasserdichten WanddurchfÃ¼hrungen fÃ¼r die EntwÃ¤sserung werden gegen den Lastfall drÃ¼ckendes Wasser abgedichtet.\r\nDie Abdichtung erfolgt Ã¼ber Kernbeton mit innenliegendem Fugenblech. Im Bereich zwischen den HaustrennwÃ¤nden werden Trennfugenplatten vorgesehen.\r\nDer Lastfall aufstauendes Sickerwasser liegt vor, wenn der Boden nicht durchlÃ¤ssig ist und eine DrÃ¤nage nicht ausgefÃ¼hrt wird. Der langjÃ¤hrig ermittelte Bemessungswasserstand liegt mehr als 0,30 m unter der Unterkante der Bauwerkssohle. Bei dieser Abdichtung kann der Keller bis maximal 1,40 m von der Unterkante der Bodenplatte in aufstauenden Sickerwasser stehen. Bei dem Lastfall drÃ¼ckendes Wasser liegt der langjÃ¤hrig ermittelte Bemessungswasserstand weniger als 0,30 m unter der Unterkante der Bauwerkssohle. Bei dieser Abdichtung kann der Keller bis maximal 1,40 m von\r\nder Unterkante der Bodenplatte im drÃ¼ckenden Wasser stehen. DarÃ¼ber hinaus gehende MaÃŸnahmen (z. B. druckwasserdichte LichtschÃ¤chte, Auftriebssicherung, BodenplattenverstÃ¤rkung, BetonzusÃ¤tze bei aggressiven WÃ¤ssern) sind Eigenleistung des Auftraggebers und mÃ¼ssen gesondert vereinbart werden. Das Kellerbauwerk wird gemÃ¤ÃŸ WU- Richtlinie in Nutzungsklasse A ausgefÃ¼hrt.\r\nÃœberwachungsklasse 2:\r\nDer Beton wird im Rahmen der Ãœberwachungsklasse 2 nach DIN 1045-3 vor Ort von einer anerkannten PrÃ¼fstelle Ã¼berwacht. Es werden ProbewÃ¼rfel zur QualitÃ¤tskontrolle hergestellt und im Labor Ã¼berprÃ¼ft. Dies gilt nur fÃ¼r den Fall drÃ¼ckendes Wasser nach DIN 18 195 Teil 6/8.\r\nâ€¢ Kellerfenster:\r\nDie Kellerfenster werden aus weiÃŸen Mehrkammer- Kunststoff- Profilen mit Zwei- Scheiben- WÃ¤rmeschutzverglasung und Dreh-Kipp-Beschlag ausgefÃ¼hrt. Die Kellerfenster werden eingeschÃ¤umt und an der Innenseite mit einem Dichtvlies eingebaut. Als AuÃŸenfensterbÃ¤nke werden witterungsbestÃ¤ndige eloxierte AluminiumfensterbÃ¤nke vorgesehen. Die InnenfensterbÃ¤nke im\r\nKellervorraum (wenn ein Fenster vorhanden ist) werden aus unempfindlichen Werzalit mit marmorierter OberflÃ¤che ausgefÃ¼hrt. \r\nEventuell erforderliche LichtschÃ¤chte sowie die InnenfensterbÃ¤nke in den weiteren KellerrÃ¤umen werden in Eigenleistung durch den Auftraggeber ausgefÃ¼hrt\r\nâ€¢ Kellertreppe:\r\nDie Kellertreppe wird als Treppenanlage in einer offenen Bauweise Bau- und Leistungsbeschreibung ausgefÃ¼hrt.\r\nâ€¢ InnentÃ¼ren:\r\nIm Kellervorraum werden InnentÃ¼ren als Klimaklasse III zur Abgrenzung des beheizten vom unbeheizten Bereich ausgefÃ¼hrt.\r\nâ€¢ Elektroinstallation:\r\nJeder Kellerraum einschlieÃŸlich Vorraum erhÃ¤lt einen Deckenauslass, sowie eine Steckdose und einen Schalter eines Markenherstellers, Farbe weiÃŸ bzw. cremeweiÃŸ. Die Installation im Kellervorraum erfolgt unter Putz, in den Ã¼brigen KellerrÃ¤umen als Aufputzinstallation.\r\nâ€¢ Heizungsinstallation:\r\nIm Kellervorraum wird ein fertig lackierter FlachheizkÃ¶rper, GrÃ¶ÃŸe gemÃ¤ÃŸ WÃ¤rmebedarfsberechnung montiert. Der HeizkÃ¶rper ist mit einem Thermostatregelventil ausgestattet.\r\nHinweis: Doppel- und ReihenhÃ¤user kÃ¶nnen nicht einzeln unterkellert werden.\r\nDie Preise verstehen sich je HaushÃ¤lfte.\r\nBei Erkervarianten und Verblendmauerwerk werden die aufgefÃ¼hrten Kellergrundrisse an die entsprechenden Erdgeschossgrundrisse angepasst.\r\nDie Abdichtung erfÃ¼llt die Anforderungen aus der Wasserbelastung (Lastfall)\r\ngemÃ¤ÃŸ DIN 18195 Teil 6 Abschnitt 8 - gegen drÃ¼ckendes Wasser. Sollte im\r\nBodengutachten der Lastfall aufstauendes Sickerwasser gemÃ¤ÃŸ DIN 18195 Teil\r\n6 Abschnitt 9 vorliegen, werden dem Auftraggeber 800EUR vergÃ¼tet.   ', 650, 700, 750, 0, '', -1, 2, 0, 0, 1, 0, 0, 0, 3, 2, '2014-08-22', '2014-09-27'),
(80, 'DÃ¤mmung aller AuÃŸenkellerwÃ¤nde und unter der Bodenplatte (Stadt 118)', '', 8990, 8990, 8990, 0, '', 0, 0, 71, 1, 1, 0, 0, 0, 3, 2, '2014-08-23', '2014-09-21'),
(81, 'DÃ¤mmung aller AuÃŸenkellerwÃ¤nde und unter der Bodenplatte (Stadt 120)', 'Der Keller wird entsprechend der nachstehenden Beschreibung gedÃ¤mmt: \r\n- PerimeterdÃ¤mmung der KellerauÃŸenwand umlaufend, StÃ¤rke mindestens 8 cm, WÃ¤rmeleitfÃ¤higkeit WLG 040\r\n- Um WÃ¤rmebrÃ¼cken zu vermeiden wird im Bereich des Kellervorraums unterhalb der Bodenplatte auf einem Feinplanum eine mindestens 5 cm starke DÃ¤mmung aus Styrodur C Hartschaumplatten, WÃ¤rmeleitfÃ¤higkeit gemÃ¤ÃŸ WÃ¤rmeschutznachweis eingebaut und mit einer PE- Folie als Schutzschicht abgedeckt.', 9990, 9990, 9990, 0, '', 0, 0, 71, 2, 1, 0, 0, 0, 3, 2, '2014-08-23', '2014-09-21'),
(82, 'DÃ¤mmung aller AuÃŸenkellerwÃ¤nde und unter der Bodenplatte (Stadt 130)', 'Der Keller wird entsprechend der nachstehenden Beschreibung gedÃ¤mmt: \r\n- PerimeterdÃ¤mmung der KellerauÃŸenwand umlaufend, StÃ¤rke mindestens 8 cm, WÃ¤rmeleitfÃ¤higkeit WLG 040\r\n- Um WÃ¤rmebrÃ¼cken zu vermeiden wird im Bereich des Kellervorraums unterhalb der Bodenplatte auf einem Feinplanum eine mindestens 5 cm starke DÃ¤mmung aus Styrodur C Hartschaumplatten, WÃ¤rmeleitfÃ¤higkeit gemÃ¤ÃŸ WÃ¤rmeschutznachweis eingebaut und mit einer PE- Folie als Schutzschicht abgedeckt.', 8490, 8490, 8490, 0, '', 0, 0, 71, 3, 1, 0, 0, 0, 3, 2, '2014-08-23', '2014-09-21'),
(83, 'DÃ¤mmung aller AuÃŸenkellerwÃ¤nde und unter der Bodenplatte (Stadtvilla)', 'Der Keller wird entsprechend der nachstehenden Beschreibung gedÃ¤mmt: \r\n- PerimeterdÃ¤mmung der KellerauÃŸenwand umlaufend, StÃ¤rke mindestens 8 cm, WÃ¤rmeleitfÃ¤higkeit WLG 040\r\n- Um WÃ¤rmebrÃ¼cken zu vermeiden wird im Bereich des Kellervorraums unterhalb der Bodenplatte auf einem Feinplanum eine mindestens 5 cm starke DÃ¤mmung aus Styrodur C Hartschaumplatten, WÃ¤rmeleitfÃ¤higkeit gemÃ¤ÃŸ WÃ¤rmeschutznachweis eingebaut und mit einer PE- Folie als Schutzschicht abgedeckt.', 9990, 9990, 9990, 0, '', 0, 0, 71, 5, 1, 0, 0, 0, 3, 2, '2014-08-23', '2014-09-21'),
(84, 'DÃ¤mmung aller AuÃŸenkellerwÃ¤nde und unter der Bodenplatte (Land 135)', 'Der Keller wird entsprechend der nachstehenden Beschreibung gedÃ¤mmt: \r\n- PerimeterdÃ¤mmung der KellerauÃŸenwand umlaufend, StÃ¤rke mindestens 8 cm, WÃ¤rmeleitfÃ¤higkeit WLG 040\r\n- Um WÃ¤rmebrÃ¼cken zu vermeiden wird im Bereich des Kellervorraums unterhalb der Bodenplatte auf einem Feinplanum eine mindestens 5 cm starke DÃ¤mmung aus Styrodur C Hartschaumplatten, WÃ¤rmeleitfÃ¤higkeit gemÃ¤ÃŸ WÃ¤rmeschutznachweis eingebaut und mit einer PE- Folie als Schutzschicht abgedeckt.', 11800, 11800, 11800, 0, '', 0, 0, 71, 7, 1, 0, 0, 0, 3, 2, '2014-08-23', '2014-09-21'),
(85, 'DÃ¤mmung aller AuÃŸenkellerwÃ¤nde und unter der Bodenplatte (Land 150)', 'Der Keller wird entsprechend der nachstehenden Beschreibung gedÃ¤mmt: \r\n- PerimeterdÃ¤mmung der KellerauÃŸenwand umlaufend, StÃ¤rke mindestens 8 cm, WÃ¤rmeleitfÃ¤higkeit WLG 040\r\n- Um WÃ¤rmebrÃ¼cken zu vermeiden wird im Bereich des Kellervorraums unterhalb der Bodenplatte auf einem Feinplanum eine mindestens 5 cm starke DÃ¤mmung aus Styrodur C Hartschaumplatten, WÃ¤rmeleitfÃ¤higkeit gemÃ¤ÃŸ WÃ¤rmeschutznachweis eingebaut und mit einer PE- Folie als Schutzschicht abgedeckt.', 12900, 12900, 12900, 0, '', 0, 0, 71, 8, 1, 0, 0, 0, 3, 2, '2014-08-23', '2014-09-21'),
(86, 'DÃ¤mmung aller AuÃŸenkellerwÃ¤nde und unter der Bodenplatte (Land 120)', 'Der Keller wird entsprechend der nachstehenden Beschreibung gedÃ¤mmt: \r\n- PerimeterdÃ¤mmung der KellerauÃŸenwand umlaufend, StÃ¤rke mindestens 8 cm, WÃ¤rmeleitfÃ¤higkeit WLG 040\r\n- Um WÃ¤rmebrÃ¼cken zu vermeiden wird im Bereich des Kellervorraums unterhalb der Bodenplatte auf einem Feinplanum eine mindestens 5 cm starke DÃ¤mmung aus Styrodur C Hartschaumplatten, WÃ¤rmeleitfÃ¤higkeit gemÃ¤ÃŸ WÃ¤rmeschutznachweis eingebaut und mit einer PE- Folie als Schutzschicht abgedeckt.', 11400, 11400, 11400, 0, '', 0, 0, 71, 6, 1, 0, 0, 0, 3, 2, '2014-08-23', '2014-09-21'),
(90, 'FuÃŸbodenheizung im Keller (Land 120)', 'Warmwasser- FuÃŸbodenheizung nach WÃ¤rmebedarfberechnung mit Kunststoffverrohrung auf TrÃ¤gerplatte und Raumregelung. In dem gedÃ¤mmten Kellergeschoss wird pro ausgebauten Raum (auÃŸer Hauswirtschaftsraum) ein FuÃŸbodenheizkreis installiert. Die GesamtaufbauhÃ¶he des FuÃŸbodens kann sich nach Wahl des Auftragnehmers um ca. 2 cm erhÃ¶hen. Die lichten RaumhÃ¶hen reduzieren sich entsprechend um das MaÃŸ des hÃ¶heren FuÃŸbodenaufbaus. Nach Wahl des Auftragnehmers wird ein Zement- oder Anhydritestrich eingebaut. Es wird ein Heizkreisverteiler vorgesehen. Kann nur mit der DÃ¤mmung der KellerauÃŸenwÃ¤nde bestellt werden.\r\nZum Aufheizen des Heizestrichs mÃ¼ssen rechtzeitig mit dem Einbau des Estrichs der Strom, Gas- und Wasseranschluss vom Auftraggeber bereitgestellt werden.', 50, 55, 65, 0, '', -1, 0, 86, 6, 1, 0, 0, 0, 3, 2, '2014-08-23', '2014-09-27'),
(91, 'FuÃŸbodenheizung im Keller (Land 135)', 'Warmwasser- FuÃŸbodenheizung nach WÃ¤rmebedarfberechnung mit Kunststoffverrohrung auf TrÃ¤gerplatte und Raumregelung. In dem gedÃ¤mmten Kellergeschoss wird pro ausgebauten Raum (auÃŸer Hauswirtschaftsraum) ein FuÃŸbodenheizkreis installiert. Die GesamtaufbauhÃ¶he des FuÃŸbodens kann sich nach Wahl des Auftragnehmers um ca. 2 cm erhÃ¶hen. Die lichten RaumhÃ¶hen reduzieren sich entsprechend um das MaÃŸ des hÃ¶heren FuÃŸbodenaufbaus. Nach Wahl des Auftragnehmers wird ein Zement- oder Anhydritestrich eingebaut. Es wird ein Heizkreisverteiler vorgesehen. Kann nur mit der DÃ¤mmung der KellerauÃŸenwÃ¤nde bestellt werden.\r\nZum Aufheizen des Heizestrichs mÃ¼ssen rechtzeitig mit dem Einbau des Estrichs der Strom, Gas- und Wasseranschluss vom Auftraggeber bereitgestellt werden.', 50, 55, 65, 0, '', -1, 0, 84, 7, 1, 0, 0, 0, 3, 2, '2014-08-23', '2014-09-27'),
(92, 'FuÃŸbodenheizung im Keller (Land 150)', 'Warmwasser- FuÃŸbodenheizung nach WÃ¤rmebedarfberechnung mit Kunststoffverrohrung auf TrÃ¤gerplatte und Raumregelung. In dem gedÃ¤mmten Kellergeschoss wird pro ausgebauten Raum (auÃŸer Hauswirtschaftsraum) ein FuÃŸbodenheizkreis installiert. Die GesamtaufbauhÃ¶he des FuÃŸbodens kann sich nach Wahl des Auftragnehmers um ca. 2 cm erhÃ¶hen. Die lichten RaumhÃ¶hen reduzieren sich entsprechend um das MaÃŸ des hÃ¶heren FuÃŸbodenaufbaus. Nach Wahl des Auftragnehmers wird ein Zement- oder Anhydritestrich eingebaut. Es wird ein Heizkreisverteiler vorgesehen. Kann nur mit der DÃ¤mmung der KellerauÃŸenwÃ¤nde bestellt werden.\r\nZum Aufheizen des Heizestrichs mÃ¼ssen rechtzeitig mit dem Einbau des Estrichs der Strom, Gas- und Wasseranschluss vom Auftraggeber bereitgestellt werden.', 50, 55, 65, 0, '', -1, 0, 85, 8, 1, 0, 0, 0, 3, 2, '2014-08-23', '2014-09-27'),
(95, 'FuÃŸbodenheizung im Keller (Stadt 118)', 'Warmwasser- FuÃŸbodenheizung nach WÃ¤rmebedarfberechnung mit Kunststoffverrohrung auf TrÃ¤gerplatte und Raumregelung. In dem gedÃ¤mmten Kellergeschoss wird pro ausgebauten Raum (auÃŸer Hauswirtschaftsraum) ein FuÃŸbodenheizkreis installiert. Die GesamtaufbauhÃ¶he des FuÃŸbodens kann sich nach Wahl des Auftragnehmers um ca. 2 cm erhÃ¶hen. Die lichten RaumhÃ¶hen reduzieren sich entsprechend um das MaÃŸ des hÃ¶heren FuÃŸbodenaufbaus. Nach Wahl des Auftragnehmers wird ein Zement- oder Anhydritestrich eingebaut. Es wird ein Heizkreisverteiler vorgesehen. Kann nur mit der DÃ¤mmung der KellerauÃŸenwÃ¤nde bestellt werden.\r\nZum Aufheizen des Heizestrichs mÃ¼ssen rechtzeitig mit dem Einbau des Estrichs der Strom, Gas- und Wasseranschluss vom Auftraggeber bereitgestellt werden.', 50, 55, 65, 0, '', -1, 0, 80, 1, 1, 0, 0, 0, 3, 2, '2014-08-23', '2014-09-27'),
(96, 'FuÃŸbodenheizung im Keller (Stadt 120)', 'Warmwasser- FuÃŸbodenheizung nach WÃ¤rmebedarfberechnung mit Kunststoffverrohrung auf TrÃ¤gerplatte und Raumregelung. In dem gedÃ¤mmten Kellergeschoss wird pro ausgebauten Raum (auÃŸer Hauswirtschaftsraum) ein FuÃŸbodenheizkreis installiert. Die GesamtaufbauhÃ¶he des FuÃŸbodens kann sich nach Wahl des Auftragnehmers um ca. 2 cm erhÃ¶hen. Die lichten RaumhÃ¶hen reduzieren sich entsprechend um das MaÃŸ des hÃ¶heren FuÃŸbodenaufbaus. Nach Wahl des Auftragnehmers wird ein Zement- oder Anhydritestrich eingebaut. Es wird ein Heizkreisverteiler vorgesehen. Kann nur mit der DÃ¤mmung der KellerauÃŸenwÃ¤nde bestellt werden.\r\nZum Aufheizen des Heizestrichs mÃ¼ssen rechtzeitig mit dem Einbau des Estrichs der Strom, Gas- und Wasseranschluss vom Auftraggeber bereitgestellt werden.', 50, 55, 65, 0, '', -1, 0, 81, 2, 1, 0, 0, 0, 3, 2, '2014-08-23', '2014-09-27'),
(97, 'FuÃŸbodenheizung im Keller (Stadt 130)', 'Warmwasser- FuÃŸbodenheizung nach WÃ¤rmebedarfberechnung mit Kunststoffverrohrung auf TrÃ¤gerplatte und Raumregelung. In dem gedÃ¤mmten Kellergeschoss wird pro ausgebauten Raum (auÃŸer Hauswirtschaftsraum) ein FuÃŸbodenheizkreis installiert. Die GesamtaufbauhÃ¶he des FuÃŸbodens kann sich nach Wahl des Auftragnehmers um ca. 2 cm erhÃ¶hen. Die lichten RaumhÃ¶hen reduzieren sich entsprechend um das MaÃŸ des hÃ¶heren FuÃŸbodenaufbaus. Nach Wahl des Auftragnehmers wird ein Zement- oder Anhydritestrich eingebaut. Es wird ein Heizkreisverteiler vorgesehen. Kann nur mit der DÃ¤mmung der KellerauÃŸenwÃ¤nde bestellt werden.\r\nZum Aufheizen des Heizestrichs mÃ¼ssen rechtzeitig mit dem Einbau des Estrichs der Strom, Gas- und Wasseranschluss vom Auftraggeber bereitgestellt werden.', 50, 55, 65, 0, '', -1, 0, 82, 3, 1, 0, 0, 0, 3, 2, '2014-08-23', '2014-09-27'),
(98, 'FuÃŸbodenheizung im Keller (Stadtvilla)', 'Warmwasser- FuÃŸbodenheizung nach WÃ¤rmebedarfberechnung mit Kunststoffverrohrung auf TrÃ¤gerplatte und Raumregelung. In dem gedÃ¤mmten Kellergeschoss wird pro ausgebauten Raum (auÃŸer Hauswirtschaftsraum) ein FuÃŸbodenheizkreis installiert. Die GesamtaufbauhÃ¶he des FuÃŸbodens kann sich nach Wahl des Auftragnehmers um ca. 2 cm erhÃ¶hen. Die lichten RaumhÃ¶hen reduzieren sich entsprechend um das MaÃŸ des hÃ¶heren FuÃŸbodenaufbaus. Nach Wahl des Auftragnehmers wird ein Zement- oder Anhydritestrich eingebaut. Es wird ein Heizkreisverteiler vorgesehen. Kann nur mit der DÃ¤mmung der KellerauÃŸenwÃ¤nde bestellt werden.\r\nZum Aufheizen des Heizestrichs mÃ¼ssen rechtzeitig mit dem Einbau des Estrichs der Strom, Gas- und Wasseranschluss vom Auftraggeber bereitgestellt werden.  ', 50, 55, 65, 0, '', -1, 0, 83, 5, 1, 0, 0, 0, 3, 2, '2014-08-23', '2014-09-27'),
(105, 'MehrgrÃ¼ndung', '', 5000, 5000, 5000, 0, '', 0, 0, 0, 0, 1, 1, 0, 1, 6, 2, '2014-08-23', '2014-08-23'),
(107, 'Erdbebenzone', '', 3000, 3000, 3000, 0, '', 0, 0, 0, 0, 1, 0, 0, 1, 6, 2, '2014-08-23', '2014-08-23'),
(108, 'Eigenleistung AuÃŸennanlage', '', 5000, 5000, 5000, 0, '', 0, 0, 0, 0, 1, 0, 0, 1, 6, 2, '2014-08-23', '2014-08-23'),
(109, 'Eigenleistung Maler-/Bodenarbeiten', '', 5000, 5000, 5000, 0, '', 0, 0, 0, 0, 1, 0, 0, 1, 6, 2, '2014-08-23', '2014-08-23'),
(110, 'Garage 6 m', '', 8000, 8000, 8000, 0, '', 0, 1, 0, 0, 0, 0, 0, 1, 6, 2, '2014-08-23', '2014-08-29'),
(111, 'HausanschluÃŸkosten', '', 9000, 9000, 9000, 0, '', 0, 0, 0, 0, 1, 0, 0, 1, 6, 2, '2014-08-23', '2014-08-23'),
(112, 'Baustrom- und Bauwasseranschluss', '', 1000, 1000, 1000, 0, '', 0, 0, 0, 0, 1, 1, 0, 1, 6, 2, '2014-08-23', '2014-08-23'),
(113, 'Lageplan, Genehmigungskosten', '', 4400, 4400, 4400, 0, '', 0, 0, 0, 0, 1, 1, 0, 1, 6, 2, '2014-08-23', '2014-08-23'),
(114, 'DHH Stadt 120 als freistehendes Haus (mit Keller)', 'Eine DoppelhaushÃ¤lfte wird als freistehendes Einzelhaus errichtet. \r\nDie Haustrennwand wird als AuÃŸenwand gemÃ¤ÃŸ Â§ 15 "AuÃŸen- und Innenwand" errichtet und mit einem AuÃŸenputzsystem gemÃ¤ÃŸ Â§ 15 "Putzarbeiten" ausgefÃ¼hrt. Die Haustrennwand entfÃ¤llt. \r\nDie AuÃŸenabmessungen des Hauses vergrÃ¶ÃŸern sich entsprechend.  ', 12450, 12450, 12450, 0, '', 0, 3, 0, 2, 1, 0, 0, 0, 2, 2, '2014-09-20', '2014-09-20'),
(115, 'DHH Stadt 130 als freistehendes Haus (mit Keller)', 'Eine DoppelhaushÃ¤lfte wird als freistehendes Einzelhaus errichtet. \r\nDie Haustrennwand wird als AuÃŸenwand gemÃ¤ÃŸ Â§ 15 "AuÃŸen- und Innenwand" errichtet und mit einem AuÃŸenputzsystem gemÃ¤ÃŸ Â§ 15 "Putzarbeiten" ausgefÃ¼hrt. Die Haustrennwand entfÃ¤llt. \r\nDie AuÃŸenabmessungen des Hauses vergrÃ¶ÃŸern sich entsprechend.  ', 12450, 12450, 12450, 0, '', 0, 3, 0, 3, 1, 0, 0, 0, 2, 2, '2014-09-20', '2014-09-20'),
(116, 'DHH Stadt 120 als freistehendes Haus (ohne Keller)', 'Eine DoppelhaushÃ¤lfte wird als freistehendes Einzelhaus errichtet. \r\nDie Haustrennwand wird als AuÃŸenwand gemÃ¤ÃŸ Â§ 15 "AuÃŸen- und Innenwand" errichtet und mit einem AuÃŸenputzsystem gemÃ¤ÃŸ Â§ 15 "Putzarbeiten" ausgefÃ¼hrt. Die Haustrennwand entfÃ¤llt. \r\nDie AuÃŸenabmessungen des Hauses vergrÃ¶ÃŸern sich entsprechend. \r\nBei gleichzeitiger Wahl der Sonderausstattung Porenbeton 30 oder 36,5 cm erfolgt die AusfÃ¼hrung entsprechend des gewÃ¤hlten Bausystems.', 9650, 9650, 9650, 0, '', 0, 3, 0, 2, 1, 0, 0, 0, 2, 2, '2014-09-21', '2014-09-21'),
(117, 'Balkon', 'Der selbsttragende und thermisch entkoppelte Balkon wird als Stahbetonkragplatte realisiert und mit einem verzinkten StahlgelÃ¤nder versehen, Abmessungen: ca. 1,25 m x 4,625 m. \r\nDie Fenster im Bereich des Balkons werden durch bodentiefe FenstertÃ¼ren gemÃ¤ÃŸ Bau- und Leistungsbeschreibung mit der Breite 1,00 m ersetzt. \r\nDie endgÃ¼ltige Anordnung des Balkons erfolgt durch den Auftragnehmer im Rahmen der Zeichnungen fÃ¼r das Baugesuch.', 10890, 10890, 10890, 0, '', 0, 0, 0, 0, 1, 0, 0, 0, 2, 2, '2014-09-22', '2014-09-22'),
(118, 'Satteldachgaube', 'Breite ca. 3,00 m. Die Stirnseite wird gemauert,  die Wangen erhalten eine tragende Holzkonstruktion mit WÃ¤rmedÃ¤mmsystem und werden entsprechend der Hauptfassade verputzt. Die Dacheindeckung erfolgt entsprechend Hauptdach. Die Verkleidung innen erfolgt mittels tapezierfÃ¤hig verspachtelten Gipskartonplatten. Die Fenster entsprechen denen des Haupthauses. Die endgÃ¼ltige Anordnung der Gaube erfolgt durch den Auftragnehmer im Rahmen der Zeichnungen fÃ¼r den Bauantrag. \r\nDie Fenster der Gaube ebenfalls mit AufsatzrolllÃ¤den ausgefÃ¼hrt. \r\nBei gleichzeitiger Wahl einer Solaranlage ist die Anordnung der Solar- Flachkollektoren auf dem Dach fÃ¼r die Festlegung der Lage der Gaube zu berÃ¼cksichtigen.', 5890, 5890, 5890, 0, '', 0, 0, 0, 0, 1, 0, 0, 0, 2, 2, '2014-09-22', '2014-09-22'),
(119, 'Schleppgaube', 'Breite ca. 3,00 m. Die Stirnseite und die Wangen erhalten eine tragende Holzkonstruktion mit WÃ¤rmedÃ¤mmsystem und werden entsprechend der Hauptfassade verputzt. Die Dacheindeckung erfolgt entsprechend Hauptdach. Die Verkleidung innen erfolgt mittels tapezierfÃ¤hig verspachtelten Gipskartonplatten. Die Fenster entsprechen denen des Haupthauses. Die endgÃ¼ltige Anordnung der Gaube erfolgt durch den Auftragnehmer im Rahmen der Zeichnungen fÃ¼r den Bauantrag. \r\nDie Fenster der Gaube ebenfalls mit AufsatzrolllÃ¤den ausgefÃ¼hrt. \r\nBei gleichzeitiger Wahl einer Solaranlage ist die Anordnung der Solar- Flachkollektoren auf dem Dach fÃ¼r die Festlegung der Lage der Gaube zu berÃ¼cksichtigen.\r\n', 4890, 4890, 4890, 0, '', 0, 0, 0, 0, 1, 0, 0, 0, 2, 2, '2014-09-22', '2014-09-22'),
(120, 'Trapezerker', 'Trapezerker Zeichnung mit Dachkonstruktion, Dacheindeckung und EntwÃ¤sserung entsprechend Hauptdach. \r\nDie AuÃŸenwandflÃ¤chen werden entsprechend der Hauptfassade ausgefÃ¼hrt. Der Erker erhÃ¤lt das gleiche Deckensystem wie das Haupthaus. Die Fenster bzw. FenstertÃ¼ren entsprechen ebenfalls denen des Haupthauses. Die endgÃ¼ltige Anordnung des Erkers erfolgt durch den Auftragnehmer im Rahmen der Zeichnungen fÃ¼r den Bauantrag. \r\nEventuell vorhandene bodentiefe Fenster Ã¼ber dem Erker im DG sind nicht in Kombination mit dem Erker ausfÃ¼hrbar, diese werden durch Fenster der GrÃ¶ÃŸe mindestens 1,125 x 1,375 m ersetzt. Um die erforderlichen BelichtungsflÃ¤chen zu gewÃ¤hrleisten, erhÃ¤lt das betreffende Zimmer ein zusÃ¤tzliches Kunststoff- DachflÃ¤chenfenster ca. 740 x 1180 mm. \r\nDie Fenster bzw. FenstertÃ¼ren des Trapezerkers werden mit AufsatzrolllÃ¤den ausgefÃ¼hrt.  ', 7890, 7890, 7890, 0, '', 0, 0, 0, 0, 1, 0, 0, 0, 2, 2, '2014-09-22', '2014-09-22'),
(121, 'ZusÃ¤tzliches WC im EG', 'Das zusÃ¤tzliche GÃ¤ste- WC erhÃ¤lt Bodenfliesen sowie einen Fliesenspiegel Ã¼ber dem Waschbecken gemÃ¤ÃŸ Bau- und Leistungsbeschreibung. \r\nDas GÃ¤ste- WC wird mit einem wandhÃ¤ngenden WC gemÃ¤ÃŸ Bau- und Leistungsbeschreibung und einem Handwaschbecken ca. 45 cm breit mit verchromter Einhand- Waschtischbatterie ausgestattet. Die Armaturen eines Markenherstellers werden als Aufputzarmaturen ausgefÃ¼hrt. \r\nDas GÃ¤ste-WC erhÃ¤lt eine Steckdose und einen Wandauslass mit Schalter. \r\nDie AusfÃ¼hrung erfolgt gemÃ¤ÃŸ Bau- und Leistungsbeschreibung.\r\n', 2980, 2980, 2980, 0, '', 0, 0, 0, 0, 1, 0, 0, 0, 4, 2, '2014-09-22', '2014-09-22'),
(122, 'Bodengleiche Dusche durchgefliest', 'Bodengleiche Dusche erhÃ¤lt ein eingefliesten Duschbereich mit zentriertem Bodeneinlauf.\r\nEs wird ein befliestes, wasserdichtes und beschichtetes Hartschaum- Duschelement, ca. 80 x 80 cm, mit verchromter Einhand- Brausebatterie mit Brauseset eingebaut. Ablaufgarnitur aus Kunststoff, verchromt. Die Armaturen eines Markenherstellers werden als Aufputzarmaturen ausgefÃ¼hrt. \r\nEine Duschtrennwand oder Kabine ist nicht vereinbart. \r\nDie eingeflieste Brausewanne aus Acryl gemÃ¤ÃŸ Â§ 12 Bau- und Leistungsbeschreibung entfÃ¤llt. ', 1650, 1650, 1650, 0, '', 0, 0, 0, 0, 1, 0, 0, 0, 4, 2, '2014-09-22', '2014-09-22'),
(123, 'SchiebetÃ¼r einteilig', 'Die DurchgangsÃ¶ffnung  erhÃ¤lt eine einteilige, auf der Wand laufende SchiebetÃ¼r. \r\nDie TÃ¼rblatter sind RÃ¶hrenspantÃ¼ren (Typ ASTRA Cell oder gleichwertig gemÃ¤ÃŸ Â§ 15, "Sonstiges"). \r\nDer Auftraggeber kann bei der Verkleidung der FÃ¼hrungsschien aus folgenden OberflÃ¤chen- Dekoren wÃ¤hlen: Buche, Eiche natur, WeiÃŸlack P05, Goldahorn und Esche classic weiÃŸ. \r\nDie TÃ¼ren erhallten eine silberfarbige Griffmuschel. ', 1050, 1050, 1050, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 4, 2, '2014-09-22', '2014-09-27'),
(124, 'SchiebetÃ¼r Vollglas einteilig', 'Die DurchgangsÃ¶ffnung erhÃ¤lt eine einteilige, auf der Wand laufende SchiebetÃ¼r. \r\nDie TÃ¼rblatter bestehen aus hochwertigen GanzglastÃ¼ren (Typ Satinato oder gleichwertig gemÃ¤ÃŸ Â§ 15, "Sonstiges"). \r\nDer Auftraggeber kann bei der Verkleidung der FÃ¼hrungsschien aus folgenden OberflÃ¤chen- Dekoren wÃ¤hlen: Buche, Eiche natur, WeiÃŸlack P05, Goldahorn und Esche classic weiÃŸ. \r\nDie TÃ¼ren erhallten eine silberfarbige Griffmuschel.', 1790, 1790, 1790, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 4, 2, '2014-09-22', '2014-09-27'),
(125, 'Einliegerwohnung (Land 190)', 'Ihr Haus wird gemÃ¤ÃŸ der  nachfolgender Bauleistungsbeschreibung ausgefÃ¼hrt: \r\nGrundriss/Aufteilung\r\nDas Wohnhaus wird als Einfamilienhaus mit Einliegerwohnung im Erdgeschoss ausgefÃ¼hrt. Der HWR der groÃŸen Wohnung befindet sich im Dachgeschoss oder im Keller. Im Erdgeschoss der groÃŸen Wohnung entsteht ein zusÃ¤tzliches GÃ¤ste-WC. \r\nWohnungtrennwÃ¤nde\r\nZusÃ¤tzlich zu den WohnungstrennwÃ¤nden wird eine Trennwand nach Bedarf zum Schutz gegen SchallÃ¼bertragung aus Kalksandstein erstellt und mit einem mineralischen DÃ¼nnputz tapezierfÃ¤hig verspachtelt. \r\nHaustÃ¼r\r\nDie Einliegerwohnung erhÃ¤lt einen separaten Zugang mit einer 2. HauseingangstÃ¼r. Im ZÃ¤hlerraum (von auÃŸen zugÃ¤ngig) wird eine NebeneingangstÃ¼r eingebaut. \r\nSanitÃ¤ranlage und Installation\r\nEin zusÃ¤tzliches GÃ¤ste-WC entsteht im Erdgeschoss in der groÃŸen Wohnung, Standort entsprechend der zeichnerischen Darstellung. Ausstattung: \r\n- Kristallporzellanwaschtisch, ca. 45 cm breit mit verchromter Einhand-Waschtischbatterie\r\n- wandhÃ¤ngendes WC mit wassersparendem 2-Mengen-UnterputzspÃ¼lkasten, Sitz und Deckel\r\nSanitÃ¤rkeramik (Farbe weiÃŸ) eines Markenherstellers\r\nDie Armaturen eines Markenherstellers werden als Aufputzarmaturen ausgefÃ¼hrt. \r\nEin Duschbad wird eingebaut (kleine Wohnung), Standort entsprechend der zeichnerischen Darstellung (das Wannenbad im EG entfÃ¤llt). Ausstattung: \r\n- eingeflieste Brausewanne aus Acryl eines Markenherstellers, ca. 80 cm x 80 cm mit verchromter Einhand- Brausebatterie mit Brauseset. Ablaufgarnitur aus Kunststoff, mit StandrohrÃ¼berlauf, verchromt. Eine Duschtrennwand oder Kabine ist nicht vereinbart. \r\n- Kristallporzellanwaschtisch, ca. 60 cm breit mit verchromter Einhand- Waschtischbatterie. \r\n- wandhÃ¤ngendes WC mit wassersparendem 2-Mengen-UnterputzspÃ¼lkasten, Sitz und Deckel. SanitÃ¤rkeramik (Farbe weiÃŸ) eines Markenherstellers\r\nDie Armaturen eines Markenherstellers werden als Aufputzarmaturen ausgefÃ¼hrt. \r\nDie Einliegerwohnung bekommt einen zusÃ¤tzlichen AuÃŸenwasserhahn. \r\nFliesen\r\nDas GÃ¤ste-WC erhÃ¤lt einen Fliesenspiegel Ã¼ber dem Waschbecken, sowie Bodenfliesen zum Materialpreis EUR 20,00 pro mÂ² inkl. Mehrwertsteuer. \r\nEs werden Fliesen mit den KantenlÃ¤ngen > 12 cm und < 30 cm vorgesehen. Sockelfliesen, Sonderverlegungen, andere Formate und Dekore, sowie Mehrverfliesungen sind im Rahmen der sonstigen Vereinbarungen mÃ¶glich. Die Anschlussfugen zwischen Boden- und Wandfliesen werden elastisch versiegelt. \r\nIm Duschbad werden an den WÃ¤nden Fliesen zum Materialpreis EUR 20,00 pro mÂ² inkl. Mehrwertsteuer tÃ¼rhoch verlegt. DachschrÃ¤gen werden nicht gefliest. Der FuÃŸboden ist mit Fliesen zum gleichen Materialpreis gefliest. Unterhalb der Bodenfliesen und im Spritzwasserbereich Ã¼ber der Dusche wird eine FlÃ¼ssigdichtung als zusÃ¤tzlicher Schutz aufgebracht. \r\nEs werden Fliesen mit den KantenlÃ¤ngen > 12 cm und < 30 cm vorgesehen. Sockelfliesen, Sonderverlegungen, andere Formate und Dekore, sowie Mehrverfliesungen sind im Rahmen der sonstigen Vereinbarungen mÃ¶glich. Die Anschlussfugen zwischen Boden- und Wandfliesen werden elastisch versiegelt. \r\nElektrische Anlage\r\nDie Elektroinstallationen des Treppenhauses gemÃ¤ÃŸ Â§15 Bau-und Leistungsbeschreibung entfallen, es werden zusÃ¤tzlich folgende Elektroinstallationen ausgefÃ¼hrt: \r\nHAR/ZÃ¤hlerraum: ein Deckenauslass mit Schalter und eine Steckdose \r\nFlur EG (Einliegerwohnung): ein zusÃ¤tzlicher Deckenauslass \r\nGÃ¤ste WC: ein Wandauslass mit Schalter und eine Steckdose 	', 4890, 4890, 4890, 0, '', 0, 0, 0, 10, 1, 0, 0, 0, 4, 2, '2014-09-22', '2014-09-27'),
(126, 'ZusÃ¤tzliche Fliesenarbeiten', 'Es werden zusÃ¤tzliche Wand- bzw. Bodenfliesen zum Materialpreis im Haus verlegt. \r\nWandfliesen: 20,00 EUR pro mÂ² inkl. Mehrwertsteuer gemÃ¤ÃŸ Muster, FuÃŸboden mit Fliesen zum gleichen Materialpreis. Es werden Fliesen mit den KantenlÃ¤ngen > 12 cm und < 30 cm vorgesehen. DachschrÃ¤gen werden nicht gefliest. \r\nSockelfliesen, Sonderverlegungen, andere Formate und Dekore, sowie Mehrverfliesungen sind im Rahmen der sonstigen Vereinbarungen mÃ¶glich. \r\nDie Bauzeit verlÃ¤ngert sich um zwei Wochen.\r\n', 80, 80, 80, 2, '', 0, 0, 0, 0, 0, 0, 0, 0, 4, 2, '2014-09-22', '2014-09-27'),
(127, 'ZusÃ¤tzliche Porenbetonwand 11,5 cm', 'Es wird eine zusÃ¤tzliche 11,5 cm starke Porenbetonwand, beidseitig verspachtelt, im Erd- oder Obergeschoss des Hauses errichtet. Die AusfÃ¼hrung erfolgt gemÃ¤ÃŸ Bau- und Leistungsbeschreibung. \r\nDie Lage der zusÃ¤tzlichen Wand ist in die Zeichnungen einzufÃ¼gen. Die endgÃ¼ltige Anordnung der WÃ¤nde erfolgt durch den Auftragnehmer im Rahmen der Zeichnungen fÃ¼r den Bauantrag. Die Anordnung muss statisch mÃ¶glich sein. ', 200, 200, 200, 3, '', 0, 0, 0, 0, 0, 0, 0, 0, 4, 2, '2014-09-22', '2014-09-27'),
(128, 'ZusÃ¤tzliche Trockenbauwand 10 cm', 'Es wird eine zusÃ¤tzliche 10 cm starke Trockenbauwand im Dachgeschoss des Hauses errichtet. Die AusfÃ¼hrung erfolgt gemÃ¤ÃŸ Bau- und Leistungsbeschreibung. \r\nDie Lage der zusÃ¤tzlichen Wand ist in die Zeichnungen einzufÃ¼gen. Die endgÃ¼ltige Anordnung der WÃ¤nde erfolgt durch den Auftragnehmer im Rahmen der Zeichnungen fÃ¼r den Bauantrag.', 160, 160, 160, 3, '', 0, 0, 0, 0, 0, 0, 0, 0, 4, 2, '2014-09-22', '2014-09-27'),
(129, 'Enlarge house', 'Enlargement of the house by 38 m<sup>2</sup> per floor.', 999, 999, 999, 2, '', 38, 0, 0, 0, 0, 0, 1, 0, 1, 2, '2014-09-28', '2014-09-28');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_pictures`
--

CREATE TABLE IF NOT EXISTS `gallery_pictures` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `picture` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `gallery_pictures`
--

INSERT INTO `gallery_pictures` (`id`, `picture`, `title`, `description`, `user_id`, `created`, `modified`) VALUES
(21, 'Flair 134 ZD.jpg', 'Flair 134 ZD', 'Es geht auch farbig!', 6, '2014-08-23', '2014-08-23'),
(22, 'Bungalow 128.jpg', 'Bungalow 128', 'FÃ¼r Alle, die nicht hoch und runter laufen wollen!', 6, '2014-08-23', '2014-08-23'),
(23, 'Behringen 116 Korschenbroich.JPG', 'Behringen 116 Korschenbroich', 'Behringen 116 Nr.2', 6, '2014-08-23', '2014-08-23'),
(24, 'Behringen 116.JPG', 'Behringen 116', 'Behringen 116 Nr.1', 6, '2014-08-23', '2014-08-23'),
(25, 'Bungalow 78.JPG', 'Bungalow 78', '', 6, '2014-08-23', '2014-08-23'),
(26, 'Flair 113.JPG', 'Flair 113', '', 6, '2014-08-23', '2014-08-23'),
(27, 'Flair 124.JPG', 'Flair 124', '', 6, '2014-08-23', '2014-08-23'),
(28, 'Freiplanung 200.JPG', 'Freiplanung 200', '', 6, '2014-08-23', '2014-08-23'),
(29, 'Landhaus 142.JPG', 'Landhaus 142', '', 6, '2014-08-23', '2014-08-23'),
(30, 'vierte Referenz.JPG', 'vierte Referenz', 'Fertiges Einfamilienhaus mit Garten', 6, '2014-08-23', '2014-08-23'),
(31, 'dritte Referenz.JPG', 'dritte Referenz', 'Zwei fertige EinfamilienhÃ¤user aus der Gartenperspektive fotografiert.', 6, '2014-08-23', '2014-08-23'),
(32, 'zweite Referenz.JPG', 'zweite Referenz', 'Fertiges Einfamilienhaus', 6, '2014-08-23', '2014-08-23'),
(33, 'erste Referenz.JPG', 'erste Referenz', 'Fertiges Einfamilienhaus', 6, '2014-08-23', '2014-08-23');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `home_pictures`
--

INSERT INTO `home_pictures` (`id`, `picture`, `title`, `description`, `user_id`, `created`, `modified`) VALUES
(12, 'HomePicture_1.png', 'Herzlich willkommen bei IZ-Haus', '', 2, '2014-09-27', '2014-09-27');

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
  `bool_duplex` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `size_din` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `name`, `description`, `size`, `floors`, `price`, `type`, `bool_duplex`, `user_id`, `created`, `modified`, `size_din`) VALUES
(1, 'Stadt 118', 'Weitere Informationen Ã¼ber dieses Haus erfolgen in KÃ¼rze!\r\n\r\nIhr IZ-Haus Team', 117, 2, 132990, 1, 1, 2, '2014-08-22', '2014-09-28', 133),
(2, 'Stadt 120', 'Weitere Informationen Ã¼ber dieses Haus erfolgen in KÃ¼rze!\r\n\r\nIhr IZ-Haus Team', 124, 2, 139990, 1, 1, 2, '2014-08-22', '2014-09-28', 134),
(3, 'Stadt 130', 'Weitere Informationen Ã¼ber dieses Haus erfolgen in KÃ¼rze!\r\n\r\nIhr IZ-Haus Team', 130, 3, 147990, 1, 1, 2, '2014-08-22', '2014-09-28', 152),
(5, 'Stadtvilla', 'Weitere Informationen Ã¼ber dieses Haus erfolgen in KÃ¼rze!\r\n\r\nIhr IZ-Haus Team', 130, 2, 144990, 2, 0, 2, '2014-08-22', '2014-09-28', 130),
(6, 'Land 120', 'Weitere Informationen Ã¼ber dieses Haus erfolgen in KÃ¼rze!\r\n\r\nIhr IZ-Haus Team', 120, 2, 129980, 2, 0, 2, '2014-08-22', '2014-09-28', 132),
(7, 'Land 135', 'Weitere Informationen Ã¼ber dieses Haus erfolgen in KÃ¼rze!\r\n\r\nIhr IZ-Haus Team', 132, 2, 149980, 2, 0, 2, '2014-08-22', '2014-09-28', 145),
(8, 'Land 150', 'Weitere Informationen Ã¼ber dieses Haus erfolgen in KÃ¼rze!\r\n\r\nIhr IZ-Haus Team', 140, 2, 159990, 2, 0, 2, '2014-08-22', '2014-09-28', 154),
(9, 'Bungalow', 'Weitere Informationen Ã¼ber dieses Haus erfolgen in KÃ¼rze!\r\n\r\nIhr IZ-Haus Team', 91, 1, 113890, 2, 0, 2, '2014-09-22', '2014-09-28', 92),
(10, 'Land 160', 'Weitere Informationen Ã¼ber dieses Haus erfolgen in KÃ¼rze!\r\n\r\nIhr IZ-Haus Team', 160, 2, 165990, 2, 0, 2, '2014-09-22', '2014-09-28', 170),
(11, 'Land 190', 'Weitere Informationen Ã¼ber dieses Haus erfolgen in KÃ¼rze!\r\n\r\nIhr IZ-Haus Team', 190, 3, 209890, 2, 0, 2, '2014-09-22', '2014-09-28', 200),
(12, 'Modern 140', 'Weitere Informationen Ã¼ber dieses Haus erfolgen in KÃ¼rze!\r\n\r\nIhr IZ-Haus Team', 140, 2, 179990, 1, 1, 2, '2014-09-22', '2014-09-28', 150);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `house_pictures`
--

INSERT INTO `house_pictures` (`id`, `name`, `description`, `picture`, `type_flag`, `house_id`, `user_id`, `created`, `modified`) VALUES
(17, 'Dachgeschoss', '', '1_stadt-118-DG.png', 3, 1, 2, '2014-09-20', '2014-09-20'),
(18, 'Erdgeschoss', '', '1_stadt-118-EG.png', 1, 1, 2, '2014-09-20', '2014-09-20'),
(19, 'Keller', '', '1_stadt-118-KG.png', -1, 1, 2, '2014-09-20', '2014-09-20'),
(21, 'Eingang', '', '2_stadt-120-eingang.png', 0, 2, 2, '2014-09-20', '2014-09-20'),
(22, 'Garten', '', '2_stadt-120-garten.png', 0, 2, 2, '2014-09-20', '2014-09-20'),
(23, 'Dachgeschoss', '', '2_stadt-120-DG.png', 2, 2, 2, '2014-09-20', '2014-09-20'),
(24, 'Erdgeschoss', '', '2_stadt-120-EG.png', 1, 2, 2, '2014-09-20', '2014-09-20'),
(25, 'Keller', '', '2_stadt-120-KG.png', -1, 2, 2, '2014-09-20', '2014-09-20'),
(26, 'Seitenschnitt', '', '2_stadt-120-Schnitt.png', -2, 2, 2, '2014-09-20', '2014-09-20'),
(33, 'Eingang', '', '3_stadt-130-eingang.png', 0, 3, 2, '2014-09-20', '2014-09-20'),
(34, 'Garten', '', '3_stadt-130-garten.png', 0, 3, 2, '2014-09-20', '2014-09-20'),
(35, 'Dachgeschoss', '', '3_130-1-DG.png', 3, 3, 2, '2014-09-20', '2014-09-20'),
(36, 'Obergeschoss', '', '3_130-1-OG.png', 2, 3, 2, '2014-09-20', '2014-09-20'),
(37, 'Erdgeschoss', '', '3_130-1-EG.png', 1, 3, 2, '2014-09-20', '2014-09-20'),
(38, 'Keller', '', '3_130-1-KG.png', -1, 3, 2, '2014-09-20', '2014-09-20'),
(40, 'Eingang', '', '5_stadtvilla-eingang2.png', 0, 5, 2, '2014-09-20', '2014-09-20'),
(41, 'Garten', '', '5_stadtvilla-garten-2.png', 0, 5, 2, '2014-09-20', '2014-09-20'),
(42, 'Dachgeschoss', '', '5_stadtvilla-DG.png', 2, 5, 2, '2014-09-20', '2014-09-20'),
(43, 'Erdgeschoss', '', '5_stadtvilla-EG.png', 1, 5, 2, '2014-09-20', '2014-09-20'),
(44, 'Seitenschnitt', '', '5_stadtvilla-Schnitt.png', 5, 5, 2, '2014-09-20', '2014-09-20'),
(45, 'Eingang', '', '6_land-120-eingang.png', 0, 6, 2, '2014-09-20', '2014-09-20'),
(46, 'Garten', '', '6_land-120-garten.png', 0, 6, 2, '2014-09-20', '2014-09-20'),
(47, 'Dachgeschoss', '', '6_Land-120-DG.png', 2, 6, 2, '2014-09-20', '2014-09-20'),
(48, 'Erdgeschoss', '', '6_Land-120-EG.png', 1, 6, 2, '2014-09-20', '2014-09-20'),
(49, 'Seitenschnitt', '', '6_Land-120-Schnitt.png', 5, 6, 2, '2014-09-20', '2014-09-20'),
(50, 'Eingang', '', '7_land-135-eingang.png', 0, 7, 2, '2014-09-20', '2014-09-20'),
(51, 'Garten', '', '7_land-135-garten.png', 0, 7, 2, '2014-09-20', '2014-09-20'),
(52, 'Dachgeschoss', '', '7_Land-135-DG.png', 2, 7, 2, '2014-09-20', '2014-09-20'),
(53, 'Erdgeschoss', '', '7_Land-135-EG.png', 1, 7, 2, '2014-09-20', '2014-09-20'),
(54, 'Seitenschnitt', '', '7_Land-135-Schnitt.png', 5, 7, 2, '2014-09-20', '2014-09-20'),
(55, 'Garten', '', '8_land-150-garten.png', 0, 8, 2, '2014-09-20', '2014-09-20'),
(56, 'Dachgeschoss', '', '8_Land-150-DG.png', 2, 8, 2, '2014-09-20', '2014-09-20'),
(57, 'Erdgeschoss', '', '8_Land-150-EG.png', 1, 8, 2, '2014-09-20', '2014-09-20'),
(59, 'Eingang', '', '1_stadt-118-eingang.png', 0, 1, 2, '2014-09-22', '2014-09-22'),
(60, 'Garten', '', '1_stadt-118-garten.png', 0, 1, 2, '2014-09-22', '2014-09-22'),
(61, 'Eingang', '', '9_bungalow-92-eingang.png', 0, 9, 2, '2014-09-22', '2014-09-22'),
(62, 'Garten', '', '9_bungalow-92-garten.png', 0, 9, 2, '2014-09-22', '2014-09-22'),
(63, 'Erdgeschoss', '', '9_Bungalow-92-EG.png', 1, 9, 2, '2014-09-22', '2014-09-22'),
(64, 'Seitenschnitt', '', '9_Bungalow-92-Schnitt.png', 5, 9, 2, '2014-09-22', '2014-09-22'),
(66, 'Seitenschnitt', '', '1_stadt-118-Schnitt_ohneKeller.png', 5, 1, 2, '2014-09-27', '2014-09-27'),
(67, 'Seitenschnitt', '', '1_stadt-118-Schnitt.png', -2, 1, 2, '2014-09-27', '2014-09-27'),
(73, 'Seitenschnitt', '', '3_130-Schnitt_ohneKeller.png', 5, 3, 2, '2014-09-27', '2014-09-27'),
(74, 'Seitenschnitt', '', '3_130-1-Schnitt.png', -2, 3, 2, '2014-09-27', '2014-09-27'),
(75, 'Seitenschnitt', '', '2_stadt-120-Schnitt_ohneKeller.png', 5, 2, 2, '2014-09-27', '2014-09-27'),
(77, 'Seitenschnitt', '', '8_Land-150-Schnitt_ohneKeller.png', 5, 8, 2, '2014-09-27', '2014-09-27'),
(78, 'Seitenschnitt', '', '8_Land-150-Schnitt.png', -2, 8, 2, '2014-09-27', '2014-09-27'),
(79, 'Keller', '', '8_Land-150-KG.png', -1, 8, 2, '2014-09-28', '2014-09-28');

-- --------------------------------------------------------

--
-- Table structure for table `immocaster_storage`
--

CREATE TABLE IF NOT EXISTS `immocaster_storage` (
  `ic_id` int(16) unsigned NOT NULL AUTO_INCREMENT,
  `ic_desc` varchar(32) NOT NULL,
  `ic_key` varchar(128) NOT NULL,
  `ic_secret` varchar(128) NOT NULL,
  `ic_expire` datetime NOT NULL,
  PRIMARY KEY (`ic_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `immocaster_storage`
--

INSERT INTO `immocaster_storage` (`ic_id`, `ic_desc`, `ic_key`, `ic_secret`, `ic_expire`) VALUES
(23, 'REQUEST', 'ea567b98-3129-407c-ad73-f83a0b2f7f61', 'iV7L4OrUSS1VdGkbZKfMfBTkYl6%2FP4MbdnwMc%2BiL4Su7oDn4NRxIcX%2BUPRoEjgVwSQpAi8AdEcxWBNEp8x9ZyylcwZH7HhxbvwQ8Rjheg7o%3D', '2012-11-02 20:44:08'),
(22, 'APPLICATION', '7ceda6d2-be12-4bb2-93ad-f24e32b778ab', 'd9YWI%2F90I03Jo9aVYZKmUCv1IROLc89KT1Sf78sMAe2UrhqPxpuLqT0bQJ1c2YZn3RslRyVH5y3AOkbplIfPfUDBtMzIMJnaGfFkprEhATw%3D', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `job_offers`
--

CREATE TABLE IF NOT EXISTS `job_offers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `bool_active` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `job_offers`
--

INSERT INTO `job_offers` (`id`, `name`, `description`, `bool_active`, `user_id`, `created`, `modified`) VALUES
(3, 'Work work work!', 'public function delete($id) {\r\n    	if ($this->request->is(''get'')) {\r\n        	throw new MethodNotAllowedException();\r\n        }\r\n        if ($this->Customer->delete($id)) {\r\n        	$this->Session->setFlash(__(''The customer with id: %s has been deleted'',h($id)), ''alert-box'', array(''class''=>''alert-success''));\r\n            return $this->redirect(array(''action''=>''index''));\r\n        }\r\n    }', 0, 6, '2014-09-25', '2014-09-25');

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
  `building_tax` float NOT NULL,
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `built_region` varchar(200) NOT NULL,
  `built_address` varchar(200) NOT NULL,
  `built_zipcode` varchar(200) NOT NULL,
  `built_city` varchar(200) NOT NULL,
  `construction_office` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `lands`
--

INSERT INTO `lands` (`id`, `name`, `notes`, `land_size`, `land_price_per_m2`, `dev_size`, `dev_cost_per_m2`, `notary_cost`, `land_agent_cost`, `land_tax`, `building_tax`, `customer_id`, `user_id`, `created`, `modified`, `built_region`, `built_address`, `built_zipcode`, `built_city`, `construction_office`) VALUES
(8, 'TestLand 1', 'Additional Notes For the Land', 200, 1000, 100, 10, 2.5, 2.5, 5, 1.25, 6, 2, '2014-08-23', '2014-09-28', 'D-DÃ¼sseldorf', 'Eine StraÃŸe 32', '82109', 'DÃ¼sseldorf', 'DÃ¼sseldorf'),
(9, 'TestLand 2', '', 200, 1000, 2, 100, 2.5, 10, 5, 1.5, 6, 2, '2014-09-28', '2014-09-28', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE IF NOT EXISTS `proposals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `notes` text NOT NULL,
  `bool_locked` tinyint(1) NOT NULL,
  `summary` varchar(200) NOT NULL,
  `bank_receipt` varchar(200) NOT NULL,
  `contract` varchar(200) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `land_id` int(11) NOT NULL,
  `house_id` int(11) NOT NULL,
  `duplex_side` int(11) NOT NULL,
  `default_house_picture_id` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `proposals`
--

INSERT INTO `proposals` (`id`, `name`, `notes`, `bool_locked`, `summary`, `bank_receipt`, `contract`, `customer_id`, `land_id`, `house_id`, `duplex_side`, `default_house_picture_id`, `user_id`, `created`, `modified`) VALUES
(4, 'Test Proposal', 'Notes for the Proposal', 0, 'Angebot-14090004.pdf', 'Kalkulation-14090004.pdf', 'Vertrag-14090004.pdf', 6, 8, 2, 1, '21', 2, '2014-08-23', '2014-08-23'),
(5, 'proposal geht nur yu yweit___', 'immer noch doofer kunde', 0, 'Angebot-14090005.pdf', 'Kalkulation-14090005.pdf', 'Vertrag-14090005.pdf', 7, 9, 5, 0, '41', 2, '2014-09-28', '2014-09-28'),
(6, 'sdgsfgdf', 'ghfhdfh', 0, 'Angebot-14090006.pdf', '', '', 7, 0, 10, 0, '', 2, '2014-09-28', '2014-09-28');

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
  `phone` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `name`, `surname`, `phone`, `email`, `created`, `modified`) VALUES
(2, 'CarstenRobens', 'ecebba2e2c97789fd34481c4184fef9ebdbf2ca4', 0, 'Carsten', 'Robens', '01766085747', 'Robens@iap.uni-bonn.de', '2014-07-01', '2014-09-27'),
(6, 'elgatil', '3bdbc7fecbbed14dc303ef207f84b63dff5649fc', 0, 'Ricardo', 'Gomez', '345678', 'elgatil@gmail.com', '2014-07-01', '2014-07-01'),
(7, 'ZI', 'be6c009aadd2a4e4fc478df57040e89c5095da70', 1, 'Zbigniew', 'Iwaniuk', '021311333971', 'zi@tc-architekt.de', '2014-09-27', '2014-09-27'),
(8, 'LM', '0f4a6718fe21012abbdf4c2cfa486387b195c537', 1, 'Liewald', 'Marion', '021311333971', 'info@tc-architekt.de', '2014-09-27', '2014-09-27'),
(9, 'SK', '78942178bce5a5b76bd1bf0043c528195b1543fe', 2, 'Kerstin', 'von Stiegler', '01601518749', 'Kerstin@vonstiegler.de', '2014-09-27', '2014-09-27'),
(10, 'SR', '25b8ec5f24ee85b209890da891568359ee70aa49', 2, 'Radij', 'Scharf', '01722031326', 'Scharf.immo@web.de', '2014-09-27', '2014-09-27'),
(11, 'AW', '799c4c7bf5a09b746f648fb3d07458d670e4cb20', 3, 'Werner', 'Alosery', '017630419272', 'bauleitung@tc-architekt.de', '2014-09-27', '2014-09-28');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
