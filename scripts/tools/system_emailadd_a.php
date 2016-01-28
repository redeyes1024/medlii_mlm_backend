<?php
include_once($CFG->dirroot."/lib/classes/"."application/System_Email.Class.php5");
$sys_emailObj = new System_Email();

$GeneralObj->getRequestVars();
if($mode == 'Update') {
	$sys_emailObj->select($iEmailTemplateId);
}
$sys_emailObj->setAllVar();
$redirect_file="index.php?file=t-system_emailadd&mode=$mode&iId=$iEmailTemplateId";
$message = "Email code is already exist.";
$GeneralObj->checkDuplicate('iEmailTemplateId', 'system_email', Array('vEmailCode'), $redirect_file, $message, $iEmailTemplateId);
if($mode=="Add")
{
	$StateObj->insert();
	$msg=MSG_ADD;
	header("Location:index.php?file=SystemMails&AX=Yes&var_msg=$msg");
	exit;
}
else if($mode=="Update")
{
	$sys_emailObj->update($iEmailTemplateId);
	$msg=MSG_UPDATE;
	header("Location:index.php?file=SystemMails&AX=Yes&var_msg=$msg");
	exit;
}
?>
