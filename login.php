<?php
	header("Content-type:text/html;charset=utf-8");
	$user=isset($_POST["user"])?$_POST["user"]:null;
	$pwd=isset($_POST["password"])?$_POST["password"]:null;
	$link=mysql_connect("localhost","root");
	//创建数据库
	$result=mysql_query("create database homework character set utf8 collate utf8_general_ci");
	//创建表
	mysql_select_db("homework",$link);
	$result = mysql_query("create table if not exists person (user varchar(100) primary key, pwd varchar(100)) default charset=utf8");
	//create table if not exists 表名 (user varchar(100) primary key, pwd varchar(100)) default charset=utf8
	 //设置所有的列和内容的字符集都是utf8;
	mysql_query("set names utf8");
	if($result){
		echo $user==null?"user null":$user;
		$re=mysql_query("SELECT `user`, `pwd` FROM `person` WHERE {user='$user'}");
		$row = mysql_fetch_assoc($result);
		if($row[pwd]==$pwd){
			echo "登录成功";
		}else{
			echo "登录失败";
		}
	}
?>