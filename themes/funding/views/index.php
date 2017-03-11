<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from mostafiz.me/demo/himu/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Mar 2017 23:48:24 GMT -->
<head> 
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<meta name="description" content="<?=App::getConfig("site_description")?>">
        <meta name="keywords" content="<?=App::getConfig("site_description")?>" /> 
	<meta name="author" content=""> 
        <title><?=App::getConfig("site_name")?></title> 
        <link href="<?=App::Assets()->getAsset("newhack")?>/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=App::Assets()->getAsset("newhack")?>/css/prettyPhoto.css" rel="stylesheet"> 
	<link href="<?=App::Assets()->getAsset("newhack")?>/css/font-awesome.min.css" rel="stylesheet"> 
	<link href="<?=App::Assets()->getAsset("newhack")?>/css/animate.css" rel="stylesheet"> 
	<link href="<?=App::Assets()->getAsset("newhack")?>/css/main.css" rel="stylesheet">
	<link href="<?=App::Assets()->getAsset("newhack")?>/css/responsive.css" rel="stylesheet"> 
	<!--[if lt IE 9]> <script src="js/html5shiv.js"></script> 
	<script src="js/respond.min.js"></script> <![endif]--> 
	<link rel="shortcut icon" href="<?=App::Assets()->getAsset("newhack")?>/images/ico/favicon.png"> 
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png"> 
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png"> 
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png"> 
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body>
	<div class="preloader">
		<div class="preloder-wrap">
			<div class="preloder-inner"> 
				<div class="ball"></div> 
				<div class="ball"></div> 
				<div class="ball"></div> 
				<div class="ball"></div> 
				<div class="ball"></div> 
				<div class="ball"></div> 
				<div class="ball"></div>
			</div>
		</div>
	</div><!--/.preloader-->
	<header id="navigation"> 
		<div class="navbar navbar-inverse navbar-fixed-top" role="banner"> 
			<div class="container"> 
				<div class="navbar-header"> 
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> 
						<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> 
					</button> 
                                    <a class="navbar-brand" href="<?=App::route("")?>"><h1><img src="<?=App::Assets()->getAsset("newhack")?>/images/logo.png" alt="logo"></h1></a> 
				</div> 
				<div class="collapse navbar-collapse"> 
					<ul class="nav navbar-nav navbar-right"> 
						<li class="scroll active"><a href="#navigation">Home</a></li> 
						<li class="scroll"><a href="#about-us">About Us</a></li> 
						<li class="scroll"><a href="#services">Services</a></li> 
                                                <li class="scroll"><a href="<?=App::route("login")?>">Login</a></li> 
                                                <li class="scroll"><a href="<?=App::route("register")?>">Register</a></li> 
					</ul> 
				</div> 
			</div> 
		</div><!--/navbar--> 
	</header> <!--/#navigation--> 

	<section id="home">
		<div class="home-pattern"></div>
		<div id="main-carousel" class="carousel slide" data-ride="carousel"> 
			<ol class="carousel-indicators">
                            <li data-target="#main-carousel" data-slide-to="0" class="active"></li>
				<li data-target="#main-carousel" data-slide-to="1"></li>
			</ol><!--/.carousel-indicators--> 
			<div class="carousel-inner">
				
				<div class="item active" style="background-image: url(<?=App::Assets()->getAsset("newhack")?>/images/slider/slide2.jpg)"> 
					<div class="carousel-caption"> <div> 
						<h2 class="heading animated bounceInDown">Welcome to Flood Funder</h2> 
                                                <p class="animated bounceInUp">Nigeria Fastest peer to peer funding </p> <a class="btn btn-default slider-btn animated fadeIn" href="<?=App::route("register")?>">Get Started</a> 
					</div> 
				</div> 
			</div> 
			<div class="item" style="background-image: url(<?=App::Assets()->getAsset("newhack")?>/images/slider/slide1.jpg)"> 
				<div class="carousel-caption"> 
					<div> 
						<h2 class="heading animated bounceInRight">Earn 300% Cash Back</h2> 
						<p class="animated bounceInLeft">We are here to stay, We are for you</p> 
                                                <a class="btn btn-default slider-btn animated bounceInUp" href="<?=App::route("register")?>">Get Started</a> 
					</div> 
				</div> 
			</div>
		</div><!--/.carousel-inner-->

		<a class="carousel-left member-carousel-control hidden-xs" href="#main-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
		<a class="carousel-right member-carousel-control hidden-xs" href="#main-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a>
	</div> 

