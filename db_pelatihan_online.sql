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
(80,	'kuisioner-kepuasan',	'index',	'Index');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `master_kuesioner_kepuasan` (`id`, `pertanyaan`, `jawaban`) VALUES
(1,	'Bagaimana pemahaman materi narasumber?',	'1|2|3|4'),
(2,	'Bagaimana interaksi narasumber dengan peserta?',	'1|2|3|4'),
(3,	'Bagaimana kejelasan pemaparan materi?',	'1|2|3|4'),
(4,	'Bagaimana feedback yang diberikn narasumber?',	'1|2|3|4'),
(5,	'Bagaimana metode yang digunakan dalam menyampaikan materi?',	'1|2|3|4'),
(6,	'Bagaimana pemahaman alat pembelajaran yang digunakan dalam menyampaikan materi?',	'1|2|3|4'),
(7,	'Bagaimana kemudaham memahami materi?',	'1|2|3|4'),
(8,	'Bagaimana kebermanfaatan materi dengan kebutuhan anda?',	'1|2|3|4'),
(9,	'Bagaimana keselarasanantara materi pelatihan dengan tujuan pelatihan?',	'1|2|3|4'),
(10,	'Komentar dan saran untuk pelatihan',	'');

DROP TABLE IF EXISTS `master_kuesioner_monev`;
CREATE TABLE `master_kuesioner_monev` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pertanyaan` varchar(200) NOT NULL,
  `jawaban` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `master_kuesioner_monev` (`id`, `pertanyaan`, `jawaban`) VALUES
(1,	'Nama Usaha',	''),
(2,	'Jenis Usaha',	''),
(3,	'Spesifikasi Produk',	''),
(4,	'Lokasi usaha',	''),
(5,	'Jenis Ijin Usaha (Jika Ada)',	''),
(6,	'Nomor Induk Berusaha (NIB)',	''),
(7,	'Masa Berlaku NIB',	''),
(8,	'Apakah materi pelatihan yang anda ikuti sesuai dengan kebutuhan usaha Anda?',	'Sesuai|Cukup Sesuai|Tidak Sesuai'),
(9,	'Apakah anda telah menerapkan materi pelatihan yang diberikan?',	'Sudah. dalam kegiatan sehari hari|Sudah, dalam kegiatan usaha|Tidak menerapkan'),
(10,	'Jelaskan penerapan materi pelatihan tersebut',	''),
(11,	'Bagaimanna Manfaat meteri anda terhadap perkembangan SDM / TENAGA KERJA?',	'Berkurang|Tetap|Bertambah'),
(12,	'Bagaimanna Manfaat meteri anda terhadap perkembangan OMSET?',	'Berkurang|Tetap|Bertambah'),
(13,	'Bagaimanna Manfaat meteri anda terhadap perkembangan VARIASI PRODUK?',	'Berkurang|Tetap|Bertambah'),
(14,	'Bagaimanna Manfaat meteri anda terhadap perkembangan MESIN / TEKNOLOGI yang digunakan?',	'Berkurang|Tetap|Bertambah'),
(15,	'Sebutkan saran dan Harapan untuk perbaikan kegiatan pembinaan / pelatihan ini.',	'');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_by` int(11) NOT NULL,
  `flag` int(11) NOT NULL DEFAULT 1 COMMENT '0 = deleted , 1 = active',
  PRIMARY KEY (`id`),
  KEY `pelatihan_tingkat_id` (`tingkat_id`),
  KEY `pelaksana_id` (`pelaksana_id`),
  KEY `status_id` (`status_id`),
  CONSTRAINT `pelatihan_ibfk_1` FOREIGN KEY (`tingkat_id`) REFERENCES `pelatihan_tingkat` (`id`),
  CONSTRAINT `pelatihan_ibfk_2` FOREIGN KEY (`pelaksana_id`) REFERENCES `user` (`id`),
  CONSTRAINT `pelatihan_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `pelatihan_status` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pelatihan` (`id`, `unique_id`, `nama`, `latar_belakang`, `tujuan`, `nip_penandatangan`, `nama_penandatangan`, `tanggal_mulai`, `tanggal_selesai`, `tingkat_id`, `status_id`, `forum_diskusi`, `lokasi`, `kriteria`, `jumlah_target`, `sasaran_wilayah`, `hasil_pelaksanaan_pelatihan`, `dasar_pelaksanaan`, `absensi_kehadiran`, `rekapitulasi_nilai`, `sertifikat`, `materi_pelatihan`, `pelaksana_id`, `created_at`, `created_by`, `modified_at`, `modified_by`, `flag`) VALUES
