<?php
include 'databass.php';
$course_id=$_GET['course_id'];
$sql="delete from kcb where course_id='$course_id'";
$result=mysql_query($sql);
if($result)
{
	echo "<script>alert('É¾³ý³É¹¦£¡');location='8.1.php';</script>";
}
?>