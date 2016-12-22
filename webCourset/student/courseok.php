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
		//echo("<meta http-equiv='refresh' content='0;url=../stdindex.php' />");
		break;
	case 2:
		//echo("<meta http-equiv='refresh' content='0;url=../tchindex.php' />");
		break;
	case 3:
		//$level="管理员";
		break;
}
//if($level!="管理员")"<a href="adminaddcourse.php?action=del">退选</a>";
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
   <th width="72">课程号</th>
    <th width="108">课程名</th>
    <th width="70">学分</th>
	<th width="100">授课老师</th>
    <th width="100">上课时间</th>
	<th width="70">操作</th>
  </tr>
  <?php 
  $sql="select * from course where cno in(select cno from sc where sno='".$_SESSION["user"]."' and grade is NULL)";
  $result=mysql_query($sql);
  $num=mysql_num_rows($result);
  $info=mysql_fetch_array($result);
 do{
  ?>
  <tr>
    <td><?php echo $info["cno"];?></td>
    <td><?php echo $info["cname"];?></td>
     <td><?php echo $info["xuef"];?></td>
      <td><?php echo $info["tname"];?></td>
    <td><?php echo $info["time"];?></td>
	<td><a href="<?php echo "adminsavecourse.php?action=del&cnot=".$info["cno"]?>">退选</a></td>
  </tr>
  <?php
  } while ($info=mysql_fetch_array($result));
  ?>
</table>
</body>
</html>
