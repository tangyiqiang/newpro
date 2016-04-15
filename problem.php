<!doctype html>
<?php
	session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查看作业</title>
</head>

<body>
<?php
	echo "当前查看的是第".$_SESSION['weeks']."周的作业。";
?>
<center><p>当前正在查看作业</p></center>
</body>

</html>