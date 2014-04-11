
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
		$_SESSION['us1']=$_POST[us1];
		$query="SELECT `Squestion`, `Sanswer` FROM `admind` WHERE `Username`='$_POST[us1]'";
		$result=mysqli_query($con,$query);
		if($row=mysqli_fetch_array($result))
		{	
			$qust=$row[0];
			$ans=$row[1];
			$_SESSION['qust']=$qust;
			$_SESSION['ans']=$ans;
		}
		if($row[0]=='')
		{?>
			<pre> We have no details of you.</pre> 
		<?php }
		else
		{ ?>
		<pre> You need to answer your security quetion to get your password!!</pre>
		<form method="POST" action='adminpassword.php'>
		<table width='500' align="center">
		<tr class="b">
			<td><b><?php echo $qust;?> </td>
			<td>
				<input type="text" class="txt" id="2" name="ans" size='0'  placeholder='<?php echo $qust; ?>'  onfocus="Focus(this)" onblur="Blur(this)">
				
			</td>
		</tr>
		<tr>
			<td>
				 <input type="Submit"  value="submit" name="OK" class="btn" >
			</td>
			<td>	
				 <input type="Reset"  value="Cancel" name="Cancel" class="btn">
			</td>
		</tr>
		</table>
		</form>
		</pre>
		</table></tr></td>
		<?php } ?>
		</div>
	</body>
</html><?php } else
{?> 
<html><pre> A user <?php echo $_SESSION['username']; ?> is already logged in. <a href="./logout.php">Logout </a><?php $_SESSION['username']?>, to sign in as a different user</html>
<?php } ?>