<?php
include_once "error.php";
include_once "allpages.php";
include_once "dbconnect.php";
?>
		<head><script type="text/javascript" src="./script/changep.js"></script></head>
		<div id='contentL'>
		<table border='1'><tr><td>
		<h1> CHANGE PASSWORD</h1>
		
		<form method="POST" action='changpdb.php'>
		<table width='400' align="center">
		<tr class="b">
			<td><b>Present Password:</td>
			<td>
				<input type="password" class="txt" required=reuired id="1" name="p" size=20  placeholder='Present Password'  onfocus="Focus(this)" onblur="Blur(this)">
				<div class="js" id="1d"></div>
			</td>
		</tr>
		<tr class="b">
			<td><b> New Password:</td>
			<td>
				<input type="password" class="txt" id="2" required=reuired  name="np" size=20  placeholder='New Password'  onfocus="Focus(this)" onblur="Blur(this)">
				<div class="js" id="2d"></div>
			</td>
		</tr>
		<tr class="b">
			<td><b> Re-enter Password:</td>
			<td>
				<input type="password" class="txt" id="3" required=reuired  name="rp" size=20  placeholder='Re enter Password'  onfocus="Focus(this)" onblur="Blur(this)">
				<div class="js" id="3d"></div>
			</td>
		</tr>
		<tr>
			<td>
				 <input type="Submit"  value="Change" id="S" name="OK" class="btn" >
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