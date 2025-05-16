<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
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
		  <span class="loading" data-name="Loading">stylist Reservation Loading</span>
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

	<div id="home" class="parallax">
		<div id="full-width" class="owl-carousel owl-theme home-hero">
			<div class="text-center item slider-01 display-table overlay">
				<div class="display-table-cell">
					<div class="big-tagline text-center">
						<h2><strong>The Stylist Reservation</strong><br>
						And Payment</h2>
						
					</div>
				</div>
			</div>
			<div class="text-center item slider-02 display-table overlay">
				<div class="display-table-cell">
					<div class="big-tagline text-center">
						<h2><strong>The Stylist Reservation</strong><br>
							And Payment</h2>
						
					</div>
				</div>
			</div>
			<div class="text-center item slider-03 display-table overlay">
				<div class="display-table-cell">
					<div class="big-tagline text-center">
						<h2><strong>The Stylist Reservation</strong><br>
							And Payment</h2>
						
					</div>
				</div>
			</div>
		</div>
	</div><!-- end section -->
		
	<!-- Page Content -->
	<div id="page-content-wrapper">			
		<div class="section wb">
			<div class="container">
				
				
				<hr class="hr1"> 
				
				<div class="row">
					<div class="col-md-12">
						<div class="about-tab">
							<ul class="nav nav-pills nav-justified" id="myTab" role="tablist">
								<li class="nav-item"><a class="nav-link active" href="#tab_a" data-toggle="tab">Our Mission</a></li>
								<li class="nav-item"><a class="nav-link" href="#tab_b" data-toggle="tab">Why Us?</a></li>
								<li class="nav-item"><a class="nav-link" href="#tab_c" data-toggle="tab">About Us</a></li>								
							</ul>
							<div class="tab-content">
								<div class="tab-pane fade show active" id="tab_a">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi scelerisque tortor mi, eget mattis velit sagittis id. Duis ornare mauris eu eros interdum, vitae finibus arcu ultricies. Donec vitae felis eleifend, dignissim erat a, pretium diam. Donec eu massa odio. Suspendisse et ornare lacus, pharetra imperdiet ligula.</p>
									
								</div>
								<div class="tab-pane fade" id="tab_b">
									<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
									
								</div>
								<div class="tab-pane fade" id="tab_c">
									<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
								</div>
							</div><!-- tab content -->
						</div>
					</div><!-- end col -->
				</div><!-- end row -->
				
				<hr class="hr1"> 

				

		<div id="pricing" class="section lb">
				<div class="container">
					<div class="section-title row text-center">
						<div class="col-md-8 offset-md-2">
						<small>STYLISTS PRICING</small>
						<h3>STYLISTS PRICING</h3>
						</div>
					</div><!-- end title -->
					<div class="row flex-items-xs-middle flex-items-xs-center">

						<!-- Table #1  -->
						<div class="col-xs-12 col-lg-4">
						  <div class="card text-center">
							<div class="card-block">
							  <h4 class="card-title pricing-ti"> 
								Shaving
							  </h4>
							  <div class="line-pricing">
								<h5>Full Shave</h5>
								<p>A men's facial shave involves the careful removal of facial hair using a razor and shaving products. It leaves the skin smooth, refreshed, and ready for a clean and polished appearance.</p>
								<a href="#">Rs 300</a>
							  </div>
							  <div class="line-pricing">
								<h5>Beard Trimming</h5>
								<p>A men's facial shave involves the careful removal of facial hair using a razor and shaving products. It leaves the skin smooth, refreshed, and ready for a clean and polished appearance.</p>
								<a href="#">Rs 200</a>
							  </div>
							  <div class="line-pricing">
								<h5>Beard Trimming With Wash</h5>
								<p>A men's facial shave involves the careful removal of facial hair using a razor and shaving products. It leaves the skin smooth, refreshed, and ready for a clean and polished appearance.</p>
								<a href="#">Rs 500</a>
							  </div>
							</div>
						  </div>
						</div>

						<!-- Table #1  -->
						<div class="col-xs-12 col-lg-4">
						  <div class="card text-center">
							<div class="card-block">
							  <h4 class="card-title pricing-ti"> 
								Hair Cut
							  </h4>
							  <div class="line-pricing">
								<h5>Fade HairCut</h5>
								<p>A men's haircut is a professional service that involves trimming and shaping the hair to create a desired style, providing a clean and well-groomed appearance.</p>
								<a href="#">Rs 350</a>
							  </div>
							  <div class="line-pricing">
								<h5>Buzz Cut</h5>
								<p>A men's haircut is a professional service that involves trimming and shaping the hair to create a desired style, providing a clean and well-groomed appearance.</p>
								<a href="#">Rs 500</a>
							  </div>
							  <div class="line-pricing">
								<h5>Flow hairCut</h5>
								<p>A men's haircut is a professional service that involves trimming and shaping the hair to create a desired style, providing a clean and well-groomed appearance.</p>
								<a href="#">Rs 600</a>
							  </div>
							</div>
						  </div>
						</div>

						<!-- Table #1  -->
						<div class="col-xs-12 col-lg-4">
						  <div class="card text-center">
							<div class="card-block">
							  <h4 class="card-title pricing-ti"> 
								Hair Treatment
							  </h4>
							  <div class="line-pricing">
								<h5>Hair Straightening</h5>
								<p>A hair treatment is a rejuvenating and nourishing procedure that aims to improve the health and appearance of the hair. It involves the application of specialized products.</p>
								<a href="#">Rs 1200</a>
							  </div>
							  <div class="line-pricing">
								<h5>Protein Treatment</h5>
								<p>A hair treatment is a rejuvenating and nourishing procedure that aims to improve the health and appearance of the hair. It involves the application of specialized products.</p>
								<a href="#">Rs 1500</a>
							  </div>
							  <div class="line-pricing">
								<h5>Keratin</h5>
								<p>A hair treatment is a rejuvenating and nourishing procedure that aims to improve the health and appearance of the hair. It involves the application of specialized products.</p>
								<a href="#">Rs 2000</a>
							  </div>
							</div>
						  </div>
						</div>
					</div>
			</div>
		</div>
		
		
		<div id="barbers" class="section lb">
			<div class="container">
				<div class="section-title row text-center">
					<div class="col-md-8 offset-md-2">
					<small>MEET OUR STYLISTS</small>
					<h3>Stylists</h3>
					</div>
				</div><!-- end title -->

				<div class="row dev-list text-center">
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
						<div class="widget our-inner-taem clearfix">
							<div class="t-top"></div>
							<div class="hover-br">
								<img src="uploads/barber_team_01.jpg" alt="" class="img-responsive">
								
							</div>
							<div class="team-box">
								<div class="widget-title">
									<h3>Ilyas</h3>
									
								</div>
								<!-- end title -->
								<p>Stylists are skilled professionals who specialize in creating and transforming hairstyles to enhance the overall look and confidence of their clients.</p>
							</div>
							<div class="t-bottom"></div>
						</div><!--widget -->
					</div><!-- end col -->

					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
						<div class="widget our-inner-taem clearfix">
							<div class="t-top"></div>
							<div class="hover-br">
								<img src="uploads/barber_team_03.jpg" alt="" class="img-responsive">
								
									
								
							</div>
							<div class="team-box">
								<div class="widget-title">
									<h3>Toni</h3>
									
								</div>
								<!-- end title -->
								<p>Stylists are skilled professionals who specialize in creating and transforming hairstyles to enhance the overall look and confidence of their clients.</p>
							</div>
							<div class="t-bottom"></div>
						</div><!--widget -->
					</div><!-- end col -->

					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.6s">
						<div class="widget our-inner-taem clearfix">
							<div class="t-top"></div>
							<div class="hover-br">
								<img src="uploads/barber_team_02.jpg" alt="" class="img-responsive">
								
							</div>
							<div class="team-box">
								<div class="widget-title">
									<h3>Kami</h3>
									
								</div>
								<!-- end title -->
								<p>Stylists are skilled professionals who specialize in creating and transforming hairstyles to enhance the overall look and confidence of their clients.</p>
							</div>
							<div class="t-bottom"></div>
						</div><!--widget -->
					</div><!-- end col -->
				</div><!-- end row -->
			</div><!-- end container -->
		</div><!-- end section -->



	
    
    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
	<script src="js/responsive-tabs.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
</body>
</html>