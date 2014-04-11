
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
	count=0;
	a=x.id+'d';
	if(x.value=="")
	{
		x.style.borderColor="red";
		document.getElementById(a).innerHTML="*This field cannot be empty";
		document.getElementById('S').disabled='true';
		count=1;
		
	}
	else
	{
		x.style.borderColor="green";
		document.getElementById(a).innerHTML="";
		document.getElementById('S').disabled='';
		count=0;
		
	}
	if(x.value.length<6)
	{
		document.getElementById(a).innerHTML="*Length should not be less than 6";
		document.getElementById('S').disabled='true';
		document.getElementById('S').value='Enter correct details';
	}
	if(document.getElementById('1d').innerHTML!="" || document.getElementById('2d').innerHTML!="" || document.getElementById('3d').innerHTML!="")
	{
		document.getElementById('S').disabled='true';
		document.getElementById('S').value='Enter correct details';
	}
	else
	{
		document.getElementById('S').disabled='';
		document.getElementById('S').value='Change';
	}
		
}