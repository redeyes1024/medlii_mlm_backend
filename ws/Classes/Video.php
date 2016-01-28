<?php

class Video {

	//protected $dbfobj;



	function __construct() {

	}

	function index() {
		return Array("index\n\n\n");
	}

	function VideoList() {        // screen no :14
		global $obj, $GeneralObj;
		$group_id = $_REQUEST['group_id'];

		$sql = "SELECT  vc.iVideoCategoryId as video_cate_id,vc.vCategoryName as video_cate_title
				FROM VideoCategory vc
				JOIN SubGroup sg ON sg.iSGroupId = vc.iSGroupId
				WHERE vc.eStatus='Active'  AND ".



				"( ac.iSGroupId in (select sga.iSGroupId from SubGroupUserAssign sga where sga.iUserId='" . $group_id . "') or (ac.iSGroupId in ".
				"sg.vGroupName = 'Default Group' AND sg.iCompanyId=(select top 1 sgy.iCompanyId from SubGroupUserAssign sga join SubGroup sgy on sgy.iSGroupId=sga.iSGroupId where sga.iUserId='" . $group_id . "') ))"
						 



						." AND sg.eStatus = '1'    ORDER BY vc.vCategoryName";

		$db_data = $obj->select($sql);

		if (count($db_data) > 0) {

			$db_data = $GeneralObj->filterDataArr($db_data);
			$db_data[0]['message'] = "Videos are found.";
			$db_data[0]['success'] = '1';
		} else {
			$db_data[0]['message'] = "No video found.";
			$db_data[0]['success'] = '0';
		}

		return $db_data;
	}

	function VideoCategory() {
		global $obj, $GeneralObj, $CFG;
		$video_cate_id = $_REQUEST['video_cate_id'];
		$keyword = $_REQUEST['keyword'];

		//echo $site_video_url;exit;
		if (!empty($keyword)) {
			$ssql = " AND vVideoName LIKE '%" . $keyword . "%' ";
		}
		if (!empty($video_cate_id)) {
			$sql = "SELECT iVideoId as video_id,vVideoName as video_title,vVideoPath
					FROM Video
					WHERE iVideoCategoryId='" . $video_cate_id . "' " . $ssql . " AND eStatus='Active'  ORDER BY vVideoName";
			//echo $sql; exit;
			$db_data = $obj->select($sql);

			if (is_array($db_data) && count($db_data) > 0) {
				for ($i = 0; $i < count($db_data); $i++) {
					//  echo $site_video_path.$db_data[$i]['vVideoPath'];
					if (!empty($db_data[$i]['vVideoPath']) && file_exists($CFG->datadirroot . "/video/" . $db_data[$i]['vVideoPath'])) {

						$db_data[$i]['video_url'] = $CFG->datawwwroot . "/video/" . $db_data[$i]['vVideoPath'];
					} else {
						$db_data[$i]['video_url'] = "no-image.png";
					}
				}
				$db_data[0]['message'] = 'Video Category is Found.';
				$db_data[0]['success'] = '1';
				$db_data = $GeneralObj->filterDataArr($db_data);
			} else {
				$db_data[0]['message'] = 'No video category Found.';
				$db_data[0]['success'] = '0';
			}
		} else {
			$db_data[0]['message'] = 'Invalid parameter.';
			$db_data[0]['success'] = '0';
		}

		return $db_data;
	}

	function AudioList() {        // screen no :14
		global $obj, $GeneralObj;
		$group_id = $_REQUEST['group_id'];

		$sql = "SELECT  vc.iVideoCategoryId as video_cate_id,vc.vCategoryName as video_cate_title
				FROM VideoCategory vc
				JOIN SubGroup sg ON sg.iSGroupId = vc.iSGroupId
				WHERE vc.eStatus='Active'  AND ".




				"( ac.iSGroupId in (select sga.iSGroupId from SubGroupUserAssign sga where sga.iUserId='" . $group_id . "') or (ac.iSGroupId in ".
				"sg.vGroupName = 'Default Group' AND sg.iCompanyId=(select top 1 sgy.iCompanyId from SubGroupUserAssign sga join SubGroup sgy on sgy.iSGroupId=sga.iSGroupId where sga.iUserId='" . $group_id . "') ))"




						." AND sg.eStatus = '1' ORDER BY vc.vCategoryName";

		$db_data = $obj->select($sql);

		if (count($db_data) > 0) {

			$db_data = $GeneralObj->filterDataArr($db_data);
			$db_data[0]['message'] = "Record are found.";
			$db_data[0]['success'] = '1';
		} else {
			$db_data[0]['message'] = "Records are not available.";
			$db_data[0]['success'] = '0';
		}

		return $db_data;
	}

	function AudioCategory() {
		global $obj, $GeneralObj;
		$video_cate_id = $_REQUEST['video_cate_id'];
		$keyword = $_REQUEST['keyword'];

		if (!empty($keyword)) {
			$ssql = " AND vVideoName LIKE '%" . $keyword . "%' ";
		}
		if (!empty($video_cate_id)) {
			$sql = "SELECT iVideoId as video_id,vVideoName as video_title,vVideoPath as video_url
					FROM Video
					WHERE iVideoCategoryId='" . $video_cate_id . "' " . $ssql . " ORDER BY vVideoName";
			//echo $sql; exit;
			$db_data = $obj->select($sql);

			if (is_array($db_data) && count($db_data) > 0) {


				$db_data[0]['message'] = 'Video Category is Found.';
				$db_data[0]['success'] = '1';
				$db_data = $GeneralObj->filterDataArr($db_data);
			} else {
				$db_data[0]['message'] = 'No Record Found.';
				$db_data[0]['success'] = '0';
			}
		} else {
			$db_data[0]['message'] = 'Invaild Parameter.';
			$db_data[0]['success'] = '0';
		}

		return $db_data;
	}

}

?>
