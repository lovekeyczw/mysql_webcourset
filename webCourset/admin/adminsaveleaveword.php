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
<p>
<?php 
$action=$_GET["action"];

$tor=$_POST["tor"];
$fromer=$_POST["fromer"];
$subject=$_POST["subject"];
$content=htmlspecialchars($_POST["content"]);
$pub_time=$_POST["hidden"];

if ($action=="add"){
//*******************************添加部分

		//添加学生信息
		$sql="insert into tb_leaveword(pub_teacher,admin_response,subject,content,pub_time) values('" .$fromer . "','" .$tor . "','" .$subject . "','" .$content . "',now())";
		//echo $sql;
		//exit;
		$result=mysql_query($sql);
		//$infoend=mysql_fetch_array($result);
		echo "添加成功";
	
}
	
	
else if ($action=="del" ){
//*******************************删除部分
	$id=$_GET["id"];
		$sql="delete from tb_leaveword where id=" .$id;
		//echo $course_id.$sql."456";
		mysql_query($sql);
		echo "删除成功";
}
?>
<a href="adminlistleaveword.php">返回留言列表</a>
</p>
</body>
</html>
