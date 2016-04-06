<!doctype html>
<?php
	session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登陆成功</title>
</head>

<body>
<?php
	echo "欢迎你：".$_SESSION['username'];
?>
<center><p>学生登陆成功</p></center>
</body>
</html>