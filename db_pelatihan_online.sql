-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

USE `db_pelatihan_online`;

DROP TABLE IF EXISTS `action`;
CREATE TABLE `action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `controller_id` varchar(50) NOT NULL,
  `action_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(49,	'pelatihan',	'delete-jenis-soal',	'Delete Jenis Soal'),
(50,	'pelatihan-peserta',	'index',	'Index'),
(51,	'pelatihan-peserta',	'view',	'View'),
(52,	'pelatihan-peserta',	'create',	'Create'),
(53,	'pelatihan-peserta',	'update',	'Update'),
(54,	'pelatihan-peserta',	'delete',	'Delete'),
(55,	'pelatihan',	'add-peserta',	'Add Peserta'),
(56,	'pelatihan',	'add-soal',	'Add Soal'),
(57,	'pelatihan',	'update-soal',	'Update Soal'),
(58,	'pelatihan',	'approve',	'Approve'),
(59,	'pelatihan',	'ajukan',	'Ajukan'),
(60,	'pelatihan',	'setujui',	'Setujui'),
(61,	'pelatihan',	'ajukan-monev',	'Ajukan Monev'),
(62,	'pelatihan',	'find-peserta-by-nik',	'Find Peserta By Nik'),
(63,	'pelatihan',	's-update-kehadiran',	'S Update Kehadiran'),
(64,	'pelatihan',	'update-kehadiran',	'Update Kehadiran'),
(65,	'pelatihan',	'setujui-monev',	'Setujui Monev'),
(66,	'posttest',	'index',	'Index'),
(67,	'posttest',	'login',	'Login'),
(68,	'pretest',	'index',	'Index'),
(69,	'pretest',	'login',	'Login'),
(70,	'pelatihan',	'detail',	'Detail'),
(71,	'pelatihan',	'update-nilai-praktek',	'Update Nilai Praktek'),
(72,	'posttest',	'post-answer',	'Post Answer'),
(73,	'posttest',	'request-soal',	'Request Soal'),
(74,	'pretest',	'post-answer',	'Post Answer'),
(75,	'pretest',	'request-soal',	'Request Soal'),
(76,	'posttest',	'koreksi-jawaban',	'Koreksi Jawaban'),
(77,	'posttest',	'finish',	'Finish'),
(78,	'pretest',	'finish',	'Finish'),
(79,	'kepuasan',	'index',	'Index'),
(80,	'kuisioner-kepuasan',	'index',	'Index'),
(81,	'pelatihan',	'tingkat-lanjut',	'Tingkat Lanjut'),
(82,	'pelatihan',	'sertifikat',	'Sertifikat');

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `master_jenis_kelamin`;
CREATE TABLE `master_jenis_kelamin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `flag` int(11) NOT NULL DEFAULT 1 COMMENT '0 = deleted, 1 = active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `master_jenis_kelamin` (`id`, `nama`, `flag`) VALUES
(1,	'Laki Laki',	1),
(2,	'Perempuan',	1);

DROP TABLE IF EXISTS `master_jenis_soal`;
CREATE TABLE `master_jenis_soal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL COMMENT 'jenis soal , ex : pre test , post test',
  `flag` int(11) NOT NULL DEFAULT 1 COMMENT '0 = deleted, 1 = active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `master_jenis_soal` (`id`, `nama`, `flag`) VALUES
(1,	'Pre Test',	1),
(2,	'Post Test',	1),
(3,	'Praktek',	1),
(4,	'Kepuasan',	1),
(5,	'Monev',	1);

DROP TABLE IF EXISTS `master_kategori_soal`;
CREATE TABLE `master_kategori_soal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL COMMENT 'jenis soal , ex : multiple choice, esay, short answer',
  `flag` int(11) NOT NULL DEFAULT 1 COMMENT '0 = deleted, 1 = active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `master_kategori_soal` (`id`, `nama`, `flag`) VALUES
(1,	'Multiple Choices',	1),
(2,	'Essay',	1),
(3,	'short answer',	1),
(4,	'CheckBox',	1);

DROP TABLE IF EXISTS `master_kuesioner_kepuasan`;
CREATE TABLE `master_kuesioner_kepuasan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pertanyaan` varchar(200) NOT NULL,
  `jawaban` varchar(100) NOT NULL,
  `flag` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `master_kuesioner_kepuasan` (`id`, `pertanyaan`, `jawaban`, `flag`) VALUES
(1,	'Bagaimana pemahaman materi narasumber?',	'1|2|3|4',	1),
(2,	'Bagaimana interaksi narasumber dengan peserta?',	'1|2|3|4',	1),
(3,	'Bagaimana kejelasan pemaparan materi?',	'1|2|3|4',	1),
(4,	'Bagaimana feedback yang diberikn narasumber?',	'1|2|3|4',	1),
(5,	'Bagaimana metode yang digunakan dalam menyampaikan materi?',	'1|2|3|4',	1),
(6,	'Bagaimana pemahaman alat pembelajaran yang digunakan dalam menyampaikan materi?',	'1|2|3|4',	1),
(7,	'Bagaimana kemudaham memahami materi?',	'1|2|3|4',	1),
(8,	'Bagaimana kebermanfaatan materi dengan kebutuhan anda?',	'1|2|3|4',	1),
(9,	'Bagaimana keselarasanantara materi pelatihan dengan tujuan pelatihan?',	'1|2|3|4',	1),
(10,	'Komentar dan saran untuk pelatihan',	'',	1);

DROP TABLE IF EXISTS `master_kuesioner_monev`;
CREATE TABLE `master_kuesioner_monev` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pertanyaan` varchar(200) NOT NULL,
  `jawaban` varchar(100) NOT NULL,
  `flag` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `master_kuesioner_monev` (`id`, `pertanyaan`, `jawaban`, `flag`) VALUES
