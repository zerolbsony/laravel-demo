/*
 Navicat MySQL Data Transfer

 Source Server         : homestead上的数据库
 Source Server Version : 50719
 Source Host           : 192.168.10.10
 Source Database       : test

 Target Server Version : 50719
 File Encoding         : utf-8

 Date: 11/08/2017 18:08:06 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `accounts`
-- ----------------------------
DROP TABLE IF EXISTS `accounts`;
CREATE TABLE `accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `card` varchar(20) NOT NULL DEFAULT '',
  `birthday` timestamp NOT NULL DEFAULT '1971-01-01 00:00:00',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `accounts`
-- ----------------------------
BEGIN;
INSERT INTO `accounts` VALUES ('1', '1242424232', '2008-11-08 17:52:48', '1'), ('2', '24223423', '1974-01-01 00:00:00', '2');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
--  Records of `books`
-- ----------------------------
BEGIN;
INSERT INTO `books` VALUES ('1', '大话数据结构', '张三', '2017-11-01 07:24:38', '2017-10-26 12:02:53'), ('2', 'Think in Java', '', '1971-01-01 00:00:00', '1971-01-01 00:00:00'), ('3', '安徒生的童话', '安徒生', '2017-10-31 08:42:33', '2017-10-31 08:42:33');
COMMIT;

-- ----------------------------
--  Table structure for `borrow_records`
-- ----------------------------
DROP TABLE IF EXISTS `borrow_records`;
CREATE TABLE `borrow_records` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `borrowable_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '商品id',
  `borrowable_type` varchar(255) NOT NULL DEFAULT '' COMMENT '关联的模型类名',
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `updated_at` timestamp NOT NULL DEFAULT '1971-01-01 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '1971-01-01 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
--  Records of `borrow_records`
-- ----------------------------
BEGIN;
INSERT INTO `borrow_records` VALUES ('1', '1', 'books', '1', '1971-08-21 00:00:00', '1975-05-30 00:00:00'), ('2', '1', 'movies', '1', '1971-01-01 00:00:00', '1971-01-01 00:00:00');
COMMIT;

-- ----------------------------
--  Table structure for `citys`
-- ----------------------------
DROP TABLE IF EXISTS `citys`;
CREATE TABLE `citys` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL COMMENT '城市名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
--  Records of `citys`
-- ----------------------------
BEGIN;
INSERT INTO `citys` VALUES ('1', '北京');
COMMIT;

-- ----------------------------
--  Table structure for `comments`
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL DEFAULT '' COMMENT '标题',
  `body` text NOT NULL COMMENT '评论内容',
  `user_id` int(11) unsigned NOT NULL COMMENT '用户id',
  `commentable_id` int(11) NOT NULL COMMENT '评论对象id',
  `commentable_type` varchar(20) NOT NULL COMMENT '评论类型',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
--  Records of `comments`
-- ----------------------------
BEGIN;
INSERT INTO `comments` VALUES ('1', '评论标题', '评论内容', '1', '1', 'books'), ('2', '哈哈', '哦哦哦哦', '1', '1', 'books'), ('3', '我', '我 我', '2', '1', 'books');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
--  Records of `movies`
-- ----------------------------
BEGIN;
INSERT INTO `movies` VALUES ('1', '七龙珠', '鸟山明', '1971-01-01 00:00:00', '1971-01-01 00:00:00');
COMMIT;

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
--  Table structure for `taggables`
-- ----------------------------
DROP TABLE IF EXISTS `taggables`;
CREATE TABLE `taggables` (
  `tag_id` int(11) unsigned NOT NULL,
  `taggable_id` int(11) NOT NULL,
  `taggable_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
--  Records of `taggables`
-- ----------------------------
BEGIN;
INSERT INTO `taggables` VALUES ('1', '1', 'books'), ('2', '1', 'books'), ('3', '1', 'books'), ('4', '1', 'books'), ('2', '2', 'books'), ('3', '2', 'books'), ('4', '2', 'books');
COMMIT;

-- ----------------------------
--  Table structure for `tags`
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '标签名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
--  Records of `tags`
-- ----------------------------
BEGIN;
INSERT INTO `tags` VALUES ('1', '好书'), ('2', '通俗易懂'), ('3', 'Java'), ('4', 'IT');
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
  `city_id` int(11) unsigned NOT NULL COMMENT '城市id',
  `created_at` timestamp NOT NULL DEFAULT '1971-01-01 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '1971-01-01 00:00:00',
  `account_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'nero', 'nero', 'libo', '1', '1971-01-01 00:00:00', '2017-11-08 09:59:49', '2');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
