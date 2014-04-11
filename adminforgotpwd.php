<?php
include_once "error.php";
include_once "allpages.php";
include_once "dbconnect.php";
?>
		<div id='contentL'>
		<table  border='1'><tr><td>
		<h1>FORGOT PASSWORD?</h1>
		<form method="POST" action='adminretrpwd.php'>
		<table width='300' align="center">
		<tr>
			<td><b>Give your User Name:</td>
			<td>
				<input type="text" class="txt" name="us1" id="1" placeholder='Username' size="20" onfocus="Focus(this)" onblur="Blur(this)">
			</td>
		</tr>
		<tr>
			<td>
				 <input type="Submit"  value="submit" name="OK" class="btn" onclick="myfunc()";>
			</td>
			<td>	
				 <input type="Reset"  value="Cancel" name="Cancel" class="btn">
			</td>
		</tr>
		</table>
		</form>
		</pre>
		</table></tr></td>
		</div>
	</body>
</html>