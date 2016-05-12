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
	echo "欢迎你：".$_SESSION['username'].'<br />';
?>
<table border=1 width=60% align=center>
<form id='comId' action="compareHomework.php" method="get">
学号1：<input type="text" id="comId1" name='id1'/><br />
学号2：<input type="text" id="comId2" name='id2'/><br />
<input type="submit" value="比较" />
</form>
<caption>学生信息表</caption> 
<th>学生1</th><th>学生2</th><th>相似度</th>
<?php
	function myTrim($str){
		$blank = array("\r\n",' ');
		$nl = "&lt;br /&gt;";
		$str = nl2br($str);
		$str = htmlspecialchars($str);
		$str = str_replace($nl,'@',$str);
		$str = str_replace($blank,'',$str);
		
		$len = strlen($str);
		$str .= '#';

		$ret = "";
		$flag = false;
		for($i = 0; $i < $len; $i++){
			$flag = false;
			if( $str[$i] == '/' && $str[$i+1] == '/'){
				$j = $i+2;
				while($j < $len){
					if( $str[$j] == '@'){
						$i = $j;
						$flag = true;
						break;
					}
					$j++;
				}
				if($flag)
					continue;
				if($j == $len ) break;
			}
			if( $str[$i] == '/' && $str[$i+1] == '*'){
				$j = $i+2;
				while($j < $len){
					if($str[$j] == '*' && $str[$j+1] == '/'){
						$i = $j+1;
						$flag = true;
						break;
					}
					$j++;
				}
				if($flag)
					continue;
				if($j == $len ) break;
			}
			if($str[$i] != '@'){
				$ret .= $str[$i];
			}
		}
		return $ret;
	}

	function calcSimi($str1,$str2){
		$str1 = myTrim($str1);
		$str2 = myTrim($str2);
		$len1 = strlen($str1);
		$len2 = strlen($str2);
		$dp = array_fill(0,$len1+5,array_fill(0,$len2+5,0));
		for($i = 0; $i <= $len1; $i++) $dp[$i][0]=$i;
		for($j = 0; $j <= $len2; $j++) $dp[0][$j]=$j;
		for($i = 1; $i <= $len1; $i++){
			for($j = 1; $j <= $len2; $j++){
				$cost = ($str1[$i-1]==$str2[$j-1]?0:1);
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
	while($rs=mysql_fetch_object($result)){ 
		array_push($codeArr,$rs);
	}
	$len = count($codeArr);
	$rec = array_fill(0,$len+5,0);
	$simiArr = array_fill(0,$len+5,0);
	for($i = 0; $i < $len; $i++){
		for($j = 0; $j < $len; $j++){
			if( $i == $j ) continue;
			else{
				$similarity = calcSimi($codeArr[$i]->code,$codeArr[$j]->code);
				if( $similarity > $simiArr[$i] ){
					$simiArr[$i]=$similarity;
					$rec[$i] = $j;
				}
			}
		}
	}
	for( $i = 0; $i < $len; $i++){
		$t1='id'.($i*2);
		$t2='id'.($i*2+1);
	?>

	<tr ><th id=<?php echo $t1; ?>><?php echo $codeArr[$i]->id; ?></th><th id=<?php echo $t2; ?>><?php echo $codeArr[$rec[$i]]->id; ?></th><th><a href="javascript:toCom(<?php echo $i; ?>)"><?php echo $simiArr[$i]; ?></a></th></tr>
	<?php
	}
	mysql_close(); 
?>
</table> 
<script>
function toCom(i){
	var x=i*2+1;
	document.getElementById("comId1").value=document.getElementById('id'+i*2).innerHTML;
	document.getElementById("comId2").value=document.getElementById('id'+x).innerHTML;
}
</script>
</body>
</html>