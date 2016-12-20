<?php
session_start();
$con = mysqli_connect("localhost", "bemycar", "bemycar1", "bemycar");

if (!empty($_SESSION['email'])) { 

	$email = $_SESSION['email'];

}else{

	if(basename($_SERVER['PHP_SELF'])=='index.php' || basename($_SERVER['PHP_SELF'])=='search.php'){
		//its ok
		//what am i doing here ?
	}else{
		header('Location: index.php');
	}
}

?>


<head>
	<link rel='stylesheet' href='assets/css/main.css'>
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,700" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src='assets/js/slick.min.js'></script>

	<meta property="og:title" content="Be My Car" />
	<meta property="og:description" content="The Easy Way To Advertise Your Car" />
	<meta property="og:url" content="http://www.bemycar.co.uk" />
	<meta property="og:image" content="http://bemycar.co.uk/img/logo.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
<div class="o-overlay"></div>

<header class="c-header">
	<div class="o-layout-container">

		<div class="c-header__logo">
			<a href='index.php'><img src='img/logo.png'></img></a>
		</div>

		<nav class="c-header__nav">
			<ul>

	<!-- If logged in -->
	<?php if(!empty($email)){?>
			<!--	<li class="js-header-logout c-header__logout" id='logout'><a class="c-btn c-btn--small" href='logout.php'>LOG OUT</a></li> -->
				<!--<li class="js-header-my-account" id='account'><a class="c-btn c-btn--small" href='my_account.php'>MY ACCOUNT</a></li> -->
				<!-- <li id='contactdrop'><a href='#'>CONTACT US</a></li> -->

			</ul>
		</nav>
		<!-- <nav>
			<a href='#' id='pull'>Menu</a>
		</nav> -->

	<?php }else{ ?>
				<!--<li id='signindrop' class="js-header-signin js-popup c-btn c-btn--small" role="button">SIGN IN</li> -->
			<!--	<li id='signupdrop' class="js-header-signup js-popup c-header__signup c-btn c-btn--small" role="button">SIGN UP</li> -->
				<!-- <li id='contactdrop' class="js-header-contact js-popup c-btn c-btn--small" role="button">CONTACT US</li> -->

				</ul>
				</nav>
			<!-- <nav class='clearfix'>
				 <a href='#' id='pull'>Menu</a>
			</nav> -->

	<?php } ?>

		<div class='c-popup-wrapper'>

			<?php include 'popups.php'; ?>

		</div>
	</div>
</header>
<div class="page-wrap">
