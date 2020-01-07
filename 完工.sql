-- --------------------------------------------------------
-- 主机:                           192.168.100.204
-- 服务器版本:                        5.7.26 - MySQL Community Server (GPL)
-- 服务器操作系统:                      Linux
-- HeidiSQL 版本:                  10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- 导出 renqi 的数据库结构
CREATE DATABASE IF NOT EXISTS `renqi` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin */;
USE `renqi`;

-- 导出  表 renqi.admin_menu 结构
CREATE TABLE IF NOT EXISTS `admin_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在导出表  renqi.admin_menu 的数据：~11 rows (大约)
DELETE FROM `admin_menu`;
/*!40000 ALTER TABLE `admin_menu` DISABLE KEYS */;
INSERT INTO `admin_menu` (`id`, `parent_id`, `order`, `title`, `icon`, `uri`, `permission`, `created_at`, `updated_at`) VALUES
	(2, 0, 6, '系统设置', 'fa-tasks', NULL, NULL, NULL, '2020-01-04 15:09:31'),
	(3, 2, 7, '后台用户管理', 'fa-users', 'auth/users', NULL, NULL, '2020-01-04 15:09:31'),
	(4, 2, 8, '角色', 'fa-user', 'auth/roles', NULL, NULL, '2020-01-04 15:09:31'),
	(5, 2, 9, '权限', 'fa-ban', 'auth/permissions', NULL, NULL, '2020-01-04 15:09:31'),
	(6, 2, 10, '菜单设置', 'fa-bars', 'auth/menu', NULL, NULL, '2020-01-04 15:09:31'),
	(7, 2, 11, '后台日志', 'fa-history', 'auth/logs', NULL, NULL, '2020-01-04 15:09:31'),
	(8, 0, 1, '商户管理', 'fa-user', '/users', NULL, '2019-12-30 17:36:33', '2020-01-07 10:17:25'),
	(9, 0, 2, '充值赠送设置', 'fa-money', '/products', NULL, '2019-12-30 17:38:40', '2020-01-07 10:17:25'),
	(10, 0, 3, '充值记录', 'fa-diamond', '/orders', NULL, '2020-01-02 00:26:37', '2020-01-07 10:17:25'),
	(11, 0, 4, '扣费明细', 'fa-calculator', '/rates', NULL, '2020-01-04 15:09:27', '2020-01-07 10:17:25'),
	(12, 0, 5, '任务管理', 'fa-tasks', '/tasks', NULL, '2020-01-07 10:17:21', '2020-01-07 10:17:25');
/*!40000 ALTER TABLE `admin_menu` ENABLE KEYS */;

-- 导出  表 renqi.admin_operation_log 结构
CREATE TABLE IF NOT EXISTS `admin_operation_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_operation_log_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在导出表  renqi.admin_operation_log 的数据：~0 rows (大约)
DELETE FROM `admin_operation_log`;
/*!40000 ALTER TABLE `admin_operation_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_operation_log` ENABLE KEYS */;

-- 导出  表 renqi.admin_permissions 结构
CREATE TABLE IF NOT EXISTS `admin_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `http_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `http_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_permissions_name_unique` (`name`),
  UNIQUE KEY `admin_permissions_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在导出表  renqi.admin_permissions 的数据：~5 rows (大约)
DELETE FROM `admin_permissions`;
/*!40000 ALTER TABLE `admin_permissions` DISABLE KEYS */;
INSERT INTO `admin_permissions` (`id`, `name`, `slug`, `http_method`, `http_path`, `created_at`, `updated_at`) VALUES
	(1, 'All permission', '*', '', '*', NULL, NULL),
	(2, 'Dashboard', 'dashboard', 'GET', '/', NULL, NULL),
	(3, 'Login', 'auth.login', '', '/auth/login\r\n/auth/logout', NULL, NULL),
	(4, 'User setting', 'auth.setting', 'GET,PUT', '/auth/setting', NULL, NULL),
	(5, 'Auth management', 'auth.management', '', '/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs', NULL, NULL);
/*!40000 ALTER TABLE `admin_permissions` ENABLE KEYS */;

-- 导出  表 renqi.admin_roles 结构
CREATE TABLE IF NOT EXISTS `admin_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_roles_name_unique` (`name`),
  UNIQUE KEY `admin_roles_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在导出表  renqi.admin_roles 的数据：~0 rows (大约)
