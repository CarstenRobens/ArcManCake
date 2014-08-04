-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 04, 2014 at 07:46 
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=98 ;

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
(27, 1000, 1, 13, 4, '2014-07-10', '2014-07-10'),
(28, 1050, 1, 14, 4, '2014-07-10', '2014-07-10'),
(30, 2000, 1, 15, 4, '2014-07-10', '2014-07-10'),
(31, 30000, 1, 41, 4, '2014-07-11', '2014-07-11'),
(32, 34563, 1, 42, 4, '2014-07-11', '2014-07-11'),
(33, 5000, 1, 43, 4, '2014-07-11', '2014-07-11'),
(41, 3000, 1, 48, 10, '2014-08-04', '2014-08-04'),
(42, 5000, 1, 49, 10, '2014-08-04', '2014-08-04'),
(43, 5000, 1, 50, 10, '2014-08-04', '2014-08-04'),
(44, 8000, 1, 51, 10, '2014-08-04', '2014-08-04'),
(45, 9000, 1, 52, 10, '2014-08-04', '2014-08-04'),
(46, 500, 1, 53, 10, '2014-08-04', '2014-08-04'),
(47, 4400, 1, 54, 10, '2014-08-04', '2014-08-04'),
(48, 5000, 1, 47, 4, '2014-08-04', '2014-08-04'),
(49, 3000, 1, 48, 4, '2014-08-04', '2014-08-04'),
(50, 5000, 1, 50, 4, '2014-08-04', '2014-08-04'),
(51, 5000, 1, 49, 4, '2014-08-04', '2014-08-04'),
(52, 9000, 1, 52, 4, '2014-08-04', '2014-08-04'),
(53, 500, 1, 53, 4, '2014-08-04', '2014-08-04'),
(54, 4400, 1, 54, 4, '2014-08-04', '2014-08-04'),
(55, 8000, 1, 51, 4, '2014-08-04', '2014-08-04'),
(56, 5000, 1, 47, 11, '2014-08-04', '2014-08-04'),
(57, 3000, 1, 48, 11, '2014-08-04', '2014-08-04'),
(58, 5000, 1, 49, 11, '2014-08-04', '2014-08-04'),
(59, 5000, 1, 50, 11, '2014-08-04', '2014-08-04'),
(60, 8000, 1, 51, 11, '2014-08-04', '2014-08-04'),
(61, 9000, 1, 52, 11, '2014-08-04', '2014-08-04'),
(62, 500, 1, 53, 11, '2014-08-04', '2014-08-04'),
(63, 4400, 1, 54, 11, '2014-08-04', '2014-08-04'),
(77, 200, 1, 36, 11, '2014-08-04', '2014-08-04'),
(78, 34563, 1, 42, 11, '2014-08-04', '2014-08-04');

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
  `bool_garage` tinyint(1) NOT NULL,
  `bool_custom` tinyint(1) NOT NULL,
  `bool_external` tinyint(1) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `extras`
--

