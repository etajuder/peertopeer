<!DOCTYPE HTML>

<html>
	<head>
            <title><?=App::getConfig("site_name")?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
                <meta name="description" content="<?=App::getConfig("site_description")?>" />
                <link rel="stylesheet" href="<?=App::Assets()->getAsset("newhack")?>/assets/css/main.css" />
		<noscript><link rel="stylesheet" href="<?=App::Assets()->getAsset("newhack")?>/assets/css/noscript.css" /></noscript>
		
	</head>
	<body>

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Wrapper -->
					<div id="wrapper">

						<!-- Panel (Banner) -->
							<section class="panel banner right">
								<div class="content color0 span-3-75">
									<h1 class="major"><!--[-->Welcome, This is<!--]--><br />
									<!--[-->ActivePayout<!--]--></h1>
									<p><!--[-->Created to promote the <strong>greatest good</strong>, with a particular emphasis on helping man and the environment.
									We believe that the ability to live the routine you wish without having to work or rely on anyone else for cash.
									<!--]--></p>
									<ul class="actions">
										<li><a href="#first" class="button special color1 circle icon fa-angle-right">Next</a></li>
									</ul>
								</div>
								<div class="image filtered span-1-75" data-position="25% 25%">
									<img src="<?=App::Assets()->getAsset("newhack")?>/images/pic01.jpg" alt="" />
								</div>
							</section>

						<!-- Panel (Spotlight) -->
							<section class="panel spotlight medium right" id="first">
								<div class="content span-7">
									<h2 class="major">Packages</h2>
									<p>
									Classic || Pay N10,000
                                                                        <ul class="actions"><li><a href="<?=App::route("register")?>" class="button special color2">Get N20,000</a></li></ul>
									Standard || Pay N20,000
									<ul class="actions"><li><a href="<?=App::route("register")?>" class="button special color2">Get N40,000</a></li></ul>
									Premium || Pay N50,000
									<ul class="actions"><li><a href="<?=App::route("register")?>" class="button special color2">Get N100,000</a></li></ul>
                                                                        <ul class="actions"><li>
                                                                                <a href="<?=App::route("register")?>" class="button special color4">Register</a>
                                                                                <a href="<?=App::route("login")?>" class="button special color4">Login</a>
                                                                            </li></ul>
									</p>
								</div>
								<div class="image filtered tinted" data-position="top left">
									<img src="<?=App::Assets()->getAsset("newhack")?>/images/pic02.jpg" alt="" />
								</div>
							</section>

						<!-- Panel -->
							<section class="panel color1">
								<div class="intro joined">
									<h2 class="major">How it works</h2>
									<p>You will be rewarded with 100% of your investment within the period of 2hrs to 5days. ie two participants will donated the same amount you invested to you
										You must make donation within 3 hours once you are matched to make payment by receiving a mail from admin@activepayout.com<br />
										If you do not make donation after 3 hours, you will be deleted from the entire system<br />
											No referral links, just register and participate.<br />
											You have to be email active!<br />
											If you do not receive your money within the period of 2hr to 1 week kindly send contact us</p>
								</div>
								<div class="inner">
									<ul class="grid-icons three connected">
										<li><span class="icon fa-magic"><span class="label"></span></span></li>
										<li><span class="icon fa-fast-forward"><span class="label"></span></span></li>

										<li><span class="icon fa-money"><span class="label"></span></span></li>
									</ul>
								</div>
							</section>

						

						<!-- Panel -->
							<section class="panel">
								<div class="intro color2">
									<h2 class="major">About Us</h2>
									<p>ActivePayout is a peer to peer donation platform which enables participants raise fund for businesses and for other project. With activepayout you can raise any amount of money to start up a good business. We offer 100% of your investment in return within the period of 2hrs to 1 week of investment. You get 100% of your investment within an hour if the system decides to pay at that particular moment. </p>
								</div>
								<div class="gallery">
									<div class="group span-3">
										<a href="#" class="image filtered span-3" data-position="bottom"><img src="<?=App::Assets()->getAsset("newhack")?>/images/gallery/thumbs/01.jpg" alt="" /></a>
										<a href="#" class="image filtered span-1-5" data-position="center"><img src="<?=App::Assets()->getAsset("newhack")?>/images/gallery/thumbs/02.jpg" alt="" /></a>
										<a href="#" class="image filtered span-1-5" data-position="bottom"><img src="<?=App::Assets()->getAsset("newhack")?>/images/gallery/thumbs/03.jpg" alt="" /></a>
									</div>
									<a href="<?=App::Assets()->getAsset("newhack")?>/images/gallery/fulls/04.jpg" class="image filtered span-2-5" data-position="top"><img src="images/gallery/thumbs/04.jpg" alt="" /></a>
									
									
								</div>
							</section>

						<!-- Panel -->
							<section class="panel color4-alt">
								<div class="intro color4">
									<h2 class="major">Support</h2>
									<p>Our system will not wait for 48 hours to pair you but it will pair you immediately there is availability of donation that suit you. No Fake PoP: We crawl the system every time to check the proof of payment and any fake proof of payment will be discovered as we invest enough energy to investigation. Participant with fake PoP will be blocked permanently as soon as report is made and investigations have been done. No Fake Phone Number: The process of successful provision of donation is a responsibility of both parties and as such the two parties are to help each other in this process. Failed orders will be investigated and we will not take lightly to failed orders as a result of wrong or incomplete details like phone number or account details. Support: fastest support ever,don't hesitate to create a support ticket. We are here to listen to your cries and plea</p>
								</div>
								<div class="inner columns divided">
									<div class="span-3-25">
										<form method="post" action="#">
											<div class="field half">
												<label for="name">Name</label>
												<input type="text" name="name" id="name" />
											</div>
											<div class="field half">
												<label for="email">Email</label>
												<input type="email" name="email" id="email" />
											</div>
											<div class="field">
												<label for="message">Message</label>
												<textarea name="message" id="message" rows="4"></textarea>
											</div>
											<ul class="actions">
												<li><input type="submit" value="Send Message" class="button special" /></li>
											</ul>
										</form>
									</div>
									<div class="span-1-5">
										<ul class="contact-icons color1">
											<li class="icon fa-twitter"><a href="#"></a></li>
											<li class="icon fa-facebook"><a href="#"></a></li>
											
										</ul>
									</div>
								</div>
							</section>

						<!-- Panel -->
							
						<!-- Copyright -->
							<div class="copyright">&copy; Design: <a href="">penovo.designs</a>.</div>

					</div>

			</div>

		<!-- Scripts -->
			<script src="<?=App::Assets()->getAsset("newhack")?>/assets/js/jquery.min.js"></script>
			<script src="<?=App::Assets()->getAsset("newhack")?>/assets/js/skel.min.js"></script>
			<script src="<?=App::Assets()->getAsset("newhack")?>/assets/js/main.js"></script>

	</body>
</html>