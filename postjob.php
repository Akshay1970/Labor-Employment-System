<?php
	include 'config.php';
	error_reporting(0);
	session_start();
	if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true && $_SESSION["admin"] != "admin"){
    header("location:index");
    exit;
	}
	echo $_SESSION['name'] ;
	echo $_SESSION['phone'] ;
	echo $_SESSION['type'] ;
	echo $_SESSION['id'] ;	
	if (isset($_POST['submit'])) {
		$id = "JOB".rand(00000,111111);
		$name = $_SESSION['name'];
		$phone = $_SESSION['phone'] ;
		$address = filter_var($_POST['address'],FILTER_SANITIZE_STRING);
		$type_of_workers = filter_var($_POST['type_of_workers'],FILTER_SANITIZE_STRING);
		$no_of_workers = filter_var($_POST['no_of_workers'],FILTER_SANITIZE_STRING);
		$payout = filter_var($_POST['payout'],FILTER_SANITIZE_STRING);
		$pay = $payout."&#8377";
		$time = filter_var($_POST['time'],FILTER_SANITIZE_STRING);
		$state = filter_var($_POST['state'],FILTER_SANITIZE_STRING);
		$city = filter_var($_POST['city'],FILTER_SANITIZE_STRING);
		$date = date('l d F Y h:i:s A');
		if (mysqli_query($con,"INSERT INTO jobs VALUES (NULL,'$id','$name','$phone','$address','$type_of_workers','$no_of_workers','$pay','$time','$state','$city','$date') "))
		 {
		       $done= '<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										<i class="fa fa-check-circle"></i> Your job have been posted succesfully created
									</div>';
		 }             				   	
	}                   				   
?>
<!doctype html>
<html lang="en">

<head>
	<title><?php echo 'Welcome..'.$_SESSION['name']; ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="demo/assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="demo/assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="demo/assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="demo/assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="demo/assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="demo/assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="demo/assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="demo/assets/img/favicon.png">

</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<?php include 'header.php'; ?>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<?php include 'sidebar.php'; ?>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<form method="POST">
						<div class="panel">
								<div class="panel-heading">
									<?php echo $done; ?>
									<h3 class="panel-title"><strong>Post New Job</strong></h3>
								</div>
								<div class="panel-body">

										<label>Address of your work / site</label>
									<textarea class="form-control" placeholder="enter address" rows="3" required="" name="address"></textarea>
									<br>
									<label>Type of workers required</label>
									<input type="text" class="form-control" maxlength="1000" required="" name="type_of_workers">	
									<br>
									<label>No of worker</label>
									<input type="number" class="form-control" maxlength="1000" required="" name="no_of_workers">
									<br>
									<label>Daily Payout</label>
									<input type="number" class="form-control" maxlength="1000" required="" name="payout">
									<br>
									<label>Timeing in hours</label>
									<input type="number" class="form-control" maxlength="1000" required="" name="time">
									<br>
									<label>Select State</label>
									     <select class="form-control" id="listBox" onchange='selct_district(this.value)'  id="validationCustom01" required="" name="state"></select>
                                     <div id="dumdiv" align="center" style=" font-size: 10px;color: #dadada;"
                            style="display: none;">
                            <a id="dum" style="padding-right:0px; text-decoration:none;color: green;text-align:center;"
                           href="http://www.hscripts.com"></a>
                          </div>
                          <br>
                          <label>Select City</label>
                          <select id="secondlist" class="form-control" id="listBox"
                              onchange='selct_district(this.value)'  id="validationCustom01 "required name="city"></select>
                              <div id="dumdiv" align="center" style=" font-size: 10px;color: #dadada;"
                            style="display: none;">
                            <a id="dum" style="padding-right:0px; text-decoration:none;color: green;text-align:center;"
                           href="http://www.hscripts.com"></a>
                          </div>
									<br>
									<button type="submit" class="btn btn-primary " name="submit">Post job</button>
									
								</div>
							</div>
					</form>
				
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="demo/assets/vendor/jquery/jquery.min.js"></script>
	<script src="demo/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="demo/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="demo/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="demo/assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="demo/assets/scripts/klorofil-common.js"></script>
	<script src="js/state.js"></script>
	<script>
	$(function() {
		var data, options;

		// headline charts
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
				[23, 29, 24, 40, 25, 24, 35],
				[14, 25, 18, 34, 29, 38, 44],
			]
		};

		options = {
			height: 300,
			showArea: true,
			showLine: false,
			showPoint: false,
			fullWidth: true,
			axisX: {
				showGrid: false
			},
			lineSmooth: false,
		};

		new Chartist.Line('#headline-chart', data, options);


		// visits trend charts
		data = {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			series: [{
				name: 'series-real',
				data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
			}, {
				name: 'series-projection',
				data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
			}]
		};

		options = {
			fullWidth: true,
			lineSmooth: false,
			height: "270px",
			low: 0,
			high: 'auto',
			series: {
				'series-projection': {
					showArea: true,
					showPoint: false,
					showLine: false
				},
			},
			axisX: {
				showGrid: false,

			},
			axisY: {
				showGrid: false,
				onlyInteger: true,
				offset: 0,
			},
			chartPadding: {
				left: 20,
				right: 20
			}
		};

		new Chartist.Line('#visits-trends-chart', data, options);


		// visits chart
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
				[6384, 6342, 5437, 2764, 3958, 5068, 7654]
			]
		};

		options = {
			height: 300,
			axisX: {
				showGrid: false
			},
		};

		new Chartist.Bar('#visits-chart', data, options);


		// real-time pie chart
		var sysLoad = $('#system-load').easyPieChart({
			size: 130,
			barColor: function(percent) {
				return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
			},
			trackColor: 'rgba(245, 245, 245, 0.8)',
			scaleColor: false,
			lineWidth: 5,
			lineCap: "square",
			animate: 800
		});

		var updateInterval = 3000; // in milliseconds

		setInterval(function() {
			var randomVal;
			randomVal = getRandomInt(0, 100);

			sysLoad.data('easyPieChart').update(randomVal);
			sysLoad.find('.percent').text(randomVal);
		}, updateInterval);

		function getRandomInt(min, max) {
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}

	});
	</script>
</body>

</html>
