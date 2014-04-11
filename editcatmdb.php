<?php
include_once "error.php";
include_once "allpages.php";
include_once "dbconnect.php";
$query="SELECT `Dept` from `lists`";
$result=mysqli_query($con,$query);
?>

<?php
	session_start();
	if(!$_SESSION['username'])
	{
		?><html><script>
		window.location.assign("./login.php");</script></html> 
		<?php
	}
	else if($_SESSION['username']=='admin@tp')
	{
		?><div id='content'><pre class='loginv'><?php 
					echo "Welcome,".$_SESSION['username']; 
			while($row=mysqli_fetch_array($result))
			{
				$new=$_POST[$row[0]];
				
				if($row[0]!=$new)
				{
					
				
					$query1="UPDATE `lists` SET `Dept`='$new' WHERE `Dept`='$row[0]'";
					
					$result1=mysqli_query($con,$query1);
					if($result1)
					{
						$path='C:\xampp\htdocs\example\materials\\';
						$x=$path.$row[0];
						$y=$path.$new;
						
						echo $new;
						$x=rename("$x","$y");
						if($x){
							?><pre> <?php echo "Successfully updated ".$row[0]." to ".$new.""; ?> </pre> <?php }
						else{
							?><pre> <?php echo "Error in updating ".$row[0]." to ".$new.""; ?> </pre> <?php
							$query1="UPDATE `lists` SET `Dept`='$row[0]' WHERE `Dept`='$new'";
							
							$result1=mysqli_query($con,$query1);
							
							}
					}
						
				}
			} 
	}
else
{
	?><div id='content'><pre class='loginv'><?php 
					echo "You don't have permissions ".$_SESSION['username']; ?></pre></div>
<?php } ?>