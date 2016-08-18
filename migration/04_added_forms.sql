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
) ENGINE=MyISAM CHARSET=utf8;

INSERT INTO `forms` (`id`, `field`, `title`, `name`, `type`, `group`, `value`)
VALUES
	(1,1,'FIO','fio','text','contact',NULL),
	(2,2,'Email','email','text','contact',NULL),
	(3,3,'Message','message','textarea','contact',NULL),
	(4,4,'SEND','send','submit','contact',NULL),
	(5,5,'','page','hidden','contact','contact');