<htmL>
<head>
	<link href="../css/style.css" type="text/css" rel="stylesheet">

	<link href="../css/tablegrid_ui.css" type="text/css" rel="stylesheet">
	<link href="../css/jquery-ui-1.8.2.custom_green.css" type="text/css" rel="stylesheet">
</head>
	<script type="text/javascript" src="../js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="../js/jquery.glide.min.js"></script>
	<script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="../js/jquery.cookie.js"></script>
	<script type="text/javascript" src="../js/jquery.ui.js"></script>
	<script type="text/javascript" src="../js/popup.js"></script>
	<script type="text/javascript" src="../js/dataTables.fnStandingRedraw.js"></script>
<body>
	<div id="wrapper">
		<div id="title">
			<center><font class="fo">Online Blood Donation Service</font></center>
			<div id="logotitle">
				<nav class="nav">
					<ul>
					<?php
						if(!isset($_SESSION['ADMIN_ID'])){
							echo  "<li><a href='login.php'>Login</a></li>";
						}else{
							echo "<li><a href='appointment_list.php'>Appointment</a></li>";
							echo '<li><a href="logout.php">Logout</a></li>';
						}
					?>
					</ul>
				</nav>
			</div>
		</div>
		<div id="banner" >