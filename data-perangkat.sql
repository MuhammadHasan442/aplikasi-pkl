-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for data_perangkat
CREATE DATABASE IF NOT EXISTS `data_perangkat` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `data_perangkat`;

-- Dumping structure for table data_perangkat.access_point
CREATE TABLE IF NOT EXISTS `access_point` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sn` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ip` varchar(50) NOT NULL,
  `merk_ap` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipe` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_ap` varchar(100) NOT NULL,
  `letak` varchar(100) NOT NULL,
  `tahun` varchar(5) NOT NULL DEFAULT '',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sn` (`sn`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table data_perangkat.access_point: ~3 rows (approximately)
DELETE FROM `access_point`;
INSERT INTO `access_point` (`id`, `sn`, `ip`, `merk_ap`, `tipe`, `nama_ap`, `letak`, `tahun`, `updated_at`, `created_at`) VALUES
	(2, '11111', '3.3.3.3', 'BBBBBBBBBBB', 'AA', 'Dinas Kominfotik', 'Depan Balai Kota', '2022', '2023-02-08 00:08:39', '2023-02-07 17:06:41'),
	(3, '13123sad', '2.2.2.2', 'asdasd', 'swfw', 'ssffe', 'fwf', '2022', '2023-02-07 23:51:00', '2023-02-07 23:51:00'),
	(4, '124124', '1.1.1.1', 'asdasd', 'AA', 'ssffe', 'fwf', '2022', '2023-02-15 17:05:42', '2023-02-15 17:05:42');

-- Dumping structure for table data_perangkat.cctv_pemko
CREATE TABLE IF NOT EXISTS `cctv_pemko` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sn` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ip` varchar(50) NOT NULL,
  `merk_cctv` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `tipe` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `letak` varchar(100) NOT NULL,
  `tahun` varchar(5) NOT NULL DEFAULT '',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sn` (`sn`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table data_perangkat.cctv_pemko: ~0 rows (approximately)
DELETE FROM `cctv_pemko`;
INSERT INTO `cctv_pemko` (`id`, `sn`, `ip`, `merk_cctv`, `gambar`, `tipe`, `letak`, `tahun`, `updated_at`, `created_at`) VALUES
	(5, '11111', '1.1.1.1', 'Hikvision', 'foto/cctv-pemko/tqqHCCy3fLlDfS6f80wr0wcG4hfmBOj5vhAiHBSQ.jpg', '10G', 'Gedung B', '2022', '2023-07-18 00:11:08', '2023-07-18 00:11:08');

-- Dumping structure for table data_perangkat.cctv_publik
CREATE TABLE IF NOT EXISTS `cctv_publik` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sn` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ip` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `merk_cctv` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tipe` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `letak` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tahun` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sn` (`sn`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='Table data CCTV Publik';

-- Dumping data for table data_perangkat.cctv_publik: ~3 rows (approximately)
DELETE FROM `cctv_publik`;
INSERT INTO `cctv_publik` (`id`, `sn`, `ip`, `merk_cctv`, `tipe`, `letak`, `tahun`, `updated_at`, `created_at`) VALUES
	(2, 'asdqwd3', '12.1.1.2', 'asfif', 'aaaaa', 'bbbbb', '2023', '2023-07-05 20:09:44', '2023-07-05 20:09:44'),
	(3, '9453', '10.10.10.7', 'Dahua', 'outdor', 'taman', '2017', '2023-07-12 04:08:36', '2023-07-12 04:08:36'),
	(4, '4654165', '103.178.83.250', 'Dahua', 'outdor', 'siring', '2020', '2023-07-12 07:01:31', '2023-07-12 07:01:31');

-- Dumping structure for table data_perangkat.data_server
CREATE TABLE IF NOT EXISTS `data_server` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sn` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ip` varchar(50) NOT NULL,
  `merk_server` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jenis` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hardisk` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ram` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `processor` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `os` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tahun` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `penggunaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'Tidak ada data',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sn` (`sn`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table data_perangkat.data_server: ~2 rows (approximately)
DELETE FROM `data_server`;
INSERT INTO `data_server` (`id`, `sn`, `ip`, `merk_server`, `jenis`, `hardisk`, `ram`, `processor`, `os`, `tahun`, `penggunaan`, `updated_at`, `created_at`) VALUES
	(7, 'SGH354VFC8', '103.178.83.87', 'Dell', 'Rak', '1000', '16 GB', '20 CORE ProLiant DL160 Gen10', 'Windows server 2008', '2017', 'proxmox, JDIH Pusat, Pentest Aplikasi', '2023-07-12 03:35:30', '2023-02-16 17:02:44'),
	(8, 'SGH739T6MA', '103.178.83.249', 'HP', 'Rak', '320', '16 GB', '12 CORE ProLiant DL380P Gen8', 'Debian 6 non GUI', '2017', 'Naga Bungas, Epuskesmas v1', '2023-07-12 03:37:45', '2023-07-12 03:37:45'),
	(9, 'SGH221VFC5', '103.178.83.250', 'Dell', 'Rak', '1000', '64 GB', '12 CORE ProLiant DL380P Gen8', 'Linux mint 18 GUI', '2016', 'Aplikasi Bakawan, Aset, Batarang PJU, Aksidisiring, esurat', '2023-07-12 03:43:05', '2023-07-12 03:43:05');

-- Dumping structure for table data_perangkat.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table data_perangkat.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;

-- Dumping structure for table data_perangkat.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table data_perangkat.migrations: ~0 rows (approximately)
DELETE FROM `migrations`;

-- Dumping structure for table data_perangkat.nvr_cctv
CREATE TABLE IF NOT EXISTS `nvr_cctv` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sn` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `merk_nvr` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `video_ch` varchar(50) NOT NULL DEFAULT '',
  `hardisk` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `penggunaan` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tahun` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sn` (`sn`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table data_perangkat.nvr_cctv: ~0 rows (approximately)
DELETE FROM `nvr_cctv`;
INSERT INTO `nvr_cctv` (`id`, `sn`, `merk_nvr`, `gambar`, `video_ch`, `hardisk`, `penggunaan`, `tahun`, `updated_at`, `created_at`) VALUES
	(2, '124124', 'Hikvision', 'foto/nvr/vfQ2T0XhipvFeGH8pcVjFQsvWBi3kdEZbibOCiDu.jpg', '10', '10TB', 'Sistem Remote', '2022', '2023-07-17 23:58:53', '2023-02-06 17:42:50');

-- Dumping structure for table data_perangkat.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table data_perangkat.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;

-- Dumping structure for table data_perangkat.perangkat_jaringan
CREATE TABLE IF NOT EXISTS `perangkat_jaringan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sn` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `merk_perangkat` varchar(20) NOT NULL,
  `cpu` varchar(20) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `lan_port` varchar(50) NOT NULL DEFAULT '',
  `tahun` varchar(50) NOT NULL DEFAULT '',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sn` (`sn`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table data_perangkat.perangkat_jaringan: ~0 rows (approximately)
DELETE FROM `perangkat_jaringan`;
INSERT INTO `perangkat_jaringan` (`id`, `sn`, `merk_perangkat`, `cpu`, `ram`, `lan_port`, `tahun`, `updated_at`, `created_at`) VALUES
	(3, '12312', '2131', '12321', '1212', '123', '123', '2023-07-12 21:52:04', '2023-07-12 21:52:04');

-- Dumping structure for table data_perangkat.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table data_perangkat.personal_access_tokens: ~0 rows (approximately)
DELETE FROM `personal_access_tokens`;

-- Dumping structure for table data_perangkat.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(30) NOT NULL,
  `telp` varchar(50) NOT NULL DEFAULT '',
  `level` enum('admin','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table data_perangkat.user: ~0 rows (approximately)
DELETE FROM `user`;
INSERT INTO `user` (`id`, `username`, `password`, `nama`, `telp`, `level`) VALUES
	(3, 'admin', '$2a$12$VROCmkwa2AJEPUNTwabPeOXtMkr3W8qIqqfVKslVSXIHus7QDkmqW', 'Admin', '088342', 'admin');

-- Dumping structure for table data_perangkat.wifi_publik
CREATE TABLE IF NOT EXISTS `wifi_publik` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sn` varchar(255) DEFAULT NULL,
  `merk_wifi` varchar(255) DEFAULT NULL,
  `ssid` varchar(255) DEFAULT NULL,
  `letak` varchar(255) DEFAULT NULL,
  `tahun` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sn` (`sn`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Data untuk Wifi Publik';

-- Dumping data for table data_perangkat.wifi_publik: ~0 rows (approximately)
DELETE FROM `wifi_publik`;
INSERT INTO `wifi_publik` (`id`, `sn`, `merk_wifi`, `ssid`, `letak`, `tahun`, `updated_at`, `created_at`) VALUES
	(3, '541613', 'Ruijie', 'wifi gratis', 'siring 0 km', '2020', '2023-07-12 04:15:33', '2023-07-12 04:15:33');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
