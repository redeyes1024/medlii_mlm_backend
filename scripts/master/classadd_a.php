<?php

include_once($CFG->dirroot . "/lib/classes/" . "application/Classes.Class.php5");
$classObj = new Classes();

$dCreated = date('Y-m-d H:i:s');
$GeneralObj->getRequestVars();
$classObj->setAllVar();


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
	//$redirect_file="index.php?file=m-classadd&mode=$mode&iClassId=$iClassId";
	//   $GeneralObj->checkDuplicate('iUserId', 'User', Array('vUsername'),$redirect_file, "Username is Already Exists ", $vUsername);
	// $userObj->setdCreated($dCreated);
	$classObj->setiSGroupId($iSGroupId);
	$iClassId = $classObj->insert();
	$msg = MSG_ADD;
	$url = 'index.php?file=Classes&AX=Yes' . $qs . '&var_msg=' . $msg;
	header("Location:" . $url);
	exit;
} else if ($mode == "Update") {

	$classObj->setiSGroupId($iSGroupId);
	$classObj->update($iClassId);
	$msg = MSG_UPDATE;
	$url = 'index.php?file=Classes&AX=Yes' . $qs . '&var_msg=' . $msg;
	header("Location:" . $url);
	exit;
}
?>
