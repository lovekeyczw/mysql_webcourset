<?php session_start()?>
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
		//$level='学生';
		break;
	case 2:
		//echo("<meta http-equiv='refresh' content='0;url=../tchindex.php' />");
		break;
	//case 3:
		//$level="管理员";
		//break;
}
//if($level!="管理员")
  // exit;
?>
<title></title>
</head>
<?php include "conn.php";?>
<body>
<table class="datalist" width="100%" border="1" style="text-align:center">
  <tr>
    <th width="72">课程号</th>
    <th width="108">课程名</th>
    <th width="70">学分</th>
	<th width="100">授课老师</th>
    <th width="100">上课时间</th>
	<th width="100">操作</th>
  </tr>
  <?php 
  $sql="select * from course where cno not in(select cno from sc where grade is null and sno='". $_SESSION["user"] ."')";
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
   <td><?php echo $info["pos"];?></td>
   <!--   <td><?php //echo $info["jieshao"];?></td>--> 
    <td><a href="adminsavecourse.php?action=add&id=<?php echo $info["cno"];?>	
	?>">选课</a></td>
  </tr>
  <?php
  } while ($info=mysql_fetch_array($result));
  ?>
</table>
</body>
</html>
