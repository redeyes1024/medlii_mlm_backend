<?php

include_once($CFG->dirroot . "/lib/classes/" . "application/AudioCategory.Class.php5");
$audiocategoryObj = new AudioCategory();

$dCreated = date('Y-m-d H:i:s');
$GeneralObj->getRequestVars();
$audiocategoryObj->setAllVar();


if ($_SESSION["sess_eType"] == "3") {
	$iCompanyId = $_SESSION['sess_iCompanyId'];
	$qs = '&iSGroupId=' . $iSGroupId;
} else if ($_SESSION['sess_eType'] == 'Group Admin') {
	$iCompanyId = $_SESSION['sess_iCompanyId'];
	$iSGroupId = $_SESSION['sess_iSGroupId'];
	$qs = '';
} else {
	$qs = '&iCompanyId=' . $iCompanyId . '&iSGroupId=' . $iSGroupId;
}


if ($mode == "Add") {
	# echo "<pre>";  print_r($_FILES) ; exit;
	$redirect_file = "index.php?file=m-audiocategoryadd" . $qs;
	$GeneralObj->checkDuplicate('iAudioCategoryId', 'AudioCategory', Array('vCategoryName','iSGroupId'), $redirect_file, "Category Already Exists ", $iSGroupId,' and ');

	// $audiocategoryObj->setdCreated($dCreated);
	$audiocategoryObj->setiSGroupId($iSGroupId);
	$iAudioCategoryId = $audiocategoryObj->insert();
	//$audiocategoryObj->insert();
	$msg = MSG_ADD;
	// $url='index.php?file=AudioCategory&AX=Yes&var_msg='.$msg;
	$url = 'index.php?file=AudioCategory&AX=Yes' . $qs . '&var_msg=' . $msg;

	header("Location:" . $url);
	exit;
} else if ($mode == "Update") {
	$update_sql = "UPDATE Audio SET eStatus = '" . $eStatus . "'
			WHERE iAudioCategoryId IN(" . $iAudioCategoryId . ")";
	#echo $update_sql;exit;
	$obj->sql_query($update_sql);
	$audiocategoryObj->setiSGroupId($iSGroupId);
	$audiocategoryObj->update($iAudioCategoryId);
	$msg = MSG_UPDATE;
	//    $url='index.php?file=AudioCategory&AX=Yes&var_msg='.$msg;
	$url = 'index.php?file=AudioCategory&AX=Yes' . $qs . '&var_msg=' . $msg;

	header("Location:" . $url);
	exit;
}
?>
