<?php
include_once "error.php";
include_once "allpages.php";
include_once "dbconnect.php";
?>

<?php
	session_start();
	if(!$_SESSION['username'])
	{
		?><html><script>
		window.location.assign("./login.php");</script></html> 
		<?php
	}
	else
	{
		?><div id='content'><pre class='loginv'><?php 
					echo "Welcome, ".$_SESSION['name']; ?></pre></div>
		<?php
		$query="SELECT `Comp` from `complists`";
		$result=mysqli_query($con,$query);		
		if(!$result)
		{
			print("Erro- no query");
			$error=mysql_error();
			print"<p>".$error."<p>";
			exit;
		}		
	} ?>
<html>	
	<body>
		<table border='1' align="center">
		<tr><td>
		<pre> Choose the Respective Company and Click View</pre>
		
		<form action="downloadPP.php" method="post" enctype="multipart/form-data">
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
</html>