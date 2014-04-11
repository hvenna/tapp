var z=1;
	function avoid_redirection()
	{
		document.getElementById('test').style.color="#e53b35";
		setTimeout(function(){document.getElementById('test').style.color="#ffffff";},5000);
	}
	function loading()
	{
		document.getElementById('Loading').style.display = "none";
		document.getElementById('Loaded').style.display = "block";
		document.getElementById('1').style.display = "block";
		document.getElementById('qustn1').style.backgroundColor="#dd6e23";
	}
	function changecolor(x)
	{
		var y="qustn"+x;
		if(document.getElementById(x)==null)
		{
			alert('This is the last question!!');
			exit;
		}
		else	
		{
			document.getElementById(z).style.display = "none";
			document.getElementById(x).style.display = "block";
			z=x;
		}
		if(document.getElementById(y).style.backgroundColor){}
		else
			document.getElementById(y).style.backgroundColor="#dd6e23";
		
	}
	function clicked(x)
	{
		document.getElementById(x).width=document.getElementById('1').width+265;
		document.getElementById(x).height=document.getElementById('1').height+265;
	}
	function dclicked(x)
	{
		document.getElementById(x).width=document.getElementById('1').width-265;
		document.getElementById(x).height=document.getElementById('1').height-265;
	}
	function answered(x)
	{
		ans=document.getElementById(x).name;
		ans1="answer"+ans;
		document.getElementById(ans1).value=document.getElementById(x).value;
		qustn="qustn"+ans;
		document.getElementById(qustn).style.backgroundColor="#91b009";
	}
	function submitme()
	{
		var r=confirm("Do you Really want to submit?")
		if (r==true)
		{
			document.getElementById("submit").submit();
		}
		
	}