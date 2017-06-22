<?php
    $dbhost="localhost";
    $dbuser="root";
    $dbpass="root";
    $dbname="blooddonation";
    $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
    mysql_select_db($dbname) or die('Error invalid database');
    //delete
    if( isset($_GET['actionid']) )
    {
        $actionid=(int)$_GET['actionid'];
        $actionuserstatus=(int)$_GET['actionuserstatus'];
        $bloodbank=(int)$_GET['bloodbank'];
        $bloodtype=(int)$_GET['bloodtype'];
        $qry = "UPDATE tbl_bd_appointment SET status=$actionuserstatus WHERE id=$actionid";
        $result = mysql_query($qry) or die('Error SQL 1 :' .mysql_error());
        
        if ( $result )
        {
            if($actionuserstatus==2){
                $qry = "UPDATE tbl_bd_available_blood SET available_count=available_count+1 WHERE bloodbank_id=$bloodbank AND bloodtype_id=$bloodtype";
            }else{
                $qry = "UPDATE tbl_bd_available_blood SET available_count=available_count-1 WHERE bloodbank_id=$bloodbank AND bloodtype_id=$bloodtype";
            }
           // echo $qry;exit;
            $result = mysql_query($qry) or die('Error SQL 1 :' .mysql_error());
            $json_retrun_arr['success'] = 1;
            $json_retrun_arr['message'] = 'Change Status Successfully';
        }
        else
        {
            $json_retrun_arr['success'] = 0;
            $json_retrun_arr['message'] = 'Change Status Fail';
        }
    }
    if( isset($_GET['deleteid']) )
    {
        $deleteid=(int)$_GET['deleteid'];
        $qry = "DELETE FROM tbl_bd_appointment WHERE id=$deleteid";
        $result = mysql_query($qry) or die('Error SQL 1 :' .mysql_error());
        
        if ( $result )
        {
            $json_retrun_arr['success'] = 1;
            $json_retrun_arr['message'] = 'Delete Appointmet Successfully';
        }
        else
        {
            $json_retrun_arr['success'] = 0;
            $json_retrun_arr['message'] = 'Delete Appointmet Fail';
        }
    }
    echo json_encode($json_retrun_arr);
?>