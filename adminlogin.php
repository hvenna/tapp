<?php
include_once "error.php";
include_once "allpages.php";
include_once "dbconnect.php";
?>
		<div id='contentL'>
		<table border='1'><tr><td>
		<h1> ADMIN LOGIN</h1>
		<pre> You need to login to view/update materials/Exams!!</pre>
		<form method="POST" action='adminverif.php'>
		<table width='300' align="center">
		<tr>
			<td><b>User Name:</td>
			<td>
				<input type="text" class="txt" name="us1" id="1" required=required placeholder='Username' size="20" onfocus="Focus(this)" onblur="Blur(this)">
			</td>
		</tr>
		<tr class="b">
			<td><b> Password:</td>
			<td>
				<input type="password" class="txt" id="2" name="p1" required=required  size=20  placeholder='Password'  onfocus="Focus(this)" onblur="Blur(this)">
				
			</td>
		</tr>
		<tr class="b">
			<td></td>
			<td>
				<pre> <a class="pwd" href="./adminforgotpwd.php"> Forgot Password? </a></pre>
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
