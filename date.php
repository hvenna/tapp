<?php
include_once "error.php";
include_once "allpages.php";
include_once "dbconnect.php";
?>
		<head>
		<script type="text/javascript" src="./script/registerjs.js"></script>
		 <link rel="stylesheet" href="./css/jquery-ui.css" />
		<script src="./script/jquery-1.9.1.js"></script>
		<script src="./script/jquery-ui.js"></script>
		
		<script>
			$(function() {
			$( "#datepicker" ).datepicker();
			});
		</script>
		</head>
		<div id='contentL'>
		<table border='1'><tr><td>
		<h1> REGISTER</h1>
		<form method="POST" action='insertstudent.php'>
		<table width='400' align="center">
		<tr>
			<td><b>Register Number:</td>
			<td>
				<input type="text" class="txt" name="us1" id="1" placeholder='Regd No' size="20" onfocus="Focus(this)" onblur="Blur(this)">
				<div class="js" id="1d"></div>
			</td>
		</tr>
		<tr class="b">
			<td><b> Password:</td>
			<td>
				<input type="password" class="txt" id="2" name="p1" size=20  placeholder='Password'  onfocus="Focus(this)" onblur="Blur(this)">
				<div class="js" id="2d"></div>
			</td>
		</tr>
		<tr class="b">
			<td><b>Reenter Password:</td>
			<td>
				<input type="password" class="txt" id="3" name="rp1" size=20  placeholder='Reenter Password'  onfocus="Focus(this)" onblur="Blur(this)" >
				<div class="js" id="3d"></div>
			</td>
		</tr>
		<tr class="b">
			<td><b>Reenter Password:</td>
			<td>
				<input type="text" id="datepicker" />
				<div class="js" id="3d"></div>
			</td>
		</tr>
		<tr>
			<td><b> Department:</td>
			<td>
			<select name='Department' id="4" onfocus="Focus(this)" onblur="Blur(this)">
				<option value='D'>Department</option>
				<option value='IT'>IT</option>
				<option value='ECE'>ECE</option>
				<option value='mechanical'>Mechanical</option>
				<option value='ECM'>ECM</option>
				<option value='EEE'>EEE</option>
				<option value='MBA'>MBA</option>
				<option value='MCA'>MCA</option>
				<option value='CE'>CE</option>
				<option value='AE'>AE</option>
				<option value='CS'>CS </option>
			</select>
			<div class="js" id="4d"></div>
		<tr>
			<td>
				 <input type="Submit"  id="S" value="Register" name="OK" class="btn" >
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