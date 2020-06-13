-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `business`;
CREATE TABLE `business` (
  `email` varchar(45) NOT NULL,
  `business_name` int(45) NOT NULL,
  `phone` int(15) NOT NULL,
  `password` int(255) NOT NULL,
  `lga` int(45) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `tags` int(100) NOT NULL,
  `business` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `email` varchar(45) NOT NULL,
  `fullname` int(45) NOT NULL,
  `phone` int(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lga` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2020-06-13 03:59:16
