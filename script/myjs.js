function Focus(x)
{
	x.style.borderColor="blue";
	var a;
	a=x.id+'d';
	document.getElementById(a).innerHTML="";
	document.getElementById('S').disabled='';
}
function Blur(x)
{
	var a;
	a=x.id+'d';
	if(x.value=="")
	{
		
		
		x.style.borderColor="red";
		document.getElementById(a).innerHTML="*Invalid Entry";
		document.getElementById('S').disabled='true';
	}
	else
	{
		x.style.borderColor="green";
		document.getElementById(a).innerHTML="";
		document.getElementById('S').disabled='';
		
	}

	var re=/^[0-9][0-9]*[A-Z]+[0-9]+/;
	var res = re.exec(x.value);
	alert(res);
}
function myfunc()
{
	var count=1;
	if(document.getElementById("1").value==""||document.getElementById("2").value=="")
	{
		count=0;
	}
	if(count==1)
	{}
	else
	{
		alert("Fields Cannot Be Empty");
		exit;
	}			
}	
function myfuncp()
{
	var count=1;
	if(document.getElementById("2").value!=document.getElementById("3").value)
	{
		alert("Passwords Mismatch");
		window.location.reload(false); 
		exit;
	}
	if(document.getElementById("1").value==""||document.getElementById("2").value==""||document.getElementById("3").value=="")
	{
		count=0;
	}
	if(count==1)
	{}
	else
	{
		alert("Fields Cannot Be Empty");
		exit;
	}			
}

function ver()	
{
	if(document.getElementById("2").value!=document.getElementById("3").value)
	{
		alert("Passwords Mismatch");
		window.location.reload(false); 
		exit;
	}
}
function redirect()	
{
	window.location.assign("http://127.0.0.1/example/deletes.php");
}