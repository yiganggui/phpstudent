<?php
include 'databass.php';
$course_id=$_GET['course_id'];
$sql="delete from kcb where course_id='$course_id'";
$result=mysql_query($sql);
if($result)
{
	echo "<script>alert('ɾ���ɹ���');location='8.1.php';</script>";
}
?>