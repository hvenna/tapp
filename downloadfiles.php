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
else
{
	?><div id='content'><pre class='loginv'><?php 
	echo "Welcome,".$_SESSION['username']; ?></pre></div>				
<?php }?>
<?php
	$dept=$_GET['x'];
	if($dept=='')
		$dept=$_POST['Materials'];
	if($dept=='') {
		?><pre>
		
		Choose any option!! </pre>
		
<?php  exit;} 
?> 
<html>
<body onload="loaded_succ()">
<?php
	
	$query="SELECT `Path`, `Name`,`DOC` FROM `listoffiles` WHERE `Dept`='$dept' ORDER BY `DOC` DESC";
	$result=mysqli_query($con,$query);		
	if(!$result)
	{
		print("Erro- no query");
		$error=mysql_error();
		print"<p>".$error."<p>";
		exit;
	}
	$count=1;
	$i=0;
?>
	
	<table  align="center"><tr><td align="center">
	<div class="table_css" >
	<table style="text-align:center;" align="center">
		<tr>
			<td style="text-align:center;">List of files in <?php echo $dept;?></td>
		</tr>
	</table>
	
	<?php
		$date=date("Y-m-d");
		$datetime1 = date_create($date);
		while($row = mysqli_fetch_array($result))
		{
			if($i==0){
			?>
			<table  align="center">
			<tr >
				<td STYLE="width:20px"> SNO </td>
				<td colspan=2 style="text-align:center;width:100px">FILE </td>
			</tr>
			<?php $i=1; }
			$path=$row['Path'];
			$name=$row['Name'];
			$DOC=$row['DOC'];
			$datetime2 = date_create($DOC);
			$interval = date_diff($datetime1, $datetime2);		
			$diff=$interval->format('%a');

			?>
			<tr  id="<?php echo $count; ?>"  >
				<td STYLE="width:40px" ><?php echo $count;?></td>
				<td style="text-align:center;width:80px;border-right:0px"><a href="<?php echo $path ?>" target="_blank"><?php echo $name;?> </a></td>
				<td style="text-align:center;width:20px"><?php if($diff<=10) { ?> <img src="./pics/new_old.gif" alt="NEW"><?php } ?></td>
			</tr><?php
			$count=$count+1;
		}
		if($i==0)
		{
			?> <pre>There are no files in <?php echo $dept;?></pre>
			
		<?php exit; } ?>
		
</table>
</table>
</body>
</html>