<html>
<link href="./css/cssforquiz_file.css" rel="stylesheet" type="text/css">
<script>
function Loaded()
	{
		document.getElementById('Loading').style.display = "none";
		document.getElementById('Loaded').style.display = "block";
		
	}
</script>
<body onload="Loaded()">
<div id="Loading" class="Loading" style="display:block;" >
	<pre> Loading Please Wait. . . </pre>
	<img src="./pics/loader.gif" alt="LOADING. . . " >
</div>
<div id="Loaded" style="display:none;" >
<?php
	include_once("db_mysql_connect.php");
	include_once "error.php";
	include_once "allpages.php";
	$quizname=$_POST['quizname'];
	unset($_SESSION["start_time"]);
	unset($_SESSION["quizname"]);
	$query="SELECT count(*) FROM `$quizname` ";
	$result=mysqli_query($conn,$query);		
	$row = mysqli_fetch_array($result);
	$count=$row[0];
	$marks=0;
	for($i=1;$i<=$count;$i++)
	{ 
		$query="SELECT * FROM `$quizname` where `qid`='$i' ";
		$result=mysqli_query($conn,$query);		
		$row = mysqli_fetch_array($result);
		$answer="answer".$i;
		if($row[6]==$_POST[$answer])
		{
			$marks++;
		}
			
	}
	?>
	<div class="reults" >
	<table align="center">
	<tr>
		<td colspan="2"> RESULTS </td>
	</tr>
	<tr>
		<td> Total Questions  </td>
		<td> <?php echo $count; ?> </td>
	</tr>
	<tr>
		<td> Correct Answers  </td>
		<td> <?php echo $marks; ?> </td>
	</tr>
	<tr>
		<td> Wrong Answers </td>
		<td> <?php echo $count-$marks; ?> </td>
	</tr>
	<tr>
		<td style="font-family:verdana;font-size:30pt;" > Percentage </td>
		<td id="per" style="color:#e53b35;font-family:verdana;font-size:30pt;" > <?php 
		$percentage=round($marks*100/$count,2);
		echo $percentage; ?>% </td>
		<?php if(($marks*100/$count)<40) { ?>
		<script>document.getElementById("per").style.color="#e8473e";</script> <?php } 
		else if (($marks*100/$count)>40 && ($marks*100/$count)<70) { ?>
		<script>document.getElementById("per").style.color="#f4900c";</script> <?php } 
		else { ?>
		<script>document.getElementById("per").style.color="#91b009";</script> <?php } ?>
		
	</tr>
	<tr>
		<td  colspan="2" style="font-family:verdana;font-size:20pt;" >
	<?php if(($marks*100/$count)<=40) { ?>
		Your performance is poor!! We suggest you to take this exam again!!<?php } 
		else if (($marks*100/$count)>40 && ($marks*100/$count)<=60) { ?>
		Your performance is average!! It is better you to take this exam again!! <?php } 
		else if (($marks*100/$count)>60 && ($marks*100/$count)<=70) { ?>
		Your performance is good!! Try harder a bit to gain good percentage!! <?php } 
		else if (($marks*100/$count)>70 && ($marks*100/$count)<=80) { ?>
		Your performance is very good!! We are satisfied!! <?php } 
		else { ?>
		Your performance is Excellent!! <?php } ?>
		</td>
	</tr>
	</table>
	
	<?php 
	$date=date("Y-m-d");
	if(($_SESSION['prev']=="timed")||($_SESSION['prev']=="nontimed"))
	{
		unset($_SESSION['prev']);
		$sql="INSERT INTO `attempted students`(`username`, `quiz name`, `date`, `percentage`) 
		VALUES ('$_SESSION[username]','$quizname','$date','$percentage') ";
		$resl=mysqli_query($conn,$sql);
	}
	
$sql="SELECT * FROM `$quizname` ";
$resl=mysqli_query($conn,$sql);
?>
<br>
</div>
<br>
<h1 align="center">ANSWERS </h1>
<br>
<div class="reults" style="text-align:center">
<?php

while($res = mysqli_fetch_array($resl))
{ ?>

	<a name="<?php echo $res[0]?>"></a>
    <table align="center" >
		<tr>
            <td><?php echo $res[0]?>. <?php echo $res[1]?></td>
        </tr>
        <tr>
             <td id="ans1<?php echo $res[0]?>">

				<?php echo $res[2]?>
			</td>
        </tr>
        <tr>
            <td id="ans2<?php echo $res[0]?>">

				<?php echo $res[3]?>
			</td>
        </tr>
        <tr>
             <td id="ans3<?php echo $res[0]?>">

				<?php echo $res[4]?>
			</td>
			
        </tr>
		<tr>
             <td id="ans4<?php echo $res[0]?>">
				<?php echo $res[5]?>
			</td>
        </tr>
        
    </table> 
<br>
<?php } ?>
</div>
</body>
<?php
for($i=1;$i<=$count;$i++)
{ 
	$query="SELECT * FROM `$quizname` where `qid`='$i' ";
	$result=mysqli_query($conn,$query);		
	$row = mysqli_fetch_array($result);
	$answer="answer".$i;
		if($row[6]=='A')
		{
			$ans="ans1".$i;
	?>
			<script>document.getElementById('<?php echo $ans ?>').style.backgroundColor="#91b009";</script>
		<?php }
		if($row[6]=='B')
		{
			$ans="ans2".$i;
	?>
			<script>document.getElementById('<?php echo $ans ?>').style.backgroundColor="#91b009";</script>
		<?php }
		if($row[6]=='C')
		{
			$ans="ans3".$i;
	?>
			<script>document.getElementById('<?php echo $ans ?>').style.backgroundColor="#91b009";</script>
		<?php }
		if($row[6]=='D')
		{
			$ans="ans4".$i;
	?>
			<script>document.getElementById('<?php echo $ans ?>').style.backgroundColor="#91b009";</script>
		<?php }
	if($row[6]!=$_POST[$answer])
	{
		if($_POST[$answer]=='A')
		{
			$ans="ans1".$i;
	?>
			<script>document.getElementById('<?php echo $ans ?>').style.backgroundColor="#e8473e";</script>
		<?php }
		if($_POST[$answer]=='B')
		{
			$ans="ans2".$i;
	?>
			<script>document.getElementById('<?php echo $ans ?>').style.backgroundColor="#e8473e";</script>
		<?php }
		if($_POST[$answer]=='C')
		{
			$ans="ans3".$i;
	?>
			<script>document.getElementById('<?php echo $ans ?>').style.backgroundColor="#e8473e";</script>
		<?php }
		if($_POST[$answer]=='D')
		{
			$ans="ans4".$i;
	?>
			<script>document.getElementById('<?php echo $ans ?>').style.backgroundColor="#e8473e";</script>
		<?php }
	}
		
}	

?>	
</div>
	
