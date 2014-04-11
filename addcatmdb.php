<?php
include_once "dbconnect.php";
include_once "error.php";
include_once "allpages.php";
if($_SESSION[username]=='admin@tp')
{

	$arr[0]=$_POST['name1'];
	$arr[1]=$_POST['name2'];
	$arr[2]=$_POST['name3'];
	$arr[3]=$_POST['name4'];
	$arr[4]=$_POST['name5'];
	$i=0;
	while($arr[$i]!="")
	{
		$query="INSERT INTO `lists`(`Dept`) VALUES ('$arr[$i]') ";
		$result=mysqli_query($con,$query);
		if(!$result)
		{
			$error=mysql_error();
			print"<pre>Error in adding ".$arr[$i]." ".$error."<pre>";		
			exit;
		}
		else
		{
			$path='C:\wamp\www\tapp\materials\\';
			$path="$path".$arr[$i];
			
			$x=mkdir ( $path, 0777);
			if($x)
			{?>
				<pre> <?php echo "Successfully added ".$arr[$i]; ?> </pre> <?php
			}
			else
			{
				print"<pre>Error in adding ".$arr[$i]."<pre>";		
			}
		}
		$i++;
	}
	
} 
else
	{
		?><pre> <?php echo "You don't have the permissions to make changes ".$_SESSION[username];?> </pre><?php
	}?>
	</body>
</html>
<?php mysql_close($con); ?>