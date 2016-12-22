<?php 

//应用函数库

//检查登陆正确性
function chklogin($username,$password,$purview){
	$Errmsg="";
	$psd=md5($password);
    switch($purview){
		case 1:
			$sql="select * from student where sno='". $username ."' and pwd='". $psd ."'";break;
		case 2:
			$sql="select * from teacher where tno='". $username ."' and pwd='". $psd ."'";break;
		case 3:
			$sql="select * from admin where admin_name='". $username ."' and pwd='". $psd ."'";break;
	}
	
	//echo $password.$sql."123";
	$result=mysql_query($sql);
	//$result=mysql_query($sql)or die(mysql_error());
	$info=mysql_fetch_array($result);
	//$num=mysql_num_rows($result) or die(mysql_error());
	if (!$info)
		$Errmsg="密码错误！";
	else
		$_SESSION["user"]=$username;
	//@mysql_close($conn);
	return $Errmsg;
}
/*
function Redirect($url)//页面跳转函数
{
	echo "<script language='javascript' type='text/javascript'>";
	echo "window.location.href='$url'";
	echo "</script>";
}*/
function Redirect_word($url)//页面跳转函数
{
	 echo("<meta http-equiv='refresh' content='3;".$url."' />");
}

