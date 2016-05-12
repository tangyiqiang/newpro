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
.dd{
    width:50%;
    float:left;
}
#middle{
	width:100%;
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
	error_reporting(0);
	$week = $_SESSION['weeks'];
	$id1=$_GET['id1'];
	$id2=$_GET['id2'];
	$mysql_servername = "localhost"; //主机地址
	$mysql_username = "root"; //数据库用户名
	$mysql_password ="root"; //数据库密码
	$mysql_database ="project"; //数据库
	mysql_connect($mysql_servername , $mysql_username , $mysql_password);
	mysql_query('set names utf8');
	mysql_select_db($mysql_database);
	$sql1 = "SELECT * FROM homework where week='$week' and id='$id1'";
	$sql2 = "SELECT * FROM homework where week='$week' and id='$id2'";
	$res1 = mysql_query($sql1);
	$res2 = mysql_query($sql2);
	$row1 = mysql_fetch_assoc($res1);
	$row2 = mysql_fetch_assoc($res2); 
?>
	<div id='stu1' class='dd'>
	学生学号：<?php echo $row1['id']?> <br />
	作业内容：<textarea id='middle'><?php echo $row1['code']?></textarea>
	</div>
	<div id='stu2' class='dd'>
	学生学号：<?php echo $row2['id']?> <br />
	作业内容：<textarea id='middle'><?php echo $row2['code']?></textarea>
	</div>

</body>

</html>