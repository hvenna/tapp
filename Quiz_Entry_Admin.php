<?php
include_once "error.php";
include_once "allpages.php";
require_once("connecttodb.php");
// Turn off all error reporting
error_reporting(0);
?>
<head><script type="text/javascript" src="./script/quiz_entry.js"></script></head>
<?php
$file = NULL;
$type = NULL;
$file = $_POST["file"];
$type = $_POST["type"];
$time = $_POST["time"];
?>
<?php
if ($_POST["do"] == "quiz") {
  $file = $_POST["file"];
  $type = $_POST["type"];
  $time = $_POST["time"];



  if ($type == "nt") {

    $question = $_POST["question"];
    $opt1 = $_POST["opt1"];
    $opt2 = $_POST["opt2"];
    $opt3 = $_POST["opt3"];
    $opt4 = $_POST["opt4"];
    $woptcode = $_POST["woptcode"];
    $woptcode = strtoupper($woptcode);
    $query = "select * from  $file";

    $temp = 1;
    $result = mysql_query($query);
    while ($row = mysql_fetch_array($result)) {
      $temp = $temp + 1;
    }
    $query = "insert into $file values($temp,\"$question\",\"$opt1\",\"$opt2\",\"$opt3\",\"$opt4\",\"$woptcode\")";
    $query1 = "SELECT COUNT(*) FROM $file";
    $result1 = mysql_query($query1);
    $row = mysql_fetch_array($result1);
    $result = mysql_query($query);
    echo "<pre>Successfully saved question " . $row[0] . " </pre>";
  }
  elseif ($type == "t") {
    $question = $_POST["question"];
    $opt1 = $_POST["opt1"];
    $opt2 = $_POST["opt2"];
    $opt3 = $_POST["opt3"];
    $opt4 = $_POST["opt4"];
    $woptcode = $_POST["woptcode"];
    $woptcode = strtoupper($woptcode);
    $time = $_REQUEST["time"];
    $query = "select * from $file";
    $temp = 1;
    $result = mysql_query($query);
    while ($row = mysql_fetch_array($result)) {
      $temp = $temp + 1;
    }
    $query = "insert into $file values($temp,\"$question\",\"$opt1\",\"$opt2\",\"$opt3\",\"$opt4\",\"$woptcode\",$time)";
    $result = mysql_query($query);
    $query1 = "SELECT COUNT(*) FROM $file";
    $result1 = mysql_query($query1);
    $row1 = mysql_fetch_array($result1);
    $result = mysql_query($query);
    echo "<pre>Successfully saved question " . $row1[0] . " </pre>";
  }
}
?>
<form method="post" action="Quiz_Entry_Admin.php">
  <table align="center">
    <tr><td>
        <div class="table_css" >
          <table align="center">
            <tr><td colspan="2" id="heading"><h1>Online Quiz Test Question Entry Module</td>
            </tr>
            <tr>
              <td>Q<?php echo $row1[0] + 1; ?>  Enter Question here </td>
              <td><textarea required name="question" rows="4" cols="25"></textarea></td>
            </tr>
            <tr>
              <td>Enter First option</td>
              <td><input required type="text" name="opt1" size="25" ></td>
            </tr>
            <tr>
              <td>Enter Second option</td>
              <td><input required type="text" name="opt2"  size="25"/></td>
            </tr>
            <tr>
              <td>Enter Third option</td>
              <td><input required type="text" name="opt3" size="25" /></td>
            </tr>
            <tr>
              <td>Enter Fourth option</td>
              <td><input required type="text" name="opt4" size="25" /></td>
            </tr>
            <tr>
              <td>Select Right Option code</td>
              <td><select name="woptcode" >
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                </select>
              </td>
            </tr>
            <tr>
              <td colspan="2" align="center">
                <input type="hidden" name="do" value="quiz" />
                <input type="submit" value="SAVE QUESTION" />
                <input type="button" value="FINISH" onclick="finish()"/>
                <input type="hidden" name="file" value=<?php echo "$file"; ?>>
                <input type="hidden" name="type" value=<?php echo "$type"; ?>>
                <input type="hidden" name="time" value=<?php echo "$time"; ?>>
              </td>
            </tr>
          </table>
          </form>