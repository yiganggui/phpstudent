<?php
	@session_start();
	if(!isset($_SESSION['username']))
	{
		echo "<script>alert('δ��¼');location.href='index.php';</script>";
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
		<p class="ys1"><?php echo "��ӭ".$_SESSION['username']."��ʦ��";?></p>
		<h1 class="ys2">ѧ����Ϣ����ѡ��ϵͳ</h1>
		<form method="get">
		<table><tr><td><input type="submit" value="ѧ����Ϣ¼��" name="s1" /></td>
		<td><input type="submit" value="ѧ����Ϣ�б�" name="s2" /></td>
		<td><input type="submit" value="�γ���Ϣ¼��" name="s4" /></td>
		<td><input type="submit" value="�γ���Ϣ�б�" name="s5" /></td>
		<td><input type="submit" value="�޸�ѧ���ɼ�" name="s6" /></td>
		<td><input type="submit" value="�˳�ϵͳ" name="s3" /></td></tr></table>
		</form>
	</div>
	<div id="down">
		<?php
			if(isset($_GET["s1"]))
			{
		?>
		<form method="post" action="8.2.php">
		<table align="center">
		<tr><td>ѧ��</td><td><input type="text" name="stu_id" /></td></tr>
		<tr><td>����</td><td><input type="text" name="stu_name" /></td></tr>
		<tr><td>�Ա�</td><td><input type="radio" name="sex" value="1"/>��<input type="radio" name="sex" value="0"/>Ů</td></tr>
		<tr><td>����</td><td><input type="date" name="birth" /></td></tr>
		<tr><td>רҵ</td><td><input type="text" name="major" /></td></tr>
		<tr><td colspan="2" align="center"><input type="submit" name="tj" value="�ύ" /><input type="reset" name="cz" value="����" /></td></tr>
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
				echo "<table border=1 align='center'><tr><td>ѧ��</td><td>����</td><td>�Ա�</td><td>����</td><td>רҵ</td><td>ѧ��</td><td>����</td></tr>";
				while($row=mysql_fetch_row($result2))
				{
					list($stu_id,$stu_name,$sex,$birth,$major,$credit)=$row;
					if($sex==0)
					{
						$sex='Ů';
					}
					else
					{
						$sex='��';
					}
					echo "<tr><td>$stu_id</td><td>$stu_name</td><td>$sex</td><td>$birth</td><td>$major</td><td>$credit<td><a 	href='delete.php?stu_id=$stu_id'>ɾ��</a>&nbsp;&nbsp;<a href='update.php?stu_id=$stu_id'>�޸�</a>";
					$sql1="select * from admin where username='$stu_id'";
					$result1=mysql_query($sql1);
					$num=mysql_num_rows($result1);
					if($num==0)
					{
					echo "&nbsp;<a href='add.php?stu_id=$stu_id'>���ѧ���˺�</a>";
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
				echo "<script>alert('�˳�ϵͳ�ɹ���');location.href='index.php';</script>";
			}
		?>
		<?php
			if(isset($_GET["s4"]))
			{
		?>
		<form method="post" action="8.3.php">
		<table align="center">
		<tr><td>�γ̺�</td><td><input type="text" name="course_id" /></td></tr>
		<tr><td>�γ���</td><td><input type="text" name="course_name" /></td></tr>
		<tr><td>ѧ��</td><td><input type="text" name="course_data" /></td></tr>
		<tr><td>ѧ��</td><td><input type="text" name="course_credit" /></td></tr>
		<tr><td>ѧʱ</td><td><input type="text" name="course_period" /></td></tr>
		<tr><td colspan="2" align="center"><input type="submit" name="tj" value="�ύ" /><input type="reset" name="cz" value="����" /></td></tr>
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
				echo "<table border=1 align='center'><tr><td>�γ̺�</td><td>�γ���</td><td>ѧ��</td><td>ѧʱ</td><td>ѧ��</td><td>ѡ������</td><td>����</td></tr>";
				while($row=mysql_fetch_row($result3))
				{
					list($a,$b,$c,$d,$e)=$row;
					$sql7="select * from cjb where course_id='$a'";
					$result7=mysql_query($sql7);
					$num2=mysql_num_rows($result7);
					echo "<tr><td>$a</td><td>$b</td><td>$c</td><td>$d</td><td>$e</td><td>$num2</td><td><a 	href='kcdelete.php?course_id=$a'>ɾ��</a>&nbsp;&nbsp;<a href='kcupdate.php?course_id=$a'>�޸�</a></td></tr>";
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
				echo "<table border=1 align=center><tr><td>ѧ��</td><td>����</td><td>�γ���</td><td>�ɼ�</td><td>����</td></tr>";
				while($row5=mysql_fetch_row($result5))
				{
					list($stu_id,$stu_name,$course_name,$grade)=$row5;
					echo "<tr><td>$stu_id</td><td>$stu_name</td><td>$course_name</td><td>$grade</td><td><a href='sgcj.php?stu_id=$stu_id'>�޸ĳɼ�	</a>							</td></tr>";
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