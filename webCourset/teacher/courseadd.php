
<?php include "conn.php";?>
<body>
<?php 
//var $action;
//var $id;
$action=add;
?>
<form id="form1" name="form1" method="post" action="saveth.php?action=add">
  <table width="50%" border="0">
    <tr>
      <th colspan="2"><h2>ע��γ�</h2></th>
    </tr>
    <tr>
      <td>�γ̺�</td>
      <td><input type="text" name="cno" value="<?php echo $info["cno"];?>"/></td>
    </tr>
    <tr>
      <td>�γ���</td>
      <td><input type="text" name="cname" value="<?php echo $info["cname"];?>"/></td>
    </tr>
    <tr>
      <td>ѧ��</td>
      <td><input type="text" name="xuef" value="<?php echo $info["xuef"];?>"/></td>
    </tr>  
     <tr>
      <td>�Ͽ�ʱ��</td>
      <td><input type="text" name="time" value="<?php echo $info["time"];?>"/></td>
    </tr>    
    <tr>
      <td colspan="2"><input type="submit" name="Submit" value="�ύ" />
	  <input name="id" type="hidden" value="<?php echo $info["tno"];?>" /></td>
    </tr>
  </table>
</form>

</body>
</html>
