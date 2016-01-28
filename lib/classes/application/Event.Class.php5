<?php

/*
 *
* -------------------------------------------------------
* CLASSNAME:        Event
* GENERATION DATE:  16.07.2011
* CLASS FILE:       /home/www/SLI/hbpanel/lib/classes/phpClass/generated_classes/Event.Class.php5
* FOR MYSQL TABLE:  Event
* FOR MYSQL DB:     lsi_iphone
* -------------------------------------------------------
*
*/

class Event {

	/**
	 *   @desc Variable Declaration with default value
	 */
	protected $iEventId;   // KEY ATTR. WITH AUTOINCREMENT
	protected $_iSGroupId;
	protected $_iEventId;
	protected $_vEventTitle;
	protected $_dEventDateTime;
	protected $_vDescription;
	protected $_eStatus;
	protected $_showDate;

	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */
	function __construct() {
		global $obj;
		$this->_obj = $obj;
		$this->_iSGroupId = null;
		$this->_iEventId = null;
		$this->_vEventTitle = null;
		$this->_dEventDateTime = null;
		$this->_vDescription = null;
		$this->_eStatus = null;
		$this->_showDate = null;
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
	public function getiEventId() {
		return $this->_iEventId;
	}

	public function getiSGroupId() {
		return $this->_iSGroupId;
	}

	public function getvEventTitle() {
		return $this->_vEventTitle;
	}

	public function getdEventDateTime() {
		return $this->_dEventDateTime;
	}

	public function getvDescription() {
		return $this->_vDescription;
	}

	public function geteStatus() {
		return $this->_eStatus;
	}

	public function getshowDate() {
		return $this->_showDate;
	}

	/**
	 *   @desc   SETTER METHODS
	 */
	public function setiEventId($val) {
		$this->_iEventId = $val;
	}

	public function setiSGroupId($val) {
		return $this->_iSGroupId = $val;
	}

	public function setvEventTitle($val) {
		$this->_vEventTitle = $val;
	}

	public function setdEventDateTime($val) {
		$this->_dEventDateTime = $val;
	}

	public function setvDescription($val) {
		$this->_vDescription = $val;
	}

	public function seteStatus($val) {
		$this->_eStatus = $val;
	}

	public function setshowDate($val) {
		$this->_showDate = $val;
	}

	/**
	 *   @desc   SELECT METHOD / LOAD
	 */
	function select($id) {
		$sql = "SELECT * FROM Event WHERE iEventId = " . $id;
		$row = $this->_obj->select($sql);

		$this->_iEventId = $row[0]['iEventId'];
		$this->_iSGroupId = $row[0]['iSGroupId'];
		$this->_vEventTitle = $row[0]['vEventTitle'];
		$this->_dEventDateTime = $row[0]['dEventDateTime'];
		$this->_vDescription = $row[0]['vDescription'];
		$this->_eStatus = $row[0]['eStatus'];
		$this->_showDate = $row[0]['showDate'];
	}

	/**
	 *   @desc   DELETE
	 */
	function delete($id) {
		$sql = "DELETE FROM Event WHERE iEventId = " . $id;
		$result = $this->_obj->sql_query($sql);
	}

	/**
	 *   @desc   INSERT
	 */
	function insert() {
		$this->iEventId = ""; // clear key for autoincrement

		$sql = "INSERT INTO Event ( iSGroupId,vEventTitle,dEventDateTime,vDescription,eStatus,showDate ) VALUES ( '" . $this->_iSGroupId . "','" . $this->_vEventTitle . "','" . $this->_dEventDateTime . "','" . $this->_vDescription . "','" . $this->_eStatus . "','" . $this->_showDate . "' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}

	/**
	 *   @desc   UPDATE
	 */
	function update($id) {

		$sql = " UPDATE Event SET  iSGroupId = '" . $this->_iSGroupId . "',vEventTitle = '" . $this->_vEventTitle . "' , dEventDateTime = '" . $this->_dEventDateTime . "' , vDescription = '" . $this->_vDescription . "' , eStatus = '" . $this->_eStatus . "' , showDate = '" . $this->_showDate . "'  WHERE iEventId = $id ";
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
