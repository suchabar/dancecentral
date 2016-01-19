-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 18, 2016 at 07:09 PM
-- Server version: 5.5.41-log
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dancecentral`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` int(11) NOT NULL,
  `text` varchar(1000) COLLATE utf8_czech_ci NOT NULL,
  `date` datetime NOT NULL,
  `ratings` int(10) NOT NULL,
  `id_user` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `id_video` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=43 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `text`, `date`, `ratings`, `id_user`, `id_video`) VALUES
(2, 'Two crazy guys :D:)', '2015-12-25 00:00:00', 12, 'BarushCZ', 2),
(3, 'Don''t post videos if you can''t dance hahahahaa', '2015-12-26 00:00:00', -7, 'Hateerz', 2),
(4, '@Hateerz And where are your vids dude? :)', '2015-12-27 00:00:00', 4, 'BarushCZ', 2),
(5, 'Great moves!', '2015-12-25 00:00:00', 8, 'Kendas', 1),
(6, 'Thank you:)', '2015-12-26 00:00:00', 1, 'BarushCZ', 1),
(32, 'čoveče', '2016-01-16 14:11:13', -1, 'BarushCZ', 11),
(42, 'Perfectly into beat ! ...2:20 maaaad! :D', '2016-01-17 23:39:27', 0, 'BarushCZ', 11);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
`id` int(11) NOT NULL,
  `ratings` int(1) NOT NULL,
  `id_video` int(11) NOT NULL,
  `id_user` varchar(50) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `ratings`, `id_video`, `id_user`) VALUES
(1, 5, 2, 'BarushCZ'),
(2, 4, 2, 'Hateerz'),
(3, 1, 2, 'Kendas'),
(4, 5, 1, 'BarushCZ'),
(5, 4, 1, 'Hateerz'),
(16, 3, 4, 'BarushCZ'),
(17, 4, 5, 'BarushCZ'),
(18, 3, 4, 'Hateerz'),
(19, 4, 5, 'Hateerz'),
(20, 5, 6, 'Hateerz'),
(21, 4, 6, 'BarushCZ'),
(32, 2, 6, 'Kendas'),
(33, 5, 11, 'BarushCZ'),
(34, 5, 4, 'Kendas'),
(35, 5, 1, 'Kendas'),
(36, 1, 5, 'Kendas'),
(38, 4, 16, 'BarushCZ'),
(39, 5, 15, 'BarushCZ'),
(43, 4, 10, 'BarushCZ'),
(44, 4, 10, 'Kendas'),
(45, 5, 11, 'Kendas');

-- --------------------------------------------------------

--
-- Table structure for table `thumbs`
--

