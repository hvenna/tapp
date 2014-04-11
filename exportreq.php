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
<html>
<head>
</head>
<body>
	<br>
	<table width="800" align="center" border="1"> 
	<tr><td><h1 align="center">GIVE A NAME AND CLICK EXPORT!!! </h1>
	<h5 align="center">Make sure you give a unique name to the file. EG: student's_details_28-07-13 </h5>
	<form method="POST" action="export_1.php">
		<table width="600" align="center">
			<tr><td align="center"> 
				<input type="text" required=required placeholder="Give a name" name="file" >
				<input type="submit" value="EXPORT" >
			</tr></td>
		</table>
		
	</form>
	</td></tr></table>
</body>
</html>
<?php } 
else
{
	?><pre> <?php echo "You dont have permissions ".$_SESSION['username']; ?> </pre>
<?php } ?>
