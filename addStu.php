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
$id=$_POST['id'];
$name=$_POST['name'];
$password=$id;
date_default_timezone_set("PRC");
$sql = "INSERT INTO personinfo values('$id','$name','$password')";
$res = mysql_query($sql);
mysql_close(); 
if($res){
	echo "<script language=javascript>alert('添加成功！');history.back();</script>";
}
else{
	echo "<script language=javascript>alert('添加失败！');history.back();</script>";		
}
header("refresh:0;url=tchAddStu.php");
?>