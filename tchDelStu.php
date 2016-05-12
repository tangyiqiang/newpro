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
</style>
<body>
<?php
	if( !isset($_SESSION['username']) ){
		echo "<script language=javascript>alert('请先登录！');window.location.href='index.html';</script>";
	}
	echo "欢迎你：".$_SESSION['username'];
?>
<form id="del" action="" method=post> 
	<table border=1 width=60% align=center> 
	<caption>学生信息表</caption> 
	<th></th><th>学号</th><th>姓名</th>
	<?php 
		$mysql_servername = "localhost"; //主机地址
		$mysql_username = "root"; //数据库用户名
		$mysql_password ="root"; //数据库密码
		$mysql_database ="project"; //数据库
		mysql_connect($mysql_servername , $mysql_username , $mysql_password);
		mysql_query('set names utf8');
		mysql_select_db($mysql_database); 
		$exec='select * from personinfo where isteacher=0'; 
		$result=mysql_query($exec); 
		while($rs=mysql_fetch_object($result)) 
		{ 
			$id=$rs->id; 
			$name=$rs->name; 
	?> 
		<tr>
			<th><input type=checkbox name=de[] value=<?php echo $id?> /></th><th><?php echo $id?></th><th><?php echo $name?> </th>
		</tr>	
	<?php
		}
		mysql_close(); 
	?> 
	</table> 
	<center><input type=button value="删除" onclick="Check()"></center> 
</form> 
<button onclick="history.go(-1)">返回上一页</button>
<script>
function Check(){
	var chks=document.getElementsByTagName('input');
	var bl=true;
	for(var i=0;i<chks.length;i++)
	{
	    if(chks[i].checked) 
	    {
	        bl=false;
	        break;
	    }
	} 
	if(bl) alert('最少选择一条信息！');
	else{
		var form=document.getElementById("del");
		form.action="delStu.php";
		form.submit();
	}
}
</script>
</body>
</html>