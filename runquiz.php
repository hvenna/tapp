<html>
<SCRIPT TYPE="text/javascript">
	function clickIE() 
	{
		if (document.all) 
		{
			avoid_redirection();
			return false;
		}
	}
	function clickNS(e) 
	{
		if(document.layers||(document.getElementById&&!document.all)) 
		{
			if (e.which==2||e.which==3) 
			{
				avoid_redirection();
				return false;
			}
		}
	}
	if (document.layers)
	{
		document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;
	}
	else
	{
		document.onmouseup=clickNS;document.oncontextmenu=clickIE;
	}
	document.oncontextmenu=new Function("return false")

</SCRIPT>
<link href="./css/cssforquiz_file.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="./script/quizscripts.js"></script>
<?php 
session_start();
$_SESSION['request_url']=$_SERVER['REQUEST_URI'];
if(!$_SESSION['username'])
	{
		?><html><script>
		window.location.assign("./login.php");</script></html> 
		<?php
		exit;
	}
?>
</html>
<div id="No redirections" onclick="avoid_redirection(); return false;">
<?php
include_once("db_mysql_connect.php");
include_once "error.php";
include_once "allpages.php";
?>
</div>
<pre id="test" style="font-size:15px;font-family:Arial;color:#f0efea;">  Once Test starts, submit the test. Do not Right Click or navigate to other pages of website...  </pre>

<?php
$file=$_POST["quizname"];
$query="SELECT count(*) FROM `$file` ";
$result=mysqli_query($conn,$query);		
$row = mysqli_fetch_array($result);
$count=$row[0];
?>
<body onload="loading()">
<div id="Loading" class="Loading" style="display:block;" >
	<pre> Loading Please Wait. . . </pre>
	<img src="./pics/loader.gif" alt="LOADING. . . " >
</div>
<div id="Loaded" style="display:none;" >
<form id="submit" method="POSt" action="result.php" >
<input type="hidden" value="<?php echo $file ; ?>" name="quizname">
<table  border=1 style="position:fixed;right:100px;top:300px"> 
<tr>
	<td style="width:250px;background-color:#ffeedd;" ><input  class="myButton" type="button" onclick="submitme()" value="SUBMIT EXAM"></td>
</tr>
<tr>
<td style="width:250px;height:100px">
<div style="overflow-y:auto;height:110px;width:350px">    
<table border=1>    
<?php
for($i=1;$i<=$count;$i++)
{ 
	if($i==1 || $i%5==1)
	{ ?>
		<tr>
	<?php }
	?>
	<td id="qustn<?php echo  $i; ?>" align="center" style="width:50px" onclick="changecolor('<?php echo  $i; ?>')" >
		<a href="#<?php echo  $i; ?>" ><?php echo  $i; ?> </a> 
		
	</td>
<?php 
	if($i%5==0||$i==$count)
	{ ?>
		</tr>
	<?php }
	}
?>
</table>
</div>
</td></tr>
<tr>
	<td style="width:250px;background-color:#dbd6d2;" ><a >NOT YET VIEWED</a></td>
</tr>
<tr>
	<td style="width:250px;background-color:#dd6e23;" ><a>VIEWED BUT NOT ANSWERED</a></td>
</tr>
<tr>
	<td style="width:250px;background-color:#91b009;" ><a>ANSWERED</a></td>
</tr>
</table>

<?php 
$sql="SELECT * FROM `$file` ";
$resl=mysqli_query($conn,$sql);
?>
<br>
<div class="quizquestion" >
<?php

while($res = mysqli_fetch_array($resl))
{ ?>
	<div style="display:none;" id="<?php echo $res[0];?>"  >
	<a   name="<?php echo $res[0];?>"></a>
    <table border=0 align="center" >
		<tr>
            <td><?php echo $res[0]?>. <?php echo $res[1]?></td>
        </tr>
        <tr>
             <td>
				<input type="radio" name="<?php echo $res[0]?>" id="ans1<?php echo $res[0]?>" value="A" onclick="answered(id)">
				<?php echo $res[2]?>
			</td>
        </tr>
        <tr>
            <td>
				<input type="radio" name="<?php echo $res[0]?>" id="ans2<?php echo $res[0]?>" value="B" onclick="answered(id)">
				<?php echo $res[3]?>
			</td>
        </tr>
        <tr>
             <td>
		
				<input type="radio" name="<?php echo $res[0]?>" id="ans3<?php echo $res[0]?>" value="C" onclick="answered(id)">
				<?php echo $res[4]?>
			</td>
			
        </tr>
		<tr>
             <td>
				
				<input type="radio" name="<?php echo $res[0]?>" id="ans4<?php echo $res[0]?>" value="D" onclick="answered(id)">
				<?php echo $res[5]?>
			</td>
        </tr>
		<tr>
             <td>
				<input class="nextbutton" id="next" type="button" value="NEXT" onclick="changecolor(<?php echo $res[0]+1; ?>);">
			</td>
			
        </tr>
        
    </table>
	<input type="hidden" name="answer<?php echo  $res[0]; ?>" id="answer<?php echo  $res[0]; ?>" value="" >
	</div>
<?php } 
$_SESSION['prev']="nontimed"
?>
</div>
</div>
</form>

            




