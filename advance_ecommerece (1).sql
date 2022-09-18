-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2022 at 09:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `advance_ecommerece`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2022-06-01 12:36:47', '$2y$10$HbqB8chXRtpC5H7i4XzWXetEpD216cxk1063AcABgW8n9mAEkO/2K', '4dFjHrGxsEAG9C82pVedtjJIjXn9JHlozo4WwZNne4LZRSf7KwZsMmGefy4A', NULL, '202206041841images.jpg', '2022-06-01 12:36:47', '2022-06-04 13:13:33');

-- --------------------------------------------------------

--
-- Table structure for table `area_of_districts`
--

CREATE TABLE `area_of_districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `area_of_districts`
--

INSERT INTO `area_of_districts` (`id`, `division_id`, `district_name`, `created_at`, `updated_at`) VALUES
(2, 3, 'GAZIPUR', '2022-08-14 00:13:35', '2022-08-14 00:13:35'),
(5, 3, 'UTTARA', '2022-08-15 22:52:00', NULL),
(6, 2, 'HABIGANJ', '2022-08-15 23:31:31', NULL),
(7, 2, 'MOULVIBAZAR', '2022-08-15 23:31:41', NULL),
(8, 3, 'SECTOR-9', '2022-09-16 02:54:37', NULL),
(9, 3, 'SECTOR-1', '2022-09-16 02:54:48', NULL),
(10, 3, 'SECTOR-2', '2022-09-16 02:54:55', NULL),
(11, 3, 'SECTOR-3', '2022-09-16 02:55:02', NULL),
(12, 3, 'SECTOR-4', '2022-09-16 02:55:10', NULL),
(13, 3, 'SECTOR-5', '2022-09-16 02:55:17', NULL),
(14, 2, 'SHUNAMGONJ', '2022-09-16 02:55:39', NULL),
(15, 2, 'TAHERPUR', '2022-09-16 02:55:51', NULL),
(16, 2, 'HABIGANJ', '2022-09-16 02:55:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `area_of_shippings`
--

CREATE TABLE `area_of_shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `area_of_shippings`
--

