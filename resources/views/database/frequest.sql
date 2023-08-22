/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : 127.0.0.1:3306
 Source Schema         : frequest

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 26/07/2023 15:52:39
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bank
-- ----------------------------
DROP TABLE IF EXISTS `bank`;
CREATE TABLE `bank`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_bank` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bank
-- ----------------------------
INSERT INTO `bank` VALUES (1, 'BANK RAKYAT INDONESIA', NULL, NULL);
INSERT INTO `bank` VALUES (2, 'BANK MANDIRI', NULL, NULL);
INSERT INTO `bank` VALUES (3, 'BANK NEGARA INDONESIA', NULL, NULL);
INSERT INTO `bank` VALUES (4, 'BANK TABUNGAN NEGARA', NULL, NULL);
INSERT INTO `bank` VALUES (5, 'BANK DANAMON INDONESIA', NULL, NULL);
INSERT INTO `bank` VALUES (6, 'BANK PERMATA', NULL, NULL);
INSERT INTO `bank` VALUES (7, 'BANK CENTRAL ASIA', NULL, NULL);
INSERT INTO `bank` VALUES (8, 'BANK MAYBANK INDONESIA', NULL, NULL);
INSERT INTO `bank` VALUES (9, 'BANK CIMB NIAGA', NULL, NULL);
INSERT INTO `bank` VALUES (10, 'BANK UOB INDONESIA', NULL, NULL);
INSERT INTO `bank` VALUES (11, 'BANK OCBC NISP', NULL, NULL);
INSERT INTO `bank` VALUES (12, 'BANK MAYAPADA INTERNATIONAL', NULL, NULL);
INSERT INTO `bank` VALUES (13, 'BANK MEGA', NULL, NULL);
INSERT INTO `bank` VALUES (14, 'BANK KEB HANA INDONESIA', NULL, NULL);
INSERT INTO `bank` VALUES (15, 'BANK JAGO', NULL, NULL);
INSERT INTO `bank` VALUES (16, 'BANK SYARIAH INDONESIA', NULL, NULL);
INSERT INTO `bank` VALUES (17, 'BANK BCA SYARIAH', NULL, NULL);
INSERT INTO `bank` VALUES (18, 'BANK MEGA SYARIAH', NULL, NULL);

-- ----------------------------
-- Table structure for departement
-- ----------------------------
DROP TABLE IF EXISTS `departement`;
CREATE TABLE `departement`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_departement` enum('TDP-Marketing','TDP-Admin','TDP-Operation','TDP-General Affair','TDP-Finance','TDP-LSP','TDP-HR','TDP-Business Development','MK3-Admin','MK3-Operation','MK3-General','TTI-Admin','TTI-Marketing','TTI-Project','TTI-General','TKKI-Admin','TKKI-Marketing','TKKI-General','TKKI-Project','TIDP-Project','TIDP-General','TK2I-Project','TK2I-General') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of departement
-- ----------------------------
INSERT INTO `departement` VALUES (1, 'TDP-Marketing', NULL, NULL);
INSERT INTO `departement` VALUES (2, 'TDP-Admin', NULL, NULL);
INSERT INTO `departement` VALUES (3, 'TDP-Operation', NULL, NULL);
INSERT INTO `departement` VALUES (4, 'TDP-General Affair', NULL, NULL);
INSERT INTO `departement` VALUES (5, 'TDP-Finance', NULL, NULL);
INSERT INTO `departement` VALUES (6, 'TDP-LSP', NULL, NULL);
INSERT INTO `departement` VALUES (7, 'TDP-HR', NULL, NULL);
INSERT INTO `departement` VALUES (8, 'TDP-Business Development', NULL, NULL);
INSERT INTO `departement` VALUES (9, 'MK3-Admin', NULL, NULL);
INSERT INTO `departement` VALUES (10, 'MK3-Operation', NULL, NULL);
INSERT INTO `departement` VALUES (11, 'MK3-General', NULL, NULL);
INSERT INTO `departement` VALUES (12, 'TTI-Admin', NULL, NULL);
INSERT INTO `departement` VALUES (13, 'TTI-Marketing', NULL, NULL);
INSERT INTO `departement` VALUES (14, 'TTI-Project', NULL, NULL);
INSERT INTO `departement` VALUES (15, 'TTI-General', NULL, NULL);
INSERT INTO `departement` VALUES (16, 'TKKI-Admin', NULL, NULL);
INSERT INTO `departement` VALUES (17, 'TKKI-Marketing', NULL, NULL);
INSERT INTO `departement` VALUES (18, 'TKKI-General', NULL, NULL);
INSERT INTO `departement` VALUES (19, 'TKKI-Project', NULL, NULL);
INSERT INTO `departement` VALUES (20, 'TIDP-Project', NULL, NULL);
INSERT INTO `departement` VALUES (21, 'TIDP-General', NULL, NULL);
INSERT INTO `departement` VALUES (22, 'TK2I-Project', NULL, NULL);
INSERT INTO `departement` VALUES (23, 'TK2I-General', NULL, NULL);

