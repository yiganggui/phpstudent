<?php
include 'databass.php';
$stu_id=$_GET['stu_id'];
/*$sql1="select * from admin where username='$stu_id'";
$result1=mysql_query($sql1);
$num=mysql_num_rows($result1);
if($num==1)
{
echo "<script>alert('�˺��Ѵ��ڣ�');location='8.1.php';</script>";	
}*/
$sql="insert into admin values('$stu_id','123456',1,null)";
$result=mysql_query($sql);
if($result)
{
echo "<script>alert('ѧ���˺Ų���ɹ�');location='8.1.php';</script>";
}
else
{
echo "<script>alert('ѧ���˺Ų���ʧ��');location='8.1.php';</script>";
}
?>