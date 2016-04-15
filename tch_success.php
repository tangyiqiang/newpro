<!doctype html>
<?php
	session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登陆成功</title>
</head>

<style>
body{
	text-align:center;
}
</style>
<body>
<?php
	echo "欢迎你：".$_SESSION['username'];
?>
<form id="tchOpform" name="tchForm" action="" method="post">
请选择第几周：
<select name="weeks">
	<option value ="one">1</option>
	<option value ="two">2</option>
	<option value="three">3</option>
	<option value="four">4</option>
</select>
<div><input type="button" value="发布作业" onclick="pubPro()" /></div>
<div><input type="button" value="查看作业" onclick="broPro()" /></div>
<div><input type="button" value="批改作业" onclick="corPro()" /></div>
<div><input type="button" value="学生管理" onclick="stuMng()" /></div>
</form>

<script>
function pubPro(){
	var form=document.getElementById("tchOpform");
	form.action="pubPro.php";
	form.submit();
}
function broPro(){
	var form=document.getElementById("tchOpform");
	form.action="problem.php";
	form.submit();
}
function corPro(){
	var form=document.getElementById("tchOpform");
	form.action="tchCorPro.php";
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