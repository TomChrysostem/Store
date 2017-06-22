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
    //echo $SortingCols;exit;
    $cri_str=" WHERE ap.user_id=".$_GET['user_id'];
    $dbhost="localhost";
    $dbuser="root";
    $dbpass="password";
    $dbname="blooddonation";
    $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
    mysql_select_db($dbname) or die('Error invalid database');
    $query ="SELECT SQL_CALC_FOUND_ROWS *,ap.id as apid FROM tbl_bd_appointment as ap
                LEFT JOIN tbl_bd_user as u on u.id=ap.user_id
                    LEFT JOIN tbl_bd_bloodbank as bb on ap.bloodbank_id=bb.id $cri_str";
    $query .= $SortingCols;
    if ($DisplayLength != 0)
    $query .= " LIMIT $DisplayStart, $DisplayLength;";
    //echo $query;exit;
    $result = mysql_query($query) or die('Error SQL 1 :' .mysql_error());
    $query = "SELECT FOUND_ROWS()";
    $rResultFilterTotal = mysql_query($query) or die('Error SQL 1 :' .mysql_error());
    $aResultFilterTotal = mysql_fetch_array($rResultFilterTotal);
    $response = array('sEcho'=>$sEcho,'iTotalRecords'=>$DisplayLength,'iTotalDisplayRecords'=>$aResultFilterTotal[0],'aaData'=>array());
    $i = $DisplayStart;

    while($aRow = mysql_fetch_assoc($result))
    {
        $action="";
        $tmpentry = array();
        $tmpentry[] = ++$i;
        if($aRow['user_gender'] == 1)
            $gender = "Male";
        else
            $gender = "Female";
        $tmpentry[] = htmlspecialchars($aRow['appointment_date']);
        $tmpentry[] = htmlspecialchars($aRow['bank_name']);
        if($aRow['status'] == 1)
            $status = "Pending";
        else if($aRow['status'] == 2)
            $status = "Finished";
        else
            $status = "Cancel";
        $tmpentry[] = htmlspecialchars($status);
        if($aRow['status'] == 1)
		$action .="<a onclick='cancel_appointment(".$aRow['apid'].")' ><img src='img/delete.gif' title='delete' /></a>";
        $tmpentry[] = $action;
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
            return 'ap.id';
        else if ( $i == 1 )
            return 'appointment_date';
        else if ( $i == 2 )
            return 'bank_name';
        else if ( $i == 3)
            return 'status';
        else
            return 'id';
    }
    ?>