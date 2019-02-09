CREATE TABLE `articles_likes`
(
  `id` int
(11) NOT NULL AUTO_INCREMENT,
  `user` int
(11) DEFAULT NULL,
  `article` int
(11) DEFAULT NULL,
  PRIMARY KEY
(`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
