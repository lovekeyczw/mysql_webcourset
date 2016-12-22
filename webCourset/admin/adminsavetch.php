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
//echo $action;
$tchno=$_POST["tchno"];
$tchname=$_POST["tchname"];
$tchpwd=md5($_POST["tchpwd"]);
$sex=$_POST["sex"];
$zhicheng=$_POST["zhicheng"];
$teacher_courseID=$_POST["teacher_courseID"];
$tchdepart=$_POST["tchdepart"];

if ($action=="add"){
	//*******************************添加教师
	$sql="select * from tb_teacher where teacher_id='" .$tchno . "'";
	$result=mysql_query($sql);
	$num=mysql_num_rows($result);
	if($num==0){
		$sql="insert into tb_teacher(teacher_id,teacher_name,teacher_psd,teacher_sex,zhicheng,teacher_courseID,dept_id) values('" . $tchno . "','" .$tchname. "','" .$tchpwd . "','" .$sex . "','" .$zhicheng ."','" .$teacher_courseID . "','" .$tchdepart . "')";
		$result=mysql_query($sql);
		//echo $sql;
		echo "添加教师成功";
	}
	else
		echo "教师编号已被注册！";
}
else if ($action=="modify"){
	//*****************************修改教师
	//$id=$_GET["id"];
	$sql="select * from tb_teacher where teacher_id='" . $tchno . "'";
	$result=mysql_query($sql);
	$num=mysql_num_rows($result);
	if($num==0)
		echo "修改失败，记录不存在";
	else{
		$sql="update tb_teacher set teacher_name='" . $tchname . "',teacher_psd='" .$tchpwd . "',teacher_sex='" .$sex .  "',zhicheng='" .$zhicheng . "',teacher_courseID='" .$teacher_courseID . "',dept_id='" .$tchdepart .  "' where teacher_id='" .$tchno ."'";
		mysql_query($sql);
		echo "修改成功";
	}
}
else if($action=="del"){
	$id=$_GET["id"];
	$sql="select * from tb_teacher where teacher_id='" .$id . "'";
	$result=mysql_query($sql);
	$num=mysql_num_rows($result);
	if($num==0)
		echo "错误，没有此教师的信息";
	else{
		$sql="delete from tb_teacher where teacher_id='" .$id ."'";
		mysql_query($sql);
		echo "删除成功";
	}
}

?>
<a href="adminlisttch.php">返回</a>
</body>
</html>
