<?php
include_once "dbconnect.php";
include_once "error.php";
include_once "allpages.php";
$query="SELECT * from `complists`";
$result=mysqli_query($con,$query);	
if($_SESSION[username]=='admin@tp')
{
?>
	<table  width="700" align="center" border='1'><tr><td>
		<h1> UPLOAD PREVIOUS PAPERS</h1>
		<pre> Choose the respective category and browse the file and give it a name!!</pre>
		
		<form action="storeprevpap.php" method="post" enctype="multipart/form-data">
			<table  width="500" align="center" >
			<tr>
				<td><select name='Company'>
				<?php while($row=mysqli_fetch_array($result))
					{ 
						if($row[0]!=""){?>
						<option value='<?php echo $row[0];?>'><?php echo $row[0];?></option>
					<?php } 
					}?>
				
			</select></td>
				
				<td><input type="file"  required=required  name="file" id="file"></td>
				<td><input type="text" required=required  placeholder="File's Name" name="name" ></td></tr>
				<tr><td></td><td><input type="submit" name="submit" value="Submit"></td>
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