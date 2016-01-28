<?php

include_once($CFG->dirroot . "/lib/classes/" . "application/User.Class.php5");
$UserObj = new User();
if ($mode == "Update") {
	$iUserId = $_POST['iUserId'];
	$UserObj->select($iUserId);
}
$GeneralObj->getRequestVars();
$UserObj->setAllVar();
$redirect_file = "index.php?file=u-useradd&mode=" . $mode . "&iId=" . $iUserId;
$GeneralObj->checkDuplicate('iUserId', 'user', Array('vEmail'), $redirect_file, EMAIL_ALLREADY_EXIST, $iUserId);

if ($mode == "Add") {
	$dAddedDate = date('Y-m-d H:i:s');
	$UserObj->setdAddedDate($dAddedDate);
	$UserObj->insert();
	$msg = urlencode(MSG_ADD);
	header("Location:index.php?file=User&AX=Yes&var_msg=" . $msg);
	exit;
} else if ($mode == "Update") {
	$UserObj->update($iUserId);
	$msg = urlencode(MSG_UPDATE);
	header("Location:index.php?file=User&AX=Yes&var_msg=" . $msg);
	exit;
}
?>
