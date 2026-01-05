-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 05, 2026 at 04:54 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uas_animerch`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `merchandise`
--

CREATE TABLE `merchandise` (
  `id` bigint UNSIGNED NOT NULL,
  `id_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_terkait` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stok` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `merchandise`
--

INSERT INTO `merchandise` (`id`, `id_barang`, `gambar`, `nama_barang`, `event_terkait`, `deskripsi`, `kategori`, `harga`, `stok`, `created_at`, `updated_at`) VALUES
(25, 'KYOU181251', '499002-with-bonus-nendoroid-qinche-sylus-love-and-deepspace.jpg', '[With Bonus] Nendoroid Qinche / Sylus - Love and Deepspace', 'Indonesia Comic Con', 'Love and Deepspace', 'Nendoroid', 920000.00, 951, '2025-05-07 11:34:17', '2025-12-15 02:44:54'),
(26, 'KYOU123055', '199987-nendoroid-oguri-cap-uma-musume-pretty-derby-774807093.jpg', 'Nendoroid Oguri Cap - Uma Musume: Pretty Derby (Re-Release)', 'Ennichisai', 'Uma Musume', 'Nendoroid', 720000.00, 992, '2023-10-12 09:01:42', '2025-12-19 02:50:20'),
(27, 'KYOU205764', '501682-nendoroid-tsunayoshi-sawada-black-suit-ver-katekyou-hitman-reborn-918444315.jpg', 'Nendoroid Tsunayoshi Sawada - Black Suit Ver. Katekyou Hitman REBORN!', 'Gelar Jepang UI', 'Tsunayoshi Sawada', 'Nendoroid', 740000.00, 991, '2025-12-20 10:07:39', '2025-12-23 07:58:37'),
(28, 'KYOU193523', '502960-nendoroid-reze-chainsaw-man-the-movie-reze-arc.jpg', 'Nendoroid Reze / Bomb Devil - Chainsaw Man The Movie: Reze Arc', 'Indonesia Anime Con', 'Chainsaw Man', 'Nendoroid', 920000.00, 46, '2025-09-26 03:17:24', '2025-12-24 04:54:07'),
(29, 'KYOU130241', '215658-nendoroid-gojo-satoru-high-school-ver-jujutsu-kaisen.jpg', 'Nendoroid Gojo Satoru - High School Ver. Jujutsu Kaisen', 'Comic Frontier', 'Jujutsu Kaisen', 'Nendoroid', 850000.00, 72, '2024-01-22 12:34:05', '2026-01-04 18:07:27'),
(30, 'KYOU185563', '476844-exclusive-sale-nendoroid-hoshimi-miyabi-zenless-zone-zero-551420456.jpg', '[Exclusive Sale] Nendoroid Hoshimi Miyabi - Zenless Zone Zero', 'Impactnation', 'Zenless Zone Zero', 'Nendoroid', 840000.00, 100, '2025-07-11 03:46:22', '2025-11-06 03:00:21'),
(31, 'KYOU105996', '121876-shueisha-young-jump-comics-manga-watashi-ga-koibito-ni-nareru-wake-nai-jan-muri-muri-2-mikami-teren.jpg', 'Shueisha Young Jump Comics Manga Watashi ga Koibito ni Nareru Wake nai jan, Muri Muri!  2 - Mikami Teren', 'Indonesia Comic Con', 'Watashi ga Koibito ni Nareru Wake Nai jan, Muri Muri!', 'Japanese Manga', 160000.00, 1, '2022-04-26 09:29:45', '2026-01-04 17:33:57'),
(32, 'KYOU77341', '76444-manga-hq-anthology-haikyuu-plus-kareshi-room-share.jpg', '[REVIVE] Manga HQ Anthology Haikyuu!! Plus Kareshi - Room Share', 'Ennichisai', 'Haikyu!!', 'Doujinshi', 240000.00, 5, '2021-02-16 15:09:45', '2025-12-11 02:06:02'),
(33, 'KYOU76718', '75822-shueisha-jump-comics-manga-jojos-bizarre-adventure-part-7-steel-ball-run-1-hirohiko-araki.jpg', 'Shueisha Jump Comics Manga JoJo\'s Bizarre Adventure Part 7 STEEL BALL RUN 1 - Hirohiko Araki', 'Gelar Jepang UI', 'Jojo\'s Bizarre Adventure', 'Japanese Manga', 180000.00, 1, '2021-02-11 08:33:49', '2026-01-04 17:05:14'),
(34, 'KYOU189975', '443020-shueisha-young-jump-comics-manga-uma-musume-cinderella-gray-20-kuzumi-taiyou.jpg', '[REVIVE] Shueisha Young Jump Comics Manga Uma Musume Cinderella Gray 20 - Kuzumi Taiyou', 'Indonesia Anime Con', 'Uma Musume', 'Japanese Manga', 160000.00, 1, '2025-09-08 06:15:02', '2025-12-12 02:23:23'),
(35, 'KYOU117724', '167848-takeshobo-bamboo-comics-manga-imaizumin-chi-wa-douyara-gal-no-tamariba-ni-natteru-rashii-deep-1-nori5rou.jpg', '[REVIVE] Takeshobo Bamboo Comics Manga Imaizumin-chi wa Douyara Gal no Tamariba ni Natteru Rashii -DEEP- 1 - Nori5rou', 'Comic Frontier', 'Imaizumin-chi wa Douyara Gal no Tamariba ni Natteru Rashii', 'Japanese Manga', 140000.00, 0, '2022-12-29 07:33:28', '2026-01-04 19:40:05'),
(36, 'KYOU85375', '84714-overlap-gardo-comics-manga-ansatsusha-de-aru-ore-no-status-ga-yuusha-yori-mo-tsuyoi-no-da-ga-3-akai-matsuri.jpg', 'Overlap Gardo Comics Manga Ansatsusha de Aru Ore no Status ga Yuusha yori mo Tsuyoi no da ga 3 - Akai Matsuri', 'Impactnation', 'Ansatsusha de Aru Ore no Status ga Yuusha yori mo Akiraka ni Tsuyoi no da ga', 'Japanese Manga', 160000.00, 1, '2021-04-29 14:11:52', '2026-01-04 17:15:30'),
(37, 'KYOU203693', '494405-mono-goods-free-bonus-baca-deskripsi-bofurin-shishitoren-lenticular-photocard-wind-breaker.jpg', '[Mono Goods] [FREE BONUS! Baca Deskripsi] Bofurin & Shishitoren Lenticular Photocard - Wind Breaker', 'Indonesia Comic Con', 'Wind Breaker', 'WIND BREAKER by Mono Goods', 99999.00, 9988, '2025-12-02 09:20:35', '2025-12-21 15:30:08'),
(38, 'KYOU203694', '494404-mono-goods-free-bonus-baca-deskripsi-laser-ticket-wind-breaker.jpg', '[Mono Goods] [FREE BONUS! Baca Deskripsi] Laser Ticket - Wind Breaker', 'Ennichisai', 'Wind Breaker', 'WIND BREAKER by Mono Goods', 99999.00, 9995, '2025-12-02 09:20:35', '2025-12-04 03:40:22'),
(39, 'KYOU203692', '494403-mono-goods-free-bonus-baca-deskripsi-hand-fan-a5-sticker-set-wind-breaker.jpg', '[Mono Goods] [FREE BONUS! Baca Deskripsi] Hand Fan & A5 Sticker Set - Wind Breaker', 'Gelar Jepang UI', 'Wind Breaker', 'WIND BREAKER by Mono Goods', 99999.00, 10000, '2025-12-02 09:20:35', '2025-12-04 03:40:21'),
(41, 'KYOU200680', '490716-mono-goods-protect-me-umbrella-wind-breaker-734273544.jpg', '[Mono Goods] Protect Me Umbrella - Wind Breaker', 'Comic Frontier', 'Wind Breaker', 'WIND BREAKER by Mono Goods', 250000.00, 127, '2025-11-06 02:22:34', '2025-12-29 07:03:15'),
(42, 'KYOU200676', '490745-mono-goods-go-harvest-tumbler-umemiya-hajime-wind-breaker-216349506.jpg', '[Mono Goods] GO!! Harvest Tumbler - Umemiya Hajime - Wind Breaker', 'Impactnation', 'Wind Breaker', 'WIND BREAKER by Mono Goods', 300000.00, 278, '2025-11-06 02:22:33', '2026-01-04 14:00:08'),
(43, 'KYOU200677', '490739-mono-goods-go-lite-mug-bofurin-class-uniform-wind-breaker-11cm-451980966.jpg', '[Mono Goods] GO!! Lite Mug Bofurin Class Uniform - Wind Breaker (11cm)', 'Indonesia Comic Con', 'Wind Breaker', 'WIND BREAKER by Mono Goods', 220000.00, 147, '2025-11-06 02:22:33', '2025-12-03 05:53:02'),
(44, 'KYOU200678', '490733-mono-goods-go-lite-mug-bofurin-class-scenery-wind-breaker-11cm-751404651.jpg', '[Mono Goods] GO!! Lite Mug Bofurin Class Scenery - Wind Breaker (11cm)', 'Ennichisai', 'Wind Breaker', 'WIND BREAKER by Mono Goods', 220000.00, 140, '2025-11-06 02:22:34', '2025-12-29 07:03:28'),
(45, 'KYOU200679', '490723-mono-goods-go-wind-breaker-totebag-with-acrylic-keychain-wind-breaker-1833235092.jpg', '[Mono Goods] Go!! Wind Breaker Totebag with Acrylic Keychain - WIND BREAKER', 'Gelar Jepang UI', 'Wind Breaker', 'WIND BREAKER by Mono Goods', 200000.00, 5, '2025-11-06 02:22:34', '2026-01-04 19:38:33'),
(46, 'KYOU178271', '387744-trio-try-it-figure-orfevre-uma-musume-pretty-derby-22cm-733417006.jpg', 'Trio-Try-iT Figure Orfevre - Uma Musume: Pretty Derby (22cm)', 'Comic Con 2025', 'Uma Musume', 'Prize Figure', 480000.00, 12, '2026-01-04 19:44:35', '2026-01-04 19:44:35'),
(47, 'KYOU160110', '1767588745_319470-nendoroid-tamamo-cross-uma-musume-397856880.jpg', 'Nendoroid Tamamo Cross - Uma Musume: Pretty Derby', 'Impactnation', 'Painted plastic non-scale articulated figure with stand included. Approximately 100mm in height.\r\n\r\n\"I won\'t lose to poverty \'cause I\'m Naniwa\'s White Lightning!\"\r\n\r\nFrom \"Umamusume: Pretty Derby\" comes a Nendoroid of Tamamo Cross, the petite but fiery Umamusume with a Kansai accent!\r\n\r\nFace plates:\r\n· Smiling face\r\n· Grinning face\r\n· Rebutting face\r\n\r\nOptional parts:\r\n· Racetrack fence\r\n· Lightning effect\r\n· Other optional parts for different poses.', 'Nendoroid', 720000.00, 20, '2026-01-04 21:52:25', '2026-01-04 21:52:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_01_04_163936_create_merchandise_table', 1),
(5, '2026_01_05_000914_add_description_and_category_to_merchandise_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('kpoSArH5eu0NJyYEmPs6ooshPpJPqZJCeRLcAZlY', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiY2pDRzR3T0tzSDFIcGg4SER0bUprTGhPSTZKWldKbkR5azZSeWt5diI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tZXJjaGFuZGlzZS9leHBvcnQtcGRmIjtzOjU6InJvdXRlIjtzOjIyOiJtZXJjaGFuZGlzZS5leHBvcnQtcGRmIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1767588802),
('rQdmCDo5MM1C1aTPZH2cnuVtgPacNCGVlskII3Np', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSVNxSHNncEJhY0VlRGpkdFcydEExWW05MUNWZGFZQzJ0TzlndG5lTiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hYm91dCI7czo1OiJyb3V0ZSI7czo1OiJhYm91dCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1767588309);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@animerch.com', NULL, '$2y$12$qEKJBJy6vPWkFf/k9fSq0engSido3Bo6sEQ2qb7FlXFp/6wUIR9l2', NULL, '2026-01-04 10:04:25', '2026-01-04 10:04:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchandise`
--
ALTER TABLE `merchandise`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `merchandise_id_barang_unique` (`id_barang`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `merchandise`
--
ALTER TABLE `merchandise`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
