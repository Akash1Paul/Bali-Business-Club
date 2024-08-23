-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2024 at 11:42 AM
-- Server version: 8.0.26
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `balibusinessclub`
--

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint UNSIGNED NOT NULL,
  `event_id` int NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `promo_code` text COLLATE utf8mb4_unicode_ci,
  `discount` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `event_id`, `name`, `promo_code`, `discount`, `created_at`, `updated_at`) VALUES
(1, 0, 'Fjhikwdf', 'UGGFRYUGN', '20', '2024-04-06 00:43:33', '2024-04-06 00:56:54'),
(3, 0, 'Dexter Moses', 'Non dolores quo dolo', 'Deserunt cupidatat n', '2024-04-06 02:55:49', '2024-04-06 02:55:49');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `form` time DEFAULT NULL,
  `to` time DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `city` text COLLATE utf8mb4_unicode_ci,
  `about` text COLLATE utf8mb4_unicode_ci,
  `price` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `date`, `name`, `image`, `form`, `to`, `address`, `city`, `about`, `price`, `created_at`, `updated_at`) VALUES
(1, '2007-04-25', 'fubf euf', 'http://127.0.0.1:8000/image/1712902636.jpg', '21:31:00', '21:59:00', 'Nihil eum suscipit s', 'Eligendi harum et as', 'Dolor porro itaque s', NULL, '2024-04-05 02:25:55', '2024-04-12 00:47:16'),
(3, '1984-03-25', 'Barclay Black', NULL, '15:09:00', '02:17:00', 'Ut et eligendi occae', 'Rerum provident qui', 'Earum velit soluta', '1300', '2024-04-06 02:56:02', '2024-05-10 01:14:58');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, '2024_04_05_060437_create_events_table', 3),
(14, '2024_04_04_054735_create_userdetails_table', 5),
(15, '2024_04_06_060851_create_discounts_table', 6),
(18, '2024_04_05_072258_create_services_table', 7),
(19, '2024_04_16_122522_add_event_id_to_discounts_table', 8),
(20, '2024_05_16_052001_create_transaction_table', 8),
(21, '2024_05_16_055139_add_user_id_to_transaction_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('aka@gmail.com', '$2y$10$0NCrBS7KKvOUfGon68sGkOh5dcF5znIP/RpTCnlInWGaiIWwM9x2q', '2024-05-03 05:45:38'),
('akacrj@gmail.com', '$2y$10$Hx9E5WB9MIuPAHBXc1O93.cgUmoO13MLM6clJ2TYlsyDN16WmOWv6', '2024-05-03 05:46:13'),
('tarun@gmail.com', '$2y$10$qbx47CgtVTPrYZQ3g0wCae4c/ONzejvHBE04.L8n1CgwQWROC3Zkm', '2024-05-03 05:43:52');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 2, 'MyAuthApp', 'f9789b7e3e0a916a3d38ef26f9fe53d82ecc1c1f86c74b7cfb39697152845f64', '[\"*\"]', NULL, NULL, '2024-04-05 04:25:28', '2024-04-05 04:25:28'),
(2, 'App\\Models\\User', 2, 'MyAuthApp', 'd26d57307a3b39d23f18662ed12a7174a70491140fe650596a4ff6f70a5cdb7b', '[\"*\"]', '2024-05-16 00:28:47', NULL, '2024-04-05 04:51:29', '2024-05-16 00:28:47'),
(3, 'App\\Models\\User', 3, 'MyAuthApp', '58cbf76665f878c6c9e36528ffd197f9bd8f437a7c47599912d07206b558b6e8', '[\"*\"]', NULL, NULL, '2024-04-06 03:00:20', '2024-04-06 03:00:20'),
(5, 'App\\Models\\User', 2, 'MyAuthApp', '49ebed67bc458b3d545ed6604ffd09011a4f99655f7cdbc6a23b0f28dd8f23f5', '[\"*\"]', NULL, NULL, '2024-04-08 23:54:04', '2024-04-08 23:54:04'),
(6, 'App\\Models\\User', 4, 'MyAuthApp', '467ffe13c1011cb177615c67a6e0251be55e8d828e851b9e82f0c5314436f974', '[\"*\"]', NULL, NULL, '2024-04-17 00:10:38', '2024-04-17 00:10:38'),
(7, 'App\\Models\\User', 8, 'MyAuthApp', '6b14a40d1d2733f8e86e2a8619f65d01151ecdf9e56a43134e87094e9856a6ec', '[\"*\"]', NULL, NULL, '2024-04-22 23:46:36', '2024-04-22 23:46:36'),
(8, 'App\\Models\\User', 9, 'MyAuthApp', '74540fb0647412caf91fc2d2e33c4b9bba17e63808afce58eb00eef6114f9ef3', '[\"*\"]', NULL, NULL, '2024-04-22 23:53:17', '2024-04-22 23:53:17'),
(9, 'App\\Models\\User', 10, 'MyAuthApp', 'a2aea7d85c44be92a12fa7159a33e9daacde06220d66f33ef729b34f6358d004', '[\"*\"]', NULL, NULL, '2024-04-22 23:54:57', '2024-04-22 23:54:57'),
(10, 'App\\Models\\User', 12, 'MyAuthApp', 'a631bcc1bb158c6e0f1c33da73e6cbc874be34f46f4fa72294a4a3f9f0ba4934', '[\"*\"]', NULL, NULL, '2024-05-22 06:12:54', '2024-05-22 06:12:54'),
(11, 'App\\Models\\User', 2, 'MyAuthApp', '9b3b430c358c28508fe06b0d15450970613eac7500c859a9d331dec3470190d4', '[\"*\"]', NULL, NULL, '2024-05-31 02:37:21', '2024-05-31 02:37:21');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int NOT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promo_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `popularity` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `duration`, `about`, `promo_code`, `discount`, `image`, `popularity`, `created_at`, `updated_at`) VALUES
(1, 'Lacy Mejia', 92, 'Molestias tempore d', 'Lorem incididunt dol', 49, 'http://127.0.0.1:8000/image/1712985847.jpeg', 'high', '2024-04-12 23:54:07', '2024-04-13 00:04:42'),
(2, 'Jaden Levy', 90, 'Placeat voluptates', 'Cupidatat do magnam', 60, 'http://127.0.0.1:8000/image/1715333367.jpeg', NULL, '2024-05-10 03:59:27', '2024-05-10 03:59:27'),
(5, 'Sean Whitfield', 57, 'Excepteur iste itaqu', 'Eaque quidem et assu', 7, 'http://127.0.0.1:8000/image/1715334225.jpeg', NULL, '2024-05-10 04:08:51', '2024-05-10 04:13:45'),
(6, 'Duncan Harris', 12, 'Doloremque necessita', 'Neque enim eiusmod i', 75, 'https://firebasestorage.googleapis.com/v0/b/balibusinessclub-4cbca.appspot.com/o/Images%2Fmask.jpeg?alt=media&token=d9bdcaae-1d07-4aa3-8e56-e91c81c6e8be', NULL, '2024-05-10 04:41:47', '2024-05-10 04:41:47');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` bigint UNSIGNED NOT NULL,
  `transaction_id` text COLLATE utf8mb4_unicode_ci,
  `event_name` text COLLATE utf8mb4_unicode_ci,
  `price` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `transaction_id`, `event_name`, `price`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'fefgf43545', 'Barclay Black', '500', '2024-05-16 05:42:05', '2024-05-16 05:42:05', '1'),
(2, '54346523475vg', 'fubf euf', '400', '2024-05-16 05:42:24', '2024-05-16 05:42:24', '2');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_pic` text COLLATE utf8mb4_unicode_ci,
  `pseudo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_où_viens_tu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `es_tu_installé_à_Bali` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depuis_combien_de_temps` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pour_combien_de_temps_seras_tu_à_Bali` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wpnumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tictok` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tes_meilleures_skills` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ton_parcours` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tes_hobbies_à_bali` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`id`, `user_id`, `first_name`, `last_name`, `profile_pic`, `pseudo`, `d_où_viens_tu`, `es_tu_installé_à_Bali`, `depuis_combien_de_temps`, `pour_combien_de_temps_seras_tu_à_Bali`, `wpnumber`, `instagram`, `tictok`, `linkedin`, `tes_meilleures_skills`, `ton_parcours`, `tes_hobbies_à_bali`, `created_at`, `updated_at`) VALUES
(1, '2', 'Tarun', 'Kumar', 'http://localhost/storage/files/img_660fd199ae243.png', 'fdfd', 'dfd', 'dfgdfbd', 'fsdfff', 'sdfgds', '4534534534', 'sdvfsd', 'sdf', 'vsdfvsd', 'sdfvsd', 'sdfvsd', 'sdfvsd', '2024-04-05 04:25:28', '2024-04-05 04:55:29'),
(2, '3', 'Akash', 'Paul', NULL, 'dfds', 'erfge', 'rgr', 'rtunhrtu', 'nhin', '6524857485', 'jnhgj', 'ghng', 'gfg', 'fsgdg', 'fdg', 'fgfgsd', '2024-04-06 03:00:20', '2024-04-06 03:00:20'),
(3, '4', 'Sachin', 'Mondal', 'http://localhost/storage/files/img_661f60d4b89de.png', 'dfds', 'erfge', 'rgr', 'rtunhrtu', 'nhin', '6524857485', 'jnhgj', 'ghng', 'gfg', 'fsgdg', 'fdg', 'fgfgsd', '2024-04-17 00:10:38', '2024-04-17 00:10:38'),
(12, '12', 'Tuhin', 'Mondal', 'http://localhost/storage/files/img_664dda3dd5a54.jpg', 'dfds', 'erfge', 'rgr', 'rtunhrtu', 'nhin', '8348777834', 'jnhgj', 'ghng', 'gfg', 'red', 'fdg', 'fgfgsd', '2024-05-22 06:12:54', '2024-05-22 06:12:54');

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
  `roles` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `roles`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$wa5t268VJ9ny1juvhAP1LO21g/nb4anF96YYvEYVE01/L8xZv1hlG', NULL, '1', '2024-04-05 04:23:30', '2024-04-05 04:23:30'),
(2, 'Tarun Kumar', 'tarun@gmail.com', NULL, '$2y$10$qR4MfxDCxt6E2/ejU8hMAOwahdq.qRGYLzMVr5bjcfKkPYaZe31cW', NULL, '0', '2024-04-05 04:25:28', '2024-04-05 04:55:29'),
(3, 'Akash Paul', 'akacrj@gmail.com', NULL, '$2y$10$qUm9KilSLZbmvd8nhYqGE.flVAAanUVUd87yycfofvFNxxCPG2STu', NULL, '0', '2024-04-06 03:00:20', '2024-04-06 03:00:20'),
(4, 'Sachin Mondal', 'sachin@gmail.com', NULL, '$2y$10$bytbq84jf0CZuQ7LFPaah.b3oLmL0P9xSaEbEp62R8dpiWzRs9DdC', NULL, '0', '2024-04-17 00:10:38', '2024-04-17 00:10:38'),
(12, 'Tuhin Mondal', 'tuhin1@gmail.com', NULL, '$2y$10$vM6wW/5T6FHGD4oovnhb5egFa1kPBLQs6KPX6iVVpCUEsiBf8L3U2', NULL, '0', '2024-05-22 06:12:53', '2024-05-22 06:12:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
