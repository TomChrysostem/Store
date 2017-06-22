<html>
	<head>
	<link href="css/style.css" type="text/css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/tablegrid_ui.css" type="text/css" rel="stylesheet">
	<link href="css/jquery-ui-1.8.2.custom_green.css" type="text/css" rel="stylesheet">
	<!--<link href="css/loginstyle.css" rel="stylesheet" type="text/css">
	<link href="css/loginstyle.scss" rel="stylesheet" type="text/css">-->
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
			<div id="title">
				<font class="fo">Blood Donation Service</font>
				<div id="logotitle">
					<nav class="nav">
						<ul>
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
					</nav>

				</div>
			</div>
			<div id="banner" >