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
if ($action=="modify"){
	$sql="select * from tb_course where course_id='" .$id . "'";
	$result=mysql_query($sql);
	$info=mysql_fetch_array($result);
?>
<form id="form1" name="form1" method="post" action="adminsavecourse.php?action=modify">
  <table width="100%" border="0">
    <tr>
      <td colspan="2"><h2>修改课程</h2></td>
    </tr>
    <tr>
      <td>课程编号</td>
      <td><input type="text" name="cno" value="<?php echo $info["course_id"];?>" /></td>
    </tr>
    <tr>
      <td>课程名</td>
      <td><input type="text" name="cname" value="<?php echo $info["course_name"];?>" /></td>
    </tr>
     <tr>
      <td>学时</td>
      <td><input type="text" name="cxueshi" value="<?php echo $info["xueshi"];?>" /></td>
    </tr>
     <tr>
      <td>学分</td>
      <td><input type="text" name="cxuefen" value="<?php echo $info["xuefen"];?>" /></td>
    </tr>
    <tr>
      <td>上课时间</td>
      <td><input type="text" name="ctime" value="<?php echo $info["shijian"];?>" /></td>
    </tr>
    <tr>
      <td>上课地点</td>
      <td><input type="text" name="cdidian" value="<?php echo $info["didian"];?>" /></td>
    </tr>
    <tr>
      <td>课程介绍</td>
      <td><textarea  rows="6" cols="50" name="cjieshao"><?php echo $info["jieshao"];?></textarea></td>
    </tr>
     <tr>
      <td>已选人数</td>
      <td><input type="text" name="cyixuan" value="<?php echo $info["course_count"];?>" /></td>
    </tr>
    <tr>
      <td>人数上限</td>
      <td><input type="text" name="cmax" value="<?php echo $info["max_selected"];?>" /></td>
    </tr>
    <tr>
      <td colspan="2"><label>
        <input type="submit" name="Submit" value="提交" />
		<input type="hidden" name="id" value="<?php echo $id;?>" />
      </label></td>
    </tr>
  </table>
</form>
<?php 
}
else
{
?>
<form id="form1" name="form1" method="post" action="adminsavecourse.php?action=add">
  <table width="100%" border="0">
    <tr>
      <td colspan="2"><h2>添加课程</h2></td>
    </tr>
     <tr>
      <td>课程编号</td>
      <td><input type="text" name="cno" value="" /></td>
    </tr>
    <tr>
      <td>课程名</td>
      <td><input type="text" name="cname" value="" /></td>
    </tr>
    <tr>
      <td>学时</td>
      <td><input type="text" name="cxueshi" value="" /></td>
    </tr>
    <tr>
      <td>学分</td>
      <td><input type="text" name="cxuefen" value="" /></td>
    </tr>
    <tr>
      <td>上课时间</td>
      <td><input type="text" name="ctime" value="" /></td>
    </tr>
    <tr>
      <td>上课地点</td>
      <td><input type="text" name="cdidian" value="" /></td>
    </tr>
    <tr>
      <td>课程介绍</td>
      <td><textarea  rows="6" cols="50" name="cjieshao"></textarea></td>
    </tr>
    <tr>
      <td>已选人数</td>
      <td><input type="text" value="" name="cyixuan" /></td>
    </tr>
    <tr>
      <td>人数上限</td>
      <td><input type="text" name="cmax" value="" /></td>
    </tr>
    <tr>
      <td colspan="2"><label>
        <input type="submit" name="Submit" value="提交" />
      </label></td>
    </tr>
  </table>
</form>
<?php }?>

</body>
</html>
