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
(64,	'pelatihan',	'update-kehadiran',	'Update Kehadiran');

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
(1,	'Home',	'site',	'index',	'fa fa-home',	3,	NULL),
(2,	'Master',	'',	'index',	'fa fa-database',	2,	NULL),
(3,	'Menu',	'menu',	'index',	'fa fa-circle-o',	5,	2),
(4,	'Role',	'role',	'index',	'fa fa-circle-o',	6,	2),
(5,	'User',	'user',	'index',	'fa fa-circle-o',	7,	2),
(6,	'Pelatihan',	'pelatihan',	'index',	'fa fa-align-left',	1,	NULL),
(7,	'Soal',	'pelatihan-soal-jenis',	'index',	'fa fa-adjust',	2,	NULL),
(8,	'Peserta Pelatihan',	'pelatihan-peserta',	'index',	'fa fa-users',	1,	NULL);

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
(37,	'TcOg1ojTJ3EajfzVncviUSp7YyngafEp',	'React',	'-',	'-',	'2020-11-04',	'2020-11-22',	1,	3,	'http://t.me/defrindr',	'-',	1,	'-',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	'2020-11-26 14:09:59',	1,	'0000-00-00 00:00:00',	1,	1),
(39,	'',	'React',	'-',	'-',	'2020-11-25',	'2020-11-25',	1,	2,	'http://1t.me/defrindr',	'',	0,	'',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	'2020-11-25 06:53:31',	1,	'0000-00-00 00:00:00',	1,	1),
(40,	'6ULT4RVWk35RNygdBtXNmecH1LTEm32A',	'Bola',	'-',	'-',	'2020-11-25',	'2020-11-03',	1,	1,	'http://t.me/defrindr',	'-',	1000,	'-',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	2,	'2020-11-26 05:46:25',	1,	'2020-11-25 06:17:08',	1,	1);

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
(11,	40,	'Proposal Kegiatan',	'jG5sc8q4plATU52p1GMdWoZ8P4haIiQP.docx');

DROP TABLE IF EXISTS `pelatihan_peserta`;
CREATE TABLE `pelatihan_peserta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `password` varchar(200) NOT NULL,
  `kehadiran` int(11) NOT NULL DEFAULT 0 COMMENT 'konfirmasi peserta jika 1 maka ikut, jika 0 maka mengundurkan diri atau tidak mengkonfirmasi kesiapan mengikutipelatihan',
  `nilai_pretest` int(11) DEFAULT NULL COMMENT 'nilai max 100',
  `nilai_posttest` int(11) DEFAULT NULL COMMENT 'nilai max 100',
  `nilai_praktek` int(11) DEFAULT NULL COMMENT 'nilai max 100, diinput pemateri',
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
  CONSTRAINT `pelatihan_peserta_ibfk_10` FOREIGN KEY (`desa_id`) REFERENCES `wilayah_desa` (`id`),
  CONSTRAINT `pelatihan_peserta_ibfk_11` FOREIGN KEY (`jenis_kelamin_id`) REFERENCES `master_jenis_kelamin` (`id`),
  CONSTRAINT `pelatihan_peserta_ibfk_7` FOREIGN KEY (`pelatihan_id`) REFERENCES `pelatihan` (`id`),
  CONSTRAINT `pelatihan_peserta_ibfk_8` FOREIGN KEY (`pendidikan_id`) REFERENCES `master_pendidikan` (`id`),
  CONSTRAINT `pelatihan_peserta_ibfk_9` FOREIGN KEY (`pekerjaan_id`) REFERENCES `master_pekerjaan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pelatihan_peserta` (`id`, `pelatihan_id`, `nik`, `nama`, `email`, `no_telp`, `tanggal_lahir`, `tempat_lahir`, `jenis_kelamin_id`, `pendidikan_id`, `pekerjaan_id`, `rt`, `rw`, `alamat`, `desa_id`, `password`, `kehadiran`, `nilai_pretest`, `nilai_posttest`, `nilai_praktek`, `komentar`, `kesibukan_pasca_pelatihan`, `nama_usaha`, `jenis_usaha`, `lokasi`, `jenis_izin_usaha`, `nib`, `masa_berlaku`, `lanjut`) VALUES
(17,	40,	'2020',	'Ronaldo Wati',	'defrindr@gmail.com',	'-',	'11/03/2020',	'Ponorogo',	1,	4,	6,	12,	12,	'Ponorogo',	1,	'11/03/2020',	0,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0),
(18,	37,	'1912',	'Defri Indra Mahardika',	'defrindr@gmail.com',	'085604845437',	'10/29/2020',	'ponorgo',	1,	4,	17,	11,	1,	'Ponorogo',	1,	'10/29/2020',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0),
(19,	37,	'2020',	'Ronaldo Wati',	'defrindr@gmail.com',	'-',	'11/03/2020',	'Ponorogo',	1,	4,	6,	12,	12,	'Ponorogo',	1,	'11/03/2020',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0);

DROP TABLE IF EXISTS `pelatihan_soal`;
CREATE TABLE `pelatihan_soal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_id` int(11) NOT NULL,
  `kategori_soal_id` int(11) NOT NULL,
  `nomor` int(11) NOT NULL DEFAULT 1,
  `soal` text NOT NULL,
  `pilihan` text DEFAULT NULL,
  `jawaban` text DEFAULT NULL COMMENT 'jawaban dari sistem',
  PRIMARY KEY (`id`),
  KEY `jenis_id` (`jenis_id`),
  KEY `kategori_soal_id` (`kategori_soal_id`),
  CONSTRAINT `pelatihan_soal_ibfk_2` FOREIGN KEY (`kategori_soal_id`) REFERENCES `master_kategori_soal` (`id`),
  CONSTRAINT `pelatihan_soal_ibfk_3` FOREIGN KEY (`jenis_id`) REFERENCES `pelatihan_soal_jenis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pelatihan_soal` (`id`, `jenis_id`, `kategori_soal_id`, `nomor`, `soal`, `pilihan`, `jawaban`) VALUES
(18,	27,	1,	1,	'12',	NULL,	'4'),
(23,	8,	1,	1,	'2+2 = ?',	NULL,	'4');

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
(8,	1,	37,	60,	1),
(27,	1,	37,	3,	1);

DROP TABLE IF EXISTS `pelatihan_soal_peserta`;
CREATE TABLE `pelatihan_soal_peserta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `peserta_id` int(11) NOT NULL,
  `jenis_soal` int(11) NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `peserta_id` (`peserta_id`),
  KEY `jenis_soal` (`jenis_soal`),
  CONSTRAINT `pelatihan_soal_peserta_ibfk_1` FOREIGN KEY (`peserta_id`) REFERENCES `pelatihan_peserta` (`id`),
  CONSTRAINT `pelatihan_soal_peserta_ibfk_2` FOREIGN KEY (`jenis_soal`) REFERENCES `pelatihan_soal_jenis` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `pelatihan_soal_peserta_jawaban`;
