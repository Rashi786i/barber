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

<div class="top-add alert alert-light alert-dismissible">
	<button type="button" class="close" data-dismiss="alert">&times;</button>

</div>

<header class="top-navbar">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="index.html">
				<img src="images/logo.png" alt="" />
			</a>
			<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbars-rs-food"
				aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
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

</head>

<body class="barber_version">


	<!-- Page Content -->
	<div id="page-content-wrapper">


		<div id="contact" class="section wb">
			<div class="container">



				<div class="row">
					<div class="col-md-8 offset-md-2">
						<div class="contact_form">
							<div id="message"></div>
							<form action="processRegister.php" method="post">
							<?php if (isset($_SESSION['message'])) {?>
									
									<p class="alert <?php echo $_SESSION['alert']; ?> mb-3" role="alert"><?php echo $_SESSION['message']; unset($_SESSION['message']); unset($_SESSION['alert']); ?></p>
									
								<?php }?>
                                <label for="Username">Username:</label>
                                <input type="username" name="username" id="username" class="form-control" placeholder="Your User Name" required>
                            
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" required class="form-control" placeholder="Your Email">
								
                                <label for="Phone">Phone:</label>
                                <input type="Phone" name="phone" id="Phone" class="form-control" placeholder="Your Phone Number" required>
                            
                                <label for="password">Password:</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Your Password" required>
                            
                                <p>Register as:</p>
                                <label>
                                    <input type="radio" name="role" value="stylist"> Stylist
                                </label>
                                <label>
                                    <input type="radio" name="role" value="customer" checked> Customer
                                </label>
                            
                                <input type="submit" value="Register" class="btn btn-light btn-radius btn-brd grd1 btn-block subt">
                            </form>
                            

						</div>
					</div><!-- end col -->
				</div><!-- end row -->
			</div><!-- end container -->
		</div><!-- end section -->

		<div class="map-box">
			<div class="container-fluid">
				<div id="map"></div>
			</div><!-- end container -->
		</div><!-- end section -->

		<div class="copyrights">
			<div class="container">
				<div class="footer-distributed">
					<div class="footer-left">
						<p class="footer-links">
							<a href="#">Home</a>
							<a href="#">Blog</a>
							<a href="#">Pricing</a>
							<a href="#">About</a>
							<a href="#">Faq</a>
							<a href="#">Contact</a>
						</p>
						<p class="footer-company-name">All Rights Reserved. &copy; 2018 <a href="#">StyleBarber</a>
							Design By : <a href="https://html.design/">html design</a></p>
					</div>
				</div>
			</div><!-- end container -->
		</div><!-- end copyrights -->
	</div>


	<a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

	<!-- ALL JS FILES -->
	<script src="js/all.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
	<script src="js/map.js"></script>
	<!-- ALL PLUGINS -->
	<script src="js/custom.js"></script>
</body>

</html>