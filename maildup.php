<?php 
$message ="Hello";
if(mail('harshitha.venna@gmail.com', 'My Subject', $message))
	echo "Mailed";
else
	echo "Error";

?>