-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2013 年 05 月 02 日 10:03
-- 服务器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 数据库: `displaydb`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `class`
-- 

CREATE TABLE `class` (
  `clno` char(11) NOT NULL default '0',
  `clname` char(10) default NULL,
  `xname` char(11) default NULL,
  PRIMARY KEY  (`clno`),
  KEY `xname` (`xname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `class`
-- 

INSERT INTO `class` VALUES ('9', 'wuli', 'wulixi');
INSERT INTO `class` VALUES ('3', 'huax', '化学');

-- --------------------------------------------------------

-- 
-- 表的结构 `course`
-- 

CREATE TABLE `course` (
  `cno` char(11) NOT NULL default '0',
  `cname` char(10) default NULL,
  `time` char(30) default NULL,
  `xuef` int(11) NOT NULL,
  `tname` char(10) default NULL,
  `tno` char(11) default NULL,
  PRIMARY KEY  (`cno`),
  KEY `tno` (`tno`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `course`
-- 

INSERT INTO `course` VALUES ('1001', '生理学', '20:88', 2, '老王', '01');
INSERT INTO `course` VALUES ('1002', '物理学', '8:34', 3, '老李', '02');
INSERT INTO `course` VALUES ('1003', 'huaxue', '8:90', 4, 'john', '90');
INSERT INTO `course` VALUES ('1005', 'phy', '89:00', 5, '1', '1');
INSERT INTO `course` VALUES ('1004', 'feiji', '12', 23, '1', '1');

-- --------------------------------------------------------

-- 
-- 表的结构 `sc`
-- 

CREATE TABLE `sc` (
  `sno` char(11) NOT NULL default '0',
  `cno` char(11) NOT NULL default '0',
  `grade` int(11) default NULL,
  PRIMARY KEY  (`sno`,`cno`),
  KEY `cno` (`cno`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `sc`
-- 

INSERT INTO `sc` VALUES ('34', '1001', 90);
INSERT INTO `sc` VALUES ('34', '1002', 90);
INSERT INTO `sc` VALUES ('33', '1003', -1);
INSERT INTO `sc` VALUES ('34', '1005', 67);
INSERT INTO `sc` VALUES ('33', '1005', 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `student`
-- 

CREATE TABLE `student` (
  `sno` char(11) character set gb2312 NOT NULL default '0',
  `sname` char(6) character set gb2312 default NULL,
  `sex` char(1) character set gb2312 default NULL,
  `bir` char(13) character set gb2312 default NULL,
  `clno` char(11) default NULL,
  `pwd` varchar(32) NOT NULL,
  PRIMARY KEY  (`sno`),
  KEY `clno` (`clno`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `student`
-- 

INSERT INTO `student` VALUES ('00223', 'jim', '男', '1990-03-06', '00909', '');
INSERT INTO `student` VALUES ('00435', 'pik', '女', '1990-07-34', '9893', '');
INSERT INTO `student` VALUES ('09890', 'kji', '男', '2398457', '0009', '');
INSERT INTO `student` VALUES ('34', 'kkk', '男', '1999-90-08', '9', 'c4ca4238a0b923820dcc509a6f75849b');
INSERT INTO `student` VALUES ('33', '3', '3', '3', '3', 'c4ca4238a0b923820dcc509a6f75849b');
INSERT INTO `student` VALUES ('45', '1', '1', '1', '1', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

-- 
-- 表的结构 `teacher`
-- 

CREATE TABLE `teacher` (
  `tno` char(11) NOT NULL default '0',
  `tname` char(10) default NULL,
  `pos` char(10) default NULL,
  `pho` char(11) default NULL,
  `xname` char(11) default NULL,
  `pwd` varchar(32) NOT NULL,
  PRIMARY KEY  (`tno`),
  KEY `xname` (`xname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `teacher`
-- 

INSERT INTO `teacher` VALUES ('01', '老王', '教授', '898999', '生理', '9');
INSERT INTO `teacher` VALUES ('02', '老李', '讲师', '909090', '物理', '3');
INSERT INTO `teacher` VALUES ('90', 'john', '教授', '909090', '化学', '89');
INSERT INTO `teacher` VALUES ('1', '1', '1', '11', '1', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

-- 
-- 表的结构 `userinfo`
-- 

CREATE TABLE `userinfo` (
  `id` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `gender` varchar(64) NOT NULL,
  `age` varchar(64) NOT NULL,
  `pwd` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `userinfo`
-- 

INSERT INTO `userinfo` VALUES ('1', '1', '7', '1', '1');
INSERT INTO `userinfo` VALUES ('2', '哈哈哈', '2', '2', '2');

-- --------------------------------------------------------

-- 
-- 表的结构 `xi`
-- 

CREATE TABLE `xi` (
  `xname` char(11) NOT NULL default '0',
  `phone` char(10) default NULL,
  PRIMARY KEY  (`xname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `xi`
-- 

INSERT INTO `xi` VALUES ('物理', '8989');
INSERT INTO `xi` VALUES ('生理', '9090');