(1,	'Nama Usaha',	'',	1),
(2,	'Jenis Usaha',	'',	1),
(3,	'Spesifikasi Produk',	'',	1),
(4,	'Lokasi usaha',	'',	1),
(5,	'Jenis Ijin Usaha (Jika Ada)',	'',	1),
(6,	'Nomor Induk Berusaha (NIB)',	'',	1),
(7,	'Masa Berlaku NIB',	'',	1),
(8,	'Apakah materi pelatihan yang anda ikuti sesuai dengan kebutuhan usaha Anda?',	'Sesuai|Cukup Sesuai|Tidak Sesuai',	1),
(9,	'Apakah anda telah menerapkan materi pelatihan yang diberikan?',	'Sudah. dalam kegiatan sehari hari|Sudah, dalam kegiatan usaha|Tidak menerapkan',	1),
(10,	'Jelaskan penerapan materi pelatihan tersebut',	'',	1),
(11,	'Bagaimanna Manfaat meteri anda terhadap perkembangan SDM / TENAGA KERJA?',	'Berkurang|Tetap|Bertambah',	1),
(12,	'Bagaimanna Manfaat meteri anda terhadap perkembangan OMSET?',	'Berkurang|Tetap|Bertambah',	1),
(13,	'Bagaimanna Manfaat meteri anda terhadap perkembangan VARIASI PRODUK?',	'Berkurang|Tetap|Bertambah',	1),
(14,	'Bagaimanna Manfaat meteri anda terhadap perkembangan MESIN / TEKNOLOGI yang digunakan?',	'Berkurang|Tetap|Bertambah',	1),
(15,	'Sebutkan saran dan Harapan untuk perbaikan kegiatan pembinaan / pelatihan ini.',	'',	1);

DROP TABLE IF EXISTS `master_pekerjaan`;
CREATE TABLE `master_pekerjaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL COMMENT 'nama pekerjaan',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `master_pekerjaan` (`id`, `nama`) VALUES
(1,	'Belum/Tidak Bekerja'),
(2,	'Mengurus Rumah Tangga'),
(3,	'Pelajar/Mahasiswa'),
(4,	'Pensiunan'),
(5,	'Pegawai Negeri Sipil (PNS)'),
(6,	'Tentara Nasional Indonesia (TNI)'),
(7,	'Kepolisian RI  (POLRI)'),
(8,	'Perdagangan'),
(9,	'Petani/Pekebun'),
(10,	'Peternak'),
(11,	'Nelayan/Perikanan'),
(12,	'Industri'),
(13,	'Konstruksi'),
(14,	'Transportasi'),
(15,	'Karyawan Swasta'),
(16,	'Karyawan BUMN'),
(17,	'Karyawan BUMD'),
(18,	'Karyawan Honorer'),
(19,	'Buruh Harian Lepas'),
(20,	'Buruh Tani/Perkebunan'),
(21,	'Buruh Nelayan/Perikanan'),
(22,	'Buruh Peternakan'),
(23,	'Pembantu Rumah Tangga'),
(24,	'Tukang Cukur'),
(25,	'Tukang Listrik'),
(26,	'Tukang Batu'),
(27,	'Tukang Kayu'),
(28,	'Tukang Sol Sepatu'),
(29,	'Tukang Las/Pandai Besi'),
(30,	'Tukang Jahit'),
(31,	'Tukang Gigi'),
(32,	'Penata Rias'),
(33,	'Penata Busana'),
(34,	'Penata Rambut'),
(35,	'Mekanik'),
(36,	'Seniman'),
(37,	'Tabib'),
(38,	'Paraji'),
(39,	'Perancang Busana'),
(40,	'Penterjemah'),
(41,	'Imam Masjid'),
(42,	'Pendeta'),
(43,	'Pastor'),
(44,	'Wartawan'),
(45,	'Ustadz/Mubaligh'),
(46,	'Juru Masak'),
(47,	'Promotor Acara'),
(48,	'Anggota DPR-RI'),
(49,	'Anggota DPD'),
(50,	'Anggota BPK'),
(51,	'Presiden'),
(52,	'Wakil Presiden'),
(53,	'Anggota Mahkamah Konstitusi'),
(54,	'Anggota Kabinet / Kementrian'),
(55,	'Duta Besar'),
(56,	'Gubernur'),
(57,	'Wakil Gubernur'),
(58,	'Bupati'),
(59,	'Wakil Bupati'),
(60,	'Walikota'),
(61,	'Wakil walikota'),
(62,	'Anggota DPRD Prop.'),
(63,	'Anggota DPRD Kab./ Kota'),
(64,	'Dosen'),
(65,	'Guru'),
(66,	'Pilot'),
(67,	'Pengacara'),
(68,	'Notaris'),
(69,	'Arsitek'),
(70,	'Akuntan'),
(71,	'Konsultan'),
(72,	'Dokter'),
(73,	'Bidan'),
(74,	'Perawat'),
(75,	'Apoteker'),
(76,	'Psikiater/Psikolog'),
(77,	'Penyiar Televisi'),
(78,	'Penyiar Radio'),
(79,	'Pelaut'),
(80,	'Peneliti'),
(81,	'Sopir'),
(82,	'Pialang'),
(83,	'Paranormal'),
(84,	'Pedagang'),
(85,	'Perangkat Desa'),
(86,	'Kepala desa'),
(87,	'Biarawati'),
(88,	'Wiraswasta'),
(89,	'Lainnya, Sebutkan');

DROP TABLE IF EXISTS `master_pendidikan`;
CREATE TABLE `master_pendidikan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL COMMENT 'nama pendidikan , ex : SD, SMP, SMA',
  `flag` int(11) NOT NULL DEFAULT 1 COMMENT '0 = deleted, 1 = active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `master_pendidikan` (`id`, `nama`, `flag`) VALUES
