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

$stuno=$_POST["stuno"];
$stuname=$_POST["stuname"];
$studepart=$_POST["studepart"];
$stumajor=$_POST["stumajor"];
$stuenter=$_POST["stuenter"];
$password=md5($_POST["password"]);
$sex=$_POST["sex"];
$select_num=$_POST["select_num"];

if ($action=="add"){
//*******************************��Ӳ���
	
	$sql="select * from tb_student where stu_id='".$stuno ."'";
	$result=mysql_query($sql);
	$num=mysql_num_rows($result);
	if ($num==0){
		//���ѧ����Ϣ
		$sql="insert into tb_student(stu_id,stu_name,stu_psd,stu_sex,stu_major,dept_id,select_num) values('" .$stuno . "','" .$stuname . "','" .$password . "','" .$sex . "','".$stumajor . "','" .$studepart. "'," .$select_num . ")";
		//echo $sql;
		//exit;
		$result=mysql_query($sql);
		//$infoend=mysql_fetch_array($result);
		echo "��ӳɹ�";
	}
	else
		echo "ѧ���Ѿ���ע�ᣡ";
}
	
	
	
else if ($action=="modify"){
//*******************************�޸Ĳ���
	//id=request.Form("id")
	$sql="select * from tb_student where stu_id='".$stuno. "'";
	//echo $sql;
	//exit;
	$result=mysql_query($sql);
	$num=mysql_num_rows($result);
	if($num==0){
		//�޸�ѧ����Ϣ
		echo "�޸�ʧ�ܣ���¼������";
		}
	else{
	      $sql="update tb_student set stu_name='" .$stuname."',stu_psd='" . $password . "',stu_sex='" . $sex . "',stu_major='" . $stumajor . "', dept_id='" .$studepart ."', select_num=" .$select_num ." where stu_id='" .$stuno . "'";
		//echo $sql;
		mysql_query($sql);
		echo "�޸ĳɹ�";
		}
}
	
	
	
	
else if ($action=="del" ){
//*******************************ɾ������
	$id=$_GET["id"];
	$sql="select * from tb_student where stu_id='" .$id . "'";
	$result=mysql_query($sql);
	$num=mysql_num_rows($result);
	if($num==0)
		echo "����û����Ҫɾ��ѧ������Ϣ��";
	else{
		$sql="delete from tb_student where stu_id='" .$id . "'";
		mysql_query($sql);

	$sql="select * from tb_studentcourse where student_id='" .$id . "'";
	//echo $sql."123";
	$result=mysql_query($sql);
	$info=mysql_fetch_array($result);
	$num=mysql_num_rows($result);
	if($num==0)
		echo "����û����Ҫɾ��ѧ������Ϣ��";
	else{
		$course_id=$info["course_id"];
		$sql="delete from tb_studentcourse where student_id='" .$id . "'";
		//echo $course_id.$sql."456";
		mysql_query($sql);
		$sql="update tb_course set course_count=course_count-1 where course_id='".$course_id . "'";
		mysql_query($sql);
		//echo $sql."456";
		echo "ɾ���ɹ�";
	   }
	}
}
?>
<a href="adminliststd.php">����ѧ���б�</a>
</p>
</body>
</html>
