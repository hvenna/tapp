<?php
include_once "error.php";
include_once "allpages.php";
include_once "dbconnect.php";
?>
<?php
session_start();
if (!$_SESSION['username']) {
    ?>
    <div id='contentL'>
        <table border='1'><tr><td>
                    <h1> FORGOT PASSWORD?</h1>

                    <?php
                    $_SESSION['us1'] = $_POST[us1];
                    $query = "SELECT `Email` FROM `student details` WHERE  `RegdNo`='$_POST[us1]'";
                    $result = mysqli_query($con, $query);
                    if ($row = mysqli_fetch_array($result)) {
                        $mail = $row[0];
                        $p1 = substr($mail, 0, 3);
                        $p2 = strstr($mail, '@');
                        $p3 = strstr($mail, '@', true);
                        $p4 = substr($p3, -3);
                        for ($p5 = 1; $p5 <= strlen($p3) - 6; $p5++)
                            $p1 = $p1 . '*';
                        $p1 = $p1 . $p4;
                        $p1 = $p1 . $p2;
                    }
                    if ($row[0] == '') {
                        ?>
                        <pre> We have no details of you. Please register. </pre> 
                    <?php
                    } else {
                        ?>
                        <pre> 
        			Hello <?php echo $_POST[us1]; ?>, 
        			Your new Password details has been sent to your registered email <pre style="color:#333333;font-family : 'Segoe UI',Arial,sans-serif;font-size: 16px">    <?php echo $p1; ?></pre></pre>
                        <!-- MAIL TO THE PERSON-->
            </table></tr></td>
    <?php } ?>
    </div>
    </body>
    </html><?php } else {
    ?> 
    <html><pre> A user <?php echo $_SESSION['username']; ?> is already logged in. <a href="./logout.php">Logout </a><?php $_SESSION['username'] ?>, to sign in as a different user</html>
<?php } ?>