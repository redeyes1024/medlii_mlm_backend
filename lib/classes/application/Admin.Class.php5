<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        Admin
* GENERATION DATE:  18.08.2010
* CLASS FILE:       /home/maintenance/bioscoopreview_new/lib/classes/phpClass/generated_classes/Admin.Class.php5
* FOR MYSQL TABLE:  admin
* FOR MYSQL DB:     bioscoopreview
* -------------------------------------------------------
*
*/

class Admin
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iAdminId;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iAdminId;
	protected $_iCompanyId;
	protected $_iSGroupId;
	protected $_vFirstName;
	protected $_vLastName;
	protected $_vEmail;
	protected $_eType;
	protected $_vMobileNo;
	protected $_vUserName;
	protected $_vPassword;
	protected $_vPasswordMD5;
	protected $_vFromIP;
	protected $_dLastLogin;
	protected $_dLastAccess;
	protected $_iTotLogin;
	protected $_dRegDate;
	protected $_eStatus;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iAdminId = null;
		$this->_vFirstName = null;
		$this->_vLastName = null;
		$this->_vEmail = null;
		$this->_eType = null;
		$this->_vMobileNo = null;
		$this->_vUserName = null;
		$this->_vPassword = null;
		$this->_vPasswordMD5 = null;
		$this->_vFromIP = null;
		$this->_dLastLogin = null;
		$this->_dLastAccess = null;
		$this->_iTotLogin = null;
		$this->_dRegDate = null;
		$this->_eStatus = null;
		$this->_iCompanyId = null;
		$this->_iSGroupId = null;
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


	public function getiAdminId()
	{
		return $this->_iAdminId;
	}

	public function getvFirstName()
	{
		return $this->_vFirstName;
	}

	public function getvLastName()
	{
		return $this->_vLastName;
	}

	public function getvEmail()
	{
		return $this->_vEmail;
	}

	public function geteType()
	{
		return $this->_eType;
	}

	public function getvMobileNo()
	{
		return $this->_vMobileNo;
	}

	public function getvUserName()
	{
		return $this->_vUserName;
	}

	public function getvPassword()
	{
		return $this->_vPassword;
	}

	public function getvPasswordMD5()
	{
		return $this->_vPasswordMD5;
	}

	public function getvFromIP()
	{
		return $this->_vFromIP;
	}

	public function getdLastLogin()
	{
		return $this->_dLastLogin;
	}

	public function getdLastAccess()
	{
		return $this->_dLastAccess;
	}

	public function getiTotLogin()
	{
		return $this->_iTotLogin;
	}

	public function getdRegDate()
	{
		return $this->_dRegDate;
	}

	public function geteStatus()
	{
		return $this->_eStatus;
	}

	public function getiCompanyId()
	{
		return $this->_iCompanyId;
	}
	public function getiSGroupId()
	{
		return $this->_iSGroupId;
	}


	/**
	 *   @desc   SETTER METHODS
	 */


	public function setiAdminId($val)
	{
		$this->_iAdminId =  $val;
	}

	public function setvFirstName($val)
	{
		$this->_vFirstName =  $val;
	}

	public function setvLastName($val)
	{
		$this->_vLastName =  $val;
	}

	public function setvEmail($val)
	{
		$this->_vEmail =  $val;
	}

	public function seteType($val)
	{
		$this->_eType =  $val;
	}

	public function setvMobileNo($val)
	{
		$this->_vMobileNo =  $val;
	}

	public function setvUserName($val)
	{
		$this->_vUserName =  $val;
	}

	public function setvPassword($val)
	{
		$this->_vPassword =  $val;
	}

	public function setvPasswordMD5($val)
	{
		$this->_vPasswordMD5 =  $val;
	}

	public function setvFromIP($val)
	{
		$this->_vFromIP =  $val;
	}

	public function setdLastLogin($val)
	{
		$this->_dLastLogin =  $val;
	}

	public function setdLastAccess($val)
	{
		$this->_dLastAccess =  $val;
	}

	public function setiTotLogin($val)
	{
		$this->_iTotLogin =  $val;
	}

	public function setdRegDate($val)
	{
		$this->_dRegDate =  $val;
	}

	public function seteStatus($val)
	{
		$this->_eStatus =  $val;
	}
	public function setiCompanyId($val)
	{
		$this->_iCompanyId =  $val;
	}
	public function setiSGroupId($val)
	{
		$this->_iSGroupId =  $val;
	}



	/**
	 *   @desc   SELECT METHOD / LOAD
	 */

	function select($id)
	{
		$sql =  "SELECT * FROM admin WHERE iAdminId = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iAdminId = $row[0]['iAdminId'];
		$this->_vFirstName = $row[0]['vFirstName'];
		$this->_vLastName = $row[0]['vLastName'];
		$this->_vEmail = $row[0]['vEmail'];
		$this->_eType = $row[0]['eType'];
		$this->_vMobileNo = $row[0]['vMobileNo'];
		$this->_vUserName = $row[0]['vUserName'];
		$this->_vPassword = $row[0]['vPassword'];
		$this->_vPasswordMD5 = $row[0]['vPasswordMD5'];
		$this->_vFromIP = $row[0]['vFromIP'];
		$this->_dLastLogin = $row[0]['dLastLogin'];
		$this->_dLastAccess = $row[0]['dLastAccess'];
		$this->_iTotLogin = $row[0]['iTotLogin'];
		$this->_dRegDate = $row[0]['dRegDate'];
		$this->_eStatus = $row[0]['eStatus'];
		$this->_iCompanyId = $row[0]['iCompanyId'];
		$this->_iSGroupId = $row[0]['iSGroupId'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM admin WHERE iAdminId = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iAdminId = ""; // clear key for autoincrement

		$sql = "INSERT INTO admin ( vFirstName,vLastName,vEmail,eType,vMobileNo,vUserName,vPassword,vPasswordMD5,vFromIP,dLastLogin,dLastAccess,iTotLogin,dRegDate,eStatus,iCompanyId,iSGroupId ) VALUES ( '".$this->_vFirstName."','".$this->_vLastName."','".$this->_vEmail."','".$this->_eType."','".$this->_vMobileNo."','".$this->_vUserName."','".$this->_vPassword."','".$this->_vPasswordMD5."','".$this->_vFromIP."','".$this->_dLastLogin."','".$this->_dLastAccess."','".$this->_iTotLogin."','".$this->_dRegDate."','".$this->_eStatus."','".$this->_iCompanyId."','".$this->_iSGroupId."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE admin SET  vFirstName = '".$this->_vFirstName."' , vLastName = '".$this->_vLastName."' , vEmail = '".$this->_vEmail."' , eType = '".$this->_eType."' , vMobileNo = '".$this->_vMobileNo."' , vUserName = '".$this->_vUserName."' , vPassword = '".$this->_vPassword."' , vPasswordMD5 = '".$this->_vPasswordMD5."' , vFromIP = '".$this->_vFromIP."' , dLastLogin = '".$this->_dLastLogin."' , dLastAccess = '".$this->_dLastAccess."' , iTotLogin = '".$this->_iTotLogin."' , dRegDate = '".$this->_dRegDate."' , eStatus = '".$this->_eStatus."',iCompanyId = '".$this->_iCompanyId."',iSGroupId = '".$this->_iSGroupId."'  WHERE iAdminId = $id ";
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

				call_user_method($method,$this,$VAL);
				/*
				 * check if it's true
				* call_user_method($method,&$this,$VAL);
				*/
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
