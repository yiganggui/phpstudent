<?php
@session_start();
include 'databass.php';
$course_id=$_GET['course_id'];
$stu_id=$_SESSION['username'];
$sql="delete from cjb where course_id='$course_id' and stu_id='$stu_id'";
$result=mysql_query($sql);
if($result)
{
	echo "<script>alert('��ѡ�ɹ���');location='student.php';</script>";
}
else
{
	echo "<script>alert('��ѡʧ�ܣ�');location='student.php';</script>";
}
?>
