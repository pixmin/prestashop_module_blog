<?php

$sql = array();

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'blog_post` (
  `id_blog_post` int(11) NOT NULL auto_increment,
  `created` datetime NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` TEXT NULL,
  PRIMARY KEY (`id_blog_post`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';
