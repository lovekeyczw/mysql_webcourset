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

if ($action=="modify" ){
	$sql="select * from tb_teacher where teacher_id='" .$id . "'";
	$result=mysql_query($sql);
	$info=mysql_fetch_array($result);
?>
<form id="form1" name="form1" method="post" action="adminsavetch.php?action=modify">
  <table width="100%" border="0">
    <tr>
      <td colspan="2"><h2>�޸Ľ�ʦ��Ϣ</h2></td>
    </tr>
    <tr>
      <td>��ʦ���</td>
      <td><input type="text" name="tchno" value="<?php echo $info["teacher_id"];?>"/></td>
    </tr>
    <tr>
      <td>��ʦ����</td>
      <td><input type="text" name="tchname" value="<?php echo $info["teacher_name"];?>"/></td>
    </tr>
    <tr>
      <td>��ʦ��½����</td>
      <td><input type="text" name="tchpwd" value="<?php echo $info["teacher_psd"];?>"/></td>
    </tr>
    <tr>
      <td>��ʦ�Ա�</td>
      <td><input type="text" name="sex" value="<?php echo $info["teacher_sex"];?>"/></td>
    </tr>
     <tr>
      <td>ְ��</td>
      <td><input type="text" name="zhicheng" value="<?php echo $info["zhicheng"];?>"/></td>
    </tr>
    <tr>
      <td>���ڿγ̱��</td>
      <td><input type="text" name="teacher_courseID" value="<?php echo $info["teacher_courseID"];?>" /></td>
    </tr>
    <tr>
      <td>��ʦϵ����</td>
      <td><input type="text" name="tchdepart" value="<?php echo $info["dept_id"];?>"/></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="Submit" value="�ύ" />
	  <input name="id" type="hidden" value="<?php echo $info["teacher_id"];?>" /></td>
    </tr>
  </table>
</form>
<?php }
else
{
?>
<form id="form1" name="form1" method="post" action="adminsavetch.php?action=add">
  <table width="100%" border="0">
    <tr>
      <td colspan="2"><h2>��ӽ�ʦ��Ϣ</h2></td>
    </tr>
    <tr>
      <td>��ʦ���</td>
      <td><input type="text" name="tchno" /></td>
    </tr>
    <tr>
      <td>��ʦ����</td>
      <td><input type="text" name="tchname" /></td>
    </tr>
    <tr>
      <td>��ʦ��½����</td>
      <td><input type="text" name="tchpwd" /></td>
    </tr>
    <tr>
      <td>��ʦ�Ա�</td>
      <td><input type="text" name="sex" value=""/></td>
    </tr>
    <tr>
      <td>ְ��</td>
      <td><input type="text" name="zhicheng" /></td>
    </tr>
    <tr>
      <td>���ڿγ̱��</td>
      <td><input type="text" name="teacher_courseID" /></td>
    </tr>
    <tr>
      <td>��ʦϵ����</td>
      <td><input type="text" name="tchdepart" value=""/></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="Submit" value="�ύ" /></td>
    </tr>
  </table>
</form>
<?php }
?>
</body>
</html>
