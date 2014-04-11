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
<body>
<?php
	$query="SELECT * FROM `lists` ";
	$result=mysqli_query($con,$query);		
	
	if(!$result)
	{
		print("Erro- no query");
		$error=mysql_error();
		print"<p>".$error."<p>";
		exit;
	}
	
?>
	
	<table align="center"><tr><td align="center">
	<div class="table_css" >
	<table style="text-align:center;" align="center">
		<tr>
			<td style="text-align:center;">Categories</td>
		</tr>
	</table>
	<form method="POST" action="deltm.php">
				<table  align="center">
				<tr>
					<td STYLE="width:40px"> CHECK </td>
					<td STYLE="text-align:center;">Name </td>
					
				</tr>
	<?php
		while($row = mysqli_fetch_array($result))
		{
			?>
			<tr>
				<td STYLE="width:40px"><input type="checkbox" name="<?php echo $row[0];?>"></td>
				<td STYLE="text-align:center;"> <?php echo $row[0];?></td>
				
			</tr><?php
		}?>
		<tr>
			<td colspan=2 style="text-align:center">
			<input type="Submit" value="DELETE" >
		</tr>
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
