<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?=App::getConfig("site_description")?>">
    <meta name="author" content="">

    <title><?=App::getConfig("site_name")?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=App::Assets()->getAsset("newhack")?>/asset/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome CSS -->
    <link href="<?=App::Assets()->getAsset("newhack")?>/css/font-awesome.min.css" rel="stylesheet">
    
    
    <!-- Animate CSS -->
    <link href="<?=App::Assets()->getAsset("newhack")?>/css/animate.css" rel="stylesheet" >
    
    <!-- Owl-Carousel -->
    <link rel="stylesheet" href="<?=App::Assets()->getAsset("newhack")?>/css/owl.carousel.css" >
    <link rel="stylesheet" href="<?=App::Assets()->getAsset("newhack")?>/css/owl.theme.css" >
    <link rel="stylesheet" href="<?=App::Assets()->getAsset("newhack")?>/css/owl.transitions.css" >

    <!-- Custom CSS -->
    <link href="<?=App::Assets()->getAsset("newhack")?>/css/style.css" rel="stylesheet">
    <link href="<?=App::Assets()->getAsset("newhack")?>/css/responsive.css" rel="stylesheet">
    
    <!-- Colors CSS -->
    <link rel="stylesheet" type="text/css" href="<?=App::Assets()->getAsset("newhack")?>/css/color/green.css">
    
    
    
    <!-- Colors CSS -->
    <link rel="stylesheet" type="text/css" href="<?=App::Assets()->getAsset("newhack")?>/css/color/green.css" title="green">
    <link rel="stylesheet" type="text/css" href="<?=App::Assets()->getAsset("newhack")?>/css/color/light-red.css" title="light-red">
    <link rel="stylesheet" type="text/css" href="<?=App::Assets()->getAsset("newhack")?>/css/color/blue.css" title="blue">
    <link rel="stylesheet" type="text/css" href="<?=App::Assets()->getAsset("newhack")?>/css/color/light-blue.css" title="light-blue">
    <link rel="stylesheet" type="text/css" href="<?=App::Assets()->getAsset("newhack")?>/css/color/yellow.css" title="yellow">
    <link rel="stylesheet" type="text/css" href="<?=App::Assets()->getAsset("newhack")?>/css/color/light-green.css" title="light-green">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    
    
    <!-- Modernizer js -->
    <script src="<?=App::Assets()->getAsset("newhack")?>/js/modernizr.custom.js"></script>

    
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
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

