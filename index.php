<?php
@session_start();
include("databass.php");
?>
<html>
<head>
<link href="index.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="main">
<div id="top"></div>
<div id="footer">
<table>
<form method="post">
<tr><td><img src="/8/img/touxiang.png"></td><td><input type="text" name="username" placeholder='�������˺�'></td></tr>
<tr><td><img src="/8/img/mima.png"></td><td><input type="password" name="password" placeholder='����������'></td></tr>
<tr><td colspan="2" align="center">
<input type="submit" name="submit" value="��¼" class="ygg" border="0px"></td></tr>
</form>
</table>
</div>
</div>
</body>
</html>
<?php
if(isset($_POST["submit"]))
{
	$username=$_POST["username"];
	$password=$_POST["password"];
	$sql="select *from admin where username='$username' and password='$password'";
	$result=mysql_query($sql);	
	$num=mysql_num_rows($result);
	if($num==1)
	{
		$_SESSION["username"]=$username;
		$row=mysql_fetch_row($result);
		list($a,$b,$c,$d)=$row;
		$sql1="update admin set last_time=now() where username='$username'";
		$result1=mysql_query($sql1);
		if($c==0)
		{
echo "<script>alert('��ʦ��¼�ɹ���');location.href='8.1.php';</script>";
		}
		else
        {
echo "<script>alert('ѧ����¼�ɹ���');location.href='student.php';</script>";
		}
	}
	else
	{
		echo "<script>alert('��¼ʧ�ܣ�');location.href='index.php';</script>";
	}
}

?>