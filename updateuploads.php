<?php
include_once "error.php";
include_once "css.php";
include_once "dbconnect.php"; 
$x=$_GET['x'];	
$y=explode	("/",$x);
if($_SESSION['username']!="admin@tp"){
	echo "<pre>You dont have permissions to view this page.";
	exit;
}
?>

<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }
</script>
	<table  width="700" align="center" border='1'><tr><td>
		<h1>UPDATE UPLOADS</h1>		
		<form action="updateuploadssucc.php" method="post" enctype="multipart/form-data">
			<table  width="500" align="center" >
			<tr>
				<td><select name='Uploads' disabled>
					<?php if($y[0]==1){?>
						<option value="1">Photo </option> <?php } ?>
					<?php if($y[0]==2) { ?>
						<option value="2">X class Marks list </option><?php } ?>
					<?php if($y[0]==3){ ?>
						<option value="3">XII class Marks list </option><?php } ?>
					</select>
				</td>
				<td><input type="file" name="file" id="file"></td>
				<td><input type="submit" name="submit" value="Update "></td>
				<td><input type="hidden" name="num" value="<?php echo $y[1]; ?> ">
				<input type="hidden" name="choice" value="<?php echo $y[0]; ?> "></td></tr>
			</table>
		</form>
	</td></tr></table>
	</body>
</html>
<?php mysql_close($con); ?>