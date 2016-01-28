<?php

class Audio {

	//protected $dbfobj;



	function __construct() {

	}

	function index() {
		return Array("index\n\n\n");
	}

	function AudioList() {        // screen no :14
		global $obj, $GeneralObj;
		$group_id = $_REQUEST['group_id'];

		$sql = "SELECT  ac.iAudioCategoryId as audio_cate_id,ac.vCategoryName  as audio_cate_title
				FROM AudioCategory ac
				JOIN SubGroup sg ON sg.iSGroupId = ac.iSGroupId
				WHERE ac.eStatus='Active'  AND ".
				"( sg.iSGroupId in (select sga.iSGroupId from SubGroupUserAssign sga where sga.iUserId='" . $group_id . "') or (".
				"sg.vGroupName = 'Default Group' AND sg.iCompanyId=(select top 1 sgy.iCompanyId from SubGroupUserAssign sga join SubGroup sgy on sgy.iSGroupId=sga.iSGroupId where sga.iUserId='" . $group_id . "') ))"
						." AND sg.eStatus = '1'   ORDER BY ac.vCategoryName ";

		$db_data = $obj->select($sql);

		if (count($db_data) > 0) {

			$db_data = $GeneralObj->filterDataArr($db_data);
			$db_data[0]['message'] = "Audios are found.";
			$db_data[0]['success'] = '1';
		} else {
			$db_data[0]['message'] = 'No Audio found.';
			$db_data[0]['success'] = '0';
		}

		return $db_data;
	}

	function AudioCategory() {
		global $obj, $GeneralObj, $CFG;
		$audio_cate_id = $_REQUEST['audio_cate_id'];
		$keyword = $_REQUEST['keyword'];
		//echo $site_audio_url;exit;
		if (!empty($keyword)) {
			$ssql = " AND vAudioName LIKE '%" . $keyword . "%' ";
		}
		if (!empty($audio_cate_id)) {
			$sql = "SELECT iAudioId as audio_id,vAudioName as audio_title,vAudiopath
					FROM Audio
					WHERE iAudioCategoryId='" . $audio_cate_id . "' " . $ssql . " AND eStatus='Active' ORDER BY vAudioName";
			//echo $sql; exit;
			$db_data = $obj->select($sql);

			if (is_array($db_data) && count($db_data) > 0) {

				for ($i = 0; $i < count($db_data); $i++) {
					if (!empty($db_data[$i]['vAudiopath']) && file_exists($CFG->datadirroot . "/audio/" . $db_data[$i]['vAudiopath'])) {

						$db_data[$i]['audio_url'] = $CFG->datawwwroot . "/audio/" . $db_data[$i]['vAudiopath'];
					} else {
						$db_data[$i]['audio_url'] = "no-image.png";
					}
				}
				$db_data[0]['message'] = 'Audio Category is Found.';
				$db_data[0]['success'] = '1';
				$db_data = $GeneralObj->filterDataArr($db_data);
			} else {
				$db_data[0]['message'] = 'No Audio Category Found.';
				$db_data[0]['success'] = '0';
			}
		} else {
			$db_data[0]['message'] = 'Invalid parameter.';
			$db_data[0]['success'] = '0';
		}

		return $db_data;
	}

}

?>
