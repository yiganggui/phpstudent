<?php
@session_start();
include 'databass.php';
$course_id=$_GET['course_id'];
$stu_id=$_SESSION["username"];
$sql="insert into cjb values('$stu_id','$course_id',0)";
$result=mysql_query($sql);
if($result)
{
	echo "<script>alert('ѡ�޳ɹ�');location='student.php';</script>";
}
else
{
	echo "<script>alert('ѡ��ʧ��');location='student.php';</script>";
}
?>