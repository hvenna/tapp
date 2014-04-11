<?php
include_once "dbconnect.php";
include_once "error.php";
include_once "allpages.php";
if($_SESSION[username]=='admin@tp')
{
?>
	<table  width="700" align="center" border='1'><tr><td>
		<h1 >ADD COMPANIES</h1>
		<pre>Add the respective category in the text box provided!!</pre>
		
		<form action="addcatppdb.php" method="post" enctype="multipart/form-data">
			<table  width="500" align="center" >
				<tr><td align="center"><input type="text" required=required  placeholder="Category's Name" name="name1" ></td></tr>
				<tr><td align="center"><input type="text" placeholder="Category's Name" name="name2" ></td></tr>
				<tr><td align="center"><input type="text" placeholder="Category's Name" name="name3" ></td></tr>
				<tr><td align="center"><input type="text" placeholder="Category's Name" name="name4" ></td></tr>
				<tr><td align="center"><input type="text" placeholder="Category's Name" name="name5" ></td></tr>
				<tr><td align="center"><input type="submit" name="submit" value="Add"></td>
			</table>
		</form>
	</td></tr></table>
<?php } 
else
	{
		?><pre> <?php echo "You don't have the permissions to make changes ".$_SESSION[username];?> </pre><?php
	}?>
	</body>
</html>
<?php mysql_close($con); ?>