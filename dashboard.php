<?php 
session_start();
if (!isset($_SESSION['customer'])) {
    header("Location: login.php");
    exit;
}

if(isset($_SESSION['service_id']) && isset($_SESSION['barber_id'])){
	header("Location: register.php");
	exit();
}


// Replace DB_HOST, DB_USER, DB_PASSWORD, and DB_NAME with your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barbershoptest";

// Create a new MySQLi object to establish a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// if(isset($_SESSION['message'])){
// 	echo "Message Session is set";
// }else{
// 	echo "Session is not set";
// }

$user = $_SESSION['customer']; 

$stmt = $conn->prepare("SELECT
a.id AS 'app_id',
c.cname AS 'cname',
b.bname AS 'bname',
s.service_name AS 'sname',
a.date_time AS 'atime',
a.status AS 'status'
FROM
appointment a
JOIN
barber b ON a.barber_id = b.id
JOIN
services s ON a.service_id = s.id
JOIN
customer c ON a.customer_id = c.id
WHERE
a.customer_id = $user[id];");

if ($stmt->execute()) {
	$result = $stmt->get_result();
} else {
	// Error in executing the statement
	echo "Error: " . $stmt->error;
}

?>

<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title>StyleBarber - Bootstrap 4 Responsive HTML5 Template</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="barber_version">

    <!-- LOADER -->
    <div id="preloader">
        <div class="cube-wrapper">
		  <div class="cube-folding">
			<span class="leaf1"></span>
			<span class="leaf2"></span>
			<span class="leaf3"></span>
			<span class="leaf4"></span>
		  </div>
		  <div class="mus">
			<img src="images/lode-img.png" alt="" />
		  </div>
		  <span class="loading" data-name="Loading">Stylist Reservation Loading</span>
		</div>
    </div><!-- end loader -->
    <!-- END LOADER -->

	<div class="top-add alert alert-light alert-dismissible">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		
	</div>
    <!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.html">
					<img src="images/logo.png" alt="" />
				</a>
				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar top-bar"></span>
					<span class="icon-bar middle-bar"></span>
					<span class="icon-bar bottom-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
				<?php
					include('header.php');
				?>

				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->

	<!-- Page Content -->
	<div id="page-content-wrapper">
		<div class="all-page-bar">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="title title-1 text-center">
							<div class="much">
								<img src="uploads/mustache.png" alt=""/>
							</div>
							
							<div class="title--heading">
								<h1>Appointment</h1>
							</div>
							<div class="clearfix"></div>
							
							<ol class="breadcrumb">
								
								<li class="active">Appointment</li>
							</ol>
						</div>
						<!-- .title end -->
					</div>
				</div>
			</div>
		</div><!-- end all-page-bar -->

		<div id="appointment" class="section wb">
			<div class="container">
				<div class="section-title row text-center">
					<div class="col-md-8 offset-md-2"></div>
						<?php if (isset($_SESSION['message'])) {?>
							<div class="alert <?php echo $_SESSION['alert']; ?>" role="alert">
        					<p><?php echo $_SESSION['message']; unset($_SESSION['message']); unset($_SESSION['alert']); ?></p>
							</div>
						<?php }?>
							
						
						<small>Current Appointments</small>
						<h3><?php echo $user['cname']; ?></h3>
					</div>
				</div><!-- end title -->

				<div class="row">
					<div class="col-lg-12">
						<div class="contact_form"> 
							<!-- <div id="message">Welcome Customer</div> -->
							<table class="table">
								<thead>
								<tr>
									<th scope="col">Appointment Id</th>
									<th scope="col">Barber Name</th>
									<th scope="col">Customer Name</th>
									<th scope="col">Service Name</th>
									<th scope="col">Date Time</th>
									<th scope="col">Status</th>
									<th scope="col">Action</th>
								</tr>
								</thead>
								<tbody>
								<!-- Example rows (replace with dynamic data from your backend) -->
								<?php
								while($appointment = $result->fetch_assoc()) { ?>
								<tr>
									<td><?php echo $appointment['app_id'] ?></td>
									<td><?php echo $appointment['bname'] ?></td>
									<td><?php echo $appointment['cname'] ?></td>
									<td><?php echo $appointment['sname'] ?></td>
									<td><?php echo $appointment['atime'] ?></td>
									<td><?php echo $appointment['status'] ?></td>
									<?php if ($appointment['status'] !== 'Cancelled' && $appointment['status'] !== 'Attended') : ?>
    								<th scope="col"><a href="functions.php?appid=<?php echo $appointment['app_id']; ?>" class="btn btn-danger">Cancel</a></th>
									<?php endif; ?>
								</tr>
								<?php } ?>
								<!-- Add more rows as needed -->
								</tbody>
							</table>
						</div>
					</div><!-- end col -->
				</div><!-- end row -->
			</div><!-- end container -->
		</div><!-- end section -->

		
		
	</div>
    

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
	<script src="js/responsive-tabs.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    (function($) {
        "use strict";
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        smoothScroll.init({
            selector: '[data-scroll]', // Selector for links (must be a class, ID, data attribute, or element tag)
            selectorHeader: null, // Selector for fixed headers (must be a valid CSS selector) [optional]
            speed: 500, // Integer. How fast to complete the scroll in milliseconds
            easing: 'easeInOutCubic', // Easing pattern to use
            offset: 0, // Integer. How far to offset the scrolling anchor location in pixels
            callback: function ( anchor, toggle ) {} // Function to run after scrolling
        });
    })(jQuery);
    </script>

</body>
</html>