<script>
	function submitme()
	{

		document.forms["myform"].submit();
	}
</script>
<body onload="submitme()">
<FORM name="performance" id="myform" method="post" action="#" >
            <INPUT type="hidden" name="service" value="STU_PERFORMANCE_MARKS_DISPLAY">
              <TABLE border="0" width="100%" cellspacing="0" cellpadding="0">
                <TR>
                  <TD colspan="2" align="center"><STRONG><U>Student Marks Performance Display Form</U></STRONG></TD>
                </TR>  
				<TR><TD>&nbsp;</TD></TR>
                <TR>
                  <TD align="right" width="40%">Regd. No:</TD>
	              <TD><INPUT type="text" name="stid" value="<?php echo $_GET['x']; ?>"></TD>
                </TR>
				<TR><TD>&nbsp;</TD></TR>
                <TR>
                  <TD align="right"><INPUT type="submit" name="submit" value="Submit"></TD>
	              <TD align="center"><INPUT type="reset" value="Clear"></TD>
                </TR>
              </TABLE>
            </FORM>
			</body>