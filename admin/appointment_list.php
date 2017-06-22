<?php
    session_start();
    if(!isset($_SESSION['ADMIN_ID'])){
        header('location:login.php');
    }
    require_once('admin_header.php');
?>
<script language="javascript">
function change_appointment_status(actionid, actionuserstatus,bloodtype,bloodbank)
{
    jQuery('#successmes').html('&nbsp;');
    if(actionuserstatus==1)
    {
        actionuserstatus=2;
        result=confirm('Are you sure want to change to Finished status?');
    }
    else if(actionuserstatus==2)
    {
        actionuserstatus=1;
        result=confirm('Are you sure want to change to Pending status?');
    }
    if(result)
        jQuery.getJSON('appointment_exec.php?actionid=' + actionid	+'&actionuserstatus='+ actionuserstatus+'&bloodbank='+ bloodbank+'&bloodtype='+ bloodtype, appointment_exec_callback)
}
function delete_appointment(deleteid)
{
    jQuery('#successmes').html('&nbsp;');
    result=confirm('Are you sure want to Delete Appointment');

    if(result)
        jQuery.getJSON('appointment_exec.php?deleteid=' + deleteid, appointment_exec_callback)
}


function appointment_exec_callback(data)
{
    if(!data.success)
    {
        jQuery('#msg').html(data.message);
        jQuery('#msg').addClass('message');
    }
    else
    {
        jQuery('#msg').removeClass('message');
        jQuery('#msg').html(data.message);
        jQuery('*').dialog('close');
        oTable.fnStandingRedraw();
    }
}

jQuery(document).ready(function()
{
    if(jQuery.cookie('appointment_list[iDisplayStart]')==null)
        jQuery.cookie('appointment_list[iDisplayStart]',0);

    if(jQuery.cookie('appointment_list[iDisplayLength]')==null)
        jQuery.cookie('appointment_list[iDisplayLength]',0);

    if(jQuery.cookie('appointment_list[aaSorting]')==null)
    {
        jQuery.cookie('appointment_list[aaSorting]',"[[1,'desc']]");
        aaSorting = [[1,'desc']];
    }
    else
    {
        aaSorting = eval('('+jQuery.cookie('appointment_list[aaSorting]')+')');
    }

    ilength = 10;
    istart = 0;

    oTable = jQuery('#appointmentlist').dataTable({
        "iDisplayLength": ilength,
        "iDisplayStart": istart,
        "bProcessing": true,
        "bServerSide": true,
        "bStateSave": true,
        "bLengthChange": false,
        "bJQueryUI":true,
        "sPaginationType": "full_numbers",
        "fnDrawCallback": function() 
        {				
            var oSettings = oTable.fnSettings();
            var aaSorting = JSON.stringify(oSettings.aaSorting);
            jQuery.cookie('appointment_list[iDisplayLength]', oSettings._iDisplayLength);
            jQuery.cookie('appointment_list[iDisplayStart]', oSettings._iDisplayStart);
            jQuery.cookie('appointment_list[aaSorting]', aaSorting);					
        },

        "bAutoWidth": false,
        "sAjaxSource": "appointment_getlist.php",
        "aoColumns":[
            { "bSortable": false, "sWidth": "25px" },
            { "bSortable": true, "sWidth": "25px" },
            { "bSortable": true, "sWidth": "25px" },
            { "bSortable": true, "sWidth": "80px" },
            { "bSortable": true, "sWidth": "25px" },
            { "bSortable": true, "sWidth": "25px" },
            { "bSortable": true, "sWidth": "25px" },
            { "bSortable": false,"sWidth": "100px" }
        ]
    });	
    jQuery('.dataTables_filter').hide();
    //AddValidation();
});
</script>
<dvi id="msg" ></div>
<table id="appointmentlist" class="display">
    <thead>
        <th>No</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Blood Type</th>
        <th>Blood Bank</th>
        <th>Appointment Date</th>
        <th>Status</th>
        <th>Action</th>
    </thead>
    <tbody>
        <tr>
            <td colspan="6" class="dataTables_empty">Loading Data From Server...</td>
        </tr>
    </tbody>
</table>
<?php
    require_once('admin_footer.php');
?>
