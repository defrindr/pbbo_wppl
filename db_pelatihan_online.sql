-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

INSERT INTO `action` (`id`, `controller_id`, `action_id`, `name`) VALUES
(12,	'site',	'index',	'Index'),
(13,	'site',	'profile',	'Profile'),
(14,	'site',	'login',	'Login'),
(15,	'site',	'logout',	'Logout'),
(16,	'site',	'contact',	'Contact'),
(17,	'site',	'about',	'About'),
(18,	'menu',	'index',	'Index'),
(19,	'menu',	'view',	'View'),
(20,	'menu',	'create',	'Create'),
(21,	'menu',	'update',	'Update'),
(22,	'menu',	'delete',	'Delete'),
(23,	'role',	'index',	'Index'),
(24,	'role',	'view',	'View'),
(25,	'role',	'create',	'Create'),
(26,	'role',	'update',	'Update'),
(27,	'role',	'delete',	'Delete'),
(28,	'role',	'detail',	'Detail'),
(29,	'user',	'index',	'Index'),
(30,	'user',	'view',	'View'),
(31,	'user',	'create',	'Create'),
(32,	'user',	'update',	'Update'),
(33,	'user',	'delete',	'Delete'),
(34,	'site',	'register',	'Register'),
(35,	'menu',	'save',	'Save'),
(36,	'pelatihan',	'index',	'Index'),
(37,	'pelatihan',	'view',	'View'),
(38,	'pelatihan',	'create',	'Create'),
(39,	'pelatihan',	'update',	'Update'),
(40,	'pelatihan',	'delete',	'Delete'),
(41,	'pelatihan-soal-jenis',	'index',	'Index'),
(42,	'pelatihan-soal-jenis',	'view',	'View'),
(43,	'pelatihan-soal-jenis',	'create',	'Create'),
(44,	'pelatihan-soal-jenis',	'update',	'Update'),
(45,	'pelatihan-soal-jenis',	'delete',	'Delete'),
(46,	'pelatihan',	'view-jenis-soal',	'View Jenis Soal'),
(47,	'pelatihan',	'create-jenis-soal',	'Create Jenis Soal'),
(48,	'pelatihan',	'update-jenis-soal',	'Update Jenis Soal'),
(49,	'pelatihan',	'delete-jenis-soal',	'Delete Jenis Soal');

SET NAMES utf8mb4;

INSERT INTO `master_jenis_kelamin` (`id`, `nama`, `flag`) VALUES
(1,	'Laki Laki',	1),
(2,	'Perempuan',	1);

INSERT INTO `master_jenis_soal` (`id`, `nama`, `flag`) VALUES
(1,	'Pre Test',	1),
(2,	'Post Test',	1),
(3,	'Praktek',	1);

INSERT INTO `master_kategori_soal` (`id`, `nama`, `flag`) VALUES
(1,	'Multiple Choices',	1),
(2,	'Essay',	1),
(3,	'short answer',	1),
(4,	'CheckBox',	1);

INSERT INTO `master_pekerjaan` (`id`, `nama`) VALUES
(1,	'Belum / Tidak Bekerja');

INSERT INTO `master_pendidikan` (`id`, `nama`, `flag`) VALUES
(1,	'SD',	1),
(2,	'SMA Sederajat',	1),
(3,	'SMP Sederajat',	1);

INSERT INTO `menu` (`id`, `name`, `controller`, `action`, `icon`, `order`, `parent_id`) VALUES
(1,	'Home',	'site',	'index',	'fa fa-home',	3,	NULL),
(2,	'Master',	'',	'index',	'fa fa-database',	2,	NULL),
(3,	'Menu',	'menu',	'index',	'fa fa-circle-o',	5,	2),
(4,	'Role',	'role',	'index',	'fa fa-circle-o',	6,	2),
(5,	'User',	'user',	'index',	'fa fa-circle-o',	7,	2),
(6,	'Pelatihan',	'pelatihan',	'index',	'fa fa-align-left',	1,	NULL),
(7,	'Soal',	'pelatihan-soal-jenis',	'index',	'fa fa-adjust',	2,	NULL);

INSERT INTO `pelatihan` (`id`, `nama`, `latar_belakang`, `tujuan`, `tanggal_mulai`, `tanggal_selesai`, `tingkat_id`, `status_id`, `forum_diskusi`, `pelaksana_id`, `created_at`, `created_by`, `modified_at`, `modified_by`, `flag`) VALUES
(1,	'Pelatihan Design Web',	'Dalam Era serba digital ini, banyak sekali kebutuhan akan seorang programmer. Tetapi SDM yang kita miliki masih sangat terbatas karena itulah diadalakan pelatihan ini',	'Untuk menciptakan sdm sdm handal',	'2020-10-09',	'2020-10-16',	1,	1,	'https://t.me/defrindr',	2,	'2020-10-11 09:56:07',	1,	'0000-00-00 00:00:00',	1,	0),
(16,	'Pelatihan REACT JS 1',	'-',	'-',	'2020-10-21',	NULL,	1,	1,	'https://t.me/defrindr',	2,	'2020-10-11 09:55:56',	1,	'0000-00-00 00:00:00',	1,	1);

