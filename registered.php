<?php
include_once "error.php";
include_once "allpages.php";
include_once "dbconnect.php";
session_start();
if(!$_SESSION['username'])
{
	?><html><script>
	window.location.assign("./login.php");</script></html> 
	<?php
}
else if($_SESSION['username']=='admin@tp')
{
	?><div id='content'><pre class='loginv'><?php 
	echo "Welcome,".$_SESSION['username']; ?></pre></div>				
	<?php $dept=$_POST['Department'];	?>
<html>
<head>
	<script>
		function Details(x)
		{
			document.getElementById('student').value=x;
			document.getElementById('f1').submit();
		}
	</script>
</head>
<body>
<?php
	if($dept=='ALL')
		$query="SELECT * FROM `persons` WHERE `Acc`=1";
	else
		$query="SELECT * FROM `persons`,`ugpg info` WHERE `Dept`='$dept' and `Acc`=1 ";
	$result=mysqli_query($con,$query);		
	if($dept=='ALL')
		$query="SELECT count(*) FROM `persons` WHERE `regc`=1";
	else
		$query="SELECT count(*) FROM `persons` WHERE `Dept`='$dept' and `regc`=1 ";
	
	$result1=mysqli_query($con,$query);		
	if(!$result)
	{
		print("Erro- no query");
		$error=mysql_error();
		print"<p>".$error."<p>";
		exit;
	}
	$row = mysqli_fetch_array($result1);
	$count=1;
	$i=1;
?>
	
	<table border='1' align="center"><tr><td align="center">
	<pre>Successfully Registered Students (<?php echo $row[0];?>)</pre>
	<form method="POST" target="_blank" action="abc.php" id="f1">
				<table width="300" border="2" align="center">
				<tr>
					<td> SNO </td>
					<td>Regd No. </td>
					<td>Dept </td>
				</tr>
	<?php
		$count=1;
		while($row = mysqli_fetch_array($result))
		{
			?>
			<tr>
				<td><?php echo $count;?></td>
				<td><a href="#" id="<?php echo $row[2];?>" onclick="Details(id)"><?php echo $row[2];?></a></td>
				<td><?php echo $row[8];?> </td>
			</tr><?php
			$count++;
		}?>
</table>
<input type="hidden" name="student" id="student" value="">
</form>
<br>
</table>

<br>
<hr><br>
<?php
	if($dept=='ALL')
		$query="SELECT * FROM `persons` WHERE `regc`=0 and `Acc`=1";
	else
		$query="SELECT * FROM `persons` WHERE `Dept`='$dept' and `regc`=0 and `Acc`=1";
	$result=mysqli_query($con,$query);		
	if($dept=='ALL')
		$query="SELECT count(*) FROM `persons` WHERE `regc`=0 and `Acc`=1";
	else
		$query="SELECT count(*) FROM `persons` WHERE `Dept`='$dept' and `regc`=0 and `Acc`=1 ";
	
	$result1=mysqli_query($con,$query);		
	if(!$result)
	{
		print("Erro- no query");
		$error=mysql_error();
		print"<p>".$error."<p>";
		exit;
	}
	$row = mysqli_fetch_array($result1);
	$count=1;
	$i=1;
?>
	
	<table border='1' align="center"><tr><td align="center">
	<pre>Students who have not yet completed their Registration (<?php echo $row[0];?>)</pre>
	<form method="POST">
				<table width="300" border="2" align="center">
				<tr>
					<td> SNO </td>
					<td>Regd No. </td>
					<td>Dept </td>
				</tr>
	<?php
		$count=1;
		while($row = mysqli_fetch_array($result))
		{
			?>
			<tr>
				<td><?php echo $count;?></td>
				<td><?php echo $row[2];?></td>
				<td><?php echo $row[8];?> </td>
			</tr><?php
			$count++;
		}?>
</table>
<input type="hidden" name="dept" value="<?php echo $dept; ?>">
</form>
<br>
</table>
</body>
</html>
<?php
 } 
else
{
	?><pre> <?php echo "You dont have permissions ".$_SESSION['username']; ?> </pre>
<?php } ?>
