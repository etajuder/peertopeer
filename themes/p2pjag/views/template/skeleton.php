<!DOCTYPE html>
<html lang="en" class="app">
<head>
  <meta charset="utf-8" />
  <title><?=  ucfirst($user["username"])?> | Account Dashboard</title>
  <meta name="description" content="<?=App::getConfig("site_description")?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="<?=App::Assets()->getAsset("admins/")?>css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?=App::Assets()->getAsset("admins/")?>css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?=App::Assets()->getAsset("admins/")?>css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?=App::Assets()->getAsset("admins/")?>css/font.css" type="text/css" />
  <link rel="stylesheet" href="<?=App::Assets()->getAsset("admins/")?>js/calendar/bootstrap_calendar.css" type="text/css" />
  <link rel="stylesheet" href="<?=App::Assets()->getAsset("admins/")?>css/app.css" type="text/css" />
  <link rel="stylesheet" href="<?=App::Assets()->getAsset("admins/")?>compiled/flipclock.css">
  <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
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
  <section class="vbox">
    <header class="bg-dark dk header navbar navbar-fixed-top-xs">
      <div class="navbar-header aside-md">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
          <i class="fa fa-bars"></i>
        </a>
          <a href="<?=App::route($user["username"])?>" class="navbar-brand" data-toggle="fullscreen"><img src="<?=App::Assets()->getAsset("")?>image-resources/logo.png" class="m-r-sm"><?=App::getConfig("site_name")?></a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user">
          <i class="fa fa-cog"></i>
        </a>
      </div>
      <ul class="nav navbar-nav hidden-xs">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle dker" data-toggle="dropdown">
            <i class="fa fa-building-o"></i> 
            <span class="font-bold">Activity</span>
          </a>
          <section class="dropdown-menu aside-xl on animated fadeInLeft no-borders lt">
            <div class="wrapper lter m-t-n-xs">
              <a href="#" class="thumb pull-left m-r">
                  <img src="<?=App::Assets()->getAsset("admins/")?>images/avatar.jpg" class="img-circle">
              </a>
              <div class="clear">
                <a href="#"><span class="text-white font-bold">@<?=$user["fullname"]?></a></span>
                <small class="block">Level: <?=$user["level"]?></small>
                <a href="#" class="btn btn-xs btn-success m-t-xs">Upgrade</a>
              </div>
            </div>
            <div class="row m-l-none m-r-none m-b-n-xs text-center">
              <div class="col-xs-4">
                <div class="padder-v">
                  <span class="m-b-xs h4 block text-white"><?=$user["level"]?></span>
                  <small class="text-muted">Level</small>
                </div>
              </div>
              <div class="col-xs-4 dk">
                <div class="padder-v">
                  <span class="m-b-xs h4 block text-white">0</span>
                  <small class="text-muted">Referral</small>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="padder-v">
                  <span class="m-b-xs h4 block text-white">0</span>
                  <small class="text-muted">Package</small>
                </div>
              </div>
            </div>
          </section>
        </li>
        
      </ul>      
      <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user">
       
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="thumb-sm avatar pull-left">
                
            </span>
            <?=$user["fullname"]?> <b class="caret"></b>
          </a>
          <ul class="dropdown-menu animated fadeInRight">
            <span class="arrow top"></span>
            <li>
                <a href="<?=App::route($user["username"], "account")?>">Settings</a>
            </li>
            
            
           
            <li class="divider"></li>
            <li>
                <a href="<?=App::route("logout")?>" >Logout</a>
            </li>
          </ul>
        </li>
      </ul>      
    </header>
    <section>
      <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-dark lter aside-md hidden-print" id="nav">          
          <section class="vbox">
            
            <section class="w-f scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
                
                <!-- nav -->
                <nav class="nav-primary hidden-xs">
                  <ul class="nav">
                    <li  class="active">
                        <a href="<?=App::route($user["username"])?>"   class="active">
                        <i class="fa fa-dashboard icon">
                          <b class="bg-danger"></b>
                        </i>
                        <span>Dashboard</span>
                      </a>
                    </li>
                    <li >
                        <a href="<?=App::route($user["username"],"support")?>"  >
                        <i class="fa fa-columns icon">
                          <b class="bg-warning"></b>
                        </i>
                        
                        <span>Support</span>
                      </a>
                      
                    </li>
                    <li >
                        <a href="<?=App::route($user["username"],"referral")?>"  >
                        <i class="fa fa-flask icon">
                          <b class="bg-success"></b>
                        </i>
                       
                        <span>Referral</span>
                      </a>
                      
                    </li>
                    <li >
                        <a href="<?=App::route($user["username"],"settings")?>"  >
                        <i class="fa fa-file-text icon">
                          <b class="bg-primary"></b>
                        </i>
                        
                        <span>Account Settings</span>
                      </a>
                      
                    </li>
                   
                   
                  </ul>
                </nav>
                <!-- / nav -->
              </div>
            </section>
            
            <footer class="footer lt hidden-xs b-t b-dark">
             
              <a href="#nav" data-toggle="class:nav-xs" class="pull-right btn btn-sm btn-dark btn-icon">
                <i class="fa fa-angle-left text"></i>
                <i class="fa fa-angle-right text-active"></i>
              </a>
              
            </footer>
          </section>
        </aside>
        <!-- /.aside -->
        <?php Theme::Section($theme["inject"])?>
        <aside class="bg-light lter b-l aside-md hide" id="notes">
          <div class="wrapper">Notification</div>
        </aside>
      </section>
    </section>
  </section>
  <script src="<?=App::Assets()->getAsset("admins/")?>js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?=App::Assets()->getAsset("admins/")?>js/bootstrap.js"></script>
  <!-- App -->
  <script src="<?=App::Assets()->getAsset("admins/")?>compiled/flipclock.js"></script>
  <script src="<?=App::Assets()->getAsset("admins/")?>js/app.js"></script>
  <script src="<?=App::Assets()->getAsset("admins/")?>js/app.plugin.js"></script>
  <script src="<?=App::Assets()->getAsset("admins/")?>js/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?=App::Assets()->getAsset("admins/")?>js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
  <script src="<?=App::Assets()->getAsset("admins/")?>js/charts/sparkline/jquery.sparkline.min.js"></script>
  <script src="<?=App::Assets()->getAsset("admins/")?>js/charts/flot/jquery.flot.min.js"></script>
  <script src="<?=App::Assets()->getAsset("admins/")?>js/charts/flot/jquery.flot.tooltip.min.js"></script>
  <script src="<?=App::Assets()->getAsset("admins/")?>js/charts/flot/jquery.flot.resize.js"></script>
  <script src="<?=App::Assets()->getAsset("admins/")?>js/charts/flot/jquery.flot.grow.js"></script>
  <script src="<?=App::Assets()->getAsset("admins/")?>js/charts/flot/demo.js"></script>

  <script src="<?=App::Assets()->getAsset("admins/")?>js/calendar/bootstrap_calendar.js"></script>
  <script src="<?=App::Assets()->getAsset("admins/")?>js/calendar/demo.js"></script>

  <script src="<?=App::Assets()->getAsset("admins/")?>js/sortable/jquery.sortable.js"></script>
