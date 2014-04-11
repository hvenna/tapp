<?php
include_once "error.php";
include_once "allpages.php";
include_once "dbconnect.php";
	$query="SELECT `Tphome`,`Placement` FROM `tpce`";
	if($_SESSION[username]=='admin@tp')
	{
		$result=mysqli_query($con,$query);
		$row=mysqli_fetch_row($result);
?>
<?php if($_SESSION['username'])
{ 
echo "<div id='content'><pre class='loginv'>";
echo "Welcome,".$_SESSION['username']; 
echo "</pre></div>";
}?>
		<div id='contentL'>
		<table border='1'><tr><td>
		<h1>UPDATE T & P HOME</h1>
		<form method="POST" action='tpceup.php'>
		<table width='300' align="center">
		<tr>
			<td>
				<TEXTAREA name="contentP" ROWS=5 COLS=60><?php echo $row[1];?></TEXTAREA>
			</td>
		</tr>
		<tr>
			<td>
				<TEXTAREA name="content" required=required ROWS=20 COLS=60><?php echo $row[0];?></TEXTAREA>
			</td>
		</tr>
		
		
		</table>
		<table width='300' align="center"><tr>
			
			<td align="center">
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
<?php mysql_close($con); ?>