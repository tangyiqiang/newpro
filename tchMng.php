﻿<!doctype html>
<?php
	session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>学生管理</title>
</head>

<style>
body {
	text-align:center;
	background:url("pic/bk.jpg") no-repeat;
	background-size:cover;
}
form {
	position: relative;
	top:300px;
}
</style>
<body>
<?php
	if( !isset($_SESSION['username']) ){
		echo "<script language=javascript>alert('请先登录！');window.location.href='index.html';</script>";
	}
	echo "欢迎你：".$_SESSION['username'];
?>
<form id="tchOpform" name="tchForm" action="" method="post">
<p>请选择要执行的操作:</p>
<div><input type="button" value="添加学生" onclick="addStu()" /></div>
<div><input type="button" value="删除学生" onclick="delStu()" /></div>
</form>

<script>
function addStu(){
	var form=document.getElementById("tchOpform");
	form.action="tchAddStu.php";
	form.submit();
}
function delStu(){
	var form=document.getElementById("tchOpform");
	form.action="tchDelStu.php";
	form.submit();
}
</script>
</body>
</html>