<?php

include_once($CFG->dirroot . "/lib/classes/" . "application/CourseClasses.Class.php5");
$courseclassesObj = new CourseClasses();

$dCreated = date('Y-m-d H:i:s');
$GeneralObj->getRequestVars();
$courseclassesObj->setAllVar();

$iStartTime = $_REQUEST['iStarttime'];
$iStartTimeMM = $_REQUEST['iStartTimeMM'];
if ($_POST["SAMPM"] == "PM") {
	$iStartTime = $iStartTime + 12;
}
$test_StartDate = $dClassDateTime;
$iStartDate = mktime($iStartTime, $_REQUEST['iStartTimeMM'], 0, date('m', strtotime($dClassDateTime)), date('d', strtotime($dClassDateTime)), date('Y', strtotime($dClassDateTime)));
$dClassDateTime = date('Y-m-d H:i:s', $iStartDate);

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



if ($mode == "Add") {
	# echo "<pre>";  print_r($_FILES) ; exit;

	$redirect_file = "index.php?file=m-courseclassesadd" . $qs . "&iCourseId=" . $_REQUEST['iCourseId'];
	$GeneralObj->checkDuplicate('iCCId', 'CourseClasses', Array('iCourseId', 'iClassId', 'dClassDateTime', 'iDuration'), $redirect_file, "Course Class Already Exists ", $iCourseId, 'AND');

	// $userObj->setdCreated($dCreated);
	//$courseclassesObj->setiSGroupId($iSGroupId);
	$courseclassesObj->setdClassDateTime($dClassDateTime);
	$courseclassesObj->insert();
	$msg = MSG_ADD;
	$url = 'index.php?file=CoursesClasses&AX=Yes' . $qs . '&iCourseId=' . $iCourseId;
	header("Location:" . $url);
	exit;
} else if ($mode == "Update") {

	//$courseclassesObj->setiSGroupId($iSGroupId);
	$courseclassesObj->setdClassDateTime($dClassDateTime);
	$courseclassesObj->update($iCCId);
	$msg = MSG_UPDATE;
	$url = 'index.php?file=CoursesClasses&AX=Yes' . $qs . '&iCourseId=' . $iCourseId;
	header("Location:" . $url);
	exit;
}
?>
