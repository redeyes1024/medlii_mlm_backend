<?php

/*
 *
* -------------------------------------------------------
* CLASSNAME:        AudioCategory
* GENERATION DATE:  16.07.2011
* CLASS FILE:       /home/www/SLI/hbpanel/lib/classes/phpClass/generated_classes/AudioCategory.Class.php5
* FOR MYSQL TABLE:  AudioCategory
* FOR MYSQL DB:     lsi_iphone
* -------------------------------------------------------
*
*/

class AudioCategory {

	/**
	 *   @desc Variable Declaration with default value
	 */
	protected $iAudioCategoryId;   // KEY ATTR. WITH AUTOINCREMENT
	protected $_iAudioCategoryId;
	protected $_iSGroupId;
	protected $_vCategoryName;
	protected $_eStatus;

	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */
	function __construct() {
		global $obj;
		$this->_obj = $obj;

		$this->_iAudioCategoryId = null;
		$this->_iSGroupId = null;
		$this->_vCategoryName = null;
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
	public function getiAudioCategoryId() {
		return $this->_iAudioCategoryId;
	}

	public function getiSGroupId() {
		return $this->_iSGroupId;
	}

	public function getvCategoryName() {
		return $this->_vCategoryName;
	}

	public function geteStatus() {
		return $this->_eStatus;
	}

	/**
	 *   @desc   SETTER METHODS
	 */
	public function setiAudioCategoryId($val) {
		$this->_iAudioCategoryId = $val;
	}

	public function setiSGroupId($val) {
		return $this->_iSGroupId = $val;
	}

	public function setvCategoryName($val) {
		$this->_vCategoryName = $val;
	}

	public function seteStatus($val) {
		$this->_eStatus = $val;
	}

	/**
	 *   @desc   SELECT METHOD / LOAD
	 */
	function select($id) {
		$sql = "SELECT * FROM AudioCategory WHERE iAudioCategoryId = " . $id;
		$row = $this->_obj->select($sql);

		$this->_iAudioCategoryId = $row[0]['iAudioCategoryId'];
		$this->_iSGroupId = $row[0]['iSGroupId'];
		$this->_vCategoryName = $row[0]['vCategoryName'];
		$this->_eStatus = $row[0]['eStatus'];
	}

	/**
	 *   @desc   DELETE
	 */
	function delete($id) {
		$sql = "DELETE FROM AudioCategory WHERE iAudioCategoryId = " . $id;
		$result = $this->_obj->sql_query($sql);
	}

	/**
	 *   @desc   INSERT
	 */
	function insert() {
		$this->iAudioCategoryId = ""; // clear key for autoincrement

		$sql = "INSERT INTO AudioCategory ( iSGroupId,vCategoryName,eStatus ) VALUES ( '" . $this->_iSGroupId . "','" . $this->_vCategoryName . "','" . $this->_eStatus . "' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}

	/**
	 *   @desc   UPDATE
	 */
	function update($id) {

		$sql = " UPDATE AudioCategory SET  iSGroupId='" . $this->_iSGroupId . "',vCategoryName = '" . $this->_vCategoryName . "' , eStatus = '" . $this->_eStatus . "'  WHERE iAudioCategoryId = " . $id . " ";
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
