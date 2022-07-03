-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2022 at 10:02 PM
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
(1, 'Admin', 'admin@gmail.com', '2022-06-01 12:36:47', '$2y$10$HbqB8chXRtpC5H7i4XzWXetEpD216cxk1063AcABgW8n9mAEkO/2K', '3fPeAanS4bAomFfndBKx8KaM65IzDvoUm8pcNmFONB7fbKUtPiYyMTfCplsb', NULL, '202206041841images.jpg', '2022-06-01 12:36:47', '2022-06-04 13:13:33');

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
(4, 'Apple 1', 'apple 1', 'upload/brand/1736348419934090.png', NULL, '2022-06-22 10:10:42'),
(7, 'Yellow', 'yellow', 'upload/brand/1737085071917014.png', NULL, NULL);

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
(5, 'Fashion', 'fashion', 'fa fa-female', NULL, NULL),
(6, 'Electronics', 'electronics', 'fa fa-camera', NULL, NULL),
(7, 'Home', 'home', 'fa fa-handshake-o', NULL, NULL),
(8, 'Appliances', 'appliances', 'fa fa-cart-arrow-down', NULL, NULL);

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
(14, '2022_06_28_174002_create_multi_images_table', 8);

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
(3, 2, 'upload/product/multiImage/1737085701285139.jpg', '2022-06-30 12:33:38', NULL),
(5, 2, 'upload/product/multiImage/1737085701424985.jpg', '2022-06-30 12:33:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 3, 6, 16, 81, 'Huawei SV', 'huawei sv', 'H-101', '10', 'chargers,adapter,cable', '5v,10v', 'black', '500', '400', 'Mobile  Mobile Chargers for Android Phones 2 USB Charger (2.4A 5V) Compatible for Smartphone', '<p><strong>The maximum power is 12W and the maximum current is 2.4 Amp. When two output ports are used at the same time, each output port reaches 1.2A on average after intelligent shunting, enables you to charge two devices simultaneously.</strong></p>', 'upload/product/thumbImage/1737362271952200.jpg', 1, NULL, 1, NULL, 1, '2022-07-03 11:13:35', '2022-07-03 13:49:37'),
(2, 7, 5, 8, 14, 'Men\'s Casual Shirt SKU', 'men\'s casual shirt sku', 'CLS2048S EIDA22', '10', 'shirt,casual,eidshirt', 'M,L,XL,XXL', 'Olive', '1700', NULL, 'Men\'s Premium Fine Cotton Formal Shirt Sky Blue', '<p><strong>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</strong></p>', 'upload/product/thumbImage/1737085701097722.jpg', 1, 1, NULL, NULL, 1, '2022-06-30 12:33:38', NULL);

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
('brDCPO7CsnZZjE1Qmxwo78TWv5ghtur3IS2KD0QP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiejZta3lKR3FjZGlMaW5kd2RIZWpMVUZYbFlFNnpOemZMRTZYSU8zOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0L2VkaXRwcm9kdWN0L3N3ZWV0YWxlcnQyLm1pbi5qcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE5OiJwYXNzd29yZF9oYXNoX2FkbWluIjtzOjYwOiIkMnkkMTAkSGJxQjhjaFhSdHBDNUg3aTRYeldYZXRFcEQyMTZjeGsxMDYzQWNBQmdXOG45bUFFa08vMksiO30=', 1656878478);

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
(120, 7, 19, 'Double Sofa', 'double sofa', NULL, NULL);

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
(2, 'Leonardo DiCaprio', 'user2@gmail.com', '01700000000', NULL, '$2y$10$y0hpHQJSBppD40CNMSvX3.vxIIDywEyH66xwn7ilIbsX/zoW.pms6', NULL, NULL, NULL, 'kJCoK6I44FAK8xM1PbRv7tQ2ZAZYUCJj3vj2LZ9eWLKlmQZQBbcxS30vE17a', NULL, '202206071800images (1).jpg', '2022-06-06 12:48:01', '2022-06-07 12:03:56');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `multi_images`
--
ALTER TABLE `multi_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `sub__sub_categories`
--
ALTER TABLE `sub__sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
