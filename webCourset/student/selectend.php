<?php 
include "header.php";
include "function.php";
include 'conn.php';
/*$sql="select * from tb_time";
 $result=mysql_query($sql);
$info=mysql_fetch_array($result);

$cur=date("Y-m-d");
echo $info["start_time"].$info["end_time"].$cur;
if($cur<$info["start_time"] || $cur>$info["end_time"]){
//echo "选课时间还没到，系统未开放，等待通知！";
echo "<meta http-equiv='refresh' content='3;url=stdindex.php' />";
//exit;
}else 
{
	echo "<meta http-equiv='refresh' content='3;url=stustart.php' />";
}*/
$sql="select * from tb_student where stu_id='". $_SESSION["user"] ."'";
$result=mysql_query($sql);
$info=mysql_fetch_array($result);
//if($info["select_num"]<1){
//	echo "<meta http-equiv='refresh' content='0;url=stuend.php' />";
//	exit;
//}
?>
   <p>专业班级: <?php echo $info["stu_major"];?>    姓名: <?php echo $info["stu_name"];?>    学号:<?php echo $info["stu_id"];?>      <a href="logout.php"> 退出登录 </a> </p>
 <div class="user_info"> 
  <p><strong><h1>本次公共选修课网上报名，每人限报一门。 此次选课已结束。祝同学们学业顺利。</h1></strong></p></div>
 <div id="course_info">
    <p>公共选修课课程信息 （点击课程或者教师可以查看详细情况）</p>
 
     <table class="datalist" width="100%" style="font-size:14px">
     <tr>
    <th width="22%"><div align="center">课程名称</div></th>
    <th width="8%"><div align="center">校区</div></th>
    <th width="7%"><div align="center">学时</div></th>
    <th width="7%"><div align="center">学分</div></th>
    <th width="12%"><div align="center">教师名称</div></th>
    <th width="7%"><div align="center">教室</div></th>
    <th width="14%"><div align="center">上课时间</div></th>
    <th width="16%"><div align="center">已报数/限报数</div></th>
    <th width="7%"><div align="center">操作</div></th>
  </tr>
  
    <?php
  $sql="select * from tb_course";
  $result=mysql_query($sql);
  $info=mysql_fetch_array($result);
do{
  ?>
  <tr>
    <td><div align="center"><?php echo $info["course_name"];?></div></td>
    <td><div align="center">西院</div></td>
    <td><div align="center"><?php echo $info["xueshi"];?></div></td>
    <td><div align="center"><?php echo $info["xuefen"];?></div></td>
    <td><div align="center"><?php $rs=getTNMbyCID($info["course_id"]);echo $rs;?></div></td>
    <td><div align="center"><?php echo $info["didian"];?></div></td>
    <td><div align="center"><?php echo $info["shijian"];?></div></td>
    <td><div id="show777" align="center"><?php echo $info["course_count"];?>/<?php echo $info["max_selected"];?></div></td>
    <td align="center">结束 </td>  
  </tr>
  <?php
}while($info=mysql_fetch_array($result)); 
  ?>
</table>
    </div>
<?php include "footer.php";?>
  