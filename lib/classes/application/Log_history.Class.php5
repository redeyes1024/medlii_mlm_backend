<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        Log_history
* GENERATION DATE:  08.09.2010
* CLASS FILE:       /home/maintenance/bioscoopreview_new/lib/classes/phpClass/generated_classes/Log_history.Class.php5
* FOR MYSQL TABLE:  log_history
* FOR MYSQL DB:     bioscoopreview
* -------------------------------------------------------
*
*/

class Log_history
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iLogId;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iLogId;
	protected $_iUserId;
	protected $_eUserType;
	protected $_vIP;
	protected $_dLoginDate;
	protected $_dLogoutDate;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iLogId = null;
		$this->_iUserId = null;
		$this->_eUserType = null;
		$this->_vIP = null;
		$this->_dLoginDate = null;
		$this->_dLogoutDate = null;
	}

	/**
	 *   @desc   DECONSTRUCTOR METHOD
	 */

	function __destruct()
	{
		unset($this->_obj);
	}



	/**
	 *   @desc   GETTER METHODS
	 */


	public function getiLogId()
	{
		return $this->_iLogId;
	}

	public function getiUserId()
	{
		return $this->_iUserId;
	}

	public function geteUserType()
	{
		return $this->_eUserType;
	}

	public function getvIP()
	{
		return $this->_vIP;
	}

	public function getdLoginDate()
	{
		return $this->_dLoginDate;
	}

	public function getdLogoutDate()
	{
		return $this->_dLogoutDate;
	}


	/**
	 *   @desc   SETTER METHODS
	 */


	public function setiLogId($val)
	{
		$this->_iLogId =  $val;
	}

	public function setiUserId($val)
	{
		$this->_iUserId =  $val;
	}

	public function seteUserType($val)
	{
		$this->_eUserType =  $val;
	}

	public function setvIP($val)
	{
		$this->_vIP =  $val;
	}

	public function setdLoginDate($val)
	{
		$this->_dLoginDate =  $val;
	}

	public function setdLogoutDate($val)
	{
		$this->_dLogoutDate =  $val;
	}


	/**
	 *   @desc   SELECT METHOD / LOAD
	 */

	function select($id)
	{
		$sql =  "SELECT * FROM log_history WHERE iLogId = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iLogId = $row[0]['iLogId'];
		$this->_iUserId = $row[0]['iUserId'];
		$this->_eUserType = $row[0]['eUserType'];
		$this->_vIP = $row[0]['vIP'];
		$this->_dLoginDate = $row[0]['dLoginDate'];
		$this->_dLogoutDate = $row[0]['dLogoutDate'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM log_history WHERE iLogId = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iLogId = ""; // clear key for autoincrement

		$sql = "INSERT INTO log_history ( iUserId,eUserType,vIP,dLoginDate,dLogoutDate ) VALUES ( '".$this->_iUserId."','".$this->_eUserType."','".$this->_vIP."','".$this->_dLoginDate."','".$this->_dLogoutDate."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE log_history SET  iUserId = '".$this->_iUserId."' , eUserType = '".$this->_eUserType."' , vIP = '".$this->_vIP."' , dLoginDate = '".$this->_dLoginDate."' , dLogoutDate = '".$this->_dLogoutDate."'  WHERE iLogId = $id ";
		$result = $this->_obj->sql_query($sql);

	}

	function setAllVar()
	{
		$MethodArr = get_class_methods($this);
		foreach($_REQUEST AS $KEY => $VAL)
		{
			$method = "set".$KEY;
			if(in_array($method , $MethodArr))
			{
				call_user_method($method,&$this,$VAL);
			}
		}
	}

	function getAllVar()
	{
		$MethodArr = get_class_methods($this);
		$method_notArr=Array('getAllVar', 'get_last_login_info');
		$evalStr='';
		for($i=0;$i<count($MethodArr);$i++)
		{
			if(substr($MethodArr[$i] , 0 ,3) == 'get' && (!(in_array($MethodArr[$i],$method_notArr))))
			{
				$var_name = substr($MethodArr[$i] , 3 );
				$evalStr.= 'global $'.$var_name.'; $'.$var_name.' = $this->'.$MethodArr[$i]."();";
			}
		}
		eval($evalStr);
	}

	function get_last_login_info($iUserId) {
		$sql_select="SELECT dLoginDate FROM log_history WHERE iUserId='".$iUserId."' AND eUserType='User' ORDER BY dLoginDate DESC limit 2";
		$db_select=$this->_obj->select($sql_select);
		return  $db_select;
	}
}

?>
