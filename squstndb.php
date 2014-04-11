<?php
include_once "error.php";
include_once "allpages.php";
include_once "dbconnect.php";
?>
<?php
	$q= $_POST['Questions'];
	$u= $_POST['us1'];
	$r=$_SESSION['username'];
	if($u=='' || $q=='0')
	{
		?> <html><script>window.location.assign("./squstn.php")</script></html>
	<?php }
	$query="UPDATE `persons` SET `Squestion`='$q',`Sanswer`='$u' WHERE `Username`='$r'";
	$result = mysqli_query($con,$query);
	if(!$result)
	{
		$error=mysql_error();
		print"<h1>".$error."<h1>";
	}
	else
	{
		$query="UPDATE `persons` SET `ver`='1' WHERE `Username`='$_SESSION[username]'";
		$result = mysqli_query($con,$query);
		if(!$result)
		{
			$error=mysql_error();
			print"<h1>".$error."<h1>";
		}
	}
	$query="SELECT * from persons WHERE  `Username`='$_SESSION[username]' and `Password`='$_SESSION[password]'";
	$result = mysqli_query($con,$query);
	if(!$result)
	{
		$error=mysql_error();
		echo"<h1>".$error."<h1>";
	}
	$row = mysqli_fetch_array($result);
	if($row[0]>0)
	{
		echo"<div id='content'><pre class='loginv'>";
		echo "Welcome,".$row['Username'].".";
		echo"</pre></div>";
	}
	else
	{
		echo "<html><script>alert('Invalid Details, Login Again!!')" ;
		echo "window.location.assign('./login.php')";
		echo "</script></html>";
		session_destroy();
	}
	
?> 