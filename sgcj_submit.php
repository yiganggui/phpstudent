<?php
include 'databass.php';
$stu_id=$_POST['stu_id'];
$course_id=$_POST['course_id'];
$grade=$_POST['grade'];
$sql="update cjb set grade='$grade' where stu_id='$stu_id' and course_id='$course_id'";
$result=mysql_query($sql);
if($result)
{
	echo "<script>alert('�޸ĳɹ���');location='8.1.php';</script>";
}
else
{
echo "<script>alert('�޸�ʧ�ܣ�');location='8.1.php';</script>";
}
?>