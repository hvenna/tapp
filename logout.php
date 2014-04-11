<?php
include_once "error.php";
include_once "dbconnect.php";
?>

<?php
	$n=$_SESSION['name'];
	session_unset();
	session_destroy(); 
	include_once "allpages.php";
	if(!$_SESSION['username'])
	{
		?><div id='content'><pre class='loginv'><?php 
					echo "Successfully Logged out ".$n; ?>
					</pre></div>
				
	<?php }
?>
		</div>
	</body>
</html>
