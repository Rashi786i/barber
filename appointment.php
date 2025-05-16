<?php
session_start();
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
						<small>MEET OUR STYLISTS</small>
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $service_id = $_POST['select_service'];
    $comments = $_POST['comments'];
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve form data
    $service_id = $_GET['service'];
}

    // print_r($_POST); // Uncomment for debugging purposes

    // if (empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($service_id) || empty($comments)) {
        // Display an error message for empty fields
        // echo "Please fill in all fields.";
    // } else {
        // Prepare the SQL statement to select a barber who provides the selected service
        $stmt = $conn->prepare("SELECT
        b.id,
        b.bname,
        b.image,
        s.service_name,
        bs.charges
    FROM
        barber b
    JOIN
        barber_services bs ON b.id = bs.barber_id
    JOIN
        services s ON bs.service_id = s.id
    WHERE
    bs.service_id = ?");
        
        // Bind the parameter to the statement
        $stmt->bind_param("i", $service_id); // 'i' stands for integer

        // Execute the statement
        if ($stmt->execute()) {?>

            <?php
            // Fetch the result
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                while($barber = $result->fetch_assoc()) { ?>
                                    
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <div class="widget our-inner-taem clearfix">
                            <div class="t-top"></div>
                            <div class="hover-br">
                                <a href="timings.php?barber_id=<?php echo urlencode($barber['id']); ?>&service_id=<?php echo urlencode($service_id); ?>&image=<?php echo urlencode($barber['image']); ?>&service_name=<?php echo urlencode($barber['service_name']); ?>" class="book-appointment-link"><img src="uploads/<?php echo $barber['image'] ?>" alt="" class="img-responsive"></a>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="widget-title">
                                        <h3><?php echo $barber['bname'] ?></h3>
                                        <p><?php echo $barber['service_name'] ?> Specialist</p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="widget-title">
                                        <h3>Fees</h3>
                                        <p><?php echo $barber['charges'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <!-- end title -->
                            <p>Stylists are skilled professionals who specialize in creating and transforming hairstyles to enhance the overall look and confidence of their clients.</p>
                            <div class="t-bottom"></div>
                        </div><!--widget -->
                    </div><!-- end col -->
                            
                <?php }
                // echo "Barbers loaded successfully.";
            } else {
                echo "No barbers available for the selected service.";
            }
        } else {
            // Error in executing the statement
            echo "Error: " . $stmt->error;
        }
        ?>
        </div><!-- end row -->
        </div><!-- end container -->
        </div><!-- end section -->
        <?php
        // Close the statement
        $stmt->close();
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