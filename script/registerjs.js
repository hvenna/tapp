function Focus(x)
{
	x.style.borderColor="blue";
	var a;
	a=x.id+'d';
	document.getElementById(a).innerHTML="";
	document.getElementById('S').disabled='';
	if(document.getElementById('1d').innerHTML!="" || document.getElementById('2d').innerHTML!="")
	{
		document.getElementById('S').disabled='true';
		document.getElementById('S').value='Enter correct details';
	}
	else
	{
		document.getElementById('S').disabled='';
		document.getElementById('S').value='submit';
	}
	document.getElementById('4d').innerHTML="";
}
function Blur(x)
{
	var a;
	a=x.id+'d';
	if(x.value=="")
	{
		x.style.borderColor="red";
		document.getElementById(a).innerHTML="*This field cannot be empty";
		document.getElementById('S').disabled='true';
		
	}
	else
	{
		x.style.borderColor="green";
		document.getElementById(a).innerHTML="";
		document.getElementById('S').disabled='';
	
		
	}
	if(x.type=='text')
	{
		var userreg=new RegExp("[0-9]{2}[5][0][0-9]*[A-Z]+[0-9]+$");
		var ruser=userreg.exec(x.value);
		if(ruser== null)
		{
			document.getElementById(a).innerHTML="*Invalid Username-eg:08501A1224";
			document.getElementById('S').disabled='true';
			
		}	
	}
	pwdver();
	if(document.getElementById('1d').innerHTML!="" || document.getElementById('2d').innerHTML!=""||document.getElementById('3d').innerHTML!="")
	{
		document.getElementById('S').disabled='true';
		document.getElementById('S').value='Enter correct details';
	}
	else
	{
		document.getElementById('S').disabled='';
		document.getElementById('S').value='submit';
	}
		
}
function pwdver()
{
	if(document.getElementById('2').value.length<6)
	{
		document.getElementById('2d').innerHTML="*Length should be atleast 6 characters";
		document.getElementById('S').disabled='true';
	}
	else
	{
		if(document.getElementById('2').value!=document.getElementById('3').value)
		{
			document.getElementById('3d').innerHTML="*Passwords mismatch";
			document.getElementById('S').disabled='true';
		}
		else
		{
			if(document.getElementById('4').value=='D')
			{
				document.getElementById('4d').innerHTML="*Choose a Department";
				document.getElementById('S').disabled='true';
				document.getElementById('S').value='Enter correct details';
				exit;
			}
			else
			{
				document.getElementById('4d').innerHTML="";
				document.getElementById('S').disabled='';
				document.getElementById('S').value='submit';
			}
		}
	}
}