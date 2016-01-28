<?php

//echo '<pre>'; print_r($_REQUEST);
include_once($CFG->dirroot . "/lib/classes/" . "application/Admin.Class.php5");
$adminObj = new Admin();
$vFromIP = $_SERVER['REMOTE_ADDR'];
if ($mode == "Update") {
	$iAdminId = $_POST['iAdminId'];
	$adminObj->select($iAdminId);
}
$GeneralObj->getRequestVars();
$adminObj->setAllVar();


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


$redirect_file = "index.php?file=m-subgroupadminadd&mode=" . $mode . $qs;
$GeneralObj->checkDuplicate('iAdminId', 'admin', Array('vUserName'), $redirect_file, USER_ALREADY_EXISTS, $iAdminId);
$GeneralObj->checkDuplicate('iAdminId', 'admin', Array('vEmail'), $redirect_file, EMAIL_ALLREADY_EXIST, $iAdminId);


if ($mode == "Add") {
	#	echo $iCompanyId.'@##'.$iSGroupId; exit;
	//$dAddedDate = date('Y-m-d H:i:s');
	$adminObj->setdRegDate($dAddedDate);
	$adminObj->setdLastLogin($dAddedDate);
	$adminObj->setvFromIP($vFromIP);
	$adminObj->setiCompanyId($iCompanyId);
	$adminObj->setiSGroupId($iSGroupId);
	$adminObj->insert();
	$msg = MSG_ADD;
	$url = 'index.php?file=SubGroupAdmin&AX=Yes' . $qs . '&var_msg=' . $msg;
	header("Location:" . $url);
	exit;
} else if ($mode == "Update") {
	#print_R($_POST); exit;
	$dAddedDate = date('Y-m-d H:i:s');
	$iAdminId = $_POST['iAdminId'];
	$adminObj->setdLastLogin($dAddedDate);
	$adminObj->setiCompanyId($iCompanyId);
	$adminObj->setiSGroupId($iSGroupId);
	$adminObj->setvFromIP($vFromIP);
	$adminObj->update($iAdminId);
	$msg = MSG_UPDATE;
	$url = 'index.php?file=SubGroupAdmin&AX=Yes' . $qs . '&var_msg=' . $msg;
	header("Location:" . $url);
	exit;
}
?>
