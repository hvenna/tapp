<?php 
include_once "error.php";
include_once "allpages.php";
include_once("connecttodb.php"); ?>
<?php
if(!$_SESSION['username'])
	{
		?><html><script>
		window.location.assign("./login.php");</script></html> 
		<?php
	}
else
{
$sql="SELECT * FROM `list` WHERE `type`=0 ORDER BY `DOC` DESC";
$result=mysql_query($sql);
?>
<table style="width:350px" align="center"><tr><td align="center">
<div class="table_css" >
	<table  align="center">
		<tr>
			<td style="text-align:center;width:350px">Timed Quiz List</td>
		</tr>
	</table>

	<form  method="POST" action="runquiz.php">
				<table  align="center">
				<tr>
					<td style="width:20px">Select</td>
					<td style="width:20px">Sno</td>
					<td style="width:120px">Name</td>
					<td style="width:20px">Type</td>
					<td style="width:150px">Description </td>
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
				
				<td><input type="radio" required name="quizname" value="<?php echo $row[0];?>"></td>
				<td><?php echo $count;?></td>
				<td><?php echo $row[0];?>  <?php if($diff<=10) { ?> <img src="./pics/new_old.gif" alt="NEW"><?php } ?></td>
				<td><?php echo "Practice Test";?> </td>
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