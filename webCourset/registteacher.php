
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
      <th colspan="2"><h2>��ʦע��</h2></th>
    </tr>
    <tr>
      <td>����</td>
      <td><input type="text" name="tno" value="<?php echo $info["tno"];?>"/></td>
    </tr>
    <tr>
      <td>����</td>
      <td><input type="text" name="tname" value="<?php echo $info["tname"];?>"/></td>
    </tr>
    <tr>
      <td>����</td>
      <td><input type="text" name="password" value="<?php echo $info["pwd"];?>"/></td>
    </tr>  
     <tr>
      <td>�绰</td>
      <td><input type="text" name="pho" value="<?php echo $info["pho"];?>"/></td>
    </tr>  
    <tr>
      <td>ְ��</td>
      <td><input type="text" name="pos" value="<?php echo $info["pos"];?>"/></td>
    </tr>
    <tr>
      <td>Ժϵ</td>
      <td><input type="text" name="xname" value="<?php echo $info["xname"];?>"/></td>
    </tr>  
    <tr>
      <td colspan="2"><input type="submit" name="Submit" value="�ύ" />
	  <input name="id" type="hidden" value="<?php echo $info["tno"];?>" /></td>
    </tr>
  </table>
</form>

</body>
</html>
