<!doctype html>
<?php
	session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查看作业</title>
</head>

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
	$_SESSION['weeks']=$_POST['weeks'];
	echo "当前要发布的是第".$_SESSION['weeks']."周的作业。";
?>
<p>发布本周作业</p>
<form action='handlePro.php' method='post'>
<div>输入题目:<input style="width:400px;" type=text name='title' /></div>
<div>作业内容:<textarea id='middle' name='content'></textarea></div>
<input name='publish' type='submit' value='发布' />
</body>

</html>