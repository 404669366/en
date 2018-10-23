/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : en

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-10-23 16:15:29
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='前台用户需求表';

-- ----------------------------
-- Records of en_amend
-- ----------------------------

-- ----------------------------
-- Table structure for en_content
-- ----------------------------
DROP TABLE IF EXISTS `en_content`;
CREATE TABLE `en_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no` varchar(100) DEFAULT '' COMMENT '标识',
  `content` text COMMENT '文本内容',
  `note` text COMMENT '备注',
  `user` varchar(20) DEFAULT '' COMMENT '修改用户',
  `created_at` int(255) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='前台文本内容修改表';

-- ----------------------------
-- Records of en_content
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
INSERT INTO `en_job` VALUES ('1', 'root', '0', '1,2,3,4,5,8,9,6,7');
INSERT INTO `en_job` VALUES ('2', 'admin', '1', '1,2,4,5,8,9,6,7');

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
-- Table structure for en_nav
-- ----------------------------
DROP TABLE IF EXISTS `en_nav`;
CREATE TABLE `en_nav` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT '' COMMENT '名称',
  `url` varchar(255) DEFAULT '' COMMENT '路由',
  `sort` int(10) unsigned DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='前台导航栏表';

-- ----------------------------
-- Records of en_nav
-- ----------------------------
INSERT INTO `en_nav` VALUES ('1', '首页', '/menu/menu/index', '1');
INSERT INTO `en_nav` VALUES ('2', '产品简介', '/menu/menu/about', '2');
INSERT INTO `en_nav` VALUES ('3', '产品展示', '/menu/menu/service', '3');
INSERT INTO `en_nav` VALUES ('4', '成功案例', '/menu/menu/gallery', '4');
INSERT INTO `en_nav` VALUES ('5', '开放平台', '/menu/menu/properties', '5');
INSERT INTO `en_nav` VALUES ('6', '联系我们', '/menu/menu/contact', '6');

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='用户权限表';

-- ----------------------------
-- Records of en_power
-- ----------------------------
INSERT INTO `en_power` VALUES ('1', '0', '353varQx', '1', '组织架构', '/job', '0');
INSERT INTO `en_power` VALUES ('2', '1', 'a89l9knd', '1', '职位管理', '/job/job/list', '1');
INSERT INTO `en_power` VALUES ('3', '1', 'n1qqc9fu', '1', '权限管理', '/job/power/list', '0');
INSERT INTO `en_power` VALUES ('4', '1', 'x8oblwsw', '1', '用户管理', '/member/member/list', '2');
INSERT INTO `en_power` VALUES ('5', '0', '4n79Qat8', '1', '内容管理', '/content', '2');
INSERT INTO `en_power` VALUES ('6', '0', 'ya4b6dgm', '1', '需求管理', '/amend', '1');
INSERT INTO `en_power` VALUES ('7', '6', '7sraz4jo', '1', '需求列表', '/amend/amend/list', '999');
INSERT INTO `en_power` VALUES ('8', '5', '4e57tirz', '1', '内容列表', '/content/content/list', '999');
INSERT INTO `en_power` VALUES ('9', '5', 'glpm5l3Q', '1', '导航管理', '/content/nav/list', '0');
