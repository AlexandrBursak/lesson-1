CREATE TABLE `pages` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`title` varchar(64) DEFAULT NULL,
`link` varchar(64) DEFAULT NULL,
`description` text,
`active` tinyint(1) DEFAULT '1',
PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;