(67,	'LpYlQ5BzuAhqfQhNBFN4E47BZYm_Mhng',	'React',	'-',	'-',	'',	'',	'2020-11-30',	'2020-12-02',	1,	1,	'http://1t.me/defrindr',	'',	'-',	1,	'-',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	2,	'2020-12-01 06:40:08',	2,	'2020-11-30 11:12:03',	2,	1),
(71,	'g8-HWdz1bxc1gKdjPNWC4kqHsMG-N7WR',	'React',	'-',	'-',	'',	'',	'2020-11-30',	'2020-12-07',	1,	1,	'http://t.me/defrindr',	'',	'-',	1,	'-',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	2,	'2020-12-01 06:13:55',	2,	'2020-11-30 11:51:23',	1,	0),
(72,	'Gwcr9T12HHqfYdMR42udvPiNlboj2yGL',	'Piano',	'-',	'-',	'',	'',	'2020-11-30',	'2020-12-14',	1,	3,	'http://1t.me/defrindr',	'',	'-',	1,	'-',	'-',	'-',	'uploads/berkas_pelatihan/absensi_kehadiran_Ol7Y6uWa7u3F1q1yx-8G46V4Qj31aIEK.docx',	'uploads/berkas_pelatihan/rekapitulasi_nilai_10X_gbU7cW1w31GRIZjurDPzsdG1lGRV.docx',	'uploads/berkas_pelatihan/sertifikat_CJogJ9t1o-XxMUzhT2QUxgMlSZMSMllV.docx',	NULL,	2,	'2020-12-01 06:13:59',	2,	'2020-11-30 11:52:32',	1,	0),
(75,	'BWvezDRQapHZ5pkogWrrXe4POvhzjI_g',	'Badminton',	'-',	'-',	'',	'',	'2020-12-01',	'2020-12-14',	1,	3,	'http://t.me/defrindr',	'',	'-',	10,	'-',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	2,	'2020-12-01 06:12:39',	1,	'2020-12-01 04:48:09',	1,	0),
(76,	'Eh1DBUkYmhCBhP6_tSC_nHtY2hap31-I',	'Coba Survey',	'-',	'-',	'',	'asd',	'2020-12-01',	'2020-12-04',	1,	1,	'http://1t.me/defrindr',	'asd\r\n',	'-',	3,	'-',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	2,	'2020-12-01 08:07:24',	1,	'2020-12-01 06:34:03',	2,	1);

DROP TABLE IF EXISTS `pelatihan_kuisioner_kepuasan`;
CREATE TABLE `pelatihan_kuisioner_kepuasan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_id` int(11) NOT NULL,
  `peserta_id` int(11) NOT NULL,
  `soal` int(11) NOT NULL,
  `jawaban` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `peserta_id` (`peserta_id`),
  KEY `soal` (`soal`),
  KEY `jenis_id` (`jenis_id`),
  CONSTRAINT `pelatihan_kuisioner_kepuasan_ibfk_1` FOREIGN KEY (`peserta_id`) REFERENCES `pelatihan_peserta` (`id`),
  CONSTRAINT `pelatihan_kuisioner_kepuasan_ibfk_2` FOREIGN KEY (`soal`) REFERENCES `master_kuesioner_kepuasan` (`id`),
  CONSTRAINT `pelatihan_kuisioner_kepuasan_ibfk_3` FOREIGN KEY (`jenis_id`) REFERENCES `pelatihan_soal_jenis` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `pelatihan_kuisioner_monev`;
