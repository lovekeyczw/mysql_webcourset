<?php session_start()?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="css.css" rel="stylesheet" type="text/css" />
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
		$level="ѧ��";
		break;
}
//if($level!="����Ա")
  // exit;
?>
<title></title>
</head>
<?php mysql_connect("localhost","root","root")or die("���ݿ���������Ӵ���".mysql_error());

mysql_select_db("displaydb")or die("���ݿ���ʴ���".mysql_error());

?>

<body>
<?php echo"��ӭʹ��ѧ��ѡ��ϵͳ";?>
</body>
</html>
