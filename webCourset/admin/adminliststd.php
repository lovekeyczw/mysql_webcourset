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
		$level="����Ա";
		break;
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
    <th>ѧ�����</th>
    <th>ѧ������</th>
    <th>ѧ������</th>
    <th>ѧ���Ա�</th>
    <th>ѧ��רҵ</th> 
    <th>ѧ��ϵ����</th>
    <th>ѡ�δ���</th>
    <th>����</th>
  </tr>
  
  <?php 
  $sql="select * from tb_student";
  $result=mysql_query($sql);
  $num=mysql_num_rows($result);
  $info=mysql_fetch_array($result);
  //echo $num;
  do{
  ?>
  <tr>
    <td><?php echo $info["stu_id"];?></td>
    <td><?php echo $info["stu_name"];?></td>
    <td><?php echo $info["stu_psd"];?></td>
    <td><?php echo $info["stu_sex"];?></td>
    <td><?php echo $info["stu_major"];?></td>
    <td><?php echo $info["dept_id"];?></td>  
    <td><?php echo $info["select_num"];?></td> 
    <td><a href="adminaddstd.php?action=modify&id=<?php echo $info["stu_id"];?>">�޸�</a>
	|<a href="adminsavestd.php?action=del&id=<?php echo $info["stu_id"];?>">ɾ��</a>
	</td>
  </tr>
  <?php
  }while ($info=mysql_fetch_array($result));
  ?>
</table>
</body>
</html>
