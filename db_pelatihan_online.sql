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
(76,	'posttest',	'koreksi-jawaban',	'Koreksi Jawaban');

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
(3,	'Praktek',	1);

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
(1,	'Home',	'site',	'index',	'fa fa-home',	9,	NULL),
(2,	'Master',	'',	'index',	'fa fa-database',	2,	NULL),
(3,	'Menu',	'menu',	'index',	'fa fa-circle-o',	4,	2),
(4,	'Role',	'role',	'index',	'fa fa-circle-o',	5,	2),
(5,	'User',	'user',	'index',	'fa fa-circle-o',	6,	2),
(6,	'Pelatihan',	'pelatihan',	'index',	'fa fa-align-left',	1,	NULL),
(7,	'Soal',	'pelatihan-soal-jenis',	'index',	'fa fa-adjust',	8,	NULL),
(8,	'Peserta Pelatihan',	'pelatihan-peserta',	'index',	'fa fa-users',	7,	NULL),
(9,	'Posttes',	'posttest',	'index',	'fa fa-arrow-circle-down',	10,	NULL),
(10,	'pretest',	'pretest',	'index',	'fa fa-adn',	2,	NULL);

DROP TABLE IF EXISTS `pelatihan`;
CREATE TABLE `pelatihan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` varchar(32) NOT NULL DEFAULT '',
  `nama` varchar(200) NOT NULL COMMENT 'nama pelatihan',
  `latar_belakang` text NOT NULL,
  `tujuan` text NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `tingkat_id` int(11) NOT NULL COMMENT 'tingkat pelatihan',
  `status_id` int(11) NOT NULL DEFAULT 1,
  `forum_diskusi` varchar(100) NOT NULL DEFAULT '-' COMMENT 'link forum diskusi , ex : link grup whatsapp, telegram, discord',
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

