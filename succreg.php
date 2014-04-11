<?php
include_once "error.php";
include_once "dbconnect.php";
include_once "allpages.php";
function generateRandomString($length ) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
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
	
	$query="SELECT DISTINCT `Username`,`dept` FROM `persons`,`ugpg info` WHERE `Acc`=0  and `persons`.`Username`=`ugpg info`.`RegdNo`";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
	{
		if(isset($_POST['Accept']))
		{
			if($_POST[$row[0]]=='on')
			{
				$query="UPDATE `persons` SET `Acc`='1' WHERE `Username`='$row[0]'";
				$result1=mysqli_query($con,$query);
				if($result1)
				{
					$x=generateRandomString(10);
					$query="UPDATE `persons` SET `Password`='$x' WHERE `Username`='$row[0]'";
					$result1=mysqli_query($con,$query);
					$message ="Hello";
					mail('sravan_reddy13@yahoo.com', 'My Subject', $message);
					//SEND MAIL TO THE RESPECTIVE CANDIDATE(pending)
					?><pre><br><?php echo $row[2]." sucessfully added";?></pre>
				<?php
				}
				else
				{
					?><pre><br><?php echo $row[3]." Error in Accepting";?></pre>
					<pre><a href="./acceptver.php">Try Again!! </a></pre>
				<?php 
				}
			}
		}
		else
		{
			
			if($_POST[$row[0]]=='on')
			{
				mysqli_autocommit($con, FALSE);
			//$con->beginTransaction();
			$query="DELETE FROM `persons` WHERE `Username`='$row[0]'";
			$result1=mysqli_query($con,$query);
			$query="DELETE FROM `student details` WHERE `RegdNo`='$row[0]'";
			$result7=mysqli_query($con,$query);
			$query="DELETE FROM `ugpg info` WHERE `RegdNo`='$row[0]'";
			$result2=mysqli_query($con,$query);
			$query="DELETE FROM `12th details` WHERE `RegdNo`='$row[0]'";
			$result3=mysqli_query($con,$query);
			$query="DELETE FROM `tenth info` WHERE `RegdNo`='$row[0]'";
			$result4=mysqli_query($con,$query);
			$query="DELETE FROM `ugpg info` WHERE `RegdNo`='$row[0]'";
			$result5=mysqli_query($con,$query);
			$query="DELETE FROM `uploads` WHERE `RegdNo`='$row[0]'";
			$result6=mysqli_query($con,$query);
			if($result1 and $result2 and $result3 and $result4 and $result5 and $result6 and $result7 )
			{
				mysqli_commit($con);
				?><pre><br><?php echo $row[0]." sucessfully Deleted";?></pre>
			<?php
			}
			else
			{
				mysqli_rollback($con);
				?><pre><br><?php echo $row[3]." Error in Deleteing";?></pre>
				<pre><a href="./acceptver.php">Try Again!! </a></pre>
			<?php 
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