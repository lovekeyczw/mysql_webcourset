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
      <td colspan="2"><h2>修改教师信息</h2></td>
    </tr>
    <tr>
      <td>教师编号</td>
      <td><input type="text" name="tchno" value="<?php echo $info["teacher_id"];?>"/></td>
    </tr>
    <tr>
      <td>教师姓名</td>
      <td><input type="text" name="tchname" value="<?php echo $info["teacher_name"];?>"/></td>
    </tr>
    <tr>
      <td>教师登陆密码</td>
      <td><input type="text" name="tchpwd" value="<?php echo $info["teacher_psd"];?>"/></td>
    </tr>
    <tr>
      <td>教师性别</td>
      <td><input type="text" name="sex" value="<?php echo $info["teacher_sex"];?>"/></td>
    </tr>
     <tr>
      <td>职称</td>
      <td><input type="text" name="zhicheng" value="<?php echo $info["zhicheng"];?>"/></td>
    </tr>
    <tr>
      <td>所授课程编号</td>
      <td><input type="text" name="teacher_courseID" value="<?php echo $info["teacher_courseID"];?>" /></td>
    </tr>
    <tr>
      <td>教师系别编号</td>
      <td><input type="text" name="tchdepart" value="<?php echo $info["dept_id"];?>"/></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="Submit" value="提交" />
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
      <td colspan="2"><h2>添加教师信息</h2></td>
    </tr>
    <tr>
      <td>教师编号</td>
      <td><input type="text" name="tchno" /></td>
    </tr>
    <tr>
      <td>教师姓名</td>
      <td><input type="text" name="tchname" /></td>
    </tr>
    <tr>
      <td>教师登陆密码</td>
      <td><input type="text" name="tchpwd" /></td>
    </tr>
    <tr>
      <td>教师性别</td>
      <td><input type="text" name="sex" value=""/></td>
    </tr>
    <tr>
      <td>职称</td>
      <td><input type="text" name="zhicheng" /></td>
    </tr>
    <tr>
      <td>所授课程编号</td>
      <td><input type="text" name="teacher_courseID" /></td>
    </tr>
    <tr>
      <td>教师系别编号</td>
      <td><input type="text" name="tchdepart" value=""/></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="Submit" value="提交" /></td>
    </tr>
  </table>
</form>
<?php }
?>
</body>
</html>