<script type="text/javascript">
    
			var clock;

			$(document).ready(function() {
                             Date.prototype.addDays = function(days) {
  var dat = new Date(this.valueOf());
  dat.setDate(dat.getDate() + days);
  return dat;
};

				// Grab the current date
				var currentDate = new Date();
                                
				// Set some date in the future. In this case, it's always Jan 1
				var futureDate  = new Date(currentDate.addDays(3));
                                var timer_stop = <?= $user["timer_stop"] ?> * 1000;
                                var dd = new Date(timer_stop );
                                var da = dd.getDate();
                                var day = dd.getDay();
                                var year = dd.getYear();
                              
				// Calculate the difference in seconds between the future and current date
				var diff = dd.getTime() / 1000 - currentDate.getTime() / 1000;
                                 

				// Instantiate a coutdown FlipClock
				clock = $('.clock').FlipClock(diff, {
					clockFace: 'DailyCounter',
					countdown: true
				});
			
                      
  var cTime = new Date(), month = cTime.getMonth()+1, year = cTime.getFullYear();

	theMonths = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

	theDays = ["S", "M", "T", "W", "T", "F", "S"];
    events = [
      [
        ""+da+"/"+month+"/"+year, 
        'Make Your Payment', 
        '#', 
        '#fb6b5b', 
        'Please remeber to make your payment before or on this day'
      ]
     
    ];
    $('#calendar').calendar({
        months: theMonths,
        days: theDays,
        events: events,
        popover_options:{
            placement: 'top',
            html: true
        }
    });
    });
	</script>
</body>
</html>