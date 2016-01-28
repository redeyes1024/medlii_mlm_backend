<?php

//session_start();
ini_set('max_execution_time', '36000');
set_time_limit(3600);
ini_set('max_upload_filesize', "100M");
ini_set("post_max_size", "100M");
//ini_set("session.gc_maxlifetime","10800");
//echo phpinfo();exit;
include_once($CFG->dirroot . "/lib/classes/" . "application/Video.Class.php5");
include_once($CFG->dirroot . "/lib/classes/" . "application/User.Class.php5");
include_once($CFG->dirroot . "/lib/classes/" . "application/Email.Class.php5");
$videoObj = new Video();
$userObj = new User();
$emailObj = new Email();

#print_r($_REQUEST); exit;
$dCreated = date('Y-m-d H:i:s');
$GeneralObj->getRequestVars();
$videoObj->setAllVar();


$_FILES['vVideoPath']['name'] = str_replace(' ', '', $_FILES['vVideoPath']['name']);

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
	$redirect_file = "index.php?file=m-videoadd&mode=" . $mode . "&iVideoCategoryId=" . $iVideoCategoryId . "&iVideoId=" . $iVideoId . $qs;
	$GeneralObj->checkDuplicate('iVideoId', 'Video', Array('vVideoName', 'iVideoCategoryId'), $redirect_file, "Video Title Already Exists ", $vVideoName, 'AND');

	// $videoObj->setdCreated($dCreated);
	if (isset($_FILES['vVideoPath']['name']) && $_FILES['vVideoPath']['name'] != "") {
		$video_name = date('Ymdhis') . $_FILES['vVideoPath']['name'];

		if (copy($_FILES['vVideoPath']['tmp_name'], $CFG->datadirroot . "/video/" . $video_name)) {
			if ($video_name != '') {
				$videoObj->setvVideoPath($video_name);
			}
		}
	}

	//$videoObj->setiSGroupId($iSGroupId);
	$id1 = $videoObj->insert();
	$msg = MSG_ADD;

	if ($eStatus == 'Active') {
		// for Notification of users
		$sql_Category_select = "select vCategoryName FROM VideoCategory WHERE iVideoCategoryId = " . $iVideoCategoryId;
		$catagery_Array = $obj->select($sql_Category_select);
		$user_emails = $userObj->getNotificationUsers($iSGroupId);
		if (is_Array($user_emails) && count($user_emails) > 0) {

			for ($i = 0; $i < count($user_emails); $i++) {
				$sql_insert = "INSERT INTO `cron_email` (`vEmail` ,`vUsername` ,`vName` ,`vAdmin_email` ,`vCategoryName` ,`eType` ,`iID`)
						VALUES ('" . $user_emails[$i]['vEmail'] . "', '" . $user_emails[$i]['vUsername'] . "', '" . $vVideoName . "', '" . $user_emails['admin_email'] . "', '" . $catagery_Array[0]['vCategoryName'] . "', 'Video', '" . $id1 . "')";
				$id = $obj->insert($sql_insert);
				//$emailObj->send_add_videomail($user_emails[$i]['vUsername'],$vVideoName,$user_emails['admin_email'],$user_emails[$i]['vEmail'],$catagery_Array[0]['vCategoryName']);
			}
		}
	}
	$url = 'index.php?file=Video&AX=Yes&var_msg=' . $msg . '&iVideoCategoryId=' . $iVideoCategoryId . $qs;
	header("Location:" . $url);
	exit;
} else if ($mode == "Update") {

	$sql_check = "SELECT eStatus FROM Video WHERE iVideoId ='" . $iVideoId . "' ";
	$check_status = $obj->select($sql_check);
	$check = $check_status[0]['eStatus'];
	$user_emails = $userObj->getNotificationUsers($iSGroupId);
	if ($check == 'Inactive' && $eStatus == "Active"):

	if (is_Array($user_emails) && count($user_emails) > 0) {

		for ($i = 0; $i < count($user_emails); $i++) {
			$sql_insert = "INSERT INTO `cron_email` (`vEmail` ,`vUsername` ,`vName` ,`vAdmin_email` ,`vCategoryName` ,`eType` ,`iID`)
					VALUES ('" . $user_emails[$i]['vEmail'] . "', '" . $user_emails[$i]['vUsername'] . "', '" . $vVideoName . "', '" . $user_emails['admin_email'] . "', '" . $catagery_Array[0]['vCategoryName'] . "', 'Video', '" . $iVideoId . "')";
			$id = $obj->insert($sql_insert);
			//	$emailObj->send_add_videomail($user_emails[$i]['vUsername'],$vVideoName,$user_emails['admin_email'],$user_emails[$i]['vEmail'],$catagery_Array[0]['vCategoryName']);
		}
	}
	endif;

	if (isset($_FILES['vVideoPath']['name']) && $_FILES['vVideoPath']['name'] != "") {
		$audio_name = date('Ymdhis') . $_FILES['vVideoPath']['name'];
		if (copy($_FILES['vVideoPath']['tmp_name'], $CFG->datadirroot . "/video/" . $audio_name)) {
			if ($audio_name != '') {
				$videoObj->setvVideoPath($audio_name);
				@unlink($CFG->datadirroot . "/video/" . $_POST['vOldImage']);
			}
		}
	} else if ($_POST['vOldImage'] != "") {
		$videoObj->setvVideoPath($_POST['vOldImage']);
	}
	//$videoObj->setiSGroupId($iSGroupId);
	$videoObj->update($iVideoId);
	$msg = MSG_UPDATE;
	$url = 'index.php?file=Video&AX=Yes&var_msg=' . $msg . '&iVideoCategoryId=' . $iVideoCategoryId . $qs;
	header("Location:" . $url);
	exit;
} else if ($mode == "Delete") {
	if (file_exists($CFG->datadirroot . "/video/" . $_POST['vOldImage'])) {
		@unlink($CFG->datadirroot . "/video/" . $_POST['vOldImage']);
	}

	$sql_update = "UPDATE Video SET vVideoPath = '' WHERE iVideoId = '" . $iVideoId . "'";
	$obj->sql_query($sql_update);
	$msg = "Image successfuly deleted.";
	header("Location:index.php?file=m-videoadd&iVideoCategoryId=" . $iVideoCategoryId . "&mode=Update&iVideoId=" . $iVideoId . $qs);
	exit;
}
?>
