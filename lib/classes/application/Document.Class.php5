<?php

/*
 *
* -------------------------------------------------------
* CLASSNAME:        Document
* GENERATION DATE:  16.07.2011
* CLASS FILE:       /home/www/SLI/hbpanel/lib/classes/phpClass/generated_classes/Document.Class.php5
* FOR MYSQL TABLE:  Document
* FOR MYSQL DB:     lsi_iphone
* -------------------------------------------------------
*
*/

class Document {

	/**
	 *   @desc Variable Declaration with default value
	 */
	protected $iDocumentId;   // KEY ATTR. WITH AUTOINCREMENT
	protected $_iDocumentId;
	protected $_iLibCategoryId;
	protected $_vDocumentName;
	protected $_vDocumentpath;
	protected $_eStatus;

	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */
	function __construct() {
		global $obj;
		$this->_obj = $obj;

		$this->_iDocumentId = null;
		$this->_iLibCategoryId = null;
		$this->_vDocumentName = null;
		$this->_vDocumentpath = null;
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
	public function getiDocumentId() {
		return $this->_iDocumentId;
	}

	public function getiLibCategoryId() {
		return $this->_iLibCategoryId;
	}

	public function getvDocumentName() {
		return $this->_vDocumentName;
	}

	public function getvDocumentpath() {
		return $this->_vDocumentpath;
	}

	public function geteStatus() {
		return $this->_eStatus;
	}

	/**
	 *   @desc   SETTER METHODS
	 */
	public function setiDocumentId($val) {
		$this->_iDocumentId = $val;
	}

	public function setiLibCategoryId($val) {
		$this->_iLibCategoryId = $val;
	}

	public function setvDocumentName($val) {
		$this->_vDocumentName = $val;
	}

	public function setvDocumentpath($val) {
		$this->_vDocumentpath = $val;
	}

	public function seteStatus($val) {
		$this->_eStatus = $val;
	}

	/**
	 *   @desc   SELECT METHOD / LOAD
	 */
	function select($id) {
		$sql = "SELECT * FROM Document WHERE iDocumentId = ".$id;
		$row = $this->_obj->select($sql);

		$this->_iDocumentId = $row[0]['iDocumentId'];
		$this->_iLibCategoryId = $row[0]['iLibCategoryId'];
		$this->_vDocumentName = $row[0]['vDocumentName'];
		$this->_vDocumentpath = $row[0]['vDocumentpath'];
		$this->_eStatus = $row[0]['eStatus'];
	}

	/**
	 *   @desc   DELETE
	 */
	function delete($id) {
		$sql = "DELETE FROM Document WHERE iDocumentId = " . $id;
		$result = $this->_obj->sql_query($sql);
	}

	/**
	 *   @desc   INSERT
	 */
	function insert() {
		$this->iDocumentId = ""; // clear key for autoincrement

		$sql = "INSERT INTO Document ( iLibCategoryId,vDocumentName,vDocumentpath,eStatus ) VALUES ( '" . $this->_iLibCategoryId . "','" . $this->_vDocumentName . "','" . $this->_vDocumentpath . "','" . $this->_eStatus . "' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}

	/**
	 *   @desc   UPDATE
	 */
	function update($id) {

		$sql = " UPDATE Document SET  iLibCategoryId = '" . $this->_iLibCategoryId . "' , vDocumentName = '" . $this->_vDocumentName . "' , vDocumentpath = '" . $this->_vDocumentpath . "' , eStatus = '" . $this->_eStatus . "'  WHERE iDocumentId = $id ";
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
