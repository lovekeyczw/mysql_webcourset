<?php
//header("Content-type:text/html;charset=gb2312");
global $conn;
$conn=mysql_connect("localhost","root","root")or die("���ݿ���������Ӵ���".mysql_error());
mysql_select_db("displaydb")or die("���ݿ���ʴ���".mysql_error());
//mysql_query("set character set gb2312");
//mysql_query("set names gb2312");
?>