DELETE FROM `admin_roles`;
/*!40000 ALTER TABLE `admin_roles` DISABLE KEYS */;
INSERT INTO `admin_roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
	(1, 'Administrator', 'administrator', '2019-12-30 13:44:58', '2019-12-30 13:44:58');
/*!40000 ALTER TABLE `admin_roles` ENABLE KEYS */;

-- 导出  表 renqi.admin_role_menu 结构
CREATE TABLE IF NOT EXISTS `admin_role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_menu_role_id_menu_id_index` (`role_id`,`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在导出表  renqi.admin_role_menu 的数据：~1 rows (大约)
DELETE FROM `admin_role_menu`;
/*!40000 ALTER TABLE `admin_role_menu` DISABLE KEYS */;
INSERT INTO `admin_role_menu` (`role_id`, `menu_id`, `created_at`, `updated_at`) VALUES
	(1, 2, NULL, NULL);
/*!40000 ALTER TABLE `admin_role_menu` ENABLE KEYS */;

-- 导出  表 renqi.admin_role_permissions 结构
CREATE TABLE IF NOT EXISTS `admin_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_permissions_role_id_permission_id_index` (`role_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在导出表  renqi.admin_role_permissions 的数据：~1 rows (大约)
DELETE FROM `admin_role_permissions`;
/*!40000 ALTER TABLE `admin_role_permissions` DISABLE KEYS */;
INSERT INTO `admin_role_permissions` (`role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
	(1, 1, NULL, NULL);
/*!40000 ALTER TABLE `admin_role_permissions` ENABLE KEYS */;

-- 导出  表 renqi.admin_role_users 结构
CREATE TABLE IF NOT EXISTS `admin_role_users` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_users_role_id_user_id_index` (`role_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在导出表  renqi.admin_role_users 的数据：~1 rows (大约)
DELETE FROM `admin_role_users`;
/*!40000 ALTER TABLE `admin_role_users` DISABLE KEYS */;
INSERT INTO `admin_role_users` (`role_id`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 1, NULL, NULL);
/*!40000 ALTER TABLE `admin_role_users` ENABLE KEYS */;

-- 导出  表 renqi.admin_users 结构
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在导出表  renqi.admin_users 的数据：~0 rows (大约)
DELETE FROM `admin_users`;
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` (`id`, `username`, `password`, `name`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '$2y$10$dWolqpUO0T/02KBSYydivO5wY.xLXeQ25tMuZh9AGHB9N8Ul6FoYm', 'Administrator', NULL, 'RwCTYRtRDAo8YRasD6z8IN2Owjlne3Ou8hzYqQFHdqAgXMALffKqtbQtXX2O', '2019-12-30 13:44:58', '2019-12-30 13:44:58');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;

-- 导出  表 renqi.admin_user_permissions 结构
CREATE TABLE IF NOT EXISTS `admin_user_permissions` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_user_permissions_user_id_permission_id_index` (`user_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在导出表  renqi.admin_user_permissions 的数据：~0 rows (大约)
DELETE FROM `admin_user_permissions`;
/*!40000 ALTER TABLE `admin_user_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_user_permissions` ENABLE KEYS */;

-- 导出  表 renqi.failed_jobs 结构
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在导出表  renqi.failed_jobs 的数据：~0 rows (大约)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- 导出  表 renqi.migrations 结构
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在导出表  renqi.migrations 的数据：~14 rows (大约)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(12, '2014_10_12_000000_create_users_table', 1),
	(13, '2014_10_12_100000_create_password_resets_table', 1),
	(14, '2019_08_19_000000_create_failed_jobs_table', 1),
	(15, '2019_12_24_094955_add_phone_qq_to_users_table', 1),
	(16, '2019_12_25_061646_create_users_price_info_table', 1),
	(17, '2019_12_27_112451_change_email_to_users_table', 1),
	(18, '2016_01_04_173148_create_admin_tables', 2),
	(19, '2019_12_29_222447_create_products_table', 2),
	(20, '2019_12_31_005640_create_orders_table', 3),
	(21, '2020_01_01_012239_add_payment_no_orders_table', 4),
	(23, '2020_01_01_023619_add_tokens_to_users_table', 5),
	(26, '2020_01_03_143310_create_tasks_table', 6),
	(27, '2020_01_03_154059_add_status_to_tasks_table', 7),
	(28, '2020_01_04_143031_create_rates_table', 8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- 导出  表 renqi.orders 结构
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `price` decimal(10,2) NOT NULL COMMENT '本次充值金额',
  `give_price` decimal(10,2) NOT NULL COMMENT '赠送金额',
  `total_amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'alipay' COMMENT '支付方式，默认支付宝',
  `payment_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending' COMMENT '订单状态',
  `paid_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_no_unique` (`no`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在导出表  renqi.orders 的数据：~0 rows (大约)
DELETE FROM `orders`;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- 导出  表 renqi.password_resets 结构
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在导出表  renqi.password_resets 的数据：~0 rows (大约)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- 导出  表 renqi.products 结构
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `interval_price` decimal(8,2) NOT NULL COMMENT '金额区间上限如0-50，填写50',
  `give_price` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '总送金额，如200-500元赠送10元，默认零',
  `base` bigint(20) unsigned NOT NULL DEFAULT '1' COMMENT '基础倍数。1默认1，',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_interval_price_index` (`interval_price`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在导出表  renqi.products 的数据：~7 rows (大约)
DELETE FROM `products`;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `interval_price`, `give_price`, `base`, `created_at`, `updated_at`) VALUES
	(1, 50.00, 0.00, 1, '2019-12-30 17:44:43', '2019-12-31 00:10:30'),
	(2, 200.00, 20.00, 1, '2019-12-30 18:09:31', '2019-12-30 18:09:31'),
	(3, 500.00, 100.00, 1, '2019-12-30 18:11:09', '2019-12-30 18:11:09'),
	(4, 1000.00, 200.00, 1, '2019-12-31 00:13:37', '2019-12-31 00:13:37'),
	(5, 2000.00, 600.00, 1, '2019-12-31 00:13:59', '2019-12-31 00:13:59'),
	(6, 5000.00, 1000.00, 1, '2019-12-31 00:14:17', '2019-12-31 00:14:17'),
	(7, 10000.00, 2500.00, 1, '2019-12-31 00:14:35', '2019-12-31 00:14:35');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- 导出  表 renqi.rates 结构
CREATE TABLE IF NOT EXISTS `rates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `plant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '平台名称',
  `type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '项目名称,',
  `price` bigint(20) unsigned NOT NULL COMMENT '价格',
  `VIPprie` bigint(20) unsigned NOT NULL COMMENT 'Vip的价格',
  `show_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '充值200每个任务的价格',
  `show_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '充值200每个任务的价格',
  `show_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '充值200每个任务的价格',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rates_plant_index` (`plant`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在导出表  renqi.rates 的数据：~6 rows (大约)
DELETE FROM `rates`;
/*!40000 ALTER TABLE `rates` DISABLE KEYS */;
INSERT INTO `rates` (`id`, `plant`, `type_name`, `price`, `VIPprie`, `show_1`, `show_2`, `show_3`, `created_at`, `updated_at`) VALUES
	(1, '拼多多任务', 'app流量', 40, 30, '0.364元/个', '0.25元/个', '0.24元/个', '2020-01-04 15:17:04', '2020-01-04 15:17:04'),
	(2, '淘宝任务', 'pc流量', 80, 65, '0.727元/个', '0.542元/个', '0.52元/个', '2020-01-04 17:28:30', '2020-01-04 17:28:30'),
	(3, '京东任务', 'app流量', 60, 40, '0.545元/个', '0.333元/个', '0.32元/个', '2020-01-04 17:29:40', '2020-01-04 17:29:40'),
	(4, '京东任务', '搜索收藏', 70, 50, '0.636元/个', '0.417元/个', '0.4元/个', '2020-01-06 17:59:02', '2020-01-06 17:59:02'),
	(5, '淘宝任务', 'app流量', 60, 40, '0.545元/个', '0.333元/个', '0.32元/个', '2020-01-06 18:05:31', '2020-01-06 18:05:31'),
	(6, '淘宝任务', '搜索收藏', 70, 50, '0.636元/个', '0.417元/个', '0.4元/个', '2020-01-06 18:14:45', '2020-01-06 18:14:45');
/*!40000 ALTER TABLE `rates` ENABLE KEYS */;

-- 导出  表 renqi.tasks 结构
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `plant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '平台名称',
  `task` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '任务类型，流量任务/收藏任务',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '任务类型，如APP流量,搜索收藏',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending' COMMENT '任务状态',
  `pro_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品链接',
  `pro_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品标题',
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '关键词，允许为空',
  `show` bigint(20) unsigned NOT NULL DEFAULT '1' COMMENT '展现比例默认1',
  `start_time` datetime NOT NULL COMMENT '任务开始时间',
  `custom_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '自定义要求1',
  `custom_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '自定义要求2',
  `custom_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '自定义要求3',
  `custom_4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '自定义要求4',
  `remark` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '任务备注',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tasks_plant_index` (`plant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在导出表  renqi.tasks 的数据：~0 rows (大约)
DELETE FROM `tasks`;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;

-- 导出  表 renqi.users 结构
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '用户手机，不能为空,唯一',
  `qq` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'QQ,可以为空',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户级别，默认0，0普通，1VIP，2xxx自行定义',
  `tokens` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '代币数量',
  `price` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '当前金额',
  `total_price` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '累计充值金额',
  `payment` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '累计消费金额',
  `tixian_price` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '累计提现金额',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_phone_unique` (`phone`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_price_index` (`price`),
  KEY `users_tokens_index` (`tokens`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在导出表  renqi.users 的数据：~1 rows (大约)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `phone`, `qq`, `email`, `email_verified_at`, `password`, `remember_token`, `level`, `tokens`, `price`, `total_price`, `payment`, `tixian_price`, `created_at`, `updated_at`) VALUES
	(3, 'Lee', '13113111311', NULL, NULL, NULL, '$2y$10$RRac2M8rG3Lr.Vh4ZuQiKO21C/tjBezD3moX2y4b/CtEoXU63/QA6', NULL, 0, 62060, 0.00, 1670.00, 0.00, 0.00, '2019-12-27 15:55:20', '2020-01-07 14:06:40');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- 导出  表 renqi.users_price_info 结构
CREATE TABLE IF NOT EXISTS `users_price_info` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` bigint(20) unsigned NOT NULL COMMENT '用户ID,外键，关联users_id,级联删除',
  `type` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '类型，1消费，2提现，0充值',
  `price` decimal(8,2) NOT NULL COMMENT '本次消费金额',
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '消费说明',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_price_info_users_id_foreign` (`users_id`),
  CONSTRAINT `users_price_info_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在导出表  renqi.users_price_info 的数据：~0 rows (大约)
DELETE FROM `users_price_info`;
/*!40000 ALTER TABLE `users_price_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_price_info` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
