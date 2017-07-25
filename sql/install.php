<?php

$sql = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'blog_post` (
  `id` int(11) NOT NULL auto_increment,
  `created` datetime NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';