CREATE TABLE `pelatihan_soal_peserta_jawaban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `peserta_id` int(11) NOT NULL,
  `soal_id` int(11) NOT NULL,
  `jabawan` text NOT NULL COMMENT 'jawaban peserta',
  PRIMARY KEY (`id`),
  KEY `peserta_id` (`peserta_id`),
  KEY `soal_id` (`soal_id`),
  CONSTRAINT `pelatihan_soal_peserta_jawaban_ibfk_1` FOREIGN KEY (`peserta_id`) REFERENCES `pelatihan_peserta` (`id`),
  CONSTRAINT `pelatihan_soal_peserta_jawaban_ibfk_2` FOREIGN KEY (`soal_id`) REFERENCES `pelatihan_soal` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


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
(20,	18,	'',	1),
(29,	23,	'',	1),
(30,	23,	'',	1);

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
(2,	'Administrator'),
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
(666,	1,	12),
(667,	1,	13),
(668,	1,	14),
(669,	1,	15),
(670,	1,	17),
(671,	1,	18),
(672,	1,	19),
(673,	1,	20),
(674,	1,	21),
(675,	1,	22),
(676,	1,	23),
(677,	1,	24),
(678,	1,	25),
(679,	1,	26),
(680,	1,	27),
(681,	1,	28),
(682,	1,	29),
(683,	1,	30),
(684,	1,	31),
(685,	1,	32),
(686,	1,	33),
(687,	1,	55),
(688,	1,	56),
(689,	1,	57),
(690,	1,	58),
(691,	1,	59),
(692,	1,	60),
(693,	1,	61),
(694,	1,	64),
(695,	1,	36),
(696,	1,	37),
(697,	1,	38),
(698,	1,	39),
(699,	1,	40),
(700,	1,	46),
(701,	1,	47),
(702,	1,	48),
(703,	1,	49),
(704,	1,	42),
(705,	1,	43),
(706,	1,	44),
(707,	1,	45),
(708,	1,	51),
(709,	1,	52),
(710,	1,	53),
(711,	1,	54);

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
(169,	1,	1),
(170,	1,	2),
(171,	1,	3),
(172,	1,	4),
(173,	1,	5),
(174,	1,	6);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `photo_url` varchar(255) DEFAULT NULL,
  `peserta_pelatihan_id` int(11) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_logout` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `role_id` (`role_id`),
  KEY `peserta_pelatihan_id` (`peserta_pelatihan_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user` (`id`, `username`, `password`, `name`, `role_id`, `photo_url`, `peserta_pelatihan_id`, `last_login`, `last_logout`) VALUES
(1,	'admin',	'21232f297a57a5a743894a0e4a801fc3',	'Dinas Pusat',	1,	'ID6jM8Az7Yh_R6LR44Ezh02VECKTQ_Ya.png',	NULL,	'2020-11-26 15:35:06',	'2020-11-26 15:34:58'),
(2,	'dinas_pendidikan',	'f0b171542f1bebedf72dbd45edc4755f',	'Dinas Pendidikan',	2,	'default.png',	NULL,	NULL,	NULL);

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

-- 2020-11-26 14:19:18
