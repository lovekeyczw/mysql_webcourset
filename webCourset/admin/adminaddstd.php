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
<?php 
//var $action;
//var $id;
$action=$_GET["action"];
$id=$_GET["id"];
//echo $action;
if ($action=="modify" ){
	$sql="select * from tb_student where stu_id='" .$id . "'";
	$result=mysql_query($sql);
	$info=mysql_fetch_array($result);
?>
<form id="form1" name="form1" method="post" action="adminsavestd.php?action=modify">
  <table width="50%" border="0">
    <tr>
      <th colspan="2"><h2>�޸�ѧ����ϸ��Ϣ</h2></th>
    </tr>
    <tr>
      <td>ѧ��</td>
      <td><input type="text" name="stuno" value="<?php echo $info["stu_id"];?>"/></td>
    </tr>
    <tr>
      <td>ѧ������</td>
      <td><input type="text" name="stuname" value="<?php echo $info["stu_name"];?>"/></td>
    </tr>
    <tr>
      <td>ѧ����½����</td>
      <td><input type="text" name="password" value="<?php echo $info["stu_psd"];?>"/></td>
    </tr>  
     <tr>
      <td>�Ա�</td>
      <td><input type="text" name="sex" value="<?php echo $info["stu_sex"];?>"/></td>
    </tr>  
    <tr>
      <td>ѧ��רҵ</td>
      <td><input type="text" name="stumajor" value="<?php echo $info["stu_major"];?>"/></td>
    </tr>
    <tr>
      <td>ѧ��ϵ����</td>
      <td><input type="text" name="studepart" value="<?php echo $info["dept_id"];?>"/></td>
    </tr>
     <tr>
      <td>ѡ�δ���</td>
      <td><input type="text" name="select_num" value="<?php echo $info["select_num"];?>"/></td>
    </tr>   
    <tr>
      <td colspan="2"><input type="submit" name="Submit" value="�ύ" />
	  <input name="id" type="hidden" value="<?php echo $info["stu_id"];?>" /></td>
    </tr>
  </table>
</form>
<?php 
}
else
{
?>
<form id="form1" name="form1" method="post" action="adminsavestd.php?action=add">
  <table width="100%" border="0">
    <tr>
      <td colspan="2"><h2>���ѧ����ϸ��Ϣ</h2></td>
    </tr>
    <tr>
      <td>ѧ��</td>
      <td><input type="text" name="stuno" /></td>
    </tr>
    <tr>
      <td>ѧ������</td>
      <td><input type="text" name="stuname" /></td>
    </tr> 
    <tr>
      <td>ѧ����½����</td>
      <td><input type="text" name="password" /></td>
    </tr>
    <tr>
      <td>�Ա�</td>
      <td><input type="text" name="sex" value=""/></td>
    </tr>  
    <tr>
      <td>ѧ��רҵ</td>
      <td><input type="text" name="stumajor" /></td>
    </tr>
    <tr>
      <td>ѧ��ϵ��</td>
      <td><input type="text" name="studepart" /></td>
    </tr>
    <tr>
      <td>ѡ�δ���</td>
      <td><input type="text" name="select_num" value=""/></td>
    </tr>   
    <tr>
      <td colspan="2"><input type="submit" name="Submit" value="�ύ" /></td>
    </tr>
  </table>
</form>
<?php 
}
?>
</body>
</html>
