<?php
require_once "error.php";
require_once "allpages.php";
require_once "dbconnect.php";
if ($_SESSION['username']) {
    echo "<pre>We are sorry. Logged in users cannot view this page.";
    exit;
}
$query = "SELECT `Dept` from `persons` WHERE `Username`='$_SESSION[username]'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
?>
<head>

    <style type="text/css">
        table.details {
            border-width: 1px;
            border-collapse: collapse;
        }
    </style>
    <script>
        function address(x)
        {

            if (document.getElementById(x).value == 'Yes')
            {
                document.getElementById('pre').value = document.getElementById('per').value;
            }
            else
            {
                document.getElementById('pre').value = '';
            }
        }
        function changeme()
        {
            document.getElementById("pass").value = document.getElementById("S").value;
        }
        function calcper(m, t, p)
        {
            var x = parseInt(document.getElementById(m).value);
            var y = parseInt(document.getElementById(t).value);
            if (document.getElementById(m).value == '')
            {
                alert("This filed cannot be empty");
                document.getElementById(m).focus();
                exit;
            }
            if (document.getElementById(t).value == '')
            {
                alert("This filed cannot be empty");
                document.getElementById(t).focus();
                exit;
            }
            if (parseInt(document.getElementById(m).value) > parseInt(document.getElementById(t).value))
            {
                alert("Marks obtained cannot be greater than the total!!");
                document.getElementById(m).value = '';
                document.getElementById(m).focus();
                exit;
            }
            m = x;
            t = y;
            per(m, t, p);
        }
        function per(m, t, p)
        {
            var per = (m / t) * 100;
            document.getElementById(p).value = per;


        }
        function gotosteptwo()
        {
            if (
                    (document.getElementById('gender').value == 'S') ||
                    (document.getElementById('name').value == '') ||
                    (document.getElementById('regd').value == '') ||
                    (document.getElementById('fname').value == '') ||
                    (document.getElementById('email').value == '') ||
                    (document.getElementById('datepicker').value == '') ||
                    (document.getElementById('per').value == '') ||
                    (document.getElementById('pre').value == '') ||
                    (document.getElementById('mobile').value == ''))
                alert("Some fields are missing! Fill them!!");
            else
            {
                document.getElementById('step1').style.display = "none";
                document.getElementById('step2').style.display = "block";

            }
        }
        function gotostepthree()
        {
            var id = new Array();
            id[0] = "S";
            id[1] = "dept";
            id[2] = "Xboard";
            id[3] = "Xschool";
            id[4] = "XM";
            id[5] = "XT";
            id[6] = "Xpass";
            id[7] = "XIIboard";
            id[8] = "XIIschool";
            id[9] = "XIIM";
            id[10] = "XIIT";
            id[11] = "XIIpass";
            id[12] = "degree";
            id[13] = "Dboard";
            id[14] = "pass";
            id[15] = "S1T";
            id[16] = "S1M";
            if (document.getElementById(id[0]).value == 0)
            {
                alert("Some fields are missing! Fill them!!");
                exit;
            }
            for (i = 1; i <= 16; i++)
            {

                if (document.getElementById(id[i]).value == '')
                {
                    alert("Some fields are missing! Fill them!!");
                    exit;
                }
            }
            document.getElementById('step2').style.display = "none";
            document.getElementById('step3').style.display = "block";

        }
        function gotostepfour()
        {
            if (
                    (document.getElementById('t10th').value == 'S') ||
                    (document.getElementById('t12th').value == '') ||
                    (document.getElementById('photo').value == ''))
            {
                alert("Some fields are missing! Fill them!!");
                exit;
            }
            document.getElementById("reg_form").submit();
        }
        function prev(x, y)
        {

            document.getElementById(y).style.display = "none";
            document.getElementById(x).style.display = "block";
        }
    </script>

    <link rel="stylesheet" href="./css/jquery-ui.css" />
    <script src="./script/jquery-1.9.1.js"></script>
    <script src="./script/jquery-ui.js"></script>

    <script>
        $(function() {
            $("#datepicker").datepicker();
        });
    </script>
</head>

