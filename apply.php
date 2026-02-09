<?php
	include 'config.php';
	session_start();
	if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true && $_SESSION["admin"] != "admin"){
    header("location:index");
    exit;
	}

	$_SESSION['name'] ;
	$_SESSION['phone'] ;
	$_SESSION['type'] ;
	$_SESSION['id'] ;	
	$job_id = filter_var($_GET['id'],FILTER_SANITIZE_STRING);
	$app_id = rand(000000,999999);
	$app_name = $_SESSION['name'] ;
	$app_phone = $_SESSION['phone'] ;
	$status="Applied";
	$date = date('l d F Y h:i:s A');
	if ($sql = mysqli_query($con,"SELECT * FROM jobs WHERE id='$job_id'")) {
		if (mysqli_num_rows($sql) > 0) {
			while ($row = mysqli_fetch_assoc($sql)) {
				$host_name = $row['name'];
				$host_phone = $row['phone'];
				$type_work = $row['type_work'];
				$payout=$row['payout'];
				$address= $row['address'];
			}
		}
	}
	// if (mysqli_query($con,"INSERT INTO apply VALUES (NULL,'$app_id','$job_id','$app_name','$app_phone','$status','$date','$host_name','$host_phone','$type_work','$payout','$address') ")) {
	// 		header('location:jobs?m=');
	// 	}
	if ($sql1=mysqli_query($con,"SELECT * FROM apply WHERE job_id='$job_id' AND apply_phone='$app_phone' ")) {
			if (mysqli_num_rows($sql1) >0) {
				header('location:jobs?n=');
			}
			else
			{
				if (mysqli_query($con,"INSERT INTO apply VALUES (NULL,'$app_id','$job_id','$app_name','$app_phone','$status','$date','$host_name','$host_phone','$type_work','$payout','$address') ")) {
				header('location:jobs?m=');
				}
				else
				{
					header('location:jobs?n=');
				}
		}
	}
	else
	{
		header('location:jobs?n=');
	}
	
?>