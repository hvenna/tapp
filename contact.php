<?php
include_once "error.php";
include_once "allpages.php";
include_once "dbconnect.php";

	$query="SELECT `Cont`  FROM `tpce`";
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_row($result);
	session_start();
	if($_SESSION['username'])
	{
		?><div id='content'><pre class='loginv'><?php 
					echo "Welcome, ".$_SESSION['name']; ?></pre></div>
				
	<?php }
?>
		<table border='1' width="300" align="center"><tr><td>
		<h1>Contact Us</h1>
		<div id='content'>
		<table width="300" align="center"><tr><td>
		<div style="color: #000;font-size: 16px;margin-bottom: 25px;">
		<?php echo $row[0]; ?>
		</div>
		</td></tr>
		</div>
		</td></tr>
		<tr><td style="color:#000;">
		<span style="font-size:16px;font-weight:bold;text-align:center;display:block;">Query Form</span>
		<form>
		<table><tr><td>Your Name</td>
		<td><input type="text" required="required"></td></tr>
		<tr><td>Your Email</td>
		<td><input type="email" required="required"></td></tr>
		<tr><td>Your Query</td>
		<td><textarea rows="5" cols="20" required="required"></textarea></td></tr>
		<tr><td colspan="2"><center><input type="submit"></center></td></tr>
		</table>
		</td></tr>
		</table>
	</body>
</html>
	

	
