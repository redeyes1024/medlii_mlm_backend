<?php

include_once($CFG->dirroot . "/lib/classes/" . "application/Library.Class.php5");
$libraryObj = new Library();

$dCreated = date('Y-m-d H:i:s');
$GeneralObj->getRequestVars();
$libraryObj->setAllVar();

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
	$redirect_file = "index.php?file=m-libraryadd&mode=" . $mode . "&iLibCategoryId=" . $iLibCategoryId . $qs;
	$GeneralObj->checkDuplicate('iLibCategoryId', 'LibraryCategory', Array('vCategoryName', 'iSGroupId'), $redirect_file, "Category Already Exists ", $vCategoryName,' and ');

	// $libraryObj->setdCreated($dCreated);
	$libraryObj->setiSGroupId($iSGroupId);
	$iLibCategoryId = $libraryObj->insert();
	$msg = MSG_ADD;
	$url = 'index.php?file=Library&AX=Yes' . $qs . '&var_msg=' . $msg;
	header("Location:" . $url);
	exit;
} else if ($mode == "Update") {
	$update_sql = "UPDATE Document SET eStatus = '" . $eStatus . "'
			WHERE iLibCategoryId IN(" . $iLibCategoryId . ")";
	#echo $update_sql;exit;
	$obj->sql_query($update_sql);
	$libraryObj->setiSGroupId($iSGroupId);
	$libraryObj->update($iLibCategoryId);
	$msg = MSG_UPDATE;
	$url = 'index.php?file=Library&AX=Yes' . $qs . '&var_msg=' . $msg;
	header("Location:" . $url);
	exit;
}
?>
