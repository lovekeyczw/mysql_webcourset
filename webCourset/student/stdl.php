<?php session_start()?>
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
		$level="学生";
		break;
	case 2:
		//echo("<meta http-equiv='refresh' content='0;url=../tchindex.php' />");
		break;
	case 3:
		//$level="管理员";
		break;
}
//if($level!="管理员")
  // exit;
?>
<title></title>
</head>
<?php mysql_connect("localhost","root","root")or die("数据库服务器连接错误".mysql_error());
mysql_select_db("displaydb")or die("数据库访问错误".mysql_error());
?>

<body>
<table class="datalist" width="100%" border="1" style="text-align:center">
  <tr>
    <th>学号</th>
    <th>姓名</th>
    <th>性别</th>
    <th>出生日期</th> 
    <th>班级</th>
    <th>院系</th>
  </tr>
  
  <?php 
  $sql="select * from student where sno='".$_SESSION["user"]."'";
  $result=mysql_query($sql);
  $num=mysql_num_rows($result);
  $info=mysql_fetch_array($result);
  $sql2="select * from class where clno=(select clno from student where sno='".$_SESSION["user"]."')";
  $result2=mysql_query($sql2);
  $info2=mysql_fetch_array($result2);
  ?>
  <tr>
    <td><?php echo $info["sno"];?></td>
    <td><?php echo $info["sname"];?></td>
    <td><?php echo $info["sex"];?></td>
    <td><?php echo $info["bir"];?></td>
    <td><?php echo $info2["clname"];?></td>
    <td><?php echo $info2["xname"];?></td>  
  </tr>
</table>
</body>
</html>
