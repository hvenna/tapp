<?php
include_once "error.php";
include_once "allpages.php";
require_once("connecttodb.php");
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
	<?php $dept=$_POST['Department'];	?>
<html>
<style>
	.listofquiz {
	margin:0px;padding:0px;
	width:100%;
	border:1px solid #000000;
	
	-moz-border-radius-bottomleft:0px;
	-webkit-border-bottom-left-radius:0px;
	border-bottom-left-radius:0px;
	
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
	
	-moz-border-radius-topright:0px;
	-webkit-border-top-right-radius:0px;
	border-top-right-radius:0px;
	
	-moz-border-radius-topleft:0px;
	-webkit-border-top-left-radius:0px;
	border-top-left-radius:0px;
}.listofquiz table{
	width:100%;
	height:100%;
	margin:0px;padding:0px;
}.listofquiz tr:last-child td:last-child {
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
}
.listofquiz table tr:first-child td:first-child {
	-moz-border-radius-topleft:0px;
	-webkit-border-top-left-radius:0px;
	border-top-left-radius:0px;
}
.listofquiz table tr:first-child td:last-child {
	-moz-border-radius-topright:0px;
	-webkit-border-top-right-radius:0px;
	border-top-right-radius:0px;
}.listofquiz tr:last-child td:first-child{
	-moz-border-radius-bottomleft:0px;
	-webkit-border-bottom-left-radius:0px;
	border-bottom-left-radius:0px;
}.listofquiz tr:hover td{
	
}
.listofquiz tr:nth-child(odd){ background-color:#ffaa56; }
.listofquiz tr:nth-child(even)    { background-color:#ffffff; }.listofquiz td{
	vertical-align:middle;
	
	
	border:1px solid #000000;
	border-width:0px 1px 1px 0px;
	text-align:center;
	padding:8px;
	font-size:16px;
	font-family:Georgia;
	font-weight:normal;
	color:#000000;
}.listofquiz tr:last-child td{
	border-width:0px 1px 0px 0px;
}.listofquiz tr td:last-child{
	border-width:0px 0px 1px 0px;
}.listofquiz tr:last-child td:last-child{
	border-width:0px 0px 0px 0px;
}
.listofquiz tr:first-child td{
		background:-o-linear-gradient(bottom, #93b709 5%, #96c00a 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #93b709), color-stop(1, #96c00a) );
	background:-moz-linear-gradient( center top, #93b709 5%, #96c00a 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#93b709", endColorstr="#96c00a");	background: -o-linear-gradient(top,#93b709,96c00a);

	background-color:#93b709;
	border:0px solid #000000;
	text-align:center;
	border-width:0px 0px 1px 1px;
	font-size:19px;
	font-family:Verdana;
	font-weight:normal;
	color:#ffffff;
}
.listofquiz tr:first-child:hover td{
	background:-o-linear-gradient(bottom, #93b709 5%, #96c00a 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #93b709), color-stop(1, #96c00a) );
	background:-moz-linear-gradient( center top, #93b709 5%, #96c00a 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#93b709", endColorstr="#96c00a");	background: -o-linear-gradient(top,#93b709,96c00a);

	background-color:#93b709;
}
.listofquiz tr:first-child td:first-child{
	border-width:0px 0px 1px 0px;
}
.listofquiz tr:first-child td:last-child{
	border-width:0px 0px 1px 1px;
}
</style>
<body>
<?php
	
	$query="SELECT * FROM `list` ORDER BY `DOC` DESC";
	$result=mysql_query($query);		
	$query="SELECT count(*) FROM `list` ORDER BY `DOC` DESC";
	$result1=mysql_query($query);		
	if(!$result)
	{
		print("Erro- no query");
		$error=mysql_error();
		print"<p>".$error."<p>";
		exit;
	}
	$row = mysql_fetch_array($result1);
	$count=1;
	$i=1;
?>
	
	<table   align="center"><tr><td align="center">
	<div class="listofquiz" >
	<form method="POST">
				<table  align="center">
				<tr>
					<td style="width:20px">Sno</td>
					<td  style="width:150px">Name</td>
					<td  style="width:70px">Type</td>
					<td  style="width:20px">Time(mins) </td>
					<td  style="width:295px;">Description </td>
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
			$diff=$interval->format('%a'); ?>
			<tr>
				<td  style="width:20px"><?php echo $count;?></td>
				<td  style="width:150px"><?php echo $row[0];?>  <?php if($diff<=10) { ?> <img src="./pics/new_old.gif" alt="NEW"><?php } ?></td>
				<td  style="width:70px"><?php 
				if($row[1]=='1')
					echo "Real Test";
				else
					echo "Practice Test";?> </td>
				<td  style="width:20px"><?php 
				if($row[1]=='1')
					echo $row[3];
				else
					echo "-";?> </td>	
				<td  style="width:195px;text-align:left"><?php echo $row[2];?></td>
			</tr><?php
			$count++;
		}?>
</table>

</td></tr></table>
</form>

</body>
</html>
<?php } 
else
{
	?><pre> <?php echo "You dont have permissions ".$_SESSION['username']; ?> </pre>
<?php } ?>
