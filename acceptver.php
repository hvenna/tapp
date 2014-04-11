<?php
include_once "error.php";
include_once "allpages.php";
include_once "dbconnect.php";
session_start();
$_SESSION['submit']='0';
$_SESSION['reject']='0';
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
	<?php $dept=$_POST['Materials'];	?>
<html>
<head>
</head>
<body>
<?php
	$query="SELECT DISTINCT `Username`,`dept`,`check` FROM `persons`,`ugpg info` WHERE `Acc`=0  and `persons`.`Username`=`ugpg info`.`RegdNo`";
	$result=mysqli_query($con,$query);		
	$query="SELECT count(*) FROM `persons` WHERE `Acc`='0' ";
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
	<pre>New Requests (<?php echo $row[0];?>)</pre>
	<form method="POST" action="succreg.php" id="f1">
				<table width="300" border="2" align="center">
				<tr>
					<td> CHECK </td>
					<td>Regd No. </td>
					<td>Dept </td>
				</tr>
	<?php
		while($row = mysqli_fetch_array($result))
		{
			?>
			<tr>
				<td><input type="checkbox" name="<?php echo $row[0];?>"></td>
				<td><a target="_blank" href="./abc.php?x=<?php echo $row[2];?>" id="<?php echo $row[0];?>" onclick="Details(id)"><?php echo $row[0];?></a></td>
				<td><?php echo $row[1];?> </td>
			</tr><?php
		}?>
</table>
<input type="Submit" value="Accept" name="Accept" >
<input type="Submit" value="Reject" name="Reject" >

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
