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
<html>
<body>
<?php
	
	$query="SELECT * FROM `lists`";
	$result=mysqli_query($con,$query);		
	if(!$result)
	{
		print("Erro- no query");
		$error=mysql_error();
		print"<p>".$error."<p>";
		exit;
	}
	$row = mysqli_fetch_array($result1);
	
?>
	
	<table border='1' align="center"><tr><td align="center">
	<pre>List Of Categories. Edit and click Update </pre>
	<form method="POST" action="editcatmdb.php">
				<table width="300"  align="center">
				<tr>
					<td align="center">CATEGORY</td>
				</tr>
	<?php
		
		while($row = mysqli_fetch_array($result))
		{
			?>
			<tr>
				<td align="center"><input type="text" required=required  value="<?php echo $row[0]; ?>" name="<?php echo $row[0]; ?>" >
			</tr><?php
			
		}?>
</table>

<input type="submit" value="Update" >
</form>
</table>
</body>
</html>
<?php } 
else
{
	?><pre> <?php echo "You dont have permissions ".$_SESSION['username']; ?> </pre>
<?php } ?>
