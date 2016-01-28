<?php	include_once($CFG->dirroot."/lib/classes/"."application/Contect_us.Class.php5");
$contect_us = new Contect_us();
if($mode == "Update")
{
	$iContactId=$_POST['iContactId'];
	$contect_us->select($iContactId);
}
$GeneralObj->getRequestVars();
$contect_us->setAllVar();
if($mode == "Add") {
	$dAddedDate = date('Y-m-d H:i:s');
	$contect_us->setdAddedDate($dAddedDate);
	$contect_us->insert();
	$msg=urlencode(MSG_ADD);
	header("Location:index.php?file=Contact_us&AX=Yes&var_msg=$msg");
	exit;
} else if($mode == "Update") {
	$contect_us->update($iContactId);
	$msg=urlencode(MSG_UPDATE);
	header("Location:index.php?file=Contact_us&AX=Yes&var_msg=$msg");
	exit;
}
?>
