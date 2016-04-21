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

<form id="adds" action="" method="post">
<div><p>学号:<input type=text name="id" id='id'></p></div>
<div><p>姓名:<input type=text name="name" id='name'></p></div>
<input type="button" value="添加" onclick="Add()" />
</form>
<input type="button" value="返回上一页" onclick="Return()" />
<script>
function Return(){
	header("refresh:0;url=tchMng.php");
}
function ok(id,name){
	var n = Number(id);
	if( !isNaN(n) ){
		if( n > 0) return true;
		else return false;
	}
	return false;
}
function Add(){
	var id=document.getElementById('id').value;
	var name=document.getElementById('name').value;
	if( !ok(id,name) ){
		alert("用户名或者ID不合法！");
		document.getElementById('id').value="";
		document.getElementById('name').value="";
	}
	else{
		var form=document.getElementById("adds");
		form.action="addStu.php";
		form.submit();
		document.getElementById('id').value="";
		document.getElementById('name').value="";
	}
}

</script>
</body>
</html>