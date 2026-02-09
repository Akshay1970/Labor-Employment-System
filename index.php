<?php
	error_reporting(0);
	session_start();
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true && $_SESSION["type"] == "Contactor"){
    header("location: contractor");
    exit;
	}
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true && $_SESSION["type"] == "Agent"){
    header("location: agent");
    exit;
	}
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true && $_SESSION["type"] == "Majdoor"){
    header("location: majdoor");
    exit;
	}
	include 'config.php';
	if (isset($_GET['u1'])) {
		echo '<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										<i class="fa fa-check-circle"></i> Your account have been succesfully created
									</div>';
	}
	if (isset($_POST['submit'])) {
		$phone = filter_var($_POST['phone'],FILTER_SANITIZE_STRING);
		$password = md5(filter_var($_POST['password'],FILTER_SANITIZE_STRING));
		$select = "SELECT * FROM user WHERE phone='$phone' AND password='$password'";
		$result = mysqli_query($con,$select);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	    $count = mysqli_num_rows($result);
	    if ($count == 1) 
	    {
	             $get_type = "SELECT * FROM user WHERE phone='$phone'";
	             if ($result = mysqli_query($con,$get_type)) 
	             {
	                   	if (mysqli_num_rows($result) > 0) {
	                   		while ($row_result = mysqli_fetch_assoc($result)) {

	                   			if ($row_result['type'] == "Contactor") {
	                   				session_start();
	                   				$_SESSION['name'] = $row_result['name'];
	                   				$_SESSION['phone'] = $row_result['phone'];
	                   				$_SESSION['type'] = $row_result['type'];
	                   				$_SESSION['id'] = $row_result['id'];
	                   				$_SESSION["loggedin"] = true;
	                   				$_SESSION["typea"] = "Contactor";
	                   				session_regenerate_id();       
	                   				header('location:contractor');
	                   			}
	                   			else if ($row_result['type'] == "Agent") {
	                   				session_start();
	                   				$_SESSION['name'] = $row_result['name'];
	                   				$_SESSION['phone'] = $row_result['phone'];
	                   				$_SESSION['type'] = $row_result['type'];
	                   				$_SESSION['id'] = $row_result['id'];
	                   				$_SESSION["loggedin"] = true;
	                   				$_SESSION["typea"] = "Agent";
	                   				session_regenerate_id();       
	                   				header('location:agent');
	                   			}
	                   			else   {
	                   				session_start();
	                   				$_SESSION['name'] = $row_result['name'];
	                   				$_SESSION['phone'] = $row_result['phone'];
	                   				$_SESSION['type'] = $row_result['type'];
	                   				$_SESSION['id'] = $row_result['id'];
	                   				$_SESSION["loggedin"] = true;
	                   				$_SESSION["typea"] = "Majdoor";
	                   				session_regenerate_id();       
	                   				header('location:majdoor');
	                   			}
	                   		}
	                   		
	                   	}
	             }      
	    }
	    else
	    {
	       	echo '<div class="alert alert-danger alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										<i class="fa fa-check-circle"></i>Invalid Details
									</div>';
	    }
	}
?>
<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>

	<title>Login | Majdoor</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="demo/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="demo/assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="demo/assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="demo/assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="demo/assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->


<script type="text/javascript">
function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en' , includedLanguages : 'hi,en'}, 'google_translate_element');

}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">

</script>
	<div id="wrapper">

		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><h2><strong>MAJDOOR</strong></h2></div>
								<p class="lead">Login to your account</p>
								<div id="google_translate_element"></div>
							</div>
							<form class="form-auth-small" method="POST">
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Phone</label>
									<input type="text" class="form-control" id="signin-email"  placeholder="Phone" onload="this.value=''; " maxlength="10" minlength="10" required="" name="phone">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" id="signin-password"  placeholder="Password" onload="this.value=''" required="" name="password">
								</div>
								
							
								<button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">LOGIN</button>
								<div class="bottom">
									<span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>
								</div>
								<div class="bottom">
									<span class="helper-text"><i class="fa fa-user"></i> <a href="signup">Signup now</a></span>
								</div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">The right labour at right time</h1>
							<p>Every Majdoor Helps.</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
<script src="demo/assets/vendor/jquery/jquery.min.js"></script>
	<script src="demo/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="demo/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="demo/assets/scripts/klorofil-common.js"></script>