-- ----------------------------
-- Table structure for form
-- ----------------------------
DROP TABLE IF EXISTS `form`;
CREATE TABLE `form`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `from_id` bigint UNSIGNED NULL DEFAULT NULL,
  `departement_id` bigint UNSIGNED NULL DEFAULT NULL,
  `norek_id` bigint UNSIGNED NULL DEFAULT NULL,
  `rujukan_id` bigint UNSIGNED NULL DEFAULT NULL,
  `kpengajuan_id` bigint UNSIGNED NULL DEFAULT NULL,
  `keperluan_id` bigint UNSIGNED NULL DEFAULT NULL,
  `tanggal_kebutuhan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description5` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description6` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description7` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description8` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `unit3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `unit4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `unit5` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `unit6` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `unit7` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `unit8` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `qty` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `qty3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `qty4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `qty5` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `qty6` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `qty7` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `qty8` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `price3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `price4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `price5` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `price6` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `price7` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `price8` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `total` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `total3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `total4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `total5` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `total6` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `total7` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `total8` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jumlah_total` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `checked_by` bigint UNSIGNED NULL DEFAULT NULL,
  `checked_date` date NULL DEFAULT NULL,
  `approve_by` bigint UNSIGNED NULL DEFAULT NULL,
  `approve_date` date NULL DEFAULT NULL,
  `jumlah_dana` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tgl_terima_dana` date NULL DEFAULT NULL,
  `jumlah_pemakaian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tgl_pengembalian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `balance` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tgl_pembayaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `form_from_id_foreign`(`from_id` ASC) USING BTREE,
  INDEX `form_departement_id_foreign`(`departement_id` ASC) USING BTREE,
  INDEX `form_norek_id_foreign`(`norek_id` ASC) USING BTREE,
  INDEX `form_rujukan_id_foreign`(`rujukan_id` ASC) USING BTREE,
  INDEX `form_kpengajuan_id_foreign`(`kpengajuan_id` ASC) USING BTREE,
  INDEX `form_keperluan_id_foreign`(`keperluan_id` ASC) USING BTREE,
  INDEX `form_checked_by_foreign`(`checked_by` ASC) USING BTREE,
  INDEX `form_approve_by_foreign`(`approve_by` ASC) USING BTREE,
  CONSTRAINT `form_approve_by_foreign` FOREIGN KEY (`approve_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `form_checked_by_foreign` FOREIGN KEY (`checked_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `form_departement_id_foreign` FOREIGN KEY (`departement_id`) REFERENCES `departement` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `form_from_id_foreign` FOREIGN KEY (`from_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `form_keperluan_id_foreign` FOREIGN KEY (`keperluan_id`) REFERENCES `keperluan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `form_kpengajuan_id_foreign` FOREIGN KEY (`kpengajuan_id`) REFERENCES `kpengajuan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `form_norek_id_foreign` FOREIGN KEY (`norek_id`) REFERENCES `norek` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `form_rujukan_id_foreign` FOREIGN KEY (`rujukan_id`) REFERENCES `rujukan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of form
-- ----------------------------
INSERT INTO `form` VALUES (2, 1, 12, 5, 1, 1, 2, '2023-07-28', 'Transfer', 'laptop', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'unit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2000000', '0', '0', '0', '0', '0', '0', '0', '2000000', '6', 9, '2023-07-26', NULL, NULL, '3000000', '2023-07-26', '2500000', NULL, '500000', '23-07-26', '2023-07-26 03:03:01', '2023-07-26 05:21:35');
INSERT INTO `form` VALUES (4, 3, 12, 6, 1, 1, 7, '2023-07-29', 'Transfer', 'laptopp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'unit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4000000', '0', '0', '0', '0', '0', '0', '0', '4000000', '6', 9, '2023-07-26', NULL, NULL, '5000000', '2023-07-26', '4100000', NULL, '900000', '23-07-26', '2023-07-26 06:26:12', '2023-07-26 06:53:32');
INSERT INTO `form` VALUES (6, 5, 13, NULL, 1, 1, 2, '2023-07-31', 'Transfer', 'laptop', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'unit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2000000', '0', '0', '0', '0', '0', '0', '0', '2000000', '6', 9, '2023-07-26', NULL, NULL, '2200000', '2023-07-26', '2100000', NULL, '100000', '23-07-26', '2023-07-26 07:40:29', '2023-07-26 08:29:27');

-- ----------------------------
-- Table structure for jabatan
-- ----------------------------
DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE `jabatan`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `jabatan` enum('General','Cashier','Supervisor','Finance','Manager','Direktor') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jabatan
-- ----------------------------
INSERT INTO `jabatan` VALUES (1, 'General', NULL, NULL);
INSERT INTO `jabatan` VALUES (2, 'Supervisor', NULL, NULL);
INSERT INTO `jabatan` VALUES (3, 'Manager', NULL, NULL);
INSERT INTO `jabatan` VALUES (4, 'Finance', NULL, NULL);
INSERT INTO `jabatan` VALUES (5, 'Cashier', NULL, NULL);
INSERT INTO `jabatan` VALUES (6, 'Direktor', NULL, NULL);

-- ----------------------------
-- Table structure for keperluan
-- ----------------------------
DROP TABLE IF EXISTS `keperluan`;
CREATE TABLE `keperluan`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of keperluan
-- ----------------------------
INSERT INTO `keperluan` VALUES (1, 'Training', '2023-07-25 14:58:04', '2023-07-25 14:58:04');
INSERT INTO `keperluan` VALUES (2, 'Operational', '2023-07-25 14:58:15', '2023-07-25 14:58:15');
INSERT INTO `keperluan` VALUES (3, 'Atk', '2023-07-25 14:58:44', '2023-07-25 14:58:44');
INSERT INTO `keperluan` VALUES (4, 'Baverage', '2023-07-25 14:58:52', '2023-07-25 14:58:52');
INSERT INTO `keperluan` VALUES (5, 'asset', '2023-07-25 14:59:01', '2023-07-25 14:59:01');
INSERT INTO `keperluan` VALUES (6, 'Administrasi', '2023-07-25 14:59:09', '2023-07-25 14:59:09');
INSERT INTO `keperluan` VALUES (7, 'Marketing & promotion', '2023-07-25 14:59:28', '2023-07-25 14:59:28');
INSERT INTO `keperluan` VALUES (8, 'Sertifikat', '2023-07-25 14:59:36', '2023-07-25 14:59:36');
INSERT INTO `keperluan` VALUES (9, 'transportasi', '2023-07-25 14:59:43', '2023-07-25 14:59:43');
INSERT INTO `keperluan` VALUES (10, 'percetakan', '2023-07-25 14:59:50', '2023-07-25 14:59:50');
INSERT INTO `keperluan` VALUES (11, 'Personal', '2023-07-25 14:59:59', '2023-07-25 14:59:59');
INSERT INTO `keperluan` VALUES (12, 'Telefon & Internet', '2023-07-25 15:00:07', '2023-07-25 15:00:07');
INSERT INTO `keperluan` VALUES (13, 'Listrik', '2023-07-25 15:00:15', '2023-07-25 15:00:15');
INSERT INTO `keperluan` VALUES (14, 'sewa', '2023-07-25 15:00:22', '2023-07-25 15:00:22');
INSERT INTO `keperluan` VALUES (15, 'lain-lain', '2023-07-25 15:00:30', '2023-07-25 15:00:30');

-- ----------------------------
-- Table structure for kpengajuan
-- ----------------------------
DROP TABLE IF EXISTS `kpengajuan`;
CREATE TABLE `kpengajuan`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kpengajuan
-- ----------------------------
INSERT INTO `kpengajuan` VALUES (1, 'Advance', '2023-07-25 15:01:32', '2023-07-25 15:01:32');
INSERT INTO `kpengajuan` VALUES (2, 'Reimburse', '2023-07-25 15:01:44', '2023-07-25 15:01:44');
INSERT INTO `kpengajuan` VALUES (3, 'Payment', '2023-07-25 15:01:52', '2023-07-25 15:01:52');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (2, '2020_12_17_055226_create_roles_table', 1);
INSERT INTO `migrations` VALUES (3, '2020_12_17_055308_create_permissions_table', 1);
INSERT INTO `migrations` VALUES (4, '2020_12_17_060416_create_role_permissions_pivot_table', 1);
INSERT INTO `migrations` VALUES (5, '2023_07_04_094419_create_jabatan_table', 1);
INSERT INTO `migrations` VALUES (6, '2023_07_05_044030_create_departement_table', 1);
INSERT INTO `migrations` VALUES (7, '2023_07_06_064426_create_bank_table', 1);
INSERT INTO `migrations` VALUES (8, '2023_07_20_022742_create_product_table', 1);
INSERT INTO `migrations` VALUES (9, '2023_07_23_092357_create_users_table', 1);
INSERT INTO `migrations` VALUES (10, '2023_07_23_092359_create_norek_table', 1);
INSERT INTO `migrations` VALUES (11, '2023_07_23_093046_add_relationship_fields_to_users_table', 1);
INSERT INTO `migrations` VALUES (12, '2023_07_25_041703_create_keperluan_table', 1);
INSERT INTO `migrations` VALUES (13, '2023_07_25_043642_create_kpengajuan_table', 1);
INSERT INTO `migrations` VALUES (14, '2023_07_25_082927_create_rujukan_table', 1);
INSERT INTO `migrations` VALUES (15, '2023_07_25_082929_create_form_table', 1);

-- ----------------------------
-- Table structure for norek
-- ----------------------------
DROP TABLE IF EXISTS `norek`;
CREATE TABLE `norek`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `bank_id` bigint UNSIGNED NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED NULL DEFAULT NULL,
  `no_rekening` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_penerima` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `norek_bank_id_foreign`(`bank_id` ASC) USING BTREE,
  INDEX `norek_user_id_foreign`(`user_id` ASC) USING BTREE,
  CONSTRAINT `norek_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `bank` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `norek_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of norek
-- ----------------------------
INSERT INTO `norek` VALUES (5, 9, 4, '0943244780012', 'Bayu', '2023-07-25 15:56:28', '2023-07-25 15:57:44');
INSERT INTO `norek` VALUES (6, 6, 3, '0943244780000', 'Muhamad Kosasih', '2023-07-26 02:59:18', '2023-07-26 02:59:18');
INSERT INTO `norek` VALUES (7, 7, 5, '09432447800112', 'Fadillah', '2023-07-26 07:38:41', '2023-07-26 07:38:41');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 53 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'dashboard.index', '2023-07-23 04:14:40', '2023-07-23 04:14:40');
INSERT INTO `permissions` VALUES (2, 'users.index', '2023-07-23 04:14:40', '2023-07-23 04:14:40');
INSERT INTO `permissions` VALUES (3, 'users.edit', '2023-07-23 04:14:40', '2023-07-23 04:14:40');
INSERT INTO `permissions` VALUES (4, 'users.delete', '2023-07-23 04:14:40', '2023-07-23 04:14:40');
INSERT INTO `permissions` VALUES (5, 'users.create', '2023-07-23 04:14:40', '2023-07-23 04:14:40');
INSERT INTO `permissions` VALUES (6, 'users.show', '2023-07-23 04:14:40', '2023-07-23 04:14:40');
INSERT INTO `permissions` VALUES (7, 'roles.index', '2023-07-23 04:14:40', '2023-07-23 04:14:40');
INSERT INTO `permissions` VALUES (8, 'roles.edit', '2023-07-23 04:14:40', '2023-07-23 04:14:40');
INSERT INTO `permissions` VALUES (9, 'roles.delete', '2023-07-23 04:14:40', '2023-07-23 04:14:40');
INSERT INTO `permissions` VALUES (10, 'roles.create', '2023-07-23 04:14:40', '2023-07-23 04:14:40');
INSERT INTO `permissions` VALUES (11, 'roles.show', '2023-07-23 04:14:40', '2023-07-23 04:14:40');
INSERT INTO `permissions` VALUES (12, 'permissions.index', '2023-07-23 04:14:40', '2023-07-23 04:14:40');
INSERT INTO `permissions` VALUES (13, 'permissions.edit', '2023-07-23 04:14:40', '2023-07-23 04:14:40');
INSERT INTO `permissions` VALUES (14, 'permissions.delete', '2023-07-23 04:14:40', '2023-07-23 04:14:40');
INSERT INTO `permissions` VALUES (15, 'permissions.create', '2023-07-23 04:14:40', '2023-07-23 04:14:40');
-- INSERT INTO `permissions` VALUES (16, 'layout.empty.index', '2023-07-23 04:14:40', '2023-07-23 04:14:40');
INSERT INTO `permissions` VALUES (17, 'form.index', '2023-07-23 04:14:40', '2023-07-23 04:14:40');
INSERT INTO `permissions` VALUES (18, 'form.edit', '2023-07-23 04:14:40', '2023-07-23 04:14:40');
INSERT INTO `permissions` VALUES (19, 'form.show', '2023-07-23 04:14:40', '2023-07-23 04:14:40');
INSERT INTO `permissions` VALUES (20, 'form.delete', '2023-07-23 04:14:40', '2023-07-23 04:14:40');
INSERT INTO `permissions` VALUES (21, 'form.print', '2023-07-23 04:14:40', '2023-07-23 04:14:40');
INSERT INTO `permissions` VALUES (22, 'bank.index', '2023-07-23 04:14:40', '2023-07-23 04:14:40');
INSERT INTO `permissions` VALUES (23, 'bank.edit', '2023-07-23 04:14:40', '2023-07-23 04:14:40');
INSERT INTO `permissions` VALUES (24, 'bank.show', '2023-07-23 04:14:40', '2023-07-23 04:14:40');
INSERT INTO `permissions` VALUES (25, 'bank.delete', '2023-07-23 04:14:41', '2023-07-23 04:14:41');
INSERT INTO `permissions` VALUES (26, 'norek.index', '2023-07-23 04:14:41', '2023-07-23 04:14:41');
INSERT INTO `permissions` VALUES (27, 'norek.edit', '2023-07-23 04:14:41', '2023-07-23 04:14:41');
INSERT INTO `permissions` VALUES (28, 'norek.show', '2023-07-23 04:14:41', '2023-07-23 04:14:41');
INSERT INTO `permissions` VALUES (29, 'norek.delete', '2023-07-23 04:14:41', '2023-07-23 04:14:41');
INSERT INTO `permissions` VALUES (30, 'form-checked.index', '2023-07-24 05:26:47', '2023-07-24 05:26:49');
INSERT INTO `permissions` VALUES (31, 'form-checked.edit', '2023-07-24 05:27:08', '2023-07-24 05:27:06');
INSERT INTO `permissions` VALUES (32, 'form-checked.show', '2023-07-24 05:27:20', '2023-07-24 05:27:21');
INSERT INTO `permissions` VALUES (33, 'form-checked.delete', '2023-07-24 05:27:30', '2023-07-24 05:27:32');
INSERT INTO `permissions` VALUES (34, 'form-checked.approve', '2023-07-24 05:27:51', '2023-07-24 05:27:49');
INSERT INTO `permissions` VALUES (35, 'form-checked.reject', '2023-07-24 05:28:01', '2023-07-24 05:28:02');
INSERT INTO `permissions` VALUES (36, 'form-approve.index', '2023-07-24 05:37:44', '2023-07-24 05:37:42');
INSERT INTO `permissions` VALUES (37, 'form-approve.edit', '2023-07-24 05:37:56', '2023-07-24 05:37:58');
INSERT INTO `permissions` VALUES (38, 'form-approve.show', '2023-07-24 05:38:00', '2023-07-24 05:37:59');
INSERT INTO `permissions` VALUES (39, 'form-approve.delete', '2023-07-24 05:38:13', '2023-07-24 05:38:14');
INSERT INTO `permissions` VALUES (40, 'form-approve.detail', '2023-07-24 05:38:24', '2023-07-24 05:38:25');
INSERT INTO `permissions` VALUES (41, 'form-list.index', '2023-07-24 07:36:00', '2023-07-24 07:36:02');
INSERT INTO `permissions` VALUES (42, 'profile.index', '2023-07-24 07:37:25', '2023-07-24 07:37:26');
INSERT INTO `permissions` VALUES (43, 'form.create', '2023-07-24 07:48:29', '2023-07-24 07:48:27');
INSERT INTO `permissions` VALUES (44, 'home.index', '2023-07-24 07:53:01', '2023-07-24 07:53:02');
INSERT INTO `permissions` VALUES (45, 'dashboard.index', '2023-07-24 08:07:27', '2023-07-24 08:07:28');
INSERT INTO `permissions` VALUES (46, 'dashboard.checked.index', '2023-07-24 08:07:30', '2023-07-24 08:07:30');
INSERT INTO `permissions` VALUES (47, 'dashboard.approve.index', '2023-07-24 08:07:51', '2023-07-24 08:07:52');
INSERT INTO `permissions` VALUES (48, 'dashboard.general.index', '2023-07-24 08:07:55', '2023-07-24 08:07:54');
INSERT INTO `permissions` VALUES (49, 'form.create', '2023-07-24 08:33:20', '2023-07-24 08:33:21');
INSERT INTO `permissions` VALUES (50, 'keperluan.index', '2023-07-25 21:54:53', '2023-07-25 21:54:53');
INSERT INTO `permissions` VALUES (51, 'kpengajuan.index', '2023-07-25 21:54:57', '2023-07-25 21:54:56');
INSERT INTO `permissions` VALUES (52, 'rujukan.index', '2023-07-25 21:55:18', '2023-07-25 21:55:19');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product
-- ----------------------------

-- ----------------------------
-- Table structure for role_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_permissions`;
CREATE TABLE `role_permissions`  (
  `role_id` bigint UNSIGNED NOT NULL,
  `permission_id` bigint UNSIGNED NOT NULL,
  INDEX `role_permissions_role_id_foreign`(`role_id` ASC) USING BTREE,
  INDEX `role_permissions_permission_id_foreign`(`permission_id` ASC) USING BTREE,
  CONSTRAINT `role_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_permissions
-- ----------------------------
INSERT INTO `role_permissions` VALUES (1, 2);
INSERT INTO `role_permissions` VALUES (1, 3);
INSERT INTO `role_permissions` VALUES (1, 4);
INSERT INTO `role_permissions` VALUES (1, 5);
INSERT INTO `role_permissions` VALUES (1, 6);
INSERT INTO `role_permissions` VALUES (1, 7);
INSERT INTO `role_permissions` VALUES (1, 8);
INSERT INTO `role_permissions` VALUES (1, 9);
INSERT INTO `role_permissions` VALUES (1, 10);
INSERT INTO `role_permissions` VALUES (1, 11);
INSERT INTO `role_permissions` VALUES (1, 12);
INSERT INTO `role_permissions` VALUES (1, 13);
INSERT INTO `role_permissions` VALUES (1, 14);
INSERT INTO `role_permissions` VALUES (1, 15);
INSERT INTO `role_permissions` VALUES (1, 16);
INSERT INTO `role_permissions` VALUES (1, 17);
INSERT INTO `role_permissions` VALUES (1, 18);
INSERT INTO `role_permissions` VALUES (1, 19);
INSERT INTO `role_permissions` VALUES (1, 20);
INSERT INTO `role_permissions` VALUES (1, 21);
INSERT INTO `role_permissions` VALUES (1, 22);
INSERT INTO `role_permissions` VALUES (1, 23);
INSERT INTO `role_permissions` VALUES (1, 24);
INSERT INTO `role_permissions` VALUES (1, 25);
INSERT INTO `role_permissions` VALUES (1, 26);
INSERT INTO `role_permissions` VALUES (1, 27);
INSERT INTO `role_permissions` VALUES (1, 28);
INSERT INTO `role_permissions` VALUES (1, 29);
INSERT INTO `role_permissions` VALUES (2, 1);
INSERT INTO `role_permissions` VALUES (1, 30);
INSERT INTO `role_permissions` VALUES (1, 31);
INSERT INTO `role_permissions` VALUES (1, 32);
INSERT INTO `role_permissions` VALUES (1, 33);
INSERT INTO `role_permissions` VALUES (1, 34);
INSERT INTO `role_permissions` VALUES (1, 35);
INSERT INTO `role_permissions` VALUES (1, 36);
INSERT INTO `role_permissions` VALUES (1, 37);
INSERT INTO `role_permissions` VALUES (1, 38);
INSERT INTO `role_permissions` VALUES (1, 39);
INSERT INTO `role_permissions` VALUES (1, 40);
INSERT INTO `role_permissions` VALUES (1, 36);
INSERT INTO `role_permissions` VALUES (1, 41);
INSERT INTO `role_permissions` VALUES (1, 42);
INSERT INTO `role_permissions` VALUES (2, 17);
INSERT INTO `role_permissions` VALUES (2, 18);
INSERT INTO `role_permissions` VALUES (2, 19);
INSERT INTO `role_permissions` VALUES (2, 20);
INSERT INTO `role_permissions` VALUES (1, 44);
INSERT INTO `role_permissions` VALUES (2, 44);
INSERT INTO `role_permissions` VALUES (1, 48);
INSERT INTO `role_permissions` VALUES (3, 30);
INSERT INTO `role_permissions` VALUES (3, 31);
INSERT INTO `role_permissions` VALUES (3, 32);
INSERT INTO `role_permissions` VALUES (3, 33);
INSERT INTO `role_permissions` VALUES (3, 34);
INSERT INTO `role_permissions` VALUES (3, 35);
INSERT INTO `role_permissions` VALUES (3, 44);
INSERT INTO `role_permissions` VALUES (3, 46);
INSERT INTO `role_permissions` VALUES (4, 36);
INSERT INTO `role_permissions` VALUES (4, 37);
INSERT INTO `role_permissions` VALUES (4, 38);
INSERT INTO `role_permissions` VALUES (4, 39);
INSERT INTO `role_permissions` VALUES (4, 40);
INSERT INTO `role_permissions` VALUES (4, 42);
INSERT INTO `role_permissions` VALUES (4, 44);
INSERT INTO `role_permissions` VALUES (4, 47);
INSERT INTO `role_permissions` VALUES (5, 2);
INSERT INTO `role_permissions` VALUES (5, 3);
INSERT INTO `role_permissions` VALUES (5, 4);
INSERT INTO `role_permissions` VALUES (5, 5);
INSERT INTO `role_permissions` VALUES (5, 6);
INSERT INTO `role_permissions` VALUES (5, 41);
INSERT INTO `role_permissions` VALUES (5, 42);
INSERT INTO `role_permissions` VALUES (5, 44);
INSERT INTO `role_permissions` VALUES (5, 48);
INSERT INTO `role_permissions` VALUES (3, 22);
INSERT INTO `role_permissions` VALUES (3, 26);
INSERT INTO `role_permissions` VALUES (3, 42);
INSERT INTO `role_permissions` VALUES (1, 43);
INSERT INTO `role_permissions` VALUES (1, 50);
INSERT INTO `role_permissions` VALUES (1, 51);
INSERT INTO `role_permissions` VALUES (1, 52);
INSERT INTO `role_permissions` VALUES (2, 26);
INSERT INTO `role_permissions` VALUES (2, 27);
INSERT INTO `role_permissions` VALUES (2, 29);
INSERT INTO `role_permissions` VALUES (2, 42);
INSERT INTO `role_permissions` VALUES (2, 43);
INSERT INTO `role_permissions` VALUES (2, 49);
INSERT INTO `role_permissions` VALUES (7, 21);
INSERT INTO `role_permissions` VALUES (7, 22);
INSERT INTO `role_permissions` VALUES (7, 23);
INSERT INTO `role_permissions` VALUES (7, 24);
INSERT INTO `role_permissions` VALUES (7, 25);
INSERT INTO `role_permissions` VALUES (7, 26);
INSERT INTO `role_permissions` VALUES (7, 27);
INSERT INTO `role_permissions` VALUES (7, 28);
INSERT INTO `role_permissions` VALUES (7, 29);
INSERT INTO `role_permissions` VALUES (7, 41);
INSERT INTO `role_permissions` VALUES (7, 42);
INSERT INTO `role_permissions` VALUES (7, 44);
INSERT INTO `role_permissions` VALUES (7, 48);
INSERT INTO `role_permissions` VALUES (4, 50);
INSERT INTO `role_permissions` VALUES (4, 51);
INSERT INTO `role_permissions` VALUES (4, 52);
INSERT INTO `role_permissions` VALUES (4, 22);
INSERT INTO `role_permissions` VALUES (4, 23);
INSERT INTO `role_permissions` VALUES (4, 24);
INSERT INTO `role_permissions` VALUES (4, 25);
INSERT INTO `role_permissions` VALUES (4, 26);
INSERT INTO `role_permissions` VALUES (4, 27);
INSERT INTO `role_permissions` VALUES (4, 28);
INSERT INTO `role_permissions` VALUES (4, 29);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'Superadmin', 'Superadmin', '2023-07-23 04:14:40', '2023-07-23 04:14:40');
INSERT INTO `roles` VALUES (2, 'General', 'General', '2023-07-23 04:14:40', '2023-07-24 01:21:01');
INSERT INTO `roles` VALUES (3, 'Checked', 'Checked', '2023-07-24 01:10:57', '2023-07-24 01:18:16');
INSERT INTO `roles` VALUES (4, 'Approval', 'Approval', '2023-07-24 01:14:29', '2023-07-24 01:14:29');
INSERT INTO `roles` VALUES (5, 'Admin', 'Admin', '2023-07-24 01:16:56', '2023-07-24 01:16:56');
INSERT INTO `roles` VALUES (7, 'Cashier', 'Cashier', '2023-07-26 07:17:27', '2023-07-26 07:17:27');

-- ----------------------------
-- Table structure for rujukan
-- ----------------------------
DROP TABLE IF EXISTS `rujukan`;
CREATE TABLE `rujukan`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rujukan
-- ----------------------------
INSERT INTO `rujukan` VALUES (1, 'SPV', '2023-07-25 15:02:12', '2023-07-25 15:02:12');
INSERT INTO `rujukan` VALUES (3, 'Finance', '2023-07-25 15:02:20', '2023-07-25 15:02:20');
INSERT INTO `rujukan` VALUES (4, 'Manager', '2023-07-25 15:02:30', '2023-07-25 15:02:30');
INSERT INTO `rujukan` VALUES (6, 'Direktur Utama', '2023-07-25 15:02:42', '2023-07-25 15:02:42');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint UNSIGNED NULL DEFAULT NULL,
  `no_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jabatan_id` bigint UNSIGNED NOT NULL,
  `departement_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE,
  INDEX `users_jabatan_id_foreign`(`jabatan_id` ASC) USING BTREE,
  INDEX `users_departement_id_foreign`(`departement_id` ASC) USING BTREE,
  INDEX `users_role_id_foreign`(`role_id` ASC) USING BTREE,
  CONSTRAINT `users_departement_id_foreign` FOREIGN KEY (`departement_id`) REFERENCES `departement` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `users_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Superadmin', 'Superadmin', 'Superadmin@admin.com', NULL, '$2y$10$qMSqb/.U.hYlMPkpcG8Rg.wcbJFsEcoH8GDCzVxor3OdIRQPrBTg.', 1, '08558955539', 6, 12, '2023-07-23 04:14:42', '2023-07-26 07:15:40', NULL);
INSERT INTO `users` VALUES (2, 'User', 'User', ' user@user.com', '2023-07-24 11:20:34', '$2y$10$TH156kR/u1F6FmSirkTEI.e/r3b9aQMlRmFYDXo7U2XIgYRf3tIz.', 2, '08558955539', 1, 14, '2023-07-23 04:14:42', '2023-07-23 04:14:42', NULL);
INSERT INTO `users` VALUES (3, 'Muhamad Kosasih', 'muhamadkosasih', 'muhamadkosasih@gmail.com', NULL, '$2y$10$MpRgLq79b29Tx4tjdEC9Du/yQu3sOEAOvXAEa67xri5hMAonc7lUG', 2, '08556955512', 1, 12, '2023-07-24 01:23:59', '2023-07-26 02:50:54', NULL);
INSERT INTO `users` VALUES (4, 'Bayu', 'bayu', 'bayu@gmail.com', NULL, '$2y$10$v4kaqYR/IWcVJy4fCz2A6uVmy1xGxoHlyPJ8P7vAEXKIJFPQ3X27a', 2, '0855512990', 1, 14, '2023-07-24 01:24:34', '2023-07-26 02:51:30', NULL);
INSERT INTO `users` VALUES (5, 'Fadillah', 'fadillah', 'fadillah@gmail.com', NULL, '$2y$10$wr4I7XnUwTOb505cmaceAu/58cod4f0UikeKZMQRlnwI4mUXbXoMq', 2, '0988778812', 1, 13, '2023-07-24 01:25:17', '2023-07-26 02:52:05', NULL);
INSERT INTO `users` VALUES (6, 'Juki', 'juki', 'juki@gmail.com', NULL, '$2y$10$KohMGC2HnJNjv.jz2JFBJuVFJK2t0MTOE84DGJa2WVX25Su4U1uCC', 3, '09882311178', 2, 3, '2023-07-24 01:26:00', '2023-07-26 02:52:57', NULL);
INSERT INTO `users` VALUES (7, 'Approval', 'Approval', 'Approval@gmail.com', NULL, '$2y$10$fJgk6N/YdxDVMW7wg0HVdeGsVbUNoOECSyFbB0c8WNooGO1awRPLS', 4, '08988999091', 4, 5, '2023-07-24 02:00:09', '2023-07-26 02:53:52', NULL);
INSERT INTO `users` VALUES (8, 'Orang Finance', 'orgfinance', 'orgfinance@gmail.com', NULL, '$2y$10$sJa8vsqje6AbqtOE.GHUkeqSxIYqIGiNEdIKbwHvTQUVjaIVtA8kC', 4, '09228722261', 4, 5, '2023-07-26 02:56:44', '2023-07-26 02:56:44', NULL);
INSERT INTO `users` VALUES (9, 'Orang SPV', 'orgspv', 'orgspv@gmail.com', NULL, '$2y$10$jQdUzuZ0RcUYg0aLCCtPIOPkd.8HT4/f3qgQJtBVp4.dYZk9k1e2y', 3, '09778999980', 2, 2, '2023-07-26 02:57:58', '2023-07-26 02:57:58', NULL);
INSERT INTO `users` VALUES (10, 'Orang Cashier', 'orgcashier', 'orgcashier@gmail.com', NULL, '$2y$10$JNjgoYSKGnsYctlL12eiXuBuKLbaAHZArlOJytp58x/pdho71WHX6', 7, '09883211891', 5, 5, '2023-07-26 07:20:01', '2023-07-26 07:20:01', NULL);

SET FOREIGN_KEY_CHECKS = 1;
