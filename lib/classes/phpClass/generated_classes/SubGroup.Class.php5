<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        SubGroup
* GENERATION DATE:  05.12.2011
* CLASS FILE:       /home/www/MLM/adminpanel/lib/classes/phpClass/generated_classes/SubGroup.Class.php5
* FOR MYSQL TABLE:  SubGroup
* FOR MYSQL DB:     mli
* -------------------------------------------------------
*
*/

class SubGroup
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iSGroupId;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iSGroupId;
	protected $_iCompanyId;
	protected $_vGroupName;
	protected $_vGroupCodeId;
	protected $_vEmail;
	protected $_vAddress;
	protected $_eStatus;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iSGroupId = null;
		$this->_iCompanyId = null;
		$this->_vGroupName = null;
		$this->_vGroupCodeId = null;
		$this->_vEmail = null;
		$this->_vAddress = null;
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


	public function getiSGroupId()
	{
		return $this->_iSGroupId;
	}

	public function getiCompanyId()
	{
		return $this->_iCompanyId;
	}

	public function getvGroupName()
	{
		return $this->_vGroupName;
	}

	public function getvGroupCodeId()
	{
		return $this->_vGroupCodeId;
	}

	public function getvEmail()
	{
		return $this->_vEmail;
	}

	public function getvAddress()
	{
		return $this->_vAddress;
	}

	public function geteStatus()
	{
		return $this->_eStatus;
	}


	/**
	 *   @desc   SETTER METHODS
	 */


	public function setiSGroupId($val)
	{
		$this->_iSGroupId =  $val;
	}

	public function setiCompanyId($val)
	{
		$this->_iCompanyId =  $val;
	}

	public function setvGroupName($val)
	{
		$this->_vGroupName =  $val;
	}

	public function setvGroupCodeId($val)
	{
		$this->_vGroupCodeId =  $val;
	}

	public function setvEmail($val)
	{
		$this->_vEmail =  $val;
	}

	public function setvAddress($val)
	{
		$this->_vAddress =  $val;
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
		$sql =  "SELECT * FROM SubGroup WHERE iSGroupId = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iSGroupId = $row[0]['iSGroupId'];
		$this->_iCompanyId = $row[0]['iCompanyId'];
		$this->_vGroupName = $row[0]['vGroupName'];
		$this->_vGroupCodeId = $row[0]['vGroupCodeId'];
		$this->_vEmail = $row[0]['vEmail'];
		$this->_vAddress = $row[0]['vAddress'];
		$this->_eStatus = $row[0]['eStatus'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM SubGroup WHERE iSGroupId = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iSGroupId = ""; // clear key for autoincrement

		$sql = "INSERT INTO SubGroup ( iCompanyId,vGroupName,vGroupCodeId,vEmail,vAddress,eStatus ) VALUES ( '".$this->_iCompanyId."','".$this->_vGroupName."','".$this->_vGroupCodeId."','".$this->_vEmail."','".$this->_vAddress."','".$this->_eStatus."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE SubGroup SET  iCompanyId = '".$this->_iCompanyId."' , vGroupName = '".$this->_vGroupName."' , vGroupCodeId = '".$this->_vGroupCodeId."' , vEmail = '".$this->_vEmail."' , vAddress = '".$this->_vAddress."' , eStatus = '".$this->_eStatus."'  WHERE iSGroupId = $id ";
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