INSERT INTO `pelatihan` (`id`, `unique_id`, `nama`, `latar_belakang`, `tujuan`, `tanggal_mulai`, `tanggal_selesai`, `tingkat_id`, `status_id`, `forum_diskusi`, `kriteria`, `jumlah_target`, `sasaran_wilayah`, `hasil_pelaksanaan_pelatihan`, `dasar_pelaksanaan`, `absensi_kehadiran`, `rekapitulasi_nilai`, `sertifikat`, `materi_pelatihan`, `pelaksana_id`, `created_at`, `created_by`, `modified_at`, `modified_by`, `flag`) VALUES
(37,	'TcOg1ojTJ3EajfzVncviUSp7YyngafEp',	'React',	'-',	'-',	'2020-11-04',	'2020-11-22',	1,	1,	'http://t.me/defrindr',	'-',	1,	'-',	'-',	'-',	'uploads/berkas_pelatihan/absensi_kehadiran_eyxZemx3fZIdxzl-8rbOBZuRiMTTog54.docx',	'uploads/berkas_pelatihan/rekapitulasi_nilai_dMk3_fRn59dMbmE-8VvcXDbejWyCeE6e.docx',	'uploads/berkas_pelatihan/sertifikat_JOHPajMmK3Ny_HJI2AOBaYSUMs0tnCpB.docx',	NULL,	1,	'2020-11-27 10:47:15',	1,	'0000-00-00 00:00:00',	1,	1),
(39,	'anskdjauHHJbdaidwebKKsasndmUU',	'React',	'-',	'-',	'2020-11-25',	'2020-11-25',	1,	3,	'http://1t.me/defrindr',	'-',	0,	'-',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	'2020-11-30 00:07:04',	1,	'0000-00-00 00:00:00',	1,	1),
(40,	'6ULT4RVWk35RNygdBtXNmecH1LTEm32A',	'Bola',	'-',	'-',	'2020-11-25',	'2020-12-01',	1,	3,	'http://t.me/defrindr',	'-',	1000,	'-',	'-',	'-',	'uploads/berkas_pelatihan/absensi_kehadiran_Gt7qoKpOa1m1-ZWz7D_ZSRin3Aac36NH.json',	'uploads/berkas_pelatihan/rekapitulasi_nilai_lPPI-cK0S7-LqLlRyPdEaY3dk8lk5w47.json',	'uploads/berkas_pelatihan/sertifikat_4lW9CqD-DpANTY-ri0PRgWEBC8mKVvrv.json',	NULL,	2,	'2020-11-30 09:16:51',	1,	'2020-11-25 06:17:08',	1,	1),
(41,	'3qBUyxImSr5HQB31L1ip4RPndeMPNxRi',	'Piano',	'=',	'=',	'2020-11-25',	'2020-11-28',	1,	1,	'http://1t.me/defrindr',	'-',	4,	'-',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	2,	'2020-11-29 11:57:31',	2,	'2020-11-28 02:10:35',	1,	1),
(42,	'EUlW4dZvp0CXkYUUtCoQiTC-myts5aGF',	'Badminton',	'-',	'Membudayakan olahraga pada masyarakat',	'2020-11-29',	'2020-12-05',	1,	5,	'http://t.me/defrindr',	'-',	100,	'-',	'Sangat Memuaskan',	'test',	'uploads/berkas_pelatihan/absensi_kehadiran_ozAv6fJc0QgGEwi11rGZfB8DIJPR_cJ6.docx',	'uploads/berkas_pelatihan/rekapitulasi_nilai_nIrVW0ZRqvTNvBTnlce_NFY_oPiyu8JN.docx',	'uploads/berkas_pelatihan/sertifikat_nx_DY2jHe-06yrutv0Rkdsqh-UsIyRrA.docx',	NULL,	2,	'2020-11-30 09:29:21',	2,	'2020-11-30 09:22:32',	2,	1),
(43,	'dGcqfwmf7OmKaoDtxz-lt83AwT6mG-76',	'Tari Mandala',	'-',	'-',	'2020-11-29',	'2020-12-03',	1,	5,	'http://t.me/defrindr',	'-',	2,	'-',	'-',	'-',	'uploads/berkas_pelatihan/absensi_kehadiran_7dpziDg5jYjp8-rPcj5dicq4BVAtCDDq.docx',	'uploads/berkas_pelatihan/rekapitulasi_nilai_P81qqlCz56AuJwO7YxNRulOGCs0WMAYl.docx',	'uploads/berkas_pelatihan/sertifikat_Z7UW379-WsFo3XkzgQZhWQEnPEdTfIZ3.docx',	NULL,	2,	'2020-11-30 09:46:21',	2,	'2020-11-30 09:37:57',	2,	1);

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
(7,	37,	'Proposal Kegiatan 2',	'8L6Aoz4GPMw2FGMEh0TZUgciaS9TMBpw.docx'),
(9,	37,	'Lampiran Proposal Kegiatan 1',	'Mq01QOgFAvp_XyhJLiJT1lqmoHh7DE4_.docx'),
(10,	39,	'Proposal Kegiatan',	'a0LqB4pWRjb0CZMLnqI-6cceVtRPjKyu.png'),
(11,	40,	'Proposal Kegiatan',	'jG5sc8q4plATU52p1GMdWoZ8P4haIiQP.docx'),
(12,	41,	'Proposal Kegiatan',	'DJ5quog-mBfiAcVji2Vs1jothWjty8YB.sql'),
(13,	42,	'Lampiran Daftar Peserta',	'Q94MSJMfEM1bFbkuk_izh9f9wmINEQrG.json'),
(14,	43,	'Proposal Kegiatan',	'BMp7ETd8MC4-8LP92ZaCOW7qud8oMF5C.docx');

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
(24,	3,	37,	'1912',	'Defri Indra Mahardika',	'defrindr@gmail.com',	'085604845437',	'2002-05-19',	'Ponorogo',	1,	9,	3,	11,	11,	'Ponorogo',	1,	0,	0,	0,	0,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0),
(27,	4,	40,	'2020',	'Endah Kustianingsih',	'endahk@gmail.com',	'085604845437',	'2002-05-19',	'ponorgo',	1,	9,	1,	11,	1,	'Ponorogo',	1,	1,	0,	0,	0,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0),
(28,	3,	40,	'1912',	'Defri Indra Mahardika',	'defrindr@gmail.com',	'085604845437',	'2002-05-19',	'Ponorogo',	1,	9,	3,	11,	11,	'Ponorogo',	1,	1,	0,	0,	0,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0),
(29,	3,	42,	'1912',	'Defri Indra Mahardika',	'defrindr@gmail.com',	'085604845437',	'2002-05-19',	'Ponorogo',	1,	9,	3,	11,	11,	'Ponorogo',	1,	1,	0,	0,	100,	'',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0),
(30,	4,	42,	'2020',	'Endah Kustianingsih',	'endahk@gmail.com',	'085604845437',	'2002-05-19',	'ponorgo',	1,	9,	1,	11,	1,	'Ponorogo',	1,	0,	0,	0,	0,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0),
(31,	3,	43,	'1912',	'Defri Indra Mahardika',	'defrindr@gmail.com',	'085604845437',	'2002-05-19',	'Ponorogo',	1,	9,	3,	11,	11,	'Ponorogo',	1,	1,	0,	0,	10,	'-',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0),
(32,	5,	43,	'1111',	'Muh Hasan',	'endahk@gmail.com',	'085604845437',	'11/16/2020',	'ponorgo',	1,	4,	1,	11,	1,	'Ponorogo',	1,	0,	0,	0,	0,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0);

