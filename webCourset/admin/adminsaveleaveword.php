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
		$level="����Ա";
		break;
}
//if($level!="����Ա")
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
//*******************************��Ӳ���

		//���ѧ����Ϣ
		$sql="insert into tb_leaveword(pub_teacher,admin_response,subject,content,pub_time) values('" .$fromer . "','" .$tor . "','" .$subject . "','" .$content . "',now())";
		//echo $sql;
		//exit;
		$result=mysql_query($sql);
		//$infoend=mysql_fetch_array($result);
		echo "��ӳɹ�";
	
}
	
	
else if ($action=="del" ){
//*******************************ɾ������
	$id=$_GET["id"];
		$sql="delete from tb_leaveword where id=" .$id;
		//echo $course_id.$sql."456";
		mysql_query($sql);
		echo "ɾ���ɹ�";
}
?>
<a href="adminlistleaveword.php">���������б�</a>
</p>
</body>
</html>
