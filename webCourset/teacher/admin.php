<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<?php
global $level;
   if ($_SESSION["user"]==""){
     echo "<meta http-equiv='refresh' content='0;url=../index.php' />";
     exit;
   }
   switch($_SESSION["level"])
   {
   case 1:
		//$level='学生';
		break;
	case 2:
		$level='老师';
		break;
   } 
   
?>
<title>学校选课系统(后台)-<?php echo $level;?></title>
</head>

<frameset rows="*" cols="212,*" framespacing="0" frameborder="yes" border="4">
  <frame src="adminleft.php" name="leftFrame" scrolling="No" noresize="noresize" id="leftFrame" title="left" />
  <frame src="hello.php" name="mainFrame" id="mainFrame" title="main" />
</frameset>
<noframes><body>
</body>
</noframes></html>
