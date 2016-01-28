<?php

/*
 *
* -------------------------------------------------------
* CLASSNAME:        CourseClasses
* GENERATION DATE:  18.07.2011
* CLASS FILE:       /home/www/SLI/hbpanel/lib/classes/phpClass/generated_classes/CourseClasses.Class.php5
* FOR MYSQL TABLE:  CourseClasses
* FOR MYSQL DB:     lsi_iphone
* -------------------------------------------------------
*
*/

class CourseClasses {

	/**
	 *   @desc Variable Declaration with default value
	 */
	protected $iCCId;   // KEY ATTR. WITH AUTOINCREMENT
	protected $_iCCId;
	protected $_iCourseId;
	protected $_iClassId;
	protected $_dClassDateTime;
	protected $_iDuration;
	protected $_eStatus;

	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */
	function __construct() {
		global $obj;
		$this->_obj = $obj;

		$this->_iCCId = null;
		$this->_iCourseId = null;
		$this->_iClassId = null;
		$this->_dClassDateTime = null;
		$this->_iDuration = null;
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
	public function getiCCId() {
		return $this->_iCCId;
	}

	public function getiCourseId() {
		return $this->_iCourseId;
	}

	public function getiClassId() {
		return $this->_iClassId;
	}

	public function getdClassDateTime() {
		return $this->_dClassDateTime;
	}

	public function getiDuration() {
		return $this->_iDuration;
	}

	public function geteStatus() {
		return $this->_eStatus;
	}

	/**
	 *   @desc   SETTER METHODS
	 */
	public function setiCCId($val) {
		$this->_iCCId = $val;
	}

	public function setiCourseId($val) {
		$this->_iCourseId = $val;
	}

	public function setiClassId($val) {
		$this->_iClassId = $val;
	}

	public function setdClassDateTime($val) {
		$this->_dClassDateTime = $val;
	}

	public function setiDuration($val) {
		$this->_iDuration = $val;
	}

	public function seteStatus($val) {
		$this->_eStatus = $val;
	}

	/**
	 *   @desc   SELECT METHOD / LOAD
	 */
	function select($id) {
		$sql = "SELECT * FROM CourseClasses WHERE iCCId = " . $id;
		$row = $this->_obj->select($sql);

		$this->_iCCId = $row[0]['iCCId'];
		$this->_iCourseId = $row[0]['iCourseId'];
		$this->_iClassId = $row[0]['iClassId'];
		$this->_dClassDateTime = $row[0]['dClassDateTime'];
		$this->_iDuration = $row[0]['iDuration'];
		$this->_eStatus = $row[0]['eStatus'];
	}

	/**
	 *   @desc   DELETE
	 */
	function delete($id) {
		$sql = "DELETE FROM CourseClasses WHERE iCCId = " . $id;
		$result = $this->_obj->sql_query($sql);
	}

	/**
	 *   @desc   INSERT
	 */
	function insert() {
		$this->iCCId = ""; // clear key for autoincrement

		$sql = "INSERT INTO CourseClasses ( iCourseId,iClassId,dClassDateTime,iDuration,eStatus ) VALUES ( '" . $this->_iCourseId . "','" . $this->_iClassId . "','" . $this->_dClassDateTime . "','" . $this->_iDuration . "','" . $this->_eStatus . "' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}

	/**
	 *   @desc   UPDATE
	 */
	function update($id) {

		$sql = " UPDATE CourseClasses SET  iCourseId = '" . $this->_iCourseId . "' , iClassId = '" . $this->_iClassId . "' , dClassDateTime = '" . $this->_dClassDateTime . "' , iDuration = '" . $this->_iDuration . "' , eStatus = '" . $this->_eStatus . "'  WHERE iCCId = " . $id . " ";
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
