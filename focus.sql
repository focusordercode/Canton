DROP DATABASE IF EXISTS focus;
CREATE DATABASE focus;
use focus;

DROP TABLE IF EXISTS foc_user;
CREATE TABLE foc_user(
    userid int(10) not null primary key auto_increment,
	username char(20) not null unique,
	password char(50) not null,
	email char(40)  not null,
	emailstatus int not null default  '0',
	mobile char(12) not null,
	regdate datetime not null,
	lisdate datetime not null,
	random  char(6) not null
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS foc_group;
CREATE TABLE foc_group(
    groupid int(10) not null primary key auto_increment,
	groupname char(20) not null 
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
insert into foc_group value(null,'管理员组');
insert into foc_group value(null,'用户组');

DROP TABLE IF EXISTS foc_role;
CREATE TABLE foc_role(
    roleid int(10) not null primary key auto_increment,
	rolename char(20) not null ,
	title  char(200) not null,
	idcodes char(100) not null,
	groupid int(10) not null
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS foc_user_role;
CREATE TABLE foc_user_role(
    id int(10) not null primary key auto_increment,
	userid int(10),
	roleid int(10)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS foc_root;
CREATE TABLE foc_root(
    rootid int(10) not null primary key auto_increment,
	rootname char(20) not null ,
	title varchar(50) not null,
	idcode int(10) not null
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS foc_userinfo;
CREATE TABLE foc_userinfo(
    userid int(10) not null primary key,
	name  char(20) not null,
	portrait text not null,
	sex  char(10)	,
	birthday datetime ,
	shengxiao char(5),
	constellation char(15),
	address text,
	zipcode int(10)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS foc_content;
CREATE TABLE foc_content(
    contentid int(10) not null primary key auto_increment,
	title char(100) not null,
	content text not null,
	name char(20) not null,
	date datetime not null,
	columnid int(10) not null
)ENGINE= MyISAM DEFAULT CHARSET=uft8;

DROP TABLE IF EXISTS foc_column;
CREATE TABLE foc_column(
    columnid int(10) not null primary key auto_increment,
	paterid int(10) not null default '0',
	columnname char(50) not null
)ENGINE= MyISAM DEFAULT CHARSET=utf8;
