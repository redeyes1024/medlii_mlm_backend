<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        Owner
* GENERATION DATE:  15.07.2011
* CLASS FILE:       /home/www/Occupy/hbpanel/lib/classes/phpClass/generated_classes/Owner.Class.php5
* FOR MYSQL TABLE:  owner
* FOR MYSQL DB:     occupy
* -------------------------------------------------------
*
*/

class Owner
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iOwnerId;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iOwnerId;
	protected $_vFirstname;
	protected $_vLastname;
	protected $_vAddress;
	protected $_iCountryId;
	protected $_iStateId;
	protected $_vCity;
	protected $_vFax;
	protected $_iZipcode;
	protected $_iTelephone;
	protected $_vEmail;
	protected $_vThumbImage;
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

		$this->_iOwnerId = null;
		$this->_vFirstname = null;
		$this->_vLastname = null;
		$this->_vAddress = null;
		$this->_iCountryId = null;
		$this->_iStateId = null;
		$this->_vCity = null;
		$this->_vFax = null;
		$this->_iZipcode = null;
		$this->_iTelephone = null;
		$this->_vEmail = null;
		$this->_vThumbImage = null;
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


	public function getiOwnerId()
	{
		return $this->_iOwnerId;
	}

	public function getvFirstname()
	{
		return $this->_vFirstname;
	}

	public function getvLastname()
	{
		return $this->_vLastname;
	}

	public function getvAddress()
	{
		return $this->_vAddress;
	}

	public function getiCountryId()
	{
		return $this->_iCountryId;
	}

	public function getiStateId()
	{
		return $this->_iStateId;
	}

	public function getvCity()
	{
		return $this->_vCity;
	}

	public function getvFax()
	{
		return $this->_vFax;
	}

	public function getiZipcode()
	{
		return $this->_iZipcode;
	}

	public function getiTelephone()
	{
		return $this->_iTelephone;
	}

	public function getvEmail()
	{
		return $this->_vEmail;
	}

	public function getvThumbImage()
	{
		return $this->_vThumbImage;
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


	public function setiOwnerId($val)
	{
		$this->_iOwnerId =  $val;
	}

	public function setvFirstname($val)
	{
		$this->_vFirstname =  $val;
	}

	public function setvLastname($val)
	{
		$this->_vLastname =  $val;
	}

	public function setvAddress($val)
	{
		$this->_vAddress =  $val;
	}

	public function setiCountryId($val)
	{
		$this->_iCountryId =  $val;
	}

	public function setiStateId($val)
	{
		$this->_iStateId =  $val;
	}

	public function setvCity($val)
	{
		$this->_vCity =  $val;
	}

	public function setvFax($val)
	{
		$this->_vFax =  $val;
	}

	public function setiZipcode($val)
	{
		$this->_iZipcode =  $val;
	}

	public function setiTelephone($val)
	{
		$this->_iTelephone =  $val;
	}

	public function setvEmail($val)
	{
		$this->_vEmail =  $val;
	}

	public function setvThumbImage($val)
	{
		$this->_vThumbImage =  $val;
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
		$sql =  "SELECT * FROM owner WHERE iOwnerId = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iOwnerId = $row[0]['iOwnerId'];
		$this->_vFirstname = $row[0]['vFirstname'];
		$this->_vLastname = $row[0]['vLastname'];
		$this->_vAddress = $row[0]['vAddress'];
		$this->_iCountryId = $row[0]['iCountryId'];
		$this->_iStateId = $row[0]['iStateId'];
		$this->_vCity = $row[0]['vCity'];
		$this->_vFax = $row[0]['vFax'];
		$this->_iZipcode = $row[0]['iZipcode'];
		$this->_iTelephone = $row[0]['iTelephone'];
		$this->_vEmail = $row[0]['vEmail'];
		$this->_vThumbImage = $row[0]['vThumbImage'];
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
		$sql = "DELETE FROM owner WHERE iOwnerId = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iOwnerId = ""; // clear key for autoincrement

		$sql = "INSERT INTO owner ( vFirstname,vLastname,vAddress,iCountryId,iStateId,vCity,vFax,iZipcode,iTelephone,vEmail,vThumbImage,vUsername,vPassword,dCreated,eStatus ) VALUES ( '".$this->_vFirstname."','".$this->_vLastname."','".$this->_vAddress."','".$this->_iCountryId."','".$this->_iStateId."','".$this->_vCity."','".$this->_vFax."','".$this->_iZipcode."','".$this->_iTelephone."','".$this->_vEmail."','".$this->_vThumbImage."','".$this->_vUsername."','".$this->_vPassword."','".$this->_dCreated."','".$this->_eStatus."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE owner SET  vFirstname = '".$this->_vFirstname."' , vLastname = '".$this->_vLastname."' , vAddress = '".$this->_vAddress."' , iCountryId = '".$this->_iCountryId."' , iStateId = '".$this->_iStateId."' , vCity = '".$this->_vCity."' , vFax = '".$this->_vFax."' , iZipcode = '".$this->_iZipcode."' , iTelephone = '".$this->_iTelephone."' , vEmail = '".$this->_vEmail."' , vThumbImage = '".$this->_vThumbImage."' , vUsername = '".$this->_vUsername."' , vPassword = '".$this->_vPassword."' , dCreated = '".$this->_dCreated."' , eStatus = '".$this->_eStatus."'  WHERE iOwnerId = $id ";
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
