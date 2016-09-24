-- Adminer 4.2.4 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `carwords`;
CREATE TABLE `carwords` (
  `words` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL,
  `phone_number` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE `vehicles` (
  `vehicle_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` text NOT NULL,
  `carword` text NOT NULL,
  `postcode` text NOT NULL,
  `make` text NOT NULL,
  `model` text NOT NULL,
  `year` text NOT NULL,
  `mileage` text NOT NULL,
  `description` text NOT NULL,
  `image_1` text NOT NULL,
  `image_2` text NOT NULL,
  `image_3` text NOT NULL,
  `image_4` text NOT NULL,
  `image_5` text NOT NULL,
  `price` text NOT NULL,
  `MOT` text NOT NULL,
  `tax` text NOT NULL,
  PRIMARY KEY (`vehicle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `vehicles` (`vehicle_id`, `user_id`, `carword`, `postcode`, `make`, `model`, `year`, `mileage`, `description`, `image_1`, `image_2`, `image_3`, `image_4`, `image_5`, `price`, `MOT`, `tax`) VALUES
(1,	'1',	'dog43',	'',	'yeh',	'yeh',	'yeh',	'yeh',	'yeh',	'car.png',	'car.png',	'car.png',	'car.png',	'',	'yeh',	'yehy',	'yeh'),
(13,	'2',	'flowery9',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'');

-- 2016-09-24 15:34:34
