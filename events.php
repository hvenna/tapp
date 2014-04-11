
<?php
require_once "error.php";
require_once("db_mysql_connect.php");
require_once "allpages.php";
require_once "dbconnect.php";

$query = "SELECT `Tphome`,`Placement`  FROM `tpce`";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_row($result);

$query1 = "SELECT `path`  FROM `listofimages`";
$result1 = mysqli_query($con, $query1);

$query2 = "SHOW TABLES FROM `trainingandplacement`";
$result2 = mysqli_query($con, $query2);

$query4 = "SELECT *  FROM `list`";
$result4 = mysqli_query($conn, $query4);

$query="SELECT `events`  FROM `tpce`";
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_row($result);
?>
<script>
  function Stopspeed(x)
  {
    if (x == 'set')
      document.getElementById('latest').scrollAmount = '0';
    else
      document.getElementById('latest').scrollAmount = '3';
  }

</script>
<style>
  .about-us-text {
    color:#333;
  }
</style>
<?php echo $row[0]; ?>
