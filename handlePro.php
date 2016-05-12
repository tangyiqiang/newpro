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
$title=$_POST['title'];
$content=$_POST['content'];
$curTime=date("Y-m-d");
$week = $_SESSION['weeks'];
date_default_timezone_set("PRC");
if ($title && $content){
	$sqldel = "DELETE FROM problem where week='$week'";
	mysql_query($sqldel);
	$sql = "INSERT INTO problem values('$week','$title','$content','$curTime')";
	$res = mysql_query($sql);
	if($res)
		header("refresh:0;url=tch_success.php");
	else
		header("refresh:0;url=pubPro.php");
}else {
 echo "<script language=javascript>alert('内容和标题不能为空');history.back();</script>";
}
?>