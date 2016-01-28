<?php

class Cron {

	//protected $dbfobj;



	function __construct() {

	}

	function index() {
		return Array("index\n\n\n");
	}

	function SendEmail() {
		global $obj, $GeneralObj, $emailObj;
		///     $username = $_REQUEST['username'];
		//    $password = $_REQUEST['password'];

		$sql = "SELECT * FROM cron_email ORDER BY iCronId LIMIT 0,50";
		$db_data = $obj->select($sql);
		$iCronIds = '';
		for ($i = 0; $i < count($db_data); $i++) {

			if ($db_data[$i]['eType'] == "Video") {
				$emailObj->send_add_videomail($db_data[$i]['vUsername'], $db_data[$i]['vName'], $db_data[$i]['vAdmin_email'], $db_data[$i]['vEmail'], $db_data[$i]['vCategoryName']);
			} else if ($db_data[$i]['eType'] == "Audio") {
				$emailObj->send_add_audiomail($db_data[$i]['vUsername'], $db_data[$i]['vName'], $db_data[$i]['vAdmin_email'], $db_data[$i]['vEmail'], $db_data[$i]['vCategoryName']);
			} else if ($db_data[$i]['eType'] == "Event") {
				$emailObj->send_add_eventmail($db_data[$i]['vUsername'], $db_data[$i]['vName'], $db_data[$i]['vAdmin_email'], $db_data[$i]['vEmail'], $db_data[$i]['vCategoryName']);
			} else if ($db_data[$i]['eType'] == "Document") {
				$emailObj->send_add_documentmail($db_data[$i]['vUsername'], $db_data[$i]['vName'], $db_data[$i]['vAdmin_email'], $db_data[$i]['vEmail'], $db_data[$i]['vCategoryName']);
			} else if ($db_data[$i]['eType'] == "Course") {
				$emailObj->send_add_coursemail($db_data[$i]['vUsername'], $db_data[$i]['vName'], $db_data[$i]['vAdmin_email'], $db_data[$i]['vEmail'], $db_data[$i]['vCategoryName']);
			}
			$iCronIds .= $db_data[$i]['iCronId'] . ",";
		}
		$iCronIds = substr($iCronIds, 0, -1);

		$del_sql = "DELETE FROM cron_email WHERE iCronId IN (" . $iCronIds . ") ";
		#	echo $del_sql; exit;
		$obj->sql_query($del_sql);

		$db_result[0]['success'] = '1';
		$db_result[0]['message'] = 'Emails are sent';

		return $db_result;
	}

}

?>
