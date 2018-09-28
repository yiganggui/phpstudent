<?php
include 'databass.php';
$course_id=$_POST['course_id'];
$old_course_id=$_POST['old_course_id'];
$course_name=$_POST['course_name'];
$course_data=$_POST['course_data'];
$course_credit=$_POST['course_credit'];
$course_period=$_POST['course_period'];
$sql="update kcb set course_id='$course_id',course_name='$course_name',course_data='$course_data',course_credit='$course_credit',course_period='$course_period' where course_id='$old_course_id'";
$result=mysql_query($sql);
if($result)
{
	echo "<script>alert('更新成功！');location='8.1.php';</script>";
}
else
{
echo "<script>alert('更新失败！');location='8.1.php';</script>";
}
?>