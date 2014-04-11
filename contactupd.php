<?php
include_once "error.php";
include_once "allpages.php";
include_once "dbconnect.php";

	$content=$_POST['content'];
	if($_SESSION[username]=='admin@tp')
	{
		$query="UPDATE `tpce` SET `Cont`='$content' WHERE 1";
		$result=mysqli_query($con,$query);
		if($result)
		{
			?> <pre> Successfully Updated </pre><?php
		}
	}
	else
	{
		echo "You don't have the permissions to make changes ".$_SESSION[username];
	}
?>