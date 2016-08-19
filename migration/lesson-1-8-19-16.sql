# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.12)
# Database: lesson-1
# Generation Time: 2016-08-19 17:42:39 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table articles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `articles`;

CREATE TABLE `articles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(256) DEFAULT NULL,
  `author` varchar(256) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `text` text,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;

INSERT INTO `articles` (`id`, `title`, `author`, `date`, `text`, `active`)
VALUES
	(1,'First News','Alex','2016-06-17','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',1),
	(2,'Second  News','Bob','2016-07-17','Lorem ipsum dolor sit amet, consectetur adipiscing elit.',1),
	(3,'Third News','Admin','2016-08-17','Third News',1);

/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table forms
# ------------------------------------------------------------

DROP TABLE IF EXISTS `forms`;

CREATE TABLE `forms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `field` int(11) DEFAULT NULL,
  `title` varchar(64) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL,
  `type` varchar(16) DEFAULT NULL,
  `group` varchar(32) DEFAULT NULL,
  `value` text,
  PRIMARY KEY (`id`),
  KEY `indGroup` (`group`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `forms` WRITE;
/*!40000 ALTER TABLE `forms` DISABLE KEYS */;

INSERT INTO `forms` (`id`, `field`, `title`, `name`, `type`, `group`, `value`)
VALUES
	(1,1,'FIO','fio','text','contact',NULL),
	(2,2,'Email','email','text','contact',NULL),
	(3,3,'Message','message','textarea','contact',NULL),
	(4,4,'SEND','send','submit','contact',NULL),
	(5,5,'','page','hidden','contact','contact'),
	(6,1,'','page','hidden','gallery','upload'),
	(7,2,'Name file','title','text','gallery',NULL),
	(8,3,'File','file','file','gallery',NULL),
	(9,4,'Upload','send','submit','gallery','Upload');

/*!40000 ALTER TABLE `forms` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) DEFAULT NULL,
  `link` varchar(64) DEFAULT NULL,
  `description` text,
  `active` tinyint(1) DEFAULT '1',
  `grant` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;

INSERT INTO `pages` (`id`, `title`, `link`, `description`, `active`, `grant`)
VALUES
	(1,'Home','home.html','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel auctor nulla. Nulla porttitor tempus metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut nibh augue, tristique sit amet turpis ut, pretium venenatis massa. Aliquam sit amet arcu lacus. Nulla sollicitudin nunc vel magna ullamcorper dapibus. Etiam lacinia dolor in sapien egestas, quis consectetur justo egestas. ',1,0),
	(8,'temp','temp.html','vbidsfnvskdfjnvlksdfj',1,1),
	(2,'Blog','blog.html','Breaking News',1,0),
	(3,'Contact Us','contact.html','Contact Us',1,0),
	(4,'Testimonial','testimonial.html','Testimonial',1,0),
	(5,'Gallery','gallery.html','Gallery',1,0),
	(6,'Login','login.html','login\n',1,2),
	(7,'Logout','logout.html','Logout',1,1);

/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
