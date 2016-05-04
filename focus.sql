/*
Navicat MySQL Data Transfer

Source Server         : lrf
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : focus

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2016-04-29 16:03:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `foc_group`
-- ----------------------------
DROP TABLE IF EXISTS `foc_group`;
CREATE TABLE `foc_group` (
  `groupid` int(10) NOT NULL AUTO_INCREMENT,
  `groupname` char(20) NOT NULL,
  PRIMARY KEY (`groupid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of foc_group
-- ----------------------------
INSERT INTO `foc_group` VALUES ('1', '管理员组');
INSERT INTO `foc_group` VALUES ('2', '用户组');

-- ----------------------------
-- Table structure for `foc_log`
-- ----------------------------
DROP TABLE IF EXISTS `foc_log`;
CREATE TABLE `foc_log` (
  `logid` int(10) NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL,
  `operation` varchar(50) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`logid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of foc_log
-- ----------------------------

-- ----------------------------
-- Table structure for `foc_role`
-- ----------------------------
DROP TABLE IF EXISTS `foc_role`;
CREATE TABLE `foc_role` (
  `roleid` int(10) NOT NULL AUTO_INCREMENT,
  `rolename` char(20) NOT NULL,
  `idcodes` char(100) NOT NULL,
  `groupid` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  PRIMARY KEY (`roleid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of foc_role
-- ----------------------------
INSERT INTO `foc_role` VALUES ('1', '普通用户', '0', '2', '2');
INSERT INTO `foc_role` VALUES ('2', 'VIP用户', '0', '2', '0');
INSERT INTO `foc_role` VALUES ('3', '系统管理员', '9999', '1', '1');
INSERT INTO `foc_role` VALUES ('4', '超级管理员', '', '1', '0');
INSERT INTO `foc_role` VALUES ('5', '用户管理员', '', '1', '0');
INSERT INTO `foc_role` VALUES ('6', '产品管理员', '', '1', '0');

-- ----------------------------
-- Table structure for `foc_root`
-- ----------------------------
DROP TABLE IF EXISTS `foc_root`;
CREATE TABLE `foc_root` (
  `rootid` int(10) NOT NULL AUTO_INCREMENT,
  `rootname` char(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `idcode` int(10) NOT NULL,
  PRIMARY KEY (`rootid`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of foc_root
-- ----------------------------
INSERT INTO `foc_root` VALUES ('1', 'ReadOrdinary', '查看普通产品内容', '2');
INSERT INTO `foc_root` VALUES ('2', 'ReadVIP', '查看VIP产品内容', '3');
INSERT INTO `foc_root` VALUES ('3', 'SelUser', '查看个人信息', '5');
INSERT INTO `foc_root` VALUES ('4', 'SelALLUser', '查看用户信息', '7');
INSERT INTO `foc_root` VALUES ('5', 'AddUser', '添加用户信息', '11');
INSERT INTO `foc_root` VALUES ('6', ' UpdaUser', '修改用户信息', '13');
INSERT INTO `foc_root` VALUES ('7', 'DelUser', '删除用户信息', '17');
INSERT INTO `foc_root` VALUES ('8', 'SelProduct', '查看产品', '19');
INSERT INTO `foc_root` VALUES ('9', 'AddProduct', '添加产品', '23');
INSERT INTO `foc_root` VALUES ('10', 'UpdaProduct', '修改产品', '29');
INSERT INTO `foc_root` VALUES ('11', 'DelProduct', '删除产品', '31');

-- ----------------------------
-- Table structure for `foc_user`
-- ----------------------------
DROP TABLE IF EXISTS `foc_user`;
CREATE TABLE `foc_user` (
  `userid` int(10) NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL,
  `password` char(32) NOT NULL,
  `email` char(40) NOT NULL,
  `emailstatus` int(11) NOT NULL DEFAULT '0',
  `mobile` char(12) NOT NULL,
  `regdate` datetime NOT NULL,
  `lisdate` datetime NOT NULL,
  `random` int(6) NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of foc_user
-- ----------------------------
INSERT INTO `foc_user` VALUES ('1', 'admin', '370556e8e1c50d9fd8c6ae37c9ff4989', 'admin@admin.com', '0', '12345678910', '2016-04-29 15:41:46', '2016-04-29 15:50:24', '0');
INSERT INTO `foc_user` VALUES ('2', 'lin', '8346f5135d0f3fc972f76fcffafb92c7', 'lin@lin.com', '0', '9876543210', '2016-04-29 15:57:09', '0000-00-00 00:00:00', '51');
