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
	     $level="ѧ��";
		//echo("<meta http-equiv='refresh' content='0;url=../stdindex.php' />");
		break;
	case 2:
		//echo("<meta http-equiv='refresh' content='0;url=../tchindex.php' />");
		break;
	case 3:
		//$level="����Ա";
		break;
}
//if($level!="����Ա")"<a href="adminaddcourse.php?action=del">��ѡ</a>";
  // exit;
?>
<title></title>
</head>
<?php mysql_connect("localhost","root","root")or die("���ݿ���������Ӵ���".mysql_error());
mysql_select_db("displaydb")or die("���ݿ���ʴ���".mysql_error());
?>

<body>
<table class="datalist" width="100%" border="1" style="text-align:center">
  <tr>
   <th width="72">�γ̺�</th>
    <th width="108">�γ���</th>
    <th width="70">ѧ��</th>
	<th width="100">�ڿ���ʦ</th>
    <th width="100">�Ͽ�ʱ��</th>
	<th width="70">����</th>
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
	<td><a href="<?php echo "adminsavecourse.php?action=del&cnot=".$info["cno"]?>">��ѡ</a></td>
  </tr>
  <?php
  } while ($info=mysql_fetch_array($result));
  ?>
</table>
</body>
</html>
