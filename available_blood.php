<?php
	require_once("header.php");
?>



<div class= "continer">

  <table id="customers">

 <th>Blood Bank</th>

   <th class="alt">Blood Type</th>

	  <th class="alt">Available Blood</th>

	 <tbody>

	<?php
			$dbhost = "localhost";
			$dbuser = "root";
			$dbpass = "password";
			$dbname = "blooddonation";
			$conn  =  mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
			mysql_select_db($dbname) or die('Error invalid database');
			$qry = "SELECT * FROM tbl_bd_available_blood as ab
						LEFT JOIN tbl_bd_bloodbank as bb ON ab.bloodbank_id=bb.id
							LEFT JOIN tbl_bd_blood_type as bt ON ab.bloodtype_id=bt.id";
			$result = mysql_query($qry) or die('Error SQL 1 :' .mysql_error());
			$i = 0;
			while($data = mysql_fetch_assoc($result))
			{
				echo '<tr><td>'.$data['bank_name'].'</td><td>'.$data['blood_type_name'].'</td><td>'.$data['available_count'].'</td><tr>';
				$i++;
			}
			/*$qry2 = "SELECT * FROM tbl_bd_available_blood as ab
						LEFT JOIN tbl_bd_bloodbank as bb ON ab.bloodbank_id=bb.id
							LEFT JOIN tbl_bd_blood_type as bt ON ab.bloodtype_id=bt.id
							where bb.id=2";
			$result = mysql_query($qry2) or die('Error SQL 1 :' .mysql_error());
			$i = 0;
			while($data = mysql_fetch_assoc($result))
			{
				echo '<tr><td>'.$data['bank_name'].'</td><td>'.$data['blood_type_name'].'</td><td>'.$data['available_count'].'</td><tr>';
				$i++;
			}
			$qry3 = "SELECT * FROM tbl_bd_available_blood as ab
						LEFT JOIN tbl_bd_bloodbank as bb ON ab.bloodbank_id=bb.id
							LEFT JOIN tbl_bd_blood_type as bt ON ab.bloodtype_id=bt.id
							where bb.id=3";
			$result = mysql_query($qry3) or die('Error SQL 1 :' .mysql_error());
			$i = 0;
			while($data = mysql_fetch_assoc($result))
			{
				echo '<tr><td>'.$data['bank_name'].'</td><td>'.$data['blood_type_name'].'</td><td>'.$data['available_count'].'</td><tr>';
				$i++;
			}*/
		?>

	</tbody>
	</table>
</div>
<?php
	require_once("footer.php");
?>