-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server Version:               10.4.17-MariaDB - mariadb.org binary distribution
-- Server Betriebssystem:        Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Exportiere Datenbank Struktur für music
CREATE DATABASE IF NOT EXISTS `music` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `music`;

-- Exportiere Struktur von Tabelle music.admin_cds
CREATE TABLE IF NOT EXISTS `admin_cds` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `interpret` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `year` year(4) NOT NULL,
  `image` varchar(255) NOT NULL,
  `desc` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8mb4;

-- Exportiere Daten aus Tabelle music.admin_cds: ~4 rows (ungefähr)
/*!40000 ALTER TABLE `admin_cds` DISABLE KEYS */;
INSERT INTO `admin_cds` (`id`, `interpret`, `genre`, `year`, `image`, `desc`) VALUES
	(44, 'The Interpreter 7', 'Rock', '2021', 'ocean.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.'),
	(45, 'DJ Electro', 'Elektro', '2020', 'noimage.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.'),
	(106, 'Your Interpreter', 'Jazz', '2012', 'cd_cover3.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.'),
	(112, 'Another Interpreter', 'Rap', '2021', 'cd_cover2.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.');
/*!40000 ALTER TABLE `admin_cds` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle music.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` int(10) unsigned NOT NULL,
  `code` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Exportiere Daten aus Tabelle music.user: ~3 rows (ungefähr)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `name`, `password`, `admin`, `code`, `email`) VALUES
	(1, 'admin', '$2y$10$jfuKBel7.jSANERy6At5qOsch2o5RT7I.G3uYLVidx8yWRQHmSrZy', 1, '2884364', ''),
	(2, 'user1', '$2y$10$t9/1EuxfCa/qGajQMG1R8u5cyww80L8.RPEffWbGw6W8mBtYCgx1G', 0, '0245356', 'user1@user.de'),
	(3, 'user2', '$2y$10$eqOCmUavKmPcxe7S2jjy4OZ7bQMdFpv7RRxmqJlx5KxhOykCpprXy', 0, '6387876', 'user2@mail.de');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle music.user1_cds
CREATE TABLE IF NOT EXISTS `user1_cds` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `interpret` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `year` year(4) NOT NULL,
  `image` varchar(255) NOT NULL,
  `desc` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8mb4;

-- Exportiere Daten aus Tabelle music.user1_cds: ~1 rows (ungefähr)
/*!40000 ALTER TABLE `user1_cds` DISABLE KEYS */;
INSERT INTO `user1_cds` (`id`, `interpret`, `genre`, `year`, `image`, `desc`) VALUES
	(122, '111', '111', '2001', 'noimage.jpg', '111');
/*!40000 ALTER TABLE `user1_cds` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle music.user2_cds
CREATE TABLE IF NOT EXISTS `user2_cds` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `interpret` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `year` year(4) NOT NULL,
  `image` varchar(255) NOT NULL,
  `desc` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8mb4;

-- Exportiere Daten aus Tabelle music.user2_cds: ~1 rows (ungefähr)
/*!40000 ALTER TABLE `user2_cds` DISABLE KEYS */;
INSERT INTO `user2_cds` (`id`, `interpret`, `genre`, `year`, `image`, `desc`) VALUES
	(121, '222', '222', '2002', 'music-equalizer.jpg', '222');
/*!40000 ALTER TABLE `user2_cds` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
