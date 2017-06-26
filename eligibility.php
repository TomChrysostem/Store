<?php
	session_start();
	if(!isset($_SESSION['USER_ID']))
	{
		header("location:login.php");
	}
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "password";
	$dbname = "blooddonation";
	$conn  =  mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
    mysql_select_db($dbname) or die('Error invalid database');
	if(isset($_POST['txtuserid']))
	{
		$j = 0;
		$userid = $_POST['txtuserid'];
		$gender = $_POST['txtgender'];
        $eli_val="";
		foreach( $_POST as $key =>$val )
		{
			if($key == "txteli_".$j){
				$eli_id = $_POST['txteli_'.$j];
				$eli_val = $_POST['rdoans_'.$j];
                if($eli_val=="")
                    $eli_val = NULL;
				$qry = "SELECT 1 FROM tbl_bd_eligibility WHERE is_right = '$eli_val' AND id =$eli_id;";

				$result = mysql_query($qry) or die('Error SQL 1 :' .mysql_error());
				$right_array =  mysql_fetch_array($result);
				$right_data = $right_array[0];
				if($right_data == "")
				{
					echo 'Your are fail in Eligibility Quiz<input type = "button" name = "btnback" id = "btnback" value = "Try Again" onclick = "window.location=\'eligibility.php?userid='.$userid.'&gender='.$gender.'\';" />';
					exit();
				}
				$j++;
			}
		}
		header("location:appointment.php?userid=".$userid."&gender=".$user_gender);
	}
	require_once("header.php");
?>
		<div id = "banner">
				<h1 class="elig-header"><div class="alphat"><span class="glyphicon glyphicon-font"></span></div> <div class="text">New and Return donors</div></h1>
				<div class="elig-intro">
					<h2 class="elig-list-header">Please complete this section only if:</h2>
					<ul class ="elig-list">
						<li>you are a new donor, or</li>
						<li>you have not donated within the last 2 years.</li>
						<p>Otherwise , proceed to section B.</p>

					</ul>
					<div class="elig-list-quiz">
					<p>Please respond by placing a cross or a tick in the relevant box. Do not circle.</p>
					</div>
					<div class="elig-list-question">
						<p>Have you :</p>
						<div class ="elig-quiz">
						<form class = "frm" method = "POST">
						<input type = "hidden" name = "txtuserid" value = "<?php echo $_GET['userid'];?>"/>
						<input type = "hidden" name = "txtgender" value = "<?php echo $_GET['gender'];?>"/>
						<table>

							<tbody>
							<?php
								 if(isset($_GET['gender']))
								{
									$gender = $_GET['gender'];
									$qry = "SELECT * FROM tbl_bd_eligibility WHERE gender in (3,$gender)";
									$result = mysql_query($qry) or die('Error SQL 1 :' .mysql_error());
									$i = 0;
									while($data = mysql_fetch_assoc($result))
									{
										echo '<tr class = "elig-question">
															<td>'.++$counter.'</td>
															<td>'.$data['description'].'</td>
															<td><input type = "hidden" name = "txteli_'.$i.'" value = "'.$data['id'].'"></td>
															<td>
															<label class="radio-inline">
															<input type = "checkbox" name = "rdoans_'.$i.'" value = "1">Yes
															</label>
															<label class="radio-inline">
															<input type = "checkbox" name = "rdoans_'.$i.'" value = "2">No
															</label>
															</td>
													</tr>';
										$i++;
									}
								}
							?>
						</tbody>
						</table>
						<div class="col-sm-6">
								<div class="col-sm-3">
											<input type = "submit" class= "btn-reg" name = "btnsubmit" value = "Submit" />
								</div>
						<div class="col-sm-3">
							<input type="reset" name = "btnreset" value = "Reset" class = "btn-reg"/>
						</div>
						</div>

					</div>
					</div>
				</div>
		</div>

