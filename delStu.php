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
$id=$_POST['de'];
foreach($id as $ide){
	$exec="delete from personinfo where id='$ide'";
	$result=mysql_query($exec);
	if((mysql_affected_rows()==0) or (mysql_affected_rows==-1)){
	    echo "没有找到记录，或者删除时出错";
	    header("refresh:0;url=tchDelStu.php");
	    exit;
	}
	else{
	    echo "学生信息已经删除";
	    header("refresh:0;url=tchDelStu.php");
	}
	$exec="DELETE FROM homework WHERE id='$ide'";
	mysql_query($exec);
}
mysql_close();
?>