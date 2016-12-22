
<?php include "conn.php";?>
<body>
<?php 
//var $action;
//var $id;
$action=add;
?>
<form id="form1" name="form1" method="post" action="savestd.php?action=add">
  <table width="50%" border="0">
    <tr>
      <th colspan="2"><h2>学生注册</h2></th>
    </tr>
    <tr>
      <td>学号</td>
      <td><input type="text" name="sno" value="<?php echo $info["sno"];?>"/></td>
    </tr>
    <tr>
      <td>姓名</td>
      <td><input type="text" name="sname" value="<?php echo $info["sname"];?>"/></td>
    </tr>
    <tr>
      <td>密码</td>
      <td><input type="text" name="password" value="<?php echo $info["pwd"];?>"/></td>
    </tr>  
     <tr>
      <td>性别</td>
      <td><input type="text" name="sex" value="<?php echo $info["sex"];?>"/></td>
    </tr>  
    <tr>
      <td>出生年月日</td>
      <td><input type="text" name="bir" value="<?php echo $info["bir"];?>"/></td>
    </tr>
    <tr>
      <td>所属班号</td>
      <td><input type="text" name="clno" value="<?php echo $info["clno"];?>"/></td>
    </tr>  
    <tr>
      <td colspan="2"><input type="submit" name="Submit" value="提交" />
	  <input name="id" type="hidden" value="<?php echo $info["sno"];?>" /></td>
    </tr>
  </table>
</form>

</body>
</html>
