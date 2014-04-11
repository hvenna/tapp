<?php
include_once "dbconnect.php";
include_once "error.php";
include_once "allpages.php";
	$content=$_POST['content'];
	$place=$_POST['contentP'];
	$query="UPDATE `tpce` SET `Tphome`='$content',`Placement`='$place' WHERE 1";
	$result=mysqli_query($con,$query);
	if($result)
	{
		?> <pre> Successfully Updated </pre><?php
	}
?>