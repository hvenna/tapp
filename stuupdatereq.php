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
	<?php $dept=$_POST['Department'];	?>
<html>
<head><script type="text/javascript" src="./script/registerjs.js"></script></head>
<body>	
	<table border='1' align="center"><tr><td align="center">
		<pre>Enter the student's Registration Number to update his/her details.</pre>
		<form method="POST" action="stuupdateres.php">
			<table width="300"  align="center">
				<tr>
					<td>
						<input type="text" class="txt" name="regdno" id="1" required=required  placeholder='Regd No' size="20" onfocus="Focus(this)" onblur="Blur(this)">
						<div class="js" id="1d"></div>
					</td>
					<td>
						<input type="Submit"  id="S" value="GO!!" name="OK" class="btn" >
					</td>
				</tr>
			</table>
		</form>
		<br>
	</table>
</body>
</html>
<?php
 } 
else
{
	?><pre> <?php echo "You dont have permissions ".$_SESSION['username']; ?> </pre>
<?php } ?>
