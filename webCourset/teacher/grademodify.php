
<?php include "conn.php";?>
<form action="" method="post">
³É¼¨: <input name="grade" type="text" />
<input type="submit" />
</form>
<?php 
		$sql2="update sc set grade=".$_POST[grade]." where sno=".$tsno." and cno=".$tcn;
		$result2=mysql_query($sql2);
		
  ?>
		
?>