-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 06, 2022 at 11:28 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b_soc_net`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `id_comment` int(11) NOT NULL,
  `desc_comment` mediumblob NOT NULL,
  `date_comment` date NOT NULL,
  PRIMARY KEY (`id_user`,`id_post`,`id_comment`),
  KEY `id_post` (`id_post`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

DROP TABLE IF EXISTS `levels`;
CREATE TABLE IF NOT EXISTS `levels` (
  `cod_level` int(11) NOT NULL,
  `desc_level` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cod_level`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`cod_level`, `desc_level`) VALUES
(1, 'Administrator'),
(2, 'Normal user');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `id_like` int(11) NOT NULL,
  `set_like` decimal(1,0) NOT NULL,
  PRIMARY KEY (`id_user`,`id_post`,`id_like`),
  KEY `id_post` (`id_post`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `desc_post` text COLLATE utf8_spanish_ci NOT NULL,
  `date_post` timestamp NOT NULL,
  `photo_post` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_post`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id_post`, `id_user`, `desc_post`, `date_post`, `photo_post`) VALUES
(1, 1, 'asdfasdf', '2022-01-06 02:02:16', '1641434536_'),
(2, 1, 'adsfadsf', '2022-01-06 02:03:04', '1641434584_'),
(3, 1, 'asdfasdf', '2022-01-06 02:04:12', NULL),
(4, 1, 'asdfasdf', '2022-01-06 02:06:58', NULL),
(5, 1, 'asdfasdf', '2022-01-06 02:08:33', NULL),
(6, 1, 'asdfasdf', '2022-01-06 02:23:00', NULL),
(7, 1, 'asdfasdf', '2022-01-06 02:36:09', NULL),
(8, 1, 'asdfasdf', '2022-01-06 02:37:50', NULL),
(9, 1, 'asdf', '2022-01-06 02:39:57', NULL),
(10, 1, 'pompon', '2022-01-06 02:40:10', '1641436810_pompon.jpg'),
(11, 1, 'conejo', '2022-01-06 02:41:18', '1641436878_pompon.jpg'),
(12, 1, 'asdf', '2022-01-06 02:42:08', '1641436928_conejo.jpg'),
(13, 1, 'Posteo sin imagen', '2022-01-06 02:43:50', NULL),
(14, 1, 'posteo con imagen', '2022-01-06 02:44:15', '1641437055_20220103_184820.jpg'),
(15, 1, 'La mascota de la familia!', '2022-01-06 04:13:41', '1641442421_conejo.jpg'),
(16, 1, 'hola que onda!', '2022-01-06 04:17:46', NULL),
(17, 1, 'Hola, soy Juanchis10', '2022-01-06 16:09:52', NULL),
(18, 1, 'Probando posteo con imagen... foto pompon!', '2022-01-06 16:10:25', '1641485425_conejo.jpg'),
(19, 1, '', '2022-01-06 16:28:14', NULL),
(20, 1, '', '2022-01-06 16:28:16', NULL),
(21, 1, '', '2022-01-06 16:28:19', NULL),
(22, 1, '', '2022-01-06 16:28:36', NULL),
(23, 1, 'Dibujo de Julita', '2022-01-06 16:58:47', '1641488327_20220103_194138.jpg'),
(24, 1, 'ÜLTIMO POST', '2022-01-06 17:07:24', NULL),
(25, 1, 'ultimo post con photo', '2022-01-06 17:08:52', '1641488932_2021-02-27 19.25.06.jpg'),
(26, 1, 'post sin foto', '2022-01-06 17:09:28', NULL),
(27, 1, 'Vicky y Julita', '2022-01-06 17:09:45', '1641488985_2021-02-20 12.22.29.jpg'),
(28, 1, 'Vicky y Julita', '2022-01-06 17:10:02', '1641489002_2021-02-20 12.22.29.jpg'),
(29, 1, 'foto viejita', '2022-01-06 17:10:45', '1641489045_2021-02-27 19.25.24.jpg'),
(30, 1, 'sandwich', '2022-01-06 17:11:06', '1641489066_2021-03-19 22.24.01.jpg'),
(31, 1, 'asf', '2022-01-06 17:11:15', '1641489075_2021-03-19 22.24.01.jpg'),
(32, 1, 'que onda?', '2022-01-06 17:11:46', '1641489106_2021-02-19 22.56.23.jpg'),
(33, 1, 'Julita y vicky', '2022-01-06 17:14:45', '1641489285_2021-02-20 12.22.29.jpg'),
(34, 1, 'Otra viejita', '2022-01-06 17:15:28', '1641489328_2021-02-27 19.25.56.jpg'),
(35, 1, '', '2022-01-06 17:15:38', '1641489338_2021-02-20 12.22.29.jpg'),
(36, 1, 'Otra foto viejita', '2022-01-06 17:16:00', '1641489360_2021-02-20 12.22.29.jpg'),
(37, 1, 'aasdf', '2022-01-06 17:19:15', '1641489555_2021-03-19 22.24.01.jpg'),
(38, 1, '', '2022-01-06 17:19:22', '1641489562_2021-03-19 22.24.01.jpg'),
(39, 1, 'Turque', '2022-01-06 17:23:33', '1641489813_2021-02-19 22.56.00.jpg'),
(40, 1, 'Alce', '2022-01-06 17:25:00', '1641489900_20220103_191050.jpg'),
(41, 1, 'hola\r\n', '2022-01-06 22:24:16', NULL),
(42, 1, 'alce', '2022-01-06 22:27:49', '1641508069_20220103_191050.jpg'),
(43, 3, 'Hola, soy pomon!', '2022-01-06 23:19:14', NULL),
(44, 3, 'soy pompon', '2022-01-06 23:20:36', '1641511236_conejo.jpg'),
(45, 4, 'Hola soy Turquesín y este me da la comida! que onda?', '2022-01-06 23:25:39', '1641511539_2021-02-19 22.56.10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `cod_level` int(11) NOT NULL,
  `name_user` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `lastname_user` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `nick_user` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `email_user` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `pass_user` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `photo_user` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `date_register` date NOT NULL,
  `birthday` date NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `cod_level` (`cod_level`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `cod_level`, `name_user`, `lastname_user`, `nick_user`, `email_user`, `pass_user`, `photo_user`, `date_register`, `birthday`) VALUES
(1, 1, 'Juan', 'González', 'juanchis10', 'juanchismo10@gmail.com', '202cb962ac59075b964b07152d234b70', 'juan.png', '2022-01-06', '1987-08-26'),
(2, 2, 'Cosme', 'Fulanito', 'cosme22', 'cosme@hotmail.com', '202cb962ac59075b964b07152d234b70', NULL, '2022-01-06', '1990-10-24'),
(3, 2, 'Pompon', 'González', 'pompon22', 'pompon@gmail.com', '202cb962ac59075b964b07152d234b70', '1641511075_conejo.jpg', '2022-01-06', '2021-08-20'),
(4, 2, 'Turque', 'Salas', 'turquesin', 'turque@hotmail.com', '202cb962ac59075b964b07152d234b70', '1641511482_2021-02-19 22.56.00.jpg', '2022-01-06', '2019-03-20');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