DROP TABLE IF EXISTS `pelatihan_soal`;
CREATE TABLE `pelatihan_soal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` varchar(50) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `kategori_soal_id` int(11) NOT NULL,
  `nomor` int(11) NOT NULL DEFAULT 1,
  `soal` text NOT NULL,
  `pilihan` text DEFAULT NULL,
  `jawaban` text DEFAULT NULL COMMENT 'jawaban dari sistem',
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jenis_id` (`jenis_id`),
  KEY `kategori_soal_id` (`kategori_soal_id`),
  CONSTRAINT `pelatihan_soal_ibfk_2` FOREIGN KEY (`kategori_soal_id`) REFERENCES `master_kategori_soal` (`id`),
  CONSTRAINT `pelatihan_soal_ibfk_3` FOREIGN KEY (`jenis_id`) REFERENCES `pelatihan_soal_jenis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pelatihan_soal` (`id`, `unique_id`, `jenis_id`, `kategori_soal_id`, `nomor`, `soal`, `pilihan`, `jawaban`, `order`) VALUES
(54,	'BGJXUuDVQkqe5GX7PP1Ebi369NPgyhyASLHoXyUE976aLezbuN',	29,	1,	1,	'coba',	NULL,	'4',	1),
(55,	'FmEOj-HA8HBnDu71QfdM4bvpbU9THJidf2xP6tUKOz_l9HaUY0',	30,	1,	1,	'Siapa Aku',	NULL,	'Manusia',	1),
(56,	'EgxfksZ8GLiTLYeExdQlnBan8Qf6_ZNuDKaNJ7dpa1WVwCXfMH',	30,	4,	1,	'yang bukan perlengkapan dapur adalah',	NULL,	'kuas|seruling',	2),
(57,	'QbsE_uQrz9JXXaYHHhUN6krLxmd_EiD2nSnLiZy9er6KseKXME',	30,	3,	1,	'Warna Kesukaanku adalah',	NULL,	'biru',	3),
(58,	'WNVQCgjxwCZbIwWG7oXCQlxqmK1navHjBaDzWAjBqCQBtI7sMo',	28,	3,	1,	'test',	NULL,	'',	1),
(61,	'1ODAN60bgHSKLnRpriXVV-CiNNK-qIuNKOTnNlcrBTptBlyu1q',	31,	1,	1,	'Siapa Saya ?',	NULL,	'manusia',	1),
(62,	'l21Z_q-rErQ_97XlkWZim62-AkQ538PgFzsMD0lEc4YCbjjir4',	31,	3,	1,	'bahasa inggris biru adalah',	NULL,	'biru',	2),
(63,	'spJmscIybSH5_E5N7qLri_zrYPXkJjwihFh__IJnigg0ElqyW9',	32,	1,	1,	'Red adalah',	NULL,	'Merah',	1),
(64,	'okfCYKXGfMZUbNst8H7RRSBjbLiBkQFwdKbnLJCQnXNNJUqcZe',	32,	3,	1,	'Siapa aku ?',	NULL,	'',	2),
(65,	'CN_n1Ect-GT-5LIeb7rjm8SaPCsGSE4VB4tUGs8VYF5dwRApf7',	32,	4,	1,	'yang bukan alat makan adalah',	NULL,	'garpu|sendok',	3);

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
(28,	1,	40,	60,	1),
(29,	1,	41,	10,	1),
(30,	2,	40,	1,	3),
(31,	1,	42,	10,	2),
(32,	1,	43,	5,	3);

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
(13,	29,	31,	0,	'2020-11-30 16:27:30',	'2020-11-30 16:37:30'),
(14,	31,	32,	0,	'2020-11-30 16:43:01',	'2020-11-30 16:48:01');

DROP TABLE IF EXISTS `pelatihan_soal_peserta_jawaban`;
CREATE TABLE `pelatihan_soal_peserta_jawaban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `peserta_id` int(11) NOT NULL,
  `soal_id` int(11) NOT NULL,
  `jawaban` text NOT NULL COMMENT 'jawaban peserta',
  PRIMARY KEY (`id`),
  KEY `peserta_id` (`peserta_id`),
  KEY `soal_id` (`soal_id`),
  CONSTRAINT `pelatihan_soal_peserta_jawaban_ibfk_2` FOREIGN KEY (`soal_id`) REFERENCES `pelatihan_soal` (`id`),
  CONSTRAINT `pelatihan_soal_peserta_jawaban_ibfk_4` FOREIGN KEY (`peserta_id`) REFERENCES `pelatihan_soal_peserta` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pelatihan_soal_peserta_jawaban` (`id`, `peserta_id`, `soal_id`, `jawaban`) VALUES
(7,	13,	61,	'manusia'),
(8,	13,	62,	'blue'),
(9,	14,	63,	'Merah'),
(10,	14,	64,	'cicak'),
(11,	14,	65,	'garpu|sendok');

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
(114,	54,	'1',	1),
(115,	54,	'2',	1),
(116,	54,	'4',	1),
(117,	55,	'Manusia',	1),
(118,	55,	'Robot',	1),
(119,	55,	'Obat Nyamuk',	1),
(120,	56,	'kuas',	1),
(121,	56,	'seruling',	1),
(122,	56,	'garpu',	1),
(123,	56,	'wajan',	1),
(124,	57,	'',	1),
(125,	58,	'',	1),
(130,	61,	'manusia',	1),
(131,	61,	'hewan',	1),
(132,	61,	'setan',	1),
(133,	62,	'',	1),
(134,	63,	'Merah',	1),
(135,	63,	'Biru',	1),
(136,	63,	'Kuning',	1),
(137,	64,	'',	1),
(138,	65,	'sapu',	1),
(139,	65,	'garpu',	1),
(140,	65,	'buku tulis',	1),
(141,	65,	'sendok',	1);

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
(1027,	3,	12),
(1028,	3,	14),
(1029,	3,	15),
(1030,	3,	16),
(1031,	3,	70),
(1032,	3,	36),
(1033,	3,	37),
(1034,	3,	66),
(1035,	3,	68),
(1260,	1,	12),
(1261,	1,	13),
(1262,	1,	14),
(1263,	1,	15),
(1264,	1,	17),
(1265,	1,	18),
(1266,	1,	19),
(1267,	1,	20),
(1268,	1,	21),
(1269,	1,	22),
(1270,	1,	23),
(1271,	1,	24),
(1272,	1,	25),
(1273,	1,	26),
(1274,	1,	27),
(1275,	1,	28),
(1276,	1,	29),
(1277,	1,	30),
(1278,	1,	31),
(1279,	1,	32),
(1280,	1,	33),
(1281,	1,	55),
(1282,	1,	56),
(1283,	1,	57),
(1284,	1,	58),
(1285,	1,	59),
(1286,	1,	60),
(1287,	1,	61),
(1288,	1,	65),
(1289,	1,	64),
(1290,	1,	71),
(1291,	1,	36),
(1292,	1,	37),
(1293,	1,	38),
(1294,	1,	39),
(1295,	1,	40),
(1296,	1,	46),
(1297,	1,	47),
(1298,	1,	48),
(1299,	1,	49),
(1300,	1,	42),
(1301,	1,	43),
(1302,	1,	44),
(1303,	1,	45),
(1304,	1,	51),
(1305,	1,	52),
(1306,	1,	53),
(1307,	1,	54),
(1308,	1,	76),
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
(1352,	2,	76);

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
(217,	3,	1),
(218,	3,	6),
(249,	1,	1),
(250,	1,	2),
(251,	1,	3),
(252,	1,	4),
(253,	1,	5),
(254,	1,	6),
(255,	2,	1),
(256,	2,	2),
(257,	2,	3),
(258,	2,	4),
(259,	2,	5),
(260,	2,	6);

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
(1,	'admin',	'21232f297a57a5a743894a0e4a801fc3',	'Dinas Pusat',	1,	'ID6jM8Az7Yh_R6LR44Ezh02VECKTQ_Ya.png',	'2020-11-30 16:45:44',	'2020-11-30 17:19:13'),
(2,	'dinas_pendidikan',	'f0b171542f1bebedf72dbd45edc4755f',	'Dinas Pendidikan',	2,	'default.png',	'2020-11-30 16:35:30',	'2020-11-30 16:32:52'),
(3,	'1912',	'7d075590d614e32721b829d13641273c',	'Defri Indra Mahardika',	3,	NULL,	'2020-11-30 16:43:19',	'2020-11-30 16:45:36'),
(4,	'2020',	'017e94164d8a30d3de2c4ba810859265',	'Endah Kustianingsih',	3,	NULL,	NULL,	NULL),
(5,	'1111',	'3cb88176365c7d717f3c37cba8eeba73',	'Muh Hasan',	3,	NULL,	'2020-11-30 17:19:42',	'2020-11-30 16:43:14');

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

-- 2020-11-30 10:24:10
