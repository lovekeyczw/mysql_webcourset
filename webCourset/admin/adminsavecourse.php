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
<?php 
$action=$_GET["action"];

$cno=$_POST["cno"];
$cname=$_POST["cname"];
$cxueshi=$_POST["cxueshi"];
$cxuefen=$_POST["cxuefen"];
$ctime=$_POST["ctime"];
$cdidian=$_POST["cdidian"];
$cjieshao=$_POST["cjieshao"];
$cmax=$_POST["cmax"];
$cyixuan=$_POST["cyixuan"];

if($action=="add"){
	//���
	$sql="select * from tb_course where course_id='" .$cno."'";
	$result=mysql_query($sql);
	$num=mysql_num_rows($result);
	if ($num==0){	
		//��ӿγ�
		$sql="insert into tb_course(course_id,course_name,xueshi,xuefen,jieshao,max_selected,didian,shijian,course_count) values('" .$cno . "','".$cname ."'," .$cxueshi ."," .$cxuefen .   ",'" .$cjieshao ."'," .$cmax . ",'" .$cdidian . "','" .$ctime . "'," .$cyixuan .")";
		//echo $sql;
		$result=mysql_query($sql);
		echo "��ӳɹ�";
	}
	else
		echo "�γ̺��Ѿ���ע��";
}
	
else if ($action=="modify"){
	//�޸�
// 	id=$_GET["id"];
	$sql="select * from tb_course where course_id='" .$cno . "'";
	
	$result=mysql_query($sql);
	$num=mysql_num_rows($result);
	if($num==0)
		echo "�޸�ʧ�ܣ���¼������";
	else{
		$sql="update tb_course set course_name='" .$cname . "',xueshi=" .$cxueshi . ",xuefen=" .$cxuefen . ",jieshao='" .$cjieshao. "',max_selected=" .$cmax .",didian='" .$cdidian . "',shijian='" .$ctime. "',course_count=" .$cyixuan . " where course_id='".$cno . "'";
		mysql_query($sql);
		echo "�޸ĳɹ�";
	}
}
else if ($action=="del"){
	//ɾ��
	
	$id=$_GET["id"];
	$sql="select * from tb_course where course_id='" .$id ."'";
	$result=mysql_query($sql);
	//echo $sql;
	$num=mysql_num_rows($result);
	if (!$num)
		echo "û����Ҫɾ���Ŀγ�";
	else{
		$sql="delete from tb_course where course_id='" .$id ."'";
		mysql_query($sql);
		$sql="select * from tb_studentcourse where course_id='" .$id ."'";
		$result=mysql_query($sql);
		//echo $sql;
		$num=mysql_num_rows($result);
		if (!$num)
			echo "û����Ҫɾ���Ŀγ�";
		else{
			$sql="delete from tb_studentcourse where course_id='" .$id ."'";
			mysql_query($sql);
			echo "ɾ���ɹ�";
		}
	}
}	
?>
<a href="adminlistcourse.php">����</a>
</body>
</html>
