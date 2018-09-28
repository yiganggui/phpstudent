<?php
include 'databass.php';
$stu_id=$_GET['stu_id'];
/*$sql1="select * from admin where username='$stu_id'";
$result1=mysql_query($sql1);
$num=mysql_num_rows($result1);
if($num==1)
{
echo "<script>alert('账号已存在！');location='8.1.php';</script>";	
}*/
$sql="insert into admin values('$stu_id','123456',1,null)";
$result=mysql_query($sql);
if($result)
{
echo "<script>alert('学生账号插入成功');location='8.1.php';</script>";
}
else
{
echo "<script>alert('学生账号插入失败');location='8.1.php';</script>";
}
?>