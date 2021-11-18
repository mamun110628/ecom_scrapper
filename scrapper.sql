-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.19-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table pr_scrapper.api_post_logs
CREATE TABLE IF NOT EXISTS `api_post_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `post_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pr_scrapper.api_post_logs: 1 rows
/*!40000 ALTER TABLE `api_post_logs` DISABLE KEYS */;
INSERT INTO `api_post_logs` (`id`, `product_id`, `post_price`, `created_at`, `updated_at`) VALUES
	(1, 5626, 49000.00, '2021-06-16 19:02:48', '2021-06-16 19:02:48');
/*!40000 ALTER TABLE `api_post_logs` ENABLE KEYS */;

-- Dumping structure for table pr_scrapper.constituencies
CREATE TABLE IF NOT EXISTS `constituencies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `constituency_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `state_id` int(11) NOT NULL,
  `remarks` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pr_scrapper.constituencies: 0 rows
/*!40000 ALTER TABLE `constituencies` DISABLE KEYS */;
/*!40000 ALTER TABLE `constituencies` ENABLE KEYS */;

-- Dumping structure for table pr_scrapper.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pr_scrapper.failed_jobs: 0 rows
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table pr_scrapper.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pr_scrapper.migrations: 9 rows
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2021_05_20_052432_create_ward_infos_table', 1),
	(5, '2021_05_20_054347_create_constituencies_table', 1),
	(6, '2021_05_22_053827_create_scrapped_products_table', 1),
	(7, '2021_05_22_183010_create_product_prices_table', 1),
	(8, '2021_06_07_193607_create_operation_rows_table', 2),
	(9, '2021_06_16_184653_create_api_post_logs_table', 3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table pr_scrapper.operation_rows
CREATE TABLE IF NOT EXISTS `operation_rows` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `last_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pr_scrapper.operation_rows: 1 rows
/*!40000 ALTER TABLE `operation_rows` DISABLE KEYS */;
INSERT INTO `operation_rows` (`id`, `last_id`, `created_at`, `updated_at`) VALUES
	(1, 0, '2021-06-08 01:39:13', '2021-06-07 19:45:55');
/*!40000 ALTER TABLE `operation_rows` ENABLE KEYS */;

-- Dumping structure for table pr_scrapper.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pr_scrapper.password_resets: 0 rows
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table pr_scrapper.product_prices
CREATE TABLE IF NOT EXISTS `product_prices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `amazon_price` decimal(10,2) DEFAULT NULL,
  `flipcart_price` decimal(10,2) DEFAULT NULL,
  `futureforward_price` decimal(10,2) DEFAULT NULL,
  `reliancedigital_price` decimal(10,2) DEFAULT NULL,
  `imastudent_price` decimal(10,2) DEFAULT NULL,
  `mdcomputer_price` decimal(10,2) DEFAULT NULL,
  `nationalpc_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pr_scrapper.product_prices: 3 rows
/*!40000 ALTER TABLE `product_prices` DISABLE KEYS */;
INSERT INTO `product_prices` (`id`, `product_id`, `amazon_price`, `flipcart_price`, `futureforward_price`, `reliancedigital_price`, `imastudent_price`, `mdcomputer_price`, `nationalpc_price`, `created_at`, `updated_at`) VALUES
	(1, 1, 57990.00, 0.00, 56499.00, NULL, 49000.00, NULL, NULL, '2021-05-23 09:07:17', '2021-06-16 18:28:08'),
	(2, 3, NULL, 0.00, 0.00, 0.00, 0.00, 2049.00, 8500.00, '2021-05-24 14:33:33', '2021-06-17 18:50:30'),
	(3, 2, NULL, 0.00, 0.00, 0.00, NULL, NULL, NULL, '2021-06-01 19:54:23', '2021-06-11 12:07:30');
/*!40000 ALTER TABLE `product_prices` ENABLE KEYS */;

-- Dumping structure for table pr_scrapper.scrapped_products
CREATE TABLE IF NOT EXISTS `scrapped_products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `amazon_link` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `flipcart_link` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `futureforward_link` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `reliancedigital_link` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `imastudent_link` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `mdcomputer_link` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `nationalpc_link` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `productid` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pr_scrapper.scrapped_products: 2 rows
/*!40000 ALTER TABLE `scrapped_products` DISABLE KEYS */;
INSERT INTO `scrapped_products` (`id`, `product_name`, `amazon_link`, `flipcart_link`, `futureforward_link`, `reliancedigital_link`, `imastudent_link`, `mdcomputer_link`, `nationalpc_link`, `productid`, `category`, `created_at`, `updated_at`) VALUES
	(1, 'Canon EOS M50 Mark II Mirrorless Camera with 15-45mm Lens', 'https://www.amazon.in/Canon-Mark-EF-M-15-45mm-Black/dp/B08KSKV35C/', NULL, 'https://futureforward.in/canon-eos-m50-mark-ii-mirrorless-digital-camera-with-15-45mm-lens-black', 'http://test.com', 'http://test.com', NULL, NULL, '5626', 1, '2021-05-23 09:07:13', '2021-06-16 18:26:12'),
	(3, 'Canon EOS M50 Mark II Mirrorless Camera with 15-45mm Lens', 'https://www.amazon.in/Canon-Mark-EF-M-15-45mm-Black/dp/B08KSKV35C/', NULL, NULL, NULL, NULL, 'https://mdcomputers.in/ekwb-ek-cryofuel-solid-scarlet-red.html', 'https://nationalpc.in/routers/asus-rt-ax55', '50', 2, '2021-05-23 09:10:39', '2021-06-17 18:30:21');
/*!40000 ALTER TABLE `scrapped_products` ENABLE KEYS */;

-- Dumping structure for table pr_scrapper.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pr_scrapper.users: 1 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Md. Abdullah Al Mamun', 'admin@gmail.com', NULL, '$2y$10$sRSDEJxmjlRXM1bzxXxD8OOtKcz2cCYAd8L1d5EU7dhX1Sa/OCx8C', NULL, '2021-05-23 09:04:35', '2021-07-06 19:50:30');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table pr_scrapper.ward_infos
CREATE TABLE IF NOT EXISTS `ward_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ward_gp_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `constituency_id` int(11) NOT NULL,
  `remarks` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pr_scrapper.ward_infos: 0 rows
/*!40000 ALTER TABLE `ward_infos` DISABLE KEYS */;
/*!40000 ALTER TABLE `ward_infos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
