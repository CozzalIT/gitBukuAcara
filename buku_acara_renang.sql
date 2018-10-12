-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Okt 2018 pada 13.49
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
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classification_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `athletes`
--

INSERT INTO `athletes` (`id`, `name`, `birth_date`, `gender`, `address`, `classification_id`, `created_at`, `updated_at`) VALUES
(1, 'Ridwan Imanudin', '2018-10-04', 'L', 'Kabupaten Bandung', 1, '2018-10-12 03:46:00', '2018-10-12 03:46:00'),
(2, 'Shaleh Solihun', '2018-10-04', 'L', 'Kabupaten Bandung', 1, '2018-10-12 03:46:17', '2018-10-12 03:46:17'),
(3, 'Ahmad Barbosa', '2018-10-18', 'L', 'Kabupaten Bandung', 1, '2018-10-12 03:46:32', '2018-10-12 03:46:32'),
(4, 'Kian Santang', '2018-10-20', 'L', 'Kabupaten Bandung', 1, '2018-10-12 03:46:47', '2018-10-12 03:46:47'),
(5, 'Slenderman', '2018-10-05', 'L', 'Kabupaten Bandung', 1, '2018-10-12 03:47:00', '2018-10-12 03:47:00'),
(6, 'Warewolf', '2018-10-05', 'L', 'Kabupaten Bandung', 1, '2018-10-12 03:47:13', '2018-10-12 03:47:13'),
(7, 'Benben Kurnia', '2018-10-18', 'L', 'Kabupaten Bandung', 1, '2018-10-12 03:47:29', '2018-10-12 03:47:29'),
(8, 'Zamaludin XYZ', '2018-10-24', 'L', 'Kabupaten Bandung', 1, '2018-10-12 03:47:45', '2018-10-12 03:47:45'),
(9, 'Udin Boromius', '2017-09-11', 'L', 'Kabupaten Bandung', 1, '2018-10-12 03:48:01', '2018-10-12 03:48:01'),
(10, 'Ismail Kuncoro', '2017-09-11', 'L', 'Kabupaten Bandung', 1, '2018-10-12 03:48:15', '2018-10-12 03:48:15'),
(11, 'Dadang Pelo', '2017-09-11', 'L', 'Kabupaten Bandung', 1, '2018-10-12 03:48:26', '2018-10-12 03:48:26');

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
(1, 1, '2018-10-12 03:46:00', '2018-10-12 03:46:00'),
(2, 1, '2018-10-12 03:46:18', '2018-10-12 03:46:18'),
(3, 1, '2018-10-12 03:46:32', '2018-10-12 03:46:32'),
(4, 1, '2018-10-12 03:46:47', '2018-10-12 03:46:47'),
(5, 1, '2018-10-12 03:47:00', '2018-10-12 03:47:00'),
(6, 1, '2018-10-12 03:47:13', '2018-10-12 03:47:13'),
(7, 1, '2018-10-12 03:47:29', '2018-10-12 03:47:29'),
(8, 1, '2018-10-12 03:47:45', '2018-10-12 03:47:45'),
(9, 1, '2018-10-12 03:48:01', '2018-10-12 03:48:01'),
(10, 1, '2018-10-12 03:48:15', '2018-10-12 03:48:15'),
(11, 1, '2018-10-12 03:48:26', '2018-10-12 03:48:26');

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
(1, 'S1', 1, '2018-10-12 03:45:47', '2018-10-12 03:45:47'),
(2, 'S2', 2, '2018-10-12 03:45:47', '2018-10-12 03:45:47'),
(3, 'S3', 3, '2018-10-12 03:45:47', '2018-10-12 03:45:47'),
(4, 'S4', 4, '2018-10-12 03:45:47', '2018-10-12 03:45:47'),
(5, 'S5', 5, '2018-10-12 03:45:47', '2018-10-12 03:45:47'),
(6, 'S6', 6, '2018-10-12 03:45:47', '2018-10-12 03:45:47'),
(7, 'S7', 7, '2018-10-12 03:45:47', '2018-10-12 03:45:47'),
(8, 'S8', 8, '2018-10-12 03:45:47', '2018-10-12 03:45:47'),
(9, 'S9', 9, '2018-10-12 03:45:47', '2018-10-12 03:45:47'),
(10, 'S10', 10, '2018-10-12 03:45:47', '2018-10-12 03:45:47'),
(11, 'S11', 11, '2018-10-12 03:45:47', '2018-10-12 03:45:47'),
(12, 'S12', 12, '2018-10-12 03:45:47', '2018-10-12 03:45:47'),
(13, 'S13', 13, '2018-10-12 03:45:47', '2018-10-12 03:45:47'),
(14, 'S14', 14, '2018-10-12 03:45:47', '2018-10-12 03:45:47'),
(15, 'S15', 15, '2018-10-12 03:45:47', '2018-10-12 03:45:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classification_id` int(10) UNSIGNED NOT NULL,
  `race_number_id` int(10) UNSIGNED NOT NULL,
  `is_relay` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `events`
--

INSERT INTO `events` (`id`, `name`, `gender`, `classification_id`, `race_number_id`, `is_relay`, `created_at`, `updated_at`) VALUES
(1, '1002', 'L', 1, 1, 0, '2018-10-12 03:48:40', '2018-10-12 03:48:40');

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
(1, 1, 'PEPARNAS', '2018-10-12 03:49:10', '2018-10-12 03:49:10'),
(1, 2, 'PEPARDA', '2018-10-12 03:49:35', '2018-10-12 03:49:35');

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
(100, '2014_10_12_000000_create_users_table', 1),
(101, '2014_10_12_100000_create_password_resets_table', 1),
(102, '2018_10_08_122802_create_participants_table', 1),
(103, '2018_10_08_122830_create_athlete_table', 1),
(104, '2018_10_08_122900_create_athlete_race_number', 1),
(105, '2018_10_08_122925_create_events_table', 1),
(106, '2018_10_08_122950_create_classifications_table', 1),
(107, '2018_10_08_123008_create_race_numbers_table', 1),
(108, '2018_10_08_123032_create_event_records_table', 1),
(109, '2018_10_08_123052_create_records_table', 1),
(110, '2018_10_08_125805_create_relationship', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `participants`
--

CREATE TABLE `participants` (
  `event_id` int(10) UNSIGNED NOT NULL,
  `athlete_id` int(10) UNSIGNED NOT NULL,
  `turn` int(11) NOT NULL,
  `track` int(11) NOT NULL,
  `team` int(11) DEFAULT NULL,
  `pra_event_time` int(11) DEFAULT NULL,
  `result_time` int(11) DEFAULT NULL,
  `is_dq` tinyint(1) NOT NULL,
  `is_dn` tinyint(1) NOT NULL,
  `medal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `participants`
--

INSERT INTO `participants` (`event_id`, `athlete_id`, `turn`, `track`, `team`, `pra_event_time`, `result_time`, `is_dq`, `is_dn`, `medal`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 3, NULL, NULL, 520221, 0, 0, NULL, '2018-10-12 04:21:33', '2018-10-12 04:27:07'),
(1, 3, 1, 4, NULL, NULL, 435236, 0, 0, NULL, '2018-10-12 04:21:33', '2018-10-12 04:27:07'),
(1, 4, 1, 5, NULL, NULL, NULL, 0, 1, NULL, '2018-10-12 04:21:34', '2018-10-12 04:27:07'),
(1, 8, 1, 6, NULL, NULL, 400221, 0, 0, NULL, '2018-10-12 04:21:34', '2018-10-12 04:27:07'),
(1, 1, 2, 2, NULL, NULL, 520226, 0, 0, 'Emas', '2018-10-12 04:25:45', '2018-10-12 04:27:07'),
(1, 2, 2, 3, NULL, NULL, 520221, 0, 1, NULL, '2018-10-12 04:25:45', '2018-10-12 04:27:07'),
(1, 4, 2, 4, NULL, NULL, 435236, 1, 0, NULL, '2018-10-12 04:25:46', '2018-10-12 04:27:07'),
(1, 5, 3, 5, NULL, NULL, NULL, 0, 0, NULL, '2018-10-12 04:27:43', '2018-10-12 04:27:43'),
(1, 2, 3, 6, NULL, NULL, NULL, 0, 0, NULL, '2018-10-12 04:27:43', '2018-10-12 04:27:43');

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
(1, '50M GAYA BEBAS', 0, '2018-10-12 03:45:46', '2018-10-12 03:45:46'),
(2, '100M GAYA BEBAS', 0, '2018-10-12 03:45:46', '2018-10-12 03:45:46'),
(3, '200M GAYA BEBAS', 0, '2018-10-12 03:45:46', '2018-10-12 03:45:46'),
(4, '400M GAYA BEBAS', 0, '2018-10-12 03:45:46', '2018-10-12 03:45:46'),
(5, '800M GAYA BEBAS', 0, '2018-10-12 03:45:46', '2018-10-12 03:45:46'),
(6, '1500M GAYA BEBAS', 0, '2018-10-12 03:45:46', '2018-10-12 03:45:46'),
(7, '50M GAYA PUNGGUNG', 0, '2018-10-12 03:45:46', '2018-10-12 03:45:46'),
(8, '100M GAYA PUNGGUNG', 0, '2018-10-12 03:45:46', '2018-10-12 03:45:46'),
(9, '200M GAYA PUNGGUNG', 0, '2018-10-12 03:45:46', '2018-10-12 03:45:46'),
(10, '50M GAYA DADA', 0, '2018-10-12 03:45:46', '2018-10-12 03:45:46'),
(11, '100M GAYA DADA', 0, '2018-10-12 03:45:46', '2018-10-12 03:45:46'),
(12, '200M GAYA DADA', 0, '2018-10-12 03:45:46', '2018-10-12 03:45:46'),
(13, '50M GAYA KUPU-KUPU', 0, '2018-10-12 03:45:46', '2018-10-12 03:45:46'),
(14, '100M GAYA KUPU-KUPU', 0, '2018-10-12 03:45:46', '2018-10-12 03:45:46'),
(15, '200M GAYA KUPU-KUPU', 0, '2018-10-12 03:45:46', '2018-10-12 03:45:46'),
(16, '100M GAYA GANTI PERORANGAN', 0, '2018-10-12 03:45:46', '2018-10-12 03:45:46'),
(17, '200M GAYA GANTI PERORANGAN', 0, '2018-10-12 03:45:46', '2018-10-12 03:45:46'),
(18, '400M GAYA GANTI PERORANGAN', 0, '2018-10-12 03:45:46', '2018-10-12 03:45:46'),
(19, '4x100M GAYA GANTI ESTAFET', 1, '2018-10-12 03:45:47', '2018-10-12 03:45:47'),
(20, '4x100M GAYA BEBAS ESTAFET', 1, '2018-10-12 03:45:47', '2018-10-12 03:45:47'),
(21, '4x200M GAYA BEBAS ESTAFET', 1, '2018-10-12 03:45:47', '2018-10-12 03:45:47');

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
(1, 'PEPARNAS', 520099, 'Bandung', '2017-09-10', 1, 1, 'Farhan', 'L', 'Bandung', '2018-10-12 03:49:10', '2018-10-12 03:49:10'),
(2, 'PEPARDA', 520002, 'Surabaya', '2017-09-11', 1, 1, 'Hanif Genset', 'L', 'Surabaya', '2018-10-12 03:49:35', '2018-10-12 03:49:35');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `athletes`
--
ALTER TABLE `athletes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `athletes_classification_id_foreign` (`classification_id`);

--
-- Indeks untuk tabel `athlete_race_numbers`
--
ALTER TABLE `athlete_race_numbers`
  ADD KEY `athlete_race_numbers_athlete_id_foreign` (`athlete_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `classifications`
--
ALTER TABLE `classifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT untuk tabel `race_numbers`
--
ALTER TABLE `race_numbers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `records`
--
ALTER TABLE `records`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `athletes`
--
ALTER TABLE `athletes`
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
