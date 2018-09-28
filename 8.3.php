<?php
		include("databass.php");
		$course_id=$_POST['course_id'];
		$course_name=$_POST['course_name'];
		$course_data=$_POST['course_data'];
		$course_credit=$_POST['course_credit'];
		$course_period=$_POST['course_period'];
		$sql="insert into kcb values('$course_id','$course_name','$course_data','$course_credit','$course_period')";
		$result=mysql_query($sql);
		if($result)
		{
			echo "<script>alert('录入成功');location='8.1.php';</script>";
		}
		else
		{
			echo "<script>alert('录入失败');location='8.1.php';</script>";
		}
?>