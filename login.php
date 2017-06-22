<?php
session_start();
$dbhost="localhost";
$dbuser="root";
$dbpass="password";
$dbname="blooddonation";
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
mysql_select_db($dbname) or die('Error invalid database');
if(isset($_POST['txtuseremail'])){
	if(trim($_POST['txtuseremail']) == '')
	{
		$errors[] = 'Please enter login email!';
	}
	else if(trim($_POST['txtuserpassword']) == '')
	{
		$errors[] = 'Please enter User password!';
	}

	if(!count($errors)){
			$txtuseremail = $_POST['txtuseremail'];
			$txtuserpassword = $_POST['txtuserpassword'];

			$qry = "SELECT id,user_gender FROM tbl_bd_user WHERE user_email = '$txtuseremail' AND user_password = '$txtuserpassword'";
			$result = mysql_query($qry) or die('Error SQL 1 :' .mysql_error());
			$right_array = mysql_fetch_array($result);
			$right_data = $right_array[0];

			if($right_data>0)
			{
				$user_id = $right_data;
				$user_gender = $right_array[1];
				$_SESSION['USER_ID'] = $user_id;

				header("location:appointment_list.php?userid=".$user_id."&gender=".$user_gender);exit;
			}else{
			$errors[] ="Login fail";
		}
	}
	$_POST="";
}
   require_once("header.php");
	session_write_close ();
?>

<!-- new login design  -->
	<div class="login-page">
	<div class="form">
		<form class="login-form"　id="register" method="POST">
			<input type="text" placeholder="username" name="txtuseremail"/>
			<input type="password" placeholder="password" name="txtuserpassword"/>
			<!-- <button>login</button> -->
			<input type="submit" name="btnsubmit" value="Submit" class ="btn">
			<!--<input type="reset" name="btnreset" value="Reset">
 -->			<p class="message">Not registered? <a href="#">Create an account</a></p>
		</form>
	</div>
	</div>
<!-- End new login design -->
<?php
	mysql_close($conn);//close db conection
	require_once('footer.php');
?>