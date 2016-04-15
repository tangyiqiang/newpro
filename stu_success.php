<!doctype html>
<?php
	session_start();
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>学生操作界面</title>
</head>

<style>
form{
	position: relative;
	left:40%;
	top:300px;
}
</style>

<body>
<?php
	echo "欢迎你：".$_SESSION['username'];
?>
<form id="opform" name="stuform" action="" method="post">
请选择第几周：
<select name="weeks">
	<option value ="one">1</option>
	<option value ="two">2</option>
	<option value="three">3</option>
	<option value="four">4</option>
</select>
<div><input type="button" value="查看作业" onclick="getPro()" /></div>
<div><input type="button" value="提交作业" onclick="subPro()" /></div>
<div><input type="button" value="查阅作业" onclick="broPro()" /></div>
<div><input type="button" value="修改密码" onclick="chgPas()" /></div>
</form>

<script>
function getPro(){
	var form=document.getElementById("opform");
	form.action="problem.php";
	form.submit();
}
function subPro(){
	var form=document.getElementById("opform");
	form.action="stuSubPro.php";
	form.submit();
}
function broPro(){
	var form=document.getElementById("opform");
	form.action="stuBroPro.php";
	form.submit();
}
function chgPas(){
	var form=document.getElementById("opform");
	form.action="stuChgPas.php";
	form.submit();
}
</script>
</body>
</html>