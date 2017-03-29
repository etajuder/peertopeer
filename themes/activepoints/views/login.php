<!DOCTYPE html>
<html lang="en">
<head>
    
    <style>
        /* Loading Spinner */
        .spinner{margin:0;width:70px;height:18px;margin:-35px 0 0 -9px;position:absolute;top:50%;left:50%;text-align:center}.spinner > div{width:18px;height:18px;background-color:#333;border-radius:100%;display:inline-block;-webkit-animation:bouncedelay 1.4s infinite ease-in-out;animation:bouncedelay 1.4s infinite ease-in-out;-webkit-animation-fill-mode:both;animation-fill-mode:both}.spinner .bounce1{-webkit-animation-delay:-.32s;animation-delay:-.32s}.spinner .bounce2{-webkit-animation-delay:-.16s;animation-delay:-.16s}@-webkit-keyframes bouncedelay{0%,80%,100%{-webkit-transform:scale(0.0)}40%{-webkit-transform:scale(1.0)}}@keyframes bouncedelay{0%,80%,100%{transform:scale(0.0);-webkit-transform:scale(0.0)}40%{transform:scale(1.0);-webkit-transform:scale(1.0)}}
    </style>
    <meta charset="UTF-8">
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
<title>  <?=App::getConfig("site_name")?> </title>
<meta name="description" content="<?=App::getConfig("site_description")?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- Favicons -->

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
        
        <form action="" id="login-validation" class="col-md-4 col-sm-5 col-xs-11 col-lg-3 center-margin" method="post">
            
            <div id="login-form" class="content-box bg-default">
                 <?=$form["message"]?>
                <div class="content-box-wrapper pad20A">
                    <a href="<?=App::route("")?>">
                    <img class="mrg25B center-margin radius-all-100 display-block" src="<?=  App::Assets()->getAsset("newhack")?>/img/logo.png" alt="">
                    </a>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon addon-inside bg-gray">
                                <i class="glyph-icon icon-envelope-o"></i>
                            </span>
                            <input class="form-control" id="exampleInputEmail1" placeholder="Enter email" type="email" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon addon-inside bg-gray">
                                <i class="glyph-icon icon-unlock-alt"></i>
                            </span>
                            <input class="form-control" id="exampleInputPassword1" placeholder="Password" type="password" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="login" value="login" class="btn btn-block btn-primary">Login</button>
                    </div>
                    <div class="row">
                        <div class="checkbox-primary col-md-6" style="height: 20px;">
                            <label>
                                <input id="loginCheckbox1" class="custom-checkbox" type="checkbox">
                                Remember me
                            </label>
                        </div>
                        <div class="text-right col-md-6">
                            <a href="#" class="switch-button" switch-target="#login-forgot" switch-parent="#login-form" title="Recover password">Forgot your password?</a>
                        </div>
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

        </form>

    </div>
</div>
  <!-- JS Demo -->
    <script type="text/javascript" src="<?=App::Assets()->getAsset("")?>assets-minified/frontend-all-demo.js"></script>

</body>
</html>