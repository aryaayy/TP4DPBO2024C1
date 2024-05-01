/*
 Navicat Premium Data Transfer

 Source Server         : conn
 Source Server Type    : MySQL
 Source Server Version : 100432 (10.4.32-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : tp_mvc

 Target Server Type    : MySQL
 Target Server Version : 100432 (10.4.32-MariaDB)
 File Encoding         : 65001

 Date: 01/05/2024 19:19:43
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for division
-- ----------------------------
DROP TABLE IF EXISTS `division`;
CREATE TABLE `division`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `abbr` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of division
-- ----------------------------
INSERT INTO `division` VALUES (1, 'Divisi Pengembangan Minat dan Bakat', 'DPMB');
INSERT INTO `division` VALUES (2, 'Divisi Komunikasi Teknologi dan Informasi', 'Divkomtekinfo');
INSERT INTO `division` VALUES (7, 'Divisi Pengembangan Organisasi', 'DPO');

-- ----------------------------
-- Table structure for members
-- ----------------------------
DROP TABLE IF EXISTS `members`;
CREATE TABLE `members`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `join_date` date NOT NULL DEFAULT current_timestamp,
  `id_division` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_division`(`id_division` ASC) USING BTREE,
  CONSTRAINT `members_ibfk_1` FOREIGN KEY (`id_division`) REFERENCES `division` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of members
-- ----------------------------
INSERT INTO `members` VALUES (12, 'Arya Aydin Margono', 'aryayyy9604@upi.edu', '081282420569', '2024-05-01', 7);
INSERT INTO `members` VALUES (13, 'Tattha Maharany', 'tattha@upi.edu', '08123456', '2024-05-01', 1);
INSERT INTO `members` VALUES (14, 'Rakha Dhifiargo Hariadi', 'rakha@upi.edu', '0812475827', '2024-05-01', 2);

SET FOREIGN_KEY_CHECKS = 1;
