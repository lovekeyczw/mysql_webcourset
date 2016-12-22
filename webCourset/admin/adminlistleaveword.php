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
    <th>留言编号</th>
    <th>发布人</th>
    <th>回复者</th>
    <th>主题</th>
    <th>内容</th>
    <th>回复时间</th>
    <th>操作</th>
  </tr>
  <?php 
  $sql="select * from tb_leaveword";
  $result=mysql_query($sql);
  $num=mysql_num_rows($result);
  //$info=mysql_fetch_array($result);
  while ($info=@mysql_fetch_array($result)){
  if(!$info)
  {
   echo "<tr><td>还没有留言^_^</td></tr>";
  }else {
  ?>
  <tr>
    <td><?php echo $info["id"];?></td>
    <td><?php echo $info["pub_teacher"];?></td>
    <td><?php echo $info["admin_response"];?></td>
    <td><?php echo $info["subject"];?></td>
    <td><?php echo $info["content"];?></td>
    <td><?php echo $info["pub_time"];?></td>
    <td><a href="adminaddleaveword.php?id=<?php echo $info["id"];?>">回复</a>|<a href="adminsaveleaveword.php?action=del&id=<?php echo $info["id"];?>">删除</a></td>
  </tr>
  <?php
  }
  }
  ?>
</table>
</body>
</html>
