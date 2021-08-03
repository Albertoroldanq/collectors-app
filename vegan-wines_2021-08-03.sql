# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.6.3-MariaDB-1:10.6.3+maria~focal)
# Database: vegan-wines
# Generation Time: 2021-08-03 12:03:16 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table list-of-wines
# ------------------------------------------------------------

DROP TABLE IF EXISTS `list-of-wines`;

CREATE TABLE `list-of-wines` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '',
  `origin` varchar(30) NOT NULL DEFAULT '',
  `type` varchar(11) NOT NULL DEFAULT '',
  `grape` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `list-of-wines` WRITE;
/*!40000 ALTER TABLE `list-of-wines` DISABLE KEYS */;

INSERT INTO `list-of-wines` (`id`, `name`, `origin`, `type`, `grape`)
VALUES
	(1,'Vinalba Malbec','Argentina','Red','Malbec'),
	(2,'Mas Querido','Spain','White','Macabeo'),
	(3,'Gruner Veltliner','Austria','White','Gruner Veltliner'),
	(4,'Herdade de Gambia','Portugal','Red','Touriga Nacional'),
	(5,'La Belle Angele','France','White','Sauvignon Blanc');

/*!40000 ALTER TABLE `list-of-wines` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