INSERT INTO `extras` (`id`, `name`, `description`, `default_price`, `picture`, `bool_size_dependent`, `bool_garage`, `bool_custom`, `bool_external`, `category_id`, `user_id`, `created`, `modified`) VALUES
(14, 'Jacuzzi', 'One of the all-time classic adventures, multi BAFTA-nominated "Broken Sword: Director''s Cut" pitches sassy journalist Nico Collard, and intrepid American George Stobbart into a mysterious journey of intrigue and jeopardy. Guide George and Nico on their globe-spanning adventure, exploring exotic locations, solving ancient mysteries, and thwarting a dark conspiracy to reveal the secret truths of the Knights Templar. \r\n\r\n"Broken Sword: The Directorâ€™s Cut" introduces an intricate new narrative thread, alongside the classic story that has charmed millions of players. Itâ€™s time to experience George and Nicoâ€™s worldwide adventure in a whole new way, with brand new puzzles, hilarious new jokes, and the distinctive, rich story that made the series so deservedly renowned. This is adventure gaming at its very best. ', 1050, 'jacuzzi.jpg', 0, 0, 0, 0, 4, 4, '2014-07-02', '2014-07-22'),
(15, 'Garden maze', 'Get lost!', 2000, 'maze.jpg', 0, 0, 0, 0, 3, 4, '2014-07-02', '2014-08-04'),
(17, 'T-Rex', 'Rooooooooaarr\r\n\r\nEver wonder how it feels to sail a half-million-ton supertanker through the perfect storm? To take on illegal whale hunters in the Antarctic? Or to feel the rush of being part of the Coast Guard as you evacuate a cruise liner in distress? Ship Simulator Extremes has players take on exciting missions all over the world as they pilot an impressive array of vessels and live the stories of real ship captains. With missions based on actual events in realistic environments at locations all over the world, the new Ship Simulator game is sure to take you to extremes! ', 1000, 'trex.jpg', 0, 0, 0, 0, 6, 6, '2014-07-04', '2014-08-04'),
(31, 'Something boring', 'This tutorial is written for Django 1.6 and Python 2.x. If the Django version doesnâ€™t match, you can refer to the tutorial for your version of Django by using the version switcher at the bottom right corner of this page, or update Django to the newest version. If you are using Python 3.x, be aware that your code may need to differ from what is in the tutorial and you should continue using the tutorial only if you know what you are doing with Python 3.x.', 59, '', 0, 0, 0, 0, 3, 6, '2014-07-09', '2014-07-09'),
(33, 'stupid custom extra', 'f your background is in plain old PHP (with no use of modern frameworks), youâ€™re probably used to putting code under the Web serverâ€™s document root (in a place such as /var/www). With Django, you donâ€™t do that. Itâ€™s not a good idea to put any of this Python code within your Web serverâ€™s document root, because it risks the possibility that people may be able to view your code over the Web. Thatâ€™s not good for security.', 345, '', 1, 0, 1, 0, 1, 6, '2014-07-09', '2014-07-09'),
(35, 'Custom stupid external extra for Jose', 'Youâ€™ve started the Django development server, a lightweight Web server written purely in Python. Weâ€™ve included this with Django so you can develop things rapidly, without having to deal with configuring a production server â€“ such as Apache â€“ until youâ€™re ready for production.\r\n\r\nNowâ€™s a good time to note: Donâ€™t use this server in anything resembling a production environment. Itâ€™s intended only for use while developing. (Weâ€™re in the business of making Web frameworks, not Web servers.)', 126, '', 0, 0, 1, 0, 4, 6, '2014-07-10', '2014-08-04'),
(36, 'Oven', 'Web Components usher in a new era of web development based on encapsulated and interoperable custom elements that extend HTML itself. Built atop these new standards, Polymer makes it easier and faster to create anything from a button to a complete application across desktop, mobile, and beyond.', 200, '', 0, 0, 0, 0, 1, 6, '2014-07-11', '2014-07-11'),
(37, 'Terrace', 'Estamos en pleno julio ya: unos cuantos ya estarÃ¡n de vacaciones aprovechando la ventana que nos abre el verano, otros se encontrarÃ¡n trabajando en sus respectivas tareasâ€¦ pero lo que es seguro es que contarÃ©is con unos cuantos momentos de tranquilidad o aburrimiento entre medias. Para salvar todos esos momentos llegan los mejores juegos Android de la semana, una secciÃ³n en la que recopilamos toda la semana en lo que a juegos se refiere y ademÃ¡s os damos unos cuantos lanzamientos por si no habÃ©is tenido suficiente. Â¡Comenzamos!', 1004, '', 0, 0, 0, 0, 6, 6, '2014-07-11', '2014-07-11'),
(38, 'Dog House', 'Cartoon Network lleva una buena sucesiÃ³n de juegos lanzados en Google Play, y con Monsters Ate My Birthday parece que quieren reafirmar esa tendencia: muchos monstruos, tarta, superpoderes, una aventura Ã©pica llena de rutas secretasâ€¦ si querÃ©is diversiÃ³n mÃ¡gica llena de pasteles, habÃ©is encontrado vuestro juego ideal sin lugar a dudas. Lo tenÃ©is disponible en Google Play al precio de 3.66â‚¬, algo caro, pero no han vuelto a cometer el error de combinarlo con pagos dentro de la aplicaciÃ³n.', 145, '', 0, 0, 0, 0, 6, 6, '2014-07-11', '2014-07-11'),
(39, 'Fracking Big TV', 'Team 17 es conocido entre nosotros por el enorme trabajo que han hecho en su prestigioso Worms, pero eso no significa que sea lo Ãºnico que han hecho en todos los aÃ±os que llevan en activo. Fue en 1993 cuando lanzaron Superfrog, un juego que quedÃ³ sepultado bajo el Ã©xito de Worms dos aÃ±os despuÃ©s, pero tuvo sus seguidores que disfrutarÃ¡n mucho de la remasterizaciÃ³n HD que ha lanzado el equipo en Android: 24 niveles en seis mundos diferentes, ademÃ¡s de grÃ¡ficos y controles mejorados y adaptados. Lo tenÃ©is al suculento precio de 2.49â‚¬ en Google Play.', 699, '', 0, 0, 0, 0, 5, 6, '2014-07-11', '2014-07-11'),
(40, 'Giant Desk', 'Noodlecake Studios es la casa que da origen a otro juego que vale la pena probarlo: en Wayward Souls tendremos que combatir en mazmorras que se generan de manera aleatoria contra monstruos y magia, de tal forma que tendremos partidas rÃ¡pidas que nunca serÃ¡n iguales (al estilo The Binding of Issac, por ejemplo) y que nos harÃ¡n repetir una y otra vez. Tiene una dificultad elevada, para que nos vamos a engaÃ±ar, pero es uno de estos juegos que merece mucho la pena jugarlo. QuizÃ¡s el precio sea lo Ãºnico que eche atrÃ¡s a muchos, 3.43â‚¬, pero es muy probable que lo veamos en un prÃ³ximo Humble Bundle teniendo en cuenta la trayectoria del estudio.', 206, '', 0, 0, 0, 0, 3, 6, '2014-07-11', '2014-07-11'),
(42, 'Superbatcomputer', 'Con el mirroring podemos transmitir todo lo que aparece en el mÃ³vil en la televisiÃ³n; sonido, juegos y pelÃ­culas incluidos. Sin embargo muchos se han quedado fuera de poder disfrutar de una de las opciones mÃ¡s Ãºtiles. Para solucionar esto estÃ¡n los desarrolladores de XDA, que hoy nos trae la posibilidad de activar el mirroring en casi cualquier Android con KitKat, eso sÃ­ tiene una pega y es que necesitaremos tener permisos root en nuestro dispositivo.', 34563, '', 0, 0, 0, 0, 2, 6, '2014-07-11', '2014-07-11'),
(43, 'Autodresser', 'La app ha sido modificada para funcionar en mÃ¡s terminales. Se ha comprobado que funciona en ASUS PadFone 2, Sony Xperia Z2, Sony Xperia ZL, Sony Z Ultra, HTC One M8 (Including GPE), Motorola Moto X, Samsung Note 8 Tab, Samsung Note Pro 12.2 Tab, Nexus 7 2012, QHD Find 7, LG GPad 8.3 aunque no lo han conseguido en el Galaxy S3 o el Note 2.', 5000, '', 0, 0, 0, 0, 4, 6, '2014-07-11', '2014-07-11'),
(45, 'Batmobile', 'An unlikely pair, young Kate Walker and old, eccentric Hans Voralberg now set off on a journey together: in search of the last of the fabled Syberian mammoths at the heart of a long and forgotten universe. The surreal quest Hans began alone several years ago will come to a final close as he and Kate face obstacles far more dangerous than ever before, testing their courage and determination.', 300000, 'batmobile.jpg', 0, 0, 0, 0, 2, 6, '2014-07-22', '2014-07-22'),
(46, 'Cellar', 'You are your spells! The Lichdom: Battlemage spell crafting system offers an enormous range of customization. Every Mage is the product of crafted magic that reflects the individual''s play style. Whether you prefer to target your foes from a safe distance, wade into combat and unleash your power at point-blank range, or pit your enemies against each other, endless spell customization lets you become the Mage you want to be. ', 5000, 'cellar.jpg', 1, 0, 0, 0, 5, 6, '2014-07-22', '2014-07-22'),
(47, 'MehrgrÃ¼ndung', 'The display assembly is held in place by a large amount of adhesive on the underside of the large copper ESD shield. In the next few steps, you will be using a plastic spudger to release this adhesive.\r\nWork carefully and slowly, making sure to not break the I/O data cable.', 5000, '', 0, 0, 0, 1, 1, 6, '2014-08-04', '2014-08-04'),
(48, 'Erdbebenzone', 'Use the flat end of a spudger to carefully flip up the retaining flaps on the digitizer ribbon cable ZIF sockets.\r\nMake sure you are flipping up the retaining flaps, not the sockets themselves.\r\nUse the tip of a spudger to pull the digitizer ribbon cable straight out of its socket', 3000, '', 0, 0, 0, 1, 2, 6, '2014-08-04', '2014-08-04'),
(49, 'Eigenleistung AuÃŸennanlage', 'Peel the upper piece of black adhesive tape completely up off the Nexus 7.\r\nSimilarly, peel the lower piece of black adhesive tape, but only as far as the copper strip.\r\nIt is helpful to fold this piece of tape back on itself to keep it out of the way.\r\nWhilst pulling the tape, be sure that the metal shield does not lift up. Hold the shield in place, and if it lifts up, re-seat it in the spring clips around the perimeter of the shielded area.', 5000, '', 0, 0, 0, 1, 4, 6, '2014-08-04', '2014-08-04'),
(50, 'Eigenleistung Maler-/Bodenarbeiten', 'Gently insert a plastic opening tool near the top of the Nexus 7 between the rear panel and the front panel assembly.\r\nCarefully run the plastic opening tool along the top edge to pry the rear panel away from the front panel assembly of the Nexus 7', 5000, '', 0, 0, 0, 1, 3, 6, '2014-08-04', '2014-08-04'),
(51, 'Garage 6 m', 'Web Components usher in a new era of web development based on encapsulated and interoperable custom elements that extend HTML itself. Built atop these new standards, Polymer makes it easier and faster to create anything from a button to a complete application across desktop, mobile, and beyond.', 8000, '', 0, 1, 0, 1, 6, 6, '2014-08-04', '2014-08-04'),
(52, 'HausanschluÃŸkosten', 'The latest Linux GPU benchmarks at Phoronix for your viewing pleasure are looking at the OpenCL compute performance with the latest AMD and NVIDIA binary blobs while also marking down the performance efficiency and overall system power consumption.', 9000, '', 0, 0, 0, 1, 4, 6, '2014-08-04', '2014-08-04'),
(53, 'Baustrom- und Bauwasseranschluss', 'The Linux 3.16 kernel could be released as soon as today with its development having calmed down but if you''ve refrained from reading up on this new kernel, here''s the rundown on the new features and capabilities of this 2014 late-summer kernel debut.', 500, '', 0, 0, 0, 1, 4, 6, '2014-08-04', '2014-08-04'),
(54, 'Lageplan, Genehmigungskosten', 'Belkin revived the Linksys WRT54G in a new 802.11ac model earlier this year and one of its selling points has been the OpenWRT support as what made the WRT54G legendary. However, OpenWRT developers and fans are yet to be satisfied by this new router.', 4400, '', 0, 0, 0, 1, 4, 6, '2014-08-04', '2014-08-04'),
(55, 'cool Garage ', 'hen there is something tricky, which we should think about: if they want to do a garage with babsis dad, then the factor of this external extra will be set to zero (but it must remain in the list!) and a bought normal extra need to be added to the list above ... question is whether we can easily do this automatically ....\r\nhe salesperson only enters the desired amount of additional square meters, the price in the DB can be simply the price per square meter. then the system need to check how many floors (and possibly basement) and calculate the factor accordingly (e.g. 1000â‚¬ per square meter, 3 floors, 10 additional square meter -> factor 30 and price ', 5000, '', 0, 1, 0, 0, 6, 6, '2014-08-04', '2014-08-04');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `home_pictures`
--

