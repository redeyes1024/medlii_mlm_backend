<?php

include_once($CFG->dirroot . "/lib/classes/application/Admin.Class.php5");
$adminObj = new Admin();
$vFromIP = $_SERVER['REMOTE_ADDR'];

$iAdminId = $_POST['iAdminId'];
$adminObj->select($iAdminId);
$GeneralObj->getRequestVars();
$adminObj->setAllVar();
$redirect_file = "index.php?file=a-adminadd";
$GeneralObj->checkDuplicate('iAdminId', 'admin', Array('vUserName'), $redirect_file, USER_ALREADY_EXISTS, $iAdminId);
$GeneralObj->checkDuplicate('iAdminId', 'admin', Array('vEmail'), $redirect_fshowile, EMAIL_ALLREADY_EXIST, $iAdminId);

#print_R($_POST); exit;
$iAdminId = $_POST['iAdminId'];
$dAddedDate = date('Y-m-d H:i:s');
$adminObj->setdRegDate($dAddedDate);
$adminObj->setvFromIP($vFromIP);
$adminObj->update($iAdminId);
$msg = MSG_UPDATE;
$url = 'index.php?file=a-adminadd&var_msg=' . $msg;
header("Location:".$url);
exit;
?>
