<?php
	session_start();
	if(isset($_POST['txtuseremail'])){
		$txtuseremail=$_POST['txtuseremail'];
		$txtuserpassword=$_POST['txtuserpassword'];
		
		$dbhost="localhost";
		$dbuser="root";
		$dbpass="root";
		$dbname="blooddonation";
		$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
		mysql_select_db($dbname) or die('Error invalid database');
		$qry="SELECT admin_id FROM tbl_bd_admin WHERE login_email='$txtuseremail' AND password='$txtuserpassword'";
		$result=mysql_query($qry) or die('Error SQL 1 :' .mysql_error());
		$right_array= mysql_fetch_array($result);
		$right_data=$right_array[0];
		if($right_data>0){
			$admin_id=$right_data;
			$_SESSION['ADMIN_ID']=$admin_id;
			session_write_close();
			header("location:appointment_list.php");
		}else{
			echo "Login Fail";
		}
	}
require_once('admin_header.php');
?>

<script language="javascript">
	function create_dialog_div(divid, title)
	{
		$('#'+ divid).dialog ({
			autoOpen: true,
			title:'<h3>'+ title +'</h3>',
			resizable: false,
			draggable: true,
			modal:true,
			overlay: {opacity: 0.2, background: "black"},
			width: 350,
			height:'auto'
		});
		jQuery('button, input:submit, input:button, input:reset').button();	
	}
	
	function create_div()
	{
		create_dialog_div('addneweligibility', 'Add New Eligibility');
	}
	
	function addeligibility()
	{
		if(jQuery("#frmaddneweligibility").valid())
		{
			var description=escape(jQuery('#txtdescription').val());
			var gender=escape(jQuery('#selgender').val());
			$.getJSON('eligibility_exec.php?new_description='+description+'&new_gender='+gender, user_exec_callback_dialog);
		}
	}
	
	function user_exec_callback_dialog(data)
	{
		if(!data.success)
		{
			jQuery('.errormes').html(data.mes);
		}
		else
		{
			jQuery('.errormes').html("");
			jQuery('#successmes').html(data.mes);
			jQuery('*').dialog('close');
			oTable.fnStandingRedraw();
		}
	}
	
	jQuery(document).ready(function()
	{
		if(jQuery.cookie('iDisplayStart')==null)
			jQuery.cookie('iDisplayStart',0);
			
		if(jQuery.cookie('iDisplayLength')==null)
			jQuery.cookie('iDisplayLength',0);
			
		if(jQuery.cookie('aaSorting')==null)
		{
			jQuery.cookie('aaSorting',"[[1,'desc']]");
			aaSorting = [[1,'desc']];
		}
		else
		{
			aaSorting = eval('('+jQuery.cookie('eligibility_list[aaSorting]')+')');
		}
		
		ilength = 10;
		istart = 0;
		
		oTable = jQuery('#elist1').dataTable({
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
					jQuery.cookie('eligibility_list[iDisplayLength]', oSettings._iDisplayLength);
					jQuery.cookie('eligibility_list[iDisplayStart]', oSettings._iDisplayStart);
					jQuery.cookie('eligibility_list[aaSorting]', aaSorting);					
				},
				
				"bAutoWidth": false,
				"sAjaxSource": "eligibility_getlist.php",
				"aoColumns":[	{ "bSortable": false, "sWidth": "25px" },
											{ "bSortable": true, "sWidth": "auto" },
											{ "bSortable": true, "sWidth": "80px" },
											{ "bSortable": false,"sWidth": "100px" }
										]
		});	
		jQuery('.dataTables_filter').hide();
		//AddValidation();
	});
</script>
<label id="successmes" name="successmes" style="color:red;" >&nbsp;</label>
<table align="center" cellpadding="0" cellspacing="0" border="0"  id="elist1" name="ulist">
	<h2>Eligibility List</h2>
	<label id="validateTips" class="align-center alert-success"></label>
		<thead>
			<tr>
				<th>No.</th>
				<th>Description</th>
				<th>Gender</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td colspan="3" class="dataTables_empty">Loading Data From Server...</td>
			</tr>
		</tbody>
</table>
	<img src = "../img/addnew.gif" title="Add New" onclick="create_div();" class="btn" style="float:right;">
	<div id = "addneweligibility" name = "addneweligibility" style='border:2px solid red; display:none; width:700px; height:300px; background-color:#E8E8E8;' class="form">
		<form action = "" method = "POST" name = "frmaddneweligibility" id = "frmaddneweligibility">
			<h2>Add New Eligibility</h2>
			<p>
				<br/>
				<label>Description <b>*</b></label>
				<textarea id = "txtdescription" name = "txtdescription" ></textarea>
			</p>
			<p>
				<br/>
				<label>Gender <b>*</b></label>
				<select id = "selgender" name = "selgender">
					<option value = "1"> Male </option>
					<option value = "2"> Female </option>
					<option value = "3"> All </option>
				</select>
			</p>
			<p>
				<br/>
				<label>&nbsp;</label>
				<input type = "button" id = "btnsubmit" name = "btnsubmit" value = "Save" onClick = "addeligibility();"/>
				<input type="button" id="btncancel" name="btncancel" value="Cancel" onClick="$('#addneweligibility').dialog('close');"/>
			</p>
		</form>
	</div>
<?php
	require_once('admin_footer.php');
?>