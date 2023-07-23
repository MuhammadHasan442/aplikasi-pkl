-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 5.7.33 - MySQL Community Server (GPL)
-- OS Server:                    Win64
-- HeidiSQL Versi:               11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Membuang struktur basisdata untuk data_perangkat
CREATE DATABASE IF NOT EXISTS `data_perangkat` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `data_perangkat`;

-- membuang struktur untuk table data_perangkat.access_point
CREATE TABLE IF NOT EXISTS `access_point` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sn` varchar(50) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `merk_ap` varchar(200) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `tipe` varchar(200) NOT NULL,
  `nama_ap` varchar(100) NOT NULL,
  `letak` varchar(100) NOT NULL,
  `tahun` varchar(5) NOT NULL DEFAULT '',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sn` (`sn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel data_perangkat.access_point: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `access_point` DISABLE KEYS */;
/*!40000 ALTER TABLE `access_point` ENABLE KEYS */;

-- membuang struktur untuk table data_perangkat.cctv_pemko
CREATE TABLE IF NOT EXISTS `cctv_pemko` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sn` varchar(50) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `merk_cctv` varchar(200) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `tipe` varchar(200) NOT NULL,
  `letak` varchar(100) NOT NULL,
  `tahun` varchar(5) NOT NULL DEFAULT '',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sn` (`sn`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel data_perangkat.cctv_pemko: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `cctv_pemko` DISABLE KEYS */;
INSERT INTO `cctv_pemko` (`id`, `sn`, `ip`, `merk_cctv`, `gambar`, `tipe`, `letak`, `tahun`, `updated_at`, `created_at`) VALUES
	(5, '11111', '1.1.1.1', 'Hikvision', 'foto/cctv-pemko/DuUfIprsOC4vE6cth9OXUKpXfk4LeafQOJeW1h2S.png', '10G', 'Gedung B', '2022', '2023-07-20 12:26:29', '2023-07-18 08:11:08');
/*!40000 ALTER TABLE `cctv_pemko` ENABLE KEYS */;

-- membuang struktur untuk table data_perangkat.cctv_publik
CREATE TABLE IF NOT EXISTS `cctv_publik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sn` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `merk_cctv` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `letak` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sn` (`sn`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='Table data CCTV Publik';

-- Membuang data untuk tabel data_perangkat.cctv_publik: ~3 rows (lebih kurang)
/*!40000 ALTER TABLE `cctv_publik` DISABLE KEYS */;
INSERT INTO `cctv_publik` (`id`, `sn`, `ip`, `merk_cctv`, `gambar`, `tipe`, `letak`, `tahun`, `updated_at`, `created_at`) VALUES
	(3, '9453', '10.10.10.7', 'Dahua', '', 'outdor', 'taman', '2017', '2023-07-12 12:08:36', '2023-07-12 12:08:36'),
	(4, '4654165', '103.178.83.250', 'Dahua', 'foto/cctv-publik/BcEpeGy2VjVQsNQ0jf5KkoXoPM2wH2RQisqUSZiI.jpg', 'outdor', 'siring', '2020', '2023-07-20 15:49:21', '2023-07-12 15:01:31');
/*!40000 ALTER TABLE `cctv_publik` ENABLE KEYS */;

-- membuang struktur untuk table data_perangkat.data_server
CREATE TABLE IF NOT EXISTS `data_server` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sn` varchar(50) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `merk_server` varchar(200) DEFAULT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  `jenis` varchar(200) DEFAULT NULL,
  `hardisk` varchar(100) DEFAULT NULL,
  `ram` varchar(100) DEFAULT NULL,
  `processor` varchar(200) DEFAULT NULL,
  `os` varchar(100) DEFAULT NULL,
  `tahun` varchar(5) DEFAULT NULL,
  `penggunaan` varchar(255) DEFAULT 'Tidak ada data',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sn` (`sn`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel data_perangkat.data_server: ~3 rows (lebih kurang)
/*!40000 ALTER TABLE `data_server` DISABLE KEYS */;
INSERT INTO `data_server` (`id`, `sn`, `ip`, `merk_server`, `gambar`, `jenis`, `hardisk`, `ram`, `processor`, `os`, `tahun`, `penggunaan`, `updated_at`, `created_at`) VALUES
	(7, 'SGH354VFC8', '103.178.83.87', 'Dell', 'null', 'Rak', '1000', '16 GB', '20 CORE ProLiant DL160 Gen10', 'Windows server 2008', '2017', 'proxmox, JDIH Pusat, Pentest Aplikasi', '2023-07-12 11:35:30', '2023-02-17 01:02:44'),
	(8, 'SGH739T6MA', '103.178.83.249', 'HP', 'null', 'Rak', '320', '16 GB', '12 CORE ProLiant DL380P Gen8', 'Debian 6 non GUI', '2017', 'Naga Bungas, Epuskesmas v1', '2023-07-12 11:37:45', '2023-07-12 11:37:45'),
	(9, 'SGH221VFC5', '103.178.83.250', 'Dell', 'null', 'Rak', '1000', '64 GB', '12 CORE ProLiant DL380P Gen8', 'Linux mint 18 GUI', '2016', 'Aplikasi Bakawan, Aset, Batarang PJU, Aksidisiring, esurat', '2023-07-12 11:43:05', '2023-07-12 11:43:05');
/*!40000 ALTER TABLE `data_server` ENABLE KEYS */;

-- membuang struktur untuk table data_perangkat.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel data_perangkat.failed_jobs: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- membuang struktur untuk table data_perangkat.merk
CREATE TABLE IF NOT EXISTS `merk` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT '-',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel data_perangkat.merk: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `merk` DISABLE KEYS */;
/*!40000 ALTER TABLE `merk` ENABLE KEYS */;

-- membuang struktur untuk table data_perangkat.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel data_perangkat.migrations: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- membuang struktur untuk table data_perangkat.nvr_cctv
CREATE TABLE IF NOT EXISTS `nvr_cctv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sn` varchar(50) NOT NULL,
  `merk_nvr` varchar(200) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `video_ch` varchar(50) NOT NULL DEFAULT '',
  `hardisk` varchar(50) NOT NULL,
  `penggunaan` varchar(200) NOT NULL,
  `tahun` varchar(5) NOT NULL DEFAULT '',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sn` (`sn`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel data_perangkat.nvr_cctv: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `nvr_cctv` DISABLE KEYS */;
INSERT INTO `nvr_cctv` (`id`, `sn`, `merk_nvr`, `gambar`, `video_ch`, `hardisk`, `penggunaan`, `tahun`, `updated_at`, `created_at`) VALUES
	(2, '124124', 'Hikvision', 'foto/nvr/z9MWPWrDS5JZ9uvtmYH1s8Q8whHToxjaHBO1lCt7.png', '10', '10TB', 'Sistem Remote', '2022', '2023-07-20 12:25:02', '2023-02-07 01:42:50');
/*!40000 ALTER TABLE `nvr_cctv` ENABLE KEYS */;

-- membuang struktur untuk table data_perangkat.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel data_perangkat.password_resets: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- membuang struktur untuk table data_perangkat.pemeliharaan
CREATE TABLE IF NOT EXISTS `pemeliharaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gambar` varchar(255) NOT NULL DEFAULT 'null',
  `nama_barang` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `harga` float NOT NULL DEFAULT '0',
  `total_harga` float NOT NULL DEFAULT '0',
  `ekatalog` float NOT NULL DEFAULT '0',
  `nego` float NOT NULL DEFAULT '0',
  `link` varchar(255) NOT NULL DEFAULT 'Tidak ada link',
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel data_perangkat.pemeliharaan: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `pemeliharaan` DISABLE KEYS */;
/*!40000 ALTER TABLE `pemeliharaan` ENABLE KEYS */;

-- membuang struktur untuk table data_perangkat.perangkat_jaringan
CREATE TABLE IF NOT EXISTS `perangkat_jaringan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sn` varchar(50) NOT NULL,
  `merk_perangkat` varchar(20) NOT NULL,
  `cpu` varchar(20) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `lan_port` varchar(50) NOT NULL DEFAULT '',
  `tahun` varchar(50) NOT NULL DEFAULT '',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sn` (`sn`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel data_perangkat.perangkat_jaringan: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `perangkat_jaringan` DISABLE KEYS */;
INSERT INTO `perangkat_jaringan` (`id`, `sn`, `merk_perangkat`, `cpu`, `ram`, `lan_port`, `tahun`, `updated_at`, `created_at`) VALUES
	(3, '12312', '2131', '12321', '1212', '123', '123', '2023-07-13 05:52:04', '2023-07-13 05:52:04');
/*!40000 ALTER TABLE `perangkat_jaringan` ENABLE KEYS */;

-- membuang struktur untuk table data_perangkat.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel data_perangkat.personal_access_tokens: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- membuang struktur untuk table data_perangkat.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `telp` varchar(50) NOT NULL DEFAULT '',
  `level` enum('admin','user') NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel data_perangkat.user: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `password`, `nama`, `telp`, `level`) VALUES
	(3, 'admin', '$2a$12$VROCmkwa2AJEPUNTwabPeOXtMkr3W8qIqqfVKslVSXIHus7QDkmqW', 'Admin', '088342', 'admin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- membuang struktur untuk table data_perangkat.wifi_publik
CREATE TABLE IF NOT EXISTS `wifi_publik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sn` varchar(255) DEFAULT NULL,
  `merk_wifi` varchar(255) DEFAULT NULL,
  `ssid` varchar(255) DEFAULT NULL,
  `letak` varchar(255) DEFAULT NULL,
  `tahun` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT 'null',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sn` (`sn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Data untuk Wifi Publik';

-- Membuang data untuk tabel data_perangkat.wifi_publik: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `wifi_publik` DISABLE KEYS */;
/*!40000 ALTER TABLE `wifi_publik` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
