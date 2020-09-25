<?php
	use secretshop\core\Helper;
	use secretshop\forms\MailForm;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Karma Shop</title>
	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="script/css/front/linearicons.css">
	<link rel="stylesheet" href="script/css/front/themify-icons.css">
	<link rel="stylesheet" href="script/css/front/bootstrap.css">
	<link rel="stylesheet" href="script/css/front/owl.carousel.css">
	<link rel="stylesheet" href="script/css/front/nice-select.css">
	<link rel="stylesheet" href="script/css/front/nouislider.min.css">
	<link rel="stylesheet" href="script/css/front/ion.rangeSlider.css" />
	<link rel="stylesheet" href="script/css/front/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="script/css/front/magnific-popup.css">
	<link rel="stylesheet" href="script/css/front/main.css">
	<link rel="stylesheet" href="script/css/front/style.css">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<script src="https://js.stripe.com/v3/"></script>
	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="<?= Helper::getUrl('Home', 'default') ?>"><img src="img/logo.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item active"><a class="nav-link" href="<?= Helper::getUrl('Home', 'default') ?>">Home</a></li>
							<?php if(isset($_SESSION['idRole']) && ($_SESSION['idRole'] == 2 || $_SESSION['idRole'] == 1)): ?>
								<li class="nav-item"><a class="nav-link" href="<?= Helper::getUrl('Shop', 'default') ?>">La boutique</a></li>
								<li class="nav-item"><a class="nav-link" href="<?= Helper::getUrl('Cart', 'default') ?>">Mon panier</a></li>
								<li class="nav-item active"><a class="nav-link" href="<?= Helper::getUrl('User', 'logout') ?>">Logout</a></li>
								<?php if(isset($_SESSION['idRole']) && ($_SESSION['idRole'] == 1)): ?>
									<li class="nav-item active"><a class="nav-link" href="<?= Helper::getUrl('Admin', 'default') ?>">Admin</a></li>
								<?php endif; ?>
								<?php else: ?>
									<li class="nav-item active"><a class="nav-link" href="<?= Helper::getUrl('User', 'login') ?>">Login</a></li>
								<li class="nav-item active"><a class="nav-link" href="<?= Helper::getUrl('Home', 'register') ?>">Inscription</a></li>
							<?php endif; ?>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item"><a href="<?= Helper::getUrl('Cart', 'default') ?>" class="cart"><span class="ti-bag"></span></a></li>
							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!-- End Header Area -->
	<br><br><br><br><br><br><br>

    <?php include "views/".$this->view.".view.php";?>


	<!-- start footer Area -->
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>About Us</h6>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore
							magna aliqua.
						</p>
					</div>
				</div>
				<div class="col-lg-4  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Newsletter</h6>
						<p>Stay update with our latest</p>
						<div class="" id="mc_embed_signup">
							<?php
								$this->addModal("form", MailForm::getForm());
							?>
						</div>
					</div>
				</div>
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget mail-chimp">
						<h6 class="mb-20">Instragram Feed</h6>
						<ul class="instafeed d-flex flex-wrap">
							<li><img src="img/i1.jpg" alt=""></li>
							<li><img src="img/i2.jpg" alt=""></li>
							<li><img src="img/i3.jpg" alt=""></li>
							<li><img src="img/i4.jpg" alt=""></li>
							<li><img src="img/i5.jpg" alt=""></li>
							<li><img src="img/i6.jpg" alt=""></li>
							<li><img src="img/i7.jpg" alt=""></li>
							<li><img src="img/i8.jpg" alt=""></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Follow Us</h6>
						<p>Let us be social</p>
						<div class="footer-social d-flex align-items-center">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
				<p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
			</div>
		</div>
	</footer>
	<!-- End footer Area -->

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="script/js/vendor/bootstrap.min.js"></script>
	<script src="script/js/jquery.ajaxchimp.min.js"></script>
	<script src="script/js/jquery.nice-select.min.js"></script>
	<script src="script/js/jquery.sticky.js"></script>
	<script src="script/js/nouislider.min.js"></script>
	<script src="script/js/jquery.magnific-popup.min.js"></script>
	<script src="script/js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>