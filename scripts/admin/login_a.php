<?php

require_once('../../config.php');
include_once($CFG->dirroot . '/includes/include.php');
include_once $CFG->dirroot . '/lib/classes/application/User.Class.php5';
include_once $CFG->dirroot . '/lib/classes/application/Company.Class.php5';
$GeneralObj->getRequestVars();

if ($mode == 'Login') {
	$user = new User();
	if ($user->tryToLogIn($login_name, $passwd)) {
		if ($user->geteStatus()) {
			$_SESSION["sess_iAdminId"] = $user->getiUserId();
			$_SESSION["sess_vUserName"] = $user->getvUsername();
			$_SESSION["sess_eType"] = $user->geteRights();
			$_SESSION["sess_iCompanyId"] = $user->getCompanyOfuser();
			$_SESSION["sess_iSGroupIds"] = $user->getGroupCodeIDsOfUser();
			$company = new Company($_SESSION["sess_iCompanyId"]);
			$_SESSION["sess_vCompanyName"] = $company->getvCompanyName();
			$user->logInOut_WebEntry($_SESSION["sess_eType"], $_SESSION["sess_iAdminId"]);
		} else {
			$err_msg = "Your login temporarily inactivated - Please contact Administrator. ";
		}
	} else {
		$err_msg = "You have entered wrong Login name or password. Please try again !";
	}
	// By Danil
	//    $sql = "select u.iAdminId,u.vFirstName,u.vLastName,u.vUserName,u.eType,u.vPassword,u.eStatus,u.iCompanyId ,u.iSGroupId from admin u  where u.vUserName = '" . $login_name . "' and u.vPassword = '" . $passwd . "' ";
	//    $result = $obj->select($sql);
	//
	//    if ($result && $result[0]["eStatus"] == 'Active' && $passwd == $result[0]['vPassword']) {
	//        $_SESSION["sess_iAdminId"] = $result[0]["iAdminId"];
	//        $_SESSION["sess_vUserName"] = $result[0]["vUserName"];
	//        $_SESSION["sess_vFirstName"] = $result[0]["vFirstName"];
	//        $_SESSION["sess_vLastName"] = $result[0]["vLastName"];
	//        $_SESSION["sess_vEmail"] = $result[0]["vEmail"];
	//        $_SESSION["sess_eType"] = $result[0]["eType"];
	//
	//        $_SESSION["sess_iCompanyId"] = $result[0]["iCompanyId"];
	//        $_SESSION["sess_iSGroupId"] = $result[0]["iSGroupId"];
	//        $_SESSION["sess_logintype"] = $_SESSION["sess_eType"];
	//        //$_SESSION["sess_logintype"]="Admin";
	//        $GeneralObj->logInOut_entry($_SESSION["sess_iAdminId"], 'Admin');
	//        header("location:" . $CFG->wwwroot . "/");
	//        exit;
	//    } else {
	//        if (!$result || $passwd != $result[0]['vPassword']) {
	//            $err_msg = "You have entered wrong Login name or password. Please try again !";
	//        } else {
	//            $err_msg = "Your login temporarily inactivated - Please contact Administrator. ";
	//        }
	//    }
} else {
	$err_msg = "redirect";
}
$redirect_url = 'location:' . $CFG->wwwroot . '/?&err_msg=' . $err_msg;
header($redirect_url);
exit;
?>
