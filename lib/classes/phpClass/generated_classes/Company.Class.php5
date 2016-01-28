<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        Company
* GENERATION DATE:  05.12.2011
* CLASS FILE:       /home/www/MLM/adminpanel/lib/classes/phpClass/generated_classes/Company.Class.php5
* FOR MYSQL TABLE:  Company
* FOR MYSQL DB:     mli
* -------------------------------------------------------
*
*/

class Company
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iCompany_Id;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iCompany_Id;
	protected $_vCompany_Name;
	protected $_vCompany_code_Id;
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

		$this->_iCompany_Id = null;
		$this->_vCompany_Name = null;
		$this->_vCompany_code_Id = null;
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


	public function getiCompany_Id()
	{
		return $this->_iCompany_Id;
	}

	public function getvCompany_Name()
	{
		return $this->_vCompany_Name;
	}

	public function getvCompany_code_Id()
	{
		return $this->_vCompany_code_Id;
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


	public function setiCompany_Id($val)
	{
		$this->_iCompany_Id =  $val;
	}

	public function setvCompany_Name($val)
	{
		$this->_vCompany_Name =  $val;
	}

	public function setvCompany_code_Id($val)
	{
		$this->_vCompany_code_Id =  $val;
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
		$sql =  "SELECT * FROM Company WHERE iCompany_Id = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iCompany_Id = $row[0]['iCompany_Id'];
		$this->_vCompany_Name = $row[0]['vCompany_Name'];
		$this->_vCompany_code_Id = $row[0]['vCompany_code_Id'];
		$this->_vEmail = $row[0]['vEmail'];
		$this->_vAddress = $row[0]['vAddress'];
		$this->_eStatus = $row[0]['eStatus'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM Company WHERE iCompany_Id = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iCompany_Id = ""; // clear key for autoincrement

		$sql = "INSERT INTO Company ( vCompany_Name,vCompany_code_Id,vEmail,vAddress,eStatus ) VALUES ( '".$this->_vCompany_Name."','".$this->_vCompany_code_Id."','".$this->_vEmail."','".$this->_vAddress."','".$this->_eStatus."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE Company SET  vCompany_Name = '".$this->_vCompany_Name."' , vCompany_code_Id = '".$this->_vCompany_code_Id."' , vEmail = '".$this->_vEmail."' , vAddress = '".$this->_vAddress."' , eStatus = '".$this->_eStatus."'  WHERE iCompany_Id = $id ";
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
