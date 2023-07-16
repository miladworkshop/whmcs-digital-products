<?php
function digitalproducts_ConfigOptions() {
	
	$dp 	= array();
	$result =  mysql_query('SELECT * FROM `mod_whmcs_digital_cats` ORDER BY `id` DESC');

	while ($data = mysql_fetch_array( $result )) {
		$id 	= $data['id'];
		$name 	= $data['name'];
		$dp[] 	= $id ." - ". $name;
	}
	
	$configarray = array(
		"دسته محصول دیجیتال" => array("Type" => "dropdown", "Options" => implode(",", $dp)) 
	);
	return $configarray;
}

function digitalproducts_CreateAccount($params)
{
	$serviceid 			= $params['serviceid'];
	$pid 				= $params['pid'];
	$domain 			= $params['domain'];
	$customfields 		= $params['customfields'];
	$configoptions 		= $params['configoptions'];
	$configoption1 		= $params['configoption1'];
	
	$splited 			= split("-", $configoption1);
	$category			= str_replace(' ', '', trim($splited[0]));
	
	$getacc 			= mysql_query('SELECT * FROM `mod_whmcs_digital_products` WHERE `cat`=' . $category . ' AND `sale`= 0 LIMIT 0,1');
	$counter 			= mysql_num_rows($getacc);

	if ($counter > 0) {
		$getacc 			= mysql_fetch_array($getacc);
		$accid 				= $getacc['id'];
		$cat 				= $getacc['cat'];
		$field_01 			= $getacc['field_01'];
		$field_02 			= $getacc['field_02'];
		$field_03 			= $getacc['field_03'];
		$field_04 			= $getacc['field_04'];

		$saledate 			= time();
		$getcat 			= mysql_query('SELECT * FROM `mod_whmcs_digital_cats` WHERE id='. $cat);
		$catinfo 			= mysql_fetch_array( $getcat );
		$catname 			= $catinfo['name'];
		$message 			= $catinfo['message'];
		$field_name_01 		= $catinfo['field_name_01'];
		$field_name_02 		= $catinfo['field_name_02'];
		$field_name_03 		= $catinfo['field_name_05'];
		$field_name_04 		= $catinfo['field_name_04'];
		mysql_query("UPDATE `mod_whmcs_digital_products` SET `sale` = 1, `sale_date` = '{$saledate}', `pid` = '{$serviceid}' WHERE `id` = '{$accid}'");
		
		$messagename 		= 'DigitalProducts';
		$relid 				= $serviceid;
		$extravars 			= array('field_01' => $field_01, 'field_02' => $field_02, 'field_03' => $field_03, 'field_04' => $field_04, 'field_name_01' => $field_name_01, 'field_name_02' => $field_name_02, 'field_name_03' => $field_name_03, 'field_name_04' => $field_name_04, 'message' => $message);
		sendMessage($messagename, $relid, $extravars);
		
		$result 			= 'success';
		logModuleCall('digitalproducts', 'create', $update, $result, $result, '');
	} else {
		$result 			= 'Error : Out of stock';
	}
	
	return $result;
}

function digitalproducts_TerminateAccount($params) {
	return false;
}

function digitalproducts_SuspendAccount($params) {
	return false;
}

function digitalproducts_UnsuspendAccount($params) {
	return false;
}

function digitalproducts_ClientArea($params) {
	$serviceid 			= $params['serviceid'];
	$pid 				= $params['pid'];
	$domain 			= $params['domain'];
	$customfields 		= $params['customfields'];
	$configoptions 		= $params['configoptions'];
	$configoption1 		= $params['configoption1'];

	$splited 			= split("-", $configoption1);
	$category			= str_replace(' ', '', trim($splited[0]));
	
	$getacc 			= mysql_query('SELECT * FROM `mod_whmcs_digital_products` WHERE `pid`=' . $serviceid . ' AND `sale`= 1');
	$getacc 			= mysql_fetch_array($getacc);
	$accid 				= $getacc['id'];
	$cat 				= $getacc['cat'];
	
	$field_01 			= $getacc['field_01'];
	$field_02 			= $getacc['field_02'];
	$field_03 			= $getacc['field_03'];
	$field_04 			= $getacc['field_04'];

	$getcat 			= mysql_query( 'SELECT * FROM `mod_whmcs_digital_cats` WHERE id='. $cat );
	$catinfo 			= mysql_fetch_array( $getcat );
	$catname 			= $catinfo['name'];
	$message 			= $catinfo['message'];
	$field_name_01 		= $catinfo['field_name_01'];
	$field_name_02 		= $catinfo['field_name_02'];
	$field_name_03 		= $catinfo['field_name_03'];
	$field_name_04 		= $catinfo['field_name_04'];
	
	$code 				= '<table class="table table-striped table-bordered"><tbody><tr><td style="width:50%; text-align:center;">عنوان</td><td style="width:50%; text-align:center;">مقدار</td></tr>
	<tr><td style="width:50%; text-align:right; direction:rtl;">دسته</td><td style="width:50%; text-align:right; direction:rtl;">'. $catname .'</td></tr>';

	if (!empty($field_name_01)) {
		$code .= '<tr><td style="width:50%; text-align:right; direction:rtl;">'. $field_name_01 .'</td><td style="width:50%; text-align: left; direction:ltr;">'. $field_01 .'</td></tr>';
	}
	
	if (!empty($field_name_02)) {
		$code .= '<tr><td style="width:50%; text-align:right; direction:rtl;">'. $field_name_02 .'</td><td style="width:50%; text-align: left; direction:ltr;">'. $field_02 .'</td></tr>';
	}
	
	if (!empty($field_name_03)) {
		$code .= '<tr><td style="width:50%; text-align:right; direction:rtl;">'. $field_name_03 .'</td><td style="width:50%; text-align: left; direction:ltr;">'. $field_03 .'</td></tr>';
	}
	
	if (!empty($field_name_04)) {
		$code .= '<tr><td style="width:50%; text-align:right; direction:rtl;">'. $field_name_04 .'</td><td style="width:50%; text-align: left; direction:ltr;">'. $field_04 .'</td></tr>';
	}

	$code .= '</tbody></table>';
	
	$code .= '<div class="alert alert-info" style="text-align:right; direction:rtl; line-height:200%;">'. str_replace(PHP_EOL, '<br />', $message) .'</div>';

	return $code;
}
?>