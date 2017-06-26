<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "password";
	$dbname = "blooddonation";
	$conn  =  mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
	mysql_select_db($dbname) or die('Error invalid database');
	$errors = array();
	if(isset($_POST['txtname']))
	{
		if(trim($_POST['txtname']) == '')
		{
			$errors[] = 'Please enter User name!';
		}
		else if(trim($_POST['txtemail']) == '')
		{
			$errors[] = 'Please enter User email!';
		}
		else if(trim($_POST['txtpassword']) == '')
		{
			$errors[] = 'Please enter User Password!';
		}
		else if(trim($_POST['rdogender']) == '')
		{
			$errors[] = 'Please check User gender!';
		}
		else if(trim($_POST['txtaddress']) == '')
		{
			$errors[] = 'Please enter User address!';
		}
		else if(trim($_POST['txtphone']) == '')
		{
			$errors[] = 'Please enter User phone!';
		}
		else if(trim($_POST['selblood']) == '')
		{
			$errors[] = 'Please select User Blood type!';
		}
		if(!count($errors)){
			$txtname = $_POST['txtname'];
			$txtemail = $_POST['txtemail'];
			$txtpassword = $_POST['txtpassword'];
			$rdogender = $_POST['rdogender'];
			$txtaddress = $_POST['txtaddress'];
			$txtphone = $_POST['txtphone'];
			$selblood = $_POST['selblood'];

			$qry = "INSERT INTO tbl_bd_user(user_name, user_email, user_password, user_gender, user_address, user_phone, blood_type_id) VALUES ('$txtname','$txtemail','$txtpassword','$rdogender','$txtaddress','$txtphone','$selblood');";
			$result = mysql_query($qry) or die('Error SQL 1 :' .mysql_error());
			if($result)
			{
				$usesr_id = mysql_insert_id();
				header("location:eligibility.php?userid=".$usesr_id."&gender=".$rdogender);
			}
			else
			{
				$errors[]="User Register fail";
			}
		}
		$_POST="";
	}
	require_once("header.php");
?>
<script language="JavaScript" >
jQuery(document).ready(function()
						 {
						 AddValidation();
						 });
function AddValidation()
{
	jQuery("#register").validate(
	 {
	 'rules':
	 {
	 'txtname':{'required': true},
	 'txtemail':{'required':true, 'email':true},
	 'txtpassword':{'required':true,'minlength':3},
	 'txtconfrimpass':{'required':true, 'equalTo':'#txtpassword'},
	 'rdogender':{'required': true},
	 'txtphone':{'required': true},
	 'selblood':{'required': true},
	 'txtaddress':{'required': true}

	 },
	 'messages':
	 {
	 'txtname':{'required':'Please enter name!'},
	 'txtpassword':{'required':'Please enter	password!','minlength':'Password must have at least 3 characters!'},
	 'txtconfrimpass':{'required':'Please enter confirm password!',	'equalTo':'Comfirm password must equal to password!'},
	 'rdogender':{'required':'Please select the gender type!'},
	 'selblood':{'required':'Please select blood type!'},
	 'txtphone':{'required':'Please enter phone!'},
	 'txtemail':{'required':'Please enter email!','email':'Please enter valid email!'},
	 'txtaddress':{'required': 'Please enter address!'}
	 }
	 });
}
</script>

<?php
	if(count($errors))
	{
		echo "<div class='message'><img src='img/warning.png'>";
		echo implode('<br>', $errors);
		echo "</div>";
	}
?>

<div class="container">
	<div class="row">
	<h2 class="rg-title">Donar Registration</h2>
	<form method = "POST" class="Reg-form"  id ="register">

	<div class="col-sm-6">
		<div class="form-group">
			<label for="name">Name: <b class="require">*</b></label>
			<input type="text" id="name" name="txtname" class="form-control" placeholder="Enter your name">
		</div>
	</div>
		<div class="col-sm-6">
		<div class="form-group">
			<label for="name">Email: <b class="require">*</b></label>
			<input type="text" id="mail" name="txtemail" class="form-control" placeholder="Enter your email">
		</div>
	</div>

		<div class="col-sm-6">
			<div class="form-group">
				<label for="pwd">Password:<b class="require">*</b></label>
				<input type="password" class="form-control"  id="txtpassword" name="txtpassword" placeholder="Enter password">
			</div>
		</div>

		<div class="col-sm-6">
			<div class="form-group">
				<label for="pwd">Comfirm Password:<b class="require">*</b></label>
				<input type="password" class="form-control" id="pwd" placeholder="Enter password" name = "txtconfrimpass">
			</div>
		</div>



		<div class="col-sm-6">
			<div class="form-group">
				<label for="name">Address: <b class="require">*</b></label>
				<input type="text" name = "txtaddress" class="form-control" placeholder="Enter your email">
			</div>
		</div>

		<div class="col-sm-6">
			<div class="form-group">
				<label for="name">Phone: <b class="require">*</b></label>
				<input type="text" name = "txtphone" class="form-control" placeholder="Enter your phone">
			</div>
		</div>

		<div class="col-sm-6">
			<label >Gender<b class="require">*</b></label>
			<div class="radio-inline">
					<label class="radio-inline">
						<input type="radio" name="rdogender" value="1">Male
					</label>
					<label class="radio-inline">
						<input type="radio" name="rdogender" value="2">Female
					</label>
			</div>
		</div>

		<div class="col-sm-6">
			<div class="form-group">
				<select class="selectpicker form-control">
				<option selected="">Blood Type</option>
				 <?php
						$qry = "SELECT * FROM tbl_bd_blood_type WHERE 1=1";
						$result = mysql_query($qry) or die('Error SQL 1 :' .mysql_error());
						$i = 0;
						while($data = mysql_fetch_assoc($result))
						{
							echo '<option value='.$data['id'].'>'.$data['blood_type_name'].'</option>';
							$i++;
						}
					?>
			</select>

			</div>
		</div>

		<div class="col-sm-6">
			<div class="col-sm-3">
				<input type = "submit" class= "btn-reg" name = "btnsubmit" value = "Submit" />
			</div>
			<div class="col-sm-3">
				<input type="reset" name = "btnreset" value = "Reset" class = "btn-reg"/>
			</div>
		</div>



	</form>
	</div>
</div>

<?php
	mysql_close($conn);//close db conection
	require_once("footer.php");
?>