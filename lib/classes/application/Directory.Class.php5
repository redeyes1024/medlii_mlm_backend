<?php

/*
 *
* -------------------------------------------------------
* CLASSNAME:        Directory
* GENERATION DATE:  16.07.2011
* CLASS FILE:       /home/www/SLI/hbpanel/lib/classes/phpClass/generated_classes/Directory.Class.php5
* FOR MYSQL TABLE:  Directory
* FOR MYSQL DB:     lsi_iphone
* -------------------------------------------------------
*
*/

class Directory1 {

	/**
	 *   @desc Variable Declaration with default value
	 */
	protected $iDirectoryId;   // KEY ATTR. WITH AUTOINCREMENT
	protected $_iDirectoryId;
	protected $_iSGroupId;
	protected $_vEmpId;
	protected $_vFirstname;
	protected $_vLastname;
	protected $_vEmail;
	protected $_vPhone;
	protected $_vJobTitle;
	protected $_vDept;
	protected $_eStatus;

	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */
	function __construct() {
		global $obj;
		$this->_obj = $obj;

		$this->_iDirectoryId = null;
		$this->_iSGroupId = null;
		$this->_vEmpId = null;
		$this->_vFirstname = null;
		$this->_vLastname = null;
		$this->_vEmail = null;
		$this->_vPhone = null;
		$this->_vJobTitle = null;
		$this->_vDept = null;
		$this->_eStatus = null;
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
	public function getiDirectoryId() {
		return $this->_iDirectoryId;
	}

	public function getiSGroupId() {
		return $this->_iSGroupId;
	}

	public function getvEmpId() {
		return $this->_vEmpId;
	}

	public function getvFirstname() {
		return $this->_vFirstname;
	}

	public function getvLastname() {
		return $this->_vLastname;
	}

	public function getvEmail() {
		return $this->_vEmail;
	}

	public function getvPhone() {
		return $this->_vPhone;
	}

	public function getvJobTitle() {
		return $this->_vJobTitle;
	}

	public function getvDept() {
		return $this->_vDept;
	}

	public function geteStatus() {
		return $this->_eStatus;
	}

	/**
	 *   @desc   SETTER METHODS
	 */
	public function setiDirectoryId($val) {
		$this->_iDirectoryId = $val;
	}

	public function setiSGroupId($val) {
		return $this->_iSGroupId = $val;
	}

	public function setvEmpId($val) {
		$this->_vEmpId = $val;
	}

	public function setvFirstname($val) {
		$this->_vFirstname = $val;
	}

	public function setvLastname($val) {
		$this->_vLastname = $val;
	}

	public function setvEmail($val) {
		$this->_vEmail = $val;
	}

	public function setvPhone($val) {
		$this->_vPhone = $val;
	}

	public function setvJobTitle($val) {
		$this->_vJobTitle = $val;
	}

	public function setvDept($val) {
		$this->_vDept = $val;
	}

	public function seteStatus($val) {
		$this->_eStatus = $val;
	}

	/**
	 *   @desc   SELECT METHOD / LOAD
	 */
	function select($id) {
		$sql = "SELECT * FROM Directory WHERE iDirectoryId = " . $id;
		$row = $this->_obj->select($sql);

		$this->_iDirectoryId = $row[0]['iDirectoryId'];
		$this->_iSGroupId = $row[0]['iSGroupId'];
		$this->_vEmpId = $row[0]['vEmpId'];
		$this->_vFirstname = $row[0]['vFirstname'];
		$this->_vLastname = $row[0]['vLastname'];
		$this->_vEmail = $row[0]['vEmail'];
		$this->_vPhone = $row[0]['vPhone'];
		$this->_vJobTitle = $row[0]['vJobTitle'];
		$this->_vDept = $row[0]['vDept'];
		$this->_eStatus = $row[0]['eStatus'];
	}

	/**
	 *   @desc   DELETE
	 */
	function delete($id) {
		$sql = "DELETE FROM Directory WHERE iDirectoryId = " . $id;
		$result = $this->_obj->sql_query($sql);
	}

	/**
	 *   @desc   INSERT
	 */
	function insert() {
		$this->iDirectoryId = ""; // clear key for autoincrement

		$sql = "INSERT INTO Directory(iSGroupId,vEmpId,vFirstname,vLastname,vEmail,vPhone,vJobTitle,vDept,eStatus) VALUES('" . $this->_iSGroupId . "','" . $this->_vEmpId . "','" . $this->_vFirstname . "','" . $this->_vLastname . "','" . $this->_vEmail . "','" . $this->_vPhone . "','" . $this->_vJobTitle . "','" . $this->_vDept . "','" . $this->_eStatus . "' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}

	/**
	 *   @desc   UPDATE
	 */
	function update($id) {

		$sql = " UPDATE Directory SET iSGroupId = '" . $this->_iSGroupId . "',vEmpId = '" . $this->_vEmpId . "',vFirstname = '" . $this->_vFirstname . "' , vLastname = '" . $this->_vLastname . "' , vEmail = '" . $this->_vEmail . "' , vPhone = '" . $this->_vPhone . "',vJobTitle = '" . $this->_vJobTitle . "' ,vDept = '" . $this->_vDept . "' , eStatus = '" . $this->_eStatus . "'  WHERE iDirectoryId = " . $id . " ";
		$result = $this->_obj->sql_query($sql);
	}

	function setAllVar() {
		$MethodArr = get_class_methods($this);
		foreach ($_REQUEST AS $KEY => $VAL) {
			$method = "set" . $KEY;
			if (in_array($method, $MethodArr)) {
				call_user_method($method, $this, $VAL);
			}
		}
	}

	function getAllVar() {
		$MethodArr = get_class_methods($this);
		$method_notArr = Array('getAllVar');
		$evalStr = '';
		for ($i = 0; $i < count($MethodArr); $i++) {
			if (substr($MethodArr[$i], 0, 3) == 'get' && (!(in_array($MethodArr[$i], $method_notArr)))) {
				$var_name = substr($MethodArr[$i], 3);
				$evalStr.= 'global $' . $var_name . '; $' . $var_name . ' = $this->' . $MethodArr[$i] . "();";
			}
		}
		eval($evalStr);
	}

}

?>
