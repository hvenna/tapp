
<?php
include_once "error.php";
include_once "allpages.php";
include_once "dbconnect.php";
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
	$query="SELECT * FROM `listoffilesforpp` WHERE `Comp`='$dept' ";
	$result=mysqli_query($con,$query);
	$opd="previouspapers/";
	$opd="$opd".$dept."/";
	$dh=opendir($opd);
	$i=0;
	while($row=mysqli_fetch_array($result))
	{
		$dh=opendir($opd);
		if($_POST[$row[0]]=='on')
		{
			while (($file = readdir($dh)) !== false) 
			{
				$i=1;
				if($file==$row[2])
				{
					$query="DELETE FROM `listoffilesforpp` WHERE Path='$row[1]'";
					$result1=mysqli_query($con,$query);
					if($result1 )
					{
						$file=$opd."/".$file;
						$result2=unlink($file);
						if($result2)
						{
							?><pre><br><?php echo $row[3]." sucessfully deleted";?></pre>
							
							<?php
						}
						else
						{
							?><pre><br><?php echo $row[3]." Error in deleting";?></pre>
							<pre><br><a href="./deletepapers.php">Try Again!! </a></pre>
							<?php 
						}
					}
					
				}
			}
			
			
		}
	}
		if($i==0)
		{
			?><pre><?php echo $row[3]." File Not Found";?></pre>
			<pre><br><a href="./deletepapers.php">Try Again!! </a></pre>
			<?php 
		}
		closedir($opd);
	?><pre><br><a href="./deletepapers.php">Delete More </a></pre><?php
}
else
{
	?><div id='content'><pre class='loginv'><?php 
					echo "You don't have permissions ".$_SESSION['username']; ?></pre></div>
<?php } ?>