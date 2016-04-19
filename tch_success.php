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
	if( !isset($_SESSION['username']) ){
		echo "<script language=javascript>alert('请先登录！');window.location.href='index.html';</script>";
	}
	echo "欢迎你：".$_SESSION['username'];
?>
<form id="tchOpform" name="tchForm" action="" method="post">
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
<div><input type="button" value="发布作业" onclick="pubPro()" /></div>
<div><input type="button" value="查看题目" onclick="broPro()" /></div>
<div><input type="button" value="查看作业" onclick="corPro()" /></div>
<div><input type="button" value="作业查重" onclick="chkJob()" /></div>
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
function chkJob(){
	var form=document.getElementById("tchOpform");
	form.action="tchChkJob.php";
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