(4,	'Belum Terdata',	1),
(5,	'Belum Sekolah',	1),
(6,	'TK',	1),
(7,	'SD',	1),
(8,	'SMP',	1),
(9,	'SMA / SMK',	1),
(10,	'D I',	1),
(11,	'D II',	1),
(12,	'D III',	1),
(13,	'AKTA I',	1),
(14,	'AKTA II',	1),
(15,	'S1',	1),
(16,	'S2',	1),
(17,	'S3',	1),
(18,	'Tidak Tamat SD',	1),
(19,	'Tidak Sekolah',	1);

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `controller` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL DEFAULT 'index',
  `icon` varchar(50) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `menu` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `menu` (`id`, `name`, `controller`, `action`, `icon`, `order`, `parent_id`) VALUES
(1,	'Home',	'site',	'index',	'fa fa-home',	10,	NULL),
(2,	'Master',	'',	'index',	'fa fa-database',	2,	NULL),
(3,	'Menu',	'menu',	'index',	'fa fa-circle-o',	3,	2),
(4,	'Role',	'role',	'index',	'fa fa-circle-o',	4,	2),
(5,	'User',	'user',	'index',	'fa fa-circle-o',	5,	2),
(6,	'Pelatihan',	'pelatihan',	'index',	'fa fa-align-left',	6,	NULL),
(7,	'Soal',	'pelatihan-soal-jenis',	'index',	'fa fa-adjust',	9,	NULL),
(8,	'Peserta Pelatihan',	'pelatihan-peserta',	'index',	'fa fa-users',	8,	NULL),
(9,	'Posttes',	'posttest',	'index',	'fa fa-arrow-circle-down',	11,	NULL),
(10,	'pretest',	'pretest',	'index',	'fa fa-adn',	7,	NULL),
(11,	'Kepuasan',	'kuisioner-kepuasan',	'index',	'fa fa-align-left',	1,	NULL);

DROP TABLE IF EXISTS `pelatihan`;
CREATE TABLE `pelatihan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` varchar(32) NOT NULL DEFAULT '',
  `nama` varchar(200) NOT NULL COMMENT 'nama pelatihan',
  `latar_belakang` text NOT NULL,
  `tujuan` text NOT NULL,
  `kota` text NOT NULL,
  `nip_penandatangan` varchar(100) NOT NULL,
  `nama_penandatangan` text NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `tingkat_id` int(11) NOT NULL COMMENT 'tingkat pelatihan',
  `status_id` int(11) NOT NULL DEFAULT 1,
  `forum_diskusi` varchar(100) NOT NULL DEFAULT '-' COMMENT 'link forum diskusi , ex : link grup whatsapp, telegram, discord',
  `lokasi` text NOT NULL,
  `kriteria` varchar(100) NOT NULL,
  `jumlah_target` int(11) NOT NULL,
  `sasaran_wilayah` varchar(100) NOT NULL,
  `hasil_pelaksanaan_pelatihan` text DEFAULT NULL,
  `dasar_pelaksanaan` text DEFAULT NULL,
  `absensi_kehadiran` varchar(100) DEFAULT NULL,
  `rekapitulasi_nilai` varchar(100) DEFAULT NULL,
  `sertifikat` varchar(100) DEFAULT NULL,
  `materi_pelatihan` varchar(100) DEFAULT NULL,
  `pelaksana_id` int(11) NOT NULL,
  `pelatihan_sebelumnya` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_by` int(11) NOT NULL,
  `flag` int(11) NOT NULL DEFAULT 1 COMMENT '0 = deleted , 1 = active',
  PRIMARY KEY (`id`),
  KEY `pelatihan_tingkat_id` (`tingkat_id`),
  KEY `pelaksana_id` (`pelaksana_id`),
  KEY `status_id` (`status_id`),
  KEY `pelatihan_sebelumnya` (`pelatihan_sebelumnya`),
  CONSTRAINT `pelatihan_ibfk_1` FOREIGN KEY (`tingkat_id`) REFERENCES `pelatihan_tingkat` (`id`),
  CONSTRAINT `pelatihan_ibfk_2` FOREIGN KEY (`pelaksana_id`) REFERENCES `user` (`id`),
  CONSTRAINT `pelatihan_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `pelatihan_status` (`id`),
  CONSTRAINT `pelatihan_ibfk_4` FOREIGN KEY (`pelatihan_sebelumnya`) REFERENCES `pelatihan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pelatihan` (`id`, `unique_id`, `nama`, `latar_belakang`, `tujuan`, `kota`, `nip_penandatangan`, `nama_penandatangan`, `tanggal_mulai`, `tanggal_selesai`, `tingkat_id`, `status_id`, `forum_diskusi`, `lokasi`, `kriteria`, `jumlah_target`, `sasaran_wilayah`, `hasil_pelaksanaan_pelatihan`, `dasar_pelaksanaan`, `absensi_kehadiran`, `rekapitulasi_nilai`, `sertifikat`, `materi_pelatihan`, `pelaksana_id`, `pelatihan_sebelumnya`, `created_at`, `created_by`, `modified_at`, `modified_by`, `flag`) VALUES
