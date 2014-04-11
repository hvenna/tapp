<?php
include_once "dbconnect.php";
include_once "error.php";
include_once "allpages.php";
?>
<html>
    <style>
        #guidelines
        {
            border:0px solid green;
            font-family: Segoe UI,Arial,Verdana,Tahoma,sans-serif;
            font-size:12pt;
            width:100%;
            font-weight: normal;
            font-style: normal;
            font-variant: normal;
            text-transform: none;
            text-decoration: none;
            text-align: justify;
            text-indent: 0px;
            color:#333333;
        }
        ol, li {
            padding:0;margin:0;
        }
        li {
            padding:7px 5px;
        }
        #heading
        {
            border:0px solid green;
            font-family: Segoe UI,Arial,Verdana,Tahoma,sans-serif;
            font-size:20pt;
            color:#91b009;
            text-align:left;
        }
        #EX
        {
            font-family:verdana;
            font-size:10pt;
            font-weight:bold;
            width:100%;
            color:#91b009;
        }
        input
        {
            font-family:verdana;
            font-size:20px;
            font-weight:bold;
            color:#91b009;
        }

    </style>
    <body>
        <h1 id="heading" align="left">GUIDELINES TO FILL THE REGISTRATION FORM </h1>
        <table width="900"  align="center">
            <tr><td>
                    <div id="guidelines">
                        <span style="font-size:16px;font-style: italic;font-weight: bold;"> Fields with * are mandatory. </span>
                        <ol>
                            <li>Names should not contain any special symbols. Only spaces are allowed.</li>
                            <li>Make sure that your DOB is in the format MM/DD/YYYY.</li>
                            <li>Your registration number and email should be unique. We communicate with you, using your email. </li>
                            <li>Multiple registrations with same email/regd no are not entertained.</li>
                            <li>Your University/Board/School/College should not contain any special symbols.</li>
                            <li>We suggest you to write complete University/Board/School/College names.</li>
                            <li>There is no need for you to fill the 'Equivalent %' column. We'll do it for you.</li>
                            <li>If you don't have semesters, just fill in the 1st semester of the respective year.<br />
                                <span style="font-size: 15px;"> Eg: If a student doesn't have semesters in his/her 1st year, it is enough for him/her to fill in the 1st semester of 1st year.</span>
                            </li>
                            <li>We accept only JPG/JPEG photos for your  passport size, X and XII mark lists.</li>
                        </ol>
                    </div>
                </td></tr>
            <tr><td align="center">
                    <input align="center" type="button" value="Continue" onclick="window.location.assign('./candtpreg.php')">
                </td></tr>
        </table>
    </body>
</html>