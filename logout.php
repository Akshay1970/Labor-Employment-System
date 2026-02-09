<?php
// Initialize the session
session_start();
session_regenerate_id();
// Unset all of the session variables
$_SESSION = array();

// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: ./");
exit;
?>