/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : 127.0.0.1:3306
 Source Schema         : db_peramalan

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 30/05/2020 21:08:39
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- Buat database
-- CREATE DATABASE IF NOT EXISTS 'utd_darah_polman';
-- USE 'utd_darah_polman';

-- ----------------------------
-- Table structure for tbl_jenis
-- ----------------------------
DROP TABLE IF EXISTS `tbl_jenis`;
CREATE TABLE `tbl_jenis`  (
  `id_jenis` int(11) NOT NULL AUTO_INCREMENT,
  `komponen_darah` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `golongan_darah` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_jenis`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_jenis
-- ----------------------------
INSERT INTO `tbl_jenis` VALUES (1, 'PRC', 'A');
INSERT INTO `tbl_jenis` VALUES (2, 'PRC', 'B');
INSERT INTO `tbl_jenis` VALUES (3, 'PRC', 'AB');
INSERT INTO `tbl_jenis` VALUES (4, 'PRC', 'O');
INSERT INTO `tbl_jenis` VALUES (5, 'WB', 'A');
INSERT INTO `tbl_jenis` VALUES (6, 'WB', 'B');
INSERT INTO `tbl_jenis` VALUES (7, 'WB', 'AB');
INSERT INTO `tbl_jenis` VALUES (8, 'WB', 'O');
INSERT INTO `tbl_jenis` VALUES (9, 'TC', 'A');
INSERT INTO `tbl_jenis` VALUES (10, 'TC', 'B');
INSERT INTO `tbl_jenis` VALUES (11, 'TC', 'AB');
INSERT INTO `tbl_jenis` VALUES (12, 'TC', 'O');
-- ----------------------------
-- Table structure for tbl_kasus
-- ----------------------------
DROP TABLE IF EXISTS `tbl_kasus`;
CREATE TABLE `tbl_kasus`  (
  `id_kasus` int(11) NOT NULL AUTO_INCREMENT,
  `id_jenis` int(11) NULL DEFAULT NULL,
  `tahun` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bulan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jml` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_kasus`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 146 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;


-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user`  (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES (1, 'Aco', 'admin', 'admin');
SET FOREIGN_KEY_CHECKS = 1;
