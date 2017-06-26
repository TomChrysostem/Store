<html>
	<head>
	<link href="css/style.css" type="text/css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/tablegrid_ui.css" type="text/css" rel="stylesheet">
	<link href="css/jquery-ui-1.8.2.custom_green.css" type="text/css" rel="stylesheet">
	<!--<link href="css/loginstyle.css" rel="stylesheet" type="text/css">
	<link href="css/loginstyle.scss" rel="stylesheet" type="text/css">-->
	<style>
		.navbar {
			height:50px;
			text-align: center;
			background:url('../img/main_bg1.jpg');
			border: 0;
			border-radius: 0;
			margin-bottom: 0;
			font-size: 12px;
			letter-spacing: 5px;
		}
		.navbar-default .navbar-nav > li > a {
			color: #fff;
		}
		.navbar-default .navbar-nav > li > a:hover {
			color: #333;
			background-color:#fff;
			display: block;
		}

	</style>
	</head>
	<body>
		<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
		<script type="text/javascript" src="js/jquery.glide.min.js"></script>
		<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="js/jquery.cookie.js"></script>
		<script type="text/javascript" src="js/jquery.ui.js"></script>
		<script type="text/javascript" src="js/popup.js"></script>
		<script type="text/javascript" src="js/dataTables.fnStandingRedraw.js"></script>
		<div id="wrapper">
			<!-- Navbar -->
			<nav class="navbar navbar-default">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#"><font class="fo"> <span class="glyphicon glyphicon-tint"></span>Blood Donation Servie</font></a>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="nav navbar-nav navbar-right">
							<li><a href="index.php">HOME</a></li>
							<li><a href="available_blood.php">Available Blood</a></li>
							<?php

							if(!isset($_SESSION['USER_ID']))
							{
								echo '<li><a href="login.php">Login</a></li>';

							}else{
								echo '<li><a href="logout.php">Logout</a></li>';
							}
						?>
						<li><a href="register.php">Register</a></li>
						</ul>
					</div>
				</div>
			</nav>

			<div id="banner" >