</section><!--/#home-->

<section id="about-us">
	<div class="container">
		<div class="text-center">
			<div class="col-sm-8 col-sm-offset-2">
				<h2 class="title-one">Why With Us?</h2>
				<p>Flash funder have recorded the fastest peering ever raging from the very first minutes to some few hours to get a high payback. Register Quickly with us today to enjoy this ever faster, ever paying platform today</p>
			</div>
		</div>
		<div class="about-us">
			<div class="row">
				<div class="col-sm-6">
					<h3>Why with us?</h3>
					<ul class="nav nav-tabs">
						<li class="active"><a href="#about" data-toggle="tab"><i class="fa fa-chain-broken"></i> About</a></li>
						<li><a href="#mission" data-toggle="tab"><i class="fa fa-th-large"></i> Mission</a></li>
						<li><a href="#community" data-toggle="tab"><i class="fa fa-users"></i> Community</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade in active" id="about">
							<div class="media">
                                                            <img class="pull-left media-object" src="<?=App::Assets()->getAsset("newhack")?>/images/about-us/about.jpg" alt="about us"> 
								<div class="media-body">
									<p>We are you so we simply provide the best for you. Need help from a friend how about you get it faster when you need it the most. Flood Funder is the best and fastest peer to peer website to get more with little or know effort</p>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="mission">
							<div class="media">
								<img class="pull-left media-object" src="images/about-us/mission.jpg" alt="Mission"> 
								<div class="media-body">
									<p>Our Mission is to provide an everlasting paying platform and to beat every other platform existing out there. join us in this revolutionary platform </p>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="community">
							<div class="media">
								<img class="pull-left media-object" src="images/about-us/community.jpg" alt="Community"> 
								<div class="media-body">
									<p>We are nothing without you the users so we are poised in giving you the best that is why we have an online community for all our users where we can discuss area deserving improvements. Search for our facebook page and follow us on twitter</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				</div>
			</div>
		</div>
	</section><!--/#about-us-->

	<section id="services" class="parallax-section">
		<div class="container">
			<div class="row text-center">
				<div class="col-sm-8 col-sm-offset-2">
					<h2 class="title-one">Services</h2>
					<p>Below is Flood funder in details</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="our-service">
						<div class="services row">
							<div class="col-sm-4">
								<div class="single-service">
									<i class="fa fa-th"></i>
									<h2>Fast Peering</h2>
									
								</div>
							</div>
							<div class="col-sm-4">
								<div class="single-service">
									<i class="fa fa-money"></i>
									<h2>Huge CashBack</h2>
									
								</div>
							</div>
							<div class="col-sm-4">
								<div class="single-service">
									<i class="fa fa-users"></i>
									<h2>Referral Bonus</h2>
									
								</div>
							</div></div>
						</div>
					</div>
				</div>
			</div>
		</section><!--/#service-->

		
					

					
	<footer id="footer"> 
		<div class="container"> 
			<div class="text-center"> 
                            <p>Copyright &copy; 2017 - <?=App::getConfig("site_name")?> | All Rights Reserved</p> 
			</div> 
		</div> 
	</footer> <!--/#footer--> 

	<script type="text/javascript" src="<?=App::Assets()->getAsset("newhack")?>/js/jquery.js"></script> 
	<script type="text/javascript" src="<?=App::Assets()->getAsset("newhack")?>/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=App::Assets()->getAsset("newhack")?>/js/smoothscroll.js"></script> 
	<script type="text/javascript" src="<?=App::Assets()->getAsset("newhack")?>/js/jquery.isotope.min.js"></script>
	<script type="text/javascript" src="<?=App::Assets()->getAsset("newhack")?>/js/jquery.prettyPhoto.js"></script> 
	<script type="text/javascript" src="<?=App::Assets()->getAsset("newhack")?>/js/jquery.parallax.js"></script> 
	<script type="text/javascript" src="<?=App::Assets()->getAsset("newhack")?>/js/main.js"></script> 
</body>

<!-- Mirrored from mostafiz.me/demo/himu/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Mar 2017 23:49:23 GMT -->
</html>