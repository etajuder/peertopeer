<!DOCTYPE html>
<html lang="en">
<head>
    
    <style>
        /* Loading Spinner */
        .spinner{margin:0; width:70px;height:18px;margin:-35px 0 0 -9px;position:absolute;top:50%;left:50%;text-align:center}.spinner > div{width:18px;height:18px;background-color:#333;border-radius:100%;display:inline-block;-webkit-animation:bouncedelay 1.4s infinite ease-in-out;animation:bouncedelay 1.4s infinite ease-in-out;-webkit-animation-fill-mode:both;animation-fill-mode:both}.spinner .bounce1{-webkit-animation-delay:-.32s;animation-delay:-.32s}.spinner .bounce2{-webkit-animation-delay:-.16s;animation-delay:-.16s}@-webkit-keyframes bouncedelay{0%,80%,100%{-webkit-transform:scale(0.0)}40%{-webkit-transform:scale(1.0)}}@keyframes bouncedelay{0%,80%,100%{transform:scale(0.0);-webkit-transform:scale(0.0)}40%{transform:scale(1.0);-webkit-transform:scale(1.0)}}
    </style>
    <meta charset="UTF-8">
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
<title>  <?=App::getConfig("site_name")?> | Register </title>
<meta name="description" content="<?=App::getConfig("site_description")?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- Favicons -->
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
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=App::Assets()->getAsset("")?>assets/images/icons/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=App::Assets()->getAsset("")?>assets/images/icons/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=App::Assets()->getAsset("")?>assets/images/icons/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="<?=App::Assets()->getAsset("")?>assets/images/icons/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="<?=App::Assets()->getAsset("")?>assets/images/icons/favicon.png">



<link rel="stylesheet" type="text/css" href="<?=App::Assets()->getAsset("")?>assets-minified/frontend-all-demo.css">

    <!-- JS Core -->

    <script type="text/javascript" src="<?=App::Assets()->getAsset("")?>assets-minified/js-core.js"></script>



<script type="text/javascript">
    $(window).load(function(){
        setTimeout(function() {
            $('#loading').fadeOut( 400, "linear" );
        }, 300);
    });
</script>

</head>
<body>
<div id="loading" style="display: none;">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>

<style type="text/css">

    html,body {
        height: 100%;
        background: #fff;
    }

</style>

<div class="center-vertical">
    <div class="center-content row">
        
        <form action="" id="login-validation" class="col-md-7 col-sm-5 col-xs-11 col-lg-7 center-margin" method="post">
            
            <div id="login-form" class="content-box bg-default">
                 <?=$form["message"]?>
                <div class="content-box-wrapper pad20A">
                    <a href="<?=App::route("")?>">
                    <img class="mrg25B center-margin radius-all-100 display-block" src="<?=App::Assets()->getAsset("")?>image-resources/logo.png" alt="">
                    </a>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon addon-inside bg-gray">
                                <i class="glyph-icon icon-edit"></i>
                            </span>
                            <input class="form-control" id="exampleInputEmail1" placeholder="Fullname" value="<?=@$form["fullname"]?>" type="text" name="fullname" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon addon-inside bg-gray">
                                <i class="glyph-icon icon-edit"></i>
                            </span>
                            <input class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?=@$form["email"]?>" type="email" name="email" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon addon-inside bg-gray">
                                <i class="glyph-icon icon-edit"></i>
                            </span>
                            <input class="form-control" id="exampleInputEmail1" placeholder="Username" value="<?=@$form["username"]?>" type="text" name="username" required="">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon addon-inside bg-gray">
                                <i class="glyph-icon icon-edit"></i>
                            </span>
                            <input class="form-control" id="exampleInputEmail1" placeholder="Password" type="password" name="password" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon addon-inside bg-gray">
                                <i class="glyph-icon icon-edit"></i>
                            </span>
                            <input class="form-control" id="exampleInputEmail1" placeholder="Bank" value="<?=@$form["bank"]?>" type="text" name="bank" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon addon-inside bg-gray">
                                <i class="glyph-icon icon-edit"></i>
                            </span>
                            <input class="form-control" id="exampleInputEmail1" placeholder="Account Name" value="<?=@$form["account_name"]?>" type="text" name="account_name" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon addon-inside bg-gray">
                                <i class="glyph-icon icon-edit"></i>
                            </span>
                            <input class="form-control" id="exampleInputEmail1" placeholder="Account Number" type="text" value="<?=@$form["account_number"]?>" name="account_number" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon addon-inside bg-gray">
                                <i class="glyph-icon icon-edit"></i>
                            </span>
                            <input class="form-control" id="exampleInputEmail1" placeholder="Phone Number" type="text" value="<?=@$form["phone"]?>" name="phone" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="register" value="register" class="btn btn-block btn-primary">Register</button>
                    </div>
                    
                </div>
            </div>

            <div id="login-forgot" class="content-box bg-default hide">
                <div class="content-box-wrapper pad20A">

                    <div class="form-group">
                        <label for="exampleInputEmail2">Email address:</label>
                        <div class="input-group">
                            <span class="input-group-addon addon-inside bg-gray">
                                <i class="glyph-icon icon-envelope-o"></i>
                            </span>
                            <input class="form-control" id="exampleInputEmail2" placeholder="Enter email" name="forget_password" type="email">
                        </div>
                    </div>
                </div>
                <div class="button-pane text-center">
                    <button type="submit" value="forget" name="forget" class="btn btn-md btn-primary">Recover Password</button>
                    <a href="#" class="btn btn-md btn-link switch-button" switch-target="#login-form" switch-parent="#login-forgot" title="Cancel">Cancel</a>
                </div>
            </div>
            <p style="font-size: 19px; font-weight: bold">Please Register only if you are ready to make payment, your account details will be deleted permanent
         If you dont make payment within 5hrs</p>

        </form>
       
    </div>
</div>
  <!-- JS Demo -->
    <script type="text/javascript" src="<?=App::Assets()->getAsset("")?>assets-minified/frontend-all-demo.js"></script>

</body>
</html>