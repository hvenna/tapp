<?php

include_once "error.php";
session_start();
$user_name = "root";
$password = "";
$database = "addressbook";
$server = "127.0.0.1";
$con = mysqli_connect($server, $user_name, $password, "trainingandplacement");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>