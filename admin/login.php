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
		$txtuseremail=$_POST['txtuseremail'];
		$txtuserpassword=$_POST['txtuserpassword'];
		$qry="SELECT admin_id FROM tbl_bd_admin WHERE login_email='$txtuseremail' AND password='$txtuserpassword'";
		$result=mysql_query($qry) or die('Error SQL 1 :' .mysql_error());
		$right_array= mysql_fetch_array($result);
		$right_data=$right_array[0];
		if($right_data>0){
			$admin_id=$right_data;
			$_SESSION['ADMIN_ID']=$admin_id;
			session_write_close();
			header("location:appointment_list.php");
		}else{
			$errors[] ="Login fail";
		}
	}
	$_POST="";
}
require_once('admin_header.php');
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
 -->            <p class="message">Not registered? <a href="#">Create an account</a></p>
		</form>
	</div>
	</div>
<!-- End new login design -->

<?php
	mysql_close($conn);//close db conection
	require_once('admin_footer.php');
?>