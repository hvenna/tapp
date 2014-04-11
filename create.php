<?php
// Turn off all error reporting
error_reporting(0);
include_once "error.php";
include_once "allpages.php";
$i=0;?>
<?php
require_once("connecttodb.php");
isset($_POST["ok"])? $_POST["ok"] :"";
isset($_POST["type"])? $_POST["type"] :"";
if($_POST["ok"]=="create")
{
	$file=$_POST["quizname"];
	
		if($_POST["type"]=="t")
			{	
			$sql="CREATE TABLE $file(qid int(5) default NULL AUTO_INCREMENT,Question text,opt1 text,opt2 text,opt3 text,opt4 text,woptcode varchar(5) default NULL,time int(11),PRIMARY KEY (qid)) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
			if (mysql_query($sql))
				{
					$x=$_POST['desc'];
					$y=$_POST['time'];
					$date=date("Y-m-d");
					$query="INSERT INTO `list`(`name`, `type`, `description`, `time`,`DOC`) VALUES ('$file',1,'$x','$y','$date')";
					$result=mysql_query($query);
					echo "<pre>Quiz ".$file." created successfully</pre>";
					echo"<form action='Quiz_Entry_Admin.php' method='post'>";
					echo"<input type='hidden' name='time' value='$_POST[time]'></h3>";
					echo"<input type='hidden' name='file' value='$file'>";
					echo"<input type='hidden' name='type' value='t'>";
					echo"<pre><input type='submit' value='ADD QUESTIONS TO QUIZ' name='b1'></pre>";
					echo"</form>";
					$i=1;
				}
			else
			{
				echo "Error creating table: " . mysql_error();
			}
		}
		if($_POST["type"]=="nt")
		{	
			$sql="CREATE TABLE $file(qid int(5) default NULL AUTO_INCREMENT,Question text,opt1 text,opt2 text,opt3 text,opt4 text,woptcode varchar(5) default NULL,PRIMARY KEY (qid)) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
			if (mysql_query($sql))
			{
				$x=$_POST['desc'];
				
				$query="INSERT INTO `list`(`name`, `type`, `description`) VALUES ('$file',0,'$x')";
				$result=mysql_query($query);
				echo "<PRE>Table quiz created successfully	</pre>";
				echo"<form action='Quiz_Entry_Admin.php' method='post'>";
				echo"<input type='hidden' name='file' value='$file'>";
				echo"<input type='hidden' name='type' value='nt'>";
				echo"<input type=submit value='ADD QUESTIONS TO QUIZ' name='b1'>";
				echo"</form>";
				$i=1;
			}
			else
			{
				echo "Error creating table: " . mysql_error();
			}
		}

}
if($i==0){?>
<head><script type="text/javascript" src="./script/createjs.js"></script></head>
<body onload="enableDisable('3')">
<table align="center"  width="500"><tr><td>
<div class="table_css" >
<table align="center" width="400">
<form method="post" action="create.php">
<tr colspan="2"><td colspan="2"><h1 align="center">CREATE NEW QUIZ</h1></td></tr>
<tr><td>Name of quiz to create</td>
<td><input type="text" required=required  id="3" name="quizname" placeholder="Name"></td></tr>
<tr><td>Provide information about the quiz</td>
<td><textarea rows="5" required=required  cols="15" name="desc"></textarea></td></tr>
<tr><td style="text-align:left;border-right:0px"><input type="radio" id="1" required=required  value="t" name="type" onclick="enableDisable('1')">Real Test</td>
<td><input type="text" required=required  id="2" placeholder="Time in minutes" name="time"></td></tr>
<tr><td colspan=2 style="text-align:left;" ><input type="radio" id='3' value="nt" name="type" onclick="enableDisable('3')">Practice Test</td></tr>
<tr><td align="center">
<input type="submit" value="CREATE QUIZ" ></td>
<td><input type="reset" value="CANCEL"></td></tr>
<input type="hidden" value="create" name="ok">
</form>
</td></tr></table>
</td></tr></table>
</body>
<?php } ?>