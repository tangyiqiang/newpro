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
body{
	text-align:center;
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
<div>输入题目:<input type=text name='title' /></div>
<div>作业内容：<input type=textarea name='content' /></div>
<input name='publish' type='submit' value='发布' />
</body>

</html>