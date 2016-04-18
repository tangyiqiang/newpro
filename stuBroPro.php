<!doctype html>
<?php
	session_start();
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查看作业</title>
</head>

<body>
<?php
	echo "当前查看的是第".$_SESSION['weeks']."周的作业。";
?>

<style>
body{
	text-align: center;
}
.t_area{ 
	width:800px; 
	height:700px;
	resize:none;
} 
</style>

<body>
<?php
	if( !isset($_SESSION['username']) ){
		echo "<script language=javascript>alert('请先登录！');window.location.href='index.html';</script>";
	}
	echo "当前查看的是第".$_SESSION['weeks']."周的作业。";
	error_reporting(0);
	$mysql_servername = "localhost"; //主机地址
	$mysql_username = "root"; //数据库用户名
	$mysql_password ="root"; //数据库密码
	$mysql_database ="project"; //数据库
	$id = $_SESSION['id'];
	$week = $_SESSION['weeks'];
	mysql_connect($mysql_servername , $mysql_username , $mysql_password);
	mysql_query('set names utf8');
	mysql_select_db($mysql_database);
	$row = mysql_fetch_assoc( mysql_query("select * from homework where week=1 && id='$id'") ); 
?>
	
	<div>我的提交：<textarea class='t_area'> <?php echo $row['code']?> </textarea></div>

</body>

</html>