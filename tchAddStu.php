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
body {
	text-align:center;
	background:url("pic/bk.jpg") no-repeat;
	background-size:cover;
}
form{
	position: relative;
	top:300px;
}
button{
	position: relative;
	top:350px;
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
<button onclick="history.go(-1)">返回上一页</button>
<script>
function ok(id,name){
	len = id.length;
	for(var i = 0; i < len; i++){
		var c = id.charAt(i);
		if( c >= '0' && c <= '9') continue;
		if( c >= 'a' && c <= 'z') continue;
		if( c >= 'A' && c <= 'Z') continue;
		return false;
	}
	return true;
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
		alert("用户合法！");
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