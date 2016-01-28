<?php

class Library {

	//protected $dbfobj;



	function __construct() {

	}

	function index() {
		return Array("index\n\n\n");
	}

	function LibraryList() {        // screen no :15
		global $obj, $GeneralObj;
		$group_id = $_REQUEST['group_id'];

		$sql = "SELECT  lc.iLibCategoryId as lib_cate_id,lc.vCategoryName as lib_cate_title
				FROM LibraryCategory lc
				JOIN SubGroup sg ON sg.iSGroupId = lc.iSGroupId
				WHERE lc.eStatus='Active' AND ".



				"( lc.iSGroupId in (select sga.iSGroupId from SubGroupUserAssign sga where sga.iUserId='" . $group_id . "') or (  ".
				"sg.vGroupName = 'Default Group' AND sg.iCompanyId=(select top 1 sgy.iCompanyId from SubGroupUserAssign sga join SubGroup sgy on sgy.iSGroupId=sga.iSGroupId where sga.iUserId='" . $group_id . "') ))"
						 



				." AND sg.eStatus = '1'  ORDER BY lc.vCategoryName";

		$db_data = $obj->select($sql);

		if (count($db_data) > 0) {


			$db_data = $GeneralObj->filterDataArr($db_data);
			$db_data[0]['message'] = "Libraries are found.";
			$db_data[0]['success'] = '1';
		} else {
			$db_data[0]['message'] = "No Library Found.";
			$db_data[0]['success'] = '0';
		}


		return $db_data;
	}

	function SafetyDocuments() {
		global $obj, $GeneralObj,  $CFG;
		$lib_cate_id = $_REQUEST['lib_cate_id'];


		if (!empty($lib_cate_id)) {
			$sql = "SELECT iDocumentId as doc_id,vDocumentName as doc_name,vDocumentpath
					FROM Document
					WHERE iLibCategoryId='" . $lib_cate_id . "' AND eStatus='Active'";
			//echo $sql; exit;
			$db_data = $obj->select($sql);

			if (is_array($db_data) && count($db_data) > 0) {

				for ($i = 0; $i < count($db_data); $i++) {
					if (!empty($db_data[$i]['vDocumentpath']) && file_exists($CFG->datadirroot."/pdf/" . $db_data[$i]['vDocumentpath'])) {

						$db_data[$i]['doc_url'] =$CFG->datawwwroot."/pdf/" . $db_data[$i]['vDocumentpath'];
					} else {
						$db_data[$i]['doc_url'] = "no-image.png";
					}
				}

				$db_data[0]['message'] = 'Documents are Found.';
				$db_data[0]['success'] = '1';
				$db_data = $GeneralObj->filterDataArr($db_data);
			} else {
				$db_data[0]['message'] = 'No Document Found.';
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
