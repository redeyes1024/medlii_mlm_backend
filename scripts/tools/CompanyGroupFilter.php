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

class CompanyGroupFilter {

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
				//  debugger;
				if(combo.value!='') {
				file = $('input#file').val();
				if(file=='SubGroup') {
				window.location ='index.php?file='+file+'&AX=Yes&" . 'iCompanyId' . "='+combo.value;
						return false;
	} else {
						var " . 'iCompanyId' . " = $('select#" . 'iCompanyId' . "').val();

								$.get(admin_url+'scripts/ajax/getGroup.php','" . 'iCompanyId' . "='+" . 'iCompanyId' . "+'&file='+file,function(data){
										$('#showGroup').html(data);

										changeGroupList();
	});
	}

	}
	}

										function changeGroupList()
										{
										//debugger;
										var " . 'iCompanyId' . "='';
												var " . 'iSGroupId' . " ='';
														var str_company='';
														var str_group='';
														" . 'iCompanyId' . " = $('#" . 'iCompanyId' . "').val();
																" . $this::groupValueFilterName . " = $('#" . $this::groupValueFilterName . "').val();
																{
																		if(" . 'iCompanyId' . "!='') {
																				str_company ='&" . 'iCompanyId' . "='+" . 'iCompanyId' . ";
	}
																						if(" . $this::groupValueFilterName . "!='') {
																								str_group ='&" . $this::groupValueFilterName . "='+" . $this::groupValueFilterName . ";
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

	function getGroupsList($iCompanyId = null, $selectedId = null, $default = 'All') {
		$results = '';
		if ($this->eRights == 1) {
			$results = "<input type='hidden' id='" . $this::groupValueFilterName . "' name='" . $this::groupValueFilterName . "'  value='" . $_SESSION["sess_iSGroupIds"][0]['iSGroupId'] . "'>" . $_SESSION["sess_iSGroupId"][0][1];
		} else {
			$user = new User();
			if ($this->eRights < 4) {
				$iCompanyId = $_SESSION['sess_iCompanyId'];
			}
			$list = $user->getGroupsListForUser($this->eRights, $this->iUserId, $iCompanyId, ($default == 'Default Group' ? true : false));
			$results = $this->genDynamicDropeDown($list, $this::groupValueFilterName, 'changeGroupList()', $selectedId, ($default == 'NO' || $default == 'Default Group') ? null : $default);
		}
		return $results;



		$list = $this->getGroupsListForUser($this->eRights, $this->iUserId, $iCompanyId);
	}

	function getCompaniesList($iCompanyId = null, $selectedId = null, $default = 'All') {
		$results = '';
		if ($this->eRights < 4) {
			$results = "<input type='hidden' id='" . 'iCompanyId' . "' name='" . 'iCompanyId' . "'  value='" . $_SESSION["sess_iCompanyId"] . "'>" . $_SESSION["sess_vCompanyName"];
		} else {
			$user = new User();
			$list = $user->getCompaniesListForUser($this->eRights, $this->iUserId);
			$results = $this->genDynamicDropeDown($list, 'iCompanyId', 'CompanyGroupFilter(this)', $selectedId, $default);
		}
		return $results;
	}

	protected function genDynamicDropeDown($list, $keyName, $script, $selectedId = 0, $showAll = 'All') {

		$result = '';

		$result .= "<select name='" . $keyName . "' id='" . $keyName . "'   style='width: 150 ' onChange=" . $script . " >";


		if ($showAll && $showAll != 'Default Group') {
			$result .= "<option value='0' " . ($selectedId == 0 ? 'selected' : '') . " >" . $showAll . "</option>";
		} elseif ($showAll && $keyName == 'Group' && $showAll == 'Default Group') {
			$result .= "<option value='' " . ($selectedId == 0 ? 'selected' : '') . " >Please chouse a group</option>";
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
