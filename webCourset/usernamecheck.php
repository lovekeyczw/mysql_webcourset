<?php 
include "conn.php";
header("Content-type:text/html;charset=gb2312");
$username=$_GET["userName"];
$purview=$_GET["purview"];
//echo $username;
//echo '$username';
$Errmsg="";
switch ($purview){
	case 1:
		$sql="select * from student where sno='".$username ."'";break;
	case 2:
		$sql="select * from teacher where tno='".$username ."'";break;
	case 3:
		$sql="select * from admin where admin='". $username ."'";break;
}

//echo($sql);
$result=mysql_query($sql,$conn);
$info=mysql_fetch_array($result);
if (!$info)
	$Errmsg="用户名不存在！";
else
	$Errmsg="用户名正确！";

echo $Errmsg;
?>