<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        emergency_service
* GENERATION DATE:  07.04.2011
* CLASS FILE:       /home/mobile/iPhoneWS/schadehulp/hbpanel/lib/classes/phpClass/generated_classes/emergency_service.Class.php5
* FOR MYSQL TABLE:  emergency_service
* FOR MYSQL DB:     schadehulp
* -------------------------------------------------------
*
*/

class emergency_service
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iServiceId;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iServiceId;
	protected $_vCompany;
	protected $_vPhone;
	protected $_vEmail;
	protected $_eStatus;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iServiceId = null;
		$this->_vCompany = null;
		$this->_vPhone = null;
		$this->_vEmail = null;
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


	public function getiServiceId()
	{
		return $this->_iServiceId;
	}

	public function getvCompany()
	{
		return $this->_vCompany;
	}

	public function getvPhone()
	{
		return $this->_vPhone;
	}

	public function getvEmail()
	{
		return $this->_vEmail;
	}

	public function geteStatus()
	{
		return $this->_eStatus;
	}


	/**
	 *   @desc   SETTER METHODS
	 */


	public function setiServiceId($val)
	{
		$this->_iServiceId =  $val;
	}

	public function setvCompany($val)
	{
		$this->_vCompany =  $val;
	}

	public function setvPhone($val)
	{
		$this->_vPhone =  $val;
	}

	public function setvEmail($val)
	{
		$this->_vEmail =  $val;
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
		$sql =  "SELECT * FROM emergency_service WHERE iServiceId = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iServiceId = $row[0]['iServiceId'];
		$this->_vCompany = $row[0]['vCompany'];
		$this->_vPhone = $row[0]['vPhone'];
		$this->_vEmail = $row[0]['vEmail'];
		$this->_eStatus = $row[0]['eStatus'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM emergency_service WHERE iServiceId = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iServiceId = ""; // clear key for autoincrement

		$sql = "INSERT INTO emergency_service ( vCompany,vPhone,vEmail,eStatus ) VALUES ( '".$this->_vCompany."','".$this->_vPhone."','".$this->_vEmail."','".$this->_eStatus."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE emergency_service SET  vCompany = '".$this->_vCompany."' , vPhone = '".$this->_vPhone."' , vEmail = '".$this->_vEmail."' , eStatus = '".$this->_eStatus."'  WHERE iServiceId = $id ";
		#echo  $sql;exit;
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