INSERT INTO `home_pictures` (`id`, `picture`, `title`, `description`, `user_id`, `created`, `modified`) VALUES
(5, 'home3.jpg', 'Gugen', 'Bilbao', 4, '2014-07-02', '2014-07-02'),
(7, 'home2.jpg', 'weird house', 'lkdvn', 4, '2014-07-02', '2014-07-02'),
(9, 'home1.png', 'Gehry something', 'png yes!', 4, '2014-07-02', '2014-07-02'),
(11, 'homemanor.jpg', 'Cool Manor', 'Use the <paper-dialog> element to create a dialog. Set a title on a dialog using the heading published property.\r\n\r\nYou can use any kind of children inside the dialog. For action buttons, add the dismissive or affirmative attributes to place the controls (typically buttons) at the bottom of the dialog:', 6, '2014-07-22', '2014-07-22');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `name`, `description`, `size`, `floors`, `price`, `type`, `user_id`, `created`, `modified`) VALUES
(3, 'Wayne''s Manor', 'Beautiful palace. For a long time it has been home for the illustrious Wayne familie\r\n\r\nNote: Batcave not included', 2000, 2, 1234570000, 2, 6, '2014-07-01', '2014-07-01'),
(4, 'Batcave', 'HQ of Batman\r\n\r\nNote: Waynes Manor not included', 1000, 2, 2147480000, 3, 3, '2014-07-01', '2014-07-01'),
(5, 'Stark tower', 'Obviamente detrÃ¡s de cada consola del mercado existe un punto que diferencia la plataforma del resto y es el software / juegos disponible para cada una de ellas y NVIDIA lo centraliza a travÃ©s de su aplicaciÃ³n TegraZone y Shield.\r\nNVIDIA deja claro que con Shield Tablet se puede jugar a cualquier juego Android del mercado bien sea utilizando la pantalla tÃ¡ctil o bien un mando (existe un software de NVIDIA para asignar pulsaciones fÃ­sicas del mando a zonas en pantalla para juegos con controles virtuales).', 20000, 0, 90000000, 3, 6, '2014-07-22', '2014-07-22');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `house_pictures`
--

