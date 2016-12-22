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
    <th width="72">课程编号</th>
    <th width="108">课程名</th>
    <th width="70">学时</th>
    <th width="70">学分</th>
    <th width="100">上课时间</th>
    <th width="75">上课地点</th>
 <!--    <td width="313">课程介绍</td>--> 
     <th width="75">已选人数</th>
     <th width="75">人数上限</th>
    <th width="80">操作</th>
  </tr>
  <?php 
  $sql="select * from tb_course";
  $result=mysql_query($sql);
  $num=mysql_num_rows($result);
  $info=mysql_fetch_array($result);
 do{
  ?>
  <tr>
    <td><?php echo $info["course_id"];?></td>
    <td><?php echo $info["course_name"];?></td>
     <td><?php echo $info["xueshi"];?></td>
      <td><?php echo $info["xuefen"];?></td>
    <td><?php echo $info["shijian"];?></td>
   <td><?php echo $info["didian"];?></td>
   <!--   <td><?php //echo $info["jieshao"];?></td>--> 
    <td><?php echo $info["course_count"];?></td>
    <td><?php echo $info["max_selected"];?></td>
    <td><a href="adminaddcourse.php?action=modify&id=<?php echo $info["course_id"];?>">修改</a>|<a href="adminsavecourse.php?action=del&id=<?php echo $info["course_id"];?>">删除</a></td>
  </tr>
  <?php
  } while ($info=mysql_fetch_array($result));
  ?>
</table>
</body>
</html>
