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
	if(x.type=='text')
	{
		var userreg=new RegExp("[0-9]{2}[5][0][0-9]*[A-Z]+[0-9]+$");
		//var userreg=new RegExp("^[A-Za-z][A-Za-z0-9]*$");
		var ruser=userreg.exec(x.value);
		if(ruser== null && count=='0')
		{
			//document.getElementById(a).innerHTML="*Invalid Username-eg:08501A1224";
			document.getElementById('S').disabled='false';
			
		}	
	}
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
		
}