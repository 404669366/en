/*
Navicat MySQL Data Transfer

Source Server         : 服务器A
Source Server Version : 50641
Source Host           : 47.99.36.149:3306
Source Database       : en

Target Server Type    : MYSQL
Target Server Version : 50641
File Encoding         : 65001

Date: 2018-10-19 10:23:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for en_amend
-- ----------------------------
DROP TABLE IF EXISTS `en_amend`;
CREATE TABLE `en_amend` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT '' COMMENT '用户名',
  `tel` varchar(11) DEFAULT '' COMMENT '电话号码',
  `type` tinyint(1) unsigned DEFAULT '1' COMMENT '业务类型 1寻找场地2寻找投资3购买电桩4业务咨询',
  `status` tinyint(1) unsigned DEFAULT '1' COMMENT '状态 1待跟踪2已联系3已处理4删除',
  `remark` varchar(255) DEFAULT '' COMMENT '备注',
  `contact_at` int(11) unsigned DEFAULT '0' COMMENT '联系时间',
  `created_at` int(11) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='前台用户信息';

-- ----------------------------
-- Records of en_amend
-- ----------------------------

-- ----------------------------
-- Table structure for en_job
-- ----------------------------
DROP TABLE IF EXISTS `en_job`;
CREATE TABLE `en_job` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `job` varchar(30) DEFAULT '' COMMENT '职位名',
  `last` int(11) unsigned DEFAULT '0' COMMENT '上级',
  `powers` varchar(1000) DEFAULT '' COMMENT '拥有权限',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='用户职位表';

-- ----------------------------
-- Records of en_job
-- ----------------------------
INSERT INTO `en_job` VALUES ('1', 'root', '0', '1,2,3,4');
INSERT INTO `en_job` VALUES ('2', 'admin', '1', '1,2,4');

-- ----------------------------
-- Table structure for en_member
-- ----------------------------
DROP TABLE IF EXISTS `en_member`;
CREATE TABLE `en_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT '' COMMENT '用户名',
  `tel` varchar(11) DEFAULT '' COMMENT '手机号',
  `password` varchar(80) DEFAULT '' COMMENT '密码',
  `job_id` int(10) unsigned DEFAULT '0' COMMENT '职位id',
  `status` tinyint(1) unsigned DEFAULT '1' COMMENT '状态 1启用 2禁用',
  `created_at` int(11) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='后台用户表';

-- ----------------------------
-- Records of en_member
-- ----------------------------
INSERT INTO `en_member` VALUES ('1', 'root', '18683509267', '$2y$13$jS5psKZ3DusBGXFH.gcUju9y/.TZo6Ahjyga2JJQTYlvLUoUknROG', '1', '1', '1539588593');
INSERT INTO `en_member` VALUES ('2', 'admin', '18308412675', '$2y$13$3BnTDpK9Jvz6LyiorzDmseXMqig7V/ty5MVGDT1VXykG9pPhDevJe', '2', '1', '1539739444');

-- ----------------------------
-- Table structure for en_power
-- ----------------------------
DROP TABLE IF EXISTS `en_power`;
CREATE TABLE `en_power` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `last` int(11) unsigned DEFAULT '0' COMMENT '上级id',
  `no` varchar(8) DEFAULT '' COMMENT '权限标识',
  `type` tinyint(1) unsigned DEFAULT '1' COMMENT '权限类型 1菜单2按钮3接口',
  `name` varchar(30) DEFAULT '' COMMENT '权限名',
  `url` varchar(100) DEFAULT '' COMMENT '权限路由',
  `sort` int(10) unsigned DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='用户权限表';

-- ----------------------------
-- Records of en_power
-- ----------------------------
INSERT INTO `en_power` VALUES ('1', '0', '353varQx', '1', '组织架构', '/job', '0');
INSERT INTO `en_power` VALUES ('2', '1', 'a89l9knd', '1', '职位管理', '/job/job/list', '1');
INSERT INTO `en_power` VALUES ('3', '1', 'n1qqc9fu', '1', '权限管理', '/job/power/list', '0');
INSERT INTO `en_power` VALUES ('4', '1', 'x8oblwsw', '1', '用户管理', '/member/member/list', '2');
