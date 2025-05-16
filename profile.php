<?php
session_start();

// Check if barber is logged in
if(!isset($_SESSION['barber'])) {
    die("Access denied. Login as Barber");
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barbershoptest";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch services
$query = "SELECT * FROM services";
$result = $conn->query($query);

// Fetch services offered by the logged-in barber
$barberId = $_SESSION['barber']['id'];
$barberServicesQuery = "SELECT s.id, s.service_name, bs.charges 
                        FROM services s 
                        JOIN barber_services bs ON s.id = bs.service_id 
                        WHERE bs.barber_id = ?";
$barberServicesStmt = $conn->prepare($barberServicesQuery);
$barberServicesStmt->bind_param("i", $barberId);
$barberServicesStmt->execute();
$barberServicesResult = $barberServicesStmt->get_result();

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
					<div class="col-md-8">
                                        <h2>My Services</h2>
                        <form action="processProfile.php" method="post">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Select</th>
                                        <th>Service ID</th>
                                        <th>Service Name</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($row = $result->fetch_assoc()): ?>
                                        <tr>
                                            <td><input type="checkbox" name="service_<?= $row['id'] ?>"></td>
                                            <td><?= $row['id'] ?></td>
                                            <td><?= htmlspecialchars($row['service_name']) ?></td>
                                            <td><input type="text" name="price_<?= $row['id'] ?>" placeholder="Set Price"></td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                            <input type="submit" value="Update Services">
                        </form>
                    </div><!-- end col -->
                    
                    <div class="col-md-4">
                        <h2>Upload Profile Image</h2>
                        <form action="processProfile.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="profileImage">Profile Image (750 x 700):</label>
                                <input type="file" class="form-control" id="profileImage" name="profileImage" required>
                                <small class="text-muted">Image size should be 750 x 700</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Upload Image</button>
						</form>
						<br /> <br />
						<h3>My Offered Services</h3>
						<ul class="list-group">
							<?php while($service = $barberServicesResult->fetch_assoc()): ?>
								<li class="list-group-item">
									<?= htmlspecialchars($service['service_name']) ?> - $<?= htmlspecialchars($service['charges']) ?>
								</li>
							<?php endwhile; ?>
						</ul>
                    </div>
				</div><!-- end row -->
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
<?php
$conn->close();
?>