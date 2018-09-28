<?php
include 'databass.php';
$stu_id=$_POST['stu_id'];
$old_stu_id=$_POST['old_stu_id'];
$stu_name=$_POST['stu_name'];
$sex=$_POST['sex'];
$major=$_POST['major'];
$birth=$_POST['birth'];
$sql="update xsb set stu_id='$stu_id',stu_name='$stu_name',sex=$sex,birth='$birth',major='$major' where stu_id='$old_stu_id'";
$result=mysql_query($sql);
if($result)
{
	$sql2="delete from admin where username='$old_stu_id'";
	$result2=mysql_query($sql2);
	echo "<script>alert('更新成功！');location='student.php';</script>";
}
else
{
echo "<script>alert('更新失败！');location='student.php';</script>";
}
?>