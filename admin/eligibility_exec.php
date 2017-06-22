<?php
	$errors = $arr = array();
	
	//Add New
	if( isset($_GET['new_description']) && isset($_GET['new_gender']) )
	{
		$description = clean($_GET['new_description']);
		$gender = clean($_GET['new_gender']);
		if( $description == '' )
			$error[] = 'Please Add Description!';
		elseif( $gender == '' )
			$error[] = 'Please Select Gender!';
		else if( $districtbol->check_duplicate_district($district_name, 0, $division_id) )
			$error[] = 'ဤတိုင်း/ပြည်နယ်၌ ဤခရိုင်အမည် ရှိနှင့်ပြီးဖြစ်သည်!';
		
		if( !count($error) )
		{
			$json_retrun_arr['sessionexpire'] = 0;
			$districtinfo->set_division_id($division_id);
			$districtinfo->set_district_name($district_name);
			$result = $districtbol->save_district($districtinfo);
			if( $result )
			{
				$json_retrun_arr['success'] = 1;
				$json_retrun_arr['message'] = 'အသစ်ထည့်ခြင်း အောင်မြင်သည်';
			}
			else
			{
				$json_retrun_arr['success'] = 0;
				$json_retrun_arr['message'] = 'အသစ်ထည့်ခြင်း မအောင်မြင်ပါ';
			}
		}
		else
		{
			$json_retrun_arr['success'] = 0;
			$json_retrun_arr['message'] = implode('<br>', $error);
		}
	}
	
	//edit	
	if( isset($_POST['edit_district_id']) )
	{
		$json_retrun_arr['sessionexpire'] = 0;
		$district_id = $_POST['edit_district_id'];
		$row = $districtbol->select_district_by_id($district_id);
		$return_str = '<label id="alert_msg" name="alert_msg" class="error"></label>
				<form method="post" id="frmdistrict" name="frmdistrict" >
					<div class="frm_group">
						<label>ခရိုင်အမည် <span class="star">*</span></label>
						<div class="controls">
							<input type="hidden" name="hideditdistrictid" id="hideditdistrictid" value="' . $row['district_id'] . '"/>
							<input type="text" name="txtdistrictname" id="txtdistrictname" value="'. htmlspecialchars($row['district_name']) .'"/>
						</div>
					</div>
					<div class="frm_group"><div id="divprogress" class="left"></div></div>
					<div id="divbuttons" class="form_actions">
						<input type="button" class="btn"  id="btnedit" name="btnedit" value="ပြင်ဆင်မည်" onclick="update_district()" />
						<input type="button" class="btn" id="btncancel" name="btncancel" value="မပြင်ဆင်ပါ" onclick="close_dialog()" />
					</div></form>';
		$json_retrun_arr ['popupdata'] = $return_str;
	}
	
	if( isset($_POST['edit_district_name']) && isset($_POST['hid_edit_district_id']) )
	{
		$district_id = clean($_POST['hid_edit_district_id']);
		$district_name = clean($_POST['edit_district_name']);
		$division_id = clean($_POST['division_id']);
		
		if( $district_name == '' )
			$error[] = 'ခရိုင်အမည် ထည့်ပေးပါရန်!';
		else if( $districtbol->check_duplicate_district($district_name, $district_id, $division_id) )
			$error[] = 'ဤတိုင်း/ပြည်နယ်၌ ဤခရိုင်အမည် ရှိနှင့်ပြီးဖြစ်သည်!';
			
		if( !count($error) )
		{
			$json_retrun_arr['sessionexpire'] = 0;
			$districtinfo->set_district_id($district_id);
			$districtinfo->set_district_name($district_name);
			$result = $districtbol->update_district($districtinfo);	
			if( $result )
			{
				$json_retrun_arr['success'] = 1;
				$json_retrun_arr['message'] = 'ပြင်ဆင်ခြင်း အောင်မြင်သည်';
			}
			else
			{
				$json_retrun_arr['success'] = 0;
				$json_retrun_arr['message'] = 'ပြင်ဆင်ခြင်း မအောင်မြင်ပါ';
			}
		}
		else
		{
			$json_retrun_arr['success'] = 0;
			$json_retrun_arr['message'] = implode('<br>', $error);
		}
	}
	
	//delete		
	if( isset($_POST['delete_district_id']) )
	{
		$json_retrun_arr['sessionexpire'] = 0;
		$district_id=(int)clean($_POST['delete_district_id']);
		$result = $districtbol->check_delete_district($district_id);
		if ( !$result )
		{
			if($districtbol->delete_district($district_id))
			{
				$json_retrun_arr['success'] = 1;
				$json_retrun_arr['message'] = 'ပယ်ဖျက်ခြင်း အောင်မြင်သည်';
			}
		}
		else
		{
			$json_retrun_arr['success'] = 0;
			$json_retrun_arr['message'] = 'ဤခရိုင်အား အသုံးပြုထားပါသဖြင့် ပယ်ဖျက်၍မရနိုင်ပါ';
		}
	}
	echo json_encode($json_retrun_arr);
	exit();
?>