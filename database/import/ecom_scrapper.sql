-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.31 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table scrapper_pr.failed_jobs: 0 rows
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping data for table scrapper_pr.migrations: 4 rows
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2021_11_18_063000_create_node_settings_table', 2),
	(6, '2021_11_18_172029_create_item_infos_table', 3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping data for table scrapper_pr.node_settings: 2 rows
/*!40000 ALTER TABLE `node_settings` DISABLE KEYS */;
INSERT INTO `node_settings` (`id`, `node`, `domain`, `created_at`, `updated_at`) VALUES
	(1, 'h1.f3,div[data-testid="add-to-cart-price-atf"] span[itemprop="price"], div.mr3.ml7.self-center img', 'walmart.com', '2021-11-18 08:01:33', '2021-11-18 08:16:09'),
	(2, 'h1.EllipsisTextContainer-wz2pam-1, .PriceColumnContainer-sc-1wlo6zv-0 .PriceRowContainer-sc-1wlo6zv-1, ImageZoomWrap-l7fnku-6 _StyledImageZoomWrap-sc-18t1ejr-6 img', 'petco.com', '2021-11-18 08:22:49', '2021-11-18 18:29:12');
/*!40000 ALTER TABLE `node_settings` ENABLE KEYS */;

-- Dumping data for table scrapper_pr.password_resets: 0 rows
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping data for table scrapper_pr.users: 2 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Md. Abdullah Al Mamun1', 'admin@gmail.com', NULL, '$2y$10$sRSDEJxmjlRXM1bzxXxD8OOtKcz2cCYAd8L1d5EU7dhX1Sa/OCx8C', NULL, '2021-05-23 09:04:35', '2021-07-07 06:09:45'),
	(2, 'Another User', 'another@gmail.com', NULL, '$2y$10$qQX6B4c6oyykL23.G.l0DOZrcakV/gbSWlMyErDoHfWpfud7/UJGS', NULL, '2021-07-07 06:03:19', '2021-07-07 06:03:19');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
