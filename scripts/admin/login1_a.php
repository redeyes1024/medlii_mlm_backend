<?php
include_once("../../includes/include.php");
$GeneralObj->getRequestVars();

if($mode == 'Login')
{
	$sql = "select * from Club c  where c.vUserName = '".$login_name."' and c.vPassword = '".$passwd."' ";
	$result = $obj->select($sql);

	if($result && $result[0]["eStatus"]=='Active')
	{
		$_SESSION["sess_iOwnerId"] 		= 	$result[0]["iClubID"];

		$_SESSION["sess_vFirstName"]	=	$result[0]["vOwnerFName"];
		$_SESSION["sess_vLastName"] 	= 	$result[0]["vOwnerLName"];
		$_SESSION["sess_logintype"] 	= 	"Owner";

		/*
		 $_SESSION["sess_iAdminId"] 		= 	$result[0]["iAdminId"];
		$_SESSION["sess_vUserName"] 	= 	$result[0]["vUserName"];
		$_SESSION["sess_vFirstName"]	=	$result[0]["vFirstName"];
		$_SESSION["sess_vLastName"] 	= 	$result[0]["vLastName"];
		$_SESSION["sess_vEmail"] 		= 	$result[0]["vEmail"];
		$_SESSION["sess_eType"]= $result[0]["eType"];
		$GeneralObj->logInOut_entry($_SESSION["sess_iAdminId"],'Admin');
		*/	header("location:".$CFG->dirroot."index.php?file=Club&AX=Yes");
		exit;

	}
	else
	{
		if(!$result)
		{
			$err_msg = "You have entered wrong Login name or password. Please try again !";
		}else{
			$err_msg = "Your login temporarily inactivated - Please contact Administrator. ";
		}
	}
}
$redirect_url = 'location:'.$CFG->dirroot.'?type=Owner&err_msg='.$err_msg;
header($redirect_url);
exit;
?>
