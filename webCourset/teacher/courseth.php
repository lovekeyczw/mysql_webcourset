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
		//$level='ѧ��';
		break;
	case 2:
		//echo("<meta http-equiv='refresh' content='0;url=../tchindex.php' />");
		break;
	//case 3:
		//$level="����Ա";
		//break;
}
//if($level!="����Ա")
  // exit;
?>
<title></title>
</head>
<?php include "conn.php";?>
<body>
<table class="datalist" width="100%" border="1" style="text-align:center">
  <tr>
    <th width="72">�γ̺�</th>
    <th width="108">�γ���</th>
    <th width="70">ѧ��</th>
	<th width="100">�ڿ���ʦ</th>
    <th width="100">�Ͽ�ʱ��</th>
	<th width="100">����</th>
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
	?>">ѡ��</a></td>
  </tr>
  <?php
  } while ($info=mysql_fetch_array($result));
  ?>
</table>
</body>
</html>
