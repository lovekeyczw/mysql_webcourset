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
		$level='学生';
		break;
	case 2:
		echo("<meta http-equiv='refresh' content='0;url=../tchindex.php' />");
		break;
	case 3:
	    break;
}
//if($level!="管理员")
  // exit;
?>
<title>学校选课系统(后台)-<?php echo $level;?></title>
<style type="text/css">
body{
	background-color:#1CA0D7;
	margin=0px;
	padding=0px;
}
.datalist{
	   border:1px solid #744011;
	   font-family:Arial;
	   border-collapse:collapse;
	   background-color:#ffd2aa;
	   font-size:14px;
	}
	.datalist th{
	   border:1px solid #744011;
	   background-color:#a16128;
	   color:#ffffff;
	   font-weight:bold;
	   padding:4px 12px 4px 12px;
	   text-align:center;
	}
	.datalist td{
	   border:1px solid #744011;
	   text-align:center;
	   padding:4px 10px 4px 10px;
	}
	.datalist tr:hover,.datalist tr.altrow{
	   background-color:#dca06b;
	}
	input{
	  border:1px solid #744011;
	  color:#744011;
	}
</style>
</head>

<body>


<table class="datalist" width="100%" style="font-size:14px;" border="0" align="center">
  <tr>
    <th align="center"><h1>欢迎访问选课系统</h1></th>
  </tr>
  <tr>
    <td align="center"><span><a href="stdl.php" target="mainFrame">查看个人信息</a></span></td>
  </tr>
  <tr>
    <td align="center"><span><a href="courseno.php" target="mainFrame">选修课程</a></span></td>
  </tr>
  <tr>
    <td align="center"><span><a href="courseok.php" target="mainFrame">已选课程</a></span></td>
  </tr>
  <tr>
    <td align="center"><span><a href="coursearu.php" target="mainFrame">已修课程</a></span></td>
  </tr>
   <tr>
    <td align="center"><span><a href="../logout.php" target="_parent">退出</a></span></td>
  </tr>
</table>
</body>
</html>
