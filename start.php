<?php 
include_once "error.php";
include_once "allpages.php";
include("db_mysql_connect.php"); ?>
<?php
if(!$_SESSION['username'])
	{
		?><html><script>
		window.location.assign("./login.php");</script></html> 
		<?php
	}
else
{
$sql="SELECT * FROM list WHERE `type`=1";
$result=mysql_query($sql);
?>
<table  align="center"><tr><td align="center">
	<pre>Practice Test List</pre>
	<form method="POST" action="quiz1.php">
				<table width="300" border="2" align="center">
				<tr>
					<td>Select</td>
					<td>Sno</td>
					<td>Name</td>
					<td>Type</td>
					<td>Description </td>
				</tr>
	<?php
		$count=1;
		$date=date("Y-m-d");
		$datetime1 = date_create($date);
		while($row = mysql_fetch_array($result))
		{
			$DOC=$row['DOC'];
			$datetime2 = date_create($DOC);
			$interval = date_diff($datetime1, $datetime2);		
			$diff=$interval->format('%a');
			?>
			<tr>
				
				<td><input type="radio" name="quizname" value="<?php echo $row[0];?>"></td>
				<td><?php echo $count;?></td>
				<td><?php echo $row[0];?>  <?php if($diff<=10) { ?> <img src="./pics/new_old.gif" alt="NEW"><?php } ?></td>
				<td><?php echo "NonTimed";?> </td>
				<td><?php echo $row[2];?> </td>
			</tr><?php
			$count++;
		}?>
<tr colspan="7"><td colspan="7" align="center"><input type="submit" value="Take Quiz" ></td></tr>
</table>

</td></tr></table>
</form>
</body>
</html>
<?php } ?>