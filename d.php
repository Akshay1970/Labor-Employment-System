<?php
	include 'config.php';
	
	session_start();
	$phone = $_SESSION['phone'];
	if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true && $_SESSION["admin"] != "admin"){
    header("location:index");
    exit;
	}
	if (!isset($_GET['idx'])) {
		header('location:myjobs');
	}
	else
	{
		$id = filter_var($_GET['idx'],FILTER_SANITIZE_STRING);
	
		if (mysqli_query($con,"DELETE FROM apply WHERE job_id='$id' AND apply_phone='$phone'  ")) {
			header('location:myjobs?s=');
		}
		else
		{
			echo "Error!";
		}
	}
?>