<html>
<SCRIPT TYPE="text/javascript">
	function clickIE() 
	{
		if (document.all) 
		{
			avoid_redirection();
			return false;
		}
	}
	function submitmet()
	{
		var r=confirm("Do you Really want to submit?")
		if (r==true)
		{
			document.getElementById("submit").submit();
			
		}
		
	}
	window.onunload=function(){alert("jbkjsf");};
	function clickNS(e) 
	{
		if(document.layers||(document.getElementById&&!document.all)) 
		{
			if (e.which==2||e.which==3) 
			{
				avoid_redirection();
				return false;
			}
		}
	}
	if (document.layers)
	{
		document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;
	}
	else
	{
		document.onmouseup=clickNS;document.oncontextmenu=clickIE;
	}
	document.oncontextmenu=new Function("return false")

</SCRIPT>
<link href="./css/cssforquiz_file.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="./script/quizscripts.js"></script>
<?php 
session_start();
$_SESSION['request_url']=$_SERVER['REQUEST_URI'];
if(!$_SESSION['username'] || $_SESSION['username']=='admin@tp' )
	{
		?><html><script>
		window.location.assign("./login.php");</script></html> 
		<?php
		exit;
	}
?>
<style>
#txt {
border:0px solid green;
font-family:verdana;
font-size:15pt;
font-weight:bold;
width:100%;
text-align:center;
color:#e53b35;
}
</style>
</html>
<div id="No redirections" onclick="avoid_redirection(); return false;">
<?php
include_once("db_mysql_connect.php");
include_once "error.php";
include_once "allpages.php";
?>
</div>
<pre id="test" style="font-size:15px;font-family:Arial;color:#ffffff;">  Once Test starts, submit the test. Do not Right Click or navigate to other pages of website...  </pre>
<?php
$quizname=$_GET["y"];
$query="select `time` from list where `name`='$quizname'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
$minutes=$row[0];
// Enter minutes // Enter seconds
$time_limit = ($minutes * 60) ; // Convert total time into seconds
if($_SESSION["start_time"] || $_SESSION["quizname"])
{
	if($_SESSION["quizname"]==$quizname)
	{}
	else
	{
		echo "You have already started an exam!! You can't answer this until you submit the previous exam!!!<br>";
		echo "If you are seeing this message repeatedly, please logout and login again!!";
		exit;
	}
	
}
else
{
	$_SESSION["start_time"] = mktime(date(G),date(i),date(s),date(m),date(d),date(Y)) + $time_limit; // Add $time_limit (total time) to start time. And store into session variable.
	$_SESSION["quizname"]=$quizname;
}
	?>

<?php
$file=$_GET["y"];
$query="SELECT count(*) FROM `$file` ";
$result=mysqli_query($conn,$query);		
$row = mysqli_fetch_array($result);
$count=$row[0];
?>
<body onload="StartTimer()">
<div id="Loading" class="Loading" style="display:block;" >
	<pre> Loading Please Wait. . . </pre>
	<img src="./pics/loader.gif" alt="LOADING. . . " >
</div>
<div id="Loaded" style="display:none;" >
<form id="submit" method="POSt" action="result.php" >
<input type="hidden" value="<?php echo $file ; ?>" name="quizname">
<table  border=1 style="position:fixed;left:900px;top:250px"> 
<tr>
	<td style="width:250px;background-color:#ffeedd;">
	<input id="txt" readonly value="<?php echo $minutes; ?>:00">
<script>
var ct;
function StartTimer() 
{
document.getElementById('Loading').style.display = "none";
document.getElementById('Loaded').style.display = "block";
document.getElementById('1').style.display = "block";
var divs = document.getElementById('allpages');
var cells = divs.getElementsByTagName("a"); 
for (var i = 0; i < cells.length; i++) 
	cells[i].removeAttribute("href");
document.getElementById('qustn1').style.backgroundColor="#dd6e23";
setInterval("calculate_time()",1000); // Start clock.
setTimeOut("submitForm()", <?php echo $time_limit; ?>);


}

