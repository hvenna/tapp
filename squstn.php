<?php
include_once "error.php";
include_once "allpages.php";
include_once "dbconnect.php";
?>
<html>	
	<body>
		<table border='1' align="center">
		<tr><td>
		<pre>For Sequrity Purposes, please choose a question and answer it! This is the last time you do it!! </pre>
		
		<form action="squstndb.php" method="post" enctype="multipart/form-data">
			<table width='300' align="center">
			<tr><td>
			<select name='Questions'>
				<option value='0'>Choose a Question</option>
				<option value='What is the name of your favorite childhood friend? '>What is the name of your favorite childhood friend? </option>
				<option value='What is your oldest sibling''s middle name?'>What is your oldest sibling''s middle name?</option>
				<option value='What is your mother''s name'>What is your mother's name?</option>
				<option value='What was your childhood nickname? '>What was your childhood nickname? </option>
				<option value='In what city were you born?'>In what city were you born?</option>
				<option value='What is your favorite sport?'>What is your favorite sport?</option>
			</select>
			</td><td>
			<tr>
			<td>
				<input type="text" class="txt" name="us1" id="1" placeholder='Answer' size="20" onfocus="Focus(this)" onblur="Blur(this)">
			</td>
			</tr>
			<tr><td>
			<input type="submit" name="view" value="Submit" onclick="myfunc()"></td>
		
		</form></td></tr>
		</table>
	</body>
</html>