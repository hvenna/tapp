<?php
include "allpages.php";
	$files = glob("db_user_export_/*"); // get all file names'
	?>
	<table  align="center"><tr><td align="center">
		<div class="table_css" >
		<table align="center" >
	<tr >
	<td style="width:270px">FILE NAME</td>
	<td>LAST MODIFIED </td>
	</tr><?php
	foreach($files as $file)
	{ // iterate files
		$x=explode("/",$file);
		$date=date("Y-m-d", filemtime($file));
		$datetime1 = date_create($date);
		$curdate=date("Y-m-d");
		$datetime2 = date_create($curdate);
		$interval = date_diff($datetime2, $datetime1);		
		$diff=$interval->format('%a');
		
		?>
		<tr><td  style="width:270px;text-align:center"><a href="<?php echo $file; ?>"><?php echo $x[1]; ?> </a> <?php if($diff<=10) { ?> <img src="./pics/new_old.gif" alt="NEW"><?php } ?>  </td>
		<td>    <?php echo date("F d Y H:i:s.", filemtime($file)); ?></td>
		</tr>
		<?php
		
	// delete file
	}
?>