<?php 
session_start();
   global $level;
   if ($_SESSION["user"]==""){
      header("Location:index.php");
      exit;
   }
   switch($_SESSION["level"]){
   case 1:
       $level="ѧ��";break;
   case 2:
       $level="��ʦ";break;
   case 3:
       $level="����Ա";break;
   } 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>ѧУѡ��ϵͳ-<?php echo $level;?></title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>

<div id="main_content">
	<div id="top_banner">
	  <div align="left">
	    <img src="images/logo.jpg" alt="home" width="230" height="130" border="0" title="logo" />
      </div>  
  </div>
    