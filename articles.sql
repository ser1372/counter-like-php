CREATE TABLE `article` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `count_like` int(11) default 0,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

INSERT INTO `article` (`id`, `name`, `description`, `count_like`) VALUES
(1, 'Первая статья', 'Текст первой статьи!', 0);