/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : en

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-10-15 11:21:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for en_member
-- ----------------------------
DROP TABLE IF EXISTS `en_member`;
CREATE TABLE `en_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT '' COMMENT '用户名',
  `tel` varchar(11) DEFAULT '' COMMENT '手机号',
  `password` varchar(40) DEFAULT '' COMMENT '密码',
  `job_id` int(10) unsigned DEFAULT '0' COMMENT '职位id',
  `status` tinyint(1) unsigned DEFAULT '1' COMMENT '状态 1启用 2禁用 3删除',
  `created_at` int(11) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='后台用户表';

-- ----------------------------
-- Records of en_member
-- ----------------------------
