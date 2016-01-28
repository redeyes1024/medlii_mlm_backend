<?php

include_once('../config.php');
include_once($CFG->dirroot . '/includes/include.php');
include_once $CFG->dirroot . '/lib/classes/application/User.Class.php5';
$err_msg = "You have successfully Logged Out";
try {
	if (isset($_SESSION['sess_iAdminId'])) {
		$user = new User();
		$user->logInOut_WebEntry( $_SESSION["sess_eType"],$_SESSION['sess_iAdminId']);
	}
} catch (Exception $exc) {
	;
}


session_destroy();
$redirect_url = 'location:' . $CFG->wwwroot . '/index.php?&err_msg=' . $err_msg;
header($redirect_url);
?>
