/*
Navicat MySQL Data Transfer

Source Server         : 服务器A
Source Server Version : 50641
Source Host           : 47.99.36.149:3306
Source Database       : en

Target Server Type    : MYSQL
Target Server Version : 50641
File Encoding         : 65001

Date: 2018-11-07 16:17:19
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
-- Table structure for en_article
-- ----------------------------
DROP TABLE IF EXISTS `en_article`;
CREATE TABLE `en_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT '' COMMENT '文章标题',
  `seo_keywords` varchar(255) DEFAULT '' COMMENT 'SEO关键词',
  `seo_title` varchar(255) DEFAULT '' COMMENT 'SEO标题',
  `seo_content` varchar(255) DEFAULT '' COMMENT 'SEO内容描述',
  `summary` varchar(255) DEFAULT '' COMMENT '文章简介',
  `content` varchar(10000) DEFAULT '' COMMENT '文章内容',
  `image` varchar(255) DEFAULT '' COMMENT '图片',
  `author` varchar(20) DEFAULT '' COMMENT '作者',
  `source` varchar(255) DEFAULT '' COMMENT '文章来源',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  `created` int(11) unsigned DEFAULT '0' COMMENT '创建时间',
  `modified` int(11) unsigned DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='文章发布表';

-- ----------------------------
-- Records of en_article
-- ----------------------------
INSERT INTO `en_article` VALUES ('1', '湖南充电联盟成立 两年内将建充电桩约18万个', '充电站 充电桩投桩 新能源汽车', '湖南充电桩', '充电桩投桩', '湖南省将新建电动汽车充电桩约18万个', '<p style=\"margin-bottom: 25px; padding: 0px; color: rgb(51, 51, 51); font-family: 宋体, verdana, sans-serif; font-size: 18px;\">上证报讯 11月6日，湖南省电动汽车充电基础设施促进联盟（以下简称“湖南充电联盟”）成立，计划到2020年底前，在湖南省范围大力推进充电设施建设，包括新建电动汽车充电桩约18万个，并打造湖南省统一充电设施运营服务平台，实现电动汽车充电基础设施互联互通。</p><p style=\"margin-bottom: 25px; padding: 0px; color: rgb(51, 51, 51); font-family: 宋体, verdana, sans-serif; font-size: 18px;\">　　湖南日报11月7日消息，“目前，全省电动汽车充电桩不足2万个。”国网（湖南）电动汽车服务有限公司总经理朱盛开表示，湖南省充电基础设施建设存在规模不足、布局不合理、设施通用性较差等问题，难以满足电动汽车充电需求。根据《湖南省电动汽车充电基础设施专项规划（2016-2020）》，预计到2020年，湖南省电动汽车保有量将增至22万辆。</p><p style=\"margin-bottom: 25px; padding: 0px; color: rgb(51, 51, 51); font-family: 宋体, verdana, sans-serif; font-size: 18px;\">　　为支持电动汽车发展，打破壁垒，促进充电设施互联互通跨领域协同，实现电动汽车“走遍三湘，通达各市”，湖南省能源局主导、国网（湖南）电动汽车服务有限公司牵头，联合电动汽车、充电桩、电池、储能、港口岸电等相关企业，发起成立了合作型非盈利性社会组织“湖南充电联盟”。</p><p style=\"margin-bottom: 25px; padding: 0px; color: rgb(51, 51, 51); font-family: 宋体, verdana, sans-serif; font-size: 18px;\"><br></p><p style=\"margin-bottom: 25px; padding: 0px; color: rgb(51, 51, 51); font-family: 宋体, verdana, sans-serif; font-size: 18px;\"><br></p><p style=\"text-align: right; margin-bottom: 25px; padding: 0px; color: rgb(51, 51, 51); font-family: 宋体, verdana, sans-serif; font-size: 18px;\">文章来源于网络收录如有侵权请联系客服</p>', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/20181107135353svu1Qrtly.png', '网络收录', '网络收录', null, '1541570089', '1541570199');
INSERT INTO `en_article` VALUES ('2', '个人安装充电桩，为何难以实施？', '个人充电桩安装 充电桩投桩 充电站投桩', '个人充电桩安装', '如何安装个人充电桩', '个人充电桩难安装吗？', '<p><span style=\"font-family: 微软雅黑; font-size: 18px;\">市民张先生购买了一辆新能源电动汽车，相对汽油车来讲，费用特别省，可就是充电麻烦。</span><br style=\"font-family: 微软雅黑; font-size: 18px;\"><span style=\"font-family: 微软雅黑; font-size: 18px;\">&nbsp;&nbsp;&nbsp;&nbsp;张先生表示：“我家在旧晋祠路上住，最近的充电桩在长风商务区，每次给车充电，都去长风商务区的地库。考虑到第二天上下班跑的路途较远，怕电不够用，我充好电后，就将车先放在地库，再骑自行车回家。到了第二天，再骑车去开车。如此一来，很不方便。如果用车上自带的充电器，用家庭用电充电，得五六个小时，因私自拉电线，物业警告过几次。到专业的充电桩充电，一个多小时就能充满，可我要干耗一个小时，一次两次无所谓，时间长了就耗不住了。我就想着在小区自家车位上安装充电桩，结果物业不同意。我查阅过省里下发的文件，其中表示已建成的住宅小区，由业主委员会或产权所有人按照物业管理相关法律法规选择充电服务企业，为业主或车位承租人提供充电设施及相关服务。政策都允许业主自己安装充电桩，物业为何要卡？”</span><br style=\"font-family: 微软雅黑; font-size: 18px;\"><span style=\"font-family: 微软雅黑; font-size: 18px;\">&nbsp;&nbsp;&nbsp;&nbsp;对此，物业的答复是：“不是不同意安装，小区的停车场没有专项电源，也没有安装的先例，涉及到用电方面的事，一定要谨慎。安装的充电桩超过小区的用电容量后，会引起一系列的连锁反应。如果确实有政策，物业不会阻拦。但需要供电公司的人员上门操作才行。”</span><br style=\"font-family: 微软雅黑; font-size: 18px;\"><span style=\"font-family: 微软雅黑; font-size: 18px;\">&nbsp;&nbsp;&nbsp;&nbsp;那么，安装充电桩需要什么样的流程？记者了解到，第一步，找小区物业出具书面证明，同意安装充电桩；第二步，向供电部门进行用电报装申请，需要客户或委托人有效身份证明以及《新能源小客车购车充电条件确认书》；第三步为现场考察阶段，最好电力公司、充电桩安装公司同时到场，安装电表、确认电源点、走线；第四步，安装充电桩；第五步，验收通过后充电桩就可以使用了。</span><br style=\"font-family: 微软雅黑; font-size: 18px;\"><span style=\"font-family: 微软雅黑; font-size: 18px;\">&nbsp;&nbsp;&nbsp;&nbsp;记者从国家电网太原供电公司了解到，目前，个人申请安装充电桩的很少，许多车型使用家里220伏的电就能充，只不过是充得慢一些。供电公司工作人员表示：“一个充电桩日平均负荷40千瓦，相当于5户居民家庭用电负荷，所以，很多小区的供电设备容量达不到充电桩的安装要求，容易影响供电设备的安全运行。”工作人员建议，市民在购买新能源汽车时，一定要购买符合国家标准的车型。</span><br style=\"font-family: 微软雅黑; font-size: 18px;\"><span style=\"font-family: 微软雅黑; font-size: 18px;\">&nbsp;&nbsp;&nbsp;&nbsp;此外，个人安装充电桩一事，我省对业主申请时也有相关规定。根据《山西省电动汽车充电基础设施专项规划（2016-2020年）》文件，山西将优先发展太原、晋中、晋城3个电动汽车基础设施推广重点城市的充（换）电设施服务网络，太原市将在五年内配建102个充电站、5万个充电桩。其中，就保障居民用户充电设施建设，文件中提到，已建成的住宅小区，由业主委员会或产权所有人按照物业管理相关法律法规选择充电服务企业，为业主或车位承租人提供充电设施及相关服务。业主委员会和物业服务企业应支持用户结合车位配建充电设施，汽车销售和充电服务企业要做好配套服务。通过分时共享、立体停车充电一体化设施等多种方式为无固定停车位的用户提供服务，形成可持续市场化推进机制。</span><br style=\"font-family: 微软雅黑; font-size: 18px;\"><span style=\"font-family: 微软雅黑; font-size: 18px;\">&nbsp;&nbsp;&nbsp;&nbsp;根据《山西省电动汽车充电基础设施专项规划（2016-2020年）》文件，2020年末，要建成由343座集中式充（换）电站（283座城市集中式充换电站、60座高速城际快充电站）、19万个散式充电桩、1个充电智能服务平台构成的覆盖全省、布局合理、高效智能的充（换）电基础设施体系。电动汽车充电基础设施推广重点城市（太原市、晋城市和晋中市）核心区域平均服务半径不超过1公里。虽然目前车主给新能源汽车充电还存在一些问题，但根据规划，不久之后，充电会越来越方便。</span></p><p style=\"text-align: right; \"><span style=\"font-family: 微软雅黑; font-size: 18px;\"><br></span></p><p><span style=\"color: rgb(51, 51, 51); font-family: 宋体, verdana, sans-serif; font-size: 18px; text-align: right;\">文章来源于网络收录如有侵权请联系客服</span><span style=\"font-family: 微软雅黑; font-size: 18px;\"><br></span><br></p>', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/20181107135843fn7trrdtv.jpg', '网络收录', '网络收录', null, '1541570491', '1541570491');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='联系方式配置表';

-- ----------------------------
-- Records of en_contact
-- ----------------------------
INSERT INTO `en_contact` VALUES ('1', '业务咨询', 'http://www.scpxkj.cn/menu/menu/contact', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='前台文本内容修改表';

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='图片墙配置表';

-- ----------------------------
-- Records of en_images
-- ----------------------------
INSERT INTO `en_images` VALUES ('1', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/20181026150527QneQc3h93.jpg', '案例1', '1');
INSERT INTO `en_images` VALUES ('2', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/201810261505381od1sggfo.jpg', '案例2', '2');
INSERT INTO `en_images` VALUES ('3', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/20181026150548pjfQpvybs.jpg', '案例3', '3');
INSERT INTO `en_images` VALUES ('4', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/20181026150556jp8dQha7w.jpg', '案例4', '4');
INSERT INTO `en_images` VALUES ('5', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/2018102615060656xh37nki.jpg', '案例5', null);
INSERT INTO `en_images` VALUES ('6', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/20181026150616sthgdd3my.jpg', '案例6', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='用户职位表';

-- ----------------------------
-- Records of en_job
-- ----------------------------
INSERT INTO `en_job` VALUES ('1', 'root', '0', '1,2,3,4,5,8,9,10,11,12,13,14,15,16,17,18,19,6,7');
INSERT INTO `en_job` VALUES ('2', 'admin', '1', '1,2,4,5,8,9,10,11,12,13,14,15,16,17,18,19,6,7');

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
  `refresh` int(10) unsigned DEFAULT '0' COMMENT '页面刷新时间',
  `title` varchar(50) DEFAULT '' COMMENT '页面标题',
  `keywords` varchar(50) DEFAULT '' COMMENT '关键词',
  `description` varchar(300) DEFAULT '' COMMENT '页面描述',
  `sort` int(10) unsigned DEFAULT '1' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='前台导航栏表';

-- ----------------------------
-- Records of en_nav
-- ----------------------------
INSERT INTO `en_nav` VALUES ('2', '业务介绍', '/menu/menu/about', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/20181026172853c2flq92ew.jpg', '0', '新能源_充电桩_充电站_场地_投资_建桩_建站_投资预算_四川亿能_四川亿能科技有限公司', '新能源，充电桩，充电站，场地，投资，建桩，建站，投资预算，四川亿能，四川亿能科技有限公司', '新能源 充电桩 充电站 场地 投资 建桩 建站 投资预算 四川亿能 四川亿能科技有限公司', '2');
INSERT INTO `en_nav` VALUES ('3', '开放平台', '/menu/menu/service', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/20181026172956qt5pnqt2v.jpg', '0', '新能源_充电桩_充电站_场地_投资_建桩_建站_投资预算_四川亿能_四川亿能科技有限公司', '新能源，充电桩，充电站，场地，投资，建桩，建站，投资预算，四川亿能，四川亿能科技有限公司', '新能源 充电桩 充电站 场地 投资 建桩 建站 投资预算 四川亿能 四川亿能科技有限公司', '6');
INSERT INTO `en_nav` VALUES ('4', '成功案例', '/menu/menu/gallery', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/201810261729481cesyx6ho.jpg', '0', '新能源_充电桩_充电站_场地_投资_建桩_建站_投资预算_四川亿能_四川亿能科技有限公司', '新能源，充电桩，充电站，场地，投资，建桩，建站，投资预算，四川亿能，四川亿能科技有限公司', '新能源 充电桩 充电站 场地 投资 建桩 建站 投资预算 四川亿能 四川亿能科技有限公司', '4');
INSERT INTO `en_nav` VALUES ('6', '联系我们', '/menu/menu/contact', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/201810261730051cwzjk5sm.jpg', '0', '新能源_充电桩_充电站_场地_投资_建桩_建站_投资预算_四川亿能_四川亿能科技有限公司', '新能源，充电桩，充电站，场地，投资，建桩，建站，投资预算，四川亿能，四川亿能科技有限公司', '新能源 充电桩 充电站 场地 投资 建桩 建站 投资预算 四川亿能 四川亿能科技有限公司', '8');
INSERT INTO `en_nav` VALUES ('7', '产品介绍', '/menu/menu/product', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/20181030160919Qf2wcjof4.jpg', '0', '新能源_充电桩_充电站_场地_投资_建桩_建站_投资预算_四川亿能_四川亿能科技有限公司', '新能源，充电桩，充电站，场地，投资，建桩，建站，投资预算，四川亿能，四川亿能科技有限公司', '新能源 充电桩 充电站 场地 投资 建桩 建站 投资预算 四川亿能 四川亿能科技有限公司', '3');
INSERT INTO `en_nav` VALUES ('8', '收益预测', '/menu/menu/budget', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/20181102121706geQ3ot57g.jpg', '0', '新能源_充电桩_充电站_场地_投资_建桩_建站_投资预算_四川亿能_四川亿能科技有限公司', '新能源，充电桩，充电站，场地，投资，建桩，建站，投资预算，四川亿能，四川亿能科技有限公司', '新能源 充电桩 充电站 场地 投资 建桩 建站 投资预算 四川亿能 四川亿能科技有限公司', '7');
INSERT INTO `en_nav` VALUES ('9', '新闻动态', '/menu/menu/news', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/20181106182850jzhrj8gcx.jpg', '0', '新能源_充电桩_充电桩_充电桩场地_充电桩投资_信息咨询平台_四川亿能_四川亿能科技有限公司', '新能源，充电桩，充电站，充电桩场地，充电桩投资，信息咨询平台，四川亿能，四川亿能科技有限公司', '新能源 充电桩 充电站 场地 投资 建桩 建站 投资预算 四川亿能 四川亿能科技有限公司', '5');

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='用户权限表';

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
INSERT INTO `en_power` VALUES ('13', '5', 'yi17v4vi', '1', '友情链接管理', '/content/friend/list', '993');
INSERT INTO `en_power` VALUES ('14', '5', 'no1vvr5l', '1', '联系方式管理', '/content/contact/list', '993');
INSERT INTO `en_power` VALUES ('15', '5', 'z4g2fhea', '1', '开放管理', '/content/open/list', '995');
INSERT INTO `en_power` VALUES ('16', '5', 'yfsaclxf', '1', '业务员信息管理', '/content/salesman/list', '992');
INSERT INTO `en_power` VALUES ('17', '5', 'c2yvpb8k', '1', '产品管理', '/content/product/list', '995');
INSERT INTO `en_power` VALUES ('18', '5', 'yiondppz', '1', '变压器管理', '/content/transformer/list', '994');
INSERT INTO `en_power` VALUES ('19', '5', '32cslp53', '1', '新闻管理', '/content/article/list', '995');

-- ----------------------------
-- Table structure for en_product
-- ----------------------------
DROP TABLE IF EXISTS `en_product`;
CREATE TABLE `en_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '' COMMENT '产品名称',
  `image` varchar(600) DEFAULT '' COMMENT '图片',
  `parameter` varchar(600) DEFAULT '' COMMENT '参数图片',
  `summary` varchar(255) DEFAULT '' COMMENT '产品简介',
  `intro` varchar(10000) DEFAULT '' COMMENT '产品介绍',
  `price` varchar(20) DEFAULT '' COMMENT '价格',
  `power` varchar(8) DEFAULT '' COMMENT '功率',
  `para` varchar(30) DEFAULT '' COMMENT '分段',
  `electric_loss` varchar(10) DEFAULT '' COMMENT '电损率',
  `availability` varchar(10) DEFAULT '' COMMENT '利用率',
  `electrovalency` varchar(10) DEFAULT '' COMMENT '参考服务费',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='产品配置表';

-- ----------------------------
-- Records of en_product
-- ----------------------------
INSERT INTO `en_product` VALUES ('6', '分体式360KW直流充电桩', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/2018110716025968daw142d.png', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/20181107155744xf8sbz3kl.png', '超大功率输出，充电速度更快 运营成本低 安全可靠', '<p class=\"MsoNormal\" style=\"layout-grid-mode:char;line-height:12.0000pt;\"><b><span style=\"font-family: 宋体; font-size: 14pt;\"><font face=\"宋体\">产品简介</font></span></b><b><span style=\"font-family: 宋体; font-size: 14pt;\"><o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"layout-grid-mode:char;line-height:12.0000pt;\"><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">本</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">系列</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">直流充电桩</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">可根据充电模块安装数量实现</font>15KW-360KW不同功率配置。</span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">柔性功率分配，</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">提高</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">充电效率和设备利用率，</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">既可</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">满足快速充电需求，</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">同时</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">也可</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">满足群充充电需求。主要应用于城市快充站、公交场站等需求大功率直流快充的充电场站。</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"layout-grid-mode:char;line-height:12.0000pt;\"><b><span style=\"font-family: 宋体; font-size: 14pt;\"><font face=\"宋体\">功能特点</font></span></b><b><span style=\"font-family: 宋体; font-size: 14pt;\"><o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"layout-grid-mode:char;line-height:12.0000pt;\"><b><span style=\"font-family: 宋体; font-size: 12pt;\"><font face=\"宋体\">智能</font></span></b><b><span style=\"font-family: 宋体; font-size: 12pt;\"><o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"layout-grid-mode:char;line-height:12.0000pt;\"><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">超</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">大功率输出，充电速度更快</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"layout-grid-mode:char;line-height:12.0000pt;\"><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">一拖多群充设计，可支持</font>20辆车同时充电，无需夜间挪车</span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"layout-grid-mode:char;line-height:12.0000pt;\"><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">支持轮充、均充、智能充多种充电策略</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">，</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">充电方式更灵活</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"layout-grid-mode:char;line-height:12.0000pt;\"><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">车充自动识别，智能快捷</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"layout-grid-mode:char;line-height:12.0000pt;\"><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\">CMS柔性充电，延长电池30%寿命周期</span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"layout-grid-mode:char;line-height:12.0000pt;\"><b><span style=\"font-family: 宋体; font-size: 12pt;\"><o:p>&nbsp;</o:p></span></b></p><p class=\"MsoNormal\" style=\"layout-grid-mode:char;line-height:12.0000pt;\"><b><span style=\"font-family: 宋体; font-size: 12pt;\"><font face=\"宋体\">低成本</font></span></b><b><span style=\"font-family: 宋体; font-size: 12pt;\"><o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"layout-grid-mode:char;line-height:12.0000pt;\"><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">柔性功率分配，提高设备利用率，降低初始投资成本</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"layout-grid-mode:char;line-height:12.0000pt;\"><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">传热流体分析技术，满载散热量低至</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\">5%，降低电损费用</span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"layout-grid-mode:char;line-height:12.0000pt;\"><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\">No-Load功率智能控制，超低待机功耗，降低运营费用</span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"layout-grid-mode:char;line-height:12.0000pt;\"><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">定制化峰谷计费功能，节省充电成本</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"layout-grid-mode:char;line-height:12.0000pt;\"><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><o:p>&nbsp;</o:p></span></p><p class=\"MsoNormal\" style=\"layout-grid-mode:char;line-height:12.0000pt;\"><b><span style=\"font-family: 宋体; font-size: 12pt;\"><font face=\"宋体\">安全</font></span></b><b><span style=\"font-family: 宋体; font-size: 12pt;\"><o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"layout-grid-mode:char;line-height:12.0000pt;\"><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">可靠</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\">AFCI（电弧故障分断功能），有效防止直流拉弧风险</span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"layout-grid-mode:char;line-height:12.0000pt;\"><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">充电数据管家式管理，确保用户充电数据完整性与安全性</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"layout-grid-mode:char;line-height:12.0000pt;\"><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">整机运行状态监测、控制保护功能，确保用户充电安全</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"layout-grid-mode:char;line-height:12.0000pt;\"><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><o:p>&nbsp;</o:p></span></p><p class=\"MsoNormal\" style=\"layout-grid-mode:char;line-height:12.0000pt;\"><b><span style=\"font-family: 宋体; font-size: 12pt;\"><font face=\"宋体\">易维护</font></span></b><b><span style=\"font-family: 宋体; font-size: 12pt;\"><o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"layout-grid-mode:char;line-height:12.0000pt;\"><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">模块化设计，配置易于维护</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><o:p></o:p></span></p>', '252000', '360', '3-4-6-10', '0.03', '0.2', '0.6', '1');
INSERT INTO `en_product` VALUES ('7', '一体式60KW直流充电桩', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/2018110710553463fnuw5zd.png', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/20181107103420zd48v1v82.png', '智能高效 耐候性更佳 实用便捷', '<p class=\"MsoNormal\" style=\"text-align: justify;\"><b><span style=\"font-family: 宋体; font-size: 12pt;\"><font face=\"宋体\">产品简介：</font></span></b><b><span style=\"font-family: 宋体; font-size: 12pt;\"><o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"text-align: justify; line-height: 17pt;\"><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">直流充电桩为电动汽车提供直流快速充电解决方案，本产品集充电模块、</font></span></p><p class=\"MsoNormal\" style=\"text-align: justify; line-height: 17pt;\"><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">充电控制、计量计费、通讯等功能为一体。产品放置于室外专为电动公</font></span><span style=\"font-family: 宋体; font-size: 12pt;\"><font face=\"宋体\">交</font></span></p><p class=\"MsoNormal\" style=\"text-align: justify; line-height: 17pt;\"><span style=\"font-family: 宋体; font-size: 12pt;\"><font face=\"宋体\">车，</font></span><span style=\"font-family: 宋体; font-size: 12pt;\">大型电动客车及中小型电动汽车提供充电服务，可应用于大型</span><span style=\"font-family: 宋体; font-size: 12pt;\">电</span><span style=\"font-family: 宋体; font-size: 12pt;\">动</span></p><p class=\"MsoNormal\" style=\"text-align: justify; line-height: 17pt;\"><span style=\"font-family: 宋体; font-size: 12pt;\">公</span><span style=\"font-family: 宋体; font-size: 12pt;\">交场站，公共电动充电站等场所。</span></p><p class=\"MsoNormal\" style=\"text-align: justify;\"><b><span style=\"font-family: 宋体; font-size: 12pt;\"><font face=\"宋体\">功能卖点</font></span></b><b><span style=\"font-family: 宋体; font-size: 12pt;\"><o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"text-align: justify; line-height: 17pt;\"><b><span style=\"font-family: 宋体; font-size: 12pt;\"><font face=\"宋体\">智能高效</font></span></b><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align: justify; line-height: 17pt;\"><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">系统效率高于</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\">95%</span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">；高功率密度，节省系统运行成本；高功率因数，谐波畸</font></span></p><p class=\"MsoNormal\" style=\"text-align: justify; line-height: 17pt;\"><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">变</font></span><span style=\"font-family: 宋体; font-size: 12pt;\"><font face=\"宋体\">率低，</font></span><span style=\"font-family: 宋体; font-size: 12pt;\">绿色无污染。</span></p><p class=\"MsoNormal\" style=\"text-align: justify; line-height: 17pt;\"><b><span style=\"font-family: 宋体; font-size: 12pt;\"><font face=\"宋体\">安全保护</font></span></b><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align: justify; line-height: 17pt;\"><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">具有短路、过流、过压、过充、防反接等保护功能；具有水浸报警等功能</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align: justify; line-height: 17pt;\"><b><span style=\"font-family: 宋体; font-size: 12pt;\"><font face=\"宋体\">耐候性更佳</font></span></b><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align: justify; line-height: 17pt;\"><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">具有优异的抗严寒、耐高温、耐盐雾、防潮等功能</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align: justify; line-height: 17pt;\"><b><span style=\"font-family: 宋体; font-size: 12pt;\"><font face=\"宋体\">便捷</font></span></b><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align: justify; line-height: 17pt;\"><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\">SOC</span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">灯指示功能，可实时监测机器运行状态</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><o:p></o:p></span></p>', '42000', '60', '1-2', '0.05', '0.25', '0.6', '2');
INSERT INTO `en_product` VALUES ('8', '一体式60WK高防护直流充电桩', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/201811071146549lfkz4823.png', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/20181107113512cl631obf1.png', '更强环境适应性 更低的运营成本 更低的维护成本。', '<p class=\"MsoNormal\"><b><span style=\"font-family: 宋体; font-size: 11pt;\"><font face=\"宋体\">技术亮点</font></span></b><b><span style=\"font-family: 宋体; font-size: 11pt;\"><o:p></o:p></span></b></p><p class=\"15\" style=\"margin-left:17.8500pt;text-indent:0.0000pt;mso-char-indent-count:0.0000;line-height:17.0000pt;mso-line-height-rule:exactly;\"><b><span style=\"font-family: 宋体; font-size: 12pt;\"><font face=\"宋体\">更强环境适应性</font></span></b><b><span style=\"font-family: 宋体; color: rgb(91, 155, 213); font-size: 12pt;\"><o:p></o:p></span></b></p><p class=\"15\" style=\"margin-left:17.8500pt;text-indent:0.0000pt;mso-char-indent-count:0.0000;line-height:17.0000pt;mso-line-height-rule:exactly;\"><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">可适应强降雨、强风沙、高盐雾、高海拔、超低温等各种</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">严酷环境考验</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">，满足</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">各种环境</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">下的</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">充电需求。</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><o:p></o:p></span></p><p class=\"15\" style=\"margin-left:17.8500pt;text-indent:0.0000pt;mso-char-indent-count:0.0000;line-height:17.0000pt;mso-line-height-rule:exactly;\"><b><span style=\"font-family: 宋体; font-size: 12pt;\"><font face=\"宋体\">更低的维护成本。</font></span></b><b><span style=\"font-family: 宋体; font-size: 12pt;\"><o:p></o:p></span></b></p><p class=\"15\" style=\"margin-left:17.8500pt;text-indent:0.0000pt;mso-char-indent-count:0.0000;line-height:17.0000pt;mso-line-height-rule:exactly;\"><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">采用双风道隔离式换热器散热方案，有效杜绝外部环境的污染，延长维护周期、减小维护难度、降低维修频次。</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><o:p></o:p></span></p><p class=\"15\" style=\"margin-left:17.8500pt;text-indent:0.0000pt;mso-char-indent-count:0.0000;line-height:17.0000pt;mso-line-height-rule:exactly;\"><b><span style=\"font-family: 宋体; font-size: 12pt;\"><font face=\"宋体\">更低的运营成本。</font></span></b><b><span style=\"font-family: 宋体; color: rgb(91, 155, 213); font-size: 12pt; background: rgb(127, 127, 127);\"><o:p></o:p></span></b></p><p class=\"15\" style=\"margin-left:17.8500pt;text-indent:0.0000pt;mso-char-indent-count:0.0000;line-height:17.0000pt;mso-line-height-rule:exactly;\"><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><font face=\"宋体\">智能化温控技术，根据环境温度和充电功率动态调节风机转速，有效降低充电机待机损耗、运行功耗，从而降低运营成本。</font></span><span style=\"mso-spacerun:\'yes\';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;\"><o:p></o:p></span></p><p class=\"15\" style=\"margin-left:17.8500pt;text-indent:0.0000pt;mso-char-indent-count:0.0000;line-height:17.0000pt;mso-line-height-rule:exactly;\"><b><span style=\"font-family: 宋体; font-size: 12pt;\"><font face=\"宋体\">更高</font></span></b><b><span style=\"font-family: 宋体; font-size: 12pt;\"><font face=\"宋体\">的可靠</font></span></b><b><span style=\"font-family: 宋体; font-size: 12pt;\"><font face=\"宋体\">性</font></span></b></p><p class=\"15\" style=\"margin-left:17.8500pt;text-indent:0.0000pt;mso-char-indent-count:0.0000;line-height:17.0000pt;mso-line-height-rule:exactly;\"><span style=\"text-indent: 0pt; font-family: 宋体; font-size: 12pt;\"><font face=\"宋体\">充电机核心组件的防护等级高达</font>IP65，保障</span><span style=\"text-indent: 0pt; font-family: 宋体; font-size: 12pt;\"><font face=\"宋体\">产品安全可靠。</font></span></p><p class=\"MsoNormal\"><b><span style=\"font-family: 宋体; font-size: 12pt;\"><font face=\"宋体\">主要功能</font></span></b></p><p class=\"MsoNormal\"><b><span style=\"font-family: 宋体; font-size: 12pt;\"><font face=\"宋体\"><br></font></span></b><span style=\"font-family: 宋体; font-size: 12pt; text-indent: 0pt;\">1，独立除湿功能，有效防止柜内凝露，确保设备正常工作；</span></p><p class=\"MsoNormal\"><span style=\"text-indent: 0pt; font-family: 宋体; font-size: 12pt;\">2</span><span style=\"text-indent: 0pt; font-family: 宋体; font-size: 12pt;\"><font face=\"宋体\">，</font>SOC实时动态显示功能，方便用户直观观测充电状态；</span></p><p class=\"MsoNormal\"><span style=\"font-family: 宋体; font-size: 12pt; text-indent: 0pt;\">3，根据用户车辆充电需求，动态分配输出功率，智能便捷；</span></p><p class=\"MsoNormal\"><span style=\"font-family: 宋体; font-size: 12pt; text-indent: 0pt;\">4，充电协议兼容功能，满足市场所有新、老国标电动车的充电需求</span></p><p class=\"MsoNormal\"><span style=\"text-indent: 0pt; font-family: 宋体; font-size: 12pt;\">5，具备输入过载、输入短路、输入过压、输入欠压、输出过压、输出短路、输出接地保护、充电连接异常、过温保护、输出防反接、接触器粘连保护等多种</span><span style=\"text-indent: 0pt; font-family: 宋体; font-size: 12pt;\"><font face=\"宋体\">保护</font></span><span style=\"text-indent: 0pt; font-family: 宋体; font-size: 12pt;\"><font face=\"宋体\">功能；</font></span></p><p class=\"MsoNormal\"><span style=\"font-family: 宋体; font-size: 12pt; text-indent: 0pt;\">6，多种充电启动方式：刷卡、VIN、APP、本地；</span></p><p class=\"MsoNormal\"><span style=\"text-indent: 0pt; font-family: 宋体; font-size: 12pt;\">7</span><span style=\"text-indent: 0pt; font-family: 宋体; font-size: 12pt;\"><font face=\"宋体\">，</font>24V BMS电源兼容（定制）功能，满足市场所有电动车BMS电源需求；</span></p><p class=\"MsoNormal\"><span style=\"font-family: 宋体; font-size: 12pt; text-indent: 0pt;\">8，枪线长度可根据客户需求定制，有效解决油车占位问题。</span></p>', '48000', '60', '1-2', '0.03', '0.25', '0.6', '3');
INSERT INTO `en_product` VALUES ('9', '分体式120KW直流充电桩', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/201811071604337ftkahQ4m.png', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/20181107155104zpdeg5lfb.png', '高效便捷式分体 智能终端充电桩', '<p>产品简介</p><p>2018年《电动汽车充电设备供应商资质能力核实标准》要求而设计的定制版直流充电机产品。</p><p>产品专为电动公交车，大型电动客车及中小型电动汽车提供充电服务，可应用于大型电动公交场站，公共电动充电站等场所。</p><p>技术亮点</p><p>1）产品支持语音提示和蓝牙通讯功能</p><p>2）产品支持350Vdc～750Vdc恒功率电能输出</p><p>3）直流充电机每个接口独立刷卡计费。每个充电接口输出电能独立计量，独立显示</p><p>4）产品满足60kW～120kW不同功率等级，100V～750V宽范围电压输出等级的要求</p><p>5）一体式一机双枪和分体式一机双桩直流充电机具备输出功率自动分配功能。</p><p>6）充电机内部安装有温湿度控制器和加热器，可对充电机内部温湿度进行调节。</p><p>7）模块化结构设计，便于后期市场维护</p><p>主要功能</p><p>1） 启机方式，支持亿能充电卡和特来电APP充电</p><p>2） 计费功能，计费控制单元（TCU）和充电控制器通过CAN接口通讯</p><p>3） 计量功能，充电机应具有对每个充电接口输出电能进行计量的功能，计量仪表满足Q/GDW 1825-2013直流电表技术规范，JJG 842-1993直流电能表检定规程和GB/T 29318-2012电动汽车非车载充电机电能计量的检定要求。</p><p>4） 安全保护，具备输入过压和欠压保护、输出过压、过流和短路保护、过温保护、充电连接异常、电池反接保护、接触器粘连保护等多种保护功能</p><p>5） 枪头过温实时监测和保护，保障充电安全</p><div><br></div>', '84000', '120', '1-2', '0.03', '0.25', '0.6', '4');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='业务员配置表';

-- ----------------------------
-- Records of en_salesman
-- ----------------------------
INSERT INTO `en_salesman` VALUES ('4', '西南地区业务', '负责云、贵、川地区销售，合伙人招募，企业政府申报业务。', 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/20181026152152ri9ph6x9s.jpg', '吴经理', '18581501718', '1');

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

-- ----------------------------
-- Table structure for en_transformer
-- ----------------------------
DROP TABLE IF EXISTS `en_transformer`;
CREATE TABLE `en_transformer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '' COMMENT '变压器名称',
  `min` varchar(255) DEFAULT '' COMMENT '最小值',
  `max` varchar(255) DEFAULT '' COMMENT '最大值',
  `price` varchar(20) DEFAULT '0' COMMENT '价格',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='变压器配置表';

-- ----------------------------
-- Records of en_transformer
-- ----------------------------
