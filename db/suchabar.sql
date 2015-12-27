-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 25, 2015 at 11:58 AM
-- Server version: 5.5.35
-- PHP Version: 5.4.35-0+deb7u2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `suchabar`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(1000) COLLATE utf8_czech_ci NOT NULL,
  `date` datetime NOT NULL,
  `ratings` int(10) NOT NULL,
  `id_user` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `id_video` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_video` (`id_video`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `text`, `date`, `ratings`, `id_user`, `id_video`) VALUES
(2, 'Two crazy guys :D:)', '2015-12-25 00:00:00', 8, 'BarushCZ', 2),
(3, 'Don''t post videos if you can''t dance hahahahaa', '2015-12-26 00:00:00', -5, 'Hateerz', 2),
(4, '@Hateerz And where are your vids dude? :)', '2015-12-27 00:00:00', 4, 'BarushCZ', 2),
(5, 'Great moves!', '2015-12-25 00:00:00', 3, 'Kendas', 1),
(6, 'Thank you:)', '2015-12-26 00:00:00', 0, 'BarushCZ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ratings` int(1) NOT NULL,
  `id_video` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_video` (`id_video`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `ratings`, `id_video`) VALUES
(1, 5, 2),
(2, 4, 2),
(3, 1, 2),
(4, 5, 1),
(5, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `avatar` blob NOT NULL,
  `date_of_registration` datetime NOT NULL,
  `role` int(1) NOT NULL,
  `dance_style` int(2) NOT NULL,
  `skin` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `avatar`, `date_of_registration`, `role`, `dance_style`, `skin`) VALUES
(1, 'BarushCZ', 'heslo', '', '2015-12-25 00:00:00', 0, 0, 0),
(2, 'Kendas', 'heslo2', '', '2015-12-25 00:00:00', 1, 1, 0),
(3, 'Hateerz', '12345', '', '2015-12-25 00:00:00', 1, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `previewPic` longblob NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `dance_style` int(11) NOT NULL,
  `ratings` double NOT NULL,
  `views` int(11) NOT NULL,
  `date_of_upload` datetime NOT NULL,
  `i_am_on_video` tinyint(1) NOT NULL,
  `id_user` varchar(50) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`,`link`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `name`, `link`, `previewPic`, `description`, `dance_style`, `ratings`, `views`, `date_of_upload`, `i_am_on_video`, `id_user`) VALUES
(1, 'Dance battle - DnB step vs. Jumpstyle', 'cMJGmSWWT0Q', '', 'Unique dance battle between two dance styles on FEE CTU in Prague', 0, 0, 1, '2015-12-25 00:00:00', 0, 'BarushCZ'),
(2, 'Kendas & Vendas - Jumpstyle Loverz', 'yiZZAz1JGUM', '', 'This movie is not only about jumpstyle, but there are mainly memories and some funny scenes. Enjoy it!', 1, 0, 5, '2015-12-25 00:00:00', 1, 'BarushCZ');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_video`) REFERENCES `videos` (`id`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`id_video`) REFERENCES `videos` (`id`);

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
