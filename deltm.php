<?php
include_once "error.php";
include_once "dbconnect.php";
include_once "allpages.php";
if(!$_SESSION['username'])
{
	?><html><script>
	window.location.assign("./login.php");</script></html> 
	<?php
}
else if($_SESSION['username']=='admin@tp')
{
	?><div id='content'><pre class='loginv'><?php 
	echo "Welcome,".$_SESSION['username']; ?></pre></div>				
	<?php
	$dept=$_POST['dept'];
	$query="SELECT * FROM `lists`";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
	{
		if($_POST[$row[0]]=='on')
		{
			$query1="DELETE FROM `lists`  WHERE `Dept`='$row[0]'";
			$result1=mysqli_query($con,$query1);
			if($result1)
			{
				$path='C:\wamp\www\tapp\materials\\';
				$path=$path.$row[0];
				$x=rmdir($path);
				if($x){
					?><pre><br><?php echo $row[0]." sucessfully Deleted";?></pre>
				<?php }
				else
				{
					?><pre><br><?php echo "Error in deleting '".$row[0]."'. Make sure that there are no files in '".$row[0]."'";?></pre><?php
					$query1="INSERT INTO `lists`(`Dept`) VALUES ('$row[0]')";
					$result1=mysqli_query($con,$query1);
				}
				
		
			}
			else
			{
				?><pre><br><?php echo $row[0]." Error in Deleteing";?></pre>
				
			<?php 
			}
		}
			
	}
}
else
{
	?><div id='content'><pre class='loginv'><?php 
					echo "You don't have permissions ".$_SESSION['username']; ?></pre></div>
<?php } ?>