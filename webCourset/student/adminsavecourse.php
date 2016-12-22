<?php session_start()?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<?php
if ($_SESSION["user"]==""){
     echo "<meta http-equiv='refresh' content='0;url=../index.php' />";
     exit;
   }
switch($_SESSION["level"])
{
	case 2:
		echo("<meta http-equiv='refresh' content='0;url=../tchindex.php' />");
		break;
	case 1:
		$level="学生";
		break;
}
//if($level!="管理员")
  // exit;
?>
<title></title>
</head>
<?php include "conn.php";?>
<body>
<?php 
$action=$_GET["action"];

$cno=$cnot;
echo "test";
echo $cno;

if($action=="add"){
	//添加
	$sql="INSERT INTO sc (sno,cno,grade) VALUES ('".$_SESSION["user"]."', '".$cno ."' , NULL)";
	$result=mysql_query($sql);
    if($result) echo "添加成功";
	else echo "添加失败";
}
else {
	$sql="delete from sc where sno=".$_SESSION["user"]." and cno=".$cno ;
	$result=mysql_query($sql);
	if($result) echo "删除成功";
	else echo "删除失败";

}	
?>
<a href="adminlistcourse.php">返回</a>
</body>
</html>
