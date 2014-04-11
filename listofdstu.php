<?php
include_once "error.php";
include_once "allpages.php";
include_once "dbconnect.php";
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
	echo "Welcome,".$_SESSION['username']; ?></pre></div>				
	<?php $dept=$_POST['department'];	?>
<html>
<body>
<script>
		function checkall()
		{
			var i=1;
			if(document.getElementById('check').checked==true)
			{
				while(document.getElementById(i)!='')
				{
					document.getElementById(i).checked=true;
					i++;
				}
			}
			else
			{
				while(document.getElementById(i)!='')
				{
					document.getElementById(i).checked=false;
					i++;
				}
			}
			
		}
</script>
<?php
	
	$query="SELECT  DISTINCT  count(*) FROM `persons`,`ugpg info` WHERE `Acc`=1 and `dept`='$dept' and `persons`.`Username`=`ugpg info`.`RegdNo` ORDER BY `persons`.`Username` ASC;" ;
	$query1="SELECT DISTINCT `Username`,`dept`,`check` FROM `persons`,`ugpg info` WHERE `Acc`=1 and `dept`='$dept' and `persons`.`Username`=`ugpg info`.`RegdNo` ORDER BY `persons`.`Username` ASC;";
	
	$result1=mysqli_query($con,$query1);		
	$result=mysqli_query($con,$query);	
	if(!$result)
	{
		print("Erro- no query");
		$error=mysql_error();
		print"<p>".$error."<p>";
		exit;
	}
	$row = mysqli_fetch_array($result);
	
	$count=1;
	$i=1;
?>
	
	<table  align="center"><tr><td align="center">
	<div class="table_css" >
	<table  align="center">
		<tr>
			<td style="text-align:center;width:300px">Students (<?php echo $row[0];?>)</td>
		</tr>
	</table>
	<form method="POST" action="deletesucc.php">
				<table align="center">
				<tr>
					<td style="text-align:center;width:30px"> 
						CHECK 
						<div style="text-align:center;font-size:10px">CHECK ALL <input style="text-align:center;width:30px;font-size:10px" type="checkbox" id="check" onclick="checkall()"></div>
					</td>
					<td style="text-align:center;width:100px">REGISTRATION NO. </td>
					<td style="text-align:center">DEPARTMENT </td>
				</tr>
	<?php
		$i=1;
		while($row1 = mysqli_fetch_array($result1))
		{
			?>
			<tr>
				<td style="text-align:center;width:30px"><input type="checkbox" id="<?php echo $i;?>" name="<?php echo $row1[0];?>"></td>
				<td style="text-align:center;width:100px"><a target="_blank"  href="./abc.php?x=<?php echo $row1[2];?>" id="<?php echo $row1[0];?>" onclick="Details(id)"><?php echo $row1[0];?></a></td>
				<td style="text-align:center"><?php echo $row1[1];?> </td>
			</tr><?php
			$i++;
		}?>
		<tr>
			<td colspan=3 style="text-align:center"><input type="hidden" value="<?php echo $dept; ?>" name="dept" >
			<input type="Submit" value="DELETE" >
		</tr>
</table>

</form>
</table>
</body>
</html>
<?php } 
else
{
	?><pre> <?php echo "You dont have permissions ".$_SESSION['username']; ?> </pre>
<?php } ?>
