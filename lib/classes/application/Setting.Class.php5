<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        Setting
* GENERATION DATE:  23.08.2010
* CLASS FILE:       /class.Setting.php5

* -------------------------------------------------------
* AUTHOR:
* from: >> www.hiddenbrains.com
* -------------------------------------------------------
*
*/

class Setting {


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $_vName;
	protected $_vDesc;
	protected $_vValue;
	protected $_iOrderBy;
	protected $_eConfigType;
	protected $_eDisplayType;
	protected $_eSource;
	protected $_vSourceValue;
	protected $_eSelectType;
	protected $_vDefValue;
	protected $_eStatus;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct() {
		global $obj;
		$this->_obj = $obj;

		$this->_vName = null;
		$this->_vDesc = null;
		$this->_vValue = null;
		$this->_iOrderBy = null;
		$this->_eConfigType = 'Appearance';
		$this->_eDisplayType = 'text';
		$this->_eSource = 'List';
		$this->_vSourceValue = null;
		$this->_eSelectType = 'Single';
		$this->_vDefValue = null;
		$this->_eStatus = 'Active';
	}

	/**
	 *   @desc   DECONSTRUCTOR METHOD
	 */

	function __destruct() {
		unset($this->_obj);
	}



	/**
	 *   @desc   GETTER METHODS
	 */


	public function getvName() {
		return $this->_vName;
	}

	public function getvDesc() {
		return $this->_vDesc;
	}

	public function getvValue() {
		return $this->_vValue;
	}

	public function getiOrderBy() {
		return $this->_iOrderBy;
	}

	public function geteConfigType() {
		return $this->_eConfigType;
	}

	public function geteDisplayType() {
		return $this->_eDisplayType;
	}

	public function geteSource() {
		return $this->_eSource;
	}

	public function getvSourceValue() {
		return $this->_vSourceValue;
	}

	public function geteSelectType() {
		return $this->_eSelectType;
	}

	public function getvDefValue() {
		return $this->_vDefValue;
	}

	public function geteStatus() {
		return $this->_eStatus;
	}


	/**
	 *   @desc   SETTER METHODS
	 */


	public function setvName($val) {
		$this->_vName =  $val;
	}

	public function setvDesc($val) {
		$this->_vDesc =  $val;
	}

	public function setvValue($val) {
		$this->_vValue =  $val;
	}

	public function setiOrderBy($val) {
		$this->_iOrderBy =  $val;
	}

	public function seteConfigType($val) {
		$this->_eConfigType =  $val;
	}

	public function seteDisplayType($val) {
		$this->_eDisplayType =  $val;
	}

	public function seteSource($val) {
		$this->_eSource =  $val;
	}

	public function setvSourceValue($val) {
		$this->_vSourceValue =  $val;
	}

	public function seteSelectType($val) {
		$this->_eSelectType =  $val;
	}

	public function setvDefValue($val) {
		$this->_vDefValue =  $val;
	}

	public function seteStatus($val) {
		$this->_eStatus =  $val;
	}


	/**
	 *   @desc   SELECT METHOD / LOAD
	 */

	function select($vName="", $where, $var_limit="") {

		$ssql = " where 1=1";
		if($vName != '')
			$ssql .= " AND vName = '".$vName."'";
		if($where != '')
			$ssql .= $where;
		$sql =  "SELECT * FROM setting ".$ssql." ".$var_limit;
		$result =  $this->_obj->select($sql);
		return $result;
	}

	/**
	 *   @desc   UPDATE
	 */

	function update($vName) {
		$sql = " UPDATE setting SET  vValue = '".$this->_vValue."'  WHERE vName = '".$vName."' ";
		$result = $this->_obj->sql_query($sql);
		return $result;
	}

	function getSettingVars($iUserId) {
		$sql_select_setting = "SELECT * from scn_user_profile_settings where iUserId = '".$iUserId."'";
		$db_select_setting = $this->_obj->select($sql_select_setting);
		$isSend_external_mail = $db_select_setting[0]['SEND_ME_EXTERNAL_MAIL'];
		$Display_Birth_Date = $db_select_setting[0]['DISPLAY_BIRTH_DATE'];
		$_SESSION['settings']['send_ext_mail']= $isSend_external_mail;
		$_SESSION['settings']['Display_Birth_Date']= $Display_Birth_Date;
	}

	function getSetting() {
		$sql_select_setting = "SELECT * FROM scn_setting WHERE vName='COMPANY_TOLL_FREE'";
		$db_select_setting = $this->_obj->select($sql_select_setting);
	}




}

?>
