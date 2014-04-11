<?php
include_once "error.php";
session_start();
$user_name = "root";
$password = "";
$database = "addressbook";
$server = "127.0.0.1";
$con1 = mysqli_connect($server, $user_name, $password, "trainingandplacement");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$query = "SELECT count(*) FROM `persons` WHERE `Acc`='0' ";
$result = mysqli_query($con1, $query);
if (!$result) {
  print("Erro- no query");
  $error = mysql_error();
  print"<p>" . $error . "<p>";
  exit;
}
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <meta name="generator" content="">
    <meta name="created" content="">
    <meta name="description" content="Training and Placement Portal for Vignana Bharati Institute of Technology">
    <meta name="keywords" content="">
    <title>TRAINING AND PLACEMENT </title>
    <link href="./css/styles.css" rel="stylesheet" type="text/css">
    <link href="./css/my.css" rel="stylesheet" type="text/css">
    <link href="./css/table_css.css" rel="stylesheet" type="text/css">


  </head>
  <body>
    <div id="allpages">
      <img src="./pics/home.jpg" width="100%">
<?php
if ($_SESSION['username']) {

  if ($_SESSION['username'] != 'admin@tp') {
    $q1 = "SELECT `check` FROM `persons` WHERE `Username`='$_SESSION[username]'";
    $r1 = mysqli_query($con1, $q1);
    $res = mysqli_fetch_array($r1);
    ?>

          <div id='contentLog'><a style="font-size:12px;font-family: Segoe UI,Arial,Verdana,Tahoma,sans-serif;background-color: transparent;"><span>LOGGED IN AS <?php echo $_SESSION['name']; ?></span></a>&nbsp;&nbsp;&nbsp;<a href='./logout.php'>Logout </a></div><br>

          <div id='cssmenu'>
            <ul>
              <li><a href='./index.php'><span>Home</span></a></li>

    <?php
    if (!$_SESSION['username']) {
      echo"<li>";
      echo"<a href='./login.php'><span>Login</span></a>";
      echo"</li>";
    }
    else {
      echo"<li class='has-sub'>";
      echo"<a href='#'><span>Profile</span></a>";
      echo"<ul>";
      echo "<li><a href='./viewform.php?x=$res[0]'><span>View My 	Details</span></a></li>";
      echo "<li class='last'><a href='./changep.php'><span>Change Password</span></a></li>";
      //echo "<li class='last'><a href='./logout.php'><span>Logout</span></a></li>";
      echo"</ul>";
      echo"</li>";
    }
    ?>
              </li>
              <li class='last'><a href='./events.php'><span>Events</span></a></li>
              <li><a href='./listoffilesPP.php'><span>Previous Papers</span></a></li>
              <li><a href='./listoffiles.php'><span>Materials</span></a></li>
              <li class='has-sub'><a href='#' id='Online Exams'><span>Online Exams</span></a>
                <ul>
                  <li><a href='./startt.php' id='With Timer'><span>Real Test</span></a></li>
                  <li class='last'><a href='./startnt.php' id='Without Timer'><span>Practice Test</span></a></li>
                </ul>
              </li>
			  <li class='last'><a href='./about-us.php'><span>About Us</span></a></li>
              <li class='last'><a href='./contact.php'><span>Contact Us</span></a></li>
            </ul>
          </div><?php
        }
        else {
          if ($row[0] > 0) {
            ?>
            <div id='contentReg'><a class="A" href='./acceptver.php'>Hello Admin! You have <?php echo $row[0]; ?> new requst(s).</a></div><br> <?php } ?>
          <div id='contentLog'><a style="font-size:12px;font-family: Segoe UI,Arial,Verdana,Tahoma,sans-serif;background-color: transparent;"><span>LOGGED IN AS <?php echo $_SESSION['name']; ?></span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='./logout.php'>Logout </a></div><br>
          <div id='cssmenu'>
            <ul>
              <li class='has-sub'><a href='index.php'><span>Home</span></a>
                <ul>
                  <!--<li><a href='./index.php'><span>View T & P Home</span></a></li>-->
                  <li class='last'><a href='./tpceupd.php'><span>Update Home</span></a></li>

                </ul></li>
				<li class="has-sub"><a href="#">Events</a>
				<ul>
					<li class='last'><a href='./events.php'><span>View Events</span></a></li>
					<li class='last'><a href='./eveupd.php'><span>Update Events</span></a></li>
				</ul></li>
              <li class='has-sub'><a href='#'><span>Profile</span></a>
                <ul>
                  <li class="last"><a href='./adminchangep.php'><span>Change Password </span></a></li>
                  <!--<li class='last'><a href='./logout.php'><span>Admin Logout</span></a></li>-->

                </ul>
              <li class='has-sub'><a href='#'><span>Students' Details</span></a>
                <ul>
                  <li><a href='./views.php'><span>View Students' Details</span></a></li>
                  <li><a href='./stuupdatereq.php'><span>Update Students' Details</span></a></li>
                  <li class='last'><a href='./deletes.php'><span>Remove Students' Details</span></a></li>
                </ul>
              <li class='has-sub'><a href='#'><span>Previous Papers</span></a>
                <ul>
                  <li><a href='./listoffilesPP.php'><span>View Previous Papers</span></a></li>
                  <li class='last'><a href='./Uploadpapers.php'><span>Upload Previous Papers</span></a></li>
                  <li class='last'><a href='./deletepapers.php'><span>Delete Previous Papers</span></a></li>
                  <li class='last'><a href='./addcatpp.php'><span>Add Company</span></a></li>
                  <li class='last'><a href='./editcatpp.php'><span>Edit Company</span></a></li>
                  <li class='last'><a href='./deletcatpp.php'><span>Delete Company</span></a></li>
                </ul>
              </li>
              <li class='has-sub'><a href='#'><span>Materials</span></a>
                <ul>
                  <li><a href='./listoffiles.php'><span>View Materials</span></a></li>
                  <li class='last'><a href='./uploadfiles.php'><span>Upload Materials	</span></a></li>
                  <li class='last'><a href='./deletefiles.php'><span>Delete Materials</span></a></li>
                  <li class='last'><a href='./addcatm.php'><span>Add Category</span></a></li>
                  <li class='last'><a href='./editcatm.php'><span>Edit Category</span></a></li>
                  <li class='last'><a href='./deletcatm.php'><span>Delete Category</span></a></li>

                </ul>
              </li>
              <li class='has-sub'><a href='#'><span>Online Exams</span></a>
                <ul>
                  <li><a href='./listofquiz.php'><span>View Online Exams</span></a></li>
                  <li><a href='./create.php'><span>Add  Online Exams</span></a></li>
                  <li><a href='./deleteexam.php'><span>Remove Online Exams</span></a></li>
                  <li><a href='./reuire.php'><span>Results</span></a></li>

                </ul>
              </li>
              <li class='has-sub'><a href='#'><span>Export</span></a>
                <ul>
                  <li><a href='./exportreq.php'><span>Export Data</span></a></li>
                  <li class='last'><a href='./download.php'><span>Download Older Versions</span></a></li>
                </ul>
              </li>
			  <li class="has-sub"><a href="#">About Us</a>
			  <ul>
			  <li class='last'><a href='./about-us.php'><span>View About Us</span></a></li>
			  <li class='last'><a href='./abtupd.php'><span>Update Contact Us</span></a></li>
			  </ul></li>
              <li class='has-sub'><a href='#'><span>Contact Us</span></a>
                <ul>
                  <li><a href='./contact.php'><span>View Contact Us</span></a></li>
                  <li class='last'><a href='./contupd.php'><span>Update Contact Us</span></a></li>
                </ul>
              </li>
            </ul>
          </div>
  <?php
  }
}
else {
  ?>
        <!--<div id='contentLog'><a href='./login.php'>Login </a></div><br>-->
        <div id='cssmenu'>
          <ul>
            <li><a href='./index.php'><span>Home</span></a></li>

            <?php
            if (!$_SESSION['username']) {
              //echo"<li>";
              //echo"<a href='./login.php'><span>Login</span></a>"; 
              //echo"</li>";
            }
            ?>
            <li class='last'><a href='./guidelinesforreg.php'><span>Register</span></a></li>
            <li class='last'><a href='./events.php'><span>Events</span></a></li>
			<li class='last'><a href='./about-us.php'><span>About Us</span></a></li>
            <li class='last'><a href='./contact.php'><span>Contact Us</span></a></li>
          </ul>
        </div>

      <?php } ?>
    </div>

    <?php mysql_close($con1); ?>