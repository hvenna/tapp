<?php
include_once "error.php";
include_once "allpages.php";
include_once "dbconnect.php";
$u=$_POST['us1'];
$v=$_POST['p1'];
$d=$_POST['Department'];
$result=mysqli_query($con,"INSERT INTO `persons`(`Username`, `Password`,`Dept`) VALUES ('$u','$v','$d')");
if(!$result)
{
	?><pre><?php echo"Registration Failed";?></pre>
<?php
}
else{
	?><pre><?php echo"Your request has been taken. You can login once your request is accepted by the Admin  "?></pre>
<?php } ?>
<pre>Click <a href="./register.php">here </a> to register a new user </pre>