<?php
include_once "error.php";
include_once "allpages.php";
include_once "dbconnect.php";
?>
		<table border='1' align="center"><tr><td>
		<h1>CHOOSE THE DEPARTMENT TO VIEW REGISTERED STUDENTS' DETAILS</h1>
		<form method="POST" action='registered.php'>
		<table width='300' align="center">
				<tr>
			<td><b> Department:</td>
			<td>
			<select name='Department'>
				<option value='ALL'>ALL</option>
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
		</tr>
		<tr>
			<td></td><td>
				 <input type="Submit"  value="GO" name="GO" class="btn" onclick="myfunc()";>
			</td>
			
		</tr>
		</table>
		</form>
		</pre>
		</table></tr></td>
		</div>
	</body>
</html>