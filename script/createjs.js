function enableDisable(x)
{		
	
	if(document.getElementById(x).value=='t')
	{
		
		document.getElementById('2').disabled =false;
	}
	else
		document.getElementById('2').disabled =true;
	
}