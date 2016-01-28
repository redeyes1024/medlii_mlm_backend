<?php

/*
 *
* -------------------------------------------------------
* CLASSNAME:        Audio
* GENERATION DATE:  16.07.2011
* CLASS FILE:       /home/www/SLI/hbpanel/lib/classes/phpClass/generated_classes/Audio.Class.php5
* FOR MYSQL TABLE:  Audio
* FOR MYSQL DB:     lsi_iphone
* -------------------------------------------------------
*
*/

class Audio {

	/**
	 *   @desc Variable Declaration with default value
	 */
	protected $iAudioId;   // KEY ATTR. WITH AUTOINCREMENT
	protected $_iAudioId;
	protected $_iAudioCategoryId;
	protected $_vAudioName;
	protected $_vAudiopath;
	protected $_eStatus;

	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */
	function __construct() {
		global $obj;
		$this->_obj = $obj;

		$this->_iAudioId = null;
		$this->_iAudioCategoryId = null;
		$this->_vAudioName = null;
		$this->_vAudiopath = null;
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
	public function getiAudioId() {
		return $this->_iAudioId;
	}

	public function getiAudioCategoryId() {
		return $this->_iAudioCategoryId;
	}

	public function getvAudioName() {
		return $this->_vAudioName;
	}

	public function getvAudiopath() {
		return $this->_vAudiopath;
	}

	public function geteStatus() {
		return $this->_eStatus;
	}

	/**
	 *   @desc   SETTER METHODS
	 */
	public function setiAudioId($val) {
		$this->_iAudioId = $val;
	}

	public function setiAudioCategoryId($val) {
		$this->_iAudioCategoryId = $val;
	}

	public function setvAudioName($val) {
		$this->_vAudioName = $val;
	}

	public function setvAudiopath($val) {
		$this->_vAudiopath = $val;
	}

	public function seteStatus($val) {
		$this->_eStatus = $val;
	}

	/**
	 *   @desc   SELECT METHOD / LOAD
	 */
	function select($id) {
		$sql = "SELECT * FROM Audio WHERE iAudioId = " . $id;
		$row = $this->_obj->select($sql);

		$this->_iAudioId = $row[0]['iAudioId'];
		$this->_iAudioCategoryId = $row[0]['iAudioCategoryId'];
		$this->_vAudioName = $row[0]['vAudioName'];
		$this->_vAudiopath = $row[0]['vAudiopath'];
		$this->_eStatus = $row[0]['eStatus'];
	}

	/**
	 *   @desc   DELETE
	 */
	function delete($id) {
		$sql = "DELETE FROM Audio WHERE iAudioId = " . $id;
		$result = $this->_obj->sql_query($sql);
	}

	/**
	 *   @desc   INSERT
	 */
	function insert() {
		$this->iAudioId = ""; // clear key for autoincrement

		$sql = "INSERT INTO Audio ( iAudioCategoryId,vAudioName,vAudiopath,eStatus ) VALUES ( '" . $this->_iAudioCategoryId . "','" . $this->_vAudioName . "','" . $this->_vAudiopath . "','" . $this->_eStatus . "' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}

	/**
	 *   @desc   UPDATE
	 */
	function update($id) {

		$sql = " UPDATE Audio SET  iAudioCategoryId = '" . $this->_iAudioCategoryId . "' , vAudioName = '" . $this->_vAudioName . "' , vAudiopath = '" . $this->_vAudiopath . "' , eStatus = '" . $this->_eStatus . "'  WHERE iAudioId = " . $id . " ";
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
