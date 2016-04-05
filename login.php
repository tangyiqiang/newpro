<?php
error_reporting(0);
$mysql_servername = "localhost"; //主机地址
$mysql_username = "root"; //数据库用户名
$mysql_password ="root"; //数据库密码
$mysql_database ="project"; //数据库
mysql_connect($mysql_servername , $mysql_username , $mysql_password);
mysql_select_db($mysql_database); 
$name=$_POST['name'];
$passowrd=$_POST['password'];
if ($name && $passowrd){
 $sql = "SELECT * FROM personInfo WHERE name = '$name' and password='$passowrd'";
 $res = mysql_query($sql);
 $rows = mysql_num_rows($res);
 $a = mysql_fetch_array($res);
 $isteacher = $a["isTeacher"];
 if($rows){
 	if( $isteacher != 0 )
 		header("refresh:0;url=tch_success.html");
 	else
   		header("refresh:0;url=stu_success.html");//跳转页面，注意路径
   	exit;
 }
 echo "<script language=javascript>alert('用户名密码错误');history.back();</script>";
}else {
 echo "<script language=javascript>alert('用户名密码不能为空');history.back();</script>";
}
?>