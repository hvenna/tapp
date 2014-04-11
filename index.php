
<?php
require_once "error.php";
require_once("db_mysql_connect.php");
require_once "allpages.php";
require_once "dbconnect.php";

$query = "SELECT `Tphome`,`Placement`  FROM `tpce`";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_row($result);

$query1 = "SELECT `path`  FROM `listofimages`";
$result1 = mysqli_query($con, $query1);

$query2 = "SHOW TABLES FROM `trainingandplacement`";
$result2 = mysqli_query($con, $query2);

$query4 = "SELECT *  FROM `list`";
$result4 = mysqli_query($conn, $query4);
?>
<script>
  function Stopspeed(x)
  {
    if (x == 'set')
      document.getElementById('latest').scrollAmount = '0';
    else
      document.getElementById('latest').scrollAmount = '3';
  }

</script>

<pre id='contentS'><marquee behavior="scroll" direction="left"><?php echo $row[1]; ?></marquee></pre>
<table >
  <tr>
    <td style="width:25% ;text-align:center;">
      <div class="table_css"  style="width:350px;position:absolute;top:270px">
        <table  align=center>
          <tr>
            <td  style="width:20px;height:30px">LATEST </td>
          </tr>
          <tr>
            <td  style="width:20px;height:30px;text-align:left"><marquee id="latest"
                                                                       onmouseover="Stopspeed('set')" onmouseout="Stopspeed('leave')" class="Latest" behavior="scroll" direction="up" scrollamount="3">		<br>
            <br>
            <hr>
            <br>
            <?php
            $date = date("Y-m-d");
            $datetime1 = date_create($date);
            while ($row2 = mysqli_fetch_array($result2)) {
              if ($row2[0] == 'listoffiles') {
                ?>
                <?php
                $query3 = "SELECT *  FROM `listoffiles`";
                $result3 = mysqli_query($con, $query3);

                while ($row3 = mysqli_fetch_array($result3)) {
                  $DOC = $row3['DOC'];
                  $datetime2 = date_create($DOC);
                  $interval = date_diff($datetime1, $datetime2);
                  $diff = $interval->format('%a');

                  if ($diff <= 10) {
                    ?>
                    <a target='_blank' href="./downloadfiles.php?x=<?php echo $row3[4]; ?>" style="color:#333333"  >New Material '<?php echo $row3[3]; ?>' added in '<?php echo $row3[4]; ?>' section</a>
                    <br>
                    <br>
                    <hr>
                    <br>

                    <?php
                  }
                }
              }
              if ($row2[0] == 'listoffilesforpp') {
                $query3 = "SELECT *  FROM `listoffilesforpp`";
                $result3 = mysqli_query($con, $query3);
                while ($row3 = mysqli_fetch_array($result3)) {
                  $DOC = $row3['DOC'];
                  $datetime2 = date_create($DOC);
                  $interval = date_diff($datetime1, $datetime2);
                  $diff = $interval->format('%a');

                  if ($diff <= 10) {
                    ?>
                    New Placement Paper '<?php echo $row3[3]; ?>' added in '<?php echo $row3[4]; ?>' section
                    <br>
                    <br>
                    <hr>
                    <br>

                    <?php
                  }
                }
              }
            }
            while ($row4 = mysqli_fetch_array($result4)) {
              $DOC = $row4['DOC'];
              $datetime2 = date_create($DOC);
              $interval = date_diff($datetime1, $datetime2);
              $diff = $interval->format('%a');

              if ($diff <= 10) {
                ?>
                New Quiz '<?php echo $row4[0]; ?>' added in '<?php
                if ($row4[1] == '0')
                  echo "Practice Test";
                else
                  echo "Real Test";
                ?>' section
                <br>
                <br>
                <hr>
                <br>

                <?php
              }
            }
            ?>	
          </marquee></td>
          </tr>
          <tr style="background: none;border: none;"><td style="border: none;">&nbsp;</td></tr>
          <tr>
            <td  style="width:20px;height:30px;text-align:left"><marquee  class="Latest" behavior="scroll" direction="up" scrollamount="3">
            <img src="./pics/TCS.jpg" alt="TCS" height="342" width="332"> 
            <img src="./pics/adp.jpg" alt="ADP" height="342" width="332">
            <img src="./pics/infotech_logo.jpg" alt="infotech_logo" height="342" width="332"> 
            <img src="./pics/intergraph.png" alt="intergraph" height="342" width="332"> 							
            <img src="./pics/EXL%20Infotel.jpg" alt="EXL Infotel" height="342" width="332"> 
            <img src="./pics/Genpact-Logo.jpg" alt="Genpact-Logo" height="342" width="332"> 
            <img src="./pics/Sutherland-Global-Services.jpg" alt="Sutherland-Global-Services" height="342" width="332"> 

            <img src="./pics/forun-express-courier-cargo-ltd.jpg" alt="forun-express" height="342" width="332"> 
            <img src="./pics/hdfc.jpg" alt="hdfc.jpg" height="342" width="332"> 

            <img src="./pics/shivashakti.png" alt="shivashakti" height="342" width="332"> 
            <img src="./pics/techmahindra.jpg" alt="techmahindra" height="342" width="332"> 
            <img src="./pics/wisdom.jpg" alt="wisdom" height="342" width="332"> 

            </td>
            </tr>
            </table>
            </td>
            <td style="width:60%;"><p style="max-width:90%!important;"><?php echo $row[0]; ?></p></td>
            <td style="width:15%;vertical-align:top;"><?php
              if ($_SESSION['username']) {
                
              }
              else {
                ?><h2>Login</h2><form method="POST" action='verif.php'>
                  <table width='200' align="center">
                    <tr>
                      <td><b>Regd No:</td>
                      <td>
                        <input type="text" class="txt" name="us1" id="1" required=required placeholder='Regd No' size="20" onfocus="Focus(this)" onblur="Blur(this)">
                        <div class="js" id="1d"></div>
                      </td>
                    </tr>
                    <tr class="b">
                      <td><b> Password:</td>
                      <td>
                        <input type="password" class="txt" id="2" name="p1" required=required size=20  placeholder='Password'  onfocus="Focus(this)" onblur="Blur(this)" >
                        <div class="js" id="2d"></div>
                      </td>
                    </tr>
                    <tr class="b">
                      <td><b> Role:</td>
                      <td>
                        <select>
                          <option>Student</option>
                          <option>Admin / TP officer</option>
                          <option>Faculty</option>
                        </select>
                      </td>
                    </tr>
                    <tr class="b">
                      <td></td>
                      <td>
                        <pre> <a class="pwd" href="./forgotpwd.php"> Forgot Password? </a></pre>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <input type="Submit"  id="S" value="submit" name="OK" class="btn">
                      </td>
                      <td>	
                        <input type="Reset"  value="Cancel" name="Cancel" class="btn">
                      </td>
                    </tr>
                  </table>
                </form><?php } ?></td>
            </tr>
        </table>



        </body>
        </html>