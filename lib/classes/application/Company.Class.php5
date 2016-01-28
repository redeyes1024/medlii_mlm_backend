<?php

/*
 *
* -------------------------------------------------------
* CLASSNAME:        Company
* GENERATION DATE:  05.12.2011
* CLASS FILE:       /home/www/MLM/adminpanel/lib/classes/phpClass/generatedclasses/Company.Class.php5
* FOR MYSQL TABLE:  Company
* FOR MYSQL DB:     mli
* -------------------------------------------------------
*
*/
include_once 'BasicDBClass.php';

class Company extends BasicDBClass {

	/**
	 *   @desc Variable Declaration with default value
	 */
	protected $iCompanyId;   // KEY ATTR. WITH AUTOINCREMENT
	protected $vCompanyName;
	protected $vCompanyCodeId;
	protected $vEmail;
	protected $vAddress;
	protected $eStatus;
	protected $vGoogleAPI;
	protected $vGoogleAPIvalue;


	function select($id) {
		$sql = "SELECT * FROM Company WHERE iCompanyId = " . $id;
		$row = $this->_obj->select($sql);

		$this->iCompanyId = $row[0]['iCompanyId'];
		$this->vCompanyName = $row[0]['vCompanyName'];
		$this->vCompanyCodeId = $row[0]['vCompanyCodeId'];
		$this->vEmail = $row[0]['vEmail'];
		$this->vAddress = $row[0]['vAddress'];
		$this->eStatus = $row[0]['eStatus'];
		$this->vGoogleAPI = $row[0]['vGoogleAPI'];
		$this->vGoogleAPIvalue = $row[0]['vGoogleAPIvalue'];
	}

	function delete($id) {
		$sql = "DELETE FROM Company WHERE iCompanyId = " . $id;
		$result = $this->_obj->sql_query($sql);
		return true;
	}

	function insert() {
		$this->iCompanyId = ""; // clear key for autoincrement

		$sql = "INSERT INTO Company ( vCompanyName,vCompanyCodeId,vEmail,vAddress,eStatus,vGoogleAPI,vGoogleAPIvalue ) VALUES ( '"
				. $this->vCompanyName . "','" . $this->vCompanyCodeId . "','" . $this->vEmail . "','"
						. $this->vAddress . "','" . $this->eStatus . "','" . $this->vGoogleAPI . "','" . $this->vGoogleAPIvalue . "' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}

	function update($id) {

		$sql = " UPDATE Company SET  vCompanyName = '" . $this->vCompanyName
		. "' , vCompanyCodeId = '" . $this->vCompanyCodeId . "' , vEmail = '" . $this->vEmail
		. "' , vAddress = '" . $this->vAddress . "' , eStatus = '" . $this->eStatus . "' , vGoogleAPI = '" . $this->vGoogleAPI . "' , vGoogleAPIvalue = '" . $this->vGoogleAPIvalue . "'  WHERE iCompanyId = " . $id;
		$result = $this->_obj->sqlquery($sql);
	}

}

?>
