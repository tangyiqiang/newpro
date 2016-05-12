<!doctype html>
<?php
	session_start();
?>
<html>
<head>
<script type="text/javascript" src="js/jquery.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查看作业</title>
</head>

<style>
body {
	text-align:center;
	background:url("pic/bk.jpg") no-repeat;
	background-size:cover;
}
#middle{
	position:relative;
	left:600px;
	width:700px;
	height:800px;
	border:1px
	solid black;
	float:center;
	display:block;
}
table{
	position: relative;
	left:800px;
}
</style>

<body>
<p>选择要查看的学生:</p>
<select id="stuName">
<option value=""></option>
<?php
	if( !isset($_SESSION['username']) ){
		echo "<script language=javascript>alert('请先登录！');window.location.href='index.html';</script>";
	}
	$_SESSION['weeks']=$_POST['weeks'];
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
	<option value="<?php echo $rs->id;?>"><?php echo $rs->id;?></option>; 
<?php
	}
	
	mysql_close();
?>
</select>
<br /><br /><br />
<table>
<tr>
<th><button id='1' onclick="check(this)">第一周</button></th>
<th><button id='2' onclick="check(this)">第二周</button></th>
<th><button id='3' onclick="check(this)">第三周</button></th>
<th><button id='4' onclick="check(this)">第四周</button></th>
</tr>
<tr>
<th><button id='5' onclick="check(this)">第五周</button></th>
<th><button id='6' onclick="check(this)">第六周</button></th>
<th><button id='7' onclick="check(this)">第七周</button></th>
<th><button id='8' onclick="check(this)">第八周</button></th>
</tr>
<tr>
<th><button id='9' onclick="check(this)">第九周</button></th>
<th><button id='10' onclick="check(this)">第十周</button></th>
<th><button id='11' onclick="check(this)">第十一周</button></th>
<th><button id='12' onclick="check(this)">第十二周</button></th>
</tr>
<tr>
<th><button id='13' onclick="check(this)">第十三周</button></th>
<th><button id='14' onclick="check(this)">第十四周</button></th>
<th><button id='15' onclick="check(this)">第十五周</button></th>
<th><button id='16' onclick="check(this)">第十六周</button></th>
</tr>
<textarea id='middle' name='code'></textarea>
<script>
function check(obj){
	if(obj.style.background=='red'){
		alert('本周作业尚未提交');
		return;
	}
	alert(obj.id);
	var request = new XMLHttpRequest();
	request.open("GET","tchStuHomework.php?id="+document.getElementById("stuName").value+"&week="+obj.id);
	request.send();
	request.onreadystatechange=function(){
		if(request.readyState==4){
			if( request.status==200){
				document.getElementById("middle").innerHTML = request.responseText;
			}
			else{
				alert("发生错误了！");
			}
		}
	}
}

document.getElementById("stuName").onchange = function(){
	var request = new XMLHttpRequest();
	request.open("GET","chkStuHomework.php?id="+document.getElementById("stuName").value);
	request.send();
	request.onreadystatechange=function(){
		if(request.readyState==4){
			if( request.status==200){
				var str = request.responseText;
				for(var i = 1; i <= 16; i++){
					var week = i.toFixed();
					if(str[i-1] == '0'){
						document.getElementById(week).style.background="red";
					}
					else{
						document.getElementById(week).style.background="lime";
					}
				}
			}
			else{
				alert("发生错误了！");
			}
		}
	}
}

</script>

</body>

</html>