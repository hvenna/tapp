<?php
include_once "error.php";
include_once "allpages.php";
include_once "connecttodb.php";
if(!$_SESSION['username'])
{
	?><html><script>
	window.location.assign("./adminlogin.php");</script></html> 
	<?php
}
else if($_SESSION['username']=='admin@tp')
{
	?><div id='content'><pre class='loginv'><?php 
	echo "Welcome,".$_SESSION['username']; ?></pre></div>				
	<?php
	
	$query="SHOW tables from quiz";
	$result=mysql_query($query);

	while($row=mysql_fetch_array($result))
	{
		if($row[0]!='list')
		{
			if($_POST[$row[0]]=='on')
			{
				$query1="DROP TABLE $row[0]";
			
				$result1=mysql_query($query1);
				$query2="DELETE FROM `list` WHERE `name`='$row[0]'";
				
				$result2=mysql_query($query2);
				if($result1 && $result2)
				{
					?><pre><br><?php echo $row[0]." sucessfully Deleted";?></pre>
				<?php
				}
				else
				{
					?><pre><br><?php echo $row[0]." Error in Deleteing";?></pre>
					
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