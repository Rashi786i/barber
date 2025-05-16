<?php 
session_start();
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




if ($_SERVER["REQUEST_METHOD"] == "POST" || (isset($_SESSION['service_id']) 
&& isset($_SESSION['barber_id']) && isset($_SESSION['appDate']))) {
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Retrieve form data
        $service_id = $_POST['service_id'];
        $barber_id = $_POST['barber_id'];
        $appDate = $_POST['appDate'];
        $comment = $_POST['comment'];

        foreach ($_POST as $key => $value) {
            // Store each POST variable in the session
            $_SESSION[$key] = $value;
        }
    }

    if(isset($_SESSION['service_id']) && isset($_SESSION['barber_id']) && isset($_SESSION['appDate'])){
        $service_id = $_SESSION['service_id'];
        $barber_id = $_SESSION['barber_id'];
        $appDate = $_SESSION['appDate'];
        $comment = $_SESSION['comment'];
    }

    // echo "List of session variables:";
    // foreach ($_SESSION as $key => $value) {
    // echo "<br/>$key = $value";
    // }

    // return false; exit();
    if(isset($_SESSION['customer'])){

        $appDateTimestamp = strtotime($appDate);
        $currentTimestamp = time();

        if ($appDateTimestamp < $currentTimestamp) {
            $_SESSION['message'] = "Please select future date";
                $_SESSION['alert'] = "alert-warning";
            header("Location: services.php");
            exit();
        }

        $user = $_SESSION['customer'];
        //start of try catch
        try {
            $stmt = $conn->prepare("INSERT INTO appointment (date_time, service_id, comments, customer_id, barber_id) 
                    VALUES (?, ?, ?, ?, ?)");
        
            $stmt->bind_param("sissi", $appDate, $service_id, $comment, $user['id'], $barber_id);
        
            if ($stmt->execute()) {
                $_SESSION['message'] = "Appointment booked successfully.";
                $_SESSION['alert'] = "alert-success";
                unset($_SESSION['service_id'], $_SESSION['barber_id'], $_SESSION['appDate']);
                header("Location: dashboard.php");
            } else {
                // Error in executing the statement
                echo "Error: " . $stmt->error;
            }
        } catch (mysqli_sql_exception $e) {
            // Check if the error is due to a duplicate entry
            if ($e->getCode() == 1062) { // MySQL error code for duplicate entry violation
                $_SESSION['message'] = "Error: Duplicate entry. You already have an appointment with this barber.";
                $_SESSION['alert'] = "alert-danger";
                header("Location: services.php");
            } else {
                // Other database error
                echo "Error: " . $e->getMessage();
            }
        }
        
        //end of try catch
    }else{
        header("Location: login.php");
        exit();
    }
    

    

    $stmt->close();
    $conn->close();
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