<?php

/*
 *
* -------------------------------------------------------
* CLASSNAME:        SubGroup
* GENERATION DATE:  05.12.2011
* CLASS FILE:       /home/www/MLM/adminpanel/lib/classes/phpClass/generatedclasses/SubGroup.Class.php5
* FOR MYSQL TABLE:  SubGroup
* FOR MYSQL DB:     mli
* -------------------------------------------------------
*
*/
include_once 'BasicDBClass.php';

class SubGroup extends BasicDBClass {

	protected $iSGroupId;   // KEY ATTR. WITH AUTOINCREMENT
	protected $iCompanyId;
	protected $vGroupName;
	protected $vExternal_Id;
	protected $vGroupCodeId;
	protected $vEmail;
	protected $vAddress;
	protected $eStatus;
	protected $iIsDefault;

	function select($id) {
		$sql = "SELECT * FROM SubGroup WHERE iSGroupId = " . $id;
		$row = $this->_obj->select($sql);

		$this->iSGroupId = $row[0]['iSGroupId'];
		$this->iCompanyId = $row[0]['iCompanyId'];
		$this->vGroupName = $row[0]['vGroupName'];
		$this->vExternal_Id = $row[0]['vExternal_Id'];
		$this->vGroupCodeId = $row[0]['vGroupCodeId'];
		$this->vEmail = $row[0]['vEmail'];
		$this->vAddress = $row[0]['vAddress'];
		$this->eStatus = $row[0]['eStatus'];
		$this->iIsDefault = $row[0]['iIsDefault'];
	}

	function delete($id) {
		$sql = "DELETE FROM SubGroup WHERE iSGroupId = " . $id;
		$return = $this->_obj->sql_query($sql);
		return $return;
	}

	function insert() {
		$this->iSGroupId = ""; // clear key for autoincrement

		$sql = "INSERT INTO SubGroup ( iCompanyId,vGroupName,vExternal_id,vGroupCodeId,vEmail,vAddress,iIsDefault,eStatus ) VALUES ( '" . $this->iCompanyId . "','" . $this->vGroupName . "','" . $this->vExternal_Id . "','" . $this->vGroupCodeId . "','" . $this->vEmail . "','" . $this->vAddress . "','" . $this->iIsDefault . "','" . $this->eStatus . "' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}

	function update($id) {

		$sql = " UPDATE SubGroup SET  iCompanyId = '" . $this->iCompanyId . "' , vGroupName = '" . $this->vGroupName . "' , vExternal_Id = '" . $this->vExternal_Id . "',vGroupCodeId = '" . $this->vGroupCodeId . "' , vEmail = '" . $this->vEmail . "' , vAddress = '" . $this->vAddress . "' , iIsDefault = '" . $this->iIsDefault . "' , eStatus = '" . $this->eStatus . "'  WHERE iSGroupId = $id ";
		$result = $this->_obj->sqlquery($sql);
		return $result;
	}

	function randomPrefix($length) {

		$result = strtoupper(substr(md5(hexdec(uniqid())), 0, $length));
		return $result;
	}

	function createDefaultGroup($iCompanyId) {
		if (!empty($iCompanyId)) {

			$sql = "INSERT INTO SubGroup (iCompanyId,vGroupName,vGroupCodeId,vEmail,vAddress,eStatus,iIsDefault) " .
					"VALUES ('" . $iCompanyId . "','Default Group','default','default','default','1','1')";

			return $this->_obj->insert($sql);
		} else {
			return false;
		}
	}


}

?>
