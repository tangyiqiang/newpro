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
<div><p>学号:<input type=text name="id"></p></div>
<div><p>姓名:<input type=text name="name"></p></div>
<div><input type="button" value="添加" onclick="Add()" /></div>
</form>

<script>
function Add(){
	var id=document.getElementById('id');
	var name=document.getElementById('name');
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

function ok(id,name){
	for(var i = 0; i < id.length; i++){
		if( !isNaN(id[i]) )
			return false;
	}
	for(var j = 0; j < name.length; j++){

	}
	return true;
}

</script>
</body>
</html>