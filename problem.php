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

<style>
body {
	text-align:center;
	background:url("pic/bk.jpg") no-repeat;
	background-size:cover;
}
#middle{
	position:relative;
	left:600px;
	width:700px;
	height:800px;
	border:1px
	solid black;
	float:center;
	display:block;
}
</style>

<body>
<?php
	if( !isset($_SESSION['username']) ){
		echo "<script language=javascript>alert('请先登录！');window.location.href='index.html';</script>";
	}
	$_SESSION['weeks'] = $_POST['weeks'];
	echo "当前查看的是第".$_SESSION['weeks']."周的作业。";
	$week=$_SESSION['weeks'];
	$id=$_SESSION['id'];
	error_reporting(0);
	$mysql_servername = "localhost"; //主机地址
	$mysql_username = "root"; //数据库用户名
	$mysql_password ="root"; //数据库密码
	$mysql_database ="project"; //数据库
	mysql_connect($mysql_servername , $mysql_username , $mysql_password);
	mysql_query('set names utf8');
	mysql_select_db($mysql_database);
	$sql = "SELECT * FROM problem where week='$week'";
	$res = mysql_query($sql);
	$row = mysql_fetch_assoc($res); 
?>
	<div>题目：<text> <?php echo $row['title']?></text></div>
	<div>内容：<textarea id='middle'> <?php echo $row['content']?></textarea></div>

</body>

</html>