<?php 
$r=0;
$m=$r+10;

$w="10501A04";
$y="./attendance.php?x=";

while($r<$m)
{
	$l=$w."9".$r;
	$l1=$y.$l; ?>
	<html><script> window.open('<?php echo $l1; ?>','_blank')</script></html>
	<?php 	$r++;

}

?>