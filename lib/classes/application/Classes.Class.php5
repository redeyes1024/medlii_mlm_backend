<?php

/*
 *
* -------------------------------------------------------
* CLASSNAME:        Classes
* GENERATION DATE:  16.07.2011
* CLASS FILE:       /home/www/SLI/hbpanel/lib/classes/phpClass/generated_classes/Classes.Class.php5
* FOR MYSQL TABLE:  Class
* FOR MYSQL DB:     lsi_iphone
* -------------------------------------------------------
*
*/

class Classes {

	/**
	 *   @desc Variable Declaration with default value
	 */
	protected $iClassId;   // KEY ATTR. WITH AUTOINCREMENT
	protected $_iClassId;
	protected $_iSGroupId;
	protected $_vClassname;
	protected $_eStatus;

	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */
	function __construct() {
		global $obj;
		$this->_obj = $obj;

		$this->_iClassId = null;
		$this->_iSGroupId = null;
		$this->_vClassname = null;
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
	public function getiClassId() {
		return $this->_iClassId;
	}

	public function getiSGroupId() {
		return $this->_iSGroupId;
	}

	public function getvClassname() {
		return $this->_vClassname;
	}

	public function geteStatus() {
		return $this->_eStatus;
	}

	/**
	 *   @desc   SETTER METHODS
	 */
	public function setiClassId($val) {
		$this->_iClassId = $val;
	}

	public function setiSGroupId($val) {
		return $this->_iSGroupId = $val;
	}

	public function setvClassname($val) {
		$this->_vClassname = $val;
	}

	public function seteStatus($val) {
		$this->_eStatus = $val;
	}

	/**
	 *   @desc   SELECT METHOD / LOAD
	 */
	function select($id) {
		$sql = "SELECT * FROM Class WHERE iClassId = " . $id;
		$row = $this->_obj->select($sql);

		$this->_iClassId = $row[0]['iClassId'];
		$this->_iSGroupId = $row[0]['iSGroupId'];
		$this->_vClassname = $row[0]['vClassname'];
		$this->_eStatus = $row[0]['eStatus'];
	}

	/**
	 *   @desc   DELETE
	 */
	function delete($id) {
		$sql = "DELETE FROM Class WHERE iClassId = " . $id;
		$result = $this->_obj->sql_query($sql);
	}

	/**
	 *   @desc   INSERT
	 */
	function insert() {
		$this->iClassId = ""; // clear key for autoincrement

		$sql = "INSERT INTO Class ( iSGroupId,vClassname,eStatus ) VALUES ( '" . $this->_iSGroupId . "','" . $this->_vClassname . "','" . $this->_eStatus . "' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}

	/**
	 *   @desc   UPDATE
	 */
	function update($id) {

		$sql = " UPDATE Class SET  iSGroupId = '" . $this->_iSGroupId . "',vClassname = '" . $this->_vClassname . "' , eStatus = '" . $this->_eStatus . "'  WHERE iClassId = " . $id . " ";
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
