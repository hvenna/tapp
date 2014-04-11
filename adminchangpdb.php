<?php
include_once "error.php";
include_once "allpages.php";
include_once "dbconnect.php";
?>
<?php
	$p=  $_POST['p'];
	$np=  $_POST['np'];
	$rp=  $_POST['rp'];
	if($p=='' || $np==''||$rp==''||($np!=$rp))
	{
		?> <html><script> window.location.assign("./adminchangep.php")</script></html>
		<?php }
		
	$query="SELECT `Password` from `admind` WHERE  `Username`='$_SESSION[username]' and `Password`='$_POST[p]'";
	$result = mysqli_query($con,$query);
	if(!$result)
	{
		$error=mysql_error();
		print"<h1>".$error."<h1>";
	}
	$row = mysqli_fetch_array($result);
	if($row[0]==$p)
	{
		$query="UPDATE `admind` SET `Password`='$np' WHERE `Username`='$_SESSION[username]'";
		$result = mysqli_query($con,$query);
		if(!$result)
		{
			$error=mysql_error();
			print"<h1>".$error."<h1>";
		}	
		else
			?><div id='content'><pre class='loginv'><?php 
					echo "Password Changed Successfully,".$_SESSION['username']; ?></pre></div>

	<?php }
	
?> 
