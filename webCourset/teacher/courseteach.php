<?php session_start()?>
/*<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
		//echo("<meta http-equiv='refresh' content='0;url=../tchindex.php' />");
		break;
	//case 3:
		//$level="����Ա";
		//break;
}
//if($level!="����Ա")"<a href="adminaddcourse.php?action=del">��ѡ</a>";
  // exit;
?>*/
<title></title>
</head>
<?php include "conn.php";?>
<body>
<table class="datalist" width="100%" border="1" style="text-align:center">
  <tr>
   <th width="72">�γ̺�</th>
    <th width="108">�γ���</th>
    <th width="70">ѧ��</th>
    <th width="100">�Ͽ�ʱ��</th>
	<th width="100">ѡ��ѧ��</th>
  </tr>
  <?php 
  $sql="select * from course where tno='".$_SESSION["user"]."'" ;
  $result=mysql_query($sql);
  $num=mysql_num_rows($result);
  $info=mysql_fetch_array($result);
 do{
  ?>
  <tr>
    <td><?php echo $info["cno"];?></td>
    <td><?php echo $info["cname"];?></td>
     <td><?php echo $info["xuef"];?></td>
      <td><?php echo $info["time"];?></td>
	<td><a href="<?php echo "stdlist.php?tcno=".$info["cno"]."&tcn=".$info["cname"]?>">�鿴</a></td>
  </tr>
  <?php
  } while ($info=mysql_fetch_array($result));
  ?>
</table>
</body>
</html>
