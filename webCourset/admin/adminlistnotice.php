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
    <th width="72">公告编号</th>
    <th width="154">内容</th>
    <th width="62">发布人</th>
    <th width="72">发布时间</th>
    <th width="72">操作</th>
  </tr>
  <?php 
  $sql="select * from tb_notice";
  $result=mysql_query($sql);
  $num=mysql_num_rows($result);
  $info=mysql_fetch_array($result);
 do{
  ?>
  <tr>
    <td><?php echo $info["id"];?></td>
    <td><?php echo $info["content"];?></td>
     <td><?php echo $info["admin_name"];?></td>
      <td><?php echo $info["notice_time"];?></td>
    <td><a href="adminaddnotice.php?action=modify&id=<?php echo $info["id"];?>">修改</a>|<a href="adminsavenotice.php?action=del&id=<?php echo $info["id"];?>">删除</a></td>
  </tr>
  <?php
  } while ($info=mysql_fetch_array($result));
  ?>
</table>
</body>
</html>
