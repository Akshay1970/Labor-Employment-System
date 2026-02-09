<?php
	include 'config.php';
	
	session_start();
	$phone = $_SESSION['phone'];
	if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true && $_SESSION["admin"] != "admin"){
    header("location:index");
    exit;
	}
	if (!isset($_GET['id'])) {
		header('location:alljobs');
	}
	else
	{
		$id = filter_var($_GET['id'],FILTER_SANITIZE_STRING);
		if (mysqli_query($con,"DELETE FROM jobs WHERE id='$id' AND phone='$phone'  ")) {
			if (mysqli_query($con,"DELETE FROM apply WHERE job_id='$id' ")) {
				header('location:alljobs?s=');
			}
		}
		else
		{
			echo "Error!";
		}
	}
?>