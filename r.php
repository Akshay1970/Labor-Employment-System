<?php
	include 'config.php';
	
	session_start();
	$phone = $_SESSION['phone'];
	if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true && $_SESSION["admin"] != "admin"){
    header("location:index");
    exit;
	}
	if (!isset($_GET['id'])) {
		header('location:request');
	}
	else
	{
		$id = filter_var($_GET['id'],FILTER_SANITIZE_STRING);
		if (mysqli_query($con,"UPDATE apply SET status = 'Rejected' WHERE  app_id='$id' ")) {
			header('location:request?s=');
		}
		}
		
	
?>