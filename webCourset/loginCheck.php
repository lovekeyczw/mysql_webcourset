<?php
session_start();
$_SESSION["user"]="";  
$_SESSION["level"]="";
//echo '<meta http-equiv="Content-Type" content="text/html; charset=gb2312">';
include "conn.php";
include "function.php";
$username=$_POST["userName"];
$password=$_POST["pwd"];
$purview=$_POST["select"];
//echo $username;
$errmsg=chklogin($username,$password,$purview);
if($errmsg==""){
	//echo("��¼�ɹ���user");
	$_SESSION["user"]=$username;
	//Ȩ�޵����� 1ѧ�� 2��ʦ 3����Ա
	$_SESSION["level"]=$purview;
	switch($purview){
		case 1:
			header("location:student/admin.php");
			break;
		case 2:
			header("location:teacher/admin.php");break;
		case 3:
			header("location:admin/admin.php");break;
	}
}
	else{
	//echo $errmsg;
	header("location:index.php");
	}
?>


