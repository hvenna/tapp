<?php
	include_once "error.php";
	include_once "allpages.php";
	include_once "dbconnect.php";
	if($_SESSION['username']!="admin@tp"){
	echo "<pre>You dont have permissions to view this page.";
	exit;
}
?>
<?php
	$count=0;
	//personal details
	$gender=$_POST['Gender'];
	$name=$_POST['name'];
	$regd=$_POST['regd'];
	$fname=$_POST['fname'];
	$date=$_POST['date'];
	$email=$_POST['email'];
	$padd=$_POST['padd'];
	$pradd=$_POST['pradd'];
	$mobile=$_POST['mobile'];
	$Landline=$_POST['land'];
	//department
	
	$name=strtoupper($name);
	$pattern = '/[A-Z ]+$/';
	if(!preg_match($pattern,$name))
	{
		echo "<pre>We are sorry. The Name".$name." is  invalid Make sure your name contains no special symbols.</pre>";
		exit;
	}
	
	if($gender=='S')
	{
		echo "<pre>Choose your gender.</pre>";
		exit;
	}
	else
	{
		if($gender=='Mr')
			$gender=1;
		else
			$gender=0;
	}
	
	$pattern = '/[0-9]{2}[5][0][0-9]*[A-Z]+[0-9]+$/';
	if(!preg_match($pattern,$regd))
	{
		echo "<pre>We are sorry. The Number".$regd." is an invalid registration number.</pre>";
		exit;
	}
	$pattern = '/[A-Z ]+$/';
	$fname=strtoupper($fname);
	if(!preg_match($pattern,$fname))
	{
		echo "<pre>We are sorry. The Name".$fname." is  invalid. Make sure the name contains no special symbols.</pre>";
		exit;
	}
	$today = date("n/j/Y"); 
	$pattern = '/^(0[1-9]|1[012])\/(0[1-9]|[12][0-9]|3[01])\/(19|20)[0-9]{2}$/';
	$diff = abs(strtotime($today) - strtotime($date));
	$years = floor($diff / (365*60*60*24));
	
	if(!preg_match($pattern,$date))
	{
		echo "<pre>We are sorry. The Date".$date." is  invalid. Make sure it is in the format of mm/dd/yyyy.</pre>";
		exit;
	}
	else if($years<18)
	{
		echo "<pre>We are sorry. The Date".$date." is  invalid. Are you still less than 18?.</pre>";
		exit;
	}
	else
	{
		$date1 = explode("/", $date);
		$DOB=$date1[2]."-".$date1[0]."-".$date1[1];
	}

	$pattern = '/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+[.][a-zA-Z]+$/';
	if(!preg_match($pattern,$email))
	{
		echo "<pre>We are sorry. The Mail ".$email." is  invalid. Make sure it is of the type abc@xyz.com.</pre>";
		exit;
	}
	
	if($padd=="" || $pradd=="")
	{
		echo "<pre>We are sorry,Address cannot be empty.</pre>";
		exit;
	}
	$pattern='/[7-9][0-9]{9}$/';
	if(!preg_match($pattern,$mobile))
	{
		echo "<pre>We are sorry. The Mobile ".$mobile." is  invalid.Example-9848022338.</pre>";
		exit;
	}
	$pattern='/[0-9]\d{2,4}-\d{6,8}$/';
	if($Landline!='')
	{
		if(!preg_match($pattern,$Landline))
		{
			echo "<pre>We are sorry. The Landline ".$Landline." is  invalid.Example-0866-2422591.</pre>";
			exit;
		}
	}

	//Academic Information
	//X details
	$passout=$_POST['passout'];
	$dept=$_POST['dept'];
	$Xboard=$_POST['Xboard'];
	$Xpass=$_POST['Xpass'];
	$Xschool=$_POST['Xschool'];
	$Xmks=$_POST['Xmks'];
	$Xtotal=$_POST['Xtotal'];
	$Xper=$_POST['Xper'];
	
	$pattern = '/(19|20)[0-9]{2}$/';
	if(!preg_match($pattern,$passout))
	{
		echo "<pre>We are sorry. The passout year ".$passout." looks wrong.</pre>";
		exit;
	}
	$pattern = '/[A-Z ]+$/';
	$dept=strtoupper($dept);
	if(!preg_match($pattern,$dept))
	{
		echo "<pre>We are sorry. The Department ".$dept." is  invalid. Make sure your name contains no special symbols/numbers.</pre>";
		exit;
	}
	$pattern = '/[A-Z .-]+$/';
	$Xboard=strtoupper($Xboard);
	if(!preg_match($pattern,$Xboard))
	{
		echo "<pre>We are sorry. The X Board ".$Xboard." is  invalid. Make sure your name contains no special symbols/numbers.</pre>";
		exit;
	}
	$pattern = '/(19|20)[0-9]{2}$/';
	if(!preg_match($pattern,$Xpass)||$Xpass>$passout)
	{
		echo "<pre>We are sorry. The passout year ".$Xpass." looks wrong.</pre>";
		exit;
	}
	$pattern = '/[A-Z .-]+$/';
	$Xschool=strtoupper($Xschool);
	if(!preg_match($pattern,$Xschool))
	{
		echo "<pre>We are sorry. The X School ".$Xschool." is  invalid. Make sure your name contains no special symbols/numbers.</pre>";
		exit;
	}
	$pattern = '/[0-9.]+$/';
	if(!preg_match($pattern,$Xmks)||$Xmks>$Xtotal||!preg_match($pattern,$Xtotal))
	{
		echo "<pre>We are sorry. The X marks are  invalid. Make sure your marks contains only numbers and less than the total.</pre>";
		exit;
	}
	else
		$Xper=($Xmks/$Xtotal)*100;
	 
	//XII Details
	$XIIboard=$_POST['XIIboard'];
	$XIIpass=$_POST['XIIpass'];
	$XIIschool=$_POST['XIIschool'];
	$XIImks=$_POST['XIImks'];
	$XIItotal=$_POST['XIItotal'];
	$XIIper=$_POST['XIIper'];
	

	$pattern = '/[A-Z .-]+$/';
	$XIIboard=strtoupper($XIIboard);
	if(!preg_match($pattern,$XIIboard))
	{
		echo "<pre>We are sorry. The XII Board ".$XIIboard." is  invalid. Make sure your name contains no special symbols/numbers.</pre>";
		exit;
	}
	$pattern = '/(19|20)[0-9]{2}$/';
	if(!preg_match($pattern,$XIIpass)||$XIIpass>$passout||$XIIpass<$Xpass)
	{
		echo "<pre>We are sorry. The passout year ".$XIIpass." looks wrong.</pre>";
		exit;
	}
	$pattern = '/[A-Z .-]+$/';
	$XIIschool=strtoupper($XIIschool);
	if(!preg_match($pattern,$XIIschool))
	{
		echo "<pre>We are sorry. The XII School ".$XIIschool." is  invalid. Make sure your name contains no special symbols/numbers.</pre>";
		exit;
	}
	$pattern = '/[0-9.]+$/';
	if(!preg_match($pattern,$XIImks)||$XIImks>$XIItotal||!preg_match($pattern,$XIItotal))
	{
		echo "<pre>We are sorry. The XII marks are  invalid. Make sure your marks contains only numbers and less than the total.</pre>";
		exit;
	}
	else
		$XIIper=($XIImks/$XIItotal)*100;
	
	
	//Degree details
	$degree=$_POST['degree'];
	$Dboard=$_POST['Dboard'];
	$Dpass=$_POST['Dpass'];
	$S1M=$_POST['S1M'];
	$S1T=$_POST['S1T'];
	$S2M=$_POST['S2M'];
	$S2T=$_POST['S2T'];
	$S3M=$_POST['S3M'];
	$S3T=$_POST['S3T'];
	$S4M=$_POST['S4M'];
	$S4T=$_POST['S4T'];
	$S5M=$_POST['S5M'];
	$S5T=$_POST['S5T'];
	$S6M=$_POST['S6M'];
	$S6T=$_POST['S6T'];
	$S7M=$_POST['S7M'];
	$S7T=$_POST['S7T'];
	$S8M=$_POST['S8M'];
	$S8T=$_POST['S8T'];
	$backlog=$_POST['backlog'];
	$Dper=$_POST['dept'];
	
	
	$pattern = '/[A-Z .-]+$/';
	$Dboard=strtoupper($Dboard);
	if(!preg_match($pattern,$Dboard))
	{
		echo "<pre>We are sorry. The Board ".$Dboard." is  invalid. Make sure your name contains no special symbols/numbers.</pre>";
		exit;
	}
	$pattern = '/(19|20)[0-9]{2}$/';
	if(!preg_match($pattern,$Dpass)||$Dpass!=$passout)
	{
		echo "<pre>We are sorry. The passout year ".$Dpass." looks wrong. </pre>";
		exit;
	}
	$pattern = '/[0-9.]+$/';
	$mk=0;
	$tot=0;
	if($S1M!='')
	{
		if(!preg_match($pattern,$S1M)||$S1M>$S1T||!preg_match($pattern,$S1T))
		{
			echo "<pre>We are sorry.Your 1st Sem Marks/CGPA are invalid. Make sure your marks contains only numbers and less than the total.</pre>";
			exit;
		}
		else
		{
			$mk=$mk+$S1M;
			$tot=$tot+$S1T;
		}
	}
	if($S2M!='')
	{
		if(!preg_match($pattern,$S2M)||$S2M>$S2T||!preg_match($pattern,$S2T))
		{
			echo "<pre>We are sorry.Your 2nd Sem Marks/CGPA are invalid. Make sure your marks contains only numbers and less than the total.</pre>";
			exit;
		}
		else
		{
			$mk=$mk+$S2M;
			$tot=$tot+$S2T;
		}
	}
	if($S3M!='')
	{
		if(!preg_match($pattern,$S3M)||$S3M>$S3T||!preg_match($pattern,$S3T))
		{
			echo "<pre>We are sorry.Your  3th Sem Marks/CGPA are invalid. Make sure your marks contains only numbers and less than the total.</pre>";
			exit;
		}
		else
		{
			$mk=$mk+$S3M;
			$tot=$tot+$S3T;
		}
	}
	if($S4M!='')
	{
		if(!preg_match($pattern,$S4M)||$S4M>$S4T||!preg_match($pattern,$S4T))
		{
			echo "<pre>We are sorry.Your  4th Sem Marks/CGPA are invalid. Make sure your marks contains only numbers and less than the total.</pre>";
			exit;
		}
		else
		{
			$mk=$mk+$S4M;
			$tot=$tot+$S4T;
		}
	}
	if($S5M!='')
	{
		if(!preg_match($pattern,$S5M)||$S5M>$S5T||!preg_match($pattern,$S5T))
		{
			echo "<pre>We are sorry.Your  5th SemMarks/CGPA are invalid. Make sure your marks contains only numbers and less than the total.</pre>";
			exit;
		}
		else
		{
			$mk=$mk+$S5M;
			$tot=$tot+$S5T;
		}
	}
	if($S6M!='')
	{
		if(!preg_match($pattern,$S6M)||$S6M>$S6T||!preg_match($pattern,$S6T))
		{
			echo "<pre>We are sorry.Your  6th Sem Marks/CGPA are invalid. Make sure your marks contains only numbers and less than the total.</pre>";
			exit;
		}
		else
		{
			$mk=$mk+$S6M;
			$tot=$tot+$S6T;
		}
	}
	if($S7M!='')
	{
		if(!preg_match($pattern,$S7M)||$S7M>$S7T||!preg_match($pattern,$S7T))
		{
			echo "<pre>We are sorry.Your  7th SemMarks/CGPA are invalid. Make sure your marks contains only numbers and less than the total.</pre>";
			exit;
		}
		else
		{
			$mk=$mk+$S7M;
			$tot=$tot+$S7T;
		}
	}
	if($S8M!='')
	{
		if(!preg_match($pattern,$S8M)||$S8M>$S8T||!preg_match($pattern,$S8T))
		{
			echo "<pre>We are sorry.Your 8th Sem Marks/CGPA are invalid. Make sure your marks contains only numbers and less than the total.</pre>";
			exit;
		}
		else
		{
			$mk=$mk+$S8M;
			$tot=$tot+$S8T;
		}
	}
	$Dper=(($mk)/($tot))*100;
	$pattern = '/[0-9.]+$/';
	if($backlog!='')
	{
		if(!preg_match($pattern,$backlog))
		{
			echo "<pre>We are sorry.We only need the number of backlogs. Give the number.</pre>";
			exit;
		}
	}
	//queries
	mysqli_autocommit($con, FALSE);
	//$con->beginTransaction();
	//update student details
	$query="UPDATE `student details` SET `Name`='$name',`Father`='$fname',
	`DOB`='$DOB',`Email`='$email',`PerAddress`='$padd',`preAddress`='$pradd',`Mobile`='$mobile',
	`gender`='$gender' WHERE `RegdNo`='$regd'";
	 
	$result1 = mysqli_query($con,$query);
	if (!$result1) {
	echo "<pre> ERROR : ".mysqli_error($con)."</pre>"; }
		
	//insert into tenth info
	$query="UPDATE `tenth info` SET `Board`='$Xboard',`passout`='$Xpass',`Marks`='$Xmks',
	`total`='$Xtotal',`percentage`='$Xper',`school`='$Xschool' WHERE `RegdNo`='$regd'";
	 
	$result2=mysqli_query($con,$query);
	if (!$result2) {
	echo "<pre> ERROR : ".mysqli_error($con)."</pre>"; }

	//insert into 12th details
	$query="UPDATE `12th details` SET `Board`='$XIIboard',`passout`='$XIIpass',
	`Marks`='$XIImks',`total`='$XIItotal',`percentage`='$XIIper',`college`='$XIIschool' WHERE `RegdNo`='$regd'";
	 
	$result3=mysqli_query($con,$query);
	if (!$result3) {
	echo "<pre> ERROR : ".mysqli_error($con)."</pre>"; }
	//insert into ugpg info
	$query="UPDATE `ugpg info` SET `degree`='$degree',`board`='$Dboard',`passout`='$Dpass',
	`sem1`='$S1M',`sem2`='$S2M',`sem3`='$S3M',`sem4`='$S4M',`sem5`='$S5M',`sem6`='$S6M',
	`sem7`='$S7M',`sem8`='$S8M',`tsem1`='$S1T',`tsem2`='$S2T',`tsem3`='$S3T',`tsem4`='$S4T',
	`tsem5`='$S5T',`tsem6`='$S6T',`tsem7`='$S7T',`tsem8`='$S8T',`marks`='$mk',`total`='$tot',
	`percentage`='$Dper',`dept`='$dept',`backlog`='$backlog' WHERE `RegdNo`='$regd'";
	 
	$result4=mysqli_query($con,$query);
	if (!$result4) {
	echo "<pre> ERROR : ".mysqli_error($con)."</pre>"; }
	
	if ($result1 and $result2 and $result3 and $result4 ) {
		mysqli_commit($con);
		echo "<pre>".$regd."'s DETAILS SUCCESSFULLY UPDATED. </pre>";
		
	} 
	else {        
		mysqli_rollback($con);
		echo "<pre>Error in Updation. Please try Again.</pre>";
	}
	
?>

	