(79,	'cTCfxymgOcycOCVHsxJ3AkG0rtcPTijH',	'Coba Survey',	'-',	'-',	'Sidoarjo',	'-',	'-',	'2020-12-01',	'2020-12-14',	1,	5,	'http://-',	'-',	'-',	1,	'-',	'-',	'-',	'uploads/berkas_pelatihan/absensi_kehadiran_j35PVUyp17pkx93vohs8_KsDFqaK7Si4.docx',	'uploads/berkas_pelatihan/rekapitulasi_nilai_imgx37ZSEmLpSldEHc8o1Ommg5yhEIMZ.docx',	'uploads/berkas_pelatihan/sertifikat_v1psULTuC_DeeNawZi_5Ypz3bjoB_8wJ.jpg',	NULL,	2,	NULL,	'2020-12-01 12:33:52',	1,	'2020-12-01 08:39:49',	1,	1),
(80,	'IOWrKX2u0nkYLX38nQL-I08SjGM_cN7G',	'Coba Survey Lanjut 1',	'-',	'-',	'Sidoarjo',	'-',	'-',	'2020-12-01',	'2020-12-14',	1,	1,	'http://-',	'-',	'-',	1,	'-',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	2,	NULL,	'2020-12-01 15:05:41',	1,	'2020-12-01 15:02:53',	1,	0),
(83,	'q4ReOfmFX1mFYcwaSWNGlnZ214EPwwci',	'Coba Survey Lanjut 1',	'-',	'-',	'Sidoarjo',	'-',	'-',	'2020-12-01',	'2020-12-14',	2,	1,	'http://-',	'-',	'-',	1,	'-',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	2,	NULL,	'2020-12-01 15:34:40',	1,	'2020-12-01 15:14:31',	1,	0),
(84,	'uwHbrjnYdV2NoAZDK8GVv4HsBNXs2Qvv',	'Coba Survey Lanjut 1',	'-',	'-',	'Sidoarjo',	'-',	'-',	'2020-12-01',	'2020-12-14',	2,	1,	'http://-',	'-',	'-',	1,	'-',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	2,	NULL,	'2020-12-01 15:38:27',	1,	'2020-12-01 15:35:06',	1,	0),
(85,	'Lly1Xdal3PQpFGpbVrWjPjHQgnEqJtIv',	'Coba Survey Lanjut 1',	'-',	'-',	'Sidoarjo',	'-',	'-',	'2020-12-01',	'2020-12-14',	2,	1,	'http://-',	'-',	'-',	1,	'-',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	2,	79,	'2020-12-01 15:37:33',	1,	'2020-12-01 15:36:59',	1,	0),
(86,	'yyUKt6NiFijooZuQgKVJMkqelOknBgyo',	'Coba Survey Lanjut 1',	'-',	'-',	'Sidoarjo',	'-',	'-',	'2020-12-01',	'2020-12-14',	2,	1,	'http://-',	'-',	'-',	1,	'-',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	2,	79,	'0000-00-00 00:00:00',	1,	'2020-12-01 15:38:47',	1,	1);

DROP TABLE IF EXISTS `pelatihan_kuesioner_kepuasan`;
CREATE TABLE `pelatihan_kuesioner_kepuasan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_id` int(11) NOT NULL,
  `peserta_id` int(11) NOT NULL,
  `soal` int(11) NOT NULL,
  `jawaban` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `peserta_id` (`peserta_id`),
  KEY `soal` (`soal`),
  KEY `jenis_id` (`jenis_id`),
  CONSTRAINT `pelatihan_kuesioner_kepuasan_ibfk_1` FOREIGN KEY (`peserta_id`) REFERENCES `pelatihan_peserta` (`id`),
  CONSTRAINT `pelatihan_kuesioner_kepuasan_ibfk_2` FOREIGN KEY (`soal`) REFERENCES `master_kuesioner_kepuasan` (`id`),
  CONSTRAINT `pelatihan_kuesioner_kepuasan_ibfk_3` FOREIGN KEY (`jenis_id`) REFERENCES `pelatihan_soal_jenis` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pelatihan_kuesioner_kepuasan` (`id`, `jenis_id`, `peserta_id`, `soal`, `jawaban`) VALUES
(1,	59,	36,	1,	'2'),
(2,	59,	36,	2,	'3'),
(3,	59,	36,	3,	'2'),
(4,	59,	36,	4,	'4'),
(5,	59,	36,	5,	'1'),
(6,	59,	36,	6,	'2'),
(7,	59,	36,	7,	'3'),
(8,	59,	36,	8,	'4'),
(9,	59,	36,	9,	'1'),
(10,	59,	36,	10,	'10\r\n');

DROP TABLE IF EXISTS `pelatihan_kuesioner_monev`;
CREATE TABLE `pelatihan_kuesioner_monev` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_id` int(11) NOT NULL,
  `peserta_id` int(11) NOT NULL,
  `soal` int(11) NOT NULL,
  `jawaban` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `peserta_id` (`peserta_id`),
  KEY `soal_id` (`soal`),
  KEY `jenis_id` (`jenis_id`),
  CONSTRAINT `pelatihan_kuesioner_monev_ibfk_1` FOREIGN KEY (`peserta_id`) REFERENCES `pelatihan_peserta` (`id`),
  CONSTRAINT `pelatihan_kuesioner_monev_ibfk_3` FOREIGN KEY (`soal`) REFERENCES `master_kuesioner_monev` (`id`),
  CONSTRAINT `pelatihan_kuesioner_monev_ibfk_4` FOREIGN KEY (`jenis_id`) REFERENCES `pelatihan_soal_jenis` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pelatihan_kuesioner_monev` (`id`, `jenis_id`, `peserta_id`, `soal`, `jawaban`) VALUES
(1,	60,	36,	1,	''),
(2,	60,	36,	2,	''),
(3,	60,	36,	3,	''),
(4,	60,	36,	4,	''),
(5,	60,	36,	5,	''),
(6,	60,	36,	6,	''),
(7,	60,	36,	7,	''),
(8,	60,	36,	8,	'Cukup Sesuai'),
(9,	60,	36,	9,	NULL),
(10,	60,	36,	10,	''),
(11,	60,	36,	11,	NULL),
(12,	60,	36,	12,	NULL),
(13,	60,	36,	13,	NULL),
(14,	60,	36,	14,	NULL),
(15,	60,	36,	15,	'');

DROP TABLE IF EXISTS `pelatihan_lampiran`;
CREATE TABLE `pelatihan_lampiran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pelatihan_id` int(11) NOT NULL,
  `judul_lampiran` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pelatihan_id` (`pelatihan_id`),
  CONSTRAINT `pelatihan_lampiran_ibfk_1` FOREIGN KEY (`pelatihan_id`) REFERENCES `pelatihan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pelatihan_lampiran` (`id`, `pelatihan_id`, `judul_lampiran`, `file`) VALUES
