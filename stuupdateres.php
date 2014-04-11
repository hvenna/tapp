<?php
include_once "error.php";
include_once "allpages.php";
include_once "dbconnect.php";
if ($_SESSION['username'] != "admin@tp") {
    echo "<pre>You dont have permissions to view this page.";
    exit;
}
$x = $_POST['regdno'];
if ($x != '')
    $_SESSION['id'] = $x;
if ($x == '')
    $x = $_SESSION['id'];
$query = "SELECT *
FROM `student details` , `12th details` , `ugpg info` , `tenth info` , `uploads`
WHERE `student details`.`Regdno` = '$x'
AND `12th details`.`Regdno` = '$x'
AND `ugpg info`.`Regdno` = '$x'
AND `tenth info`.`Regdno` = '$x'
AND `uploads`.`Regdno` = '$x'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
if ($row[0] > 0) {
    ?>
    <head>

        <style type="text/css">
            table.details {
                border-width: 1px;
                border-collapse: collapse;
            }

            td.pass{
                padding:10px;}
            </style>
            <script>
                function change()
                {

                    document.getElementById('regd').disabled = false;
                }
                function update_me(x)
                {
                    window.open(x, "uploadwind", "width=800,height=200,scrollbars=no");
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
                    <form method="POST" action='studentupdated.php' enctype="multipart/form-data">
                        <fieldset>
                            <legend> <b>Photo: </b></legend>
                            <table width='900' align="center" >
                                <tr>
                                    <td><h1><?php echo $x; ?><br>(<?php echo $row[Name]; ?>)</h1></td>
                                    <td> <img src="<?php echo $row[49]; ?>" alt="Photo" height="150" width="150"> </td>
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend> <b> Personal Information: </b></legend>
                            <table width='900' align="center" >
                                <tr>
                                    <td>
                                        <b>Gender</b>
                                    </td>
                                    <td>
                                        <select name='Gender' style="width:100px" id="4" onfocus="Focus(this)" onblur="Blur(this)">
                                        <option value='S'>I am..</option>
                                        <?php if ($row[gender] == 1) { ?>
                                            <option value='Mr' selected >Mr.</option>
                                            <option value='Ms'>Ms.</option>
                                            <?php
                                        } else {
                                            ?>
                                            <option value='Mr'>Mr.</option>
                                            <option value='Ms' selected >Ms.</option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Name:</b>
                                </td>
                                <td>
                                    <div class="js" id="4d"></div>
                                    <input type="text" class="txt" name="name" value="<?php echo $row[Name]; ?> " id="1" placeholder=' Name' size="42" 
                                           onfocus="Focus(this)" onblur="Blur(this)">
                                    <div class="js" id="1d"></div>
                                </td>

                            </tr>

                            <tr>
                                <td>
                                    <b>Registration Number</b>
                                </td>
                                <td  >
                                    <input type="text" class="txt" id="regd" name="regd" size=20 disabled  placeholder='Registration Number' 
                                           value="<?php echo $row[RegdNo]; ?>" onfocus="Focus(this)" onblur="Blur(this)">
                                </td>
                            </tr>

                            <tr class="b">
                                <td><b>Father's Name:</td>
                                <td  >
                                    <input type="text" class="txt" id="2" name="fname" size=42  placeholder='Father`s Name'
                                           value="<?php echo $row[Father]; ?> "
                                           onfocus="Focus(this)" onblur="Blur(this)">
                                    <div class="js" id="2d"></div>
                                </td>
                            </tr>
                            <tr class="b">

                                <td><b> Date Of Birth: </b> </td>
                                <td>
                                    <?php
                                    $date1 = explode("-", $row[DOB]);
                                    $DOB = $date1[1] . "/" . $date1[2] . "/" . $date1[0];
                                    ?>
                                    <input type="text" name="date" id="datepicker" placeholder="mm/dd/YYYY"
                                           value="<?php echo $DOB; ?>"				/>
                                    <div class="js" id="3d"></div>
                                </td>
                            </tr>
                            <tr class="b">
                                <td><b>Email ID:</td>
                                <td  >
                                    <input type="text" class="txt" id="2" name="email" size=42  placeholder='Email ID'
                                           value="<?php echo $row[Email]; ?>"
                                           onfocus="Focus(this)" onblur="Blur(this)">
                                    <div class="js" id="2d"></div>
                                </td>
                            </tr>
                            <tr class="b">
                                <td><b>Permanent Address:</td>
                                <td  >
                                    <textarea class="txt" rows="5" name="padd" cols="41"><?php echo $row[PerAddress]; ?></textarea>
                                    <div class="js" id="2d"></div>
                                </td>
                            </tr>

                            <tr class="b">
                                <td><b>Are the permanent and present address same?</td>
                                <td  >
                                    <input type="radio" value="Yes" name="add">YES
                                    <input type="radio" value="No" name="add">NO
                                    <div class="js" id="2d"></div>
                                </td>
                            </tr>
                            <tr class="b">
                                <td><b>Present Address:</td>
                                <td  >
                                    <textarea class="txt" rows="5" name="pradd" cols="41"><?php echo $row[preAddress]; ?></textarea>
                                    <div class="js" id="2d"></div>
                                </td>
                            </tr>
                            <tr class="b">
                                <td><b>Mobile No:</td>
                                <td  >
                                    <input type="text" class="txt" id="2" name="mobile" size=42  placeholder='Mobile' 
                                           value="<?php echo $row[Mobile]; ?>" 
                                           onfocus="Focus(this)" onblur="Blur(this)">
                                    <div class="js" id="2d"></div>
                                </td>
                            </tr>
                            <tr class="b">
                                <td><b>Landline No:</td>
                                <td  >
                                    <input type="text" class="txt" id="2" name="land" size=42  placeholder='Landline'  
                                           onfocus="Focus(this)" onblur="Blur(this)">
                                    <div class="js" id="2d"></div>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                    <fieldset>
                        <legend> <b>Academic Information: </b></legend>
                        <table width='900' align="center">
                            <tr>
                                <td>
                                    <b>UG/PG Pass out:</b>
                                </td>

                                <td>
                                    <div class="js" id="4d"></div>
                                    <select name="passout" id="S">
                                        <option value="0" selected="1">Year</option>
                                        <?php
                                        for ($i = 2013; $i <= 2030; $i++) {
                                            if ($row[19] == $i) {
                                                ?>
                                                <option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
                                            <?php } else {
                                                ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <div class="js" id="1d"></div>
                                </td>

                            </tr>
                            <tr class="b">
                                <td><b>Department</td>
                                <td>
                                    <?php
                                    $dept = array("Information Technology", "Computer Science & Engineering", "Electronics & Communication Engineering", "Electrical & Electronics Engineering",
                                        "Mechanical Engineering", "Civil Engineering", "Electronics & Computer Engineering", "Aeronautical Engineering", "Master of Computer Applications",
                                        "Master of Business Administration", "M.Tech Computer Science & Engineering", "M.Tech Machine Design", "M.Tech Microwave and Communication Engineering",
                                        "M.Tech Power System Control & Automation");
                                    ?>
                                    <select name='dept' >
                                        <?php
                                        for ($i = 0; $dept[$i] != ""; $i++) {
                                            if (strtoupper($dept[$i]) == $row[dept]) {
                                                ?>
                                                <option value="<?php echo $row[dept]; ?>" selected ><?php echo $row[dept]; ?> </option>
                                            <?php } else {
                                                ?>
                                                <option value="<?php echo $dept[$i]; ?>"><?php echo $dept[$i]; ?> </option>
                                            <?php }
                                        }
                                        ?>
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
                                            <td class="degree" align="center">Degree</td>
                                            <td>
                                                <table width="300">
                                                    <tr>
                                                        <td align="center">University/Board</td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td class="pass" align="center">Pass out</td>
                                            <td>
                                                <table width="300">
                                                    <tr>
                                                        <td align="center">University/Institute</td>
                                                    </tr>
                                                </table>
                                            </td>

                                            <td align="center">Marks/CGPA Obtained</td>
                                            <td align="center">Total CGPA/Marks</td>
                                            <td align="center">Equivalent %</td>

                                        </tr>
                                        <tr>
                                            <td align="center" >X</td>
                                            <td align="center"><textarea class="txt" rows="3" name="Xboard" cols="30"> <?php echo $row[42]; ?></textarea></td>
                                            <td align="center"><input type="text" class="txt" id="2" name="Xpass" 
                                                                      value="<?php echo $row[43]; ?>"
                                                                      size=4  placeholder='YYYY'  onfocus="Focus(this)" onblur="Blur(this)"></td>

                                            <td align="center"><textarea class="txt" rows="3" name="Xschool"  cols="30"><?php echo $row[47]; ?></textarea></td>

                                            <td align="center"><input type="text" class="txt" id="2" name="Xmks"  size=4  
                                                                      value="<?php echo $row[44]; ?>" placeholder='Marks/CGPA'  onfocus="Focus(this)" onblur="Blur(this)"></td>

                                            <td align="center"><input type="text" class="txt" id="2" name="Xtotal"  
                                                                      value="<?php echo $row[45]; ?>" size=4  placeholder='Total'  onfocus="Focus(this)" onblur="Blur(this)"></td>

                                            <td align="center"><input type="text" class="txt" id="2" name="Xper"  
                                                                      value="<?php echo $row[46]; ?>" size=4  placeholder='%'  onfocus="Focus(this)" onblur="Blur(this)"></td>

                                        </tr>
                                        <tr>
                                            <td align="center" >XII/Equivalent Diploma</td>

                                            <td align="center"><textarea class="txt" name="XIIboard" rows="3" cols="30"><?php echo $row[10]; ?></textarea></td>

                                            <td align="center"><input type="text" class="txt" id="2" name="XIIpass"  size=4  placeholder='YYYY' 
                                                                      value="<?php echo $row[11]; ?>" onfocus="Focus(this)" onblur="Blur(this)"></td>

                                            <td align="center"><textarea class="txt" rows="3" name="XIIschool"  cols="30"><?php echo $row[15]; ?></textarea></td>

                                            <td align="center"><input type="text" class="txt" id="2" name="XIImks"  size=4 
                                                                      value="<?php echo $row[12]; ?>"placeholder='Marks/CGPA'  onfocus="Focus(this)" onblur="Blur(this)"></td>

                                            <td align="center"><input type="text" class="txt" id="2" name="XIItotal"  size=4  
                                                                      value="<?php echo $row[13]; ?>" placeholder='Total'  onfocus="Focus(this)" onblur="Blur(this)"></td>

                                            <td align="center"><input type="text" class="txt" id="2" name="XIIper"  size=4  
                                                                      value="<?php echo $row[14]; ?>"placeholder='%'  onfocus="Focus(this)" onblur="Blur(this)"></td>

                                        </tr>
                                    </table>
                                    <br><hr><br>
                                    <table class="details" width="100%" border="1">
                                        <tr>
                                            <td class="degree" align="center">Degree</td>
                                            <td>
                                                <table width="300">
                                                    <tr>
                                                        <td align="center">University/Board</td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td class="pass" align="center">Pass out</td>
                                            <td>
                                                <table width="300">
                                                    <tr>
                                                        <td align="center">University/Institute</td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td align="center" >Marks/CGPA </td>
                                            <td align="center">Equivalent %</td>

                                        </tr>
                                        <tr>
                                            <td align="center" >
                                                <select name='degree' style="width:100px" id="4" onfocus="Focus(this)" onblur="Blur(this)">
    <?php if ($row[17] == 'B.Tech') { ?>
                                                        <option value='B.Tech' selected>B.Tech</option>
                                                        <option value='MBA'>MBA</option>
                                                        <option value='MCA'>MCA</option>
                                                        <option value='M.Tech'>M.Tech</option>
                                                    <?php } else if ($row[17] == 'M.Tech') {
                                                        ?>
                                                        <option value='B.Tech'>B.Tech</option>
                                                        <option value='MBA'>MBA</option>
                                                        <option value='MCA'>MCA</option>
                                                        <option value='M.Tech' selected >M.Tech</option>
                                                    <?php } else if ($row[17] == 'MCA') {
                                                        ?>
                                                        <option value='B.Tech'>B.Tech</option>
                                                        <option value='MBA'>MBA</option>
                                                        <option value='MCA' selected>MCA</option>
                                                        <option value='M.Tech'>M.Tech</option>
                                                        <?php
                                                    } else {
                                                        ?><option value='B.Tech'>B.Tech</option>
                                                        <option value='MBA' selected>MBA</option>
                                                        <option value='MCA'>MCA</option>
                                                        <option value='M.Tech'>M.Tech</option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </td>
                                            <td align="center"><textarea class="txt" rows="5" name="Dboard" cols="30"><?php echo $row[18]; ?></textarea></td>

                                            <td align="center"><input type="text" class="txt" id="pass"  name="Dpass" 
                                                                      value="<?php echo $row[19]; ?>" size=4  placeholder='YYYY'  onfocus="Focus(this)" onblur="Blur(this)"></td>

                                            <td align="center"><textarea disabled class="txt" rows="5" cols="30">P V P SIDDHARTHA INSTITUTE OF TECHNOLOGY</textarea></td>

                                            <td align="center">
                                                <table class="details" width="300" border="1">
                                                    <tr align="center">
                                                        <td>I Year</td>
                                                        <td align="center">
                                                            <table class="details" width="100" border="1">
                                                                <tr align="center">
                                                                    <td colspan="2">I SEM</td>
                                                                </tr><tr align="center">
                                                                    <td><input type="text" class="txt" id="2" name="S1M" size=5  placeholder='MARKS' value="<?php echo $row[20]; ?>"  onfocus="Focus(this)" onblur="Blur(this)"></td>
                                                                    <td><input type="text" class="txt" id="2" name="S1T" size=5  placeholder='TOTAL'  value="<?php echo $row[28]; ?>" onfocus="Focus(this)" onblur="Blur(this)"></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td align="center">
                                                            <table class="details" width="100"  border="1">
                                                                <tr align="center">
                                                                    <td colspan="2">II SEM</td>
                                                                </tr><tr align="center">
                                                                    <td><input type="text" class="txt" id="2" name="S2M" size=5  placeholder='MARKS'  value="<?php echo $row[21]; ?>" onfocus="Focus(this)" onblur="Blur(this)"></td>
                                                                    <td><input type="text" class="txt" id="2" name="S2T" size=5  placeholder='TOTAL'  value="<?php echo $row[29]; ?>" onfocus="Focus(this)" onblur="Blur(this)"></td>
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
                                                                    <td><input type="text" class="txt" id="2" name="S3M" size=5  placeholder='MARKS'  value="<?php echo $row[22]; ?>" onfocus="Focus(this)" onblur="Blur(this)"></td>
                                                                    <td><input type="text" class="txt" id="2" name="S3T" size=5  placeholder='TOTAL'  value="<?php echo $row[30]; ?>" onfocus="Focus(this)" onblur="Blur(this)"></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td align="center">
                                                            <table class="details" width="100"  border="1">
                                                                <tr align="center">
                                                                    <td colspan="2">II SEM</td>
                                                                </tr><tr align="center">
                                                                    <td><input type="text" class="txt" id="2" name="S4M" size=5  placeholder='MARKS'  value="<?php echo $row[23]; ?>" onfocus="Focus(this)" onblur="Blur(this)"></td>
                                                                    <td><input type="text" class="txt" id="2" name="S4T" size=5  placeholder='TOTAL'  value="<?php echo $row[31]; ?>" onfocus="Focus(this)" onblur="Blur(this)"></td>
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
                                                                    <td><input type="text" class="txt" id="2" name="S5M" size=5  placeholder='MARKS'  value="<?php echo $row[24]; ?>" onfocus="Focus(this)" onblur="Blur(this)"></td>
                                                                    <td><input type="text" class="txt" id="2" name="S5T" size=5  placeholder='TOTAL'  value="<?php echo $row[32]; ?>" onfocus="Focus(this)" onblur="Blur(this)"></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td align="center">
                                                            <table class="details" width="100"  border="1">
                                                                <tr align="center">
                                                                    <td colspan="2">II SEM</td>
                                                                </tr><tr align="center">
                                                                    <td><input type="text" class="txt" id="2" name="S6M" size=5  placeholder='MARKS'  value="<?php echo $row[25]; ?>" onfocus="Focus(this)" onblur="Blur(this)"></td>
                                                                    <td><input type="text" class="txt" id="2" name="S6T" size=5  placeholder='TOTAL'  value="<?php echo $row[33]; ?>" onfocus="Focus(this)" onblur="Blur(this)"></td>
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
                                                                    <td><input type="text" class="txt" id="2" name="S7M" size=5  placeholder='MARKS'  value="<?php echo $row[26]; ?>" onfocus="Focus(this)" onblur="Blur(this)"></td>
                                                                    <td><input type="text" class="txt" id="2" name="S7T" size=5  placeholder='TOTAL'  value="<?php echo $row[34]; ?>" onfocus="Focus(this)" onblur="Blur(this)"></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td align="center">
                                                            <table class="details" width="100"  border="1">
                                                                <tr align="center">
                                                                    <td colspan="2">II SEM</td>
                                                                </tr><tr align="center">
                                                                    <td><input type="text" class="txt" id="2" name="S8M" size=5  placeholder='MARKS'  value="<?php echo $row[27]; ?>" onfocus="Focus(this)" onblur="Blur(this)"></td>
                                                                    <td><input type="text" class="txt" id="2" name="S8T" size=5  placeholder='TOTAL'  value="<?php echo $row[35]; ?>" onfocus="Focus(this)" onblur="Blur(this)"></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>

                                                </table>
                                            </td>

                                            <td align="center"><input type="text" class="txt" id="2" name="Dper" size=5  placeholder='%'  value="<?php echo $row[38]; ?>" onfocus="Focus(this)" onblur="Blur(this)">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><b> Number of backlogs </b> </td>
                                            <td colspan="4"><input type="text" class="txt" id="2" name="backlog" size=50 
                                                                   value="<?php echo $row[backlog]; ?>"placeholder='Backlogs'  onfocus="Focus(this)" onblur="Blur(this)"></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                        </table>

                    </fieldset>
                    <fieldset>
                        <legend> <b>Certificates:(X and XII) </b></legend>
                        <table width='900' align="center" >
                            <tr>
                                <td> <img src="<?php echo $row[50]; ?>" alt="X" height="350" width="350"> </td>
                                <td> <img src="<?php echo $row[51]; ?>" alt="XII" height="350" width="350"> </td>
                            </tr>
                        </table>
                    </fieldset>
                    <fieldset>
                        <legend> <b>Uploads: </b></legend>
                        <table width='900' align="center" >
                            <tr>
                                <td>
                                    <b>Recent passport size photo</b>
                                    <a href="<?php echo $row[49]; ?>"  target="_blank">click here</a> to view <?php echo $row[RegdNo]; ?>'s photo .
                                </td>
                                <td>
                                    <a onclick="update_me(id)" href='#' id="./updateuploads.php?x=1/<?php echo $row[RegdNo]; ?>">click here</a> to upload a new photo.
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>10th class marks memo</b>
                                    <a href="<?php echo $row[50]; ?>" target="_blank">click here</a> to view <?php echo $row[RegdNo]; ?>'s 10th class marks memo.
                                </td>
                                <td  >
                                    <a onclick="update_me(id)" href='#' id="./updateuploads.php?x=2/<?php echo $row[RegdNo]; ?>" >click here</a> to upload a new 10th class marks memo.
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>12th/Intermediate marks memo</b>
                                    <a  href="<?php echo $row[51]; ?>"  target="_blank" >click here</a> to view <?php echo $row[RegdNo]; ?>'s 12th/Intermediate marks memo.
                                </td>
                                <td  >
                                    <a onclick="update_me(id)" href='#' id="./updateuploads.php?x=3/<?php echo $row[RegdNo]; ?>">click here</a> to upload a new 12th class marks memo.
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                    <tr align="center">
                        <td>
                            <input type="submit" value="UPDATE" onclick="change()">

                        </td>
                    </tr>
                </form>
                </pre>
    </table></tr></td>

    </body>
    </html> 
    <?php
} else {
    echo "<pre> 
	There are no details of " . $x . ". 
	This problem may be due to one of the following reasons:
		-The candidate " . $x . " is not yet a part of this portal.
		-The candidate " . $x . " has not yet completed his/her Candidate Registration process.</pre> ";
}?>