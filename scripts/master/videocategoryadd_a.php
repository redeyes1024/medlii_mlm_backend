<?php

include_once($CFG->dirroot . "/lib/classes/" . "application/VideoCategory.Class.php5");
$videocategoryObj = new VideoCategory();

$dCreated = date('Y-m-d H:i:s');
$GeneralObj->getRequestVars();
$videocategoryObj->setAllVar();

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

$_REQUEST['iSGroupId'] = $iSGroupId;
$redirect_file = "index.php?file=m-videocategoryadd" . $qs;
$GeneralObj->checkDuplicate('iVideoCategoryId', 'VideoCategory', Array('vCategoryName', 'iSGroupId'), $redirect_file, "Category Already Exists ", $iVideoCategoryId, " AND ");

if ($mode == "Add") {
	# echo "<pre>";  print_r($_FILES) ; exit;
	// $videocategoryObj->setdCreated($dCreated);
	$videocategoryObj->setiSGroupId($iSGroupId);
	$iVideoCategoryId = $videocategoryObj->insert();

	$msg = MSG_ADD;
	//   $url='index.php?file=VideoCategory&AX=Yes&var_msg='.$msg;
	$url = 'index.php?file=VideoCategory&AX=Yes' . $qs . '&var_msg=' . $msg;

	header("Location:" . $url);
	exit;
} else if ($mode == "Update") {
	$update_sql = "UPDATE Video SET eStatus = '" . $eStatus . "'
			WHERE 	iVideoCategoryId IN(" . $iVideoCategoryId . ")";
	#echo $update_sql;exit;
	$obj->sql_query($update_sql);
	$videocategoryObj->setiSGroupId($iSGroupId);
	$videocategoryObj->update($iVideoCategoryId);
	$msg = MSG_UPDATE;
	$url = 'index.php?file=VideoCategory&AX=Yes' . $qs . '&var_msg=' . $msg;
	header("Location:" . $url);
	exit;
}
?>
