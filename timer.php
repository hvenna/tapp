

<?php
session_start();

$minutes = $time; // Enter minutes
$seconds = 0; // Enter seconds
$time_limit = ($minutes * 60) + $seconds + 1; // Convert total time into seconds
if(!isset($_SESSION["start_time"])){$_SESSION["start_time"] = mktime(date(G),date(i),date(s),date(m),date(d),date(Y)) + $time_limit;} // Add $time_limit (total time) to start time. And store into session variable.
?>
<html>
<head>
<style>
#txt {
border:2px solid green;
font-family:verdana;
font-size:16pt;
font-weight:bold;
background: green;
width:70px;
text-align:center;
color:#000000;
}
</style>
</head>
<body>
<input id="txt" readonly>
<script>
var ct = setInterval("calculate_time()",100); // Start clock.
setTimeOut("submitForm()", <?php echo $time_limit; ?>);
function submitForm()
{
		document.finish.submit();

	
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
</body>
</html>