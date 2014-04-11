<?php
include_once "error.php";
include_once "allpages.php";
include_once "connecttodb.php";
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
	<?php 	?>
<html>
<body>
<?php
	$query="SHOW tables from quiz";
	$result=mysql_query($query);		
	
	
	if(!$result)
	{
		print("Erro- no query");
		$error=mysql_error();
		print"<p>".$error."<p>";
		exit;
	}
	
	$count=1;
	$i=1;
?>
	
	<table align="center"><tr><td align="center">
	<div class="table_css" >
	<table  align="center">
		<tr>
			<td style="text-align:center;width:300px">QUIZ</td>
		</tr>
	</table>
	<form method="POST" action="deleteexamsucc.php">
				<table width="300" align="center">
				<tr>
					<td style="text-align:center;width:30px"> CHECK </td>
					<td>Name </td>
					
				</tr>
	<?php
		while($row = mysql_fetch_array($result))
		{
			if($row[0]!='list' && $row[0]!='attempted students' ){?>
			<tr>
				<td style="text-align:center;width:30px"><input type="checkbox" name="<?php echo $row[0];?>"></td>
				<td><?php echo $row[0];?></td>
				
			</tr><?php }
		}?>
		<tr>
			<td colspan=2 ><input type="Submit" value="DELETE" ></td>
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
