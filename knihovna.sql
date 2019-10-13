-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `autor`;
CREATE TABLE `autor` (
  `id_autor` int(11) NOT NULL AUTO_INCREMENT,
  `jmeno` varchar(255) COLLATE utf8_bin NOT NULL,
  `prijmeni` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_autor`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `autor` (`id_autor`, `jmeno`, `prijmeni`) VALUES
(1,	'Josef Kaja.',	'Tyl'),
(2,	'Karel J.',	'Erbener'),
(3,	'Božena',	'Němcová'),
(4,	'Karel H.',	'Mácha'),
(5,	'Karel',	'Sabina');

DROP TABLE IF EXISTS `autor_knihy`;
CREATE TABLE `autor_knihy` (
  `id_knihy` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `autor_knihy` (`id_knihy`, `id_autor`) VALUES
(1,	1),
(2,	4),
(3,	2),
(4,	3),
(5,	3),
(6,	3);

DROP TABLE IF EXISTS `knihy`;
CREATE TABLE `knihy` (
  `id_kniha` int(11) NOT NULL AUTO_INCREMENT,
  `id_zanr` int(11) NOT NULL,
  `nazev` varchar(255) COLLATE utf8_bin NOT NULL,
  `strany` varchar(255) COLLATE utf8_bin NOT NULL,
  `rok_vydani` year(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`nazev`),
  UNIQUE KEY `id_kniha` (`id_kniha`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `knihy` (`id_kniha`, `id_zanr`, `nazev`, `strany`, `rok_vydani`, `created_at`, `modified_at`) VALUES
(1,	2,	'oživené hroby',	'160',	NULL,	NULL,	NULL),
(2,	1,	'máj',	'79',	'1999',	NULL,	NULL),
(3,	3,	'kytice',	'133',	'1999',	NULL,	NULL),
(4,	4,	'babička',	'277',	NULL,	NULL,	NULL),
(5,	5,	'divá Bára',	'45',	NULL,	NULL,	NULL),
(6,	4,	'v zámku a v podzámčí',	'112',	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `knizky_zanr`;
CREATE TABLE `knizky_zanr` (
  `id_zanr` int(11) NOT NULL,
  `id_knihy` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `knizky_zanr` (`id_zanr`, `id_knihy`) VALUES
(1,	2),
(2,	1),
(3,	3),
(4,	4),
(5,	5),
(6,	4),
(6,	5);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `note` text COLLATE utf8_bin,
  `birthdate` date DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `user` (`id_user`, `email`, `name`, `password`, `note`, `birthdate`, `last_login`, `id_role`) VALUES
(4,	'kakao@caj.cz',	'dora',	'4e5bf39618ba80fb814678b2778bae88',	NULL,	NULL,	NULL,	1),
(2,	'jklimes2@seznam.cz',	'jan.klimeš',	'1234',	NULL,	NULL,	NULL,	NULL),
(3,	'root@sad.cz',	'asd',	'e7b9e9393c1b864ee9c8f263e946b6ae',	NULL,	NULL,	NULL,	2),
(5,	'bambus@s.cz',	'bambus',	'e4ee339480dfa82afe53f133abe94816',	NULL,	NULL,	NULL,	1);

DROP TABLE IF EXISTS `zanr`;
CREATE TABLE `zanr` (
  `id_zanr` int(11) NOT NULL AUTO_INCREMENT,
  `zanr` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_zanr`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `zanr` (`id_zanr`, `zanr`) VALUES
(1,	'román'),
(2,	'drama'),
(3,	'balada'),
(4,	'povídka'),
(5,	'próza');

-- 2019-10-13 15:37:39
