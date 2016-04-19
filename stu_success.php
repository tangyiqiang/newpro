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
	if( !isset($_SESSION['username']) ){
		echo "<script language=javascript>alert('请先登录！');window.location.href='index.html';</script>";
	}
	echo "欢迎你：".$_SESSION['username'];
?>
<form id="opform" name="stuform" action="" method="post">
请选择第几周：
<select name="weeks">
	<option value ="1">1</option>
	<option value ="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	<option value="6">6</option>
	<option value="7">7</option>
	<option value="8">8</option>
	<option value="9">9</option>
	<option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>
	<option value="13">13</option>
	<option value="14">14</option>
	<option value="15">15</option>
	<option value="16">16</option>
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