<?php
include 'databass.php';
$stu_id=$_GET['stu_id'];
$sql="delete from xsb where stu_id='$stu_id'";
$result=mysql_query($sql);
$sql1="delete from admin where username='$stu_id'";
$result1=mysql_query($sql1);
if($result)
{
	echo "<script>alert('É¾³ý³É¹¦£¡');location='8.1.php';</script>";
}
?>