<?php
include 'databass.php';
$course_id=$_GET['course_id'];
$sql="select * from kcb where course_id='$course_id'";
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
<form method="post" action="kcupdate_submit.php">
<table align="center">
<tr>
<td>�γ̺�</td>
<td><input type="text" name="course_id" value="<?php echo $a; ?>">
<input type="hidden" name="old_course_id" value="<?php echo $a; ?>"></td>
</tr>
<tr>
<td>�γ���</td>
<td><input type="text" name="course_name" value="<?php echo $b;?>"></td>
</tr>
<tr>
<td>ѧ��</td>
<td><input type="text" name="course_data" value="<?php echo $c;?>"></td></tr>
<tr>
<td>ѧ��</td>
<td><input type="text" name="course_credit" value="<?php echo $d;?>"></td></tr>
<tr>
<td>ѧʱ</td>
<td><input type="text" name="course_period" value="<?php echo $e;?>"></td></tr>
</tr>
<td><input type="submit" name="submit" value="�޸�"></td>
<td><input type="reset" name="reset" value="����"></td>
</tr>
</table>
</form>
</div>
</body>
</html>