<?php
	$DisplayStart = 0;
	$DisplayLength = 10;
	$SortingCols = '';
	
	$sEcho = intval($_GET['sEcho']);
	
	if ( isset( $_GET['iDisplayStart'] ) )
	{
		$DisplayStart = $_GET['iDisplayStart'];
	}
	
	if ( isset( $_GET['iDisplayLength'] ) )
	{
		$DisplayLength = $_GET['iDisplayLength'];
	}
	
	if ( isset( $_GET['iSortCol_0'] ) )
	{
		$SortingCols = " ORDER BY  ";
		for ( $i=0 ; $i < $_GET['iSortingCols']; $i++ )
		{
			$SortingCols .= fnColumnToField($_GET['iSortCol_'.$i])."	".$_GET['sSortDir_'.$i].", ";
		}
		$SortingCols = substr_replace($SortingCols, "", -2 );	
	}
	$dbhost="localhost";
    $dbuser="root";
    $dbpass="khw";
    $dbname="blooddonation";
	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
	mysql_select_db($dbname) or die('Error invalid database');
	$query = "SELECT SQL_CALC_FOUND_ROWS * FROM tbl_bd_eligibility ";
	$query .= $SortingCols;
	if ($DisplayLength != 0)
		$query .= " LIMIT $DisplayStart, $DisplayLength;";
	$result = mysql_query($query) or die('Error SQL 1 :' .mysql_error());
	$query = "SELECT FOUND_ROWS()";
	$rResultFilterTotal = mysql_query($query) or die('Error SQL 1 :' .mysql_error());
	$aResultFilterTotal = mysql_fetch_array($rResultFilterTotal);
	$response = array('sEcho'=>$sEcho,'iTotalRecords'=>$DisplayLength,'iTotalDisplayRecords'=>$aResultFilterTotal[0],'aaData'=>array());
	$i = $DisplayStart;
	
	while($aRow = mysql_fetch_assoc($result))
	{
		$tmpentry = array();
		$tmpentry[] = ++$i;
		if($aRow['gender'] == 1)
			$gender = "Male";
		elseif($aRow['gender'] == 2)
			$gender = "Female";
		else
			$gender = "All";
		$tmpentry[] = htmlspecialchars($aRow['description']);
		$tmpentry[] = htmlspecialchars($gender);
		$tmpentry[] = "action";
		$response['aaData'][] = $tmpentry;
	}
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
	header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" );
	header("Cache-Control: no-cache, no-store, must-revalidate" );
	header("Pragma: no-cache" );
	header("Content-type: text/x-json");
	echo json_encode($response);
	
	function fnColumnToField( $i )
	{
		if ( $i == 0 )
			return TRUE;
		else if ( $i == 1 )
			return 'description';
		else if ( $i == 2 )
			return 'gender';	
		else
			return 'id';
	}
?>