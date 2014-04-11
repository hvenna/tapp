<?php
include_once "error.php";
include_once "allpages.php";
include_once "dbconnect.php";
$query="SELECT * from `complists`";
$result=mysqli_query($con,$query);
?>

<?php
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
		<table border='1' align="center">
		<tr><td>
		<h1> Delete Previous Papers </h1>
		<pre> Choose Your Respective Field and Go</pre>
		
		<form action="deletepapersres.php" method="post" enctype="multipart/form-data">
			<table width='300' align="center">
			<tr><td>
			<select name='Company'>
				<?php while($row=mysqli_fetch_array($result))
					{ 
						if($row[0]!=""){?>
						<option value='<?php echo $row[0];?>'><?php echo $row[0];?></option>
					<?php } 
					}?>
				
			</select>
			</td><td>
			
			<input type="submit" name="view" value="Submit"></td>
		
		</form></td></tr>
		</table>
	</body>
</html> <?php }
else
{
	?><div id='content'><pre class='loginv'><?php 
					echo "You don't have permissions ".$_SESSION['username']; ?></pre></div>
<?php } ?>