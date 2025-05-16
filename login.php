<?php session_start();
if (isset($_SESSION['customer'])) {
    header("Location: dashboard.php");
    exit;
}

if (isset($_SESSION['barber'])) {
    header("Location: barberdashboard.php");
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
			<div class="col-md-8 offset-md-2"></div>
						<?php if (isset($_SESSION['message'])) {?>
							<div class="alert <?php echo $_SESSION['alert']; ?>" role="alert">
        					<p><?php echo $_SESSION['message']; unset($_SESSION['message']); unset($_SESSION['alert']); ?></p>
							</div>
						<?php }?>
				<div class="row">
					<div class="col-md-8 offset-md-2">
						<div class="contact_form">
							<div id="message"></div>
							<form action="processlogin.php" method="post">
								<label id="msg"></label>
								<label for="email">Email:</label>
								<input type="email" name="email" id="email" required class="form-control"
									placeholder="Your Email">

								<label for="password">Password:</label>
								<input type="password" name="password" id="password" class="form-control"
									placeholder="Your Password" required>

								<p>Log in as:</p>
								<label>
									<input type="radio" name="role" value="barber" required> Stylist
								</label>
								<label>
									<input type="radio" name="role" value="customer"> Customer
								</label>



								<input type="submit" value="Login"
									class="btn btn-light btn-radius btn-brd grd1 btn-block subt">
									<!-- <button type="submit" value="Login" id="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block subt">Login</button> -->
								<a href="registerUser.php" class="btn btn-light btn-radius btn-brd grd1 btn-block subt">Register</a>
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