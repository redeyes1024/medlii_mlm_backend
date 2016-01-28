<?php

include_once($CFG->dirroot . "/lib/classes/" . "application/Directory.Class.php5");
$directoryObj = new Directory1();

$dCreated = date('Y-m-d H:i:s');
$GeneralObj->getRequestVars();
$directoryObj->setAllVar();

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
$redirect_file = "index.php?file=m-directoryadd" . $qs;
$GeneralObj->checkDuplicate('iDirectoryId', 'Directory', Array('iSGroupId', 'vEmpId'), $redirect_file, "Employee Id Already Exists", $iDirectoryId, " AND");
$GeneralObj->checkDuplicate('iDirectoryId', 'Directory', Array('vEmail'), $redirect_file, "Email Already Exists", $iDirectoryId);

if ($mode == "Add") {
	# echo "<pre>";  print_r($_FILES) ; exit;
	//$redirect_file="index.php?file=m-directoryadd&mode=$mode&iDirectoryId=$iDirectoryId";
	//   $GeneralObj->checkDuplicate('iUserId', 'User', Array('vUsername'),$redirect_file, "Username is Already Exists ", $vUsername);
	// $userObj->setdCreated($dCreated);

	$directoryObj->setiSGroupId($iSGroupId);
	$directoryObj->insert();
	$msg = MSG_ADD;
	$url = 'index.php?file=Directory&AX=Yes' . $qs . '&var_msg=' . $msg;
	header("Location:" . $url);
	exit;
} else if ($mode == "Update") {

	$directoryObj->update($iDirectoryId);
	$msg = MSG_UPDATE;
	//$redirect_file="index.php?file=m-directoryadd&mode=$mode".$qs."&iDirectoryId=$iDirectoryId";
	// $GeneralObj->checkDuplicate('iDirectoryId', 'Directory', Array('iSGroupId','vEmpId'),$redirect_file, "iSGroupId/vEmpId is Already Exists ", $iDirectoryId," AND");
	$url = 'index.php?file=Directory&AX=Yes' . $qs . '&var_msg=' . $msg;
	header("Location:" . $url);
	exit;
}
?>
