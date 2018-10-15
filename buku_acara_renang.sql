-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Okt 2018 pada 05.06
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buku_acara_renang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `athletes`
--

CREATE TABLE `athletes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `gender` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `classification_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `athletes`
--

INSERT INTO `athletes` (`id`, `name`, `birth_date`, `gender`, `city_id`, `classification_id`, `created_at`, `updated_at`) VALUES
(1, 'Farhan Hanif Alaudin', '2018-10-01', 'L', 8, 1, '2018-10-14 17:16:21', '2018-10-14 17:16:21'),
(2, 'Ridwan Kamil AE', '2018-10-01', 'L', 1, 1, '2018-10-14 17:16:22', '2018-10-14 17:16:22'),
(3, 'Rizal Ahmad Fauzi', '2018-10-01', 'L', 2, 1, '2018-10-14 17:16:22', '2018-10-14 17:16:22'),
(4, 'Muhammad Iqbal Zamaludin', '2018-10-01', 'L', 3, 1, '2018-10-14 17:16:22', '2018-10-14 17:16:22'),
(5, 'Imron Abu Laiz', '2018-10-01', 'L', 4, 1, '2018-10-14 17:16:22', '2018-10-14 17:16:22'),
(6, 'Abu Halim', '2018-10-01', 'L', 5, 1, '2018-10-14 17:16:22', '2018-10-14 17:16:22'),
(7, 'Salaman AlFarizi', '2018-10-01', 'L', 6, 1, '2018-10-14 17:16:22', '2018-10-14 17:16:22'),
(8, 'Ivan Ramdan Hikmatul Falah', '2018-10-01', 'L', 7, 1, '2018-10-14 17:16:22', '2018-10-14 17:16:22'),
(9, 'Robby Firdaus', '2018-10-01', 'L', 8, 1, '2018-10-14 17:16:23', '2018-10-14 17:16:23'),
(10, 'Akmaludin Fahri', '2018-10-01', 'L', 9, 1, '2018-10-14 17:16:23', '2018-10-14 17:16:23'),
(11, 'Iqbal Shalahudin', '2018-10-01', 'L', 10, 1, '2018-10-14 17:16:23', '2018-10-14 17:16:23'),
(12, 'Agung Syandika Pratama', '2018-10-01', 'L', 11, 15, '2018-10-14 17:16:23', '2018-10-14 17:16:23'),
(13, 'Deri Hermawan', '2018-10-01', 'L', 12, 15, '2018-10-14 17:16:23', '2018-10-14 17:16:23'),
(14, 'Heri Susilo', '2018-10-01', 'L', 13, 14, '2018-10-14 17:16:23', '2018-10-14 17:16:23'),
(15, 'Ishaq Rizal', '2018-10-01', 'L', 14, 14, '2018-10-14 17:16:23', '2018-10-14 17:16:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `athlete_race_numbers`
--

CREATE TABLE `athlete_race_numbers` (
  `athlete_id` int(10) UNSIGNED NOT NULL,
  `race_number_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `athlete_race_numbers`
--

INSERT INTO `athlete_race_numbers` (`athlete_id`, `race_number_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(1, 2, NULL, NULL),
(3, 1, NULL, NULL),
(3, 2, NULL, NULL),
(4, 1, NULL, NULL),
(4, 2, NULL, NULL),
(5, 1, NULL, NULL),
(5, 2, NULL, NULL),
(6, 1, NULL, NULL),
(6, 2, NULL, NULL),
(7, 1, NULL, NULL),
(7, 2, NULL, NULL),
(9, 1, NULL, NULL),
(9, 2, NULL, NULL),
(10, 1, NULL, NULL),
(10, 2, NULL, NULL),
(11, 1, NULL, NULL),
(11, 2, NULL, NULL),
(12, 20, NULL, NULL),
(13, 20, NULL, NULL),
(14, 20, NULL, NULL),
(15, 20, NULL, NULL),
(8, 1, NULL, NULL),
(8, 2, NULL, NULL),
(2, 1, NULL, NULL),
(2, 2, NULL, NULL),
(2, 19, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `city`
--

CREATE TABLE `city` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `city`
--

INSERT INTO `city` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Kabupaten Bandung', '2018-10-14 17:16:20', '2018-10-14 17:16:20'),
(2, 'Kabupaten Bandung Barat', '2018-10-14 17:16:21', '2018-10-14 17:16:21'),
(3, 'Kabupaten Bekasi', '2018-10-14 17:16:21', '2018-10-14 17:16:21'),
(4, 'Kabupaten Bogor', '2018-10-14 17:16:21', '2018-10-14 17:16:21'),
(5, 'Kabupaten Ciamis', '2018-10-14 17:16:21', '2018-10-14 17:16:21'),
(6, 'Kabupaten Cianjur', '2018-10-14 17:16:21', '2018-10-14 17:16:21'),
(7, 'Kabupaten Cirebon', '2018-10-14 17:16:21', '2018-10-14 17:16:21'),
(8, 'Kabupaten Garut', '2018-10-14 17:16:21', '2018-10-14 17:16:21'),
(9, 'Kabupaten Indramayu', '2018-10-14 17:16:21', '2018-10-14 17:16:21'),
(10, 'Kabupaten Karawang', '2018-10-14 17:16:21', '2018-10-14 17:16:21'),
(11, 'Kabupaten Kuningan', '2018-10-14 17:16:21', '2018-10-14 17:16:21'),
(12, 'Kabupaten Majalengka', '2018-10-14 17:16:21', '2018-10-14 17:16:21'),
(13, 'Kabupaten Pangandaran', '2018-10-14 17:16:21', '2018-10-14 17:16:21'),
(14, 'Kabupaten Purwakarta', '2018-10-14 17:16:21', '2018-10-14 17:16:21'),
(15, 'Kabupaten Subang', '2018-10-14 17:16:21', '2018-10-14 17:16:21'),
(16, 'Kabupaten Sukabumi', '2018-10-14 17:16:21', '2018-10-14 17:16:21'),
(17, 'Kabupaten Sumedang', '2018-10-14 17:16:21', '2018-10-14 17:16:21'),
(18, 'Kabupaten Tasikmalaya', '2018-10-14 17:16:21', '2018-10-14 17:16:21'),
(19, 'Kota Bandung', '2018-10-14 17:16:21', '2018-10-14 17:16:21'),
(20, 'Kota Banjar', '2018-10-14 17:16:21', '2018-10-14 17:16:21'),
(21, 'Kota Bekasi', '2018-10-14 17:16:21', '2018-10-14 17:16:21'),
(22, 'Kota Bogor', '2018-10-14 17:16:21', '2018-10-14 17:16:21'),
(23, 'Kota Cimahi', '2018-10-14 17:16:21', '2018-10-14 17:16:21'),
(24, 'Kota Cirebon', '2018-10-14 17:16:21', '2018-10-14 17:16:21'),
(25, 'Kota Depok', '2018-10-14 17:16:21', '2018-10-14 17:16:21'),
(26, 'Kota Sukabumi', '2018-10-14 17:16:21', '2018-10-14 17:16:21'),
(27, 'Kota Tasikmalaya', '2018-10-14 17:16:21', '2018-10-14 17:16:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `classifications`
--

CREATE TABLE `classifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `classifications`
--

INSERT INTO `classifications` (`id`, `name`, `point`, `created_at`, `updated_at`) VALUES
(1, 'S1', 1, '2018-10-14 17:16:19', '2018-10-14 17:16:19'),
(2, 'S2', 2, '2018-10-14 17:16:19', '2018-10-14 17:16:19'),
(3, 'S3', 3, '2018-10-14 17:16:20', '2018-10-14 17:16:20'),
(4, 'S4', 4, '2018-10-14 17:16:20', '2018-10-14 17:16:20'),
(5, 'S5', 5, '2018-10-14 17:16:20', '2018-10-14 17:16:20'),
(6, 'S6', 6, '2018-10-14 17:16:20', '2018-10-14 17:16:20'),
(7, 'S7', 7, '2018-10-14 17:16:20', '2018-10-14 17:16:20'),
(8, 'S8', 8, '2018-10-14 17:16:20', '2018-10-14 17:16:20'),
(9, 'S9', 9, '2018-10-14 17:16:20', '2018-10-14 17:16:20'),
(10, 'S10', 10, '2018-10-14 17:16:20', '2018-10-14 17:16:20'),
(11, 'S11', 11, '2018-10-14 17:16:20', '2018-10-14 17:16:20'),
(12, 'S12', 12, '2018-10-14 17:16:20', '2018-10-14 17:16:20'),
(13, 'S13', 13, '2018-10-14 17:16:20', '2018-10-14 17:16:20'),
(14, 'S14', 14, '2018-10-14 17:16:20', '2018-10-14 17:16:20'),
(15, 'S15', 15, '2018-10-14 17:16:20', '2018-10-14 17:16:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classification_id` int(10) UNSIGNED DEFAULT NULL,
  `race_number_id` int(10) UNSIGNED NOT NULL,
  `is_relay` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `events`
--

INSERT INTO `events` (`id`, `name`, `gender`, `classification_id`, `race_number_id`, `is_relay`, `created_at`, `updated_at`) VALUES
(1, '1023', 'L', 1, 1, 0, '2018-10-14 19:28:49', '2018-10-14 19:28:49'),
(2, '5555', 'L', 1, 1, 0, '2018-10-14 19:29:34', '2018-10-14 19:29:34'),
(3, '000000', 'L', NULL, 19, 1, '2018-10-14 19:37:21', '2018-10-14 19:37:21'),
(4, '020020', 'L', NULL, 20, 1, '2018-10-14 19:39:19', '2018-10-14 19:39:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event_records`
--

CREATE TABLE `event_records` (
  `event_id` int(10) UNSIGNED NOT NULL,
  `record_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `event_records`
--

INSERT INTO `event_records` (`event_id`, `record_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 'PEPARNAS', '2018-10-14 19:41:24', '2018-10-14 19:41:24'),
(2, 1, 'PEPARNAS', '2018-10-14 19:41:24', '2018-10-14 19:41:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(291, '2014_10_12_000000_create_users_table', 1),
(292, '2014_10_12_100000_create_password_resets_table', 1),
(293, '2018_10_08_122802_create_participants_table', 1),
(294, '2018_10_08_122830_create_athlete_table', 1),
(295, '2018_10_08_122900_create_athlete_race_number', 1),
(296, '2018_10_08_122925_create_events_table', 1),
(297, '2018_10_08_122950_create_classifications_table', 1),
(298, '2018_10_08_123008_create_race_numbers_table', 1),
(299, '2018_10_08_123032_create_event_records_table', 1),
(300, '2018_10_08_123052_create_records_table', 1),
(301, '2018_10_08_125805_create_relationship', 1),
(302, '2018_10_14_120637_create_table_city', 1),
(303, '2018_10_14_123700_create_city_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `participants`
--

CREATE TABLE `participants` (
  `event_id` int(10) UNSIGNED NOT NULL,
  `athlete_id` int(10) UNSIGNED NOT NULL,
  `turn` int(11) NOT NULL,
  `track` int(11) NOT NULL,
  `final_track` int(11) DEFAULT NULL,
  `team` int(11) DEFAULT NULL,
  `pra_event_time` int(11) DEFAULT NULL,
  `result_time` int(11) DEFAULT NULL,
  `final_result` int(11) DEFAULT NULL,
  `is_dq` tinyint(1) NOT NULL,
  `is_dn` tinyint(1) NOT NULL,
  `medal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `participants`
--

INSERT INTO `participants` (`event_id`, `athlete_id`, `turn`, `track`, `final_track`, `team`, `pra_event_time`, `result_time`, `final_result`, `is_dq`, `is_dn`, `medal`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, NULL, NULL, NULL, 520221, NULL, 0, 0, NULL, '2018-10-14 19:29:18', '2018-10-14 20:06:40'),
(1, 2, 1, 4, NULL, NULL, NULL, 435236, NULL, 0, 0, NULL, '2018-10-14 19:29:18', '2018-10-14 20:06:40'),
(1, 3, 1, 5, 4, NULL, NULL, 322412, 20000, 0, 0, 'Emas', '2018-10-14 19:29:18', '2018-10-14 20:06:40'),
(1, 4, 2, 4, 5, NULL, NULL, 20110, 23000, 0, 0, 'Perak', '2018-10-14 19:29:23', '2018-10-14 20:06:40'),
(1, 6, 2, 5, 6, NULL, NULL, 30000, 45021, 0, 0, 'Perunggu', '2018-10-14 19:29:23', '2018-10-14 20:06:40'),
(2, 8, 1, 3, NULL, NULL, NULL, 520221, NULL, 0, 0, 'Perak', '2018-10-14 19:29:45', '2018-10-14 19:30:07'),
(2, 10, 1, 4, NULL, NULL, NULL, 823565, NULL, 0, 0, 'Perunggu', '2018-10-14 19:29:45', '2018-10-14 19:30:07'),
(2, 11, 1, 5, NULL, NULL, NULL, 322412, NULL, 0, 0, 'Emas', '2018-10-14 19:29:45', '2018-10-14 19:30:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `race_numbers`
--

CREATE TABLE `race_numbers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_relay` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `race_numbers`
--

INSERT INTO `race_numbers` (`id`, `name`, `is_relay`, `created_at`, `updated_at`) VALUES
(1, '50M GAYA BEBAS', 0, '2018-10-14 17:16:17', '2018-10-14 17:16:17'),
(2, '100M GAYA BEBAS', 0, '2018-10-14 17:16:17', '2018-10-14 17:16:17'),
(3, '200M GAYA BEBAS', 0, '2018-10-14 17:16:18', '2018-10-14 17:16:18'),
(4, '400M GAYA BEBAS', 0, '2018-10-14 17:16:18', '2018-10-14 17:16:18'),
(5, '800M GAYA BEBAS', 0, '2018-10-14 17:16:18', '2018-10-14 17:16:18'),
(6, '1500M GAYA BEBAS', 0, '2018-10-14 17:16:18', '2018-10-14 17:16:18'),
(7, '50M GAYA PUNGGUNG', 0, '2018-10-14 17:16:18', '2018-10-14 17:16:18'),
(8, '100M GAYA PUNGGUNG', 0, '2018-10-14 17:16:18', '2018-10-14 17:16:18'),
(9, '200M GAYA PUNGGUNG', 0, '2018-10-14 17:16:18', '2018-10-14 17:16:18'),
(10, '50M GAYA DADA', 0, '2018-10-14 17:16:18', '2018-10-14 17:16:18'),
(11, '100M GAYA DADA', 0, '2018-10-14 17:16:18', '2018-10-14 17:16:18'),
(12, '200M GAYA DADA', 0, '2018-10-14 17:16:19', '2018-10-14 17:16:19'),
(13, '50M GAYA KUPU-KUPU', 0, '2018-10-14 17:16:19', '2018-10-14 17:16:19'),
(14, '100M GAYA KUPU-KUPU', 0, '2018-10-14 17:16:19', '2018-10-14 17:16:19'),
(15, '200M GAYA KUPU-KUPU', 0, '2018-10-14 17:16:19', '2018-10-14 17:16:19'),
(16, '100M GAYA GANTI PERORANGAN', 0, '2018-10-14 17:16:19', '2018-10-14 17:16:19'),
(17, '200M GAYA GANTI PERORANGAN', 0, '2018-10-14 17:16:19', '2018-10-14 17:16:19'),
(18, '400M GAYA GANTI PERORANGAN', 0, '2018-10-14 17:16:19', '2018-10-14 17:16:19'),
(19, '4x100M GAYA GANTI ESTAFET', 1, '2018-10-14 17:16:19', '2018-10-14 17:16:19'),
(20, '4x100M GAYA BEBAS ESTAFET', 1, '2018-10-14 17:16:19', '2018-10-14 17:16:19'),
(21, '4x200M GAYA BEBAS ESTAFET', 1, '2018-10-14 17:16:19', '2018-10-14 17:16:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `records`
--

CREATE TABLE `records` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recorded_at` date NOT NULL,
  `race_number_id` int(10) UNSIGNED NOT NULL,
  `classification_id` int(10) UNSIGNED NOT NULL,
  `athlete_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `athlete_gender` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `athlete_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `records`
--

INSERT INTO `records` (`id`, `type`, `time`, `location`, `recorded_at`, `race_number_id`, `classification_id`, `athlete_name`, `athlete_gender`, `athlete_address`, `created_at`, `updated_at`) VALUES
(1, 'PEPARNAS', 22000, 'Badnus', '2018-10-19', 1, 1, 'Ridwan', 'L', 'Surabaya', '2018-10-14 19:41:24', '2018-10-14 19:41:24');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `athletes`
--
ALTER TABLE `athletes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `athletes_classification_id_foreign` (`classification_id`),
  ADD KEY `athletes_city_id_foreign` (`city_id`);

--
-- Indeks untuk tabel `athlete_race_numbers`
--
ALTER TABLE `athlete_race_numbers`
  ADD KEY `athlete_race_numbers_athlete_id_foreign` (`athlete_id`);

--
-- Indeks untuk tabel `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `classifications`
--
ALTER TABLE `classifications`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_classification_id_foreign` (`classification_id`),
  ADD KEY `events_race_number_id_foreign` (`race_number_id`);

--
-- Indeks untuk tabel `event_records`
--
ALTER TABLE `event_records`
  ADD KEY `event_records_event_id_foreign` (`event_id`),
  ADD KEY `event_records_record_id_foreign` (`record_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `participants`
--
ALTER TABLE `participants`
  ADD KEY `participants_event_id_foreign` (`event_id`),
  ADD KEY `participants_athlete_id_foreign` (`athlete_id`);

--
-- Indeks untuk tabel `race_numbers`
--
ALTER TABLE `race_numbers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `records_race_number_id_foreign` (`race_number_id`),
  ADD KEY `records_classification_id_foreign` (`classification_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `athletes`
--
ALTER TABLE `athletes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `city`
--
ALTER TABLE `city`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `classifications`
--
ALTER TABLE `classifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304;

--
-- AUTO_INCREMENT untuk tabel `race_numbers`
--
ALTER TABLE `race_numbers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `records`
--
ALTER TABLE `records`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `athletes`
--
ALTER TABLE `athletes`
  ADD CONSTRAINT `athletes_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `athletes_classification_id_foreign` FOREIGN KEY (`classification_id`) REFERENCES `classifications` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `athlete_race_numbers`
--
ALTER TABLE `athlete_race_numbers`
  ADD CONSTRAINT `athlete_race_numbers_athlete_id_foreign` FOREIGN KEY (`athlete_id`) REFERENCES `athletes` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_classification_id_foreign` FOREIGN KEY (`classification_id`) REFERENCES `classifications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `events_race_number_id_foreign` FOREIGN KEY (`race_number_id`) REFERENCES `race_numbers` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `event_records`
--
ALTER TABLE `event_records`
  ADD CONSTRAINT `event_records_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_records_record_id_foreign` FOREIGN KEY (`record_id`) REFERENCES `records` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `participants_athlete_id_foreign` FOREIGN KEY (`athlete_id`) REFERENCES `athletes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `participants_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `records_classification_id_foreign` FOREIGN KEY (`classification_id`) REFERENCES `classifications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `records_race_number_id_foreign` FOREIGN KEY (`race_number_id`) REFERENCES `race_numbers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
