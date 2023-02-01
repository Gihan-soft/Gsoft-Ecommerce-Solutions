-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2023 at 07:30 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gsoftecommercesolutions`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hedding` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experiance` int(11) NOT NULL DEFAULT 3,
  `happy_customer` int(11) NOT NULL DEFAULT 500,
  `team_advisor` int(11) NOT NULL DEFAULT 200,
  `return_customer` int(11) NOT NULL DEFAULT 70,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `hedding`, `content`, `image`, `experiance`, `happy_customer`, `team_advisor`, `return_customer`, `created_at`, `updated_at`) VALUES
(1, 'Bigshop is elegant e-commerce HTML5 template. It\'s suitable for all e-commerce platform', 'hi', 'http://127.0.0.1:8000/storage/photos/1/fea_offer.jpg', 4, 500, 200, 70, NULL, '2023-01-05 07:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `full_name`, `email`, `email_verified_at`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Gihan Admin', 'admin@gmail.com', NULL, '$2y$10$1XVH/0bpiJYnUUbTIBjUn.9dXIUPTySZPyBh/JT6HI4qfPdxROBHq', 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `condition` enum('banner','promo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'banner',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `slug`, `description`, `photo`, `status`, `condition`, `created_at`, `updated_at`) VALUES
(1, 'watch', 'watch', '<p>watch</p>', '/storage/photos/1/7.jpg', 'active', 'banner', '2022-12-31 11:18:17', '2022-12-31 11:18:17'),
(2, 'shoe', 'shoe', '<p>shoe</p>', '/storage/photos/1/6.jpg', 'active', 'banner', '2022-12-31 11:19:01', '2023-01-03 05:52:48'),
(3, 'All KID\'S ITEMS', 'all-kids-items', '<p>30% OFF</p>', '/storage/photos/1/fea_offer.jpg', 'active', 'promo', '2023-01-03 05:54:47', '2023-01-03 05:54:47');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`, `slug`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Rolex', 'vito', '/storage/photos/1/5.jpg', 'active', '2023-01-01 00:25:22', '2023-01-03 06:03:43'),
(2, 'Nike', 'nike', '/storage/photos/1/4.jpg', 'active', '2023-01-01 06:05:45', '2023-01-03 06:01:57'),
(3, 'Addidas', 'addidas', '/storage/photos/1/3.jpg', 'active', '2023-01-03 06:03:24', '2023-01-03 06:03:24');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_parent` tinyint(1) NOT NULL DEFAULT 1,
  `summary` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `photo`, `is_parent`, `summary`, `status`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'watch', 'watch', '/storage/photos/1/best-3.png', 1, '<p>watch<br></p>', 'active', NULL, '2023-01-01 00:24:35', '2023-01-01 00:24:35'),
(2, 'shoe', 'shoe', '/storage/photos/1/top-5.png', 1, '<p>shoe</p>', 'active', NULL, '2023-01-01 06:04:38', '2023-01-01 06:04:38');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('fixed','percent') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fixed',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `value` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type`, `status`, `value`, `created_at`, `updated_at`) VALUES
(1, '9512', 'fixed', 'active', 200.00, '2023-01-01 00:32:25', '2023-01-01 00:32:25');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_02_105603_create_banners_table', 1),
(6, '2022_12_03_090801_create_categories_table', 1),
(7, '2022_12_04_150645_create_brands_table', 1),
(9, '2022_12_16_131650_create_coupons_table', 1),
(10, '2022_12_20_162244_create_orders_table', 1),
(11, '2022_12_21_032806_create_shippings_table', 1),
(12, '2022_12_29_055306_create_product_attributes_table', 1),
(13, '2022_12_29_164827_create_product_reviews_table', 1),
(14, '2022_12_31_140256_create_admins_table', 1),
(16, '2023_01_01_102711_create_product_orders_table', 2),
(19, '2023_01_01_162722_create_settings_table', 3),
(21, '2022_12_04_162811_create_products_table', 5),
(22, '2022_12_31_140548_create_sellers_table', 6),
(23, '2023_01_05_050108_create_about_us_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` double(8,2) NOT NULL DEFAULT 0.00,
  `total_amount` double(8,2) NOT NULL DEFAULT 0.00,
  `coupon` double(8,2) DEFAULT 0.00,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cod',
  `payment_status` enum('paid','unpaid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `condition` enum('pending','processing','delivered','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `delivery_charge` double(8,2) NOT NULL DEFAULT 0.00,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sfirst_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slast_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sphone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scountry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saddress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spostcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sstate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_number`, `sub_total`, `total_amount`, `coupon`, `payment_method`, `payment_status`, `condition`, `delivery_charge`, `quantity`, `first_name`, `last_name`, `email`, `phone`, `country`, `address`, `city`, `postcode`, `state`, `note`, `sfirst_name`, `slast_name`, `semail`, `sphone`, `scountry`, `saddress`, `scity`, `spostcode`, `sstate`, `created_at`, `updated_at`) VALUES
(4, 1, 'ORD-IXBHHV', 37716.22, 37816.22, 0.00, 'cod', 'paid', 'processing', 100.00, 0, 'Gihan', 'Customer', 'customer@gmail.com', '077985423', 'srilanka', '123', 'bandarawela', '3423', 'bwela', NULL, 'Gihan', 'Customer', 'customer@gmail.com', '077985423', 'srilanka', '123', 'bandarawela', '3423', 'bwela', '2023-01-01 06:27:32', '2023-01-01 08:45:29'),
(7, 1, 'ORD-K501CE', 184307.76, 184407.76, 0.00, 'cod', 'paid', 'delivered', 100.00, 0, 'Gihan', 'Amarasinghe', 'customer@gmail.com', '0779208187', 'Sri Lanka', 'Jayakirana, Kabilewela South', 'Bandarawela', '90100', NULL, NULL, 'Gihan', 'Amarasinghe', 'customer@gmail.com', '0779208187', 'Sri Lanka', 'Jayakirana, Kabilewela South', 'Bandarawela', '90100', NULL, '2023-01-03 06:30:02', '2023-01-30 06:21:56'),
(8, 1, 'ORD-NTUFUD', 92033.76, 92133.76, 0.00, 'cod', 'unpaid', 'pending', 100.00, 0, 'Gihan', 'Amarasinghe', 'customer@gmail.com', '0779208187', 'Sri Lanka', 'Jayakirana, Kabilewela South', 'Bandarawela', '90100', NULL, NULL, 'Gihan', 'Amarasinghe', 'customer@gmail.com', '0779208187', 'Sri Lanka', 'Jayakirana, Kabilewela South', 'Bandarawela', '90100', NULL, '2023-01-24 02:55:12', '2023-01-24 02:55:12'),
(9, 1, 'ORD-L9ATHT', 43850.88, 43950.88, 0.00, 'cod', 'unpaid', 'pending', 100.00, 0, 'Gihan', 'Amarasinghe', 'customer@gmail.com', '0779208187', 'Sri Lanka', 'Jayakirana, Kabilewela South', 'Bandarawela', '90100', NULL, NULL, 'Gihan', 'Amarasinghe', 'customer@gmail.com', '0779208187', 'Sri Lanka', 'Jayakirana, Kabilewela South', 'Bandarawela', '90100', NULL, '2023-01-25 05:32:59', '2023-01-25 05:32:59'),
(10, 1, 'ORD-QW4FBU', 43850.88, 43750.88, 200.00, 'cod', 'unpaid', 'pending', 100.00, 0, 'Gihan', 'Customer', 'customer@gmail.com', '077985423', 'Sri Lanka', '123', 'bandarawela', '3423', NULL, NULL, 'Gihan', 'Customer', 'customer@gmail.com', '077985423', 'Sri Lanka', '123', 'bandarawela', '3423', NULL, '2023-02-01 11:21:23', '2023-02-01 11:21:23');

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
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_cancellation` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size_guide` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) NOT NULL DEFAULT 0.00,
  `offer_price` double(8,2) NOT NULL DEFAULT 0.00,
  `discount` double(8,2) NOT NULL DEFAULT 0.00,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conditions` enum('new','popular','winter') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `added_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `child_cat_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `summary`, `description`, `additional_info`, `return_cancellation`, `stock`, `user_id`, `photo`, `size_guide`, `price`, `offer_price`, `discount`, `size`, `conditions`, `status`, `added_by`, `is_featured`, `created_at`, `updated_at`, `brand_id`, `cat_id`, `child_cat_id`) VALUES
(1, 'watch', 'watch', '<p>watch<br></p>', 'watch', 'watch', 'watch', 17, NULL, '/storage/photos/1/best-3.png', '/storage/photos/1/size/size-1.png', 12.00, 11.64, 3.00, 'S', 'new', 'active', NULL, NULL, '2023-01-02 03:57:03', '2023-01-30 06:21:56', 1, 1, NULL),
(2, 'shoe', 'shoe', '<p>shoe<br></p>', 'shoe', 'shoe', 'shoe', 34, NULL, '/storage/photos/1/top-5.png', '/storage/photos/1/size/size-1.png', 4560.00, 4332.00, 5.00, 'S', 'new', 'active', NULL, NULL, '2023-01-02 03:58:06', '2023-01-30 06:21:56', 2, 2, NULL),
(4, 'ex product me dr', '1672654269-ex-product', '<p>zz</p>', 'zzz', 'ccc', 'cccc', 10, 1, '/storage/photos/1/backpack.jpg', '/storage/photos/1/size/size-1.png', 2345.00, 2251.20, 4.00, 'S', 'new', 'active', 'seller', 1, '2023-01-02 04:41:09', '2023-01-30 06:21:56', 1, 1, NULL),
(5, 'hedset', 'hedset', '<p>hedset<br></p>', 'hedset', 'asd', 'asd1', 8, NULL, '/storage/photos/1/backpack.jpg,/storage/photos/1/best-4.png', '/storage/photos/1/size/size-1.png', 45678.00, 43850.88, 4.00, 'M', 'new', 'active', NULL, NULL, '2023-01-02 12:02:26', '2023-01-30 06:36:50', 2, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `original_price` double(8,2) NOT NULL DEFAULT 0.00,
  `offer_price` double(8,2) NOT NULL DEFAULT 0.00,
  `stock` int(11) NOT NULL DEFAULT 0,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `size`, `original_price`, `offer_price`, `stock`, `product_id`, `created_at`, `updated_at`) VALUES
(2, 'S', 123.00, 345.00, 20, 5, '2023-01-10 00:16:19', '2023-01-10 00:16:19'),
(3, 'M', 1234.00, 100.00, 9, 5, '2023-01-10 00:44:12', '2023-01-10 00:44:12');

-- --------------------------------------------------------

--
-- Table structure for table `product_orders`
--

CREATE TABLE `product_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_orders`
--

INSERT INTO `product_orders` (`id`, `quantity`, `product_id`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 6, NULL, NULL),
(2, 3, 2, 6, NULL, NULL),
(3, 4, 5, 7, NULL, NULL),
(4, 2, 4, 7, NULL, NULL),
(5, 1, 2, 7, NULL, NULL),
(6, 6, 1, 7, NULL, NULL),
(7, 2, 5, 8, NULL, NULL),
(8, 1, 2, 8, NULL, NULL),
(9, 1, 5, 9, NULL, NULL),
(10, 1, 5, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rate` tinyint(4) NOT NULL DEFAULT 0,
  `review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','accept','reject') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'accept',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `rate`, `review`, `reason`, `status`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 5, 'good', 'quality', 'accept', 1, 1, '2023-01-03 12:33:00', '2023-01-03 12:33:00'),
(2, 5, 'good', 'quality', 'accept', 1, 1, '2023-01-03 12:33:01', '2023-01-03 12:33:01'),
(3, 3, 'good', 'quality', 'accept', 1, 4, '2023-01-03 12:42:18', '2023-01-03 12:42:18'),
(4, 5, 'good', 'value', 'accept', 1, 5, '2023-01-24 02:56:42', '2023-01-24 02:56:42'),
(5, 4, 'good', 'price', 'accept', 1, 2, '2023-02-01 11:13:57', '2023-02-01 11:13:57');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `full_name`, `username`, `email`, `email_verified_at`, `password`, `address`, `photo`, `phone`, `is_verified`, `status`, `created_at`, `updated_at`) VALUES
(1, 'bimal seller', 'bimal', 'seller@gmail.com', NULL, '$2y$10$1XVH/0bpiJYnUUbTIBjUn.9dXIUPTySZPyBh/JT6HI4qfPdxROBHq', 'colombo', NULL, '087654323', 1, 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `meta_description`, `meta_keywords`, `logo`, `favicon`, `address`, `email`, `phone`, `fax`, `footer`, `facebook_url`, `twitter_url`, `linkedin_url`, `pinterest_url`, `created_at`, `updated_at`) VALUES
(1, 'Gsoft E-commerce Solutions', 'E-commerce web site', 'Gsoft, online shopping', 'frontend/img/core-img/logo.png', '/storage/photos/1/image1.jpg', 'Jayakirana', 'info@gsoft.com', '0779208187', '0779208187', 'Gsoft Ultimate Solutions', 'fb', NULL, NULL, NULL, NULL, '2023-01-01 14:33:38');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_charge` double(8,2) NOT NULL DEFAULT 0.00,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `shipping_address`, `delivery_time`, `delivery_charge`, `status`, `created_at`, `updated_at`) VALUES
(1, 'kandy', '12.00', 100.00, 'active', '2023-01-01 00:29:57', '2023-01-01 00:29:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` int(11) DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scountry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spostcode` int(11) DEFAULT NULL,
  `sstate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `email`, `email_verified_at`, `password`, `photo`, `phone`, `status`, `country`, `city`, `postcode`, `state`, `address`, `scountry`, `scity`, `spostcode`, `sstate`, `saddress`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Gihan Customer', 'Customer', 'customer@gmail.com', NULL, '$2y$10$1XVH/0bpiJYnUUbTIBjUn.9dXIUPTySZPyBh/JT6HI4qfPdxROBHq', '/storage/photos/1/avatar1.jpg', NULL, 'active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-31 01:21:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `banners_slug_unique` (`slug`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_number_unique` (`order_number`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sellers_email_unique` (`email`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
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
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_orders`
--
ALTER TABLE `product_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