INSERT INTO `pelatihan_lampiran` (`id`, `pelatihan_id`, `judul_lampiran`, `file`) VALUES
(1,	1,	'Lampiran Pelaksanaan Pelatihan Design Web',	'test.pdf'),
(6,	16,	'Lampiran Proposal Pengajuan',	'pN3RlwR-7zm1TXf2aRhrOmT9urzAdrh4.docx');



INSERT INTO `pelatihan_soal_jenis` (`id`, `jenis_id`, `pelatihan_id`, `waktu_pengerjaan`, `jumlah_soal`) VALUES
(2,	1,	16,	120,	20);




INSERT INTO `pelatihan_status` (`id`, `nama`) VALUES
(1,	'Menunggu'),
(2,	'Disetujui'),
(3,	'Ditolak');

INSERT INTO `pelatihan_tingkat` (`id`, `nama`, `flag`) VALUES
(1,	'Pelatihan Tingkat Dasar',	1),
(2,	'Pelatihan Tingkat Lanjut 1',	1),
(3,	'Pelatihan Tingkat Lanjut 2',	1);


INSERT INTO `role` (`id`, `name`) VALUES
(1,	'Super Administrator'),
(2,	'Administrator'),
(3,	'Regular User'),
(4,	'Pengisi Acara');

INSERT INTO `role_action` (`id`, `role_id`, `action_id`) VALUES
(98,	3,	12),
(99,	3,	13),
(100,	3,	14),
(101,	3,	15),
(102,	3,	16),
(103,	3,	17),
(104,	3,	18),
(105,	3,	19),
(106,	3,	20),
(107,	3,	21),
(108,	3,	22),
(109,	3,	23),
(110,	3,	24),
(111,	3,	25),
(112,	3,	26),
(113,	3,	27),
(114,	3,	28),
(115,	3,	29),
(116,	3,	30),
(117,	3,	31),
(118,	3,	32),
(119,	3,	33),
(141,	2,	12),
(142,	2,	13),
(143,	2,	14),
(144,	2,	15),
(145,	2,	16),
(146,	2,	17),
(147,	2,	18),
(148,	2,	19),
(149,	2,	20),
(150,	2,	21),
(151,	2,	22),
(152,	2,	23),
(153,	2,	24),
(154,	2,	25),
(155,	2,	26),
(156,	2,	27),
(157,	2,	28),
(158,	2,	29),
(159,	2,	30),
(160,	2,	31),
(161,	2,	32),
(162,	2,	33),
(243,	1,	12),
(244,	1,	13),
(245,	1,	14),
(246,	1,	15),
(247,	1,	17),
(248,	1,	18),
(249,	1,	19),
(250,	1,	20),
(251,	1,	21),
(252,	1,	22),
(253,	1,	23),
(254,	1,	24),
(255,	1,	25),
(256,	1,	26),
(257,	1,	27),
(258,	1,	28),
(259,	1,	29),
(260,	1,	30),
(261,	1,	31),
(262,	1,	32),
(263,	1,	33),
(264,	1,	36),
(265,	1,	37),
(266,	1,	38),
(267,	1,	39),
(268,	1,	40),
(269,	1,	46),
(270,	1,	47),
(271,	1,	48),
(272,	1,	49),
(273,	1,	41),
(274,	1,	42),
(275,	1,	43),
(276,	1,	44),
(277,	1,	45);

INSERT INTO `role_menu` (`id`, `role_id`, `menu_id`) VALUES
(71,	3,	1),
(72,	3,	2),
(73,	3,	3),
(74,	3,	4),
(75,	3,	5),
(82,	2,	1),
(83,	2,	2),
(84,	2,	3),
(85,	2,	4),
(86,	2,	5),
(87,	2,	6),
(108,	1,	1),
(109,	1,	2),
(110,	1,	3),
(111,	1,	4),
(112,	1,	5),
(113,	1,	6);

INSERT INTO `user` (`id`, `username`, `password`, `name`, `role_id`, `photo_url`, `peserta_pelatihan_id`, `last_login`, `last_logout`) VALUES
(1,	'admin',	'21232f297a57a5a743894a0e4a801fc3',	'Dinas Pusat',	1,	'ID6jM8Az7Yh_R6LR44Ezh02VECKTQ_Ya.png',	NULL,	'2020-11-21 14:10:48',	'2015-12-16 22:35:47'),
(2,	'dinas_pendidikan',	'f0b171542f1bebedf72dbd45edc4755f',	'Dinas Pendidikan',	2,	'default.png',	NULL,	NULL,	NULL);

INSERT INTO `wilayah_desa` (`id`, `kecamatan_id`, `nama`) VALUES
(1,	1,	'Pulung');

INSERT INTO `wilayah_kabupaten` (`id`, `provinsi_id`, `nama`) VALUES
(1,	1,	'Ponorogo');

INSERT INTO `wilayah_kecamatan` (`id`, `kabupaten_id`, `nama`) VALUES
(1,	1,	'Pulung');

INSERT INTO `wilayah_provinsi` (`id`, `nama`) VALUES
(1,	'jawa timur');

-- 2020-11-21 16:41:15
