<?php
include 'databass.php';
$stu_id=$_GET['stu_id'];
$sql="select x.stu_id,stu_name,c.course_id,course_name,grade from xsb as x,kcb as k,cjb as c where x.stu_id=c.stu_id and k.course_id=c.course_id
		and x.stu_id='$stu_id'";
$result=mysql_query($sql);
$row=mysql_fetch_row($result);
list($a,$b,$c,$d,$e)=$row;
?>
<html>
<head>
<link href="update.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="main">
<form method="post" action="sgcj_submit.php">
<table align="center" border="1">
<tr>
<td>ѧ��</td><td><?php echo $a; ?>
<input type="hidden" name="stu_id" value="<?php echo $a; ?>"></td>
</tr>
<tr>
<td>����</td>
<td><?php echo $b;?></td>
</tr>
<tr>
<td>�γ̺�</td>
<td>
<?php echo $c;?><input type="hidden" name="course_id" value="<?php echo $c; ?>">
</td>
</tr>
</tr>
<tr>
<td>�γ���</td>
<td>
<?php echo $d;?>
</td>
</tr>
<tr>
<td>����</td>
<td><input type="text" name="grade" value="<?php echo $e;?>"></td></tr>
<tr>
<td align="center" colspan="2"><input type="submit" name="submit" value="�޸�">
<input type="reset" name="reset" value="����"></td>
</tr>
</table>
</form>
</div>
</body>
</html>