(27,	79,	'Proposal Kegiatan',	'iiV05P19QBMky8pzFhpvCqUMeWd32dsy.doc'),
(28,	80,	'Proposal Kegiatan',	'b6SR_oKgxEsP7R305t0JoLRKk9FZDW0p.doc'),
(29,	83,	'Proposal Kegiatan',	'syYjMBBzlzfAG1DDbG1lay-7zXHjz9pK.xls'),
(30,	84,	'Proposal Kegiatan',	'SGJZa_X92PGtH24g3q1o9Oi09_69dtFC.xls'),
(31,	85,	'Proposal Kegiatan',	'OPzIr8ptkBqo5PBnSUpByuOqIlyDJSbK.xls'),
(32,	86,	'Proposal Kegiatan',	'U_KyH9Vx0tOxaLzzMFOoS20JJ2FkxeLD.xls');

DROP TABLE IF EXISTS `pelatihan_peserta`;
CREATE TABLE `pelatihan_peserta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `pelatihan_id` int(11) NOT NULL COMMENT 'pelatihan yang sedang diikuti',
  `nik` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `tanggal_lahir` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `jenis_kelamin_id` int(11) NOT NULL,
  `pendidikan_id` int(11) NOT NULL,
  `pekerjaan_id` int(11) NOT NULL,
  `rt` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `desa_id` int(11) NOT NULL,
  `kehadiran` int(11) NOT NULL DEFAULT 0 COMMENT 'konfirmasi peserta jika 1 maka ikut, jika 0 maka mengundurkan diri atau tidak mengkonfirmasi kesiapan mengikutipelatihan',
  `nilai_pretest` int(11) NOT NULL DEFAULT 0 COMMENT 'nilai max 100',
  `nilai_posttest` int(11) NOT NULL DEFAULT 0 COMMENT 'nilai max 100',
  `nilai_praktek` int(11) NOT NULL DEFAULT 0 COMMENT 'nilai max 100, diinput pemateri',
  `komentar` text DEFAULT NULL COMMENT 'masukkan dari pemateri',
  `kesibukan_pasca_pelatihan` int(11) DEFAULT NULL,
  `nama_usaha` varchar(100) DEFAULT NULL COMMENT 'isi jika ada',
  `jenis_usaha` varchar(100) DEFAULT NULL COMMENT 'isi jika ada',
  `lokasi` text DEFAULT NULL COMMENT 'isi jika ada',
  `jenis_izin_usaha` text DEFAULT NULL COMMENT 'isi jika ada',
  `nib` text DEFAULT NULL COMMENT 'isi jika ada',
  `masa_berlaku` int(11) DEFAULT NULL COMMENT 'masa berlaku usaha dalam bulan, jika ada',
  `lanjut` int(11) NOT NULL DEFAULT 0 COMMENT '0 = berhenti, 1 = lanjut ke pelatihan berikutnya',
  PRIMARY KEY (`id`),
  KEY `pelatihan_id` (`pelatihan_id`),
  KEY `peserta_id` (`nama`),
  KEY `pendidikan_id` (`pendidikan_id`),
  KEY `pekerjaan_id` (`pekerjaan_id`),
  KEY `desa_id` (`desa_id`),
  KEY `jenis_kelamin_id` (`jenis_kelamin_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `pelatihan_peserta_ibfk_10` FOREIGN KEY (`desa_id`) REFERENCES `wilayah_desa` (`id`),
  CONSTRAINT `pelatihan_peserta_ibfk_11` FOREIGN KEY (`jenis_kelamin_id`) REFERENCES `master_jenis_kelamin` (`id`),
  CONSTRAINT `pelatihan_peserta_ibfk_12` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `pelatihan_peserta_ibfk_7` FOREIGN KEY (`pelatihan_id`) REFERENCES `pelatihan` (`id`),
  CONSTRAINT `pelatihan_peserta_ibfk_8` FOREIGN KEY (`pendidikan_id`) REFERENCES `master_pendidikan` (`id`),
  CONSTRAINT `pelatihan_peserta_ibfk_9` FOREIGN KEY (`pekerjaan_id`) REFERENCES `master_pekerjaan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pelatihan_peserta` (`id`, `user_id`, `pelatihan_id`, `nik`, `nama`, `email`, `no_telp`, `tanggal_lahir`, `tempat_lahir`, `jenis_kelamin_id`, `pendidikan_id`, `pekerjaan_id`, `rt`, `rw`, `alamat`, `desa_id`, `kehadiran`, `nilai_pretest`, `nilai_posttest`, `nilai_praktek`, `komentar`, `kesibukan_pasca_pelatihan`, `nama_usaha`, `jenis_usaha`, `lokasi`, `jenis_izin_usaha`, `nib`, `masa_berlaku`, `lanjut`) VALUES
