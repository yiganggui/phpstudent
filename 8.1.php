<?php
	@session_start();
	if(!isset($_SESSION['username']))
	{
		echo "<script>alert('未登录');location.href='index.php';</script>";
	}
	include("databass.php");
?>
<html>
<head>
<link href="8.1.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="main">
	<div id="top">
		<p class="ys1"><?php echo "欢迎".$_SESSION['username']."老师！";?></p>
		<h1 class="ys2">学生信息管理及选课系统</h1>
		<form method="get">
		<table><tr><td><input type="submit" value="学生信息录入" name="s1" /></td>
		<td><input type="submit" value="学生信息列表" name="s2" /></td>
		<td><input type="submit" value="课程信息录入" name="s4" /></td>
		<td><input type="submit" value="课程信息列表" name="s5" /></td>
		<td><input type="submit" value="修改学生成绩" name="s6" /></td>
		<td><input type="submit" value="退出系统" name="s3" /></td></tr></table>
		</form>
	</div>
	<div id="down">
		<?php
			if(isset($_GET["s1"]))
			{
		?>
		<form method="post" action="8.2.php">
		<table align="center">
		<tr><td>学号</td><td><input type="text" name="stu_id" /></td></tr>
		<tr><td>姓名</td><td><input type="text" name="stu_name" /></td></tr>
		<tr><td>性别</td><td><input type="radio" name="sex" value="1"/>男<input type="radio" name="sex" value="0"/>女</td></tr>
		<tr><td>生日</td><td><input type="date" name="birth" /></td></tr>
		<tr><td>专业</td><td><input type="text" name="major" /></td></tr>
		<tr><td colspan="2" align="center"><input type="submit" name="tj" value="提交" /><input type="reset" name="cz" value="重置" /></td></tr>
		</table>
		<?php
			}
			if(isset($_GET["s2"]))
			{	
				$page=5;
				if(isset($_GET['start']))
				{
					$start=$_GET['start'];
				}
				else
				{
					$start=0;
				}
				$sql2="select * from xsb order by stu_id desc limit $start,$page";
				$result2=mysql_query($sql2);
				echo "<table border=1 align='center'><tr><td>学号</td><td>姓名</td><td>性别</td><td>生日</td><td>专业</td><td>学分</td><td>操作</td></tr>";
				while($row=mysql_fetch_row($result2))
				{
					list($stu_id,$stu_name,$sex,$birth,$major,$credit)=$row;
					if($sex==0)
					{
						$sex='女';
					}
					else
					{
						$sex='男';
					}
					echo "<tr><td>$stu_id</td><td>$stu_name</td><td>$sex</td><td>$birth</td><td>$major</td><td>$credit<td><a 	href='delete.php?stu_id=$stu_id'>删除</a>&nbsp;&nbsp;<a href='update.php?stu_id=$stu_id'>修改</a>";
					$sql1="select * from admin where username='$stu_id'";
					$result1=mysql_query($sql1);
					$num=mysql_num_rows($result1);
					if($num==0)
					{
					echo "&nbsp;<a href='add.php?stu_id=$stu_id'>添加学生账号</a>";
					}
					echo "</td></tr>";
				}
				$sql="select *from xsb";
				$result=mysql_query($sql);
				$sum=mysql_num_rows($result);
				if($sum%$page==0)
				{
					$p=$sum/$page;
				}
				else
				{
					$p=($sum-$sum%$page)/$page+1;
				}
				echo "<tr><td colspan='7'>";
				for($i=1;$i<=$p;$i++)
				{
					$m=($i-1)*$page;
					echo "&nbsp;&nbsp;"."<a href='8.1.php?s2&start=$m'>".$i."</a>";
				}
				echo "</td></tr>";
				echo "</table>";
			}
			if(isset($_GET['s3']))
			{
				unset($_SESSION['username']);
				session_destroy();
				echo "<script>alert('退出系统成功！');location.href='index.php';</script>";
			}
		?>
		<?php
			if(isset($_GET["s4"]))
			{
		?>
		<form method="post" action="8.3.php">
		<table align="center">
		<tr><td>课程号</td><td><input type="text" name="course_id" /></td></tr>
		<tr><td>课程名</td><td><input type="text" name="course_name" /></td></tr>
		<tr><td>学期</td><td><input type="text" name="course_data" /></td></tr>
		<tr><td>学分</td><td><input type="text" name="course_credit" /></td></tr>
		<tr><td>学时</td><td><input type="text" name="course_period" /></td></tr>
		<tr><td colspan="2" align="center"><input type="submit" name="tj" value="提交" /><input type="reset" name="cz" value="重置" /></td></tr>
		</table>
		<?php
			}
			if(isset($_GET["s5"]))
			{	
				$page=5;
				if(isset($_GET['start1']))
				{
					$start1=$_GET['start1'];
				}
				else
				{
					$start1=0;
				}
				$sql3="select * from kcb order by course_id desc limit $start1,$page";
				$result3=mysql_query($sql3);
				echo "<table border=1 align='center'><tr><td>课程号</td><td>课程名</td><td>学期</td><td>学时</td><td>学分</td><td>选课人数</td><td>操作</td></tr>";
				while($row=mysql_fetch_row($result3))
				{
					list($a,$b,$c,$d,$e)=$row;
					$sql7="select * from cjb where course_id='$a'";
					$result7=mysql_query($sql7);
					$num2=mysql_num_rows($result7);
					echo "<tr><td>$a</td><td>$b</td><td>$c</td><td>$d</td><td>$e</td><td>$num2</td><td><a 	href='kcdelete.php?course_id=$a'>删除</a>&nbsp;&nbsp;<a href='kcupdate.php?course_id=$a'>修改</a></td></tr>";
				}
				$sql4="select *from kcb";
				$result4=mysql_query($sql4);
				$sum4=mysql_num_rows($result4);
				if($sum4%$page==0)
				{
					$p=$sum4/$page;
				}
				else
				{
					$p=($sum4-$sum4%$page)/$page+1;
				}
				echo "<tr><td colspan='7'>";
				for($i=1;$i<=$p;$i++)
				{
					$m=($i-1)*$page;
					echo "&nbsp;&nbsp;"."<a href='8.1.php?s5&start1=$m'>".$i."</a>";
				}
				echo "</td></tr>";
				echo "</table>";
			}
			if(isset($_GET['s6']))
			{
				$page=5;
				if(isset($_GET['start2']))
				{
					$start2=$_GET['start2'];
				}
				else
				{
					$start2=0;
				}
				$sql5="select x.stu_id,stu_name,course_name,grade from xsb as x,kcb as k,cjb as c where x.stu_id=c.stu_id and k.course_id=c.course_id
				order by x.stu_id desc limit $start2,$page";
				$result5=mysql_query($sql5);
				echo "<table border=1 align=center><tr><td>学号</td><td>姓名</td><td>课程名</td><td>成绩</td><td>操作</td></tr>";
				while($row5=mysql_fetch_row($result5))
				{
					list($stu_id,$stu_name,$course_name,$grade)=$row5;
					echo "<tr><td>$stu_id</td><td>$stu_name</td><td>$course_name</td><td>$grade</td><td><a href='sgcj.php?stu_id=$stu_id'>修改成绩	</a>							</td></tr>";
				}
				$sql4="select * from cjb";
				$result4=mysql_query($sql4);
				$sum4=mysql_num_rows($result4);
				if($sum4%$page==0)
				{
					$p=$sum4/$page;
				}
				else
				{
					$p=($sum4-$sum4%$page)/$page+1;
				}
				echo "<tr><td colspan='5'>";
				for($i=1;$i<=$p;$i++)
				{
					$m=($i-1)*$page;
					echo "&nbsp;&nbsp;"."<a href='8.1.php?s6&start2=$m'>".$i."</a>";
				}
				echo "</td></tr>";
				echo "</table>";
			}
		?>
	</div>
</div>
</body>
</html>