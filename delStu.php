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
body{
	text-align:center;
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
<div><input type="button" value="添加学生" onclick="addStu()" /></div>
<div><input type="button" value="删除学生" onclick="delStu()" /></div>
<div><input type="button" value="添加教师" onclick="addTch()" /></div>
<div><input type="button" value="学生管理" onclick="stuMng()" /></div>
</form>

<script>
function addStu(){
	var form=document.getElementById("tchOpform");
	form.action="addStu.php";
	form.submit();
}
function delStu(){
	var form=document.getElementById("tchOpform");
	form.action="delStu.php";
	form.submit();
}
function addTch(){
	var form=document.getElementById("tchOpform");
	form.action="addTch.php";
	form.submit();
}
function stuMng(){
	var form=document.getElementById("tchOpform");
	form.action="tchMng.php";
	form.submit();
}
</script>
</body>
</html>