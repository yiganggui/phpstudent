<?php
@session_start();
include 'databass.php';
$course_id=$_GET['course_id'];
$stu_id=$_SESSION["username"];
$sql="insert into cjb values('$stu_id','$course_id',0)";
$result=mysql_query($sql);
if($result)
{
	echo "<script>alert('选修成功');location='student.php';</script>";
}
else
{
	echo "<script>alert('选修失败');location='student.php';</script>";
}
?>