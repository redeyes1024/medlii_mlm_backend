<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        UserApp
* GENERATION DATE:  14.07.2011
* CLASS FILE:       /home/www/Occupy/hbpanel/lib/classes/phpClass/generated_classes/UserApp.Class.php5
* FOR MYSQL TABLE:  userapp
* FOR MYSQL DB:     occupy
* -------------------------------------------------------
*
*/

class UserApp
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iUserId;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iUserId;
	protected $_vName;
	protected $_vEmail;
	protected $_vUsername;
	protected $_vPassword;
	protected $_dCreated;
	protected $_eStatus;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iUserId = null;
		$this->_vName = null;
		$this->_vEmail = null;
		$this->_vUsername = null;
		$this->_vPassword = null;
		$this->_dCreated = null;
		$this->_eStatus = null;
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


	public function getiUserId()
	{
		return $this->_iUserId;
	}

	public function getvName()
	{
		return $this->_vName;
	}

	public function getvEmail()
	{
		return $this->_vEmail;
	}

	public function getvUsername()
	{
		return $this->_vUsername;
	}

	public function getvPassword()
	{
		return $this->_vPassword;
	}

	public function getdCreated()
	{
		return $this->_dCreated;
	}

	public function geteStatus()
	{
		return $this->_eStatus;
	}


	/**
	 *   @desc   SETTER METHODS
	 */


	public function setiUserId($val)
	{
		$this->_iUserId =  $val;
	}

	public function setvName($val)
	{
		$this->_vName =  $val;
	}

	public function setvEmail($val)
	{
		$this->_vEmail =  $val;
	}

	public function setvUsername($val)
	{
		$this->_vUsername =  $val;
	}

	public function setvPassword($val)
	{
		$this->_vPassword =  $val;
	}

	public function setdCreated($val)
	{
		$this->_dCreated =  $val;
	}

	public function seteStatus($val)
	{
		$this->_eStatus =  $val;
	}


	/**
	 *   @desc   SELECT METHOD / LOAD
	 */

	function select($id)
	{
		$sql =  "SELECT * FROM userapp WHERE iUserId = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iUserId = $row[0]['iUserId'];
		$this->_vName = $row[0]['vName'];
		$this->_vEmail = $row[0]['vEmail'];
		$this->_vUsername = $row[0]['vUsername'];
		$this->_vPassword = $row[0]['vPassword'];
		$this->_dCreated = $row[0]['dCreated'];
		$this->_eStatus = $row[0]['eStatus'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM userapp WHERE iUserId = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iUserId = ""; // clear key for autoincrement

		$sql = "INSERT INTO userapp ( vName,vEmail,vUsername,vPassword,dCreated,eStatus ) VALUES ( '".$this->_vName."','".$this->_vEmail."','".$this->_vUsername."','".$this->_vPassword."','".$this->_dCreated."','".$this->_eStatus."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE userapp SET  vName = '".$this->_vName."' , vEmail = '".$this->_vEmail."' , vUsername = '".$this->_vUsername."' , vPassword = '".$this->_vPassword."' , dCreated = '".$this->_dCreated."' , eStatus = '".$this->_eStatus."'  WHERE iUserId = $id ";
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
		$method_notArr=Array('getAllVar');
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

}

?>
