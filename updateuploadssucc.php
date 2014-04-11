<?php
include_once "error.php";
include_once "css.php";
include_once "dbconnect.php"; 
$ch=$_POST['choice'];
$num=$_POST['num'];
if($_SESSION['username']!="admin@tp"){
	echo "<pre>You dont have permissions to view this page.";
	exit;
}
//Uploads verification
	
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	if($_FILES["file"]["name"])
	{
		$temp = explode(".", $_FILES["file"]["name"]);
		$extension = end($temp);
	
	if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/jpg")
	|| ($_FILES["file"]["type"] == "image/pjpeg")
	|| ($_FILES["file"]["type"] == "image/x-png")
	|| ($_FILES["file"]["type"] == "image/png")))
	{
		if ($_FILES["file"]["error"] > 0)
		{
			echo "<pre> Error in the file: " . $_FILES["file"]["error"] . "</pre><br>";
		}
	}
	else
	{
		echo "<pre>You have uploaded an Invalid file. We accept the following extensions:
		.gif,.jpeg,.jpg,.pjpeg,.x-png,.png</pre>";
		exit;
	}
	}
	
	//move uploaded files
	$path='C:\wamp\www\tapp\students\\'.$num;
	$path='http://localhost/tapp/students';
	$path="$path/".$num."/".$_FILES["file"]["name"];
	move_uploaded_file($_FILES["file"]["tmp_name"],"students/".$num."/". $_FILES["file"]["name"]);
	if (file_exists("students/".$num."/". $_FILES["file"]["name"]))
	{
		?><pre> <?php echo $_FILES["file"]["name"] . " already exists. Try to rename and try again.";
		exit;?></pre><?php
	}
	else
	{	
		move_uploaded_file($_FILES["file"]["tmp_name"],"students/".$num."/". $_FILES["file"]["name"]);
	}
	if($ch==1)
		$query="UPDATE `uploads` SET `pic`='$path' WHERE `RegdNo`='$num'";
	if($ch==2)
		$query="UPDATE `uploads` SET `10th`='$path' WHERE `RegdNo`='$num'";
	if($ch==3)
		$query="UPDATE `uploads` SET `12th`='$path' WHERE `RegdNo`='$num'";
		
	mysqli_autocommit($con, FALSE);
	$result=mysqli_query($con,$query);
	if ($result) {
		mysqli_commit($con);
		echo "<pre>".$num."'s DETAILS SUCCESSFULLY UPDATED. </pre>"; ?>
		<script> window.close(); </script>
		
	<?php } 
	else {        
		mysqli_rollback($con);
		$x= "students/".$num."/". $_FILES["file"]["name"];
		unlink($x); // delete file
		echo "<pre>Error in Updation. Please try Again.</pre>";
	}
	
 mysql_close($con); ?>