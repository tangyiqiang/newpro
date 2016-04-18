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
date_default_timezone_set("PRC");
if ($title && $content){
	if( $_SESSION['weeks'] == 'one' ){
		$sql = "INSERT INTO problem values(1,'$title','$content','$curTime')";
		$res = mysql_query($sql);
		if($res)
			header("refresh:0;url=problem.php");
		else
			header("refresh:0;url=pubPro.php");
	}
	exit;
}else {
 echo "<script language=javascript>alert('内容和标题不能为空');history.back();</script>";
}
?>