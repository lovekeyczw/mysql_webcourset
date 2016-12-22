<?php session_start()?>
<?php
ini_set("date.timezone","Asia/Shanghai");
include "conn.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link href="css.css" rel="stylesheet" type="text/css" />
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
		echo("<meta http-equiv='refresh' content='0;url=../tchindex.asp' />");
		break;
	case 3:
		$level="管理员";
		break;
}
//if($level!="管理员")
  // exit;
?>
<title>留言板</title>
</head>

<body>
<table>
<?php
$id=$_GET["id"];
$sql="select * from tb_leaveword where id='$id'";
//echo $sql,"123";
$result=mysql_query($sql);
$info=mysql_fetch_array($result);
?>
</table>
<form name="form1" method="post" action="adminsaveleaveword.php?action=add">
<table>
<tr><td>To</td><td><input name="tor" type="text" value="<?php echo $info["pub_teacher"];?>" /></td></tr>
<tr><td>From</td><td><input name="fromer" type="text" value="<?php echo $_SESSION["user"];?>" /></td></tr>
<tr><td>主题</td><td><input name="subject" type="text" /></td></tr>
<tr><td>内容</td><td><textarea name="content" cols="25" rows="10" ></textarea></td></tr>
</table>
<input name="submit" type="submit" value="提交" /><input name="reset" type="reset" value="重置"/><input name="hidden" type="hidden" value="<?php echo date("Y-m-d h:i:s")?>" />
</form>
</body>
</html>
