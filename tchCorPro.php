﻿<!doctype html>
<?php
	session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查看作业</title>
</head>

<style>
body{
	text-align:center;
}
#middle{
	width:100%;
	height:600px;
	border:1px 
	solid black;
	float:center;
	display:block;
}
</style>

<body>
<select name="stuName" onchange="find()">
<?php
	if( !isset($_SESSION['username']) ){
		echo "<script language=javascript>alert('请先登录！');window.location.href='index.html';</script>";
	}
	$_SESSION['weeks']=$_POST['weeks'];
	$mysql_servername = "localhost"; //主机地址
	$mysql_username = "root"; //数据库用户名
	$mysql_password ="root"; //数据库密码
	$mysql_database ="project"; //数据库
	mysql_connect($mysql_servername , $mysql_username , $mysql_password);
	mysql_query('set names utf8');
	mysql_select_db($mysql_database); 
	$exec='select * from personinfo where isteacher=0'; 
	$result=mysql_query($exec);
	while($rs=mysql_fetch_object($result)) 
	{ 
		$id=$rs->id;
		$name=$rs->name;
?> 
	<option value="<?php echo $rs["id"];?>"><?php echo $rs["name"];?></option>; 
<?php
	}
	$week = $_POST['weeks'];
	$codesql="select * from homework where week='$week'";
	$result = mysql_query($codesql);
	
	mysql_close(); 
?>
</select>
<textarea id="middle" name="homework"></textarea>

<script>
function find(){

}
</script>

</body>

</html>