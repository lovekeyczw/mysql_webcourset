
<?php include "conn.php";?>
<body>
<p>
<?php 
$action=$_GET["action"];

$sno=$_POST["sno"];
$sname=$_POST["sname"];
$bir=$_POST["bir"];
$clno=$_POST["clno"];
$password=md5($_POST["password"]);
$sex=$_POST["sex"];
if ($action=="add"){
//*******************************��Ӳ���
	
	$sql="select * from student where sno='".$sno ."'";
	$result=mysql_query($sql);
	$num=mysql_num_rows($result);
	if ($num==0){
		//���ѧ����Ϣ
		$sql="insert into student(sno,sname,pwd,sex,bir,clno) values('" .$sno . "','" .$sname . "','" .$password . "','" .$sex . "','".$bir . "','" .$clno . "')";
		//echo $sql;
		//exit;
		$result=mysql_query($sql);
		//$infoend=mysql_fetch_array($result);
		echo "��ӳɹ�";
	}
	else
		echo "ѧ���Ѿ���ע�ᣡ";
}
?>
</p>
</body>
</html>
