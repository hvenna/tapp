<?php
include_once "error.php";
include_once "allpages.php";
include_once "dbconnect.php";

?>


		<?php
			include_once "error.php";
			if ($_FILES["file"]["error"] > 0)
			{
				echo "Error: " . $_FILES["file"]["error"] . "<br>";
				exit;
			}
			
			$dept=$_POST['Materials'];
			$name=$_POST['name'];
			if (file_exists("materials/".$dept."/". $_FILES["file"]["name"]))
			{
				?><pre> <?php echo $_FILES["file"]["name"] . " already exists. "?>;</pre><?php
			}
			else
			{
				move_uploaded_file($_FILES["file"]["tmp_name"],"materials/".$dept."/" . $_FILES["file"]["name"]);
				$path='./materials/';
				$path="$path".$dept."/".$_FILES["file"]["name"];
				if (mysqli_connect_errno())
				{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
				$fname=$_FILES["file"]["name"];
				$date=date("Y-m-d");
				$query="INSERT INTO `listoffiles`( `Path`, `Name`, `Dept`,`Filename`,`DOC`) VALUES ('$path','$name','$dept','$fname','$date')";
				$result=mysqli_query($con,$query);
	
				if(!$result)
				{
					print("Erro- no query");
					$error=mysql_error();
					print"<p>".$error."<p>";
					exit;
				}
				else
					?><pre> <?php print("successfully Uploaded");?></pre><?php
			}
	
		?>
		<pre> <a href="./uploadfiles.php">Upload More </a></pre></div></body></html>
