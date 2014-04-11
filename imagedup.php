<?php ?>
<script>
	function clicked()
	{
		document.getElementById('1').width=document.getElementById('1').width+165;
		document.getElementById('1').height=document.getElementById('1').height+138;
	}
	function dclicked()
	{
		document.getElementById('1').width=document.getElementById('1').width-165;
		document.getElementById('1').height=document.getElementById('1').height-165;
	}
</script>
<table border='1' style="height:150px;width:150px;background-color:#dbd6d2;">
<tr>
	<td style="width:150px;background-color:#dbd6d2;" >
			<img id="1"  onMouseOut="dclicked()" onMouseOver="clicked()" src="./pics/career_banner.png" width="165" height="138">
	</td>
</tr>
</table>