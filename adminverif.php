<?php
include_once "error.php";
include_once "dbconnect.php";
?>

		<?php
			$u=  $_POST['us1'];
			$p=  $_POST['p1'];
			if($u=='' || $p=='')
			{
				?> <html><script> window.location.assign("./adminlogin.php")</script></html>
			<?php }
			
			if($_SESSION['username'])
			{
				include "allpages.php";
				?> <html><pre> A user <?php echo $_SESSION['username']; ?> is already logged in. <a href="./logout.php">Logout </a><?php $_SESSION['username']?>, to sign in as a different user</html>
			<?php }
			else
			{
				$query="SELECT * from `admind` WHERE  `Username`='$u' and `Password`='$p'";
				$result = mysqli_query($con,$query);
				if(!$result)
				{
					$error=mysql_error();
					print"<h1>".$error."<h1>";
				}
				$row = mysqli_fetch_array($result);
				if($row[0])
				{
					$_SESSION['username']=$u;
					include "allpages.php";
					$query="SELECT * from `admind` WHERE  `Username`='$u' and `Password`='$p'";
					$result = mysqli_query($con,$query);
					if(!$result)
					{
						$error=mysql_error();
						print"<h1>".$error."<h1>";
					}
					$row = mysqli_fetch_array($result);
					if($row['Ver']==0)
					{
						$_SESSION['password']=$p;
						echo"<html><script> window.location.assign('./Asqustn.php')</script></html>";
					}
					else
					{					
						echo"<div id='content'><pre class='loginv'>";
						echo "Welcome, ".$row['Username'];
						echo"</pre></div>";
					}
					
				}
				else
				{
					?><html><script>alert("Invalid Details, Login Again!!");
					window.location.assign("./adminlogin.php");</script></html> <?php
					session_destroy();
				}
	} ?>
	</body>
</html>