<body class="index">
    
    
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top"><?=App::getConfig("site_name")?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="">Home</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#feature">Features</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?=App::route("login")?>">Login</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?=App::route("register")?>">Register</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    
    
    
    <!-- Start Home Page Slider -->
    <section id="page-top">
        <!-- Carousel -->
        <div id="main-slide" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#main-slide" data-slide-to="0" class="active"></li>
                <li data-target="#main-slide" data-slide-to="1"></li>
                <li data-target="#main-slide" data-slide-to="2"></li>
            </ol>
            <!--/ Indicators end-->

            <!-- Carousel inner -->
            <div class="carousel-inner">
                <div class="item active">
                    <img class="img-responsive" src="<?=App::Assets()->getAsset("newhack")?>/images/header-bg-1.jpg" alt="slider">
                    <div class="slider-content">
                        <div class="col-md-12 text-center">
                            <h1 class="animated3">
                                <span><strong>We Pay</strong> Nigerian</span>
                            </h1>
                            <p class="animated2">The fastest peer paying platform</p>	
                            <a href="<?=App::route("login")?>" class="page-scroll btn btn-primary animated1">Login</a>
                        </div>
                    </div>
                </div>
                <!--/ Carousel item end -->
                
                
                <!--/ Carousel item end -->
                
                <div class="item">
                    <img class="img-responsive" src="<?=App::Assets()->getAsset("newhack")?>/images/galaxy.jpg" alt="slider">
                    <div class="slider-content">
                        <div class="col-md-12 text-center">
                            <h1 class="animated2">
                                <span>The way of <strong>Success</strong></span>
                            </h1>
                            <p class="animated1">Signup now to get the best from your investment</p>	
                            <a class="animated3 slider btn btn-primary btn-min-block" href="<?=App::route("register")?>">Register</a><a class="animated3 slider btn btn-default btn-min-block" href="<?=App::route("login")?>">Login</a>
                                
                        </div>
                    </div>
                </div>
                <!--/ Carousel item end -->
            </div>
            <!-- Carousel inner end-->

            <!-- Controls -->
            <a class="left carousel-control" href="#main-slide" data-slide="prev">
                <span><i class="fa fa-angle-left"></i></span>
            </a>
            <a class="right carousel-control" href="#main-slide" data-slide="next">
                <span><i class="fa fa-angle-right"></i></span>
            </a>
        </div>
        <!-- /carousel -->
    </section>
    <!-- End Home Page Slider -->

    
    
    <!-- Start Feature Section -->
        <section id="feature" class="feature-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="feature">
                            <i class="fa fa-magic"></i>
                            <div class="feature-content">
                                <h4>24/7 Support</h4>
                                <p>We provide 24/7 support to solve all your issues or clear any doubt about this platform</p>
                            </div>
                        </div>
                    </div><!-- /.col-md-3 -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="feature">
                            <i class="fa fa-gift"></i>
                            <div class="feature-content">
                                <h4>High Referring Bonus</h4>
                                <p>We pay you high for your effort to promote this site. Invite your love ones and get paid for doing so. earning is unlimited with us</p>
                            </div>
                        </div>
                    </div><!-- /.col-md-3 -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="feature">
                            <i class="fa fa-money"></i>
                            <div class="feature-content">
                                <h4>Low StartUp</h4>
                                <p>Invest as Low as #2000 and still make unbelievably high with us no ending to how much you can make. Invest now to earn Big</p>
                            </div>
                        </div>
                    </div><!-- /.col-md-3 -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="feature">
                            <i class="fa fa-rocket"></i>
                            <div class="feature-content">
                                <h4>Fast Peering</h4>
                                <p>We offer 0hrs delay in peering register to get peered immediately</p>
                            </div>
                        </div>
                    </div>
                </div><!-- /.row -->
            
            </div><!-- /.container -->
        </section>
        <!-- End Feature Section -->
   


  <section class="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>We Pay Nigerian is the best and fast peer to peer system that have ever existed <br> Join us today and be part of this great revolution</h1>
                    <a href="<?=App::route("register")?>" class="btn btn-primary">Join Now</a>
                </div>
            </div>
        </div>
    </section>

 
    
    <section class="fun-facts">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="counter-item">
                        <i class="fa fa-users"></i>
                        <div class="timer" id="item1" data-to="<?=$site["count_users"]?>" data-speed="5000"><?=$site["count_users"]?></div>
                        <h5>Our Users And Still Counting</h5>                               
                      </div>
                    </div>  
                  
                    
                    </div>
            </div>
        </div>
    </section>

    <div id="loader">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>

    

    <!-- jQuery Version 2.1.1 -->
    <script src="<?=App::Assets()->getAsset("newhack")?>/js/jquery-2.1.1.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=App::Assets()->getAsset("newhack")?>/asset/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?=App::Assets()->getAsset("newhack")?>/js/jquery.easing.1.3.js"></script>
    <script src="<?=App::Assets()->getAsset("newhack")?>/js/classie.js"></script>
    <script src="<?=App::Assets()->getAsset("newhack")?>/js/count-to.js"></script>
    <script src="<?=App::Assets()->getAsset("newhack")?>/js/jquery.appear.js"></script>
    <script src="<?=App::Assets()->getAsset("newhack")?>/js/cbpAnimatedHeader.js"></script>
    <script src="<?=App::Assets()->getAsset("newhack")?>/js/owl.carousel.min.js"></script>
	<script src="<?=App::Assets()->getAsset("newhack")?>/js/jquery.fitvids.js"></script>
	<script src="<?=App::Assets()->getAsset("newhack")?>/js/styleswitcher.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="<?=App::Assets()->getAsset("newhack")?>/js/jqBootstrapValidation.js"></script>
    <script src="<?=App::Assets()->getAsset("newhack")?>/js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=App::Assets()->getAsset("newhack")?>/js/script.js"></script>

</body>


</html>
