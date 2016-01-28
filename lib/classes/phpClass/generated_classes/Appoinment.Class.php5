<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        Appoinment
* GENERATION DATE:  09.09.2011
* CLASS FILE:       /home/www/Mobilease/hbpanel/lib/classes/phpClass/generated_classes/Appoinment.Class.php5
* FOR MYSQL TABLE:  user_appoinment
* FOR MYSQL DB:     mobilease
* -------------------------------------------------------
*
*/

class Appoinment
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iAId;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iAId;
	protected $_vName;
	protected $_vAddress;
	protected $_vPhone;
	protected $_vEmail;
	protected $_vComments;
	protected $_dApp_date;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iAId = null;
		$this->_vName = null;
		$this->_vAddress = null;
		$this->_vPhone = null;
		$this->_vEmail = null;
		$this->_vComments = null;
		$this->_dApp_date = null;
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


	public function getiAId()
	{
		return $this->_iAId;
	}

	public function getvName()
	{
		return $this->_vName;
	}

	public function getvAddress()
	{
		return $this->_vAddress;
	}

	public function getvPhone()
	{
		return $this->_vPhone;
	}

	public function getvEmail()
	{
		return $this->_vEmail;
	}

	public function getvComments()
	{
		return $this->_vComments;
	}

	public function getdApp_date()
	{
		return $this->_dApp_date;
	}


	/**
	 *   @desc   SETTER METHODS
	 */


	public function setiAId($val)
	{
		$this->_iAId =  $val;
	}

	public function setvName($val)
	{
		$this->_vName =  $val;
	}

	public function setvAddress($val)
	{
		$this->_vAddress =  $val;
	}

	public function setvPhone($val)
	{
		$this->_vPhone =  $val;
	}

	public function setvEmail($val)
	{
		$this->_vEmail =  $val;
	}

	public function setvComments($val)
	{
		$this->_vComments =  $val;
	}

	public function setdApp_date($val)
	{
		$this->_dApp_date =  $val;
	}


	/**
	 *   @desc   SELECT METHOD / LOAD
	 */

	function select($id)
	{
		$sql =  "SELECT * FROM user_appoinment WHERE iAId = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iAId = $row[0]['iAId'];
		$this->_vName = $row[0]['vName'];
		$this->_vAddress = $row[0]['vAddress'];
		$this->_vPhone = $row[0]['vPhone'];
		$this->_vEmail = $row[0]['vEmail'];
		$this->_vComments = $row[0]['vComments'];
		$this->_dApp_date = $row[0]['dApp_date'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM user_appoinment WHERE iAId = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iAId = ""; // clear key for autoincrement

		$sql = "INSERT INTO user_appoinment ( vName,vAddress,vPhone,vEmail,vComments,dApp_date ) VALUES ( '".$this->_vName."','".$this->_vAddress."','".$this->_vPhone."','".$this->_vEmail."','".$this->_vComments."','".$this->_dApp_date."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE user_appoinment SET  vName = '".$this->_vName."' , vAddress = '".$this->_vAddress."' , vPhone = '".$this->_vPhone."' , vEmail = '".$this->_vEmail."' , vComments = '".$this->_vComments."' , dApp_date = '".$this->_dApp_date."'  WHERE iAId = $id ";
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
