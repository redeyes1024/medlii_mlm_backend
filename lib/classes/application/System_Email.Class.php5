<?php

/*
 *
* -------------------------------------------------------
* CLASSNAME:        System_Email
* GENERATION DATE:  19.08.2010
* CLASS FILE:       /home/maintenance/bioscoopreview_new/lib/classes/phpClass/generated_classes/System_Email.Class.php5
* FOR MYSQL TABLE:  system_email
* FOR MYSQL DB:     bioscoopreview
* -------------------------------------------------------
*
*/

class System_Email {

	/**
	 *   @desc Variable Declaration with default value
	 */
	protected $iEmailTemplateId;   // KEY ATTR. WITH AUTOINCREMENT
	protected $_iEmailTemplateId;
	protected $_iSiteId;
	protected $_vEmailCode;
	protected $_vEmailTitle;
	protected $_vFromName;
	protected $_vFromEmail;
	protected $_eEmailFormat;
	protected $_vEmailSubject;
	protected $_tEmailMessage;
	protected $_vEmailFooter;
	protected $_eStatus;

	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */
	function __construct() {
		global $obj;
		$this->_obj = $obj;

		$this->_iEmailTemplateId = null;
		$this->_iSiteId = null;
		$this->_vEmailCode = null;
		$this->_vEmailTitle = null;
		$this->_vFromName = null;
		$this->_vFromEmail = null;
		$this->_eEmailFormat = null;
		$this->_vEmailSubject = null;
		$this->_tEmailMessage = null;
		$this->_vEmailFooter = null;
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
	public function getiEmailTemplateId() {
		return $this->_iEmailTemplateId;
	}

	public function getiSiteId() {
		return $this->_iSiteId;
	}

	public function getvEmailCode() {
		return $this->_vEmailCode;
	}

	public function getvEmailTitle() {
		return $this->_vEmailTitle;
	}

	public function getvFromName() {
		return $this->_vFromName;
	}

	public function getvFromEmail() {
		return $this->_vFromEmail;
	}

	public function geteEmailFormat() {
		return $this->_eEmailFormat;
	}

	public function getvEmailSubject() {
		return $this->_vEmailSubject;
	}

	public function gettEmailMessage() {
		return $this->_tEmailMessage;
	}

	public function getvEmailFooter() {
		return $this->_vEmailFooter;
	}

	public function geteStatus() {
		return $this->_eStatus;
	}

	/**
	 *   @desc   SETTER METHODS
	 */
	public function setiEmailTemplateId($val) {
		$this->_iEmailTemplateId = $val;
	}

	public function setiSiteId($val) {
		$this->_iSiteId = $val;
	}

	public function setvEmailCode($val) {
		$this->_vEmailCode = $val;
	}

	public function setvEmailTitle($val) {
		$this->_vEmailTitle = $val;
	}

	public function setvFromName($val) {
		$this->_vFromName = $val;
	}

	public function setvFromEmail($val) {
		$this->_vFromEmail = $val;
	}

	public function seteEmailFormat($val) {
		$this->_eEmailFormat = $val;
	}

	public function setvEmailSubject($val) {
		$this->_vEmailSubject = $val;
	}

	public function settEmailMessage($val) {
		$this->_tEmailMessage = $val;
	}

	public function setvEmailFooter($val) {
		$this->_vEmailFooter = $val;
	}

	public function seteStatus($val) {
		$this->_eStatus = $val;
	}

	/**
	 *   @desc   SELECT METHOD / LOAD
	 */
	function select($id) {
		$sql = "SELECT * FROM system_email WHERE iEmailTemplateId = " . $id;
		$row = $this->_obj->select($sql);

		$this->_iEmailTemplateId = $row[0]['iEmailTemplateId'];
		$this->_iSiteId = $row[0]['iSiteId'];
		$this->_vEmailCode = $row[0]['vEmailCode'];
		$this->_vEmailTitle = $row[0]['vEmailTitle'];
		$this->_vFromName = $row[0]['vFromName'];
		$this->_vFromEmail = $row[0]['vFromEmail'];
		$this->_eEmailFormat = $row[0]['eEmailFormat'];
		$this->_vEmailSubject = $row[0]['vEmailSubject'];
		$this->_tEmailMessage = $row[0]['tEmailMessage'];
		$this->_vEmailFooter = $row[0]['vEmailFooter'];
		$this->_eStatus = $row[0]['eStatus'];
	}

	/**
	 *   @desc   DELETE
	 */
	function delete($id) {
		$sql = "DELETE FROM system_email WHERE iEmailTemplateId = " . $id;
		$result = $this->_obj->sql_query($sql);
	}

	/**
	 *   @desc   INSERT
	 */
	function insert() {
		$this->iEmailTemplateId = ""; // clear key for autoincrement

		$sql = "INSERT INTO system_email ( iSiteId,vEmailCode,vEmailTitle,vFromName,vFromEmail,eEmailFormat,vEmailSubject,tEmailMessage,vEmailFooter,eStatus ) VALUES ( '" . $this->_iSiteId . "','" . $this->_vEmailCode . "','" . $this->_vEmailTitle . "','" . $this->_vFromName . "','" . $this->_vFromEmail . "','" . $this->_eEmailFormat . "','" . $this->_vEmailSubject . "','" . $this->_tEmailMessage . "','" . $this->_vEmailFooter . "','" . $this->_eStatus . "' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}

	/**
	 *   @desc   UPDATE
	 */
	function update($id) {

		$sql = " UPDATE system_email SET  iSiteId = '" . $this->_iSiteId . "' , vEmailCode = '" . $this->_vEmailCode . "' , vEmailTitle = '" . $this->_vEmailTitle . "' , vFromName = '" . $this->_vFromName . "' , vFromEmail = '" . $this->_vFromEmail . "' , eEmailFormat = '" . $this->_eEmailFormat . "' , vEmailSubject = '" . $this->_vEmailSubject . "' , tEmailMessage = '" . $this->_tEmailMessage . "' , vEmailFooter = '" . $this->_vEmailFooter . "' , eStatus = '" . $this->_eStatus . "'  WHERE iEmailTemplateId = " . $id . " ";
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
