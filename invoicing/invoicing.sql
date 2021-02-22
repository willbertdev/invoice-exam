-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for invoicing
CREATE DATABASE IF NOT EXISTS `invoicing` /*!40100 DEFAULT CHARACTER SET armscii8 COLLATE armscii8_bin */;
USE `invoicing`;

-- Dumping structure for table invoicing.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) COLLATE armscii8_bin DEFAULT NULL,
  `email` varchar(225) COLLATE armscii8_bin DEFAULT NULL,
  `billing_address` text COLLATE armscii8_bin DEFAULT NULL,
  `password` varchar(225) COLLATE armscii8_bin DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin ROW_FORMAT=DYNAMIC;

-- Dumping data for table invoicing.customers: ~2 rows (approximately)
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`id`, `name`, `email`, `billing_address`, `password`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'john D', 'john.d@gmail.com', 'Stanley Jones\r\n795 Folsom Ave, Suite 600\r\nSan Francisco, CA 94107', '482c811da5d5b4bc6d497ffa98491e38', 1, '2021-02-21 18:13:48', NULL, NULL),
	(2, 'Aron B', 'aron.b@gmail.com', 'Stanley Jones\r\n795 Folsom Ave, Suite 600\r\nSan Francisco, CA 94107', '482c811da5d5b4bc6d497ffa98491e38', 1, '2021-02-21 18:15:18', NULL, NULL);
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Dumping structure for table invoicing.employees
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) COLLATE armscii8_bin DEFAULT NULL,
  `email` varchar(225) COLLATE armscii8_bin DEFAULT NULL,
  `password` varchar(225) COLLATE armscii8_bin DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table invoicing.employees: ~2 rows (approximately)
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` (`id`, `name`, `email`, `password`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Christine D', 'christine.d@gmail.com', '482c811da5d5b4bc6d497ffa98491e38', 1, '2021-02-21 18:17:08', NULL, NULL),
	(2, 'Raymond R', 'raymond.r@gmail.com', '482c811da5d5b4bc6d497ffa98491e38', 1, '2021-02-21 18:17:40', NULL, NULL);
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;

-- Dumping structure for table invoicing.invoice
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `note` text COLLATE armscii8_bin DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table invoicing.invoice: ~0 rows (approximately)
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` (`id`, `employee_id`, `customer_id`, `note`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 1, '0', 1, '2021-02-22 04:17:40', NULL, NULL),
	(2, 1, 1, 'test note', 1, '2020-02-22 04:17:40', NULL, NULL);
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;

-- Dumping structure for table invoicing.invoice_lines
CREATE TABLE IF NOT EXISTS `invoice_lines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price_total` double(10,2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table invoicing.invoice_lines: ~2 rows (approximately)
/*!40000 ALTER TABLE `invoice_lines` DISABLE KEYS */;
INSERT INTO `invoice_lines` (`id`, `invoice_id`, `product_id`, `qty`, `price_total`, `created_at`) VALUES
	(1, 1, 4, 2, 1499.50, '2021-02-22 04:17:40'),
	(2, 1, 5, 1, 149.75, '2021-02-22 04:17:40'),
	(3, 2, 5, 1, 149.75, '2020-02-22 04:17:40'),
	(4, 2, 4, 2, 1499.50, '2020-02-22 04:17:40');
/*!40000 ALTER TABLE `invoice_lines` ENABLE KEYS */;

-- Dumping structure for table invoicing.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` text COLLATE armscii8_bin DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table invoicing.products: ~5 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `product_name`, `price`, `quantity`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '36-pack AA Battery', 749.75, 8, 1, '2021-02-21 20:49:13', NULL, NULL),
	(2, 'Energizer A27 1-pack 12V Alkaline Battery', 94.75, 9, 1, '2021-02-21 20:49:40', NULL, NULL),
	(3, 'Firefly 3-Pack 11W LED Light Bulb', 319.75, 10, 1, '2021-02-21 20:50:03', NULL, NULL),
	(4, 'Omni 6-Gang Extension Cord WED-360', 749.75, 22, 1, '2021-02-21 20:50:20', NULL, NULL),
	(5, 'Omni WS 2pcs. 1-Way Switch with White Plate', 149.75, 5, 1, '2021-02-21 20:50:36', NULL, NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
