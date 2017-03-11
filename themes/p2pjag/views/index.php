<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title><?=App::getConfig("site_name")?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="<?=App::getConfig("site_description")?>" />

<!-- css -->
<link href="<?=  App::Assets()->getAsset("newhack")?>/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?=  App::Assets()->getAsset("newhack")?>/simple-line-icons/css/simple-line-icons.css">
<link href="<?=  App::Assets()->getAsset("newhack")?>/css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="<?=  App::Assets()->getAsset("newhack")?>/css/jcarousel.html" rel="stylesheet" />
<link href="<?=  App::Assets()->getAsset("newhack")?>/css/flexslider.css" rel="stylesheet" />
<link href="<?=  App::Assets()->getAsset("newhack")?>/js/owl-carousel/owl.carousel.html" rel="stylesheet">
<link href="<?=  App::Assets()->getAsset("newhack")?>/css/style.css" rel="stylesheet" />
 
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<!-- Start of Async Drift Code -->
<script>
!function() {
  var t;
  if (t = window.driftt = window.drift = window.driftt || [], !t.init) return t.invoked ? void (window.console && console.error && console.error("Drift snippet included twice.")) : (t.invoked = !0, 
  t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ], 
  t.factory = function(e) {
    return function() {
      var n;
      return n = Array.prototype.slice.call(arguments), n.unshift(e), t.push(n), t;
    };
  }, t.methods.forEach(function(e) {
    t[e] = t.factory(e);
  }), t.load = function(t) {
    var e, n, o, i;
    e = 3e5, i = Math.ceil(new Date() / e) * e, o = document.createElement("script"), 
    o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + i + "/" + t + ".js", 
    n = document.getElementsByTagName("script")[0], n.parentNode.insertBefore(o, n);
  });
}();
drift.SNIPPET_VERSION = '0.3.1';
drift.load('32k2dcr86c5w');
</script>
<!-- End of Async Drift Code -->


</head>
<body>
<div id="wrapper" class="home-page">
	<!-- start header -->
	<header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="<?=  App::Assets()->getAsset("newhack")?>/img/logo.png" alt="logo"/></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?=App::route("")?>">Home</a></li> 
						<li><a href="">About Us</a></li>
						
                                                <li><a href="<?=App::route("login")?>">Login</a></li>
                                                <li><a href="<?=App::route("register")?>">Register</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
	</header>
	<!-- end header -->
	<section id="banner">
	 
	<!-- Slider -->
        <div id="main-slider" class="flexslider">
            <ul class="slides">
              <li>
                <img src="<?=  App::Assets()->getAsset("newhack")?>/img/slides/1.jpg" alt="" />
                <div class="flex-caption">
                    <h3>Welcome to Be Repaid</h3> 
					<p>Fast Peering System Ever Existing</p> 
                                        <a href="<?=App::route("register")?>" class="btn btn-theme">Register Now</a>
                </div>
              </li>
              <li>
                <img src="<?=  App::Assets()->getAsset("newhack")?>/img/slides/2.jpg" alt="" />
                <div class="flex-caption">
                    <h3>Get 300% as Repaid</h3> 
					<p>Very fast still unbelievably fast</p> 
                                        <a href="<?=App::route("login")?>" class="btn btn-theme">Login</a>
                </div>
              </li>
            </ul>
        </div>
	<!-- end slider -->
 
	</section>
	<section class="callaction">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="aligncenter"><h1 class="aligncenter">Welcome To BeRepaid</h1>A very fast and reliable peer to peer site. We pay 300% of your initial investment. We are available for you with 24/7 support system. Earn big from referring your love ones into the system and make huge profit through the process </div>
				
			</div>
		</div>
	</div>
	</section>
	
	
	<section id="content">
	
	
	<div class="container">
			<div class="row">
		<div class="skill-home"> <div class="skill-home-solid clearfix"> 
		<div class="col-md-3 text-center">
		<div class="box-panel">
		<span class="icons c1"><i class="icon-diamond icons"></i></span> <div class="box-area">
		<h3>Best Referral System</h3> </div>
		</div></div> 
		<div class="col-md-3 text-center"> 
		<div class="box-panel">
		<span class="icons c2"><i class="icon-rocket icons"></i></span> <div class="box-area">
		<h3>High Pay Back</h3> </div>
		</div></div> 
		<div class="col-md-3 text-center"> 
		<div class="box-panel">
		<span class="icons c3"><i class="icon-earphones icons"></i></span> <div class="box-area">
		<h3>Best Support System</h3> </div>
		</div></div> 
		<div class="col-md-3 text-center"> 
		<div class="box-panel">
		<span class="icons c4"><i class="icon-people icons"></i></span> <div class="box-area">
		<h3>United Users</h3> 
		</div></div>
		</div></div>
		</div> </div> 
	 

	</div>
	</section>
	
	  
	
	<footer>
	<div class="container">
		
	</div>
	<div id="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="copyright">
						<p>
							<span>&copy; BeRepaid 2018 All right reserved. 
						</p>
					</div>
				</div>
				<div class="col-lg-6">
					<ul class="social-network">
						
					</ul>
				</div>
			</div>
		</div>
	</div>
	</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?=  App::Assets()->getAsset("newhack")?>/js/jquery.js"></script>
<script src="<?=  App::Assets()->getAsset("newhack")?>/js/jquery.easing.1.3.js"></script>
<script src="<?=  App::Assets()->getAsset("newhack")?>/js/bootstrap.min.js"></script>
<script src="<?=  App::Assets()->getAsset("newhack")?>/js/jquery.fancybox.pack.js"></script>
<script src="<?=  App::Assets()->getAsset("newhack")?>/js/jquery.fancybox-media.js"></script> 
<script src="<?=  App::Assets()->getAsset("newhack")?>/js/portfolio/jquery.quicksand.js"></script>
<script src="<?=  App::Assets()->getAsset("newhack")?>/js/portfolio/setting.js"></script>
<script src="<?=  App::Assets()->getAsset("newhack")?>/js/jquery.flexslider.js"></script>
<script src="<?=  App::Assets()->getAsset("newhack")?>/js/animate.js"></script>
<script src="<?=  App::Assets()->getAsset("newhack")?>/js/custom.js"></script>
<script src="<?=  App::Assets()->getAsset("newhack")?>/js/owl-carousel/owl.carousel-2.html"></script>
</body>

</html>