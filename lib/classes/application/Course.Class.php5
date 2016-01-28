<?php

/*
 *
* -------------------------------------------------------
* CLASSNAME:        Course
* GENERATION DATE:  18.07.2011
* CLASS FILE:       /home/www/SLI/hbpanel/lib/classes/phpClass/generated_classes/Course.Class.php5
* FOR MYSQL TABLE:  Course
* FOR MYSQL DB:     lsi_iphone
* -------------------------------------------------------
*
*/

class Course {

	/**
	 *   @desc Variable Declaration with default value
	 */
	protected $iCourseId;   // KEY ATTR. WITH AUTOINCREMENT
	protected $_iCourseId;
	protected $_iSGroupId;
	protected $_vCoursename;
	protected $_dCourseDateTime;
	protected $_vDescription;
	protected $_eStatus;

	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */
	function __construct() {
		global $obj;
		$this->_obj = $obj;

		$this->_iCourseId = null;
		$this->_iSGroupId = null;
		$this->_vCoursename = null;
		$this->_dCourseDateTime = null;
		$this->_vDescription = null;
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
	public function getiCourseId() {
		return $this->_iCourseId;
	}

	public function getiSGroupId() {
		return $this->_iSGroupId;
	}

	public function getvCoursename() {
		return $this->_vCoursename;
	}

	public function getdCourseDateTime() {
		return $this->_dCourseDateTime;
	}

	public function getvDescription() {
		return $this->_vDescription;
	}

	public function geteStatus() {
		return $this->_eStatus;
	}

	/**
	 *   @desc   SETTER METHODS
	 */
	public function setiCourseId($val) {
		$this->_iCourseId = $val;
	}

	public function setiSGroupId($val) {
		return $this->_iSGroupId = $val;
	}

	public function setvCoursename($val) {
		$this->_vCoursename = $val;
	}

	public function setdCourseDateTime($val) {
		$this->_dCourseDateTime = $val;
	}

	public function setvDescription($val) {
		$this->_vDescription = $val;
	}

	public function seteStatus($val) {
		$this->_eStatus = $val;
	}

	/**
	 *   @desc   SELECT METHOD / LOAD
	 */
	function select($id) {
		$sql = "SELECT * FROM Course WHERE iCourseId = " . $id;
		$row = $this->_obj->select($sql);

		$this->_iCourseId = $row[0]['iCourseId'];
		$this->_iSGroupId = $row[0]['iSGroupId'];
		$this->_vCoursename = $row[0]['vCoursename'];
		$this->_dCourseDateTime = $row[0]['dCourseDateTime'];
		$this->_vDescription = $row[0]['vDescription'];
		$this->_eStatus = $row[0]['eStatus'];
	}

	/**
	 *   @desc   DELETE
	 */
	function delete($id) {
		$sql = "DELETE FROM Course WHERE iCourseId = " . $id;
		$result = $this->_obj->sql_query($sql);
	}

	/**
	 *   @desc   INSERT
	 */
	function insert() {
		$this->iCourseId = ""; // clear key for autoincrement

		$sql = "INSERT INTO Course ( iSGroupId,vCoursename,dCourseDateTime,vDescription,eStatus ) VALUES ( '" . $this->_iSGroupId . "','" . $this->_vCoursename . "','" . $this->_dCourseDateTime . "','" . $this->_vDescription . "','" . $this->_eStatus . "' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}

	/**
	 *   @desc   UPDATE
	 */
	function update($id) {

		$sql = " UPDATE Course SET iSGroupId = '" . $this->_iSGroupId . "',vCoursename = '" . $this->_vCoursename . "' , dCourseDateTime = '" . $this->_dCourseDateTime . "' , vDescription = '" . $this->_vDescription . "' , eStatus = '" . $this->_eStatus . "'  WHERE iCourseId = " . $id . " ";
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
