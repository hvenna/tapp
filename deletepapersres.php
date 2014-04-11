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
	<?php $dept=$_POST['Company'];	?>
<html>
<body>
<?php
	$query="SELECT * FROM `listoffilesforpp` WHERE `Comp`='$dept' ";
	$result=mysqli_query($con,$query);		
	if(!$result)
	{
		print("Erro- no query");
		$error=mysql_error();
		print"<p>".$error."<p>";
		exit;
	}
	$count=1;
	$i=1;
?>
	
	<table align="center"><tr><td align="center">
	<div class="table_css" >
	<table  align="center">
		<tr>
			<td style="text-align:center;width:200px"> LIST OF FILES IN <?php echo $dept; ?> </td>
		</tr>
	</table>
	<form method="POST" action="deletepapersdb.php">
				<table  align="center">
				<tr>
					<td style="width:50px"> SNO </td>
					<td>FILE </td>
				</tr>
	<?php
		while($row = mysqli_fetch_array($result))
		{
			?>
			<tr>
				<td style="width:50px"><input type="checkbox" name="<?php echo $row[0];?>"></td>
				<td><a href="<?php echo $row[1]?>"  target="_blank"><?php echo $row[3];?> </a></td>
			</tr><?php
			$count=$count+1;
		}?>
		<tr><td colspan=2 style="width:100%">
			<input type="hidden" name="dept" value="<?php echo $dept;?>" >
			<input type="Submit" value="Delete" >
		</td></tr>
</table>
</form>
</table>
</body>
</html>
<?php } 
else
{
	?><pre> <?php echo "You dont have permissions ".$_SESSION['username']; ?> </pre>
<?php } ?>
