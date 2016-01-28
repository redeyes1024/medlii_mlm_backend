<?php

include_once($CFG->dirroot."/lib/classes/"."application/Event.Class.php5");
include_once($CFG->dirroot."/lib/classes/"."application/User.Class.php5");
include_once($CFG->dirroot."/lib/classes/"."application/Email.Class.php5");
$eventObj = new Event();
$userObj = new User();
$emailObj = new Email();


$dCreated=date('Y-m-d H:i:s');
$GeneralObj->getRequestVars();
$eventObj->setAllVar();
//$date=$_REQUEST['dEventDateTime'];

$iStartTime=$_REQUEST['iStarttime'];
$iStartTimeMM=$_REQUEST['iStartTimeMM'];
if($_POST["SAMPM"]=="PM")
{
	$iStartTime = $iStartTime+12;
}
if($_REQUEST['dEventDateTime']!=""){
	$test_StartDate=$dEventDateTime;
	$iStartDate=mktime($iStartTime,$_REQUEST['iStartTimeMM'],0,date('m',strtotime($dEventDateTime)),date('d',strtotime($dEventDateTime)),date('Y',strtotime($dEventDateTime)));
	$dEventDateTime=date('Y-m-d H:i:s',$iStartDate);
}

if($_SESSION['sess_eType']=='Company Admin') {
	$iCompanyId = $_SESSION['sess_iCompanyId'];
	$qs = '&iSGroupId='.$iSGroupId;
} else if($_SESSION['sess_eType']=='Group Admin') {
	$iCompanyId = $_SESSION['sess_iCompanyId'];
	$iSGroupId = $_SESSION['sess_iSGroupId'];
	$qs ='';
} else {
	$qs ='&iCompanyId='.$iCompanyId.'&iSGroupId='.$iSGroupId;
}


if($mode == "Add")
{
	# echo "<pre>";  print_r($_FILES) ; exit;
	//$redirect_file="index.php?file=m-eventadd&mode=$mode&iEventId=$iEventId";
	//   $GeneralObj->checkDuplicate('iUserId', 'User', Array('vUsername'),$redirect_file, "Username is Already Exists ", $vUsername);
	//January 01, 1970 01:00 AM
	// $userObj->setdCreated($dCreated);
	/*    if($dEventDateTime=='1970-01-01 01:00:00') {
	$dEventDateTime='0000-00-00 00:00:00';
	}   */

	if(strtotime($dEventDateTime)>=0 && strtotime($dEventDateTime)!= ""){
		$dEventDateTime= $dEventDateTime;
	}else{
		$dEventDateTime = "0000-00-00";
	}
	$eventObj->setdEventDateTime($dEventDateTime);
	$eventObj->setiSGroupId($iSGroupId);
	// $redirect_file="index.php?file=m-directoryadd".$qs;
	//$GeneralObj->checkDuplicate('iDirectoryId', 'Directory', Array('iSGroupId','vEmpId'),$redirect_file, "iSGroupId/vEmpId is Already Exists ", $vDirectoryId," AND");
	$id1 = $eventObj->insert();

	if($eStatus=='Active')
	{

		// for Notification of users
		$user_emails =  $userObj->getNotificationUsers($iSGroupId);
		if(is_Array($user_emails) && count($user_emails)>0) {

			for($i=0;$i<count($user_emails);$i++) {

				//   $emailObj->send_add_eventmail($user_emails[$i]['vUsername'],$vEventTitle,$user_emails['admin_email'],$user_emails[$i]['vEmail']);
				$sql_insert="INSERT INTO `cron_email` (`vEmail` ,`vUsername` ,`vName` ,`vAdmin_email` ,`vCategoryName` ,`eType` ,`iID`)
						VALUES ('".$user_emails[$i]['vEmail']."', '".$user_emails[$i]['vUsername']."', '".$vEventTitle."', '".$user_emails['admin_email']."', '".$catagery_Array[0]['vCategoryName']."', 'Event', '".$id1."')";
				//echo  $sql_insert;exit;
				$id=$obj->insert($sql_insert);
				/*
				 $to = ''.$user_emails[$i]['vEmail'].'';
				$subject = 'New Event added - Check it out';
				$message="<html>
				<head><title></title></head>
				<body>
				<table>
				<tr><td align='left'><img src=\"".$logo_url."\" border=\"0\" height='90' width='300'></td></tr>
				<tr><td height='10'>&nbsp;</td></tr>
				<tr><td height='10'>Dear <b>\"".$user_emails[$i]['vUsername']."\".</b></td></tr>
				<tr><td> New Event <b>$vEventTitle</b>  has just been added on the Sentara App. Please check it out.</td></tr>
				<tr><td height='10'>&nbsp;</td></tr>
				<tr><td height='10'><b>From:</b>  Sentara Mobile Content Administrator</td></tr>
				</table>
				</body>
				</html>";
				$headers = 'From: '.$user_emails['admin_email']. "\r\n";
				$headers.='Content-type: text/html; charset=iso-8859-1';
				@ mail($to, $subject, $message, $headers);
				*/
			}


		}

	}

	$msg=MSG_ADD;
	$url='index.php?file=Events&AX=Yes'.$qs.'&var_msg='.$msg;
	header("Location:".$url);
	exit;
}
else if($mode == "Update")
{

	$sql_check="SELECT eStatus FROM Event WHERE iEventId='".$iEventId."' ";
	$check_status =$obj->select($sql_check);
	$check=$check_status[0]['eStatus'];
	if($check == 'Inactive' && $eStatus  == "Active"):
	$user_emails =  $userObj->getNotificationUsers($iSGroupId);
	if(is_Array($user_emails) && count($user_emails)>0) {

		for($i=0;$i<count($user_emails);$i++) {

			//   $emailObj->send_add_eventmail($user_emails[$i]['vUsername'],$vEventTitle,$user_emails['admin_email'],$user_emails[$i]['vEmail']);
			$sql_insert="INSERT INTO `cron_email` (`vEmail` ,`vUsername` ,`vName` ,`vAdmin_email` ,`vCategoryName` ,`eType` ,`iID`)
					VALUES ('".$user_emails[$i]['vEmail']."', '".$user_emails[$i]['vUsername']."', '".$vEventTitle."', '".$user_emails['admin_email']."', '".$catagery_Array[0]['vCategoryName']."', 'Event', '".$iEventId."')";
			//echo  $sql_insert;exit;
			$id=$obj->insert($sql_insert);

		}
	}
	endif;
	$eventObj->setdEventDateTime($dEventDateTime);
	$eventObj->setiSGroupId($iSGroupId);
	$eventObj->update($iEventId);
	$msg=MSG_UPDATE;
	$url='index.php?file=Events&AX=Yes'.$qs.'&var_msg='.$msg;
	header("Location:".$url);
	exit;
}



?>
