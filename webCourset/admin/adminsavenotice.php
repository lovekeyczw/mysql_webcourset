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
	case 1:
		echo("<meta http-equiv='refresh' content='0;url=../stdindex.php' />");
		break;
	case 2:
		echo("<meta http-equiv='refresh' content='0;url=../tchindex.php' />");
		break;
	case 3:
		$level="管理员";
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

$notno=$_POST["id"];
$notname=$_POST["notname"];
$content=htmlspecialchars($_POST["content"]);
$nottime=$_POST["nottime"];
if($action=="add"){
	//添加
	$sql="select * from tb_notice where id=" .$notno;
	//echo $sql;
	$result=mysql_query($sql);
	$num=mysql_num_rows($result);
	//var_dump($num);
	if (!$num){	
		//添加课程
		$sql="insert into tb_notice(content,admin_name,notice_time) values('".$content ."','" .$notname ."','" .date("Y-m-d h:i:s") ."')";
		//echo $sql;
	    mysql_query($sql);
		echo "添加成功";
	}
	else
		echo "信息出错！";
}
	
else if ($action=="modify"){
	//修改
	//$id=$_GET["id"];
	$sql="select * from tb_notice where id=" .$notno;
	//echo $sql;
	$result=mysql_query($sql);
	$num=mysql_num_rows($result);
	if($num==0)
		echo "修改失败，记录不存在";
	else{
		$sql="update tb_notice set admin_name='" .$notname . "',content='" .$content . "',notice_time='" .$nottime . "' where id=".$notno;
		//echo "<br>".$sql;
		mysql_query($sql);
		echo "修改成功";
	}
}
else if ($action=="del"){
	//删除
	
	$id=$_GET["id"];
	$sql="select * from tb_notice where id=" .$id;
	$result=mysql_query($sql);
	//echo $sql;
	$num=mysql_num_rows($result);
	//var_dump($num);
	if (!$num)
		echo "没有需要删除的课程";
	else{
		$sql="delete from tb_notice where id=" .$id;
		mysql_query($sql);
		echo "删除成功";
	}
}	
?>
<a href="adminlistnotice.php">返回</a>
</body>
</html>