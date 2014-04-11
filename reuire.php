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
					echo "Welcome,".$_SESSION['username']; ?></pre></div>
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
		<pre> View Results Sorted with respect to the field:</pre>
		
		<form action="results.php" method="post" enctype="multipart/form-data">
			<table width='300' align="center">
			<tr><td>
			<select name='require'>
				<option value='percentage'>Percentage</option>
				<option value='date'>Date</option>
			</select>
			</td><td>
			<input type="submit" name="View Results" value="Submit"></td>
		
		</form></td></tr>
		</table>
	</body>
</html>