<?php

include_once($CFG->dirroot . "/lib/classes/" . "application/Company.Class.php5");
include_once($CFG->dirroot . "/lib/classes/" . "application/SubGroup.Class.php5");
$companyObj = new Company();

$dCreated = date('Y-m-d H:i:s');
$GeneralObj->getRequestVars();
$companyObj->setAllVar();




if ($mode == "Add") {
	# echo "<pre>";  print_r($_FILES) ; exit;
	$redirect_file = "index.php?file=m-companyadd";
	$GeneralObj->checkDuplicate('iCompanyId', 'Company', Array('vCompanyCodeId'), $redirect_file, "Organization ID Already Exists ", $iCompanyId);
	$GeneralObj->checkDuplicate('iCompanyId', 'Company', Array('vCompanyName'), $redirect_file, "Organization Name Already Exists ", $iCompanyId);
	$GeneralObj->checkDuplicate('iCompanyId', 'Company', Array('vEmail'), $redirect_file, "Email Already Exists ", $iCompanyId);
	// $userObj->setdCreated($dCreated);
	$iCompanyId = $companyObj->insert();
	$group=new SubGroup();
	$group->createDefaultGroup($iCompanyId);

	$msg = MSG_ADD;
	$url = 'index.php?file=Company&AX=Yes&var_msg=' . $msg;
	header("Location:" . $url);
	exit;
} else if ($mode == "Update") {
	$update_sql = "UPDATE SubGroup sg SET sg.eStatus = '" . $eStatus . "'
			WHERE sg.iCompanyId IN(" . $iCompanyId . ")";
	$obj->sql_query($update_sql);



	$redirect_file = "index.php?file=m-companyadd&mode=" . $mode . "&iCompanyId=" . $iCompanyId . "";
	$GeneralObj->checkDuplicate('iCompanyId', 'Company', Array('vCompanyCodeId'), $redirect_file, "Organization ID Already Exists ", $iCompanyId);
	$GeneralObj->checkDuplicate('iCompanyId', 'Company', Array('vCompanyName'), $redirect_file, "Organization Name Already Exists ", $iCompanyId);
	$GeneralObj->checkDuplicate('iCompanyId', 'Company', Array('vEmail'), $redirect_file, "Email Already Exists ", $iCompanyId);
	$companyObj->update($iCompanyId);
	$msg = MSG_UPDATE;
	$url = 'index.php?file=Company&AX=Yes&var_msg=' . $msg;
	header("Location:" . $url);
	exit;
}
?>
