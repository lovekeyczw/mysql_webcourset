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
		break;
	case 2:
		//echo("<meta http-equiv='refresh' content='0;url=../tchindex.php' />");
		break;
	case 3:
		//$level="����Ա";
		break;
}
//if($level!="����Ա")
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
    <th>ѧ��</th>
    <th>����</th>
    <th>�Ա�</th>
    <th>��������</th> 
    <th>�༶</th>
    <th>Ժϵ</th>
  </tr>
  
  <?php 
  $sql="select * from student where sno='".$_SESSION["user"]."'";
  $result=mysql_query($sql);
  $num=mysql_num_rows($result);
  $info=mysql_fetch_array($result);
  $sql2="select * from class where clno=(select clno from student where sno='".$_SESSION["user"]."')";
  $result2=mysql_query($sql2);
  $info2=mysql_fetch_array($result2);
  ?>
  <tr>
    <td><?php echo $info["sno"];?></td>
    <td><?php echo $info["sname"];?></td>
    <td><?php echo $info["sex"];?></td>
    <td><?php echo $info["bir"];?></td>
    <td><?php echo $info2["clname"];?></td>
    <td><?php echo $info2["xname"];?></td>  
  </tr>
</table>
</body>
</html>
