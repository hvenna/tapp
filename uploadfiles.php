<?php
include_once "error.php";
include_once "allpages.php";
include_once "dbconnect.php"; 
$query="SELECT `Dept` from `lists`";
$result=mysqli_query($con,$query);		
		
?>
<?php 
session_start();
$_SESSION['request_url']=$_SERVER['REQUEST_URI'];
if(!$_SESSION['username']=='admin@tp')
	{
		?><html><script>
		window.location.assign("./adminlogin.php");</script></html> 
		<?php
		exit;
	}
?>
	<table  width="700" align="center" border='1'><tr><td>
		<h1> UPLOAD FILES</h1>
		<pre> Choose the respective category and browse the file and give it a name!!</pre>
		
		<form action="storefiles.php" method="post" enctype="multipart/form-data">
			<table  width="500" align="center" >
			<tr>
				<td><select name='Materials'>
				<?php while($row=mysqli_fetch_array($result))
					{ 
						if($row[0]!=""){?>
						<option value='<?php echo $row[0];?>'><?php echo $row[0];?></option>
					<?php } 
					}?>
				
			</select></td>
				
				<td><input type="file" required=required  name="file" id="file"></td>
				<td><input type="text" required=required  placeholder="File's Name" name="name" ></td></tr>
				<tr><td></td><td><input type="submit" name="submit" value="Submit"></td>
			</table>
		</form>
	</td></tr></table>
	</body>
</html>
<?php mysql_close($con); ?>