(36,	7,	79,	'1912',	'Defri Indra Mahardika',	'defrindr@gmail.com',	'085604845437',	'2020-12-08',	'Ponorogo',	1,	4,	1,	12,	12,	'Ponorogo',	1,	1,	0,	100,	0,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1),
(37,	7,	80,	'1912',	'Defri Indra Mahardika',	'defrindr@gmail.com',	'085604845437',	'2020-12-08',	'Ponorogo',	1,	4,	1,	12,	12,	'Ponorogo',	1,	0,	0,	0,	0,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0),
(38,	7,	83,	'1912',	'Defri Indra Mahardika',	'defrindr@gmail.com',	'085604845437',	'2020-12-08',	'Ponorogo',	1,	4,	1,	12,	12,	'Ponorogo',	1,	0,	0,	0,	0,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0),
(39,	7,	84,	'1912',	'Defri Indra Mahardika',	'defrindr@gmail.com',	'085604845437',	'2020-12-08',	'Ponorogo',	1,	4,	1,	12,	12,	'Ponorogo',	1,	0,	0,	0,	0,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0),
(40,	7,	85,	'1912',	'Defri Indra Mahardika',	'defrindr@gmail.com',	'085604845437',	'2020-12-08',	'Ponorogo',	1,	4,	1,	12,	12,	'Ponorogo',	1,	0,	0,	0,	0,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0),
(41,	7,	86,	'1912',	'Defri Indra Mahardika',	'defrindr@gmail.com',	'085604845437',	'2020-12-08',	'Ponorogo',	1,	4,	1,	12,	12,	'Ponorogo',	1,	0,	0,	0,	0,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0);

DROP TABLE IF EXISTS `pelatihan_soal`;
CREATE TABLE `pelatihan_soal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `kategori_soal_id` int(11) NOT NULL,
  `nomor` int(11) DEFAULT NULL,
  `soal` text NOT NULL,
  `pilihan` text DEFAULT NULL,
  `jawaban` text DEFAULT NULL COMMENT 'jawaban dari sistem',
  `order` int(11) DEFAULT NULL,
  `nilai_maksimum` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jenis_id` (`jenis_id`),
  KEY `kategori_soal_id` (`kategori_soal_id`),
  CONSTRAINT `pelatihan_soal_ibfk_2` FOREIGN KEY (`kategori_soal_id`) REFERENCES `master_kategori_soal` (`id`),
  CONSTRAINT `pelatihan_soal_ibfk_3` FOREIGN KEY (`jenis_id`) REFERENCES `pelatihan_soal_jenis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pelatihan_soal` (`id`, `unique_id`, `kota`, `jenis_id`, `kategori_soal_id`, `nomor`, `soal`, `pilihan`, `jawaban`, `order`, `nilai_maksimum`) VALUES
(120,	'pRhxebT9tT2XlcfFilWzlf9R4vwkVYwibk8zHpqNgJ084vQtWT',	'',	61,	1,	NULL,	'1+1',	NULL,	'2',	1,	NULL),
(121,	'KBpGbBVBecWwlUAypR5BSrFxmhYaYysGCtDkutPK6IXhCSmMl9',	'',	61,	1,	NULL,	'2+3',	NULL,	'5',	2,	NULL),
(122,	'f_s9_Vs-ser-YySZU46QaL2KlnCRzedd_pi-OBI0w4VJplCAH9',	'',	62,	1,	NULL,	'ini soal 1',	NULL,	'jawaban benar',	1,	NULL),
(123,	'egiXsaVXHd3BcrqRcUUu-V7UZi6K3cZveiF3mnBbIiaeuuUMXo',	'',	62,	1,	NULL,	'ni soal 2',	NULL,	'jawaban benar',	2,	NULL);

DROP TABLE IF EXISTS `pelatihan_soal_jenis`;
CREATE TABLE `pelatihan_soal_jenis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_id` int(11) NOT NULL COMMENT 'jenis soal pelatihan',
  `pelatihan_id` int(11) NOT NULL COMMENT 'pelatihan yang diadakan',
  `waktu_pengerjaan` int(11) NOT NULL DEFAULT 120 COMMENT 'waktu pengerjaan , dalam satuan menit',
  `jumlah_soal` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `jenis_id` (`jenis_id`),
  KEY `pelatihan_id` (`pelatihan_id`),
  CONSTRAINT `pelatihan_soal_jenis_ibfk_1` FOREIGN KEY (`jenis_id`) REFERENCES `master_jenis_soal` (`id`),
  CONSTRAINT `pelatihan_soal_jenis_ibfk_2` FOREIGN KEY (`pelatihan_id`) REFERENCES `pelatihan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pelatihan_soal_jenis` (`id`, `jenis_id`, `pelatihan_id`, `waktu_pengerjaan`, `jumlah_soal`) VALUES
(59,	4,	79,	120,	10),
(60,	5,	79,	120,	10),
(61,	1,	79,	10,	2),
(62,	2,	79,	120,	2),
(63,	4,	80,	120,	10),
(64,	5,	80,	120,	10),
(69,	4,	83,	120,	10),
(70,	5,	83,	120,	10),
(71,	4,	84,	120,	10),
(72,	5,	84,	120,	10),
(73,	4,	85,	120,	10),
(74,	5,	85,	120,	10),
(75,	4,	86,	120,	10),
(76,	5,	86,	120,	10);

