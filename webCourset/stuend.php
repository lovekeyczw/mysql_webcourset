<?php 
include "header.php";
include "function.php";
include 'conn.php';
if($cur<$info["start_time"]){
	//echo "ѡ��ʱ�仹û����ϵͳδ���ţ��ȴ�֪ͨ��";
	echo "<meta http-equiv='refresh' content='0;url=stdindex.php' />";
	//exit;
}elseif($cur>$info["end_time"])
{
	echo "<meta http-equiv='refresh' content='0;url=selectend.php' />";
	//exit;
}
$sql="select * from tb_student where stu_id='". $_SESSION["user"] ."'";
$result=mysql_query($sql);
$info=mysql_fetch_array($result);
//if($info["select_num"]<1){
//	echo "<meta http-equiv='refresh' content='0;url=stuend.php' />";
//	exit;
//}
?>
   <p>רҵ�༶: <?php echo $info["stu_major"];?>    ����: <?php echo $info["stu_name"];?>    ѧ��:<?php echo $info["stu_id"];?>      <a href="logout.php"> �˳���¼ </a> </p>
 <div class="user_info"> 
  <?php 
  $sql="select tb_studentCourse.*,tb_course.*,tb_student.* from tb_studentCourse,tb_course,tb_student where tb_studentCourse.student_id=tb_student.stu_id and tb_studentCourse.course_id=tb_course.course_id and student_id='".$_SESSION["user"]."'"; 
  //echo $sql;
  $result=mysql_query($sql);
  $info=mysql_fetch_array($result);
  ?>
  <p><?php echo $info["stu_major"];?>��<?php echo $info["stu_name"];?>��</p>
  <p>���ι���ѡ�޿����ϱ�����ÿ���ޱ�һ�š�  �㹲��2�α������ᣬ�Ѿ��ù�2�Σ�ʣ��<?php echo $info["select_num"];?>�λ��ᣡ</p><p>�㵱ǰѡ�޵Ŀγ�Ϊ��<?php echo $info["course_name"];?></p></div>
 <div id="course_info">
    <p>����ѡ�޿ογ���Ϣ ������γ̻��߽�ʦ���Բ鿴��ϸ�����</p>
 
     <table class="datalist" width="100%" style="font-size:14px">
     <tr>
    <th width="22%"><div align="center">�γ�����</div></th>
    <th width="8%"><div align="center">У��</div></th>
    <th width="7%"><div align="center">ѧʱ</div></th>
    <th width="7%"><div align="center">ѧ��</div></th>
    <th width="12%"><div align="center">��ʦ����</div></th>
    <th width="7%"><div align="center">����</div></th>
    <th width="14%"><div align="center">�Ͽ�ʱ��</div></th>
    <th width="16%"><div align="center">�ѱ���/�ޱ���</div></th>
    <th width="7%"><div align="center">����</div></th>
  </tr>
  
    <?php
  $sql="select * from tb_course";
  $result=mysql_query($sql);
  $info=mysql_fetch_array($result);
do{
  ?>
  <tr>
    <td><div align="center"><?php echo $info["course_name"];?></div></td>
    <td><div align="center">��Ժ</div></td>
    <td><div align="center"><?php echo $info["xueshi"];?></div></td>
    <td><div align="center"><?php echo $info["xuefen"];?></div></td>
    <td><div align="center"><?php $rs=getTNMbyCID($info["course_id"]);echo $rs;?></div></td>
    <td><div align="center"><?php echo $info["didian"];?></div></td>
    <td><div align="center"><?php echo $info["shijian"];?></div></td>
    <td><div id="show777" align="center"><?php echo $info["course_count"];?>/<?php echo $info["max_selected"];?></div></td>
    <td align="center">���� </td>  
  </tr>
  <?php
}while($info=mysql_fetch_array($result)); 
  ?>
</table>
    </div>
<?php include "footer.php";?>
  