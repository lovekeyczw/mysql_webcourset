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
		echo("<meta http-equiv='refresh' content='0;url=../stdindex.php' />");
		break;
	case 2:
		echo("<meta http-equiv='refresh' content='0;url=../tchindex.php' />");
		break;
	case 3:
		$level="管理员";
		break;
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
    <th>教师编号</th>
    <th>教师姓名</th>
    <th>教师密码</th>
    <th>教师性别</th>
    <th>教师职称</th>
    <th>所授课程编号</th>
    <th>系部编号</th>
    <th>操作</th>
  </tr>
  <?php 
  $sql="select * from tb_teacher";
  $result=mysql_query($sql);
  $num=mysql_num_rows($result);
  $info=mysql_fetch_array($result);
  do{
  ?>
  <tr>
    <td><?php echo $info["teacher_id"];?></td>
    <td><?php echo $info["teacher_name"];?></td>
    <td><?php echo $info["teacher_psd"];?></td>
    <td><?php echo $info["teacher_sex"];?></td>
    <td><?php echo $info["zhicheng"];?></td>
    <td><?php echo $info["teacher_courseID"];?></td>
    <td><?php echo $info["dept_id"];?></td>
    <td><a href="adminaddtch.php?action=modify&id=<?php echo $info["teacher_id"];?>">修改</a>|<a href="adminsavetch.php?action=del&id=<?php echo $info["teacher_id"];?>">删除</a></td>
  </tr>
  <?php
  }while ($info=mysql_fetch_array($result));
  ?>
</table>
</body>
</html>
