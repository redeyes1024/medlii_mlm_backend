<?php
include_once($CFG->dirroot."/lib/classes/"."application/State.Class.php5");
$StateObj = new State();

$GeneralObj->getRequestVars();
$StateObj->setAllVar();
$redirect_file="index.php?file=t-state_masteradd&mode=$mode&iId=$iStateId";
$message = "State Already Exist";
$GeneralObj->checkDuplicate('iStateId', 'state_master', Array('vStateCode', 'vCountryCode'), $redirect_file, $message, $iStateId, ' AND ');
if($mode=="Add")
{
	$StateObj->insert();
	$msg=MSG_ADD;
	header("Location:index.php?file=State&AX=Yes&var_msg=$msg");
	exit;
}
else if($mode=="Update")
{
	$StateObj->update($iStateId);
	$msg=MSG_UPDATE;
	header("Location:index.php?file=State&AX=Yes&var_msg=$msg");
	exit;
}
?>
