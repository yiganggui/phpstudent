<?php
@session_start();
include 'databass.php';
$stu_id=$_SESSION['username'];
$old_password=$_POST['old_password'];
$new_password=$_POST['new_password'];
$sql="select * from admin where username='$stu_id'";
$result=mysql_query($sql);
$row=mysql_fetch_row($result);
list($a,$b,$c,$d)=$row;
if($old_password==$b)
{
	$sql1="update admin set password='$new_password' where username='$stu_id'";
	$result1=mysql_query($sql1);
	if($result1)
	{
	echo "<script>alert('�����޸ĳɹ���');location='index.php';</script>";
	}
	else
	{
	echo "<script>alert('�����޸�ʧ�ܣ�');location='student.php';</script>";
	}
}
else
{
	echo "<script>alert('�������벻��ȷ��');location='student.php';</script>";
}
?>