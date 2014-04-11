<?php
include_once "error.php";
include_once "allpages.php";
include_once "dbconnect.php";
?>
		<?php 
		if($_SESSION['username'])
		{
			//include "allpages.php";
			?> <html><pre> A user <?php echo $_SESSION['username']; ?> is already logged in. <a href="./logout.php">Logout </a><?php $_SESSION['username']?>, to sign in as a different user</html>
		<?php }
		else
		{?>
		<head><script type="text/javascript" src="./script/login.js"></script></head>
		<div id='contentL'>
		<table border='1'><tr><td>
		<h1> LOGIN</h1>
		<pre> You need to login to view materials/answer tests!!</pre>
		<form method="POST" action='verif.php'>
		<table width='400' align="center">
		<tr>
			<td><b>Regd No:</td>
			<td>
				<input type="text" class="txt" name="us1" id="1" required=required placeholder='Regd No' size="20" onfocus="Focus(this)" onblur="Blur(this)">
				<div class="js" id="1d"></div>
			</td>
		</tr>
		<tr class="b">
			<td><b> Password:</td>
			<td>
				<input type="password" class="txt" id="2" name="p1" required=required size=20  placeholder='Password'  onfocus="Focus(this)" onblur="Blur(this)" >
				<div class="js" id="2d"></div>
			</td>
		</tr>
    <tr class="b">
			<td><b> Role:</td>
			<td>
        <select>
          <option>Student</option>
          <option>Admin / TP officer</option>
          <option>Faculty</option>
        </select>
			</td>
		</tr>
		<tr class="b">
			<td></td>
			<td>
				<pre> <a class="pwd" href="./forgotpwd.php"> Forgot Password? </a></pre>
			</td>
		</tr>
		
		<tr>
			<td>
				 <input type="Submit"  id="S" value="submit" name="OK" class="btn">
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
<?php } ?>