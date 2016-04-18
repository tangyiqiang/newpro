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
#middle{
	width:100%;
	height:600px;
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
	echo "提交的人是".$_SESSION['username'];
?>
<center><p>当前正在更改密码</p></center>
<form id='opform' action="" method="post">
<div>输入密码：<input type=password name='password' id='password'/></div>
<div>确认密码：<input type=password name='confirm' id='confirm'/></div>
<input type="button" value='确认更改' onclick='Confirm()' />
</form>

<script>
function Confirm(){
	if( document.getElementById('password').value == document.getElementById('confirm').value ){
		var form=document.getElementById("opform");
		form.action="chgPassword.php";
		form.submit();
	}
	else{
		document.getElementById("password").value="";
		document.getElementById("confirm").value="";
		alert('密码不一样，请重新输入！');
	}
}
</script>

</body>

</html>