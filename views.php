<?php
include_once "error.php";
include_once "allpages.php";
include_once "dbconnect.php";
if($_SESSION['username']!="admin@tp"){
	echo "<pre>You dont have permissions to view this page.";
	exit;
}
?>

		<table border='1' align="center"><tr><td>
		<h1>CHOOSE THE DEPARTMENT TO VIEW EXISTING STUDENTS' DETAILS</h1>
		<form method="POST" action='listofdstud.php'>
		<table width='300' align="center">
				<tr>
			<td><b> Department:</td>
			<td>
			<select name='department' >
			
					<option value='ALL'>ALL</option>
					<option value='Information Technology'>Information Technology</option>
					<option value='Computer Science & Engineering'>Computer Science & Engineering</option>
					<option value='Electronics & Communication Engineering'>Electronics & Communication Engineering</option>
					<option value='Electrical & Electronics Engineering'>Electrical and Electronics Engineering</option>
					<option value='Mechanical Engineering'>Mechanical Engineering</option>
					<option value='Civil Engineering'>Civil Engineering</option>
					<option value='Electronics & Computer Engineering'>Electronics & Computer Engineering</option>
					<option value='Aeronautical Engineering'>Aeronautical Engineering</option>
					<option value='Master of Computer Applications'>Master of Computer Applications</option>
					<option value='Master of Business Administration'>Master of Business Administration</option>
					<option value='M.Tech Computer Science & Engineering'>M.Tech Computer Science & Engineering</option>
					<option value='M.Tech Machine Design'>M.Tech Machine Design</option>
					<option value='M.Tech Microwave and Communication Engineering'>M.Tech Microwave and Communication Engineering</option>
					<option value='M.Tech Power System Control & Automation'>M.Tech Power System Control & Automation</option>
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