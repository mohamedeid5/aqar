-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2018 at 03:01 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olx`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@site.com', '$2y$10$iDzRCkKhSXfm1VtbLzJahOLU8YiKlEI7.z81MC80lj3/BKSR.oFCy', 'admins/fOubQNlurD3MrWCmzmnLPOM0MTLjLKymvBchKueC.jpeg', 'Utchfw9tI5CWGpeJB5i3hVJFgRPpZmmN33CAx2AMszkFCfzsHGg8BSpV9OCL', '2018-07-29 11:07:18', '2018-08-14 09:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `keywords` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `slug`, `description`, `keywords`, `icon`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'عقارات', 'عقارات', 'عقارات', 'main', NULL, NULL, '2018-07-29 11:10:01', '2018-07-29 11:10:01'),
(2, 'شقه للبيع', 'شقه-للبيع', 'Mobiles', 'php', NULL, 1, '2018-07-29 11:10:15', '2018-07-29 11:10:15'),
(3, 'شقق للايجار', 'شقق-للايجار', 'عقارات', 'php', NULL, 1, '2018-08-13 13:50:18', '2018-08-13 13:50:18');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `space` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rooms` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pathroom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `takseet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tashteeb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tajeer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `slug`, `description`, `price`, `city`, `location`, `space`, `rooms`, `pathroom`, `flat`, `takseet`, `tashteeb`, `tajeer`, `status`, `photo`, `code`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(2, 'شقه للبيع', 'شقه-للبيع', 'عقار للبيع', 120000, 'المنصوره', 'مكان', '205', '2', '2', '4', 'نعم', 'نعم', 'لا', 1, 'items/nd891nsgZE239X1EWDzA50DjYh9udLuU5JrkiEyf.jpeg', NULL, 1, 1, '2018-07-31 10:56:28', '2018-08-01 11:28:59'),
(3, 'شقه للايجار', 'شقه-للايجار', 'اى حاجه', 1350, 'القاهره', 'اجا', '2222', '2', '1', '2', 'نعم', 'لا', 'نعم', 1, 'items/uZ9BZLKLAtiPHFre4wm9FyXcWm2CfNjidCCMKy2m.jpeg', NULL, 7, 3, '2018-07-31 12:23:17', '2018-08-01 11:28:49'),
(4, 'شقه', 'شقه', 'شقه للبيع', 1350, 'المنصوره', 'اجا', '3', '1', NULL, '3', 'نعم', 'لا', 'لا', 1, 'items/8SkCcovaBlc83soR3ArmwHOSPGExTzcwtr8sWZyt.jpeg', NULL, 1, 1, '2018-07-31 12:23:45', '2018-08-01 11:26:45'),
(5, 'شقه للبيع 1', 'shkh-llbyaa-1', 'شقه للبيع', 1000000, 'الدقهليه', 'مكان', '136', '2', '2', '3', 'نعم', 'لا', 'نعم', 1, 'items/VXM9kcT1QoYYEJe5E12MzOBmMIodki4ZBxZ6QvME.jpeg', NULL, 7, 2, '2018-08-01 11:17:12', '2018-08-13 14:28:11'),
(7, 'شقه للايجار 2', 'شقه-للايجار-2', 'وصف تاني', 80000, 'الدقهليه', 'مكان', '555', '8', '2', '5', 'نعم', 'لا', 'نعم', 1, 'items/vvYK5Wgy4iDPtoFvzJrAUHR9bAYN16BluIvKvupm.jpeg', NULL, 7, 1, '2018-08-05 14:58:47', '2018-08-13 14:29:22'),
(10, 'شقه', 'شقه', 'وصف بلا بلا بلا', 523515, 'المنصوره', 'اجا', '8', '5', NULL, '5', 'نعم', 'لا', 'نعم', 1, 'items/PlGBQSbxZ1XhTfoyStpy2cfq69ySfPpl5HzaZxae.jpeg', NULL, 7, 2, '2018-08-05 15:03:15', '2018-08-05 15:03:30'),
(11, 'شقه', 'شقه', 'item', 5451, 'Aga', 'Aga', '654', '5', '2', '5', 'لا', 'لا', 'نعم', 1, 'items/UxVfxFqtjUy98VJ0c3cFhIICA9b6tr0h74kcK95R.jpeg', NULL, 1, 1, '2018-08-11 16:06:34', '2018-08-14 09:53:17'),
(12, 'شقه للبيع 7', 'شقه-للبيع-7', 'شقه للبيع', 120000, 'القاهره', 'اجا', '555', '55', '11', '5', 'لا', 'نعم', 'نعم', 1, 'items/9bTahUPmoAW8DUE2eLtxOyF452GCGdUI9bIFZ9aP.jpeg', NULL, 1, 2, '2018-08-13 14:09:54', '2018-08-14 10:28:58'),
(13, 'شقه للبيع 4', 'شقه-للبيع-4', 'شقه', 120000, 'المنصوره', 'اجا', '505', '2', '4', '5', 'لا', 'نعم', 'نعم', 1, 'items/Fx1GDE8Iy6lv1aB5n0FGNcra6Y83pDcS6syCLrms.jpeg', NULL, 1, 2, '2018-08-13 14:16:44', '2018-08-14 10:29:12'),
(14, 'شقه للبيع 5', 'شقه-للبيع-5', 'شقه', 120000, 'الدقهليه', 'اجا', '27555', '3', '5', '2', 'لا', 'نعم', 'نعم', 1, 'items/QY0X8rJtB2HoNBTacHLG5GNLWfbZPjB8t7aHxkA8.jpeg', NULL, 1, 2, '2018-08-13 14:19:37', '2018-08-14 10:29:36'),
(15, 'شقه للبيع 6', 'شقه-للبيع-6', 'شقه', 120000, 'الدقهليه', 'اجا', '27555', '3', '4', '2', 'لا', 'نعم', 'نعم', 1, 'items/7l0l7kNFxX7pw5bMQXzgp96Jq7Yjr4oHC6QbeqiR.jpeg', NULL, 1, 2, '2018-08-13 14:21:01', '2018-08-14 10:29:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_07_18_104851_create_admins_table', 1),
(4, '2018_07_19_111423_create_categories_table', 1),
(5, '2018_07_21_083346_create_items_table', 1),
(6, '2018_07_22_110350_create_settings_table', 1),
(7, '2018_07_25_180312_create_cities_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name_ar`, `site_name_en`, `icon`, `lang`, `status`, `created_at`, `updated_at`) VALUES
(1, 'الاسم بالعربي', 'OLX', 'settings/5o0VjaFD1zKJrQYHtrG2ri91fHw9gjiZWeFqYY7k.jpeg', 'en', '1', '2018-07-09 23:28:17', '2018-08-14 09:51:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Alaa', 'alaa@gmail.com', '$2y$10$cwT/2N2WXoOmoTkKroIf9.2AYQzvpM/7E0rpIgW.Us/mlBQwPqgXe', 'users/97SecoGv2PTBaBeDvH1pz5ag0i1YLnqxoZabhldI.jpeg', NULL, '2018-08-01 10:35:44', '2018-08-01 12:31:10'),
(2, 'Mohamed Eid', 'mohamedeid368@mail.ru', '$2y$10$R5kDE./CEtVBv.RqbZUjNO4Yn89u7N0hvbxV4yAbDjYYbb2y.LMou', 'users/Z9qRhsc3LKKYHKoHqTkTZDQ7og1INJt1bEOmjc1e.jpeg', NULL, '2018-08-01 10:45:06', '2018-08-01 10:45:06'),
(3, 'Alaa', 'alaaelomda11@yahoo.com', '$2y$10$eubVjbiLjeuT3z0.NRj8We3Xa.TWQteSPXhWAEZfnWuFtelCewzVe', 'users/H2a7KSXl6uFLAB9EnOGYCqSRm48jiJQ7j7RBNy1B.jpeg', NULL, '2018-08-01 10:46:01', '2018-08-01 10:46:01'),
(4, 'mohamed eid', 'mohamedeid@gmail.com', '$2y$10$GRyq6/iSD09cnCc5e0pEq.Z0eMJ/CUWi/jO4ms55Fi6JzUjAgqL7O', 'users/SBvdV43lhdzc9iAIQtyvv7oTHBoyaMv0QMbBFc8n.jpeg', NULL, '2018-08-01 10:46:24', '2018-08-01 10:46:24'),
(5, 'Alaa', 'admin@booking.com', '$2y$10$Jbh0CMFoLimykNnCOcVXE.hVCxQd.tcU8IVgrmGHxv.LG/dNGtozC', 'users/zAHwuS2zHS2xIdsnNbbT502tG0kDm7KAFv8hu1Hi.jpeg', NULL, '2018-08-01 10:46:38', '2018-08-01 10:46:38'),
(6, 'Alaa', 'admin@olx.com', '$2y$10$rM1v.EqQ4G4oOMCcOsPabeidQy3GJNWRvU8UadwJW0RzLw6KRAHTK', 'users/DwGw7fScQe1BxoDfTNYn2f8pKT1lEGmap6ram45M.jpeg', NULL, '2018-08-01 10:48:03', '2018-08-01 10:48:03'),
(7, 'Mohamed Eid', 'meid368@gmail.com', '$2y$10$7/8RFi5yNxA/bnEASX2ipuJGhZmUMbFY3FoQQyVfQ9GuVoaFkhpSG', 'users/FfpqKQZyZ6A12gHYjJZZp4ZdfldkJvjzJdjUyVZF.jpeg', 'cjsdLFBdhkZqwvFyJV83ydQu1RnbOpY81eUqa4cnojOdXAzMTQyWnLxj8zxp', '2018-08-05 10:56:32', '2018-08-11 16:07:03'),
(8, 'new user', 'newuser@gmail.com', 'mohamedeid', NULL, NULL, '2018-08-07 15:00:13', '2018-08-07 15:00:13'),
(9, 'new user 2', 'newuser2@gmail.com', 'mohamedeid', NULL, NULL, '2018-08-07 15:09:56', '2018-08-07 15:09:56'),
(11, 'Mohamed Eid', 'meid3688@gmail.com', 'mohamedeid', NULL, NULL, '2018-08-10 14:24:08', '2018-08-10 14:24:08'),
(12, 'Alaa', 'admin@booking.coms', '$2y$10$qjaEqj34mP/MyNiKvMYNv.qwnyMg.MP3xtgNjgsX4fINeeEX4UXya', NULL, NULL, '2018-08-10 14:25:17', '2018-08-10 14:25:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
