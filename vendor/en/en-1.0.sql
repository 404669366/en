/*
Navicat MySQL Data Transfer

Source Server         : 服务器A
Source Server Version : 50641
Source Host           : 47.99.36.149:3306
Source Database       : en

Target Server Type    : MYSQL
Target Server Version : 50641
File Encoding         : 65001

Date: 2018-10-26 14:52:30
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
-- Table structure for en_broadcast
-- ----------------------------
DROP TABLE IF EXISTS `en_broadcast`;
CREATE TABLE `en_broadcast` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT '' COMMENT '名称',
  `image` varchar(500) DEFAULT '' COMMENT '轮播图',
  `sort` int(10) unsigned DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='轮播配置表';

-- ----------------------------
-- Records of en_broadcast
-- ----------------------------
INSERT INTO `en_broadcast` VALUES ('1', '轮播1', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/20181026112346fh767k51w.jpg', '1');
INSERT INTO `en_broadcast` VALUES ('2', '轮播2', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/20181026114105wig44qnk9.jpg', '2');
INSERT INTO `en_broadcast` VALUES ('3', '轮播3', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/20181026123007z5ae9ioxp.jpg', '3');

-- ----------------------------
-- Table structure for en_contact
-- ----------------------------
DROP TABLE IF EXISTS `en_contact`;
CREATE TABLE `en_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact` varchar(255) DEFAULT '' COMMENT '联系方式',
  `link` varchar(255) DEFAULT '#' COMMENT '链接',
  `sort` int(10) unsigned DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='联系方式配置表';

-- ----------------------------
-- Records of en_contact
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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='前台文本内容修改表';

-- ----------------------------
-- Records of en_content
-- ----------------------------
INSERT INTO `en_content` VALUES ('2', 'eQzruthc', '<h2 style=\"text-align: center;\"><span style=\"font-size: 22px;\"><font color=\"#ffffff\">﻿新能源汽车充电项目投资信息平台</font></span></h2><font color=\"#ffffff\"><span style=\"font-size: 18px;\"><div style=\"text-align: center;\">充电领域AB端服务提供商</div></span><span style=\"font-size: 18px;\"><div style=\"text-align: center;\">提供全国公共充电桩、站投资需求信息</div></span><span style=\"font-size: 18px;\"><div style=\"text-align: center;\">配套设备供应厂家，项目预算工程申报服务</div></span><span style=\"font-size: 18px;\"><div style=\"text-align: center;\">多家运营商合作，全国代理合伙人招募</div></span></font>', '首页1', '1', '1540278816');
INSERT INTO `en_content` VALUES ('3', 'r9yrsiQg', '<h1 style=\"text-align: center; \">亿能介绍</h1>', '首页2', '1', '1540281616');
INSERT INTO `en_content` VALUES ('6', '8aw3Qa9b', '<h1 style=\"text-align: center; \">大区销售经理</h1>', '公共底部1', '1', '1540282023');
INSERT INTO `en_content` VALUES ('7', 'dzmQzbjp', '<h1 style=\"text-align: center; \"><font color=\"#ffffff\">微信公众号</font></h1>', '公共底部2', '1', '1540282051');
INSERT INTO `en_content` VALUES ('9', 'bkj21hap', '<h1 style=\"text-align: center; \">开放平台1</h1>', '开放平台1', '1', '1540283240');
INSERT INTO `en_content` VALUES ('10', '6ozqdcjg', '<h1 style=\"text-align: center; \">合作商案例展示</h1>', '成功案例1', '1', '1540283280');
INSERT INTO `en_content` VALUES ('12', 'di9lfk7l', '<h1 style=\"text-align: center; \">联系我们</h1><p style=\"text-align: center;\">电话：</p><p style=\"text-align: center;\">邮箱：</p><p style=\"text-align: center;\">地址：成都市高新区天府一街两江国际B座2301</p><div style=\"text-align: center;\"><br></div>', '联系我们1', '1', '1540360213');

-- ----------------------------
-- Table structure for en_friend
-- ----------------------------
DROP TABLE IF EXISTS `en_friend`;
CREATE TABLE `en_friend` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '' COMMENT '名称',
  `icon` varchar(800) DEFAULT '' COMMENT '图标',
  `link` varchar(255) DEFAULT '#' COMMENT '链接',
  `sort` int(10) unsigned DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='友情链接配置表';

-- ----------------------------
-- Records of en_friend
-- ----------------------------

-- ----------------------------
-- Table structure for en_images
-- ----------------------------
DROP TABLE IF EXISTS `en_images`;
CREATE TABLE `en_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(500) DEFAULT '' COMMENT '图片链接',
  `remark` varchar(255) DEFAULT '' COMMENT '备注',
  `sort` int(10) unsigned DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='图片墙配置表';

-- ----------------------------
-- Records of en_images
-- ----------------------------
INSERT INTO `en_images` VALUES ('1', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/201810261451136anho5qk9.jpg', '案例1', '1');
INSERT INTO `en_images` VALUES ('2', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/20181026145127dvyjrjqx9.png', '案例2', '2');
INSERT INTO `en_images` VALUES ('3', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/2018102614514765ew2ur1u.png', '案例3', '3');
INSERT INTO `en_images` VALUES ('4', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/20181026145207j42gocicv.jpg', '案例4', '4');

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
INSERT INTO `en_job` VALUES ('1', 'root', '0', '1,2,3,4,5,8,9,10,11,12,13,14,15,16,6,7');
INSERT INTO `en_job` VALUES ('2', 'admin', '1', '1,2,4,5,8,9,10,11,12,13,14,15,16,6,7');

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
  `background` varchar(500) DEFAULT '' COMMENT '背景图',
  `sort` int(10) unsigned DEFAULT '1' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='前台导航栏表';

-- ----------------------------
-- Records of en_nav
-- ----------------------------
INSERT INTO `en_nav` VALUES ('2', '产品简介', '/menu/menu/about', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/20181025175356b9gyfzajz.jpg', '2');
INSERT INTO `en_nav` VALUES ('3', '开放平台', '/menu/menu/service', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/20181025175409mn1h7oclz.jpg', '5');
INSERT INTO `en_nav` VALUES ('4', '成功案例', '/menu/menu/gallery', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/20181025175422xihmvaanl.jpg', '4');
INSERT INTO `en_nav` VALUES ('6', '联系我们', '/menu/menu/contact', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/201810251754548omQfuiQp.jpg', '6');

-- ----------------------------
-- Table structure for en_open
-- ----------------------------
DROP TABLE IF EXISTS `en_open`;
CREATE TABLE `en_open` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT '' COMMENT '标题',
  `image` varchar(500) DEFAULT '' COMMENT '图片',
  `content` varchar(3000) DEFAULT '' COMMENT '文本内容',
  `link` varchar(300) DEFAULT '' COMMENT '链接',
  `sort` tinyint(2) unsigned DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='开放平台配置表';

-- ----------------------------
-- Records of en_open
-- ----------------------------

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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='用户权限表';

-- ----------------------------
-- Records of en_power
-- ----------------------------
INSERT INTO `en_power` VALUES ('1', '0', '353varQx', '1', '组织架构', '/job', '0');
INSERT INTO `en_power` VALUES ('2', '1', 'a89l9knd', '1', '职位管理', '/job/job/list', '1');
INSERT INTO `en_power` VALUES ('3', '1', 'n1qqc9fu', '1', '权限管理', '/job/power/list', '0');
INSERT INTO `en_power` VALUES ('4', '1', 'x8oblwsw', '1', '用户管理', '/member/member/list', '2');
INSERT INTO `en_power` VALUES ('5', '0', '4n79Qat8', '1', '内容管理', '/content', '1');
INSERT INTO `en_power` VALUES ('6', '0', 'ya4b6dgm', '1', '需求管理', '/amend', '2');
INSERT INTO `en_power` VALUES ('7', '6', '7sraz4jo', '1', '需求列表', '/amend/amend/list', '999');
INSERT INTO `en_power` VALUES ('8', '5', '4e57tirz', '1', '内容列表', '/content/content/list', '995');
INSERT INTO `en_power` VALUES ('9', '5', 'glpm5l3Q', '1', '导航管理', '/content/nav/list', '999');
INSERT INTO `en_power` VALUES ('10', '5', 'r8ojb371', '1', '轮播管理', '/content/bro/list', '998');
INSERT INTO `en_power` VALUES ('11', '5', '2jwoicom', '1', '案例管理', '/content/image/list', '997');
INSERT INTO `en_power` VALUES ('12', '5', 'lkbtlnfc', '1', '服务管理', '/content/serve/list', '996');
INSERT INTO `en_power` VALUES ('13', '5', 'yi17v4vi', '1', '友情链接管理', '/content/friend/list', '994');
INSERT INTO `en_power` VALUES ('14', '5', 'no1vvr5l', '1', '联系方式管理', '/content/contact/list', '993');
INSERT INTO `en_power` VALUES ('15', '5', 'z4g2fhea', '1', '开放管理', '/content/open/list', '995');
INSERT INTO `en_power` VALUES ('16', '5', 'yfsaclxf', '1', '业务员信息管理', '/content/salesman/list', '992');

-- ----------------------------
-- Table structure for en_salesman
-- ----------------------------
DROP TABLE IF EXISTS `en_salesman`;
CREATE TABLE `en_salesman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region` varchar(255) DEFAULT '' COMMENT '所在地理位置',
  `intro` varchar(2000) DEFAULT '' COMMENT '介绍',
  `image` varchar(1000) DEFAULT '' COMMENT '头像',
  `name` varchar(10) DEFAULT '' COMMENT '姓名',
  `tel` varchar(11) DEFAULT '' COMMENT '电话',
  `sort` tinyint(2) DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='业务员配置表';

-- ----------------------------
-- Records of en_salesman
-- ----------------------------

-- ----------------------------
-- Table structure for en_serve
-- ----------------------------
DROP TABLE IF EXISTS `en_serve`;
CREATE TABLE `en_serve` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT '' COMMENT '服务名称',
  `smallImage` varchar(500) DEFAULT '' COMMENT '服务小图',
  `bigImage` varchar(500) DEFAULT '' COMMENT '服务大图',
  `resume` varchar(255) DEFAULT '' COMMENT '服务简述',
  `content` varchar(5000) DEFAULT '' COMMENT '服务详情',
  `sort` int(10) unsigned DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='服务配置表';

-- ----------------------------
-- Records of en_serve
-- ----------------------------
