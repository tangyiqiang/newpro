<?php
session_start();
error_reporting(0);
$mysql_servername = "localhost"; //主机地址
$mysql_username = "root"; //数据库用户名
$mysql_password ="root"; //数据库密码
$mysql_database ="project"; //数据库
mysql_connect($mysql_servername , $mysql_username , $mysql_password);
mysql_query('set names utf8');
mysql_select_db($mysql_database); 
$id=$_GET['id'];
$week=$_GET['week'];
date_default_timezone_set("PRC");
$sql = "SELECT * FROM homework WHERE id='$id' AND week='$week'";
$res = mysql_query($sql);
$row = mysql_fetch_assoc($res);
if( $row )
	echo $row['code'];
else
	echo 'id='.$id.'   week='.$week;
?>