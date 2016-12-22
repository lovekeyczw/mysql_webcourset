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
	$sql="select * from tb_notice where id=" .$id;
	$result=mysql_query($sql);
	$info=mysql_fetch_array($result);
?>
<form id="form1" name="form1" method="post" action="adminsavenotice.php?action=modify">
  <table width="100%" border="0">
    <tr>
      <td colspan="2"><h2>修改公告详细信息</h2></td>
    </tr>
    <tr>
      <td>发布人</td>
      <td><input type="text" name="notname" value="<?php echo $info["admin_name"];?>"/></td>
    </tr>
    <tr>
      <td>内容</td>
      <td><textarea cols="50" rows="10" name="content"><?php echo htmlspecialchars_decode($info["content"]);?></textarea></td>
    </tr>  
     <tr>
      <td>发布时间</td>
      <td><input type="text" name="nottime" value="<?php echo $info["notice_time"];?>"/></td>
    </tr>  
    <tr>
      <td colspan="2"><input type="submit" name="Submit" value="提交" />
	  <input name="id" type="hidden" value="<?php echo $info["id"];?>" /></td>
    </tr>
  </table>
</form>
<?php 
}
else
{
?>
<form id="form1" name="form1" method="post" action="adminsavenotice.php?action=add">
  <table width="100%" border="0">
    <tr>
      <td colspan="2"><h2>添加公告详细信息</h2></td>
    </tr>
    <tr>
      <td>公告编号</td>
      <td><input type="text" name="id" /></td>
    </tr> 
    <tr>
      <td>发布人</td>
      <td><input type="text" name="notname" /></td>
    </tr> 
    <tr>
      <td>内容</td>
      <td><textarea cols="50" rows="10" name="content"></textarea></td>
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
