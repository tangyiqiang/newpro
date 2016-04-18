<!doctype html>
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

<script>
function addStu(){
	var form=document.getElementById("tchOpform");
	form.action="addStu.php";
	form.submit();
}
</script>
</body>
</html>