<?php
include_once "error.php";
include_once "allpages.php";
include_once "dbconnect.php";
?>

<div id='contentL'>
<table border='1'><tr><td>
<h1> FORGOT PASSWORD?</h1>
<?php
$us=$_SESSION[us1];
$ans=$_POST['ans'];
$query="SELECT `Password`,`Squestion`, `Sanswer`  FROM `admind` WHERE `Username`='$us' ";
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
			
			