<?php
	session_start();
	if(!isset($_SESSION['USER_ID'])){
		header('location:login.php');
	}
	require_once('header.php');
	$qstring="userid=".$_GET['userid']."&gender=".$_GET['gender'];
	//echo $qstring;exit;
?>
<script language="javascript">
function cancel_appointment(apid)
{
	jQuery('#successmes').html('&nbsp;');
	result=confirm('Are you sure want to Cancel Appointment');

	if(result)
		jQuery.getJSON('appointment_exec.php?apid=' + apid, appointment_exec_callback)
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
		"bLengthChange": true,
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
		"sAjaxSource": "appointment_getlist.php?user_id="+<?php echo $_GET['userid'] ?>,
		"aoColumns":[
			{ "bSortable": false, "sWidth": "25px" },
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
		<th>Appointment Date</th>
		<th>Blood Bank</th>
		<th>Status</th>
		<th>Action</th>
	</thead>
	<tbody>
		<tr>
			<td colspan="6" class="dataTables_empty">Loading Data From Server...</td>
		</tr>
	</tbody>
</table>
<img src = "img/add.gif" title="Add New" onclick="window.location='eligibility.php?<?php echo $qstring;?>'" style="float:right;padding-right: 50px;">
<?php
	require_once('footer.php');
?>
