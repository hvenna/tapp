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
	<?php $dept=$_POST['department'];	?>
<html>
<head>
</head>
<body>
<?php
	if($dept=='ALL'){
		$query="SELECT  DISTINCT  count(*) FROM `persons`,`ugpg info` WHERE `Acc`=1  and `persons`.`Username`=`ugpg info`.`RegdNo`  ORDER BY `persons`.`Username` ASC;";
		$query1="SELECT DISTINCT `Username`,`dept`,`check` FROM `persons`,`ugpg info` WHERE `Acc`=1  and `persons`.`Username`=`ugpg info`.`RegdNo` ORDER BY `persons`.`Username` ASC;";
	}
	else{
		$query="SELECT  DISTINCT  count(*) FROM `persons`,`ugpg info` WHERE `Acc`=1 and `dept`='$dept' and `persons`.`Username`=`ugpg info`.`RegdNo` ORDER BY `persons`.`Username` ASC;" ;
		$query1="SELECT DISTINCT `Username`,`dept`,`check` FROM `persons`,`ugpg info` WHERE `Acc`=1 and `dept`='$dept' and `persons`.`Username`=`ugpg info`.`RegdNo` ORDER BY `persons`.`Username` ASC;";
	}
	
	
	$result1=mysqli_query($con,$query1);		
	$result=mysqli_query($con,$query);		
	if(!$result)
	{
		print("Erro- no query");
		$error=mysql_error();
		print"<p>".$error."<p>";
		exit;
	}
	$row = mysqli_fetch_array($result);
	$count=1;
	$i=1;
?>
	
	<table align="center"><tr><td align="center">
	<div class="table_css" >
	<table  align="center">
		<tr>
			<td style="text-align:center;width:300px">Students (<?php echo $row[0];?>)</td>
		</tr>
	</table>
	<form method="POST" id="f1" >
				<table  align="center">
				<tr>
					<td style="text-align:center;width:30px"> SNO </td>
					<td style="text-align:center;width:100px">Regd No. </td>
					<td style="text-align:center">Dept </td>
				</tr>
	<?php
		$count=1;
		while($row = mysqli_fetch_array($result1))
		{
			?>
			<tr>
				<td style="text-align:center;width:30px"><?php echo $count;?></td>
				<td style="text-align:center;width:100px"><a target="_blank"  href="./abc.php?x=<?php echo $row[2];?>" id="<?php echo $row[0];?>" onclick="Details(id)"><?php echo $row[0];?></a></td>
				<td style="text-align:center"><?php echo $row[1];?> </td>
			</tr><?php
			$count++;
		}?>
</table>
</form>
</td></tr>
</table>
</body>
</html>
<?php } 
else
{
	?><pre> <?php echo "You dont have permissions ".$_SESSION['username']; ?> </pre>
<?php } ?>
