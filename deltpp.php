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
	echo "Welcome, ".$_SESSION['username']; ?></pre></div>				
	<?php
	$dept=$_POST['name'];
	$query="SELECT * FROM `complists`";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
	{
		if($_POST[$row[0]]=='on')
		{
			$query1="DELETE FROM `complists`  WHERE `comp`='$row[0]'";
			$result1=mysqli_query($con,$query1);
			print $result1;exit;
			if($result1)
			{
				$path = "C:\wamp\www\tapp\previouspapers";
				$path = $path . $row[0];
				$x=rmdir($path);
				if($x){
					?>
					<pre><br><?php print 'Successfully Deleted';?></pre>
				<?php }
				else
				{
					?>
					
					<?php
					
					
				}
			}
			else
			{
				?><pre><br><?php echo $row[0]. ' Error in Deleteing';?></pre>
				
			<?php 
			}
		}
		else { }
			
	}
}
?>