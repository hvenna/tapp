<?php 
include_once "error.php";
include_once "allpages.php";
include("connecttodb.php"); ?>
<?php
if(!$_SESSION['username'])
	{
		?><html><script>
		window.location.assign("./login.php");</script></html> 
		<?php
	}
else
{
$sql="SELECT * FROM list WHERE `type`=1 ORDER BY `DOC` DESC";
$result=mysql_query($sql);
?>
<script>
	function startquiz() {
    var radios = document.getElementsByName("quizname");
	var flag=0;
    for (var i = 0; i < radios.length; i++) 
	{       
        if (radios[i].checked) 
		{
            flag=1;
			var x=radios[i].value;
            var z=radios[i].value;
			var note="Please remember these points before you start the quiz."; 
			note=note+"1. Allow pop-ups , because your quiz starts in a new window.";
			note=note+"2. Once a quiz starts, you cannot start another one.";
			note=note+"3.";
			alert("Please remember these points before you start the quiz.\n1. Allow pop-ups , because your quiz starts in a new window.\n2. Once a quiz starts, you cannot start another one. \n3. Do not close the window without submitting the quiz. ");
            break;
        }
    }
	if(flag==0)
	{
		alert("Choose an option!!");
		exit;
	}
	var x="./timedrunquiz.php?y="+x;
	var win=window.open(x,z,"fullscreen=yes,scrollbars=yes");
	win.focus();
}
</script>
<table style="width:350px" align="center"><tr><td align="center">
<div class="table_css" >
	<table  align="center">
		<tr>
			<td style="text-align:center;width:350px">Quiz List</td>
		</tr>
	</table>
	<form method="POST" action="timedrunquiz.php">
				<table align="center">
				<tr>
					<td style="width:20px">Select</td>
					<td style="width:20px">S.No</td>
					<td style="width:120px">Name</td>
					<td style="width:20px">Type</td>
					<td style="width:20px">Time(mins) </td>
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
				
				<td style="width:20px"><input required type="radio" name="quizname" value="<?php echo $row[0];?>"></td>
				<td style="width:20px"><?php echo $count;?></td>
				<td style="width:120px"><?php echo strtoupper($row[0]);?><?php if($diff<=10) { ?> <img src="./pics/new_old.gif" alt="NEW"><?php } ?></td>
				<td style="width:20px"><?php echo "Real Test"; ?></td>
				<td style="width:20px;"><?php echo $row[3]; ?></td>
				<td style="width:150px;text-align:left;"><?php echo $row[2];?></td>
			</tr><?php
			$count++;
		}?>
<tr colspan="7"><td colspan="7" align="center"><input type="button" value="Take Quiz" onclick="startquiz()" ></td></tr>
</table>

</td></tr></table>
</form>
</body>
</html>
<?php } ?>