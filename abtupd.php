<?php
include_once "error.php";
include_once "allpages.php";
include_once "dbconnect.php";
	$query="SELECT `about` FROM `tpce`";
	if($_SESSION[username]=='admin@tp')
	{
		$result=mysqli_query($con,$query);
		$row=mysqli_fetch_row($result);	
?>
		<div id='contentL'>
		<table border='1'><tr><td>
		<h1>UPDATE About Us</h1>
		<form method="POST" action='aboutupd.php'>
		<table width='300' align="center">
		<tr>
			<td>
				<TEXTAREA name="content" required=required ROWS=20 COLS=60><?php echo $row[0];?></TEXTAREA>
			</td>
		</tr>
		</table>
		<table width='300' align="center"><tr>
			
			<td  align="center">
				 <input type="Submit"  value="Save" name="OK" class="btn" onclick="myfunc()";></td><td>	

			</td>
		</table>
			
		</tr>
		</table>
		</form>
		</pre>
		</table></tr></td>
		</div>
	<?php }
	else
	{
		?><pre> <?php echo "You don't have the permissions to make changes ".$_SESSION[username];?> </pre><?php
	}?>
	</body>
</html>