<?php

/*
 * To change this template, choose Tools | Templates
* and open the template in the editor.
*/

/**
 * Description of CompanyGroupFilter
 *
 * @author redeyes1024
 */
include_once $CFG->dirroot . '/lib/classes/application/User.Class.php5';

class CompanyGroupFilterForContent {

	protected $iUserId;
	protected $eRights;
	protected $iCompanyId;
	protected $iSGroupId;

	const groupValueFilterName = 'iSGroupId';
	const companyValueFilterName = 'iCompanyId';

	function __construct($iUserId, $eRights) {
		$this->iUserId = $iUserId;
		$this->eRights = $eRights;
	}

	function getJScripts() {
		$script = "<script type='text/javascript'>
				function CompanyGroupFilter(combo) {
				if(combo.value!='') {
				file = $('input#file').val();
				if(file=='SubGroup') {
				window.location ='index.php?file='+file+'&AX=Yes&iCompanyId'+combo.value;
				return false;
	} else {
				var iCompanyId= $('select#iCompanyId').val();

				$.get(admin_url+'scripts/ajax/getGroup.php','iCompanyId='+iCompanyId+'&file='+file,function(data){
				$('#showGroup').html(data);

				changeGroupList();
	});
	}

	}
	}


				function changeGroupList()
				{
				var iCompanyId='';
				var iSGroupId='';
				var str_company='';
				var str_group='';
				iCompanyId = $('#iCompanyId').val();
				iSGroupId= $('#iSGroupId').val();
				{
				if(iCompanyId) {
				str_company ='&iCompanyId='+iCompanyId;
	}
				if(iSGroupId) {
				str_group ='&iSGroupId='+iSGroupId;
	}
				file = $('input#file').val();
				url='index.php?file='+file+'&AX=Yes'+str_company+''+str_group;

				window.location =url;
				return false;
	}

	}




				</script>";
		return $script;
	}

	function getGroupsList($iCompanyId = null, $selectedId = null) {
		$results = '';
		if ($this->eRights == 1) {
			$results = "<input type='hidden' id='" . 'iSGroupId' . "' name='" . 'iSGroupId' . "'  value='" . $_SESSION["sess_iSGroupIds"][0]['iSGroupId'] . "'>" . $_SESSION["sess_iSGroupId"][0]['iSGroupId'];
		} else {
			$user = new User();
			if ($this->eRights < 4) {
				$iCompanyId = $_SESSION['sess_iCompanyId'];
			} else {
				$iCompanyId = $this->iCompanyId;
			}
			$list = $user->getGroupsListForUser($this->eRights, $this->iUserId, $iCompanyId, false);
			$results = $this->genDynamicDropeDown($list, 'iSGroupId', 'changeGroupList()', $selectedId);
		}
		return $results;



		$list = $this->getGroupsListForUser($this->eRights, $this->iUserId, $iCompanyId);
	}

	function getCompaniesList($iCompanyId = null, $selectedId = null) {
		$results = '';
		if ($this->eRights < 4) {
			$results = "<input type='hidden' id='iCompanyId' name='iCompanyId'  value='" . $_SESSION["sess_iCompanyId"] . "'>" . $_SESSION["sess_vCompanyName"];
			$this->$_SESSION["sess_iCompanyId"];
		} else {
			$user = new User();
			$list = $user->getCompaniesListForUser($this->eRights, $this->iUserId);
			$results = $this->genDynamicDropeDown($list, 'iCompanyId', 'CompanyGroupFilter(this)', $selectedId);
		}
		return $results;
	}

	protected function genDynamicDropeDown($list, $keyName, $script, $selectedId = null, $showAll = 'All') {

		$result = '';

		$result .= "<select name='" . $keyName . "' id='" . $keyName . "'   style='width: 150 ' onChange=" . $script . " >";

		if ($keyName == 'iCompanyId') {
			if (!$selectedId && count($list) > 0) {
				$this->iCompanyId = $list[0]['Id'];
			} else {
				$this->iCompanyId = $selectedId;
			}
		}

		if ($keyName == 'iSGroupId' && !$selectedId && count($list) > 0) {
			$this->iGroupId = $list[0]['Id'];
		}


		for ($i = 0; $i < count($list); $i++) {
			$currentItem = current($list);
			$result .= "<option value='" . $currentItem['Id'] . "'  " . ($selectedId == $currentItem['Id'] ? 'selected' : '') . ">" . $currentItem['Name'] . "</option>";
			next($list);
		}
		$result .= "</select>";
		return $result;
	}

}

?>
