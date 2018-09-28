<?php
include 'databass.php';
$stu_id=$_GET['stu_id'];
$sql="select * from xsb where stu_id='$stu_id'";
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
<form method="post" action="supdate_submit.php">
<table align="center">
<tr>
<td>学号</td><td><input type="text" name="stu_id" value="<?php echo $a; ?>">
<input type="hidden" name="old_stu_id" value="<?php echo $a; ?>"></td>
</tr>
<tr>
<td>姓名</td>
<td><input type="text" name="stu_name" value="<?php echo $b;?>"></td>
</tr>
<tr>
<tr>
<td>性别</td>
<td>
<input type="radio" name="sex" value=0 checked="<?php if($c==0) echo 'checked';?>">女
<input type="radio" name="sex" value=1 checked="<?php if($c==1) echo 'checked';?>">男
</td>
<tr>
<td>生日</td>
<td><input type="date" name="birth" value="<?php echo $d;?>"></td></tr>
<tr>
<td>专业</td>
<td><input type="text" name="major" value="<?php echo $e;?>"></td></tr>
</tr>
<td><input type="submit" name="submit" value="修改"></td>
<td><input type="reset" name="reset" value="重置"></td>
</tr>
</table>
</form>
</div>
</body>
</html>