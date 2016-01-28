<?php

require_once ('../../config.php');
include_once("../../includes/include.php");
include_once $CFG->dirroot . '/scripts/tools/CompanyGroupFilter.php';
include_once $CFG->dirroot . '/scripts/tools/CompanyGroupFilterForContent.php';
$file = $_GET['file'];
if ($file == 'User') {
	$ddlist = new CompanyGroupFilter($_SESSION["sess_iAdminId"], $_SESSION['sess_eType']);
	if ($_SESSION["sess_eType"] < 4) {
		echo $ddlist->getGroupsList($_SESSION['sess_iCompanyId'], $_REQUEST['iSGroupId']);
	} else {
		if (!is_null($_GET['iCompanyId']) || $_GET['iCompanyId'] != 0) {

			echo $ddlist->getGroupsList($_GET['iSGroupId'], $_REQUEST['iSGroupId']);

			echo $_GET['iCompanyId'];
		} else {
			echo '<select id="' . 'iCompanyId' . '" name="' . 'iCompanyId' . '" lang="*" >--Select Company--</select>';
		}
	}
} else {
	$ddlist = new CompanyGroupFilterForContent($_SESSION["sess_iAdminId"], $_SESSION['sess_eType']);
	if (!empty($_GET['iCompanyId'])) {
		$iCompanyId = $_GET['iCompanyId'];
		echo 'Group : ' . $ddlist->getGroupsList($_REQUEST['iCompanyId'], $_REQUEST['iSGroupId'], 'Default Group');
	} else {
		echo '<select id="iCompanyId" name="iCompanyId" lang="*" >--Select Company--</select>';
	}
}
?>
