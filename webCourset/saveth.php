
<?php include "conn.php";?>
<body>
<p>
<?php 
$action=$_GET["action"];

$tno=$_POST["tno"];
$tname=$_POST["tname"];
$pho=$_POST["pho"];
$xname=$_POST["xname"];
$password=md5($_POST["password"]);
$pos=$_POST["pos"];
if ($action=="add"){
//*******************************��Ӳ���
	
	$sql="select * from teacher where tno='".$tno ."'";
	$result=mysql_query($sql);
	$num=mysql_num_rows($result);
	if ($num==0){
		$sql="insert into teacher(tno,tname,pwd,pho,xname,pos) values('" .$tno . "','" .$tname . "','" .$password . "','" .$pho . "','".$xname . "','" .$pos . "')";
		//echo $sql;
		//exit;
		$result=mysql_query($sql);
		//$infoend=mysql_fetch_array($result);
		echo "��ӳɹ�";
	}
	else
		echo "�����Ѿ���ע�ᣡ";
}
?>
</p>
</body>
</html>
