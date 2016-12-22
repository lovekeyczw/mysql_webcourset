
<?php include "conn.php";?>
<body>
<p>
<?php 
$action=$_GET["action"];

$sno=$_POST["sno"];
$sname=$_POST["sname"];
$bir=$_POST["bir"];
$clno=$_POST["clno"];
$password=md5($_POST["password"]);
$sex=$_POST["sex"];
if ($action=="add"){
//*******************************添加部分
	
	$sql="select * from student where sno='".$sno ."'";
	$result=mysql_query($sql);
	$num=mysql_num_rows($result);
	if ($num==0){
		//添加学生信息
		$sql="insert into student(sno,sname,pwd,sex,bir,clno) values('" .$sno . "','" .$sname . "','" .$password . "','" .$sex . "','".$bir . "','" .$clno . "')";
		//echo $sql;
		//exit;
		$result=mysql_query($sql);
		//$infoend=mysql_fetch_array($result);
		echo "添加成功";
	}
	else
		echo "学号已经被注册！";
}
?>
</p>
</body>
</html>
