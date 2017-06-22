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
		<form class = "frm" method = "POST">
			<input type = "hidden" name = "txtuserid" value = "<?php echo $_GET['userid'];?>"/>
			<input type = "hidden" name = "txtgender" value = "<?php echo $_GET['gender'];?>"/>
			<table>
				<!--<th>Question</th>-->
				<!--<th>Answer</th>-->
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
								echo '<tr><td>'.$data['description'].'</td><td><input type = "hidden" name = "txteli_'.$i.'" value = "'.$data['id'].'"></tr></td>
								<tr><td><input type = "radio" name = "rdoans_'.$i.'" value = "1">Yes<input type = "radio" name = "rdoans_'.$i.'" value = "2">No</td></tr>';
								$i++;

								//echo '<tr><td>'.$data['description'].'</td><td><input type = "hidden" name = "txteli_'.$i.'" value = "'.$data['id'].'"><input type = "radio" name = "rdoans_'.$i.'" value = "1">Yes<input type = "radio" name = "rdoans_'.$i.'" value = "2">No</td><tr>';
								//$i++;



							}
						}
					?>
				</tbody>
			</table>
			<div style="padding-bottom: 10px;">
				<input type = "submit" name = "btnsubmit" value = "Submit">
				<input type = "reset" name = "btnreset" value = "Reset">
			</div>
		</form>
	</div>
<?php
	require_once("footer.php");
?>