function submitForm()
{
	document.getElementById("submit").submit();
}
function calculate_time()
{
 var end_time = "<?php echo $_SESSION["start_time"]; ?>"; // Get end time from session variable (total time in seconds).
 var dt = new Date(); // Create date object.
 var time_stamp = dt.getTime()/1000; // Get current minutes (converted to seconds).
 var total_time = end_time - Math.round(time_stamp); // Subtract current seconds from total seconds to get seconds remaining.
 var mins = Math.floor(total_time / 60); // Extract minutes from seconds remaining.
 var secs = total_time - (mins * 60); // Extract remainder seconds if any.
 if(secs < 10){secs = "0" + secs;} // Check if seconds are less than 10 and add a 0 in front.
 document.getElementById("txt").value = mins + ":" + secs; // Display remaining minutes and seconds.
 // Check for end of time, stop clock and display message.
 if(mins <= 0)
 {
  if(secs <= 0 || mins < 0)
  {
   clearInterval(ct);
   document.getElementById("txt").value = "0:00";
   submitForm();
  }
  }
 }
</script>
</input>
</td>
</tr>
<tr>
	<td style="width:250px;background-color:#ffeedd;" ><input  class="myButton" type="button" onclick="submitme()" value="SUBMIT EXAM"></td>
</tr>
<tr>
<td style="width:250px;height:100px">
<div style="overflow-y:auto;height:110px;width:350px">    
<table border=1>    
<?php
for($i=1;$i<=$count;$i++)
{ 
	if($i==1 || $i%5==1)
	{ ?>
		<tr>
	<?php }
	?>
	<td id="qustn<?php echo  $i; ?>" align="center" style="width:50px" onclick="changecolor('<?php echo  $i; ?>')" >
		<a href="#<?php echo  $i; ?>" ><?php echo  $i; ?> </a> 
		
	</td>
<?php 
	if($i%5==0||$i==$count)
	{ ?>
		</tr>
	<?php }
	}
?>
</table>
</div>
</td></tr>
<tr>
	<td style="width:250px;background-color:#dbd6d2;" ><a >NOT YET VIEWED</a></td>
</tr>
<tr>
	<td style="width:250px;background-color:#dd6e23;" ><a>VIEWED BUT NOT ANSWERED</a></td>
</tr>
<tr>
	<td style="width:250px;background-color:#91b009;" ><a>ANSWERED</a></td>
</tr>
</table>

<?php 
$sql="SELECT * FROM `$file` ";
$resl=mysqli_query($conn,$sql);
?>
<br>
<div class="quizquestion" style="position:fixed;left:0px;top:250px">
<?php
while($res = mysqli_fetch_array($resl))
{ ?>
	<div style="display:none;" id="<?php echo $res[0];?>"  >
	<a   name="<?php echo $res[0];?>"></a>
    <table border=0 align="center" >
		<tr>
            <td><?php echo $res[0]?>. <?php echo $res[1]?></td>
        </tr>
        <tr>
             <td>
				<input type="radio" name="<?php echo $res[0]?>" id="ans1<?php echo $res[0]?>" value="A" onclick="answered(id)">
				<?php echo $res[2]?>
			</td>
        </tr>
        <tr>
            <td>
				<input type="radio" name="<?php echo $res[0]?>" id="ans2<?php echo $res[0]?>" value="B" onclick="answered(id)">
				<?php echo $res[3]?>
			</td>
        </tr>
        <tr>
             <td>
		
				<input type="radio" name="<?php echo $res[0]?>" id="ans3<?php echo $res[0]?>" value="C" onclick="answered(id)">
				<?php echo $res[4]?>
			</td>
			
        </tr>
		<tr>
             <td>
				
				<input type="radio" name="<?php echo $res[0]?>" id="ans4<?php echo $res[0]?>" value="D" onclick="answered(id)">
				<?php echo $res[5]?>
			</td>
        </tr>
		<tr>
             <td>
				<input class="nextbutton" type="button" value="NEXT>>" onclick="changecolor(<?php echo $res[0]+1; ?>);">
			</td>
			
        </tr>
        
    </table>
	<input type="hidden" name="answer<?php echo  $res[0]; ?>" id="answer<?php echo  $res[0]; ?>" value="" >
	</div>
<?php } 
$_SESSION['prev']="timed"
?>
</div>
</div>
</form>

            




