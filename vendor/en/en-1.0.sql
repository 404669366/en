/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : en

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-10-24 16:49:17
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
INSERT INTO `en_broadcast` VALUES ('1', '轮播1', 'https://ascasc.oss-cn-https://ascasc.oss-cn-hangzhou.aliyuncs.com/20181024145526oresnqdrt.jpg', '1');
INSERT INTO `en_broadcast` VALUES ('2', '轮播2', 'https://ascasc.oss-cn-https://ascasc.oss-cn-hangzhou.aliyuncs.com/20181024145128hcclxo3wl.jpg', '2');
INSERT INTO `en_broadcast` VALUES ('3', '轮播3', 'https://ascasc.oss-cn-https://ascasc.oss-cn-hangzhou.aliyuncs.com/201810241452511zpicq11z.jpg', '3');
INSERT INTO `en_broadcast` VALUES ('4', '轮播4', 'https://ascasc.oss-cn-https://ascasc.oss-cn-hangzhou.aliyuncs.com/20181024145541yr6hc2vb2.jpg', '4');

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
INSERT INTO `en_content` VALUES ('2', 'eQzruthc', '<h1 style=\"text-align: center; \">\n\n\n</h1><h1 style=\"box-sizing: border-box; margin: 5px 0px 10px; font-size: 30px; font-family: \'open sans\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-weight: 100; line-height: 1.1; font-style: normal; font-variant: normal; letter-spacing: normal; orphans: auto; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-align: center;\"><font style=\"box-sizing: border-box;\" color=\"#424242\"><br class=\"Apple-interchange-newline\"><br style=\"box-sizing: border-box;\"></font></h1><h1 style=\"text-align: center; \"><font color=\"#424242\"><br class=\"Apple-interchange-newline\"></font></h1><h1 style=\"text-align: center; \"><font color=\"#ffffff\">首页1</font><br></h1>', '首页1', '1', '1540278816');
INSERT INTO `en_content` VALUES ('3', 'r9yrsiQg', '<h1 style=\"text-align: center; \">首页2</h1>', '首页2', '1', '1540281616');
INSERT INTO `en_content` VALUES ('4', 'p8endget', '<h1 style=\"text-align: center; \"><font color=\"#ffffff\">首页3</font></h1>', '首页3', '1', '1540281966');
INSERT INTO `en_content` VALUES ('5', 'a5uofucx', '<h1 style=\"text-align: center; \"><font color=\"#ffffff\">首页4</font></h1>', '首页4', '1', '1540281998');
INSERT INTO `en_content` VALUES ('6', '8aw3Qa9b', '<h1 style=\"text-align: center; \">公共底部1</h1>', '公共底部1', '1', '1540282023');
INSERT INTO `en_content` VALUES ('7', 'dzmQzbjp', '<h1 style=\"text-align: center; \"><font color=\"#ffffff\">公共底部2</font></h1>', '公共底部2', '1', '1540282051');
INSERT INTO `en_content` VALUES ('8', 't7pykzyu', '<h1 style=\"text-align: center; \">产品简介1</h1>', '产品简介1', '1', '1540283054');
INSERT INTO `en_content` VALUES ('9', 'bkj21hap', '<h1 style=\"text-align: center; \">产品展示1</h1>', '产品展示1', '1', '1540283240');
INSERT INTO `en_content` VALUES ('10', '6ozqdcjg', '<h1 style=\"text-align: center; \">成功案例1</h1>', '成功案例1', '1', '1540283280');
INSERT INTO `en_content` VALUES ('11', 'Q1d4n865', '<h1 style=\"text-align: center; \">开放平台1</h1>', '开放平台1', '1', '1540283307');
INSERT INTO `en_content` VALUES ('12', 'di9lfk7l', '<h1 style=\"text-align: center; \">联系我们1</h1>', '联系我们1', '1', '1540360213');

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
INSERT INTO `en_images` VALUES ('1', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/20181024162840m858cx3st.jpg', '案例1', '1');
INSERT INTO `en_images` VALUES ('2', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/20181024163002tcggwrpb5.jpg', '案例2', '2');
INSERT INTO `en_images` VALUES ('3', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/20181024163023gg4bg5o98.jpg', '案例3', '3');
INSERT INTO `en_images` VALUES ('4', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/20181024163042p7zmkw2ja.jpg', '案例4', '4');

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
INSERT INTO `en_job` VALUES ('1', 'root', '0', '1,2,3,4,5,8,9,10,11,6,7');
INSERT INTO `en_job` VALUES ('2', 'admin', '1', '1,2,4,5,8,9,10,11,6,7');

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
-- Table structure for en_module
-- ----------------------------
DROP TABLE IF EXISTS `en_module`;
CREATE TABLE `en_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT '' COMMENT '标题',
  `image` varchar(1000) DEFAULT '' COMMENT '图片',
  `content` varchar(1000) DEFAULT '' COMMENT '内容',
  `remark` varchar(255) DEFAULT '' COMMENT '备注',
  `sort` tinyint(2) unsigned DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='前台模块表';

-- ----------------------------
-- Records of en_module
-- ----------------------------

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='用户权限表';

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
INSERT INTO `en_power` VALUES ('8', '5', '4e57tirz', '1', '内容列表', '/content/content/list', '0');
INSERT INTO `en_power` VALUES ('9', '5', 'glpm5l3Q', '1', '导航管理', '/content/nav/list', '999');
INSERT INTO `en_power` VALUES ('10', '5', 'r8ojb371', '1', '轮播管理', '/content/bro/list', '998');
INSERT INTO `en_power` VALUES ('11', '5', '2jwoicom', '1', '案例管理', '/content/image/list', '997');
INSERT INTO `en_power` VALUES ('12', '5', 'lkbtlnfc', '1', '模块管理', '/content/module/list', '996');
