<?php
include_once "error.php";
session_start();
if(isset($_SESSION["start_time"]) && $_SESSION['request_url']!=$_SERVER['REQUEST_URI'])
	unset($_SESSION["start_time"]);
	$user_name = "root";
	$password = "";
	$database = "addressbook";
	$server = "127.0.0.1";
	$con1=mysqli_connect($server, $user_name, $password,"TrainingAndPlacement");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
$query="SELECT count(*) FROM `persons` WHERE `Acc`='0' ";
$result=mysqli_query($con1,$query);
if(!$result)
{
	print("Erro- no query");
	$error=mysql_error();
	print"<p>".$error."<p>";
	exit;
}
$row=mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="generator" content="CoffeeCup HTML Editor (www.coffeecup.com)">
		<meta name="created" content="Wed, 08 May 2013 11:23:26 GMT">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<title> T & P </title>
		<link href="./css/styles.css" rel="stylesheet" type="text/css">
		<link href="./css/my.css" rel="stylesheet" type="text/css">
		

	</head>
	