<?php
include "allpages.php";
include_once "dbconnect.php";
if($_SESSION['username']!="admin@tp"){
	echo "<pre>You dont have permissions to view this page.";
	exit;
}
$filename=$_POST['file']; 
$filename=$filename.".csv";
$files = glob("db_user_export_/*"); // get all file names
foreach($files as $file)
{ // iterate files 
	$x=explode("/",$file);
	//echo $x[1];
	if($x[1]=="$filename")
	{ ?>
		<script>
			alert("A file already with the name is present. Please choose another one ");
			window.location.assign("./exportreq.php");
		</script>
	<?php
		exit;
	}
} ?>
<head>
<script type="text/javascript">// <![CDATA[
        function Loaded()
		{
		document.getElementById('Loading').style.display = "none";
		document.getElementById('Loaded').style.display = "block";
		
		}
// ]]></script>
<style>
	#loading {
  width: 100%;
  height: 100%;
  top: 0px;
  left: 0px;
  position: fixed;
  display: block;
  opacity: 0.7;
  background-color: #fff;
  z-index: 99;
  text-align: center;
}
	#loading {
  width: 100%;
  height: 100%;
  top: 0px;
  left: 0px;
  position: fixed;
  display: block;
  opacity: 0.7;
  background-color: #fff;
  z-index: 99;
  text-align: center;
}

#loading-image {
  position: absolute;
  top: 100px;
  left: 240px;
  z-index: 100;
}
</style>

	
</head>
<body onload="Loaded()">
<div id="Loading" class="Loading" style="display:block;" >
	<pre> Loading Please Wait. . . </pre>
	<img src="./pics/loader.gif" alt="LOADING. . . " >
</div>
<div id="Loaded" style="display:none;" >
<?php
 
// Connect and query the database for the users
$query="SELECT `student details`.`RegdNo` AS `Registration Number` , `student details`.`Name` AS `Name`,
 `student details`.`Father` AS `Fathers Name` , `student details`.`DOB` AS `Date Of Birth(dd/mm/yy)` , 
 `student details`.`Email` AS `Email` , `student details`.`PerAddress` AS `Present Address` ,
 `student details`.`preAddress` AS `Permanent Address` , `student details`.`Mobile` AS `Mobile Number` ,
 `student details`.`gender` AS `Gender` , `tenth info`.`Board` AS `X Board` , `tenth info`.`passout` AS `X Passout Year` ,
 `tenth info`.`Marks` AS `X Marks` , `tenth info`.`total` AS `X Total` , `tenth info`.`percentage` AS `X Percentage` , 
 `tenth info`.`school` AS `X School`,`12th details`.`Board` AS `XII Board` , `12th details`.`passout` AS `XII Passout` ,
 `12th details`.`Marks` AS `XII Marks` , `12th details`.`total` AS `XII Total` ,`12th details`.`percentage` AS `XII Percentage` , 
 `12th details`.`college` AS `XII College`,
`ugpg info`.`degree` as `Degree`, `ugpg info`.`board` as `University`, `ugpg info`.`passout` as `UG/PG Passout`,
 `ugpg info`.`sem1` as `I Sem  `, `ugpg info`.`sem2` as `II Sem `, `ugpg info`.`sem3` as `III Sem `,
 `ugpg info`.`sem4` as `IV Sem `, `ugpg info`.`sem5` as `V Sem `, `ugpg info`.`sem6` as `VI Sem `,
 `ugpg info`.`sem7` as `VII Sem `, `ugpg info`.`sem8` as `VIII Sem `, `ugpg info`.`tsem1` as `I Sem Total ` ,
 `ugpg info`.`tsem2` as `II Sem Total `, `ugpg info`.`tsem3` as `III Sem Total `, `ugpg info`.`tsem4` as `IV Sem Total `,
 `ugpg info`.`tsem5` as `V Sem Total `, `ugpg info`.`tsem6` as `VI Sem Total `, `ugpg info`.`tsem7` as `VII Sem Total `,
 `ugpg info`.`tsem8` as `VIII Sem Total `, `ugpg info`.`marks` as `Marks Obtained `, `ugpg info`.`total` as `Maximum Marks`,
 `ugpg info`.`percentage` as `Aggregate `, `ugpg info`.`dept` as `Department`, `ugpg info`.`backlog` as `Backlogs` 
 FROM `student details` , `tenth info` ,`12th details`,`ugpg info`
WHERE `student details`.`RegdNo` = `tenth info`.`RegdNo` and 
`student details`.`RegdNo` = `12th details`.`RegdNo` and
`student details`.`RegdNo` = `ugpg info`.`RegdNo`";
 if ($result = mysqli_query($con, $query)) {
    /* Get field information for all columns */
    $finfo = mysqli_fetch_fields($result);
	$i=0;
    foreach ($finfo as $val) 
	{
		$temp=str_replace(" ","%5d",strtoupper($val->name));
		if($_POST[$temp]=='on')
		{
		
			$x[$i]=$val->name;
			$y[$i]=strtoupper($val->name);
			$i++;
		}
	}
}

$path=$filename;
$filename = 'C:\xampp\htdocs\example\db_user_export_\\'.$filename;
$handle = fopen($filename, 'w+');
// Write the spreadsheet column titles / labels
fputcsv($handle, $y);
 
// Write all the user records to the spreadsheet
while($row = mysqli_fetch_array($result))
{
    $i=0;
	while($x[$i]!="")
	{
		if($x[$i]=='Gender')
		{
			if($row[$x[$i]]=='0')
				$put[$i]="FEMALE";	
			else 
				$put[$i]="MALE";
		}	
		else
			$put[$i]=$row[$x[$i]];
		$i++;
	}
	fputcsv($handle,$put);
	 
}

// Finish writing the file
fclose($handle);
?>
</div>
<div id="content">
  <pre>DATA EXPORTED</pre>
  <?php 
  $path='./db_user_export_/'.$path;
  ?>
  <pre> <a href="<?php echo $path; ?>" >Click here </a> to download </pre>
</div>
</body>