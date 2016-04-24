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
<form id="del" action="" method=post> 
	<table border=1 width=60% align=center> 
	<caption>学生信息表</caption> 
	<th>学号</th><th>姓名</th>
	<?php
		function calcSimi($str1,$str2){
			$len1 = strlen($str1);
			$len2 = strlen($str2);
			$dp = array_fill(0,$len1+5,array_fill(0,$len2+5,0));
			for($i = 0; $i <= $len1; $i++) $dp[$i][0]=$i;
			for($j = 0; $j <= $len2; $j++) $dp[0][$j]=$j;
			for($i = 1; $i <= $len1; $i++){
				for($j = 1; $j <= $len2; $j++){
					$cost = ($str1[$i]==$str2[$j]?0:1);
					$dp[$i][$j] = min( $dp[$i-1][$j]+1 , min($dp[$i][$j-1]+1,$dp[$i-1][$j-1]+$cost));
				}
			}
			$dist = $dp[$len1][$len2];
			$total = $len1+$len2;
			return ($total-$dist)/$total*100;
		}
		$mysql_servername = "localhost"; //主机地址
		$mysql_username = "root"; //数据库用户名
		$mysql_password ="root"; //数据库密码
		$mysql_database ="project"; //数据库
		mysql_connect($mysql_servername , $mysql_username , $mysql_password);
		mysql_query('set names utf8');
		mysql_select_db($mysql_database);
		$week = $_POST['weeks'];
		$exec="select * from homework where week='$week'";
		$result=mysql_query($exec);
		$codeArr = array();
		$idarr = array();
		$idtmp = new idPair();
		while($rs=mysql_fetch_object($result)){ 
			array_push($codeArr,$rs);
		}
		$len = count($codeArr);
		$simiArr = array_fill(0,$len+5,array_fill(0,$len+5,0));
		for($i = 0; $i < $len; $i++){
			for($j = $i+1; $j < $len; $j++){
				else{
					$similarity = calcSimi($codeArr[$i]->code,$codeArr[$j]->code);
					$simiArr[$i][$j] = $similarity;
					if( $similarity >= 90 ){
						$idtmp->id1 = $i;
						$idtmp->id2 = $j;
						array_push($idarr,$idtmp);
					}
				}
			}
		}
		mysql_close(); 
	?>
	</table> 
</form> 
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