DROP TABLE IF EXISTS `pelatihan_soal_peserta`;
CREATE TABLE `pelatihan_soal_peserta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `peserta_id` int(11) NOT NULL,
  `jenis_soal` int(11) NOT NULL,
  `selesai` int(11) NOT NULL DEFAULT 0 COMMENT '0 = belum_selesai, 1 = selesai',
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `peserta_id` (`peserta_id`),
  KEY `jenis_soal` (`jenis_soal`),
  CONSTRAINT `pelatihan_soal_peserta_ibfk_1` FOREIGN KEY (`peserta_id`) REFERENCES `pelatihan_peserta` (`id`),
  CONSTRAINT `pelatihan_soal_peserta_ibfk_2` FOREIGN KEY (`jenis_soal`) REFERENCES `pelatihan_soal_jenis` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pelatihan_soal_peserta` (`id`, `peserta_id`, `jenis_soal`, `selesai`, `waktu_mulai`, `waktu_selesai`) VALUES
(21,	36,	61,	0,	'2020-12-01 16:09:19',	'2020-12-01 16:19:19'),
(22,	36,	62,	1,	'2020-12-01 17:20:43',	'2020-12-01 19:20:43');

DROP TABLE IF EXISTS `pelatihan_soal_peserta_jawaban`;
CREATE TABLE `pelatihan_soal_peserta_jawaban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `peserta_id` int(11) NOT NULL,
  `soal_id` int(11) NOT NULL,
  `jawaban` text NOT NULL COMMENT 'jawaban peserta',
  `nilai` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `peserta_id` (`peserta_id`),
  KEY `soal_id` (`soal_id`),
  CONSTRAINT `pelatihan_soal_peserta_jawaban_ibfk_2` FOREIGN KEY (`soal_id`) REFERENCES `pelatihan_soal` (`id`),
  CONSTRAINT `pelatihan_soal_peserta_jawaban_ibfk_4` FOREIGN KEY (`peserta_id`) REFERENCES `pelatihan_soal_peserta` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pelatihan_soal_peserta_jawaban` (`id`, `peserta_id`, `soal_id`, `jawaban`, `nilai`) VALUES
(22,	22,	122,	'jawaban benar',	0),
(23,	22,	123,	'jawaban benar',	0);

DROP TABLE IF EXISTS `pelatihan_soal_pilihan`;
CREATE TABLE `pelatihan_soal_pilihan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pelatihan_soal_id` int(11) NOT NULL,
  `pilihan` text DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `pelatihan_soal_id` (`pelatihan_soal_id`),
  CONSTRAINT `pelatihan_soal_pilihan_ibfk_3` FOREIGN KEY (`pelatihan_soal_id`) REFERENCES `pelatihan_soal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pelatihan_soal_pilihan` (`id`, `pelatihan_soal_id`, `pilihan`, `flag`) VALUES
(221,	120,	'2',	1),
(222,	120,	'3',	1),
(223,	120,	'4',	1),
(224,	121,	'1',	1),
(225,	121,	'5',	1),
(226,	121,	'2',	1),
(227,	122,	'jawaban benar',	1),
(228,	122,	'salah',	1),
(229,	122,	'salah',	1),
(230,	123,	'salah',	1),
(231,	123,	'salah',	1),
(232,	123,	'salah',	1),
(233,	123,	'jawaban benar',	1);

DROP TABLE IF EXISTS `pelatihan_status`;
CREATE TABLE `pelatihan_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `pelatihan_status_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pelatihan_status` (`id`, `nama`, `role_id`) VALUES
(1,	'Proses Pelengkapan Data',	2),
(2,	'Menunggu',	1),
(3,	'Di Setujui',	2),
(4,	'Monev',	1),
(5,	'Selesai',	NULL);

DROP TABLE IF EXISTS `pelatihan_tingkat`;
CREATE TABLE `pelatihan_tingkat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL COMMENT 'Nama tingkat pelatihan, ex : pelatihan dasar, pelatihan menengah',
  `flag` int(11) NOT NULL DEFAULT 1 COMMENT '0 = deleted, 1 = active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pelatihan_tingkat` (`id`, `nama`, `flag`) VALUES
(1,	'Pelatihan Tingkat Dasar',	1),
(2,	'Pelatihan Tingkat Lanjut 1',	1),
(3,	'Pelatihan Tingkat Lanjut 2',	1);

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `role` (`id`, `name`) VALUES
(1,	'Super Administrator'),
(2,	'Pelaksana'),
(3,	'Regular User'),
(4,	'Pengisi Acara');

DROP TABLE IF EXISTS `role_action`;
CREATE TABLE `role_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  KEY `action_id` (`action_id`),
  CONSTRAINT `role_action_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  CONSTRAINT `role_action_ibfk_2` FOREIGN KEY (`action_id`) REFERENCES `action` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `role_action` (`id`, `role_id`, `action_id`) VALUES