<table width='1000'  align="center">
    <tr><td>
            <h1> CANDIDATE REGISTRATION</h1>
            <form method="POST" action='candtpres.php' id="reg_form" enctype="multipart/form-data">
                <div id="step1" style="display:block">
                    <h2 style="text-align:center"> (STEP 1 OF 3)</h2>
                    <fieldset>
                        <legend style="color:#333333;font-family: Segoe UI,Arial,Verdana,Tahoma,sans-serif;
                                font-size: 20px;">  Personal Information:</legend>
                        <table width='900' align="center" >
                            <tr>
                                <td>
                                    <b>Select Gender:<span style="color:red;"> <em>*</em></span></b>
                                </td>
                                <td>
                                    <select name='Gender' style="width:100px" id="gender" required=required onfocus="Focus(this)" onblur="Blur(this)">
                                        <option value='S'>I am..</option>
                                        <option value='Mr'>Mr.</option>
                                        <option value='Ms'>Ms.</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Your Full Name:<span style="color:red;"> <em>*</em></span></b>
                                </td>

                                <td>
                                    <div class="js" id="4d"></div>
                                    <input type="text" class="txt" name="name" id="name" required=required placeholder=' Name' size="42" 
                                           onfocus="Focus(this)" onblur="Blur(this)">
                                    <div class="js" id="1d"></div>
                                </td>

                            </tr>

                            <tr>
                                <td>
                                    <b>Registration Number<span style="color:red;"> <em>*</em></span></b>
                                </td>
                                <td  >
                                    <input type="text" class="txt" id="regd" name="regd" required=required size=20  placeholder='Registration Number' 
                                           onfocus="Focus(this)" onblur="Blur(this)">
                                </td>
                            </tr>

                            <tr class="b">
                                <td><b>Father's Name:<span style="color:red;"> <em>*</em></span></td>
                                <td  >
                                    <input type="text" class="txt" id="fname" name="fname" required=required size=42  placeholder='Father`s Name'
                                           onfocus="Focus(this)" onblur="Blur(this)">
                                    <div class="js" id="2d"></div>
                                </td>
                            </tr>
                            <tr class="b">

                                <td><b> Date Of Birth:<span style="color:red;"> <em>*</em></span></b> </td>
                                <td  >
                                    <input type="text" name="date" required=required id="datepicker" placeholder="mm/dd/YYYY" />
                                    <div class="js" id="3d"></div>
                                </td>
                            </tr>
                            <tr class="b">
                                <td><b>Email ID:<span style="color:red;"> <em>*</em></span></td>
                                <td  >
                                    <input type="text" class="txt" id="email" required=required name="email" size=42  placeholder='Email ID'
                                           onfocus="Focus(this)" onblur="Blur(this)">
                                    <div class="js" id="2d"></div>
                                </td>
                            </tr>
                            <tr class="b">
                                <td><b>Permanent Address:<span style="color:red;"> <em>*</em></span></td>
                                <td  >
                                    <textarea class="txt" rows="5" name="padd" id="per" required=required  cols="41"></textarea>
                                    <div class="js" id="2d"></div>
                                </td>
                            </tr>

                            <tr class="b">
                                <td><b>Are the permanent and present address same?<span style="color:red;"> <em>*</em></span></td>
                                <td  onclick="address()">
                                    <input type="radio" value="Yes" name="add" required=required id="yes" onclick="address(id)">Yes
                                    <input type="radio" value="No" name="add"  required=required id="no" onclick="address(id)">No
                                    <div class="js" id="2d"></div>
                                </td>
                            </tr>
                            <tr class="b">
                                <td><b>Present Address:<span style="color:red;"> <em>*</em></span></td>
                                <td  >
                                    <textarea class="txt" rows="5" id="pre" name="pradd" cols="41"></textarea>
                                    <div class="js" id="2d"></div>
                                </td>
                            </tr>
                            <tr class="b">
                                <td><b>Mobile No:<span style="color:red;"> <em>*</em></span></td>
                                <td  >
                                    <input type="text" class="txt" id="mobile" required=required name="mobile" size=42  placeholder='Mobile'  
                                           onfocus="Focus(this)" onblur="Blur(this)">
                                    <div class="js" id="2d"></div>
                                </td>
                            </tr>
                            <tr class="b">
                                <td><b>Landline No:</td>
                                <td  >
                                    <input type="text" class="txt" id="land" name="land" size=42  placeholder='Landline'  
                                           onfocus="Focus(this)" onblur="Blur(this)">
                                    <div class="js" id="2d"></div>
                                </td>
                            </tr>
                        </table>
                        <table align=center>
                            <tr>
                                <td>

                                    <input type="reset" value="CLEAR">
                                    <input type="button" value="STEP 2 >>" onclick="gotosteptwo()"> 

                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </div>
                <div id="step2" style="display:none">
                    <h2 style="text-align:center"> (STEP 2 OF 3)</h2>
                    <fieldset>
                        <legend style="color:#333333;font-family: Segoe UI,Arial,Verdana,Tahoma,sans-serif;
                                font-size: 20px;">Academic Information:</legend>
                        <table width='900' align="center">
                            <tr>
                                <td>
                                    <b>UG/PG Pass out:<span style="color:red;"> <em>*</em></span></b>
                                </td>

                                <td>
                                    <div class="js" id="4d"></div>
                                    <select name="passout" id="S" onchange="changeme()" >
                                        <option value="0" selected="1">Year</option>
                                        <?php
                                        for ($i = 2013; $i <= 2030; $i++) {
                                            ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <div class="js" id="1d"></div>
                                </td>

                            </tr>
                            <tr class="b">
                                <td><b>Department:<span style="color:red;"> <em>*</em></span></td>
                                <td >
                                    <select name='dept' id='dept' >
                                        <option value='Information Technology'>Information Technology</option>
                                        <option value='Computer Science & Engineering'>Computer Science & Engineering</option>
                                        <option value='Electronics & Communication Engineering'>Electronics & Communication Engineering</option>
                                        <option value='Electrical & Electronics Engineering'>Electrical and Electronics Engineering</option>
                                        <option value='Mechanical Engineering'>Mechanical Engineering</option>
                                        <option value='Civil Engineering'>Civil Engineering</option>
                                        <option value='Electronics & Computer Engineering'>Electronics & Computer Engineering</option>
                                        <option value='Aeronautical Engineering'>Aeronautical Engineering</option>
                                        <option value='Master of Computer Applications'>Master of Computer Applications</option>
                                        <option value='Master of Business Administration'>Master of Business Administration</option>
                                        <option value='M.Tech Computer Science & Engineering'>M.Tech Computer Science & Engineering</option>
                                        <option value='M.Tech Machine Design'>M.Tech Machine Design</option>
                                        <option value='M.Tech Microwave and Communication Engineering'>M.Tech Microwave and Communication Engineering</option>
                                        <option value='M.Tech Power System Control & Automation'>M.Tech Power System Control & Automation</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="b">
                                <td><b>Academic Info:</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <table class="details" width="100%" border="1">
                                        <tr>
                                            <td class="degree" align="center">Degree:<span style="color:red;"> <em>*</em></span></td>
                                            <td>
                                                <table width="300">
                                                    <tr>
                                                        <td align="center">University/Board:<span style="color:red;"> <em>*</em></span></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td class="pass" align="center">Pass out:<span style="color:red;"> <em>*</em></span></td>
                                            <td>
                                                <table width="300">
                                                    <tr>
                                                        <td align="center">University/Institute:<span style="color:red;"> <em>*</em></span></td>
                                                    </tr>
                                                </table>
                                            </td>

                                            <td align="center">Marks/CGPA Obtained:<span style="color:red;"> <em>*</em></span></td>
                                            <td align="center">Total CGPA/Marks:<span style="color:red;"> <em>*</em></span></td>
                                            <td align="center">Equivalent %</td>

                                        </tr>
                                        <tr>
                                            <td align="center" >X</td>
                                            <td align="center"><textarea class="txt" required=required rows="3" id='Xboard' name="Xboard" cols="30"></textarea></td>
                                            <td align="center"><input type="text" class="txt" required=required  id="Xpass" name="Xpass" size=4  placeholder='YYYY'  onfocus="Focus(this)" onblur="Blur(this)"></td>

                                            <td align="center"><textarea class="txt" rows="3" name="Xschool" id="Xschool" required=required cols="30"></textarea></td>
                                            <td align="center"><input type="text" class="txt" id="XM" name="Xmks"  required=required size=4  placeholder='Marks/CGPA' ></td>
                                            <td align="center"><input type="text" class="txt" id="XT" name="Xtotal" required=required  size=4  placeholder='Total'  onblur="calcper('XM', 'XT', 'XP')"></td>
                                            <td align="center"><input type="text" class="txt" id="XP" name="Xper"  size=4  placeholder='%'  ></td>

                                        </tr>
                                        <tr>
                                            <td align="center" >XII/Equivalent Diploma</td>
                                            <td align="center"><textarea class="txt" name="XIIboard" id="XIIboard" required=required rows="3" cols="30"></textarea></td>
                                            <td align="center"><input type="text" class="txt" id="XIIpass" required=required name="XIIpass"  size=4  placeholder='YYYY'  onfocus="Focus(this)" onblur="Blur(this)"></td>
                                            <td align="center"><textarea class="txt" rows="3" id="XIIschool" name="XIIschool" required=required cols="30"></textarea></td>
                                            <td align="center"><input type="text" class="txt" id="XIIM" required=required name="XIImks"  size=4  placeholder='Marks/CGPA'  ></td>
                                            <td align="center"><input type="text" class="txt" id="XIIT" required=required name="XIItotal"  size=4  placeholder='Total' onblur="calcper('XIIM', 'XIIT', 'XIIP')"></td>
                                            <td align="center"><input type="text" class="txt" id="XIIP" name="XIIper"  size=4  placeholder='%'  ></td>

                                        </tr>
                                    </table>
                                    <br><hr><br>
                                    <table class="details" width="100%" border="1">
                                        <tr>
                                            <td class="degree" align="center">Degree:<span style="color:red;"> <em>*</em></span></td>
                                            <td>
                                                <table width="300">
                                                    <tr>
                                                        <td align="center">University/Board:<span style="color:red;"> <em>*</em></span></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td class="pass" align="center">Pass out:<span style="color:red;"> <em>*</em></span></td>
                                            <td>
                                                <table width="300">
                                                    <tr>
                                                        <td align="center">University/Institute:<span style="color:red;"> <em>*</em></span></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td align="center" >Marks/CGPA:<span style="color:red;"> <em>*</em></span></td>
                                            <td align="center">Equivalent %</td>

                                        </tr>
                                        <tr>
                                            <td align="center" >
                                                <select name='degree' style="width:100px" id="degree" onfocus="Focus(this)" onblur="Blur(this)">
                                                    <option value='B.Tech'>B.Tech</option>
                                                    <option value='MBA'>MBA</option>
                                                    <option value='MCA'>MCA</option>
                                                    <option value='M.Tech'>M.Tech</option>
                                                </select>
                                            </td>
                                            <td align="center"><textarea class="txt" rows="5" id='Dboard' name="Dboard" required=required cols="30"></textarea></td>
                                            <td align="center"><input type="text" class="txt" id="pass" required=required name="Dpass"  size=4  placeholder='YYYY'  onfocus="Focus(this)" onblur="Blur(this)"></td>
                                            <td align="center"><textarea disabled class="txt" rows="5" required=required cols="30">VIGNANA BHARATHI INSTITUTE OF TECHNOLOGY</textarea></td>

                                            <td align="center">
                                                <table class="details" width="300" border="1">
                                                    <tr align="center">
                                                        <td>I Year</td>
                                                        <td align="center">
                                                            <table class="details" width="100" border="1">
                                                                <tr align="center">
                                                                    <td colspan="2">I SEM</td>
                                                                </tr><tr align="center">
                                                                    <td><input type="text" class="txt" id="S1M" name="S1M" size=5  placeholder='MARKS'  onfocus="Focus(this)" onblur="Blur(this)"></td>
                                                                    <td><input type="text" class="txt" id="S1T" name="S1T" size=5  placeholder='TOTAL'  onfocus="Focus(this)" onblur="Blur(this)"></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td align="center">
                                                            <table class="details" width="100"  border="1">
                                                                <tr align="center">
                                                                    <td colspan="2">II SEM</td>
                                                                </tr><tr align="center">
                                                                    <td><input type="text" class="txt" id="S2M" name="S2M" size=5  placeholder='MARKS'  onfocus="Focus(this)" onblur="Blur(this)"></td>
                                                                    <td><input type="text" class="txt" id="S2T" name="S2T" size=5  placeholder='TOTAL'  onfocus="Focus(this)" onblur="Blur(this)"></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr align="center">
                                                        <td>II Year</td>
                                                        <td align="center">
                                                            <table class="details" width="100" border="1">
                                                                <tr align="center">
                                                                    <td colspan="2">I SEM</td>
                                                                </tr><tr>
                                                                    <td><input type="text" class="txt" id="S3M" name="S3M" size=5  placeholder='MARKS'  onfocus="Focus(this)" onblur="Blur(this)"></td>
                                                                    <td><input type="text" class="txt" id="S3T" name="S3T" size=5  placeholder='TOTAL'  onfocus="Focus(this)" onblur="Blur(this)"></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td align="center">
                                                            <table class="details" width="100"  border="1">
                                                                <tr align="center">
                                                                    <td colspan="2">II SEM</td>
                                                                </tr><tr align="center">
                                                                    <td><input type="text" class="txt" id="S4M" name="S4M" size=5  placeholder='MARKS'  onfocus="Focus(this)" onblur="Blur(this)"></td>
                                                                    <td><input type="text" class="txt" id="S4T" name="S4T" size=5  placeholder='TOTAL'  onfocus="Focus(this)" onblur="Blur(this)"></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr align="center">
                                                        <td>III Year</td>
                                                        <td align="center">
                                                            <table class="details" width="100" border="1">
                                                                <tr align="center">
                                                                    <td colspan="2">I SEM</td>
                                                                </tr><tr align="center">
                                                                    <td><input type="text" class="txt" id="S5M" name="S5M" size=5  placeholder='MARKS'  onfocus="Focus(this)" onblur="Blur(this)"></td>
                                                                    <td><input type="text" class="txt" id="S5T" name="S5T" size=5  placeholder='TOTAL'  onfocus="Focus(this)" onblur="Blur(this)"></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td align="center">
                                                            <table class="details" width="100"  border="1">
                                                                <tr align="center">
                                                                    <td colspan="2">II SEM</td>
                                                                </tr><tr align="center">
                                                                    <td><input type="text" class="txt" id="S6M" name="S6M" size=5  placeholder='MARKS'  onfocus="Focus(this)" onblur="Blur(this)"></td>
                                                                    <td><input type="text" class="txt" id="S6T" name="S6T" size=5  placeholder='TOTAL'  onfocus="Focus(this)" onblur="Blur(this)"></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr align="center">
                                                        <td>IV Year</td>
                                                        <td align="center">
                                                            <table class="details" width="100" border="1">
                                                                <tr align="center">
                                                                    <td colspan="2">I SEM</td>
                                                                </tr><tr>
                                                                    <td><input type="text" class="txt" id="S7M" name="S7M" size=5  placeholder='MARKS'  onfocus="Focus(this)" onblur="Blur(this)"></td>
                                                                    <td><input type="text" class="txt" id="S7T" name="S7T" size=5  placeholder='TOTAL'  onfocus="Focus(this)" onblur="Blur(this)"></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td align="center">
                                                            <table class="details" width="100"  border="1">
                                                                <tr align="center">
                                                                    <td colspan="2">II SEM</td>
                                                                </tr><tr align="center">
                                                                    <td><input type="text" class="txt" id="S8M" name="S8M" size=5  placeholder='MARKS'  onfocus="Focus(this)" onblur="Blur(this)"></td>
                                                                    <td><input type="text" class="txt" id="S8T" name="S8T" size=5  placeholder='TOTAL'  onfocus="Focus(this)" onblur="Blur(this)"></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>

                                                </table>
                                            </td>

                                            <td align="center"><input type="text" class="txt" id="UGPER" name="Dper" size=5  placeholder='%'  onfocus="Focus(this)" onblur="Blur(this)">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><b> Number of backlogs </b> </td>
                                            <td colspan="4"><input type="text" class="txt" id="2" name="backlog" size=50  placeholder='Backlogs(leave this field blank if you have none)'  onfocus="Focus(this)" onblur="Blur(this)"></td>
                                        </tr>
                                    </table>
                                    <table align=center>
                                        <tr>
                                            <td>
                                                <input type="button" value="<< STEP 1 " onclick="prev('step1', 'step2')"> 
                                                <input type="reset" value="CLEAR">
                                                <input type="button" value="STEP 3 >>" onclick="gotostepthree()"> 

                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                        </table>

                    </fieldset>
                </div>
                <div id="step3" style="display:none">
                    <h2 style="text-align:center"> (STEP 3 OF 3)</h2>
                    <fieldset>
                        <legend style="color:#333333;font-family: Segoe UI,Arial,Verdana,Tahoma,sans-serif;
                                font-size: 20px;">Uploads:</legend>
                        <table width='900' align="center" >
                            <tr>
                                <td>
                                    <b>Recent passport size photo<span style="color:red;"> <em>*</em></span></b>
                                </td>
                                <td  >
                                    <input type="file" name="photo" id="photo" required=required >
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>10th class marks memo<span style="color:red;"> <em>*</em></span></b>
                                </td>
                                <td  >
                                    <input type="file" name="t10th"  id="t10th" required=required >
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>12th/Intermediate marks memo<span style="color:red;"> <em>*</em></span></b>
                                </td>
                                <td  >
                                    <input type="file" name="t12th" id="t12th" required=required>
                                </td>
                            </tr>
                        </table>
                        <table align=center>
                            <tr>
                                <td>
                                    <input type="button" value="<< STEP 2 " onclick="prev('step2', 'step3')"> 
                                    <input type="reset" value="CLEAR">
                                    <input type="button" value="REGSITER >>" onclick="gotostepfour()"> 

                                </td>
                            </tr>
                        </table>
                    </fieldset>

            </form>
            </div>
            </pre>
</table>
</body>
</html>