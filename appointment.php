<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "password";
    $dbname = "blooddonation";
    $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
    mysql_select_db($dbname) or die('Error invalid database');
    session_start();
    $userid="";
    if(!isset($_SESSION['USER_ID']))
    {
        header("location:login.php");
    }
    else{
        $userid=$_SESSION['USER_ID'];
    }
    if(isset($_POST['txtuserid']))
	{
		$user_id = $_POST['txtuserid'];
        $selbloodbank = $_POST['selbloodbank'];
		mysql_select_db($dbname) or die('Error invalid database');
		$qry = "INSERT INTO tbl_bd_appointment(user_id, appointment_date, bloodbank_id ,status) VALUES ('$user_id',NOW(),'$selbloodbank',1);";
		$result = mysql_query($qry) or die('Error SQL 1 :' .mysql_error());
		if($result)
		{
            header("location:appointment_list.php?userid=".$user_id."&gender=".$_GET['gender']);exit;
		}
		else
		{
			echo "";
		}
	}
	require_once("header.php");
?>
<div class = "login">
	<h4>Appointment</h4>
		<form id = "register" class = "frm" method = "POST">
			Are you want to make appointment?
			<input type = "hidden" name = "txtuserid" value = "<?php echo $userid;?>"/>
            <div>
                <select name="selbloodbank">
                    <?php
                        $qry = "SELECT * FROM tbl_bd_bloodbank WHERE 1=1";
                        $result = mysql_query($qry) or die('Error SQL 1 :' .mysql_error());
                        $i = 0;
                        while($data = mysql_fetch_assoc($result))
                        {
                            echo '<option value='.$data['id'].'>'.$data['bank_name'].'</option>';
                            $i++;
                        }
                    ?>
                </select>
            </div>
			<div>
				<input type = "submit" name = "btnsubmit" value = "Submit">
				<input type = "reset" name = "btnreset" value = "Reset">
			</div>
		</form>
</div>
<?php
    mysql_close($conn);//close db conection
	require_once("footer.php");
?>