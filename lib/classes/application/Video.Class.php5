<?php

/*
 *
* -------------------------------------------------------
* CLASSNAME:        Video
* GENERATION DATE:  16.07.2011
* CLASS FILE:       /home/www/SLI/hbpanel/lib/classes/phpClass/generated_classes/Video.Class.php5
* FOR MYSQL TABLE:  Video
* FOR MYSQL DB:     lsi_iphone
* -------------------------------------------------------
*
*/

class Video {

	/**
	 *   @desc Variable Declaration with default value
	 */
	protected $iVideoId;   // KEY ATTR. WITH AUTOINCREMENT
	protected $_iVideoId;
	protected $_iVideoCategoryId;
	protected $_vVideoName;
	protected $_vVideoPath;
	protected $_eStatus;

	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */
	function __construct() {
		global $obj;
		$this->_obj = $obj;

		$this->_iVideoId = null;
		$this->_iVideoCategoryId = null;
		$this->_vVideoName = null;
		$this->_vVideoPath = null;
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
	public function getiVideoId() {
		return $this->_iVideoId;
	}

	public function getiVideoCategoryId() {
		return $this->_iVideoCategoryId;
	}

	public function getvVideoName() {
		return $this->_vVideoName;
	}

	public function getvVideoPath() {
		return $this->_vVideoPath;
	}

	public function geteStatus() {
		return $this->_eStatus;
	}

	/**
	 *   @desc   SETTER METHODS
	 */
	public function setiVideoId($val) {
		$this->_iVideoId = $val;
	}

	public function setiVideoCategoryId($val) {
		$this->_iVideoCategoryId = $val;
	}

	public function setvVideoName($val) {
		$this->_vVideoName = $val;
	}

	public function setvVideoPath($val) {
		$this->_vVideoPath = $val;
	}

	public function seteStatus($val) {
		$this->_eStatus = $val;
	}

	/**
	 *   @desc   SELECT METHOD / LOAD
	 */
	function select($id) {
		$sql = "SELECT * FROM Video WHERE iVideoId = " . $id;
		$row = $this->_obj->select($sql);

		$this->_iVideoId = $row[0]['iVideoId'];
		$this->_iVideoCategoryId = $row[0]['iVideoCategoryId'];
		$this->_vVideoName = $row[0]['vVideoName'];
		$this->_vVideoPath = $row[0]['vVideoPath'];
		$this->_eStatus = $row[0]['eStatus'];
	}

	/**
	 *   @desc   DELETE
	 */
	function delete($id) {
		$sql = "DELETE FROM Video WHERE iVideoId = " . $id;
		$result = $this->_obj->sql_query($sql);
	}

	/**
	 *   @desc   INSERT
	 */
	function insert() {
		$this->iVideoId = ""; // clear key for autoincrement

		$sql = "INSERT INTO Video ( iVideoCategoryId,vVideoName,vVideoPath,eStatus ) VALUES ( '" . $this->_iVideoCategoryId . "','" . $this->_vVideoName . "','" . $this->_vVideoPath . "','" . $this->_eStatus . "' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}

	/**
	 *   @desc   UPDATE
	 */
	function update($id) {

		$sql = " UPDATE Video SET  iVideoCategoryId = '" . $this->_iVideoCategoryId . "' , vVideoName = '" . $this->_vVideoName . "' , vVideoPath = '" . $this->_vVideoPath . "' , eStatus = '" . $this->_eStatus . "'  WHERE iVideoId = " . $id . " ";
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
