<?php

include_once($CFG->dirroot . "/lib/classes/" . "application/SubGroup.Class.php5");
$subgroupObj = new SubGroup();

$dCreated = date('Y-m-d H:i:s');
$GeneralObj->getRequestVars();
$subgroupObj->setAllVar();
#echo '<pre>'; print_R($_REQUEST); exit;

if ($_SESSION["sess_eType"] == "3") {
	$iCompanyId = $_SESSION['sess_iCompanyId'];
	$qs = '&iSGroupId=' . $iSGroupId;
} else if ($_SESSION['sess_eType'] == '2') {
	$iCompanyId = $_SESSION['sess_iCompanyId'];
	$iSGroupId = $_SESSION['sess_iSGroupId'];
	$qs = '';
} else {
	$qs = '&iCompanyId=' . $iCompanyId . '&iSGroupId=' . $iSGroupId;
}

$_REQUEST['iCompanyId'] = $iCompanyId;
$_REQUEST['iSGroupId'] = $iSGroupId;
$redirect_file = "index.php?file=m-subgroupadd&mode=" . $mode . $qs;

$GeneralObj->checkDuplicate('iSGroupId', 'SubGroup', Array('vGroupCodeId', 'iCompanyId'), $redirect_file, "Group ID Already Exists ", $iSGroupId, ' AND');
//$GeneralObj->checkDuplicate('iSGroupId', 'SubGroup', Array('vEmail'), $redirect_file, "Email Already Exists ", $iSGroupId);
$GeneralObj->checkDuplicate('iSGroupId', 'SubGroup', Array('iCompanyId', 'vGroupName'), $redirect_file, "Group Name Already Exists ", $iSGroupId, 'AND');
if ($mode == "Add") {
	# echo "<pre>";  print_r($_FILES) ; exit;
	// $userObj->setdCreated($dCreated);
	$GroupCodeID = $subgroupObj->randomPrefix(4);
	$GroupCodeID = strtoupper($GroupCodeID);
	//echo $GroupCodeID;exit;
	$subgroupObj->setvGroupCodeId($GroupCodeID);
	$subgroupObj->setiCompanyId($iCompanyId);
	$subgroupObj->insert();
	$msg = MSG_ADD;
	$url = 'index.php?file=SubGroup&AX=Yes' . $qs . '&var_msg=' . $msg;
	header("Location:" . $url);
	exit;
} else if ($mode == "Update") {
	$subgroupObj->setiCompanyId($iCompanyId);
	$GeneralObj->checkDuplicate('iSGroupId', 'SubGroup', Array('vGroupCodeId', 'iCompanyId'), $redirect_file, "Group ID Already Exists ", $iSGroupId, ' AND');
	$subgroupObj->update($iSGroupId);
	$msg = MSG_UPDATE;
	$url = 'index.php?file=SubGroup&AX=YesSubGroup&AX=Yes' . $qs . '&var_msg=' . $msg;
	header("Location:" . $url);
	exit;
}
?>
