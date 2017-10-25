/*
 Navicat MySQL Data Transfer

 Source Server         : 本地
 Source Server Version : 50713
 Source Host           : localhost
 Source Database       : test

 Target Server Version : 50713
 File Encoding         : utf-8

 Date: 10/25/2017 22:53:07 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `books`
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL DEFAULT '' COMMENT '书名',
  `author` varchar(20) NOT NULL DEFAULT '' COMMENT '作者',
  `updated_at` timestamp NOT NULL DEFAULT '1971-01-01 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '1971-01-01 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
--  Table structure for `borrow_relation`
-- ----------------------------
DROP TABLE IF EXISTS `borrow_relation`;
CREATE TABLE `borrow_relation` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `good_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '商品id',
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `updated_at` timestamp NOT NULL DEFAULT '1971-01-01 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '1971-01-01 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
--  Table structure for `movies`
-- ----------------------------
DROP TABLE IF EXISTS `movies`;
CREATE TABLE `movies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL DEFAULT '' COMMENT '电影名称',
  `director_name` varchar(20) NOT NULL DEFAULT '' COMMENT '导演',
  `updated_at` timestamp NOT NULL DEFAULT '1971-01-01 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '1971-01-01 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
--  Table structure for `role_user`
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT '1971-01-01 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '1971-01-01 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
--  Records of `role_user`
-- ----------------------------
BEGIN;
INSERT INTO `role_user` VALUES ('1', '1', '1', '1971-01-01 00:00:00', '1971-01-01 00:00:00'), ('2', '2', '1', '1971-01-01 00:00:00', '1971-01-01 00:00:00'), ('3', '3', '1', '1971-01-01 00:00:00', '1971-01-01 00:00:00');
COMMIT;

-- ----------------------------
--  Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '角色名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
--  Records of `roles`
-- ----------------------------
BEGIN;
INSERT INTO `roles` VALUES ('1', '超级管理员'), ('2', '图书馆管理员'), ('3', '电影馆管理员'), ('4', '图书馆值班员'), ('5', '电影馆售票员');
COMMIT;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(20) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT '1971-01-01 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '1971-01-01 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'nero', 'nero', 'libo', '1971-01-01 00:00:00', '1971-01-01 00:00:00');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
