<?php
include 'conn.php';
$tor=$_POST["tor"];
$fromer=$_POST["fromer"];
$subject=htmlspecialchars(trim($_POST["subject"]));
$content=htmlspecialchars(trim($_POST["content"]));
$pub_time=$_POST["hidden"];
$sql="insert into tb_leaveword (admin_response,pub_teacher,subject,content,pub_time) values ('$tor','$fromer','subject','$content',now())";
mysql_query($sql);
header("location:leaveword.php");
?>