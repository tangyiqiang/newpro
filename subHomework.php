﻿<?php
session_start();
error_reporting(0);
$mysql_servername = "localhost"; //主机地址
$mysql_username = "root"; //数据库用户名
$mysql_password ="root"; //数据库密码
$mysql_database ="project"; //数据库
mysql_connect($mysql_servername , $mysql_username , $mysql_password);
mysql_query('set names utf8');
mysql_select_db($mysql_database); 
$homework=$_POST['homework'];
$curTime=date("Y-m-d");
$id=$_SESSION['id'];
$week=$_SESSION['weeks'];
date_default_timezone_set("PRC");
if ($homework){
	$sql = "DELETE FROM homework WHERE id='$id' AND week='$week'";
	mysql_query($sql);
	$sql = "INSERT INTO homework values('$id','$homework','$curTime','$week')";
	$res = mysql_query($sql);
	if($res){
		$sql = "SELECT COUNT(id) FROM homework WHERE id='$id'";
		$res = mysql_query($sql);
		$row=  mysql_fetch_array($res);
		$count = count($row);
		$sql = "UPDATE personinfo SET count='$count' WHERE id='$id'";
		$res = mysql_query($sql);
		echo "<script language=javascript>alert('作业提交成功！');window.location.href='stu_success.php';</script>";
	}
	else
		header("refresh:0;url=stuSubPro.php");
	exit;
}else {
 echo "<script language=javascript>alert('内容不能为空');history.back();</script>";
}
?>