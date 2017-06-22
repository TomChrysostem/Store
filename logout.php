<?php
	session_start();
	session_destroy();
	session_write_close();
	require_once("header.php");
?>
<div class="login">
    <p>Logout Successfully<a href="index.php">Go to Home Page</a></p>
</div>
<?php
	require_once("footer.php");
?>