(1309,	2,	12),
(1310,	2,	13),
(1311,	2,	14),
(1312,	2,	15),
(1313,	2,	16),
(1314,	2,	17),
(1315,	2,	18),
(1316,	2,	19),
(1317,	2,	20),
(1318,	2,	21),
(1319,	2,	22),
(1320,	2,	23),
(1321,	2,	24),
(1322,	2,	25),
(1323,	2,	26),
(1324,	2,	27),
(1325,	2,	28),
(1326,	2,	29),
(1327,	2,	30),
(1328,	2,	31),
(1329,	2,	32),
(1330,	2,	33),
(1331,	2,	55),
(1332,	2,	56),
(1333,	2,	57),
(1334,	2,	59),
(1335,	2,	60),
(1336,	2,	61),
(1337,	2,	64),
(1338,	2,	71),
(1339,	2,	36),
(1340,	2,	37),
(1341,	2,	38),
(1342,	2,	39),
(1343,	2,	40),
(1344,	2,	46),
(1345,	2,	47),
(1346,	2,	48),
(1347,	2,	49),
(1348,	2,	42),
(1349,	2,	44),
(1350,	2,	51),
(1351,	2,	53),
(1352,	2,	76),
(1458,	3,	12),
(1459,	3,	14),
(1460,	3,	15),
(1461,	3,	16),
(1462,	3,	70),
(1463,	3,	36),
(1464,	3,	37),
(1465,	3,	77),
(1466,	3,	72),
(1467,	3,	73),
(1468,	3,	66),
(1469,	3,	74),
(1470,	3,	75),
(1471,	3,	68),
(1472,	3,	80),
(1473,	1,	12),
(1474,	1,	13),
(1475,	1,	14),
(1476,	1,	15),
(1477,	1,	17),
(1478,	1,	18),
(1479,	1,	19),
(1480,	1,	20),
(1481,	1,	21),
(1482,	1,	22),
(1483,	1,	23),
(1484,	1,	24),
(1485,	1,	25),
(1486,	1,	26),
(1487,	1,	27),
(1488,	1,	28),
(1489,	1,	29),
(1490,	1,	30),
(1491,	1,	31),
(1492,	1,	32),
(1493,	1,	33),
(1494,	1,	81),
(1495,	1,	70),
(1496,	1,	55),
(1497,	1,	56),
(1498,	1,	57),
(1499,	1,	59),
(1500,	1,	60),
(1501,	1,	61),
(1502,	1,	65),
(1503,	1,	64),
(1504,	1,	71),
(1505,	1,	82),
(1506,	1,	36),
(1507,	1,	37),
(1508,	1,	38),
(1509,	1,	39),
(1510,	1,	40),
(1511,	1,	46),
(1512,	1,	47),
(1513,	1,	48),
(1514,	1,	49),
(1515,	1,	42),
(1516,	1,	43),
(1517,	1,	44),
(1518,	1,	45),
(1519,	1,	51),
(1520,	1,	52),
(1521,	1,	53),
(1522,	1,	54),
(1523,	1,	77),
(1524,	1,	72),
(1525,	1,	73),
(1526,	1,	66),
(1527,	1,	78),
(1528,	1,	74),
(1529,	1,	75),
(1530,	1,	68);

DROP TABLE IF EXISTS `role_menu`;
CREATE TABLE `role_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  KEY `menu_id` (`menu_id`),
  CONSTRAINT `role_menu_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  CONSTRAINT `role_menu_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `role_menu` (`id`, `role_id`, `menu_id`) VALUES
(255,	2,	1),
(256,	2,	2),
(257,	2,	3),
(258,	2,	4),
(259,	2,	5),
(260,	2,	6),
(277,	3,	1),
(278,	3,	6),
(279,	1,	1),
(280,	1,	2),
(281,	1,	3),
(282,	1,	4),
(283,	1,	5),
(284,	1,	6);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `photo_url` varchar(255) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_logout` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user` (`id`, `username`, `password`, `name`, `role_id`, `photo_url`, `last_login`, `last_logout`) VALUES
(1,	'admin',	'21232f297a57a5a743894a0e4a801fc3',	'Dinas Pusat',	1,	'ID6jM8Az7Yh_R6LR44Ezh02VECKTQ_Ya.png',	'2020-12-01 19:20:42',	'2020-12-01 17:30:03'),
(2,	'dinas_pendidikan',	'f0b171542f1bebedf72dbd45edc4755f',	'Dinas Pendidikan',	2,	'default.png',	'2020-12-01 14:52:34',	'2020-12-01 15:31:06'),
(6,	'2020',	'e01f0aec6f2fa605c2d154a17ff74f02',	'Ronaldo Wati',	3,	NULL,	'2020-12-01 15:33:28',	'2020-12-01 15:35:01'),
(7,	'1912',	'7d075590d614e32721b829d13641273c',	'Defri Indra Mahardika',	3,	NULL,	'2020-12-01 19:07:51',	'2020-12-01 19:07:57');

DROP TABLE IF EXISTS `wilayah_desa`;
CREATE TABLE `wilayah_desa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kecamatan_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL COMMENT 'Nama Desa',
  PRIMARY KEY (`id`),
  KEY `kecamatan_id` (`kecamatan_id`),
  CONSTRAINT `wilayah_desa_ibfk_1` FOREIGN KEY (`kecamatan_id`) REFERENCES `wilayah_kecamatan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `wilayah_desa` (`id`, `kecamatan_id`, `nama`) VALUES
(1,	1,	'Pulung');

DROP TABLE IF EXISTS `wilayah_kabupaten`;
CREATE TABLE `wilayah_kabupaten` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `provinsi_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `provinsi_id` (`provinsi_id`),
  CONSTRAINT `wilayah_kabupaten_ibfk_2` FOREIGN KEY (`provinsi_id`) REFERENCES `wilayah_provinsi` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `wilayah_kabupaten` (`id`, `provinsi_id`, `nama`) VALUES
(1,	1,	'Ponorogo');

DROP TABLE IF EXISTS `wilayah_kecamatan`;
CREATE TABLE `wilayah_kecamatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kabupaten_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL COMMENT 'nama kecamatan',
  PRIMARY KEY (`id`),
  KEY `kabupaten_id` (`kabupaten_id`),
  CONSTRAINT `wilayah_kecamatan_ibfk_1` FOREIGN KEY (`kabupaten_id`) REFERENCES `wilayah_kabupaten` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `wilayah_kecamatan` (`id`, `kabupaten_id`, `nama`) VALUES
(1,	1,	'Pulung');

DROP TABLE IF EXISTS `wilayah_provinsi`;
CREATE TABLE `wilayah_provinsi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `wilayah_provinsi` (`id`, `nama`) VALUES
(1,	'jawa timur');

-- 2020-12-01 15:40:15
