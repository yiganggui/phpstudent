<?php
		include("databass.php");
		$stu_id=$_POST['stu_id'];
		$stu_name=$_POST['stu_name'];
		$sex=$_POST['sex'];
		$major=$_POST['major'];
		$birth=$_POST['birth'];
		$sql="insert into xsb values('$stu_id','$stu_name','$sex','$birth','$major',0)";
		echo $sql;
		$result=mysql_query($sql);
		
		if($result)
		{
			echo "success!";
		}
		else
		{
			echo "failure1";
		}
?>