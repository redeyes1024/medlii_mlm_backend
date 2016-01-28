<?php

#echo '<pre>'; print_r($_REQUEST); exit;
include_once($CFG->dirroot . "/lib/classes/" . "application/Audio.Class.php5");
include_once($CFG->dirroot . "/lib/classes/" . "application/User.Class.php5");
include_once($CFG->dirroot . "/lib/classes/" . "application/Email.Class.php5");
$audioObj = new Audio();
$userObj = new User();
$emailObj = new Email();

//print_r($_REQUEST); exit;
$dCreated = date('Y-m-d H:i:s');
$GeneralObj->getRequestVars();
$audioObj->setAllVar();


$_FILES['vAudiopath']['name'] = str_replace(' ', '', $_FILES['vAudiopath']['name']);

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
	$redirect_file = "index.php?file=m-audioadd&mode=" . $mode . "&iAudioCategoryId=" . $iAudioCategoryId;
	$GeneralObj->checkDuplicate('iAudioId', 'Audio', Array('vAudioName', 'iAudioCategoryId'), $redirect_file, "Audio Title Already Exists ", $vAudioName, 'AND');


	// $audioObj->setdCreated($dCreated);
	if (isset($_FILES['vAudiopath']['name']) && $_FILES['vAudiopath']['name'] != "") {
		$audio_name = date('Ymdhis') . $_FILES['vAudiopath']['name'];

		if (copy($_FILES['vAudiopath']['tmp_name'], $CFG->datadirroot . "/audio/" . $audio_name)) {
			if ($audio_name != '') {
				$audioObj->setvAudiopath($audio_name);
			}
		}
	}


	$id1 = $audioObj->insert();
	$msg = MSG_ADD;

	if ($eStatus == 'Active') {
		//echo $eStatus;exit;
		// for Notification of users
		$sql_Category_select = "select vCategoryName FROM  AudioCategory WHERE iAudioCategoryId = " . $iAudioCategoryId;
		$catagery_Array = $obj->select($sql_Category_select);
		$user_emails = $userObj->getNotificationUsers($iSGroupId);
		if (is_Array($user_emails) && count($user_emails) > 0) {

			for ($i = 0; $i < count($user_emails); $i++) {
				$sql_insert = "INSERT INTO `cron_email` (`vEmail` ,`vUsername` ,`vName` ,`vAdmin_email` ,`vCategoryName` ,`eType` ,`iID`)
						VALUES ('" . $user_emails[$i]['vEmail'] . "', '" . $user_emails[$i]['vUsername'] . "', '" . $vAudioName . "', '" . $user_emails['admin_email'] . "', '" . $catagery_Array[0]['vCategoryName'] . "', 'Audio', '" . $id1 . "')";
				$id = $obj->insert($sql_insert);
			}
		}
	}

	$url = 'index.php?file=Audio&AX=Yes&var_msg=' . $msg . '&iAudioCategoryId=' . $iAudioCategoryId . $qs;
	header("Location:" . $url);
	exit;
} else if ($mode == "Update") {

	$sql_check = "SELECT eStatus FROM Audio WHERE iAudioId ='" . $iAudioId . "' ";
	$check_status = $obj->select($sql_check);
	$check = $check_status[0]['eStatus'];
	if ($check == 'Inactive' && $eStatus == "Active"):
	// for Notification of users
	$sql_Category_select = "select vCategoryName FROM  AudioCategory WHERE iAudioCategoryId = " . $iAudioCategoryId;
	$catagery_Array = $obj->select($sql_Category_select);
	$user_emails = $userObj->getNotificationUsers($iSGroupId);
	if (is_Array($user_emails) && count($user_emails) > 0) {

		for ($i = 0; $i < count($user_emails); $i++) {

			$sql_insert = "INSERT INTO `cron_email` (`vEmail` ,`vUsername` ,`vName` ,`vAdmin_email` ,`vCategoryName` ,`eType` ,`iID`)
					VALUES ('" . $user_emails[$i]['vEmail'] . "', '" . $user_emails[$i]['vUsername'] . "', '" . $vAudioName . "', '" . $user_emails['admin_email'] . "', '" . $catagery_Array[0]['vCategoryName'] . "', 'Audio', '" . $iAudioId . "')";
			$id = $obj->insert($sql_insert);

			//   $emailObj->send_add_audiomail($user_emails[$i]['vUsername'],$vAudioName,$user_emails['admin_email'],$user_emails[$i]['vEmail'],$catagery_Array[0]['vCategoryName']);
		}
	}
	endif;
	if (isset($_FILES['vAudiopath']['name']) && $_FILES['vAudiopath']['name'] != "") {
		$audio_name = date('Ymdhis') . $_FILES['vAudiopath']['name'];
		if (copy($_FILES['vAudiopath']['tmp_name'], $CFG->datadirroot . "/audio/" . $audio_name)) {
			if ($audio_name != '') {
				$audioObj->setvAudiopath($audio_name);
				@unlink($CFG->datadirroot . "/audio/" . $_POST['vOldImage']);
			}
		}
	} else if ($_POST['vOldImage'] != "") {
		$audioObj->setvAudiopath($_POST['vOldImage']);
	}

	$audioObj->update($iAudioId);
	$msg = MSG_UPDATE;
	$url = 'index.php?file=Audio&AX=Yes&var_msg=' . $msg . '&iAudioCategoryId=' . $iAudioCategoryId . $qs;

	header("Location:" . $url);
	exit;
} else if ($mode == "Delete") {
	if (file_exists($CFG->datadirroot . "/audio/" . $_POST['vOldImage'])) {
		@unlink($CFG->datadirroot . "/audio/" . $_POST['vOldImage']);
	}

	$sql_update = "UPDATE Audio SET vAudiopath = '' WHERE iAudioId = '" . $iAudioId . "'";
	$obj->sql_query($sql_update);
	$msg = "Image successfuly deleted.";
	header("Location:index.php?file=m-audioadd&iAudioCategoryId=" . $iAudioCategoryId . "&mode=Update&iAudioId=" . $iAudioId . $qs);
	exit;
}
?>
