<?php

class Others {

	//protected $dbfobj;



	function __construct() {

	}

	function index() {
		return Array("index\n\n\n");
	}

	function CompanyDropDown() {
		global $obj, $GeneralObj;
		/*
		 $sql="SELECT  iCompanyId as id,vCompanyName as name
		FROM Company
		WHERE eStatus='Active'

		ORDER BY vCompanyName";
		*/
		$sql = "SELECT c.iCompanyId as id,vCompanyName as name,  (SELECT COUNT(s.iSGroupId) FROM SubGroup s WHERE s.eStatus = 'Active' AND 	s.iCompanyId=c.iCompanyId ) as cnt
				FROM Company c WHERE c.eStatus = 'Active' AND s.vGroupName!='Default Group'
				HAVING cnt > 0  ORDER BY c.vCompanyName";
		$db_data = $obj->select($sql);

		if (count($db_data) > 0) {
			$db_data = $GeneralObj->filterDataArr($db_data);
			$db_data[0]['message'] = " Company are found.";
			$db_data[0]['success'] = '1';
		} else {
			$db_data[0]['message'] = "No Company Available.";
			$db_data[0]['success'] = '0';
		}

		return $db_data;
	}

	function GroupDropDown() {
		global $obj, $GeneralObj;
		$company_id = $_REQUEST['id'];

		if (!empty($company_id)) {
			$sql = "SELECT  iSGroupId as id,vGroupName as name
					FROM SubGroup
					WHERE eStatus='Active'  AND vGroupName!='Default Group'  AND iCompanyId = '" . $company_id . "' ORDER BY vGroupName";
			$db_data = $obj->select($sql);

			if (count($db_data) > 0) {
				$db_data = $GeneralObj->filterDataArr($db_data);
				$db_data[0]['message'] = "Groups are found.";
				$db_data[0]['success'] = '1';
			} else {
				$db_data[0]['message'] = "No Group Available.";
				$db_data[0]['success'] = '0';
			}
		} else {
			$db_data[0]['message'] = "Invalid Parameter.";
			$db_data[0]['success'] = '0';
		}
		return $db_data;
	}

}

?>
