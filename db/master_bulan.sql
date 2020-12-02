-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `master_bulan`;
CREATE TABLE `master_bulan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `master_bulan` (`id`, `nama`) VALUES
(1,	'Januari'),
(2,	'Februari'),
(3,	'Maret'),
(4,	'April'),
(5,	'Mei'),
(6,	'Juni'),
(7,	'Juli'),
(8,	'Agustus'),
(9,	'September'),
(10,	'Oktober'),
(11,	'November'),
(12,	'Desember');

-- 2020-12-02 07:41:52
