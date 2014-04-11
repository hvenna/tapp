<?php
include_once "error.php";
include_once "dbconnect.php";
?>

		<?php
			$u=  $_POST['us1'];
			$p=  $_POST['p1'];
			if($u=='' || $p=='')
			{
				?> <html><script> window.location.assign("./login.php")</script></html>
			<?php }
			
			if($_SESSION['name'])
			{
				include "allpages.php";
				?> <html><pre> A user <?php echo $_SESSION['name']; ?> is already logged in. <a href="./logout.php">Logout </a><?php $_SESSION['name']?>, to sign in as a different user</html>
			<?php }
			else
			{
				$query="SELECT * from persons WHERE  `Username`='$_POST[us1]' and BINARY  `Password`='$_POST[p1]'";
				$result = mysqli_query($con,$query);
				if(!$result)
				{
					$error=mysql_error();
					print"<h1>".$error."<h1>";
				}
				$row = mysqli_fetch_array($result);
				if($row[0]>0 && ($row['Username']==$u)&&($row['Password']==$p))
				{
					if($row['Acc']==0)
					{
						include "allpages.php";
						$query="SELECT * from persons WHERE  `Username`='$_POST[us1]' and BINARY  `Password`='$_POST[p1]'";
						$result = mysqli_query($con,$query);
						if(!$result)
						{
							$error=mysql_error();
							print"<h1>".$error."<h1>";
						}
						$row = mysqli_fetch_array($result);
						?><pre><?php echo "We are sorry ";
						echo $row['Username'].". Your request has not been accepted yet. Contact Admin";
					}
					else
					{
					$_SESSION['username']=$u;
					include "allpages.php";
					$query="SELECT * from persons WHERE  `Username`='$_POST[us1]' and BINARY  `Password`='$_POST[p1]'";
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
						echo"<html><script> window.location.assign('./squstn.php')</script></html>";
					}
					else
					{					
						$query="SELECT * from `student details` WHERE  `RegdNo`='$_POST[us1]'";
						$result_det = mysqli_query($con,$query);
						$row_det = mysqli_fetch_array($result_det);
						$_SESSION['name']= $row_det['Name'];
						echo"<div id='content'><pre class='loginv'>";
						echo "Welcome, ".$row_det['Name'];
						echo"</pre></div>";
					}
					}
				}
				else
				{
					
					?><html><script>alert("Invalid Details, Login Again!!");
					window.location.assign("./login.php");</script></html> <?php
					session_destroy();
				} 
			}?> 
	</body>
</html>
<?php mysql_close($con); ?>