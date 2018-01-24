CREATE DATABASE IF NOT EXISTS `guestbook` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `guestbook`;

CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `content` text,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT IGNORE INTO `notes` (`id`, `title`, `content`, `date`) VALUES
	(1, 'Я', 'Бог знает какая по счету заметка...', '2018-01-24 21:47:58');