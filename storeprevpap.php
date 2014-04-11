<?php
include_once "error.php";
include_once "allpages.php";
include_once "dbconnect.php";
?>


		<?php
			include_once "error.php";
			if ($_FILES["file"]["error"] > 0)
			{
				echo "Error: " . $_FILES["file"]["error"] . "Cant Upload <br>";
				exit;
			}
			$dept=$_POST['Company'];
			$name=$_POST['name'];
			if (file_exists("previouspapers/".$dept."/". $_FILES["file"]["name"]))
			{
				?><pre> <?php echo $_FILES["file"]["name"] . " already exists. "?>;</pre><?php
			}
			else
			{
				
				move_uploaded_file($_FILES["file"]["tmp_name"],"previouspapers/".$dept."/" . $_FILES["file"]["name"]);
				$path='./previouspapers/';
				$path="$path".$dept."/".$_FILES["file"]["name"];
				$fpath=$_FILES["file"]["name"];
				if (mysqli_connect_errno())
				{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
				$date=date("Y-m-d");
				$query="INSERT INTO `listoffilesforpp`(`Path`,`Filename`, `Name`, `Comp`,`DOC`) VALUES ('$path', '$fpath','$name','$dept','$date')";
				$result=mysqli_query($con,$query);
				if(!$result)
				{
					print("Erro- no query");
					$error=mysql_error();
					echo $error;
					exit;
				}
				else
					?><pre> <?php print("successfully Uploaded");?></pre><?php
			}
	
		?>
		<pre> <a href="./uploadpapers.php">Upload More </a></pre></div></body></html>
