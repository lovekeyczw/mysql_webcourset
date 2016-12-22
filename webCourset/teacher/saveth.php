<?php session_start()?>
<?php include "conn.php";?>
<body>
<p>
<?php 
$action=$_GET["action"];
$tno=$_SESSION["user"];
$cno=$_POST["cno"];
$cname=$_POST["cname"];
$xuef=$_POST["xuef"];
$time=$_POST["time"];
if ($action=="add"){
//*******************************添加部分
	
	$sql="select * from course where cno='".$cno ."'";
	$sqlname="select tname from teacher where tno='".$tno."'";
	$resultname=mysql_query($sqlname);
	$result=mysql_query($sql);
	$info=mysql_fetch_array($resultname);
	$tname=$info["tname"];
	$num=mysql_num_rows($result);
	if ($num==0)
	{
		$sql="insert into course(tno,tname,xuef,time,cname,cno) values('" .$tno . "','" .$tname . "','" .$xuef . "','" .$time . "','".$cname . "','" .$cno . "')";
		//echo $sql;
		//exit;
		$result=mysql_query($sql);
		//$infoend=mysql_fetch_array($result);
		echo "添加成功";
	}
	else
	{
		echo "课程已经被注册！";
		}
}

?>
</p>
</body>
</html>
