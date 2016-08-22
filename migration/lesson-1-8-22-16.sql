# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.12)
# Database: lesson-1
# Generation Time: 2016-08-22 17:57:27 +0000
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
	(6,1,'','action','hidden','gallery','upload'),
	(7,2,'Name file','title','text','gallery',NULL),
	(8,3,'File','file','file','gallery',NULL),
	(9,4,'Upload','send','submit','gallery','Upload'),
	(10,1,'Login','login','text','login',NULL),
	(11,2,'Password','password','password','login',NULL),
	(12,3,' ','action','hidden','login','signin'),
	(13,4,'Sign In','sign','submit','login','Sign');

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
	(8,'temp','temp.html','vbidsfnvskdfjnvlksdfj',1,0),
	(9,'New Page','newpage.html','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vitae pellentesque dui, eu facilisis ipsum. Proin vel maximus dui, vel auctor nulla. Phasellus non neque vitae arcu commodo cursus. Duis aliquet lorem orci, a sodales risus faucibus a. Nulla pellentesque mattis ipsum, non lobortis eros pulvinar auctor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed justo ante, tempus ut imperdiet condimentum, convallis eu tortor. Vivamus consequat, risus non condimentum vehicula, eros leo blandit nisl, sit amet mollis purus nibh id est.\r\n\r\nMaecenas dapibus, mi congue posuere suscipit, erat nisi fringilla est, eget condimentum orci sem id urna. Cras quis odio leo. Fusce semper interdum dui, laoreet viverra nulla egestas ac. Integer lectus metus, hendrerit ullamcorper pulvinar ac, ullamcorper non ligula. Proin id tristique nisi. Nulla sed ipsum dolor. Vestibulum quis ipsum pretium, lobortis mauris eget, consequat dui. Phasellus mollis magna vitae lorem egestas, vel iaculis orci vestibulum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus dolor sem, elementum vel purus vitae, iaculis interdum leo. Morbi ut nisi non mauris vestibulum mattis. Sed malesuada orci et dui bibendum efficitur. Aenean enim risus, cursus a dolor sit amet, ornare convallis lectus. Nulla non justo in ex feugiat congue et et nunc. Sed tristique, lectus vel faucibus lobortis, nunc sapien venenatis nunc, vel tincidunt nulla tellus sodales urna. Sed vehicula et augue a sollicitudin.\r\n\r\nQuisque tincidunt erat dignissim elit mattis, nec consequat felis rhoncus. Donec volutpat cursus odio quis sagittis. Integer placerat ipsum nec diam molestie, eget fermentum justo luctus. Maecenas facilisis egestas convallis. Cras rutrum mi tortor. Phasellus sagittis lectus dictum bibendum interdum. Etiam suscipit elit eget interdum blandit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean non condimentum nisl. Morbi egestas quam quis enim vestibulum euismod. Proin ultricies pulvinar mattis.\r\n\r\nMorbi accumsan est quis rutrum malesuada. Vestibulum ut augue vel turpis mollis semper sed non dolor. Integer porta rhoncus magna, quis ultricies risus condimentum quis. Duis accumsan libero aliquam risus rutrum, ac pretium dui sagittis. Donec quis vulputate lectus, ac egestas risus. Suspendisse nec turpis imperdiet, aliquam lectus eu, sodales lectus. Integer finibus magna mauris.\r\n\r\nNam facilisis ullamcorper nibh. Nulla turpis nulla, molestie lacinia rutrum sollicitudin, congue in purus. Aliquam posuere arcu ut lectus semper malesuada. Vivamus tempor augue vestibulum, ornare elit ut, dignissim diam. Nunc sit amet tellus eget magna porta facilisis in sit amet lacus. Mauris semper mauris sed magna convallis, eu fermentum augue aliquet. Suspendisse vel sem euismod diam bibendum rhoncus sollicitudin quis justo.',1,1),
	(2,'Blog','blog.html','Breaking News',1,0),
	(3,'Contact Us','contact.html','Contact Us',1,0),
	(4,'Testimonial','testimonial.html','Testimonial',1,0),
	(5,'Gallery','gallery.html','Gallery',1,0),
	(6,'Login','login.html','login\n',1,2),
	(7,'Logout','login.html?action=signout','Logout',1,1);

/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pictures
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pictures`;

CREATE TABLE `pictures` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `group` varchar(32) DEFAULT NULL,
  `title` varchar(128) DEFAULT '',
  `file_name` text,
  `path` varchar(128) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `pictures` WRITE;
/*!40000 ALTER TABLE `pictures` DISABLE KEYS */;

INSERT INTO `pictures` (`id`, `group`, `title`, `file_name`, `path`, `active`, `date`)
VALUES
	(1,'gallery','first file','IMG_16062016_014732.png','upload/',1,'2016-08-22'),
	(2,'gallery','second file','IMG_24062016_022255.png','upload/',1,'2016-08-22'),
	(3,'gallery','thirh picture','ZyOJcj0yTz4.jpg','upload/',1,'2016-08-22'),
	(4,'gallery','picture 2','9ce6af7e3be211e395f522000a1fd2c4_8.jpg','upload/',1,'2016-08-22'),
	(5,'gallery','picture 3','4 photo.jpg','upload/',1,'2016-08-22'),
	(6,'gallery','picture 4','4 photo.jpg','upload/',1,'2016-08-22'),
	(7,'gallery','picture 5','IMG_31032016_175001.png','upload/',1,'2016-08-22'),
	(8,'gallery','picture 6','1468397758.png','upload/',1,'2016-08-22'),
	(9,'gallery','picture 7','IMG-20140608-WA0000.jpg','upload/',1,'2016-08-22'),
	(10,'gallery','picture 8','viber image 2.jpg','upload/',1,'2016-08-22'),
	(11,'gallery','picture 9','viber image 1.jpg','upload/',1,'2016-08-22'),
	(12,'gallery','svsdvsd','GOPR7604.JPG','upload/',1,'2016-08-22'),
	(13,'gallery','new picture','x_b378bba1.jpg','upload/',1,'2016-08-22'),
	(14,'gallery','kjdhfkjhdfkj','GOPR7503.JPG','upload/',1,'2016-08-22'),
	(15,'gallery','csdcsdcs','GOPR7604.JPG','upload/',1,'2016-08-22'),
	(16,'gallery','dcscdsd','docs.jpg','upload/',1,'2016-08-22'),
	(17,'gallery','dcscdsd','docs.jpg','upload/',1,'2016-08-22'),
	(18,'gallery','dcscdsd','docs.jpg','upload/',1,'2016-08-22');

/*!40000 ALTER TABLE `pictures` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table testimonials
# ------------------------------------------------------------

DROP TABLE IF EXISTS `testimonials`;

CREATE TABLE `testimonials` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `text` text,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;

INSERT INTO `testimonials` (`id`, `name`, `text`, `active`)
VALUES
	(1,'Alex Bu','You are the best',1),
	(2,'Alex Boba','It\'s an awesome world!',1),
	(3,'Dima Uchkin','All in our hands',1);

/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(128) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `grant` tinyint(1) DEFAULT '1',
  `active` tinyint(1) DEFAULT '1',
  `FIO` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `indSignIn` (`login`,`password`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
