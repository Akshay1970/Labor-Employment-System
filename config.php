<?php
$con = mysqli_connect("localhost","root","","majdoor");
if ($con) {
	//echo "<script>alert('connected to the database');</script>";
}
else
{
	echo "<script>alert('Error! while connecting to the database');</script>";
}
?>
