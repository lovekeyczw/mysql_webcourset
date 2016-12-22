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
//echo $action;
if ($action=="modify" ){
	$sql="select * from tb_student where stu_id='" .$id . "'";
	$result=mysql_query($sql);
	$info=mysql_fetch_array($result);
?>
<form id="form1" name="form1" method="post" action="adminsavestd.php?action=modify">
  <table width="50%" border="0">
    <tr>
      <th colspan="2"><h2>修改学生详细信息</h2></th>
    </tr>
    <tr>
      <td>学号</td>
      <td><input type="text" name="stuno" value="<?php echo $info["stu_id"];?>"/></td>
    </tr>
    <tr>
      <td>学生姓名</td>
      <td><input type="text" name="stuname" value="<?php echo $info["stu_name"];?>"/></td>
    </tr>
    <tr>
      <td>学生登陆密码</td>
      <td><input type="text" name="password" value="<?php echo $info["stu_psd"];?>"/></td>
    </tr>  
     <tr>
      <td>性别</td>
      <td><input type="text" name="sex" value="<?php echo $info["stu_sex"];?>"/></td>
    </tr>  
    <tr>
      <td>学生专业</td>
      <td><input type="text" name="stumajor" value="<?php echo $info["stu_major"];?>"/></td>
    </tr>
    <tr>
      <td>学生系别编号</td>
      <td><input type="text" name="studepart" value="<?php echo $info["dept_id"];?>"/></td>
    </tr>
     <tr>
      <td>选课次数</td>
      <td><input type="text" name="select_num" value="<?php echo $info["select_num"];?>"/></td>
    </tr>   
    <tr>
      <td colspan="2"><input type="submit" name="Submit" value="提交" />
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
      <td colspan="2"><h2>添加学生详细信息</h2></td>
    </tr>
    <tr>
      <td>学号</td>
      <td><input type="text" name="stuno" /></td>
    </tr>
    <tr>
      <td>学生姓名</td>
      <td><input type="text" name="stuname" /></td>
    </tr> 
    <tr>
      <td>学生登陆密码</td>
      <td><input type="text" name="password" /></td>
    </tr>
    <tr>
      <td>性别</td>
      <td><input type="text" name="sex" value=""/></td>
    </tr>  
    <tr>
      <td>学生专业</td>
      <td><input type="text" name="stumajor" /></td>
    </tr>
    <tr>
      <td>学生系别</td>
      <td><input type="text" name="studepart" /></td>
    </tr>
    <tr>
      <td>选课次数</td>
      <td><input type="text" name="select_num" value=""/></td>
    </tr>   
    <tr>
      <td colspan="2"><input type="submit" name="Submit" value="提交" /></td>
    </tr>
  </table>
</form>
<?php 
}
?>
</body>
</html>
