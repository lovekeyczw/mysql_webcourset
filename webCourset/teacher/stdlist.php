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
		//echo("<meta http-equiv='refresh' content='0;url=../tchindex.php' />");
		$level="��ʦ";
		break;
	//case 3:
		//$level="����Ա";
		//break;
}
//if($level!="����Ա")"<a href="adminaddcourse.php?action=del">��ѡ</a>";
  // exit;
?>
<title></title>
</head>
<?php include "conn.php";?>
<body>
<table class="datalist" width="100%" border="1" style="text-align:center" >
  <tr>
   <th width="72">ѧ��</th>
    <th width="70">����</th>
    <th width="70">Ժϵ</th>
	<th width="70">�ɼ�</th>
  </tr>
  <?php 
  $tcnot=$_GET['tcno'];
  $sql="select student.sno,xname,sname,grade from sc,student,class where cno='".$_GET['tcno']."' and student.sno=sc.sno and student.clno=class.clno" ;
  $result=mysql_query($sql);
  $num=mysql_num_rows($result);
  echo $num;
  //    <td><a href="<?php echo "grademodify.php?tsno=".$info["sno"]."&tcn=".$tcnot."&g=".$te[gradem]
  $info=mysql_fetch_array($result);
 do{
  ?>
  <tr>
     <td><?php echo $info["sno"];?></td>
     <td><?php echo $info["sname"];?></td>
     <td><?php echo $info["xname"];?></td>
     <td><?php echo $info["grade"];?></td>
	 <td><a href="<?php echo "grademodify.php?tsno=".$info["sno"]."&tcn=".$tcnot?>">�޸�</a><td>
	 
  </tr>
  <?php
  } while ($info=mysql_fetch_array($result));
  ?>
  

</table>

</body>
</html>
