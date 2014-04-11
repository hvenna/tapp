<?php include_once("db_mysql_connect.php");
include_once "error.php";
include_once "allpages.php";
?>
<?php
// Turn off all error reporting
error_reporting(0);
?>
<pre>Online Quiz</pre>
<br />
<?php include_once("db_mysql_connect.php");?>
<form name="quiz" method="post" action="quiznt.php">
<?php if($_POST["do"]=="finish")
{

$totalquestions=$_POST["totalquestions"];
$file=$_POST["file"];
$rans=$_POST["rans"];
$tq=$_POST["tq"];
$end=$_POST["end"];
$startposition=$_POST["startposition"];
echo "<table class='quiz' cellpadding='5px' align='center' style='border:1px solid silver' width='80%' bgcolor='#92b209'>";
echo "<tr><td class='quiz'>Total Questions In Quiz</td><td><pre class='quiz'>",$totalquestions,"</td><tr>";
echo "<tr><td class='quiz'>Total Questions Attempted</td><td><pre class='quiz'>",$tq,"</td><tr>";
echo "<tr><td class='quiz'>Correct Answer(s)</td><td><pre class='quiz'>",$rans,"</td></tr>";
echo "<tr><td class='quiz'>Wrong Answer(s)</td><td><pre class='quiz'>",$totalquestions-$rans,"</td></tr>";
echo "<tr><td class='quiz'>Correct Answers' Percentage</td><td><pre class='quiz'>",$rans/$totalquestions*100,"%</td></tr>";
echo "<tr><td class='quiz'>Wrong Answers' Percentage</td><td><pre class='quiz'>",($totalquestions-$rans)/$totalquestions*100,"%</td></tr>";
echo "</table><br><br>";
$query="select * from $file where qid<=$totalquestions and qid>=1";?>
<table align='center' width="800">
<tr><td colspan="4" align="center" >Online Quiz Test Questions</td></tr>
<tr>
		<td width="400" colspan="4"><hr></td>
	</tr>
<?php 
$result=mysql_query($query);
while ($row = mysql_fetch_array($result)) 
{ ?>
	<tr>
		<td width="800" colspan="4"><?php echo "Q".$row[0]."  ".$row[1]; ?></td>
	</tr>
	<tr>
		<td width="200"> <?php echo "A. ".$row[2]; ?></td>
		<td width="200"> <?php echo "B. ".$row[3]; ?></td>
		<td width="200"> <?php echo "C. ".$row[4]; ?></td>
		<td width="200"> <?php echo "D. ".$row[5]; ?></td>
	</tr>
	<tr>
		<td width="800" colspan="4"><?php echo "Correct option is ".strtoupper($row[6]); ?></td>
	</tr>
	<tr>
		<td width="400" colspan="4"><hr></td>
	</tr>
	
	
<?php }

echo "</table>";
echo "<p align='right'><a href='#' onclick='window.print()'>Print</a></p>";
echo "<div style='visibility:hidden;display:none'>";

exit();
}
?>

<table cellpadding="5px" width="100%" style="border:1px solid silver">
<?php
if($_POST["flag"]!="SET"){
$file=$_POST["quizname"];
$sql="SELECT * FROM $file";
$r1=mysql_query($sql);
$totalquestions=mysql_num_rows($r1);
}
$start=$_POST["start"];
$s=$_POST["startposition"];
if($start==NULL)
{
$start=$_GET["start"];
$s=$_GET["start"];
}
if($_POST["flag"]=="SET"){
$totalquestions=$_POST["totalquestions"];
$file=$_POST["file"];}
$useropt=$_POST["useropt"];
$qid=$_POST["qid"];
$rans=$_POST["rans"];
$name=$_POST["name"];
$totalquestion=$_POST["totalquestion"];
if($start==NULL)
$query="select * from $file where qid=1";
else
{
$query="select * from $file where qid=$start";
}
$result=mysql_query($query);
while ($row = mysql_fetch_array($result)) {?>
	<tr><td><?PHP echo "Q".$row[0].". ".$row[1]; ?></td></tr>
	<tr><td><input type='radio' name='useropt' value='a'/><?php echo $row[2];?></td>
	<tr><td><input type='radio' name='useropt' value='b'/><?php echo $row[3];?></td>
	<tr><td><input type='radio' name='useropt' value='c'/><?php echo $row[4];?></td>
	<tr><td><input type='radio' name='useropt' value='d'/><?php echo $row[5];?></td>
	
	</tr>
	<tr><td align='right'><input type='hidden' name='name' value='<?php echo $name; ?>'>
	<input type='hidden' name='file' value='<?php echo $file; ?>'>
	<input type='hidden' name='flag' value='SET'>
	<input type='hidden' name='start' value='<?php echo $row[0]+1; ?>'>
	<input type='hidden' name='qid' value='<?php echo $row[0]; ?>'>
	<input type='hidden' name='startposition' value='<?php echo $s; ?>'>
	<input type='submit' value='Next Question'>
	<input type='hidden' name='totalquestion' value='<?php echo $totalquestion+1; ?>'>
	<input type='hidden' name='totalquestions' value='<?php echo $totalquestions; ?>'>
	</form></td></tr>
<?php }
echo "<tr><td colspan='4'>";
$query="select woptcode from $file where qid='$qid'";
$result=mysql_query($query);
while ($row = mysql_fetch_array($result)) {
if(strcmp($row[0],$useropt)==0)
{
echo "<input type='hidden' name='rans' value='",$rans+1,"'>";
$rans=$rans+1;
}
else
echo "<input type='hidden' name='rans' value='",$rans,"'>";
}
echo "</td></tr>";
?>
</table>
<center>
<br />
<br />
</form>
<form method="post" action="quiznt.php" name="finish">
<input type="hidden" name="do" value="finish" />
<input type="hidden" name="totalquestions" value="<?php echo $totalquestions?>" />
<input type="hidden" name="file" value="<?php echo $file;?>" />
<input type="hidden" name="rans" value="<?php echo $rans;?>" />
<input type="hidden" name="name" value="<?php echo $name;?>" />
<input type="hidden" name="tq" value="<?php echo $totalquestion;?>" />
<input type="hidden" name="end" value="<?php echo $start-1;?>" />
<input type="hidden" name="startposition" value="<?php echo $s;?>" />
<input type="submit" value="Finish Online Test" />
</form>