/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50605
Source Host           : localhost:3306
Source Database       : todo

Target Server Type    : MYSQL
Target Server Version : 50605
File Encoding         : 65001

Date: 2020-06-17 15:45:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for share
-- ----------------------------
DROP TABLE IF EXISTS `share`;
CREATE TABLE `share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_user` int(11) NOT NULL,
  `from_user` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `state` enum('1','0') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of share
-- ----------------------------
INSERT INTO `share` VALUES ('1', '2', '1', '4', '1', '1');
INSERT INTO `share` VALUES ('2', '3', '1', '4', '0', '0');
INSERT INTO `share` VALUES ('3', '3', '1', '4', '0', '0');
INSERT INTO `share` VALUES ('4', '2', '1', '4', '1', '1');

-- ----------------------------
-- Table structure for task
-- ----------------------------
DROP TABLE IF EXISTS `task`;
CREATE TABLE `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `create_at` varchar(255) NOT NULL,
  `update_at` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of task
-- ----------------------------
INSERT INTO `task` VALUES ('12', '123123', '0', '1592306050', '1592306050', '1');
INSERT INTO `task` VALUES ('13', '123123', '0', '1592306090', '1592306090', '1');
INSERT INTO `task` VALUES ('14', '123123', '0', '1592306183', '1592306183', '1');
INSERT INTO `task` VALUES ('15', '123123', '0', '1592306301', '1592306301', '1');
INSERT INTO `task` VALUES ('16', '123123', '0', '1592306536', '1592306536', '1');
INSERT INTO `task` VALUES ('17', '123123', '0', '1592307096', '1592307096', '1');
INSERT INTO `task` VALUES ('18', '123123', '0', '1592307151', '1592307151', '1');
INSERT INTO `task` VALUES ('19', '123123', '0', '1592358725', '1592358725', '1');
INSERT INTO `task` VALUES ('20', '123123', '0', '1592359121', '1592359121', '1');
INSERT INTO `task` VALUES ('21', '123123', '0', '1592359210', '1592359210', '1');
INSERT INTO `task` VALUES ('22', '123123', '0', '1592359258', '1592359258', '1');
INSERT INTO `task` VALUES ('23', '123123', '0', '1592359282', '1592359282', '1');
INSERT INTO `task` VALUES ('24', '123123', '0', '1592359504', '1592359504', '1');
INSERT INTO `task` VALUES ('25', '123123', '0', '1592359546', '1592359546', '1');
INSERT INTO `task` VALUES ('26', '123123', '0', '1592359732', '1592359732', '1');
INSERT INTO `task` VALUES ('27', '123123', '0', '1592359750', '1592359750', '1');
INSERT INTO `task` VALUES ('28', '123123', '0', '1592359766', '1592359766', '1');
INSERT INTO `task` VALUES ('29', '123123', '0', '1592360180', '1592360180', '1');
INSERT INTO `task` VALUES ('30', '123123', '0', '1592361159', '1592361159', '1');
INSERT INTO `task` VALUES ('31', '123123', '0', '1592361268', '1592361268', '1');
INSERT INTO `task` VALUES ('32', '123123', '0', '1592361327', '1592361327', '1');
INSERT INTO `task` VALUES ('33', '123123', '0', '1592361426', '1592361426', '1');
INSERT INTO `task` VALUES ('34', '123123', '0', '1592361697', '1592361697', '1');
INSERT INTO `task` VALUES ('35', '123123', '0', '1592362106', '1592362106', '1');
INSERT INTO `task` VALUES ('36', '123123', '0', '1592362132', '1592362132', '1');
INSERT INTO `task` VALUES ('37', '123123', '0', '1592362257', '1592362257', '1');
INSERT INTO `task` VALUES ('38', '123123', '0', '1592362290', '1592362290', '1');
INSERT INTO `task` VALUES ('39', '123123', '0', '1592362309', '1592362309', '1');
INSERT INTO `task` VALUES ('40', '123123', '0', '1592362348', '1592362348', '1');
INSERT INTO `task` VALUES ('41', '123123', '0', '1592362486', '1592362486', '1');
INSERT INTO `task` VALUES ('42', '123123', '0', '1592362577', '1592362577', '1');
INSERT INTO `task` VALUES ('43', '123123', '0', '1592362634', '1592362634', '1');
INSERT INTO `task` VALUES ('44', '123123', '0', '1592362893', '1592362893', '1');
INSERT INTO `task` VALUES ('45', '123123', '0', '1592363005', '1592363005', '1');
INSERT INTO `task` VALUES ('46', '123123', '0', '1592363101', '1592363101', '1');
INSERT INTO `task` VALUES ('47', '123123', '0', '1592363180', '1592363180', '1');
INSERT INTO `task` VALUES ('48', '123123', '0', '1592363232', '1592363232', '1');
INSERT INTO `task` VALUES ('49', '123123', '0', '1592363421', '1592363421', '1');
INSERT INTO `task` VALUES ('50', '123123', '0', '1592364175', '1592364175', '1');
INSERT INTO `task` VALUES ('51', '123123', '0', '1592364471', '1592364471', '1');
INSERT INTO `task` VALUES ('52', '123123', '0', '1592364639', '1592364639', '1');
INSERT INTO `task` VALUES ('53', '123123', '0', '1592364863', '1592364863', '1');
INSERT INTO `task` VALUES ('54', '123123', '0', '1592364972', '1592364972', '1');
INSERT INTO `task` VALUES ('55', '123123', '0', '1592365038', '1592365038', '1');
INSERT INTO `task` VALUES ('56', '123123', '0', '1592365049', '1592365049', '1');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`,`nickname`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
