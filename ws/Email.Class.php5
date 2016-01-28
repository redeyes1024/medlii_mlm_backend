<?php


/*
 *
* -------------------------------------------------------
* CLASSNAME:        Email
* GENERATION DATE:  18.08.2010
* CLASS FILE:       /Email.Class.php5
* @desc 	Send Mails to System and user
* -------------------------------------------------------
* AUTHOR:
* from: >> www.hiddenbrains.com
* -------------------------------------------------------
*
*/

Class Email {

	function __construct() {
		global $obj;
		$this->obj = $obj;
	}

	function __destruct() {
		unset($this->obj);
	}

	public function user_register_to_admin($iUserId) {
		global  $COMPANY_NAME, $EMAIL_ADMIN, $GeneralObj, $SEO_FRIENDLY_UR, $inc_class_path;
		include_once($inc_class_path . 'application/User.Class.php5');
		$code = 'MEMBER_REGISTER_ADMIN';
		$sql_select = "SELECT * FROM system_email WHERE vEmailCode='" . $code . "' AND eStatus='Active'";
		$db_select = $this->obj->select($sql_select);
		$vEmailTitle = $db_select[0]["vEmailTitle"];
		$vFromName = $db_select[0]["vFromName"];
		$vFromEmail = $db_select[0]["vFromEmail"];
		$eEmailFormat = $db_select[0]["eEmailFormat"];
		$vEmailSubject = $db_select[0]["vEmailSubject"];
		$tEmailMessage = stripslashes($db_select[0]["tEmailMessage"]);
		$vEmailFooter = $db_select[0]["vEmailFooter"];
		$toEmail = $EMAIL_ADMIN;
		if (count($db_select) > 0) {
			$uObj = new User();
			$uObj->select($iUserId);
			$array = array(
					'#NAME#' => $uObj->getvFirstName() . ' ' . $uObj->getvLastName(),
					'#EMAIL#' => $uObj->getvEmail()
			);
			$tContent = str_replace(array_keys($array), array_values($array), $tEmailMessage);
			$status = $this->mail_mailMe($toEmail, $vEmailSubject, $tContent, $vFromEmail, $format, $cc, $bcc);
		}
	}

	public function user_register($iUserId) {
		global $CFG, $COMPANY_NAME, $EMAIL_ADMIN, $GeneralObj, $SEO_FRIENDLY_UR, $inc_class_path;
		include_once($inc_class_path . 'application/User.Class.php5');
		$code = 'MEMBER_REGISTER';
		$sql_select = "SELECT * FROM system_email WHERE vEmailCode='" . $code . "' AND eStatus='Active'";
		$db_select = $this->obj->select($sql_select);
		$vEmailTitle = $db_select[0]["vEmailTitle"];
		$vFromName = $db_select[0]["vFromName"];
		$vFromEmail = $db_select[0]["vFromEmail"];
		$eEmailFormat = $db_select[0]["eEmailFormat"];
		$vEmailSubject = $db_select[0]["vEmailSubject"];
		$tEmailMessage = stripslashes($db_select[0]["tEmailMessage"]);
		$vEmailFooter = $db_select[0]["vEmailFooter"];
		if (count($db_select) > 0) {
			$uObj = new User();
			$uObj->select($iUserId);
			$array = array(
					'#NAME#' => $uObj->getvFirstName() . ' ' . $uObj->getvLastName(),
					'#ACTIVE_URL#' => $CFG->servicewwwroot . '/user/register?code=' . $uObj->getvCode()
			);
			$toEmail = $uObj->getvEmail();
			$tContent = str_replace(array_keys($array), array_values($array), $tEmailMessage);
			$status = $this->mail_mailMe($toEmail, $vEmailSubject, $tContent, $vFromEmail, $format, $cc, $bcc);
		}
	}

	public function contect_us_admin($iContactId) {
		global  $COMPANY_NAME, $EMAIL_ADMIN, $GeneralObj, $SEO_FRIENDLY_UR, $inc_class_path, $EMAIL_SUPPORT;
		include_once($inc_class_path . 'application/Contect_us.Class.php5');
		$code = 'CONTACT_US';
		$sql_select = "SELECT * FROM system_email WHERE vEmailCode='" . $code . "' AND eStatus='Active'";
		$db_select = $this->obj->select($sql_select);
		$vEmailTitle = $db_select[0]["vEmailTitle"];
		$vFromName = $db_select[0]["vFromName"];
		$vFromEmail = $db_select[0]["vFromEmail"];
		$eEmailFormat = $db_select[0]["eEmailFormat"];
		$vEmailSubject = $db_select[0]["vEmailSubject"];
		$tEmailMessage = stripslashes($db_select[0]["tEmailMessage"]);
		$vEmailFooter = $db_select[0]["vEmailFooter"];
		$toEmail = $EMAIL_ADMIN;

		if (count($db_select) > 0) {
			$contect_obj = new Contect_us();
			$contect_obj->select($iContactId);
			$array = array(
					'#NAME#' => $contect_obj->getvName(),
					'#EMAIL#' => $contect_obj->getvEmail(),
					'#DESCRIPTION#' => $contect_obj->gettDescription(),
			);
			$tContent = str_replace(array_keys($array), array_values($array), $tEmailMessage);
			$status = $this->mail_mailMe($toEmail, $vEmailSubject, $tContent, $vFromEmail, $format, $cc, $bcc);
		}
	}

	public function user_forgotpassword($iUserId) {
		global  $COMPANY_NAME, $EMAIL_ADMIN, $GeneralObj, $SEO_FRIENDLY_UR, $inc_class_path;
		include_once($inc_class_path . 'application/User.Class.php5');
		$code = 'FORGOT_PASSWORD_MEMBER';
		$sql_select = "SELECT * FROM system_email WHERE vEmailCode='" . $code . "' AND eStatus='Active'";
		$db_select = $this->obj->select($sql_select);
		$vEmailTitle = $db_select[0]["vEmailTitle"];
		$vFromName = $db_select[0]["vFromName"];
		$vFromEmail = $db_select[0]["vFromEmail"];
		$eEmailFormat = $db_select[0]["eEmailFormat"];
		$vEmailSubject = $db_select[0]["vEmailSubject"];
		$tEmailMessage = stripslashes($db_select[0]["tEmailMessage"]);
		$vEmailFooter = $db_select[0]["vEmailFooter"];
		if (count($db_select) > 0) {
			$uObj = new User();
			$uObj->select($iUserId);
			$array = array(
					'#NAME#' => $uObj->getvFirstName() . ' ' . $uObj->getvLastName(),
					'#PASSWORD#' => $uObj->getvPassword()
			);
			$toEmail = $uObj->getvEmail();
			$tContent = str_replace(array_keys($array), array_values($array), $tEmailMessage);
			$status = $this->mail_mailMe($toEmail, $vEmailSubject, $tContent, $vFromEmail, $format, $cc, $bcc);
		}
	}

	public function user_changepassword($iUserId) {
		global  $COMPANY_NAME, $EMAIL_ADMIN, $GeneralObj, $SEO_FRIENDLY_UR, $inc_class_path;
		include_once($inc_class_path . 'application/User.Class.php5');
		$code = 'CHANGE_PASSWORD';
		$sql_select = "SELECT * FROM system_email WHERE vEmailCode='" . $code . "' AND eStatus='Active'";
		$db_select = $this->obj->select($sql_select);
		$vEmailTitle = $db_select[0]["vEmailTitle"];
		$vFromName = $db_select[0]["vFromName"];
		$vFromEmail = $db_select[0]["vFromEmail"];
		$eEmailFormat = $db_select[0]["eEmailFormat"];
		$vEmailSubject = $db_select[0]["vEmailSubject"];
		$tEmailMessage = stripslashes($db_select[0]["tEmailMessage"]);
		$vEmailFooter = $db_select[0]["vEmailFooter"];
		if (count($db_select) > 0) {
			$uObj = new User();
			$uObj->select($iUserId);
			$array = array(
					'#USER_NAME#' => $uObj->getvFirstName() . ' ' . $uObj->getvLastName(),
					'#PASSWORD#' => $uObj->getvPassword()
			);
			$toEmail = $uObj->getvEmail();
			$tContent = str_replace(array_keys($array), array_values($array), $tEmailMessage);
			$status = $this->mail_mailMe($toEmail, $vEmailSubject, $tContent, $vFromEmail, $format, $cc, $bcc);
		}
	}

	public function user_submited_review($iReviewId, $mode) {
		global  $COMPANY_NAME, $EMAIL_ADMIN, $GeneralObj, $SEO_FRIENDLY_UR, $inc_class_path, $admin_url;
		include_once($inc_class_path . 'application/User.Class.php5');
		include_once($inc_class_path . 'application/cinema_review.Class.php5');
		$code = 'REVIEW_SUBMITED';
		$sql_select = "SELECT * FROM system_email WHERE vEmailCode='" . $code . "' AND eStatus='Active'";
		$db_select = $this->obj->select($sql_select);
		$vEmailTitle = $db_select[0]["vEmailTitle"];
		$vFromName = $db_select[0]["vFromName"];
		$vFromEmail = $db_select[0]["vFromEmail"];
		$eEmailFormat = $db_select[0]["eEmailFormat"];
		$vEmailSubject = $db_select[0]["vEmailSubject"];
		$tEmailMessage = stripslashes($db_select[0]["tEmailMessage"]);
		$vEmailFooter = $db_select[0]["vEmailFooter"];
		$toEmail = $EMAIL_ADMIN;
		if (count($db_select) > 0) {
			$cinema_review_obj = new cinema_review();
			$db_review = $cinema_review_obj->select($iReviewId);

			$uObj = new User();
			$uObj->select($db_review[0]['iUserId']);

			$link = '<a href="' . $admin_url . 'index.php?file=c-cinema_reviewadd&mode=Update&iId=' . $iReviewId . '&iReviewId=' . $iReviewId . '" target="_new" >here</a>';
			$array = array(
					'#USER_NAME#' => $uObj->getvFirstName() . ' ' . $uObj->getvLastName(),
					'#LINK#' => $link,
					'#ACTION#' => $mode
			);
			$tContent = str_replace(array_keys($array), array_values($array), $tEmailMessage);
			$status = $this->mail_mailMe($toEmail, $vEmailSubject, $tContent, $vFromEmail, $format, $cc, $bcc);
		}
	}

	public function send_add_eventmail($username, $eventtitle, $admin_email, $to_email) {
		global  $COMPANY_NAME, $EMAIL_ADMIN, $GeneralObj, $SEO_FRIENDLY_UR, $inc_class_path, $admin_url;
		//include_once($inc_class_path . 'application/User.Class.php5');
		//include_once($inc_class_path . 'application/cinema_review.Class.php5');
		$code = 'EVENT_EMAIL';
		$sql_select = "SELECT * FROM system_email WHERE vEmailCode='" . $code . "' AND eStatus='Active'";
		$db_select = $this->obj->select($sql_select);
		$vEmailTitle = $db_select[0]["vEmailTitle"];
		$vFromName = $db_select[0]["vFromName"];
		$vFromEmail = $admin_email;
		$eEmailFormat = $db_select[0]["eEmailFormat"];
		$vEmailSubject = $db_select[0]["vEmailSubject"];
		$tEmailMessage = stripslashes($db_select[0]["tEmailMessage"]);
		$vEmailFooter = $db_select[0]["vEmailFooter"];
		$toEmail = $to_email;
		if (count($db_select) > 0) {

			//$link = '<a href="'.$admin_url.'index.php?file=c-cinema_reviewadd&mode=Update&iId='.$iReviewId.'&iReviewId='.$iReviewId.'" target="_new" >here</a>';
			$array = array(
					'#USER_NAME#' => $username,
					//'#LINK#' => $link,
					'#EVENTNAME#' => $eventtitle
			);
			$tContent = str_replace(array_keys($array), array_values($array), $tEmailMessage);
			$status = $this->mail_mailMe($toEmail, $vEmailSubject, $tContent, $vFromEmail, $format, $cc, $bcc, $vFromName);
		}
	}

	public function send_add_coursemail($username, $coursename, $admin_email, $to_email) {
		global  $COMPANY_NAME, $EMAIL_ADMIN, $GeneralObj, $SEO_FRIENDLY_UR, $inc_class_path, $admin_url;
		//include_once($inc_class_path . 'application/User.Class.php5');
		//include_once($inc_class_path . 'application/cinema_review.Class.php5');
		$code = 'COURSE_EMAIL';
		$sql_select = "SELECT * FROM system_email WHERE vEmailCode='" . $code . "' AND eStatus='Active'";
		$db_select = $this->obj->select($sql_select);
		$vEmailTitle = $db_select[0]["vEmailTitle"];
		$vFromName = $db_select[0]["vFromName"];
		$vFromEmail = $admin_email;
		$eEmailFormat = $db_select[0]["eEmailFormat"];
		$vEmailSubject = $db_select[0]["vEmailSubject"];
		$tEmailMessage = stripslashes($db_select[0]["tEmailMessage"]);
		$vEmailFooter = $db_select[0]["vEmailFooter"];
		$toEmail = $to_email;
		if (count($db_select) > 0) {

			//$link = '<a href="'.$admin_url.'index.php?file=c-cinema_reviewadd&mode=Update&iId='.$iReviewId.'&iReviewId='.$iReviewId.'" target="_new" >here</a>';
			$array = array(
					'#USER_NAME#' => $username,
					//'#LINK#' => $link,
					'#COURSENAME#' => $coursename
			);
			$tContent = str_replace(array_keys($array), array_values($array), $tEmailMessage);
			$status = $this->mail_mailMe($toEmail, $vEmailSubject, $tContent, $vFromEmail, $format, $cc, $bcc, $vFromName);
		}
	}

	public function send_add_videomail($username, $videoname, $admin_email, $to_email, $catagory_name) {
		global  $COMPANY_NAME, $EMAIL_ADMIN, $GeneralObj, $SEO_FRIENDLY_UR, $inc_class_path, $admin_url;
		//include_once($inc_class_path . 'application/User.Class.php5');
		//include_once($inc_class_path . 'application/cinema_review.Class.php5');
		$code = 'VIDEO_EMAIL';
		$sql_select = "SELECT * FROM system_email WHERE vEmailCode='" . $code . "' AND eStatus='Active'";
		$db_select = $this->obj->select($sql_select);
		$vEmailTitle = $db_select[0]["vEmailTitle"];
		$vFromName = $db_select[0]["vFromName"];
		$vFromEmail = $admin_email;
		$eEmailFormat = $db_select[0]["eEmailFormat"];
		$vEmailSubject = $db_select[0]["vEmailSubject"];
		$tEmailMessage = stripslashes($db_select[0]["tEmailMessage"]);
		$vEmailFooter = $db_select[0]["vEmailFooter"];
		$toEmail = $to_email;
		if (count($db_select) > 0) {

			//$link = '<a href="'.$admin_url.'index.php?file=c-cinema_reviewadd&mode=Update&iId='.$iReviewId.'&iReviewId='.$iReviewId.'" target="_new" >here</a>';
			$array = array(
					'#USER_NAME#' => $username,
					//'#LINK#' => $link,
					'#CATEGORYNAME#' => $catagory_name,
					'#VIDEONAME#' => $videoname
			);
			$tContent = str_replace(array_keys($array), array_values($array), $tEmailMessage);
			$status = $this->mail_mailMe($toEmail, $vEmailSubject, $tContent, $vFromEmail, $format, $cc, $bcc, $vFromName);
		}
	}

	public function send_add_audiomail($username, $audioname, $admin_email, $to_email, $catagory_name) {
		global  $COMPANY_NAME, $EMAIL_ADMIN, $GeneralObj, $SEO_FRIENDLY_UR, $inc_class_path, $admin_url;
		//include_once($inc_class_path . 'application/User.Class.php5');
		//include_once($inc_class_path . 'application/cinema_review.Class.php5');
		$code = 'AUDIO_EMAIL';
		$sql_select = "SELECT * FROM system_email WHERE vEmailCode='" . $code . "' AND eStatus='Active'";
		$db_select = $this->obj->select($sql_select);
		$vEmailTitle = $db_select[0]["vEmailTitle"];
		$vFromName = $db_select[0]["vFromName"];
		$vFromEmail = $admin_email;
		$eEmailFormat = $db_select[0]["eEmailFormat"];
		$vEmailSubject = $db_select[0]["vEmailSubject"];
		$tEmailMessage = stripslashes($db_select[0]["tEmailMessage"]);
		$vEmailFooter = $db_select[0]["vEmailFooter"];
		$toEmail = $to_email;
		if (count($db_select) > 0) {

			//$link = '<a href="'.$admin_url.'index.php?file=c-cinema_reviewadd&mode=Update&iId='.$iReviewId.'&iReviewId='.$iReviewId.'" target="_new" >here</a>';
			$array = array(
					'#USER_NAME#' => $username,
					//'#LINK#' => $link,
					'#CATEGORYNAME#' => $catagory_name,
					'#AUDIONAME#' => $audioname
			);
			$tContent = str_replace(array_keys($array), array_values($array), $tEmailMessage);
			$status = $this->mail_mailMe($toEmail, $vEmailSubject, $tContent, $vFromEmail, $format, $cc, $bcc, $vFromName);
		}
	}

	public function send_add_documentmail($username, $doc_name, $admin_email, $to_email, $catagory_name) {
		global  $COMPANY_NAME, $EMAIL_ADMIN, $GeneralObj, $SEO_FRIENDLY_UR, $inc_class_path, $admin_url;
		//include_once($inc_class_path . 'application/User.Class.php5');
		//include_once($inc_class_path . 'application/cinema_review.Class.php5');
		$code = 'DOCUMENT_EMAIL';
		$sql_select = "SELECT * FROM system_email WHERE vEmailCode='" . $code . "' AND eStatus='Active'";
		$db_select = $this->obj->select($sql_select);
		$vEmailTitle = $db_select[0]["vEmailTitle"];
		$vFromName = $db_select[0]["vFromName"];
		$vFromEmail = $admin_email;
		$eEmailFormat = $db_select[0]["eEmailFormat"];
		$vEmailSubject = $db_select[0]["vEmailSubject"];
		$tEmailMessage = stripslashes($db_select[0]["tEmailMessage"]);
		$vEmailFooter = $db_select[0]["vEmailFooter"];
		$toEmail = $to_email;

		if (count($db_select) > 0) {

			//$link = '<a href="'.$admin_url.'index.php?file=c-cinema_reviewadd&mode=Update&iId='.$iReviewId.'&iReviewId='.$iReviewId.'" target="_new" >here</a>';
			//echo $docname; exit;
			$array = array(
					'#USER_NAME#' => $username,
					//'#LINK#' => $link,
					'#CATEGORYNAME#' => $catagory_name,
					'#DOCUMENTNAME#' => $doc_name
			);
			//echo '<pre>'; print_r($array);
			$tContent = str_replace(array_keys($array), array_values($array), $tEmailMessage);
			//echo $tContent; exit;
			$status = $this->mail_mailMe($toEmail, $vEmailSubject, $tContent, $vFromEmail, $format, $cc, $bcc, $vFromName);
		}
	}

	function mail_mailMe($to, $subject, $vBody, $from, $format = "", $cc = "", $bcc = "", $fromname = "") {
		global  $debug_mode, $EMAIL_FROM_NAME;
		if ($fromname == '') {
			$fromname = $EMAIL_FROM_NAME;
		}

		if (strlen($format) == 0)
			$format = "text/html";
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: " . $format . "; charset=iso-8859-1\r\n";
		/* additional headers */
		$headers .= "From:" . $fromname . "<" . $from . ">\r\n";
		if (strlen($cc) > 5)
			$headers .= "Cc: ".$cc."\r\n";
		if (strlen($bcc) > 5)
			$headers .= "Bcc: ".$bcc."\r\n";
		$cnt = "";
		$cnt = "Headers : \n" . $headers . "\n";
		$cnt .= "<br>Date Time :" . date("d M, Y  H:i:s") . "\r\n";
		$cnt .= "To : " . $to . "\n";
		$cnt .= "Subject : " . $subject . "\n";
		$cnt .= "Body : \n" . $vBody . "\n";
		$cnt .= "====================================================================\n\n";
		/*  $filename = $site_path."mail.html";
		 if (!$fp = fopen($filename, 'a')) {
		print "Cannot open file ($filename)";
		exit;
		}
		if (!fwrite($fp, $cnt)) {
		print "Cannot write to file ($filename)";
		exit;
		}
		fclose($fp);
		*/
		if (!strstr($_SERVER['HTTP_HOST'], '192.168.32'))
			$status = @mail($to, $subject, $vBody, $headers);
		$status = true;
		return $status;
	}

}

?>
