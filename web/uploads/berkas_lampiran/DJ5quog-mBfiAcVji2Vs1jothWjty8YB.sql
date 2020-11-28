-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 27 Nov 2020 pada 16.52
-- Versi server: 10.3.26-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `updatein_smartcity`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agamas`
--

CREATE TABLE `agamas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `agamas`
--

INSERT INTO `agamas` (`id`, `agama`, `created_at`, `updated_at`) VALUES
(1, 'islam', '2020-10-24 02:55:45', '2020-10-24 02:55:45'),
(2, 'kristen', '2020-10-24 02:55:46', '2020-10-24 02:55:46'),
(3, 'Katolik', '2020-10-24 02:55:46', '2020-10-24 02:55:46'),
(4, 'Hindu', '2020-10-24 02:55:46', '2020-10-24 02:55:46'),
(5, 'Buddha', '2020-10-24 02:55:48', '2020-10-24 02:55:48'),
(6, 'Kong Hu Chu', '2020-10-24 02:55:49', '2020-10-24 02:55:49'),
(7, 'Belum Terdata', '2020-10-24 02:55:51', '2020-10-24 02:55:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blood_types`
--

CREATE TABLE `blood_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blood_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `blood_types`
--

INSERT INTO `blood_types` (`id`, `blood_type`, `created_at`, `updated_at`) VALUES
(1, 'A', '2020-10-24 02:55:27', '2020-10-24 02:55:27'),
(2, 'AB', '2020-10-24 02:55:28', '2020-10-24 02:55:28'),
(3, 'B', '2020-10-24 02:55:28', '2020-10-24 02:55:28'),
(4, 'O', '2020-10-24 02:55:29', '2020-10-24 02:55:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cctvs`
--

CREATE TABLE `cctvs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` decimal(20,16) NOT NULL,
  `longitude` decimal(20,16) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cctvs`
--

INSERT INTO `cctvs` (`id`, `location_name`, `ip_address`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'Jokteng Wetan', 'https://5c08174a3f404.streamlock.net/live/ATCS_joktengwetan.stream/playlist.m3u8', -7.8147946032883720, 110.3684772201486600, '2020-10-24 02:55:24', '2020-11-01 07:57:47'),
(2, 'Nol KM Yogyakarta', 'https://5c08174a3f404.streamlock.net/live/ATCS_kmnol.stream/playlist.m3u8', -7.7980625869250270, 110.3652563481717600, '2020-10-24 02:55:26', '2020-11-08 00:05:12'),
(3, 'Alun alun kidul', 'https://mam.jogjaprov.go.id:1937/cctv-public/ViewAlunAlunKidul.stream/playlist.m3u8', -7.8119738711836210, 110.3633245661452100, '2020-10-24 02:55:27', '2020-11-08 00:04:05'),
(4, 'Simpang Tugu', 'https://mam.jogjaprov.go.id:1937/cctv-public/ViewSimpangTugu.stream/playlist.m3u8', -7.7830333626331250, 110.3670738651945800, '2020-11-01 08:40:31', '2020-11-01 08:40:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_incoming_funds`
--

CREATE TABLE `detail_incoming_funds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `incoming_fund_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_incoming_funds`
--

INSERT INTO `detail_incoming_funds` (`id`, `incoming_fund_id`, `title`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hasil Kios Milik Desa', '4500000', '2020-10-24 02:56:30', '2020-10-24 02:56:30'),
(2, 2, 'Test 1', '100000', '2020-11-19 02:12:15', '2020-11-19 02:12:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_outgoing_funds`
--

CREATE TABLE `detail_outgoing_funds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `outgoing_fund_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_outgoing_funds`
--

INSERT INTO `detail_outgoing_funds` (`id`, `outgoing_fund_id`, `title`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 'Penyediaan Penghasilan Tetap dan Tunjangan Kepala Desa', '4500000', '2020-10-24 02:56:32', '2020-10-24 02:56:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `district_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `districts`
--

INSERT INTO `districts` (`id`, `province_id`, `district_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ponorogo', '2020-10-24 02:55:24', '2020-10-24 02:55:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `families`
--

CREATE TABLE `families` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `house_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `families`
--

INSERT INTO `families` (`id`, `house_id`, `kk`, `member`, `created_at`, `updated_at`) VALUES
(1, NULL, '0101010101', 0, '2020-10-24 02:55:51', '2020-10-24 02:55:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `family_houses`
--

CREATE TABLE `family_houses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `family_id` bigint(20) UNSIGNED NOT NULL,
  `house_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` decimal(20,16) NOT NULL,
  `longitude` decimal(20,16) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `family_statuses`
--

CREATE TABLE `family_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `family_statuses`
--

INSERT INTO `family_statuses` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kepala Keluarga', '2020-10-24 02:55:31', '2020-10-24 02:55:31'),
(2, 'Istri', '2020-10-24 02:55:31', '2020-10-24 02:55:31'),
(3, 'Anak Kandung', '2020-10-24 02:55:31', '2020-10-24 02:55:31'),
(4, 'Anak Angkat', '2020-10-24 02:55:32', '2020-10-24 02:55:32'),
(5, 'Cucu', '2020-10-24 02:55:33', '2020-10-24 02:55:33'),
(6, 'Saudara', '2020-10-24 02:55:35', '2020-10-24 02:55:35'),
(7, 'Family lain', '2020-10-24 02:55:35', '2020-10-24 02:55:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fund_reports`
--

CREATE TABLE `fund_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `month` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `fund_reports`
--

INSERT INTO `fund_reports` (`id`, `month`, `year`, `created_at`, `updated_at`) VALUES
(1, 10, 2020, '2020-10-24 02:56:23', '2020-10-24 02:56:23'),
(2, 11, 2020, '2020-11-19 02:08:45', '2020-11-19 02:08:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `incoming_funds`
--

CREATE TABLE `incoming_funds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `incoming_fund_category_id` bigint(20) UNSIGNED NOT NULL,
  `fund_report_id` bigint(20) UNSIGNED NOT NULL,
  `total_income` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `information` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `incoming_funds`
--

INSERT INTO `incoming_funds` (`id`, `incoming_fund_category_id`, `fund_report_id`, `total_income`, `information`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '4500000', '-', '2020-10-24 02:56:29', '2020-10-24 02:56:29'),
(2, 1, 2, '100000', NULL, '2020-11-19 02:11:14', '2020-11-19 02:12:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `incoming_fund_categories`
--

CREATE TABLE `incoming_fund_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `incoming_fund_categories`
--

INSERT INTO `incoming_fund_categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Pendapatan Asli Desa', '2020-10-24 02:55:44', '2020-10-24 02:55:44'),
(2, 'Pendapatan Transfer', '2020-10-24 02:55:44', '2020-10-24 02:55:44'),
(3, 'Pendapatan Lainnya', '2020-10-24 02:55:44', '2020-10-24 02:55:44'),
(4, 'Pendapatan Asli Desa', '2020-10-24 02:56:24', '2020-10-24 02:56:24'),
(5, 'Pendapatan Transfer', '2020-10-24 02:56:25', '2020-10-24 02:56:25'),
(6, 'Pendapatan Lainnya', '2020-10-24 02:56:26', '2020-10-24 02:56:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jobs`
--

INSERT INTO `jobs` (`id`, `job_name`, `created_at`, `updated_at`) VALUES
(1, 'Pedagang', '2020-10-24 02:55:36', '2020-10-24 02:55:36'),
(2, 'Pegawai Negeri Sipil (PNS)', '2020-10-24 02:55:37', '2020-10-24 02:55:37'),
(3, 'Guru', '2020-10-24 02:55:38', '2020-10-24 02:55:38'),
(4, 'Polisi', '2020-10-24 02:55:38', '2020-10-24 02:55:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_09_18_090531_create_table_roles', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2020_09_17_012336_create_table_provinces', 1),
(8, '2020_09_17_012518_create_table_districts', 1),
(9, '2020_09_17_013056_create_sub_districts', 1),
(10, '2020_09_17_013057_create_table_villages', 1),
(11, '2020_09_17_013255_create_agama', 1),
(12, '2020_09_17_013256_create_table_families', 1),
(13, '2020_09_17_013620_create_table_family_status', 1),
(14, '2020_09_17_013651_create_table_blood_types', 1),
(15, '2020_09_17_013651_create_table_jobs', 1),
(16, '2020_09_17_013652_create_table_persons', 1),
(17, '2020_09_17_021047_create_table_cctv', 1),
(18, '2020_09_17_022953_create_table_family_house', 1),
(19, '2020_09_17_023324_create_table_report_tags', 1),
(20, '2020_09_17_023325_create_table_society_reports', 1),
(21, '2020_09_17_033758_create_table_society_report_reponds', 1),
(22, '2020_09_17_035458_create_table_fund_reports', 1),
(23, '2020_09_17_035738_create_table_incoming_fund_categories', 1),
(24, '2020_09_17_040542_create_table_outgoing_fund_categories', 1),
(25, '2020_09_17_040634_create_table_outgoing_funds', 1),
(26, '2020_09_17_041022_create_table_incoming_funds', 1),
(27, '2020_09_17_041115_create_table_detail_incoming_funds', 1),
(28, '2020_09_17_042515_create_table_detail_outgoing_funds', 1),
(29, '2020_09_19_042229_create_table_notifications', 1),
(30, '2020_09_19_045520_create_sessions_table', 1),
(31, '2020_10_02_064725_create_user_apps', 1),
(32, '2020_10_05_042234_create_settings', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `content`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Pengambilan Upeti 2020', 'Pengambilan Upeti 2020 dapat dilakukan besok senin , tanggal 27 september 2020', NULL, '2020-10-24 02:55:24', '2020-10-24 02:55:24'),
(2, 'Pengambilan Upeti 2020', 'Pengambilan Upeti 2020 dapat dilakukan besok senin , tanggal 27 september 2020', 1, '2020-10-24 02:55:24', '2020-10-24 02:55:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `outgoing_funds`
--

CREATE TABLE `outgoing_funds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `outgoing_fund_category_id` bigint(20) UNSIGNED NOT NULL,
  `fund_report_id` bigint(20) UNSIGNED NOT NULL,
  `total_out` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `information` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `outgoing_funds`
--

INSERT INTO `outgoing_funds` (`id`, `outgoing_fund_category_id`, `fund_report_id`, `total_out`, `information`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '4500000', '-', '2020-10-24 02:56:30', '2020-10-24 02:56:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `outgoing_fund_categories`
--

CREATE TABLE `outgoing_fund_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `outgoing_fund_categories`
--

INSERT INTO `outgoing_fund_categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Bidang Penyelenggaraan Pemerintah Desa', '2020-10-24 02:55:39', '2020-10-24 02:55:39'),
(2, 'Bidang Pelaksanaan Pembangunan Desa', '2020-10-24 02:55:40', '2020-10-24 02:55:40'),
(3, 'Bidang Pembinaan Kemasyarakatan', '2020-10-24 02:55:42', '2020-10-24 02:55:42'),
(4, 'Bidang Pemberdayaan Masyarakat', '2020-10-24 02:55:43', '2020-10-24 02:55:43'),
(5, 'Bidang Penanggulangan Bencana, Darurat Dan Mendesak Desa', '2020-10-24 02:55:44', '2020-10-24 02:55:44'),
(6, 'Bidang Penyelenggaraan Pemerintah Desa', '2020-10-24 02:56:26', '2020-10-24 02:56:26'),
(7, 'Bidang Pelaksanaan Pembangunan Desa', '2020-10-24 02:56:27', '2020-10-24 02:56:27'),
(8, 'Bidang Pembinaan Kemasyarakatan', '2020-10-24 02:56:27', '2020-10-24 02:56:27'),
(9, 'Bidang Pemberdayaan Masyarakat', '2020-10-24 02:56:28', '2020-10-24 02:56:28'),
(10, 'Bidang Penanggulangan Bencana, Darurat Dan Mendesak Desa', '2020-10-24 02:56:28', '2020-10-24 02:56:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(19, 'App\\Models\\UserApp', 2, 'authToken', 'f58225326f060e90ef91ded13cd9820803862f911566eb7d7ee7c12a62677ae9', '[\"*\"]', '2020-11-20 17:56:41', '2020-11-20 17:55:59', '2020-11-20 17:56:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `persons`
--

CREATE TABLE `persons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `family_id` bigint(20) UNSIGNED NOT NULL,
  `village_id` bigint(20) UNSIGNED NOT NULL,
  `blood_type_id` bigint(20) UNSIGNED NOT NULL,
  `family_status_id` bigint(20) UNSIGNED NOT NULL,
  `agama_id` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rw` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `persons`
--

INSERT INTO `persons` (`id`, `family_id`, `village_id`, `blood_type_id`, `family_status_id`, `agama_id`, `nik`, `full_name`, `date_of_birth`, `place_of_birth`, `address`, `sex`, `rt`, `rw`, `foto`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, '101010101', 'Defri Indra Mahardika', '2020-10-04', 'Ponorogo', 'Jalan hayam Wuruk', 'L', '21', '10', '-', '2020-10-24 02:55:51', '2020-10-24 02:55:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `provinces`
--

INSERT INTO `provinces` (`id`, `province_name`, `created_at`, `updated_at`) VALUES
(1, 'Jawa Timur', '2020-10-24 02:55:22', '2020-10-24 02:55:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `report_tags`
--

CREATE TABLE `report_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `report_tags`
--

INSERT INTO `report_tags` (`id`, `tag`, `tag_icon`, `created_at`, `updated_at`) VALUES
(1, 'INfrastruktur', './assets/report_tag_icon/infrastruktur.png', '2020-10-24 02:55:29', '2020-10-24 02:55:29'),
(2, 'Fasilitas Publik', './assets/report_tag_icon/fasilita_publik.png', '2020-10-24 02:55:29', '2020-10-24 02:55:29'),
(3, 'Pelanggaran Hukum', './assets/report_tag_icon/pelanggaran_hukum.png', '2020-10-24 02:55:29', '2020-10-24 02:55:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2020-10-24 02:55:22', '2020-10-24 02:55:22'),
(2, 'Citizen', '2020-10-24 02:55:22', '2020-10-24 02:55:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4GPQ3F2IsNqmatG7dxFMriX7sWFdNfFvarjwC1XG', NULL, '118.96.165.7', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.67 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWjh2NnpPcXhwdEU3ajJCbThzQmgwS2NISGE3SThYa1k4RGVtZmozMyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0OToiaHR0cHM6Ly9yYXppc2VrLnVwZGF0ZWluLnRlY2gvc21hcnRjaXR5L2Rhc2hib2FyZCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ1OiJodHRwczovL3JhemlzZWsudXBkYXRlaW4udGVjaC9zbWFydGNpdHkvbWFzdWsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1606297030),
('5Z3nQ7NQKeZCbGIXyhN95pnLkNm3QDoubp6s4tHQ', NULL, '118.96.165.7', 'WhatsApp/2.20.199.14 A', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT2hnUUloblRFV3ZqMVFKaG9JM2tNTWZaeXBHaUhvVG1xWXZtM0lxZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHBzOi8vd3d3LnJhemlzZWsudXBkYXRlaW4udGVjaC9zbWFydGNpdHkvbWFzdWsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1606296972),
('7vFLpmFV2VHGcavteOK74Lx4Feg0a52VewkqWm7u', 19, '36.85.61.149', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiTHc5Q1RiN3AxcTcxSE4zZDZ3VGlzbjFPd1R2MWRYbjdrekVJOEUxdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjU6Imh0dHBzOi8vd3d3LnJhemlzZWsudXBkYXRlaW4udGVjaC9zbWFydGNpdHkvcHVibGljLXNlcnZpY2UvY3JlYXRlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTk7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQ5MklYVU5wa2pPMHJPUTVieU1pLlllNG9Lb0VhM1JvOWxsQy8ub2cvYXQyLnVoZVdHL2lnaSI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkOTJJWFVOcGtqTzByT1E1YnlNaS5ZZTRvS29FYTNSbzlsbEMvLm9nL2F0Mi51aGVXRy9pZ2kiO30=', 1606470578),
('9HXsqdWAMNuEItMsP2DSyxh7OO0N8Yjm9I7Y45Zu', NULL, '36.73.76.100', 'okhttp/3.12.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaWt2clZ0bHk4bjZNWHF4aWE2aTZTdldtclpTdHpRaUoxZDQ5M3VpSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vcmF6aXNlay5jb20vc21hcnRjaXR5L2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1606096557),
('ao1JEiyZCHSVJHJYUz9rQWYIEeWmrOo7BUznJxND', NULL, '180.242.110.137', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.67 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVjBablpkenlUMHROR05lWnZzMThXaW5Wb2FxNEhSSVFaN3h0a3c3biI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHBzOi8vcmF6aXNlay51cGRhdGVpbi50ZWNoL3NtYXJ0Y2l0eS9tYXN1ayI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1606457759),
('bgsfBQElLgVozb6oV1P3wOdWzhFGYR0e5nVJv9uY', NULL, '36.73.76.100', 'okhttp/3.12.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVzhLUkhrdEwyQWJQUGhjTkJ3UzhUczlKbmI0enlXVmNicG9IM2JzcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vcmF6aXNlay5jb20vc21hcnRjaXR5L2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1606099438),
('CcKyaLLRj42T9g2EjGLZKhcUa3HGsSQVPF78IQrE', 19, '118.96.165.7', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.67 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiRjAzUHdyWVE1ZXNYbnUxRnpKeGx6SE9SY242b05aRFFOSElib0dMVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHBzOi8vd3d3LnJhemlzZWsudXBkYXRlaW4udGVjaC9zbWFydGNpdHkvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTk7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQ5MklYVU5wa2pPMHJPUTVieU1pLlllNG9Lb0VhM1JvOWxsQy8ub2cvYXQyLnVoZVdHL2lnaSI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkOTJJWFVOcGtqTzByT1E1YnlNaS5ZZTRvS29FYTNSbzlsbEMvLm9nL2F0Mi51aGVXRy9pZ2kiO30=', 1606297020),
('clrZwxDWkAluy1CI39IZGaMswwXKAaaUuxL5pOJg', NULL, '36.72.212.188', 'okhttp/3.12.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibWVNYWVsamlucWZTdWd6bnZSclIyYWY4WXJuTm9sRmtNRmhuZzdmcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vcmF6aXNlay5jb20vc21hcnRjaXR5L2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1605966561),
('d08UVj0N6iQSKqfcmpbb8pmFqpHbjHeLZWAnF9ng', NULL, '36.73.76.100', 'okhttp/3.12.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUXRieGo5bTlzNmZBUW1FZ1BaZHdxalRZRkNtQk1ONkh6emxkU1ZSTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vcmF6aXNlay5jb20vc21hcnRjaXR5L2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1606099778),
('IHo2W4u7p0NTaD5F0lb9GRQHmbHhwr81AWH647lh', 19, '180.246.108.35', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.67 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiWTNiWWhWVVBUSkVtTUF1QzQ1c3NXQnZlWjVWYm9EVFlMblU3WUVqUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHBzOi8vd3d3LnJhemlzZWsudXBkYXRlaW4udGVjaC9zbWFydGNpdHlfMi9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxOTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJDkySVhVTnBrak8wck9RNWJ5TWkuWWU0b0tvRWEzUm85bGxDLy5vZy9hdDIudWhlV0cvaWdpIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCQ5MklYVU5wa2pPMHJPUTVieU1pLlllNG9Lb0VhM1JvOWxsQy8ub2cvYXQyLnVoZVdHL2lnaSI7fQ==', 1606470563),
('itkjyMG0yLiOsXN7QtAeR86rBmRiQzGJraJYu83F', 19, '180.246.108.35', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.67 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiV1BCeXU0b3BiZk1NN2ZTOXFJT2tZQTBONEVFUFo4TklqQW9YMFc4diI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHBzOi8vd3d3LnJhemlzZWsudXBkYXRlaW4udGVjaC9zbWFydGNpdHlfMi9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxOTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJDkySVhVTnBrak8wck9RNWJ5TWkuWWU0b0tvRWEzUm85bGxDLy5vZy9hdDIudWhlV0cvaWdpIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCQ5MklYVU5wa2pPMHJPUTVieU1pLlllNG9Lb0VhM1JvOWxsQy8ub2cvYXQyLnVoZVdHL2lnaSI7fQ==', 1606470666),
('lWXEz556oe5jG7n9dJd0vwcFPxLN8GKs65MyA1js', 19, '36.82.3.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiS0dySWg0WjNGVlA1NzJZQWRFVDlBSHdVTmR1YU9vdFBvbkRYS3VUUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjE6Imh0dHBzOi8vd3d3LnJhemlzZWsudXBkYXRlaW4udGVjaC9zbWFydGNpdHkvcmVwb3J0LXRhZy9jcmVhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxOTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJDkySVhVTnBrak8wck9RNWJ5TWkuWWU0b0tvRWEzUm85bGxDLy5vZy9hdDIudWhlV0cvaWdpIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCQ5MklYVU5wa2pPMHJPUTVieU1pLlllNG9Lb0VhM1JvOWxsQy8ub2cvYXQyLnVoZVdHL2lnaSI7fQ==', 1606306295),
('nnkSVfEcdt0DJvaDQkaEFTvePzhJtgNjTT4hh1pN', NULL, '118.96.165.7', 'WhatsApp/2.20.199.14 A', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOTZwbW1mZ0ppdHh3UmxwNGQ2dm9kSGRDd1dSckRBZXBGRXplTzVQMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vd3d3LnJhemlzZWsudXBkYXRlaW4udGVjaC9zbWFydGNpdHkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1606296974),
('p3hMdGyL1tr1RGgJk8k7E00eS1plYG9sFDqykEJ1', 19, '180.246.108.35', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.67 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiek1EZHpHc1IyZHNKakYxWmE2Tm1VUnhoS2d3V1JTb0ZiNDMyNG5XTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjU6Imh0dHBzOi8vd3d3LnJhemlzZWsudXBkYXRlaW4udGVjaC9zbWFydGNpdHkvcHVibGljLXNlcnZpY2UvY3JlYXRlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTk7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQ5MklYVU5wa2pPMHJPUTVieU1pLlllNG9Lb0VhM1JvOWxsQy8ub2cvYXQyLnVoZVdHL2lnaSI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkOTJJWFVOcGtqTzByT1E1YnlNaS5ZZTRvS29FYTNSbzlsbEMvLm9nL2F0Mi51aGVXRy9pZ2kiO30=', 1606470652),
('TIxmEfmsZPcp2Z9Wrb9LzsYYHSj46WWqRp1NJuFC', 19, '36.72.212.188', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiTXpEMFFRR3d1c3RrZXFVaTRBeGVZdTVCTEJ6MjRIV2JYTDV2dnc1WSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vcmF6aXNlay5jb20vc21hcnRjaXR5L2Z1bmQtcmVwb3J0LzEvZWRpdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE5O3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkOTJJWFVOcGtqTzByT1E1YnlNaS5ZZTRvS29FYTNSbzlsbEMvLm9nL2F0Mi51aGVXRy9pZ2kiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJDkySVhVTnBrak8wck9RNWJ5TWkuWWU0b0tvRWEzUm85bGxDLy5vZy9hdDIudWhlV0cvaWdpIjt9', 1605968996),
('tTWHel8e4Mh2JA0Ld5x4v6stNL3d5rGAERVh7vcv', NULL, '118.96.165.7', 'WhatsApp/2.20.199.14 A', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZkJIbzN4dWx2OTJxREhneFh3bkJsRU9aOUlsZjNRNzRSbXJXNUtpeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHBzOi8vd3d3LnJhemlzZWsudXBkYXRlaW4udGVjaC9zbWFydGNpdHkvbWFzdWsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1606296974),
('uFpZsaPmme2nlpTi9nqUSkLoxYw1FMPpNcT3EmZb', 19, '36.72.212.188', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.67 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoicXN6ZGRJRFAwOExia3ZjYjE3Um1wSnNPQ2sxaHcyUjBWb015WE9zYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vcmF6aXNlay5jb20vc21hcnRjaXR5L2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE5O3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkOTJJWFVOcGtqTzByT1E1YnlNaS5ZZTRvS29FYTNSbzlsbEMvLm9nL2F0Mi51aGVXRy9pZ2kiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJDkySVhVTnBrak8wck9RNWJ5TWkuWWU0b0tvRWEzUm85bGxDLy5vZy9hdDIudWhlV0cvaWdpIjt9', 1605964912),
('uWn4pOnOmISyKMiWXZK5bSnOLcG4R77OGW28meSm', 19, '118.96.165.7', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.67 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoicFdYdUc5Z2ZSWm1WQTZhaUtDUG9ZaGk0WEhBbVVHa3A5bWRyZGExSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTY6Imh0dHBzOi8vd3d3LnJhemlzZWsudXBkYXRlaW4udGVjaC9zbWFydGNpdHkvbm90aWZpY2F0aW9uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTk7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQ5MklYVU5wa2pPMHJPUTVieU1pLlllNG9Lb0VhM1JvOWxsQy8ub2cvYXQyLnVoZVdHL2lnaSI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkOTJJWFVOcGtqTzByT1E1YnlNaS5ZZTRvS29FYTNSbzlsbEMvLm9nL2F0Mi51aGVXRy9pZ2kiO30=', 1606376786),
('yGVmWsNmQMlHf18bHaiMuXGzrG1PEwgn9ElRV811', NULL, '36.72.212.188', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.67 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTG40WmVBM1pDallWTEgyS0RDQ01UMG9FTkd6VUlGVnk3OFJhQ0hPRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vcmF6aXNlay5jb20vc21hcnRjaXR5L21hc3VrIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1605966396),
('YkTmYWGgCYJICS55U8347rQlgZwCaw5fkXq6px1X', NULL, '36.82.3.88', 'Mozilla/5.0 (Linux; Android 10; Redmi 8) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieGRUM2lKa0tFRUpWcEdrMk9EV2ZEaEV0eExXTHdrMmx5c2JxYkZXQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHBzOi8vd3d3LnJhemlzZWsudXBkYXRlaW4udGVjaC9zbWFydGNpdHkvbWFzdWsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1606297008);

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` decimal(20,16) NOT NULL,
  `longitude` decimal(20,16) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `society_reports`
--

CREATE TABLE `society_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `person_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `village_id` bigint(20) UNSIGNED NOT NULL,
  `rt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rw` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('menunggu','diproses','selesai','tidak valid') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `society_report_responds`
--

CREATE TABLE `society_report_responds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `report_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` enum('app','web') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'web',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_districts`
--

CREATE TABLE `sub_districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `sub_district_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sub_districts`
--

INSERT INTO `sub_districts` (`id`, `district_id`, `sub_district_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pulung', '2020-10-24 02:55:24', '2020-10-24 02:55:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Dion Schultz', 'aliyah.kutch@example.org', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'vC44Qtm97g', NULL, NULL, '2020-10-24 02:55:53', '2020-10-24 02:55:53'),
(2, 'Keith Gerhold', 'sanford.keaton@example.net', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'cUlS3WEhhx', NULL, NULL, '2020-10-24 02:55:53', '2020-10-24 02:55:53'),
(3, 'Jarrell Bechtelar PhD', 'jeffry40@example.com', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'lnXBPAGrWd', NULL, NULL, '2020-10-24 02:55:54', '2020-10-24 02:55:54'),
(4, 'Russell Langworth DDS', 'eulalia.fritsch@example.com', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'RfZ560doSL', NULL, NULL, '2020-10-24 02:55:56', '2020-10-24 02:55:56'),
(5, 'Miss Verla Bashirian Jr.', 'schmidt.marianne@example.org', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '69y4fOisLL', NULL, NULL, '2020-10-24 02:55:57', '2020-10-24 02:55:57'),
(6, 'Ms. Zoie McDermott DDS', 'qmoore@example.com', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '5TNz13JoZu', NULL, NULL, '2020-10-24 02:55:57', '2020-10-24 02:55:57'),
(7, 'Jacquelyn Conroy', 'wilmer54@example.net', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '5YmTf4vnBG', NULL, NULL, '2020-10-24 02:55:58', '2020-10-24 02:55:58'),
(8, 'Meggie Krajcik', 'dawson20@example.com', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'W88dLvqnmG', NULL, NULL, '2020-10-24 02:55:59', '2020-10-24 02:55:59'),
(9, 'Irving Kohler', 'oswald.towne@example.org', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '4r6r3wlnXx', NULL, NULL, '2020-10-24 02:56:00', '2020-10-24 02:56:00'),
(10, 'Hanna Upton', 'koelpin.rashawn@example.org', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'uyOvJsuAeO', NULL, NULL, '2020-10-24 02:56:01', '2020-10-24 02:56:01'),
(11, 'Annetta Zboncak', 'dovie65@example.org', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'CCDH3qiRn6', NULL, NULL, '2020-10-24 02:56:01', '2020-10-24 02:56:01'),
(12, 'Victor Vandervort', 'smorar@example.net', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'OMBo5rJbOR', NULL, NULL, '2020-10-24 02:56:02', '2020-10-24 02:56:02'),
(13, 'Christa Mills Jr.', 'giovanni17@example.org', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'edY78CYQLB', NULL, NULL, '2020-10-24 02:56:03', '2020-10-24 02:56:03'),
(14, 'Bridgette Hickle', 'perry.homenick@example.com', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'ZOuIZYE57n', NULL, NULL, '2020-10-24 02:56:03', '2020-10-24 02:56:03'),
(15, 'Jon Hackett', 'craig.mayer@example.org', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'WUi8MGU09V', NULL, NULL, '2020-10-24 02:56:03', '2020-10-24 02:56:03'),
(16, 'Ramona Parker', 'ila.collier@example.org', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '9FbjytARo6', NULL, NULL, '2020-10-24 02:56:04', '2020-10-24 02:56:04'),
(17, 'Jennyfer Kulas PhD', 'kristopher.lakin@example.com', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'KiivGAYO9r', NULL, NULL, '2020-10-24 02:56:05', '2020-10-24 02:56:05'),
(18, 'Marcel Zboncak I', 'spinka.kristy@example.net', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'LFCMasO9YI', NULL, NULL, '2020-10-24 02:56:06', '2020-10-24 02:56:06'),
(19, 'Prof. Dominique Kemmer DDS', 'ryan44@example.com', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'yaehZ8gGXt', NULL, NULL, '2020-10-24 02:56:07', '2020-10-24 02:56:07'),
(20, 'Taryn Hills', 'adrien.schumm@example.com', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'd3JCSRrzsK', NULL, NULL, '2020-10-24 02:56:07', '2020-10-24 02:56:07'),
(21, 'Ms. Celia Shanahan IV', 'zieme.stanford@example.com', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '0ShtG3lIe8', NULL, NULL, '2020-10-24 02:56:07', '2020-10-24 02:56:07'),
(22, 'Haley Bradtke', 'arvilla23@example.net', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '52C5K85brW', NULL, NULL, '2020-10-24 02:56:08', '2020-10-24 02:56:08'),
(23, 'Nora Green', 'cbeatty@example.org', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'gTfq8BI0jp', NULL, NULL, '2020-10-24 02:56:08', '2020-10-24 02:56:08'),
(24, 'Darius Dietrich IV', 'melisa.durgan@example.org', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'Mpay4IgkWB', NULL, NULL, '2020-10-24 02:56:08', '2020-10-24 02:56:08'),
(25, 'Opal Gislason', 'morar.kaitlyn@example.net', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'T12gh2lPU2', NULL, NULL, '2020-10-24 02:56:09', '2020-10-24 02:56:09'),
(26, 'Lera Gleichner', 'frida.hackett@example.net', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '466F30pqan', NULL, NULL, '2020-10-24 02:56:09', '2020-10-24 02:56:09'),
(27, 'Dr. Kayla Harris', 'wadams@example.org', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'g6CaKbgia4', NULL, NULL, '2020-10-24 02:56:10', '2020-10-24 02:56:10'),
(28, 'Lyla Thiel', 'waylon09@example.org', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'ngGFjNDeIs', NULL, NULL, '2020-10-24 02:56:10', '2020-10-24 02:56:10'),
(29, 'Eino Hahn', 'boehm.megane@example.org', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'Ca4msvPeef', NULL, NULL, '2020-10-24 02:56:11', '2020-10-24 02:56:11'),
(30, 'Myah Connelly', 'herman.al@example.com', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'GheBXq9g1K', NULL, NULL, '2020-10-24 02:56:11', '2020-10-24 02:56:11'),
(31, 'Rosie Kutch', 'ryleigh20@example.net', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'OhaGoDX3Q9', NULL, NULL, '2020-10-24 02:56:12', '2020-10-24 02:56:12'),
(32, 'Susie Batz', 'paige90@example.net', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'Zn9X63w8R8', NULL, NULL, '2020-10-24 02:56:12', '2020-10-24 02:56:12'),
(33, 'Johnpaul Kiehn', 'hester61@example.net', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'oit7Qx4R9v', NULL, NULL, '2020-10-24 02:56:12', '2020-10-24 02:56:12'),
(34, 'Anastacio Larson', 'mallory17@example.com', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'bHnzqWrbY4', NULL, NULL, '2020-10-24 02:56:13', '2020-10-24 02:56:13'),
(35, 'Christopher VonRueden', 'krajcik.iliana@example.net', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'PTGJxFmWSn', NULL, NULL, '2020-10-24 02:56:14', '2020-10-24 02:56:14'),
(36, 'Carmela Mills', 'nstrosin@example.com', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '0mQvzMWm1R', NULL, NULL, '2020-10-24 02:56:14', '2020-10-24 02:56:14'),
(37, 'Larue O\'Hara', 'vada.paucek@example.com', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'DjWFThd4jS', NULL, NULL, '2020-10-24 02:56:15', '2020-10-24 02:56:15'),
(38, 'Jettie Champlin', 'dreynolds@example.org', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'M9dzlbQUR1', NULL, NULL, '2020-10-24 02:56:16', '2020-10-24 02:56:16'),
(39, 'Miss Nettie Stanton', 'herman.elna@example.net', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'zl26kGcFco', NULL, NULL, '2020-10-24 02:56:17', '2020-10-24 02:56:17'),
(40, 'Darrick Hayes', 'brando10@example.org', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'FnSd0pJPqC', NULL, NULL, '2020-10-24 02:56:17', '2020-10-24 02:56:17'),
(41, 'Johathan Greenholt', 'gthompson@example.net', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'WPr9FrfGQI', NULL, NULL, '2020-10-24 02:56:17', '2020-10-24 02:56:17'),
(42, 'Dr. Ashlee Gottlieb', 'kareem98@example.org', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'k7DSi3pLTv', NULL, NULL, '2020-10-24 02:56:17', '2020-10-24 02:56:17'),
(43, 'Miss Naomi Lehner', 'flossie73@example.net', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'VUTXydaL1j', NULL, NULL, '2020-10-24 02:56:18', '2020-10-24 02:56:18'),
(44, 'Mr. Sam Keeling II', 'shaina.jacobs@example.org', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'WPMrygwuht', NULL, NULL, '2020-10-24 02:56:19', '2020-10-24 02:56:19'),
(45, 'Van Dach', 'ressie10@example.com', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'Q9r21PfwhC', NULL, NULL, '2020-10-24 02:56:19', '2020-10-24 02:56:19'),
(46, 'Camilla Keeling V', 'cremin.amber@example.net', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '2hY5AvbbN1', NULL, NULL, '2020-10-24 02:56:20', '2020-10-24 02:56:20'),
(47, 'Milan Runte', 'rgibson@example.com', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '8K5QNewQin', NULL, NULL, '2020-10-24 02:56:21', '2020-10-24 02:56:21'),
(48, 'Lurline Miller', 'lucienne.muller@example.org', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '2NoZQPEM83', NULL, NULL, '2020-10-24 02:56:22', '2020-10-24 02:56:22'),
(49, 'Prof. Victoria Pfannerstill', 'kwhite@example.net', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '5djhfR7Mwy', NULL, NULL, '2020-10-24 02:56:22', '2020-10-24 02:56:22'),
(50, 'Clovis Dickinson', 'ilind@example.org', '2020-10-24 02:55:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'Wj7xN50FLV', NULL, NULL, '2020-10-24 02:56:23', '2020-10-24 02:56:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_apps`
--

CREATE TABLE `user_apps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lampiran_ktp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = pending, 1 = konfirmasi, 2 = nonaktif',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified_by` bigint(20) UNSIGNED NOT NULL,
  `verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fcm_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_apps`
--

INSERT INTO `user_apps` (`id`, `nik`, `email`, `name`, `lampiran_ktp`, `status`, `password`, `verified_by`, `verified_at`, `remember_token`, `fcm_token`, `created_at`, `updated_at`) VALUES
(2, '1000000', 'defrindr@gmail.com', 'Defri Indra Mahardika', '-', 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 50, NULL, NULL, 'ehBOqDYoTauaBz-n_DEPsE:APA91bE34OscKMhnQHrIz4TF_NOK06HTGqgcqEUePNG-b0tTeTSA4qzCVTC8cgRvvTcgM1JmqMFUmz5NnvTlXIOyK8RcnabWDb8WrRyQv_vwrO9qLUcnVHfNIr0VE1MBa9j_EVf-4_wH', NULL, '2020-11-20 17:56:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `villages`
--

CREATE TABLE `villages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_district_id` bigint(20) UNSIGNED NOT NULL,
  `village_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `villages`
--

INSERT INTO `villages` (`id`, `sub_district_id`, `village_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pulung', '2020-10-24 02:55:24', '2020-10-24 02:55:24');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `agamas`
--
ALTER TABLE `agamas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `agamas_agama_unique` (`agama`);

--
-- Indeks untuk tabel `blood_types`
--
ALTER TABLE `blood_types`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cctvs`
--
ALTER TABLE `cctvs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cctvs_location_name_unique` (`location_name`);

--
-- Indeks untuk tabel `detail_incoming_funds`
--
ALTER TABLE `detail_incoming_funds`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_outgoing_funds`
--
ALTER TABLE `detail_outgoing_funds`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `districts_district_name_unique` (`district_name`),
  ADD KEY `districts_province_id_foreign` (`province_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `families`
--
ALTER TABLE `families`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `families_kk_unique` (`kk`);

--
-- Indeks untuk tabel `family_houses`
--
ALTER TABLE `family_houses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `family_houses_family_id_foreign` (`family_id`);

--
-- Indeks untuk tabel `family_statuses`
--
ALTER TABLE `family_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `fund_reports`
--
ALTER TABLE `fund_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `incoming_funds`
--
ALTER TABLE `incoming_funds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `incoming_funds_incoming_fund_category_id_foreign` (`incoming_fund_category_id`),
  ADD KEY `incoming_funds_fund_report_id_foreign` (`fund_report_id`);

--
-- Indeks untuk tabel `incoming_fund_categories`
--
ALTER TABLE `incoming_fund_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `outgoing_funds`
--
ALTER TABLE `outgoing_funds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `outgoing_funds_outgoing_fund_category_id_foreign` (`outgoing_fund_category_id`),
  ADD KEY `outgoing_funds_fund_report_id_foreign` (`fund_report_id`);

--
-- Indeks untuk tabel `outgoing_fund_categories`
--
ALTER TABLE `outgoing_fund_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persons_nik_unique` (`nik`),
  ADD KEY `persons_family_id_foreign` (`family_id`),
  ADD KEY `persons_village_id_foreign` (`village_id`),
  ADD KEY `persons_blood_type_id_foreign` (`blood_type_id`),
  ADD KEY `persons_family_status_id_foreign` (`family_status_id`),
  ADD KEY `persons_agama_id_foreign` (`agama_id`);

--
-- Indeks untuk tabel `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `provinces_province_name_unique` (`province_name`);

--
-- Indeks untuk tabel `report_tags`
--
ALTER TABLE `report_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `society_reports`
--
ALTER TABLE `society_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `society_reports_person_id_foreign` (`person_id`),
  ADD KEY `society_reports_tag_id_foreign` (`tag_id`),
  ADD KEY `society_reports_village_id_foreign` (`village_id`);

--
-- Indeks untuk tabel `society_report_responds`
--
ALTER TABLE `society_report_responds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `society_report_responds_report_id_foreign` (`report_id`),
  ADD KEY `society_report_responds_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `sub_districts`
--
ALTER TABLE `sub_districts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_districts_sub_district_name_unique` (`sub_district_name`),
  ADD KEY `sub_districts_district_id_foreign` (`district_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `user_apps`
--
ALTER TABLE `user_apps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_apps_verified_by_foreign` (`verified_by`);

--
-- Indeks untuk tabel `villages`
--
ALTER TABLE `villages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `villages_sub_district_id_foreign` (`sub_district_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `agamas`
--
ALTER TABLE `agamas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `blood_types`
--
ALTER TABLE `blood_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `cctvs`
--
ALTER TABLE `cctvs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `detail_incoming_funds`
--
ALTER TABLE `detail_incoming_funds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `detail_outgoing_funds`
--
ALTER TABLE `detail_outgoing_funds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `families`
--
ALTER TABLE `families`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `family_houses`
--
ALTER TABLE `family_houses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `family_statuses`
--
ALTER TABLE `family_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `fund_reports`
--
ALTER TABLE `fund_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `incoming_funds`
--
ALTER TABLE `incoming_funds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `incoming_fund_categories`
--
ALTER TABLE `incoming_fund_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `outgoing_funds`
--
ALTER TABLE `outgoing_funds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `outgoing_fund_categories`
--
ALTER TABLE `outgoing_fund_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `persons`
--
ALTER TABLE `persons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `report_tags`
--
ALTER TABLE `report_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `society_reports`
--
ALTER TABLE `society_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `society_report_responds`
--
ALTER TABLE `society_report_responds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sub_districts`
--
ALTER TABLE `sub_districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `user_apps`
--
ALTER TABLE `user_apps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `villages`
--
ALTER TABLE `villages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`);

--
-- Ketidakleluasaan untuk tabel `family_houses`
--
ALTER TABLE `family_houses`
  ADD CONSTRAINT `family_houses_family_id_foreign` FOREIGN KEY (`family_id`) REFERENCES `families` (`id`);

--
-- Ketidakleluasaan untuk tabel `incoming_funds`
--
ALTER TABLE `incoming_funds`
  ADD CONSTRAINT `incoming_funds_fund_report_id_foreign` FOREIGN KEY (`fund_report_id`) REFERENCES `fund_reports` (`id`),
  ADD CONSTRAINT `incoming_funds_incoming_fund_category_id_foreign` FOREIGN KEY (`incoming_fund_category_id`) REFERENCES `incoming_fund_categories` (`id`);

--
-- Ketidakleluasaan untuk tabel `outgoing_funds`
--
ALTER TABLE `outgoing_funds`
  ADD CONSTRAINT `outgoing_funds_fund_report_id_foreign` FOREIGN KEY (`fund_report_id`) REFERENCES `fund_reports` (`id`),
  ADD CONSTRAINT `outgoing_funds_outgoing_fund_category_id_foreign` FOREIGN KEY (`outgoing_fund_category_id`) REFERENCES `outgoing_fund_categories` (`id`);

--
-- Ketidakleluasaan untuk tabel `persons`
--
ALTER TABLE `persons`
  ADD CONSTRAINT `persons_agama_id_foreign` FOREIGN KEY (`agama_id`) REFERENCES `agamas` (`id`),
  ADD CONSTRAINT `persons_blood_type_id_foreign` FOREIGN KEY (`blood_type_id`) REFERENCES `blood_types` (`id`),
  ADD CONSTRAINT `persons_family_id_foreign` FOREIGN KEY (`family_id`) REFERENCES `families` (`id`),
  ADD CONSTRAINT `persons_family_status_id_foreign` FOREIGN KEY (`family_status_id`) REFERENCES `family_statuses` (`id`),
  ADD CONSTRAINT `persons_village_id_foreign` FOREIGN KEY (`village_id`) REFERENCES `villages` (`id`);

--
-- Ketidakleluasaan untuk tabel `society_reports`
--
ALTER TABLE `society_reports`
  ADD CONSTRAINT `society_reports_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `persons` (`id`),
  ADD CONSTRAINT `society_reports_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `report_tags` (`id`),
  ADD CONSTRAINT `society_reports_village_id_foreign` FOREIGN KEY (`village_id`) REFERENCES `villages` (`id`);

--
-- Ketidakleluasaan untuk tabel `society_report_responds`
--
ALTER TABLE `society_report_responds`
  ADD CONSTRAINT `society_report_responds_report_id_foreign` FOREIGN KEY (`report_id`) REFERENCES `society_reports` (`id`),
  ADD CONSTRAINT `society_report_responds_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `sub_districts`
--
ALTER TABLE `sub_districts`
  ADD CONSTRAINT `sub_districts_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_apps`
--
ALTER TABLE `user_apps`
  ADD CONSTRAINT `user_apps_verified_by_foreign` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `villages`
--
ALTER TABLE `villages`
  ADD CONSTRAINT `villages_sub_district_id_foreign` FOREIGN KEY (`sub_district_id`) REFERENCES `sub_districts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