INSERT INTO `area_of_shippings` (`id`, `division_name`, `created_at`, `updated_at`) VALUES
(2, 'SYLHET', '2022-08-13 22:56:23', NULL),
(3, 'DHAKA', '2022-08-13 23:37:06', NULL),
(4, 'KHULNA', '2022-08-15 22:33:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_slug`, `brand_image`, `created_at`, `updated_at`) VALUES
(3, 'Huawei', 'huawei', 'upload/brand/1736351178927528.png', NULL, '2022-06-22 10:33:04'),
(4, 'Apple', 'apple', 'upload/brand/1736348419934090.png', NULL, '2022-07-08 11:49:39'),
(7, 'Yellow', 'yellow', 'upload/brand/1737085071917014.png', NULL, NULL),
(8, 'Samsung', 'samsung', 'upload/brand/1737807776386920.jpg', NULL, NULL),
(9, 'One Plus', 'one plus', 'upload/brand/1737807891698962.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `category_icon`, `created_at`, `updated_at`) VALUES
(5, 'Fashion', 'fashion', 'fa fa-shopping-bag', NULL, '2022-07-07 13:08:16'),
(6, 'Electronics', 'electronics', 'fa fa-laptop', NULL, '2022-07-07 13:08:34'),
(7, 'Home', 'home', 'fa fa-diamond', NULL, '2022-07-07 13:08:57'),
(8, 'Appliances', 'appliances', 'fa fa-paper-plane', NULL, '2022-07-07 13:09:54'),
(9, 'Grocery', 'grocery', 'fa fa-envira', NULL, '2022-07-08 12:36:13');

-- --------------------------------------------------------

--
-- Table structure for table `cupons`
--

CREATE TABLE `cupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_discount` int(11) NOT NULL,
  `coupon_validity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cupons`
--

INSERT INTO `cupons` (`id`, `coupon_name`, `coupon_discount`, `coupon_validity`, `status`, `created_at`, `updated_at`) VALUES
(1, 'HEART-ATTACK', 30, '2022-08-26', 1, '2022-08-25 04:06:39', '2022-08-25 04:06:39');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_06_01_180903_create_sessions_table', 1),
(7, '2022_06_01_182554_create_admins_table', 2),
(8, '2022_06_08_171523_create_brands_table', 3),
(9, '2022_06_25_155757_create_categories_table', 4),
(10, '2022_06_25_160450_create_categories_table', 5),
(11, '2022_06_25_173909_create_sub_categories_table', 6),
(12, '2022_06_27_173043_create_sub__sub_categories_table', 7),
(13, '2022_06_28_172256_create_products_table', 8),
(14, '2022_06_28_174002_create_multi_images_table', 8),
(15, '2022_07_06_174207_create_sliders_table', 9),
(16, '2022_08_06_091532_create_wishlists_table', 10),
(17, '2022_08_12_040507_create_cupons_table', 11),
(18, '2022_08_14_042036_create_area_of_shippings_table', 12),
(19, '2022_08_14_050706_create_area_of_districts_table', 13),
(20, '2022_08_16_043723_create_shipping_states_table', 14),
(21, '2022_08_21_080041_create_shippings_table', 15),
(22, '2022_08_24_102704_create_orders_table', 16),
(23, '2022_08_24_102811_create_order_items_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `multi_images`
--

CREATE TABLE `multi_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_images`
--

INSERT INTO `multi_images` (`id`, `product_id`, `photo_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'upload/product/multiImage/1737356361117183.jpg', '2022-06-30 12:20:20', '2022-07-03 12:15:40'),
(6, 3, 'upload/product/multiImage/1737808403417746.jpg', '2022-07-08 12:00:41', NULL),
(7, 3, 'upload/product/multiImage/1737808403487837.jpg', '2022-07-08 12:00:41', NULL),
(8, 4, 'upload/product/multiImage/1737808656279923.jpg', '2022-07-08 12:04:42', NULL),
(9, 4, 'upload/product/multiImage/1737808656351353.jpg', '2022-07-08 12:04:42', NULL),
(10, 5, 'upload/product/multiImage/1737808882609122.jpg', '2022-07-08 12:08:18', NULL),
(11, 5, 'upload/product/multiImage/1737808882680117.jpg', '2022-07-08 12:08:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` int(11) DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `processing_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picked_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipped_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deliverd_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `division_id`, `district_id`, `state_id`, `name`, `email`, `phone`, `post_code`, `notes`, `payment_type`, `payment_method`, `transaction_id`, `currency`, `amount`, `order_number`, `invoice_no`, `order_date`, `order_month`, `order_year`, `confirmed_date`, `processing_date`, `picked_date`, `shipped_date`, `deliverd_date`, `cancel_date`, `return_date`, `return_reason`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 5, 1, 'Leonardo DiCaprio', 'user2@gmail.com', '01700000000', 1202, 'TESTING 1', 'card_1LacckD1QbGk12MCBghHLxYq', 'Stripe', 'txn_3LacclD1QbGk12MC1gLluqp3', 'usd', 79000.00, '630744adb1961', 'HAPPY_SHOPPING98340797', '25 August 2022', 'August 2022', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Cancel', '2022-08-25 03:45:19', '2022-09-18 01:02:15'),
(2, 2, 3, 5, 1, 'Leonardo DiCaprio', 'user2@gmail.com', '01700000000', 1202, 'TESTING 1', 'card_1LaciPD1QbGk12MCpkB1S7H0', 'Stripe', 'txn_3LaciQD1QbGk12MC05tnRQGA', 'usd', 79000.00, '6307460cbcfa0', 'HAPPY_SHOPPING40933888', '25 August 2022', 'August 2022', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2022-08-25 03:51:10', NULL),
(3, 2, 3, 5, 1, 'Leonardo DiCaprio', 'user2@gmail.com', '01700000000', 1202, 'TESTING-2', 'card_1LaczaD1QbGk12MCygDLouwM', 'Stripe', 'txn_3LaczbD1QbGk12MC1CXiH8M6', 'usd', 280.00, '63074a36e9d4f', 'HAPPY_SHOPPING51187727', '25 August 2022', 'August 2022', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2022-08-25 04:08:57', NULL),
(4, 2, 3, 5, 1, 'Leonardo DiCaprio', 'user2@gmail.com', '01700000000', 1202, 'Testing 1', 'card_1Ld90uD1QbGk12MC2EKD25vn', 'Stripe', 'txn_3Ld90vD1QbGk12MC0SyJiYpB', 'usd', 800.00, '631070f9cb3fa', 'HAPPY_SHOPPING57066244', '01 September 2022', 'September 2022', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2022-09-01 02:44:44', NULL),
(5, 2, 3, 5, 1, 'Leonardo DiCaprio', 'user2@gmail.com', '01700000000', 1202, 'aaaaaaaaaa', 'card_1Ld94fD1QbGk12MCWb3nDz0m', 'Stripe', 'txn_3Ld94hD1QbGk12MC0YnPIsSQ', 'usd', 800.00, '631071e32fea5', 'HAPPY_SHOPPING32630014', '01 September 2022', 'September 2022', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2022-09-01 02:48:36', NULL),
(6, 2, 3, 5, 1, 'Leonardo DiCaprio', 'user2@gmail.com', '01700000000', 1202, 'testing', 'card_1Ld9BZD1QbGk12MCmCvL5W16', 'Stripe', 'txn_3Ld9BbD1QbGk12MC0myYakoI', 'usd', 800.00, '6310738f3a9ce', 'HAPPY_SHOPPING62663976', '01 September 2022', 'September 2022', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2022-09-01 02:55:45', NULL),
(7, 2, 3, 5, 1, 'khantafshir1997@gmail.com', 'khantafshir1997@gmail.com', '01792288714', 1229, 'testing', 'card_1LeBr1D1QbGk12MCC5G0ssFP', 'Stripe', 'txn_3LeBr3D1QbGk12MC1h1ap4z4', 'usd', 158000.00, '63143e9883ea4', 'HAPPY_SHOPPING91023901', '04 September 2022', 'September 2022', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2022-09-03 23:58:51', NULL),
(8, 2, 3, 5, 1, 'Leonardo DiCaprio', 'user2@gmail.com', '01700000000', 1234, 'aaaaaaaa', 'card_1LeBvTD1QbGk12MCMAB62d9K', 'Stripe', 'txn_3LeBvUD1QbGk12MC1JSfZ6Ll', 'usd', 158000.00, '63143fac8f919', 'HAPPY_SHOPPING28299037', '04 September 2022', 'September 2022', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2022-09-04 00:03:26', NULL),
(9, 3, 3, 5, 1, 'Ahmed', 'ahmed100@gmail.cpm', '01234567892', 1111, 'Ahmed', 'card_1LeC25D1QbGk12MCeOffnlQS', 'Stripe', 'txn_3LeC26D1QbGk12MC1F93RjN0', 'usd', 79000.00, '63144146215ac', 'HAPPY_SHOPPING40937038', '04 September 2022', 'September 2022', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2022-09-04 00:10:15', NULL),
(10, 1, 3, 5, 1, 'User', 'user1@gmail.com', '01700000000', 1111, 'User 1', 'card_1LiDGJD1QbGk12MCXMvvB0BK', 'Stripe', 'txn_3LiDGLD1QbGk12MC1sfoqUoJ', 'usd', 800.00, '6322df9ce0e26', 'HAPPY_SHOPPING12781364', '15 September 2022', 'September 2022', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2022-09-15 02:17:36', NULL),
(11, 1, 3, 5, 1, 'Tafshir', 'user1@gmail.com', '01700000000', 2222, 'Tafshir 1', 'card_1LiDKKD1QbGk12MCYuSNkSHd', 'Stripe', 'txn_3LiDKLD1QbGk12MC0sCP9Ulr', 'usd', 79000.00, '6322e09556e5a', 'HAPPY_SHOPPING80511000', '15 September 2022', 'September 2022', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Processing', '2022-09-15 02:21:43', '2022-09-18 01:10:38'),
(12, 1, 3, 5, 1, 'User', 'user1@gmail.com', '01700000000', 11111, 'AAAAAA', 'Casn-on', 'Cash-on', NULL, 'TK', 79000.00, NULL, 'HAPPY_SHOPPING21794507', '15 September 2022', 'September 2022', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Delivered', '2022-09-15 03:50:20', '2022-09-18 00:49:23');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `color`, `size`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 'black', '13\"', '1', 79000.00, '2022-08-25 03:51:10', NULL),
(2, 3, 1, 'black', '5v', '1', 400.00, '2022-08-25 04:08:57', NULL),
(3, 9, 4, 'black', '13\"', '1', 79000.00, '2022-09-04 00:10:15', NULL),
(4, 10, 1, 'black', '5v', '2', 400.00, '2022-09-15 02:17:36', NULL),
(5, 11, 4, 'black', '13\"', '1', 79000.00, '2022-09-15 02:21:43', NULL),
(6, 12, 4, 'black', '13\"', '1', 79000.00, '2022-09-15 03:50:20', NULL);

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
('user1@gmail.com', '$2y$10$ceylqnlZ0oTWrwAXLbsD1.VhJDfQjqQHYIGmJeUTDQTnQhRHAYuBu', '2022-08-25 04:44:45');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `sub_subcategory_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thumb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hot_deals` int(11) DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `special_offer` int(11) DEFAULT NULL,
  `special_deals` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `subcategory_id`, `sub_subcategory_id`, `product_name`, `product_slug`, `product_code`, `product_qty`, `product_tag`, `product_size`, `product_color`, `selling_price`, `discount_price`, `short_desc`, `long_desc`, `product_thumb`, `hot_deals`, `featured`, `special_offer`, `special_deals`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 6, 16, 81, 'Huawei SV', 'huawei sv', 'H-101', '10', 'chargers,adapter', '5v,10v', 'black', '500', '400', 'Mobile  Mobile Chargers for Android Phones 2 USB Charger (2.4A 5V) Compatible for Smartphone', '<p><strong>The maximum power is 12W and the maximum current is 2.4 Amp. When two output ports are used at the same time, each output port reaches 1.2A on average after intelligent shunting, enables you to charge two devices simultaneously.</strong></p>', 'upload/product/thumbImage/1737362271952200.jpg', NULL, 1, 1, NULL, 1, '2022-07-28 05:37:34', '2022-07-28 05:37:34'),
(3, 8, 8, 27, 50, 'Samsung Refrigerator', 'samsung refrigerator', 'RT27HAR9DS8/D3', '10', 'refrigerator', '120L,220L', 'black,white,gray', '40000', '35000', 'Product details of Samsung Refrigerator RT27HAR9DS8/D3', '<p style=\"text-align:justify\"><strong>Physical Specification Net Width(mm): 600 mm Net Case Height with Hinge(mm): 1715 mm Net Depth with Door Handle(mm): 672 mm Net Depth without Door Handle(mm): 672 mm Net Depth without Door(mm): 605 mm Packing Width(mm): 631 mm Packing Height(mm): 1780 mm Packing Depth(mm): 699 mm Net Weight(kg): 59 kg Packing Weight(kg): 64 kg</strong></p>', 'upload/product/thumbImage/1737808403334906.jpg', 1, NULL, 1, NULL, 1, '2022-07-28 05:33:19', '2022-07-28 05:33:19'),
(4, 8, 6, 14, 72, 'Samsung Galaxy Book', 'samsung galaxy book', 'S-L010', '5', 'laptop', '13\",16\"', 'black,gray', '80000', '79000', 'The Galaxy experience', '<p style=\"text-align:justify\"><strong>Galaxy Books for business</strong></p>\r\n\r\n<p style=\"text-align:justify\"><strong>Enjoy exclusive volume discounts with a Samsung Business Account, 0% Samsung Business Financing and free shipping. Plus, eligible organizations can shop tax-free with a Samsung Tax Exempt Account.</strong></p>', 'upload/product/thumbImage/1737808656190068.jpg', 1, 1, NULL, NULL, 1, '2022-08-02 04:22:57', '2022-08-02 04:22:57'),
(5, 7, 5, 9, 15, 'Jeans Stitch', 'jeans stitch', 'J-101', '10', 'Jeans', '31,32,33', 'black,green', '1000', NULL, 'The Best Men’s Jeans', '<p style=\"text-align:justify\"><strong>A great pair of jeans can be the foundation of an outfit: Though the jeans themselves may not draw attention, they will elevate whatever else you wear,</strong></p>', 'upload/product/thumbImage/1737808882519205.jpg', 1, NULL, NULL, 1, 1, '2022-07-28 05:32:56', '2022-07-28 05:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('qNz9vpd9w9ZoouhedTWgxHvAygFBFi1T448ZGNm5', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYlFtdXBXbFhmUDlINDlubDBhTGI3eURyemhSdFVybkNkZGFHU2lJaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi1vcmRlcnMvaW52b2ljZS9kb3dubG9hZC8xMSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE5OiJwYXNzd29yZF9oYXNoX2FkbWluIjtzOjYwOiIkMnkkMTAkSGJxQjhjaFhSdHBDNUg3aTRYeldYZXRFcEQyMTZjeGsxMDYzQWNBQmdXOG45bUFFa08vMksiO30=', 1663485753);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_states`
--

CREATE TABLE `shipping_states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `state_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_states`
--

INSERT INTO `shipping_states` (`id`, `division_id`, `district_id`, `state_name`, `created_at`, `updated_at`) VALUES
(1, 3, 5, 'SECTOR - 8', '2022-08-15 23:40:30', NULL),
(3, 3, 2, 'KALIAKAIR', '2022-09-16 02:59:12', NULL),
(4, 3, 2, 'SRIPUR', '2022-09-16 02:59:34', NULL),
(5, 2, 7, 'SHRIMANGAL', '2022-09-16 03:00:12', NULL),
(6, 2, 7, 'KAMALGANJ', '2022-09-16 03:00:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_image`, `title`, `desc`, `status`, `created_at`, `updated_at`) VALUES
(3, 'upload/slider/1737807542573561.jpg', 'Slider 1', 'Slider 1 description', 1, NULL, '2022-07-08 11:47:00'),
(4, 'upload/slider/1737807557839939.jpg', 'Slider 2', 'Slider 2 description', 1, NULL, '2022-07-08 11:47:15'),
(5, 'upload/slider/1737807573330048.jpg', 'Slider 3', 'Slider 3  description', 1, NULL, '2022-07-08 11:47:30'),
(6, 'upload/slider/1737807590891208.jpg', 'Slider 4', 'Slider 4 description', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name`, `subcategory_slug`, `created_at`, `updated_at`) VALUES
(8, 5, 'Men\'s Top Wear', 'men\'s top wear', NULL, NULL),
(9, 5, 'Men\'s Bottom Wear', 'men\'s bottom wear', NULL, NULL),
(10, 5, 'Men Footwear', 'men footwear', NULL, NULL),
(11, 5, 'Women\'s Top Wear', 'women\'s top wear', NULL, NULL),
(12, 5, 'Women\'s Bottom Wear', 'women\'s bottom wear', NULL, NULL),
(13, 6, 'Gaming', 'gaming', NULL, NULL),
(14, 6, 'Laptop & Desktop', 'laptop & desktop', NULL, NULL),
(15, 6, 'Laptop Accessories', 'laptop accessories', NULL, NULL),
(16, 6, 'Mobile Accessories', 'mobile accessories', NULL, NULL),
(17, 6, 'Tablets', 'tablets', NULL, NULL),
(18, 6, 'Powerbank', 'powerbank', NULL, NULL),
(19, 7, 'Living Room Furniture', 'living room furniture', NULL, NULL),
(20, 7, 'Kitchen & Dinning', 'kitchen & dinning', NULL, NULL),
(21, 7, 'Home Decor', 'home decor', NULL, NULL),
(22, 7, 'Cleaning & Bath', 'cleaning & bath', NULL, NULL),
(23, 7, 'Bedroom Furniture', 'bedroom furniture', NULL, NULL),
(24, 8, 'Television', 'television', NULL, NULL),
(25, 8, 'Air Condition', 'air condition', NULL, NULL),
(26, 8, 'Fan & Air Coolers', 'fan & air coolers', NULL, NULL),
(27, 8, 'Refrigerators', 'refrigerators', NULL, NULL),
(28, 8, 'Washing Machine', 'washing machine', NULL, NULL),
(29, 8, 'Home Appliances', 'home appliances', NULL, NULL),
(30, 5, 'Women Footwear', 'women footwear', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub__sub_categories`
--

CREATE TABLE `sub__sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `sub_subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_subcategory_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub__sub_categories`
--

INSERT INTO `sub__sub_categories` (`id`, `category_id`, `subcategory_id`, `sub_subcategory_name`, `sub_subcategory_slug`, `created_at`, `updated_at`) VALUES
(12, 5, 8, 'T-Shirts', 't-shirts', NULL, NULL),
(13, 5, 8, 'Formal Shirts', 'formal shirts', NULL, NULL),
(14, 5, 8, 'Casual Shirts', 'casual shirts', NULL, NULL),
(15, 5, 9, 'Jeans', 'jeans', NULL, NULL),
(16, 5, 9, 'Casual Trousers', 'casual trousers', NULL, NULL),
(17, 5, 9, 'Formal Trousers', 'formal trousers', NULL, NULL),
(18, 5, 9, 'Track pants', 'track pants', NULL, NULL),
(19, 5, 10, 'Sports Shoes', 'sports shoes', NULL, NULL),
(20, 5, 10, 'Formal Shoes', 'formal shoes', NULL, NULL),
(21, 5, 10, 'Casual Shoes', 'casual shoes', NULL, NULL),
(22, 5, 10, 'Sandals & Floaters', 'sandals & floaters', NULL, NULL),
(23, 5, 11, 'Shirts', 'shirts', NULL, NULL),
(24, 5, 11, 'Tops', 'tops', NULL, NULL),
(25, 5, 11, 'T-Shirts', 't-shirts', NULL, NULL),
(26, 5, 11, 'Skirts', 'skirts', NULL, NULL),
(27, 5, 12, 'Jeans', 'jeans', NULL, NULL),
(28, 5, 11, 'Kurtas & Kurtis', 'kurtas & kurtis', NULL, NULL),
(29, 5, 11, 'Gowns', 'gowns', NULL, NULL),
(30, 5, 12, 'Jeggings & Tights', 'jeggings & tights', NULL, NULL),
(31, 5, 12, 'Trousers & Capris', 'trousers & capris', NULL, NULL),
(32, 5, 12, 'Palazzos', 'palazzos', NULL, NULL),
(33, 5, 12, 'Dhoti Pants', 'dhoti pants', NULL, NULL),
(34, 5, 30, 'Flats', 'flats', NULL, NULL),
(35, 5, 30, 'Heels', 'heels', NULL, NULL),
(36, 5, 30, 'Wedges', 'wedges', NULL, NULL),
(37, 5, 30, 'Sandals', 'sandals', NULL, NULL),
(38, 8, 25, 'Gree', 'gree', NULL, NULL),
(39, 8, 25, 'Walton', 'walton', NULL, NULL),
(40, 8, 25, 'Samsung', 'samsung', NULL, NULL),
(41, 8, 25, 'Singer', 'singer', NULL, NULL),
(42, 8, 26, 'Samsung', 'samsung', NULL, NULL),
(43, 8, 26, 'Walton', 'walton', NULL, NULL),
(44, 8, 26, 'Singer', 'singer', NULL, NULL),
(45, 8, 26, 'Konka', 'konka', NULL, NULL),
(46, 8, 29, 'Vacuum Cleaner', 'vacuum cleaner', NULL, NULL),
(47, 8, 29, 'Steam Iron', 'steam iron', NULL, NULL),
(48, 8, 29, 'Water Purifier', 'water purifier', NULL, NULL),
(49, 8, 29, 'Floor Cleaner', 'floor cleaner', NULL, NULL),
(50, 8, 27, 'Samsung', 'samsung', NULL, NULL),
(51, 8, 27, 'Walton', 'walton', NULL, NULL),
(52, 8, 27, 'Singer', 'singer', NULL, NULL),
(53, 8, 27, 'Konka', 'konka', NULL, NULL),
(54, 8, 24, 'Walton', 'walton', NULL, NULL),
(55, 8, 24, 'Sony', 'sony', NULL, NULL),
(56, 8, 24, 'Motorola', 'motorola', NULL, NULL),
(57, 8, 24, 'Realme', 'realme', NULL, NULL),
(58, 8, 28, 'Singer', 'singer', NULL, NULL),
(59, 8, 28, 'Panasonic', 'panasonic', NULL, NULL),
(60, 8, 28, 'Whirlpool', 'whirlpool', NULL, NULL),
(61, 8, 28, 'Haier', 'haier', NULL, NULL),
(62, 6, 13, 'Mouse', 'mouse', NULL, NULL),
(63, 6, 13, 'Keyboard', 'keyboard', NULL, NULL),
(64, 6, 13, 'Gamepad', 'gamepad', NULL, NULL),
(65, 6, 13, 'Cooling pad', 'cooling pad', NULL, NULL),
(66, 6, 13, 'Triggers', 'triggers', NULL, NULL),
(67, 6, 13, 'Mousepad', 'mousepad', NULL, NULL),
(68, 6, 14, 'Asus', 'asus', NULL, NULL),
(69, 6, 14, 'Lenovo', 'lenovo', NULL, NULL),
(70, 6, 14, 'Dell', 'dell', NULL, NULL),
(71, 6, 14, 'Acer', 'acer', NULL, NULL),
(72, 6, 14, 'Samsung', 'samsung', NULL, NULL),
(73, 6, 14, 'Sony', 'sony', NULL, NULL),
(74, 6, 15, 'Routers', 'routers', NULL, NULL),
(75, 6, 15, 'Data Cards', 'data cards', NULL, NULL),
(76, 6, 15, 'Security Software', 'security software', NULL, NULL),
(77, 6, 15, 'Wireless USB Adapters', 'wireless usb adapters', NULL, NULL),
(78, 6, 15, 'Graphic Card', 'graphic card', NULL, NULL),
(79, 6, 16, 'Mobile Cables', 'mobile cables', NULL, NULL),
(80, 6, 16, 'Mobile Holders', 'mobile holders', NULL, NULL),
(81, 6, 16, 'Mobile Chargers', 'mobile chargers', NULL, NULL),
(82, 6, 16, 'Super Fast Chargers', 'super fast chargers', NULL, NULL),
(83, 6, 16, 'Selfie Sticks', 'selfie sticks', NULL, NULL),
(84, 6, 16, 'Mobile Phone lens', 'mobile phone lens', NULL, NULL),
(85, 6, 18, 'SWISS', 'swiss', NULL, NULL),
(86, 6, 18, 'Realme', 'realme', NULL, NULL),
(87, 6, 18, 'Xiaomi', 'xiaomi', NULL, NULL),
(88, 6, 18, 'Syska', 'syska', NULL, NULL),
(89, 6, 18, 'Promics', 'promics', NULL, NULL),
(90, 6, 18, 'Ambrane', 'ambrane', NULL, NULL),
(91, 6, 17, 'Realme pad', 'realme pad', NULL, NULL),
(92, 6, 17, 'Samsung pad', 'samsung pad', NULL, NULL),
(93, 6, 17, 'Lenovo pad', 'lenovo pad', NULL, NULL),
(94, 7, 23, 'Mattress', 'mattress', NULL, NULL),
(95, 7, 23, 'Study Table', 'study table', NULL, NULL),
(96, 7, 23, 'Computer Desk', 'computer desk', NULL, NULL),
(97, 7, 23, 'Shoe Rak', 'shoe rak', NULL, NULL),
(98, 7, 23, 'Coffee Table', 'coffee table', NULL, NULL),
(99, 7, 22, 'Dish Wash Bar', 'dish wash bar', NULL, NULL),
(100, 7, 22, 'Spin Mop', 'spin mop', NULL, NULL),
(101, 7, 22, 'Floor Cleaner', 'floor cleaner', NULL, NULL),
(102, 7, 22, 'Fragrance Blocks', 'fragrance blocks', NULL, NULL),
(103, 7, 22, 'Surface Cleaner', 'surface cleaner', NULL, NULL),
(104, 7, 21, 'Key Holder', 'key holder', NULL, NULL),
(105, 7, 21, 'Wallpaper', 'wallpaper', NULL, NULL),
(106, 7, 21, 'Wall Clock', 'wall clock', NULL, NULL),
(107, 7, 20, 'Grocery Container', 'grocery container', NULL, NULL),
(108, 7, 20, 'Pressure Cooker', 'pressure cooker', NULL, '2022-06-29 05:08:43'),
(109, 7, 20, 'Flask', 'flask', NULL, NULL),
(110, 7, 20, 'Gas Stove', 'gas stove', NULL, NULL),
(111, 7, 20, 'Tea Strainer', 'tea strainer', NULL, NULL),
(112, 7, 20, 'Fork', 'fork', NULL, NULL),
(113, 7, 20, 'Vegetable & Fruit Chopper', 'vegetable & fruit chopper', NULL, NULL),
(114, 7, 19, 'Sofa Bed', 'sofa bed', NULL, NULL),
(115, 7, 19, 'Living Bed', 'living bed', NULL, NULL),
(116, 7, 19, '4 Desk Wardrobe', '4 desk wardrobe', NULL, NULL),
(117, 7, 19, '3 Door Wardrobe', '3 door wardrobe', NULL, NULL),
(118, 7, 19, 'Wood Wardrobe', 'wood wardrobe', NULL, NULL),
(119, 7, 19, 'Steel Wardrobe', 'steel wardrobe', NULL, NULL),
(120, 7, 19, 'Double Sofa', 'double sofa', NULL, NULL),
(121, 8, 24, 'Huawei', 'huawei', NULL, NULL),
(122, 6, 15, 'Samsung', 'samsung', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user1@gmail.com', '01700000000', NULL, '$2y$10$.BNtkJfD3rRrF492tXdzmeYUjTJGd8S63kIx2VmSjtvdIGNV5XNLa', NULL, NULL, NULL, NULL, NULL, '202206091703images (1).jpg', '2022-06-01 12:15:45', '2022-06-09 11:03:37'),
(2, 'Leonardo DiCaprio', 'user2@gmail.com', '01700000000', NULL, '$2y$10$y0hpHQJSBppD40CNMSvX3.vxIIDywEyH66xwn7ilIbsX/zoW.pms6', NULL, NULL, NULL, 'dTRVHEqulgxZAzWIhoq3MatN0uHyBySDR04gn3kRwRRIibvigwM7KpCN7kiL', NULL, '202206071800images (1).jpg', '2022-06-06 12:48:01', '2022-06-07 12:03:56'),
(3, 'Ahmed', 'ahmed100@gmail.cpm', '01234567892', NULL, '$2y$10$dNzFMqp5O7GDo3mFUk5a/uPEakRQSG7r8bZSOTkWsE6BqaISt5CH6', NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-04 00:09:10', '2022-09-04 00:09:10');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `area_of_districts`
--
ALTER TABLE `area_of_districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area_of_shippings`
--
ALTER TABLE `area_of_shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cupons`
--
ALTER TABLE `cupons`
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
-- Indexes for table `multi_images`
--
ALTER TABLE `multi_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shipping_states`
--
ALTER TABLE `shipping_states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub__sub_categories`
--
ALTER TABLE `sub__sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `area_of_districts`
--
ALTER TABLE `area_of_districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `area_of_shippings`
--
ALTER TABLE `area_of_shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cupons`
--
ALTER TABLE `cupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `multi_images`
--
ALTER TABLE `multi_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shipping_states`
--
ALTER TABLE `shipping_states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `sub__sub_categories`
--
ALTER TABLE `sub__sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
