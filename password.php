<?php
include_once "error.php";
include_once "allpages.php";
include_once "dbconnect.php";
?>
<?php
	session_start();
	if(!$_SESSION['username'])
	{ ?>
<div id='contentL'>
<table border='1'><tr><td>
<h1> FORGOT PASSWORD?</h1>
<?php
$us=$_SESSION[us1];
$ans=$_POST['ans'];
$query="SELECT `Password`,`Squestion`, `Sanswer`  FROM `persons` WHERE `Username`='$us' ";
$result=mysqli_query($con,$query);

if($row=mysqli_fetch_array($result))
{
	if(($row[2] == $ans) && ($_SESSION[qust] == $row[1]))
	{?>
		<pre> Hello, <?php echo $_SESSION['us1'].".";?>  </pre>
		<pre> Your password is <b> <?php echo $row[0]; 
	}
	else
	{?>
		<pre> Sorry, Your answer is wrong ! Try Again !! </pre>
	<?php }
}
?>
<?php } else
{?> 
<html><pre> A user <?php echo $_SESSION['username']; ?> is already logged in. <a href="./logout.php">Logout </a><?php $_SESSION['username']?>, to sign in as a different user</html>
<?php } ?>			
			