CREATE TABLE IF NOT EXISTS `thumbs` (
`id` int(11) NOT NULL,
  `id_user` varchar(50) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `id_comment` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `thumbs`
--

INSERT INTO `thumbs` (`id`, `id_user`, `id_comment`) VALUES
(1, 'BarushCZ', 2),
(2, 'BarushCZ', 3),
(60, 'BarushCZ', 32),
(3, 'Kendas', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `avatar` varchar(50) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_of_registration` datetime NOT NULL,
  `role` int(1) NOT NULL,
  `dance_style` int(2) NOT NULL,
  `skin` int(11) NOT NULL,
  `hasAvatar` int(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `avatar`, `email`, `password`, `date_of_registration`, `role`, `dance_style`, `skin`, `hasAvatar`) VALUES
(1, 'BarushCZ', 'BarushCZ.jpeg', 'suchanova.barbora@gmail.com', '$2y$11$rbjvlTeouDXEXp87ezsJ4.mYXsI9GEalVLxACh1H4LF92IaItczry', '2015-12-25 00:00:00', 0, 1, 1, 0),
(2, 'Kendas', 'Kendas.jpg', 'kendas@gmail.com', '$2y$10$YzTUs85B0XwL8dvstdL84O1IfcBEX3MNdDcNXFpqdJy3w/QMmfSAS', '2015-12-25 00:00:00', 1, 2, 3, 0),
(3, 'Hateerz', 'Hateerz.jpg', 'janjanjan@gmail.com', '$2y$10$YzTUs85B0XwL8dvstdL84O1IfcBEX3MNdDcNXFpqdJy3w/QMmfSAS', '2015-12-25 00:00:00', 1, 4, 1, 1),
(18, 'čeňa', 'čeňa.jpg', 'cenamail@gmail.com', '$2y$11$2/8mnMKcrTJ6VzxvvYsj9OKNStEBlAN8.YcPTaDrF1OJpUWQaDZ4O', '2016-01-15 21:42:25', 1, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
`id` int(11) NOT NULL,
  `name` varchar(40) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `dance_style` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `date_of_upload` datetime NOT NULL,
  `i_am_on_video` tinyint(1) NOT NULL,
  `id_user` varchar(50) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `name`, `link`, `dance_style`, `views`, `date_of_upload`, `i_am_on_video`, `id_user`) VALUES
(1, 'Dance battle - DnB step vs. Jumpstyle', 'cMJGmSWWT0Q', 1, 231, '2015-12-25 00:00:00', 0, 'BarushCZ'),
(2, 'Kendas & Vendas - Jumpstyle Loverz', 'yiZZAz1JGUM', 2, 38, '2015-12-25 00:00:00', 1, 'BarushCZ'),
(4, 'Kisko.O & ManMind 2 -dnb step', 'SXN1vlYygsY', 1, 11, '2015-12-20 00:00:00', 1, 'BarushCZ'),
(5, 'Lux Jumper - Jumpstyle', 'XMxe6nFt_HQ', 2, 21, '2016-01-12 00:00:00', 1, 'Kendas'),
(6, 'Cutting Shapes Compilation #6 ', 's3JE9kefxr0', 4, 16, '2016-01-14 00:00:00', 1, 'BarushCZ'),
(9, 'DNB Dance/Step | Meeting Karvina', 'NJVE6wxpEJY', 1, 68, '2016-01-01 00:00:00', 1, 'BarushCZ'),
(10, 'Jumpstyle (hardjump - sidejump)', 'yPjk-wJjEXU', 2, 71, '2016-01-04 00:00:00', 0, 'Kendas'),
(11, 'OS ANGELES JUMPSTYLE ', 'MCLCpaNSFFc', 2, 359, '2016-01-28 00:00:00', 1, 'Kendas'),
(15, 'Got Damn [Cutting Shapes]', '-ePLpTuqNb8', 4, 124, '2016-01-14 00:00:00', 1, 'BarushCZ'),
(16, 'Double-T [FREE STEP]', 'gSQjk4YSDDs', 3, 125, '2016-01-01 00:00:00', 1, 'BarushCZ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`), ADD KEY `id_user` (`id_user`), ADD KEY `id_video` (`id_video`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
 ADD PRIMARY KEY (`id`), ADD KEY `id_video` (`id_video`), ADD KEY `id_user` (`id_user`), ADD KEY `id_user_2` (`id_user`), ADD KEY `id_video_2` (`id_video`);

--
-- Indexes for table `thumbs`
--
ALTER TABLE `thumbs`
 ADD PRIMARY KEY (`id`), ADD KEY `ip_adress` (`id_user`,`id_comment`), ADD KEY `id_comment` (`id_comment`), ADD KEY `id_user` (`id_user`), ADD KEY `id_comment_2` (`id_comment`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD KEY `hasAvatar` (`hasAvatar`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`,`link`), ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `thumbs`
--
ALTER TABLE `thumbs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_video`) REFERENCES `videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`id_video`) REFERENCES `videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thumbs`
--
ALTER TABLE `thumbs`
ADD CONSTRAINT `id_comment` FOREIGN KEY (`id_comment`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
