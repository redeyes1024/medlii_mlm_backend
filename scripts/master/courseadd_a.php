<?php

include_once($CFG->dirroot . "/lib/classes/" . "application/Course.Class.php5");
include_once($CFG->dirroot . "/lib/classes/" . "application/User.Class.php5");
include_once($CFG->dirroot . "/lib/classes/" . "application/Email.Class.php5");
$courseObj = new Course();
$userObj = new User();
$emailObj = new Email();

$dCreated = date('Y-m-d H:i:s');
$GeneralObj->getRequestVars();
$courseObj->setAllVar();

$iStartTime = $_REQUEST['iStarttime'];
$iStartTimeMM = $_REQUEST['iStartTimeMM'];
if ($_POST["SAMPM"] == "PM") {
	$iStartTime = $iStartTime + 12;
}
$test_StartDate = $dCourseDateTime;
$iStartDate = mktime($iStartTime, $_REQUEST['iStartTimeMM'], 0, date('m', strtotime($dCourseDateTime)), date('d', strtotime($dCourseDateTime)), date('Y', strtotime($dCourseDateTime)));
$dCourseDateTime = date('Y-m-d H:i:s', $iStartDate);


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
$_REQUEST['iSGroupId'] = $iSGroupId;
$redirect_file = "index.php?file=m-courseadd" . $qs;
$GeneralObj->checkDuplicate('iCourseId', 'Course', Array('vCoursename', 'iSGroupId'), $redirect_file, "Course Already Exists ", $iCourseId, "AND");
if ($mode == "Add") {
	if (strtotime($dCourseDateTime) >= 0 && strtotime($dCourseDateTime) != "") {
		$dCourseDateTime = $dCourseDateTime;
	} else {
		$dCourseDateTime = "0000-00-00";
	}

	// $userObj->setdCreated($dCreated);
	$courseObj->setdCourseDateTime($dCourseDateTime);
	$courseObj->setiSGroupId($iSGroupId);
	$iCourseId = $courseObj->insert();
	if ($eStatus == 'Active') {
		// for Notification of users
		$user_emails = $userObj->getNotificationUsers($iSGroupId);
		if (is_Array($user_emails) && count($user_emails) > 0) {

			for ($i = 0; $i < count($user_emails); $i++) {
				$sql_insert = "INSERT INTO `cron_email` (`vEmail` ,`vUsername` ,`vName` ,`vAdmin_email` ,`vCategoryName` ,`eType` ,`iID`)
						VALUES ('" . $user_emails[$i]['vEmail'] . "', '" . $user_emails[$i]['vUsername'] . "', '" . $vCoursename . "', '" . $user_emails['admin_email'] . "', '', 'Course', '" . $iCourseId . "')";
				//echo  $sql_insert;exit;
				$id = $obj->insert($sql_insert);

				//$emailObj->send_add_coursemail($user_emails[$i]['vUsername'],$vCoursename,$user_emails['admin_email'],$user_emails[$i]['vEmail']);
			}
		}
	}
	$msg = MSG_ADD;

	$url = 'index.php?file=Courses&AX=Yes' . $qs . '&var_msg=' . $msg;
	header("Location:" . $url);
	exit;
} else if ($mode == "Update") {

	$update_sql = "UPDATE CourseClasses SET eStatus = '" . $eStatus . "'
			WHERE iCourseId IN(" . $iCourseId . ")";
	#echo $update_sql;exit;
	$obj->sql_query($update_sql);
	$sql_check = "SELECT eStatus FROM Course WHERE iCourseId='" . $iCourseId . "' ";
	$check_status = $obj->select($sql_check);
	$check = $check_status[0]['eStatus'];
	if ($check == 'Inactive' && $eStatus == "Active"):
	$user_emails = $userObj->getNotificationUsers($iSGroupId);
	if (is_Array($user_emails) && count($user_emails) > 0) {

		for ($i = 0; $i < count($user_emails); $i++) {
			$sql_insert = "INSERT INTO `cron_email` (`vEmail` ,`vUsername` ,`vName` ,`vAdmin_email` ,`vCategoryName` ,`eType` ,`iID`)
					VALUES ('" . $user_emails[$i]['vEmail'] . "', '" . $user_emails[$i]['vUsername'] . "', '" . $vCoursename . "', '" . $user_emails['admin_email'] . "', '', 'Course', '" . $iCourseId . "')";
			//echo  $sql_insert;exit;
			$id = $obj->insert($sql_insert);
			// $emailObj->send_add_coursemail($user_emails[$i]['vUsername'],$vCoursename,$user_emails['admin_email'],$user_emails[$i]['vEmail']);
		}
	}
	endif;
	$courseObj->setdCourseDateTime($dCourseDateTime);
	$courseObj->setiSGroupId($iSGroupId);
	$courseObj->update($iCourseId);
	$msg = MSG_UPDATE;
	$url = 'index.php?file=Courses&AX=Yes' . $qs . '&var_msg=' . $msg;
	header("Location:" . $url);
	exit;
}
?>
