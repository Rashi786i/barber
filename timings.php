<?php 
session_start();
if (isset($_SESSION['barber'])) {
    unset($_SESSION['barber']);
    $_SESSION['message'] = "You are logged in as Stylist.Please login from customer account";
    $_SESSION['alert'] = "alert-warning";
    header("Location: login.php");
    exit;
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

		<div id="barbers" class="section lb">
			<div class="container">
				<div class="section-title row text-center">
					<div class="col-md-8 offset-md-2">
						<small>Select Timings</small>
						<h3>Choose Your Stylists</h3>
					</div>
				</div><!-- end title -->

				<div class="row dev-list text-center">

<?php
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

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve form data
    $barber_id = $_GET['barber_id'];
    $service_id = $_GET['service_id'];
    $service_name = $_GET['service_name'];
    $image = $_GET['image'];
    // print_r($_POST); // Uncomment for debugging purposes

    if (empty($barber_id) || empty($service_id) || empty($service_name)) {
        // Display an error message for empty fields
        echo "Please fill in all fields.";
    } else {?>

        <!-- Form in 8 columns -->
        <div class="col-md-8">
            <form action="register.php" method="post">
                <!-- Date Picker -->
                <div class="form-group">
                    <label for="appDate">Choose a date:</label>
                    <input type="datetime-local" class="form-control" id="appDate" name="appDate" required>
                    <textarea class="form-control" id="comment" name="comment" ></textarea>
                </div><br>

                <!-- Hidden fields for the GET data -->
                <input type="hidden" name="service_id" value="<?php echo $service_id; ?>">
                <input type="hidden" name="barber_id" value="<?php echo $barber_id; ?>">
                <input type="hidden" name="service_name" value="<?php echo $service_name; ?>">

                <input type="submit" class="btn btn-primary" value="Submit">
            </form>
        </div>

        <!-- Image in 4 columns -->
        <div class="col-md-4">
            <img src="uploads/<?php echo $image; ?>" class="img-fluid" alt="Responsive image">
        </div>
    <?php }
        
}

?>
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