CREATE TABLE `pelatihan_kuisioner_monev` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_id` int(11) NOT NULL,
  `peserta_id` int(11) NOT NULL,
  `soal_id` int(11) NOT NULL,
  `jawaban` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `peserta_id` (`peserta_id`),
  KEY `soal_id` (`soal_id`),
  KEY `jenis_id` (`jenis_id`),
  CONSTRAINT `pelatihan_kuisioner_monev_ibfk_1` FOREIGN KEY (`peserta_id`) REFERENCES `pelatihan_peserta` (`id`),
  CONSTRAINT `pelatihan_kuisioner_monev_ibfk_3` FOREIGN KEY (`soal_id`) REFERENCES `master_kuesioner_monev` (`id`),
  CONSTRAINT `pelatihan_kuisioner_monev_ibfk_4` FOREIGN KEY (`jenis_id`) REFERENCES `pelatihan_soal_jenis` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


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
(18,	67,	'test',	'KI4_UwWZzWBKi40sAm4847hwKAlOvU7v.xls'),
(19,	67,	'2020',	'kv6UbYEjYWzV4TBL92t8nEcXVTakywcq.doc'),
(20,	71,	'Proposal Kegiatan',	'6i20Op80c6k2g3BlKsj28ZEELDSqWIgT.xls'),
(21,	71,	'2020',	'TANIUpUE5kUTgPIuZSrhkIrmDmkbLtkd.doc'),
(22,	72,	'Proposal Kegiatan',	'iZmJ8CskxeKoC6LbEGtzjM5F-8EDwtzi.xls'),
(23,	75,	'Proposal Kegiatan',	'L5XJNacWzAGVI_zYjpym_EmUEiGxBKNF.doc'),
(24,	76,	'Proposal Kegiatan',	'6jndNp_GiWGMuFtHQmizuSxcIotBtvPH.doc');

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
(33,	6,	72,	'2020',	'Ronaldo Wati',	'defrindr@gmail.com',	'085604845437',	'2002-05-12',	'Ponorogo',	1,	5,	1,	12,	12,	'Ponorogo',	1,	0,	0,	0,	0,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0),
(34,	7,	75,	'1912',	'Defri Indra Mahardika',	'defrindr@gmail.com',	'085604845437',	'2002-05-19',	'Ponorogo',	1,	5,	1,	12,	12,	'Ponorogo',	1,	1,	100,	75,	40,	'',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0),
(35,	7,	76,	'1912',	'Defri Indra Mahardika',	'defrindr@gmail.com',	'085604845437',	'2002-05-19',	'Ponorogo',	1,	5,	1,	12,	12,	'Ponorogo',	1,	0,	0,	0,	0,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0);

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
(66,	'AS5jAnENEMDZnPcpl4_a-QqBL8nDq9P8-VUtSrKvNflM2u5r2K',	'',	33,	1,	NULL,	'test',	NULL,	'test',	1,	50),
(67,	'Mi0B0XEqCtMpb_zqPOe6i8t7o2L2hslXoRrOYW7ShSFXPy8N8G',	'',	33,	2,	NULL,	'bwabwabwa',	NULL,	'',	2,	50),
(87,	'9eIaLdXKRevrZh676OCEuuBajCetx1nBUoeKfhedDCZ8v17dMB',	'',	34,	1,	NULL,	'-',	NULL,	'-',	1,	50),
(88,	'RiUrPeFlLI2C5c3L90Ndf2tV4S4-57loMdNQxNAsog2-RnerGq',	'',	34,	2,	NULL,	'-',	NULL,	'-',	2,	50),
(89,	'ZLmf2TSqbjeGakjMs45VoklQ7-AuejA9Kpf6BLArGkJjuC9DOy',	'',	35,	1,	NULL,	'Presiden Pertama Indonesia',	NULL,	'IR Soekarno',	1,	100),
(92,	'BTAuZTMH-O8kQnMr5JDhwmojm5hCN7PvX0PYJnT-C-Tf6hf4y4',	'',	43,	1,	NULL,	'test',	NULL,	'1',	1,	NULL),
(93,	'2joCZQKTPF6WiagynZibihTmvH6ax3Q96rDVdsC3aY9hmHujtb',	'',	43,	1,	NULL,	'test 2',	NULL,	'2',	2,	NULL),
(94,	'TnjNt3Dh2DB6osvxFDBkBVeCMBNibUxDpA8B4PegFdrNJsEok4',	'',	44,	1,	NULL,	'Presiden Pertama Indonesia',	NULL,	'IR Soekarno',	1,	NULL),
(95,	'yBeR_a-_U2CeYC-2EBO_KHT4C9WI2No4r7QAHi83Ecfj5lm_Nq',	'',	44,	1,	NULL,	'Warna Bendera Indonesia',	NULL,	'Merah Putih',	2,	NULL),
(96,	'8pDI95nlTQeg674Fwbd-EIOoA6pQlObMVB6VlzTtprvMBv6GbB',	'',	44,	1,	NULL,	'Bahasa Inggris Dari Hujan',	NULL,	'Rain',	3,	NULL),
(97,	'P1SOCIFZmmsWXXvbQVDMoHI1GAFqm_INv3aReXogRHtIRY8EwM',	'',	44,	1,	NULL,	'Kependekan dari Negara esatuan Republik Indonesia Adalah',	NULL,	'NKRI',	4,	NULL),
(105,	'P8kRiUihmE0EHpPeSvov_Kq8voWEUmE8hZ3RLzYFBlYTAKJXRz',	'',	45,	1,	NULL,	'test',	NULL,	'test',	1,	NULL),
(106,	'8r-CeNbfLM3TGhq8srfWmV6TvOreD8iLxWiUlDEAkysNZPvHMm',	'',	45,	1,	NULL,	'awaw',	NULL,	'awaw',	2,	NULL),
(108,	'_zCG0FfmiTxyt8YQ7VGreSty7-tCk6HGbxbX1r0b7kesJnWxx7',	'',	48,	1,	NULL,	'coba tambah',	NULL,	'test',	1,	NULL),
(109,	'QIS6yMQNeaa6FCY1TlJOlneZ2-6adNOe3adGY7pkuOLAvD0z6L',	'',	49,	1,	NULL,	'asu',	NULL,	'asd',	1,	NULL),
(110,	'tWe6oT4CDwojVdTZ6LeOSjsWaFY_nFQ7mbZpu_ZveBCYy_2l4_',	'',	50,	1,	NULL,	'123',	NULL,	'6647',	1,	NULL),
(111,	'qf8ILWiw-RFGTlf_azD6ma9wGMCCVSXyO36Rj0fXh2MikF80fi',	'',	50,	1,	NULL,	'21837',	NULL,	'123',	2,	NULL),
(112,	'qae6JMweKOS5dppmRITc0KqjSpATkXI24eDX6mFTvuq3xbHocs',	'',	51,	1,	NULL,	'123',	NULL,	'123',	1,	NULL);

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
(33,	1,	72,	120,	2),
(34,	2,	72,	120,	2),
(35,	2,	71,	1,	1),
(43,	1,	71,	10,	2),
(44,	2,	75,	120,	4),
(45,	1,	75,	120,	2),
(46,	4,	76,	120,	10),
(47,	5,	76,	120,	10),
(48,	1,	76,	1,	1),
(49,	2,	76,	120,	1),
(50,	1,	67,	123,	2),
(51,	2,	67,	123,	1);

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
(17,	33,	33,	0,	'2020-11-30 19:56:27',	'2020-11-30 21:56:27'),
(18,	33,	34,	1,	'2020-11-30 21:41:47',	'2020-12-02 23:41:47'),
(19,	34,	44,	1,	'2020-12-01 11:53:07',	'2020-12-01 13:53:07'),
(20,	34,	45,	1,	'2020-12-01 12:13:20',	'2020-12-01 14:13:20');

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
(12,	17,	66,	'test',	0),
(13,	17,	67,	'-mn',	0),
(14,	18,	87,	')',	0),
(15,	18,	88,	'Pepepepe',	30),
(16,	19,	94,	'IR Soekarno',	0),
(17,	19,	95,	'Biru Muda',	0),
(18,	19,	96,	'Rain',	0),
(19,	19,	97,	'NKRI',	0),
(20,	20,	105,	'test',	0),
(21,	20,	106,	'awaw',	0);

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
(142,	66,	'test',	1),
(143,	66,	'tost',	1),
(144,	67,	'',	1),
(164,	87,	'-',	1),
(165,	87,	')',	1),
(166,	88,	'-',	1),
(167,	89,	'IR Soekarno',	1),
(168,	89,	'Malin Kundang',	1),
(175,	92,	'1',	1),
(176,	92,	'2',	1),
(177,	92,	'3',	1),
(178,	93,	'1',	1),
(179,	93,	'2',	1),
(180,	93,	'3',	1),
(181,	94,	'IR Soekarno',	1),
(182,	94,	'Muh Hatta',	1),
(183,	95,	'Merah Putih',	1),
(184,	95,	'Biru Muda',	1),
(185,	96,	'Rain',	1),
(186,	96,	'jawah',	1),
(187,	97,	'NKRI',	1),
(188,	97,	'ABRI',	1),
(189,	105,	'test',	1),
(190,	105,	'test2',	1),
(191,	106,	'aw',	1),
(192,	106,	'awaw',	1),
(196,	108,	'-',	1),
(197,	108,	'abc',	1),
(198,	108,	'test',	1),
(199,	109,	'asi',	1),
(200,	110,	'213',	1),
(201,	110,	'2112',	1),
(202,	110,	'6647',	1),
(203,	111,	'87712',	1),
(204,	111,	'28193',	1),
(205,	111,	'123',	1),
(206,	112,	'123',	1);

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
(1410,	1,	12),
(1411,	1,	13),
(1412,	1,	14),
(1413,	1,	15),
(1414,	1,	17),
(1415,	1,	18),
(1416,	1,	19),
(1417,	1,	20),
(1418,	1,	21),
(1419,	1,	22),
(1420,	1,	23),
(1421,	1,	24),
(1422,	1,	25),
(1423,	1,	26),
(1424,	1,	27),
(1425,	1,	28),
(1426,	1,	29),
(1427,	1,	30),
(1428,	1,	31),
(1429,	1,	32),
(1430,	1,	33),
(1431,	1,	55),
(1432,	1,	56),
(1433,	1,	57),
(1434,	1,	59),
(1435,	1,	60),
(1436,	1,	61),
(1437,	1,	65),
(1438,	1,	64),
(1439,	1,	71),
(1440,	1,	36),
(1441,	1,	37),
(1442,	1,	38),
(1443,	1,	39),
(1444,	1,	40),
(1445,	1,	46),
(1446,	1,	47),
(1447,	1,	48),
(1448,	1,	49),
(1449,	1,	42),
(1450,	1,	43),
(1451,	1,	44),
(1452,	1,	45),
(1453,	1,	51),
(1454,	1,	52),
(1455,	1,	53),
(1456,	1,	54),
(1457,	1,	80),
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
(1472,	3,	80);

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
(271,	1,	1),
(272,	1,	2),
(273,	1,	3),
(274,	1,	4),
(275,	1,	5),
(276,	1,	6),
(277,	3,	1),
(278,	3,	6);

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
(1,	'admin',	'21232f297a57a5a743894a0e4a801fc3',	'Dinas Pusat',	1,	'ID6jM8Az7Yh_R6LR44Ezh02VECKTQ_Ya.png',	'2020-12-01 14:00:57',	'2020-12-01 14:15:07'),
(2,	'dinas_pendidikan',	'f0b171542f1bebedf72dbd45edc4755f',	'Dinas Pendidikan',	2,	'default.png',	'2020-12-01 14:52:34',	'2020-11-30 19:55:56'),
(6,	'2020',	'e01f0aec6f2fa605c2d154a17ff74f02',	'Ronaldo Wati',	3,	NULL,	'2020-12-01 11:23:39',	'2020-12-01 11:46:05'),
(7,	'1912',	'7d075590d614e32721b829d13641273c',	'Defri Indra Mahardika',	3,	NULL,	'2020-12-01 14:15:13',	'2020-12-01 14:52:23');

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

-- 2020-12-01 08:10:02
