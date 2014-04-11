<?php
include_once("db_mysql_connect.php");
include_once "error.php";
include_once "allpages.php";

?>

<?php
	session_start();
	if($_SESSION['username']!='admin@tp')
	{
		?><html><script>
		window.location.assign("./adminlogin.php");</script></html> 
		<?php
	}
	else
	{
		?><div id='content'><pre class='loginv'><?php 
					echo "Welcome,".$_SESSION['username']; ?></pre></div>
				
	<?php }

?>
	<html>
	<body>
	<?php
		
		$query="SELECT * FROM `attempted students` ORDER BY `$_POST[require]` DESC";
		$result=mysqli_query($conn,$query);
		
		if(!$result)
		{
			print("Erro- no query");
			$error=mysql_error();
			print"<p>".$error."<p>";
			exit;
		}
		?>
		
		<table  align="center"><tr><td align="center">
		<div class="table_css" >
	<table  align="center">
		<tr>
			<td style="text-align:center;width:300px">Till date, these students have answered the quizzes and their results are as follows(Sorted by <?php echo $_POST['require'] ?>)</td>
		</tr>
	</table>
		<?php
		
		$count=1;
		$i=0;
		while($row = mysqli_fetch_array($result))
		{
			if($i==0){
			?>
			
			<table align="center">
				<tr>
					<?php if($_POST['require']=='date'){?>
						<td style="width:50px;"> SNO</td>
					<?php }
					else { ?>
						<td style="width:50px;"> RANK</td>
					<?php }?>
					
					<td style="width:150px;"> REGD NO </td>
					<td style="width:150px;"> QUIZ NAME </td>
					<td style="width:150px;"> PERCENTAGE </td>
					<td style="width:150px;">DATE </td>
				</tr>
				
			<?php }
			$i=1;
			?>
			<tr>
				<td style="width:50px;"><?php echo $count;?></td>
				<td style="width:150px;"><?php echo $row[0];?></td>
				<td style="width:150px;"><?php echo $row[1];?></td>
				<td style="width:150px;;"><?php echo $row[3];?></td>
				<td style="width:150px;"><?php echo $row[2];?></td>
			</tr><?php
			$count=$count+1;
		}
		if($i==0)
		{
			?> <pre>There are no Results.</pre>
		<?php }

	?>
	<tr></tr>
</table>
</html>
</body>