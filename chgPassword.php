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
$password=$_POST['password'];
$id=$_SESSION['id'];
date_default_timezone_set("PRC");
if ($password){
	$sql = "UPDATE personinfo set password='$password' where id='$id'";
	$res = mysql_query($sql);
	if($res){
		header("refresh:0;url=index.html");
		echo "<script> alert('修改密码成功，请重新登录！');</script>";
	}
	else{
		echo "<script> alert('修改密码失败！');</script>";
		header("refresh:0;url=stuChgPas.php");
	}
	exit;
}else {
 echo "<script language=javascript>alert('密码不能为空');history.back();</script>";
}
?>