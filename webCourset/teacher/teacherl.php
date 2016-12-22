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
		//echo("<meta http-equiv='refresh' content='0;url=../stdindex.php' />");
		break;
	case 2:
		$level="老师";
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
<?php include "conn.php";?>
<body>
<table class="datalist" width="100%" border="1" style="text-align:center">
  <tr>
    <th>工作证号</th>
    <th>姓名</th>
    <th>职称</th>
    <th>电话</th>
    <th>院系</th> 
  </tr>
  
  <?php 
  $sql="select * from teacher";
  $result=mysql_query($sql);
  $num=mysql_num_rows($result);
  $info=mysql_fetch_array($result);
  ?>
  <tr>
    <td><?php echo $info["tno"];?></td>
    <td><?php echo $info["tname"];?></td>
    <td><?php echo $info["pos"];?></td>
    <td><?php echo $info["pho"];?></td>
    <td><?php echo $info["xname"];?></td>
  </tr>
</table>
</body>
</html>
