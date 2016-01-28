<?php	include_once($CFG->dirroot."/lib/classes/"."application/Faq.Class.php5");
$faqObj = new Faq();    $vFromIP=$_SERVER['REMOTE_ADDR'];
$GeneralObj->getRequestVars();
$faqObj->setAllVar();
if ($mode == "Add") {
	$faqObj->insert();
	$msg=MSG_ADD;
	$url='index.php?file=Faq&AX=Yes&var_msg='.$msg;
	header("Location:".$url);
	exit;
} else if($mode == "Update") {
	$faqObj->update($iFaqId);
	$msg=MSG_UPDATE;
	$url='index.php?file=Faq&AX=Yes&var_msg='.$msg;
	header("Location:".$url);
	exit;
}
?>