INSERT INTO `house_pictures` (`id`, `name`, `description`, `picture`, `type_flag`, `house_id`, `user_id`, `created`, `modified`) VALUES
(7, 'Bat', 'sdnj', 'batcave.jpg', 0, 4, 2, '2014-07-03', '2014-07-03'),
(8, 'Batcave entry', 'sefsf', 'batcave2.jpg', 0, 4, 2, '2014-07-03', '2014-07-03'),
(9, 'pool', 'ksjdfnsn', 'cool.jpg', 0, 3, 2, '2014-07-03', '2014-07-03'),
(10, 'Front', 'sdgfgdfrgdf', 'wayne.jpg', 0, 3, 2, '2014-07-03', '2014-07-03'),
(11, 'first-floor', '', 'floorplan1-wayneManor.jpg', 2, 3, 6, '2014-07-07', '2014-07-07'),
(13, 'Basement', 'The Polymer core elements set includes several elements for application layout, including creating toolbars, app bars, tabs, and side nav consistent with the material design guidelines.\r\n\r\nSee Layout elements for information on using these elements.', 'basement manor.jpg', -1, 3, 6, '2014-07-22', '2014-07-22'),
(14, 'Stark Tower Main', 'The number of results that are fetched is exposed to the user as the limit parameter. It is generally undesirable to allow users to fetch all rows in a paginated set. By default CakePHP limits the maximum number of rows that can be fetched to 100. If this default is not appropriate for your application, you can adjust it as part of the pagination options:', 'Stark_Tower.jpg', 0, 5, 0, '2014-07-22', '2014-07-22'),
(15, 'Stark tower 2', 'With the release 0.6.2 the paragraph properties has been moved into a separate Class!\r\nSo, every text element now has two style properties: FONT and PARAGRAPH. See the following example for more information:', 'starktower2.png', 0, 5, 0, '2014-07-23', '2014-07-23'),
(16, 'Stark tower 3', ' OLD release, 0.6.1:\r\n$styleFont = array(''bold''=>true, ''size''=>16, ''name''=>''Calibri'', ''align''=>''center'', ''spaceAfter''=>100);\r\n$section->addText(''Hello World'', $styleFont);\r\n\r\n// NEW release, 0.6.2:\r\n$styleFont = array(''bold''=>true, ''size''=>16, ''name''=>''Calibri'');\r\n$styleParagraph = array(''align''=>''center'', ''spaceAfter''=>100);\r\n$section->addText(''Hello World'', $styleFont, $styleParagraph', 'StarTowerDay-Avengers.png', 0, 5, 0, '2014-07-23', '2014-07-23'),
(17, 'Stark tower floorplan', '$myTextElement->setBold();\r\n$myTextElement->setName(''Verdana'');\r\n$myTextElement->setSize(22);\r\n\r\n// At least write the document to webspace:\r\n$objWriter = PHPWord_IOFactory::createWriter($PHPWord, ''Word2007'');\r\n$objWriter->save(''helloWorld.docx'')', 'starktowerfloorplan.jpg', 1, 5, 0, '2014-07-23', '2014-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `Immocaster_Storage`
--

CREATE TABLE IF NOT EXISTS `Immocaster_Storage` (
  `ic_id` int(16) unsigned NOT NULL AUTO_INCREMENT,
  `ic_desc` varchar(32) NOT NULL,
  `ic_key` varchar(128) NOT NULL,
  `ic_secret` varchar(128) NOT NULL,
  `ic_expire` datetime NOT NULL,
  PRIMARY KEY (`ic_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `proposals`
--

INSERT INTO `proposals` (`id`, `name`, `notes`, `customer_id`, `land_id`, `house_id`, `default_house_picture_id`, `user_id`, `created`, `modified`) VALUES
(2, 'Prop for cus b 1', '', 3, 4, 3, '', 4, '2014-07-04', '2014-07-04'),
(3, 'Prop for cus a 33', 'trfyhjkl;[', 1, 1, 4, '', 3, '2014-07-05', '2014-07-05'),
(4, 'Very expensive house', 'Tooooooooooooo expensive', 6, 2, 3, '9', 6, '2014-07-07', '2014-07-23'),
(5, 'Secret Lair', 'Cool', 6, 2, 4, '', 6, '2014-07-07', '2014-07-07'),
(6, 'Prop for cus a2: Cheap House', '', 2, 0, 0, '', 3, '2014-07-09', '2014-07-09'),
(11, 'first proposal', 'so, i spoke with Babsis Dad yesterday, but first to your comments:\r\n\r\nButtons: i mean the edit and delete buttons look gread, altough here is already one comment from Babsis Dad: delete must be red button (should be no problem)\r\n\r\nUsers: I donâ€™t really care what we do here ... we can do it as a tabular, but also there the actions should be buttons\r\n\r\nadd many extras: no it will stay one column, there will be max 6 categories and folded in it fits very well on one page with the add button at the bottom\r\n\r\nanyway, letâ€™s get to the important stuff:\r\n\r\n(we might need to skype also since there are some details which i''m not sure if i can perfectly describe them in two sentences)\r\n\r\nokay, so regarding the external extras: (maybe also open the excel sheet for comparison) there are 8 entries and they need to always added with default values when a proposal is created! its apparently important and i can also try to explain this to you on skype', 5, 0, 0, '', 6, '2014-08-04', '2014-08-04');

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
