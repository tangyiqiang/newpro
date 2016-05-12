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
	echo "当前要提交的是第".$_SESSION['weeks']."周的作业。";
	echo "提交的人是".$_SESSION['username'];
?>
<center><p>当前正在查看作业</p></center>
<div>
<form action="subHomework.php" method="post">
<textarea id="middle" name="homework"></textarea>
<input type="submit" value="提交" />
</form>
</div>

</body>

</html>