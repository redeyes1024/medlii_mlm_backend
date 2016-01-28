<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        admin
* GENERATION DATE:  06.05.2011
* CLASS FILE:       /home/mobile/iPhoneWS/Kitchen/hbpanel/lib/classes/phpClass/generated_classes/admin.Class.php5
* FOR MYSQL TABLE:  admin_users
* FOR MYSQL DB:     theculinaryexchange
* -------------------------------------------------------
*
*/

class admin
{


	/**
	*   @desc Variable Declaration with default value
	*/

	protected $admin_user_id ;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_admin_user_id;
	protected $_username;
	protected $_password;
	protected $_firstname;
	protected $_lastname;
	protected $_email;
	protected $_phone;
	protected $_address;
	protected $_lastlogin;
	protected $_last_password_change;
	protected $_can_publish_cmt;



	/**
	*   @desc   CONSTRUCTOR METHOD
	*/

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_admin_user_id = null;
		$this->_username = null;
		$this->_password = null;
		$this->_firstname = null;
		$this->_lastname = null;
		$this->_email = null;
		$this->_phone = null;
		$this->_address = null;
		$this->_lastlogin = null;
		$this->_last_password_change = null;
		$this->_can_publish_cmt = null;
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


	public function getadmin_user_id()
	{
		return $this->_admin_user_id;
	}

	public function getusername()
	{
		return $this->_username;
	}

	public function getpassword()
	{
		return $this->_password;
	}

	public function getfirstname()
	{
		return $this->_firstname;
	}

	public function getlastname()
	{
		return $this->_lastname;
	}

	public function getemail()
	{
		return $this->_email;
	}

	public function getphone()
	{
		return $this->_phone;
	}

	public function getaddress()
	{
		return $this->_address;
	}

	public function getlastlogin()
	{
		return $this->_lastlogin;
	}

	public function getlast_password_change()
	{
		return $this->_last_password_change;
	}

	public function getcan_publish_cmt()
	{
		return $this->_can_publish_cmt;
	}


	/**
	*   @desc   SETTER METHODS
	*/


	public function setadmin_user_id($val)
	{
		$this->_admin_user_id =  $val;
	}

	public function setusername($val)
	{
		$this->_username =  $val;
	}

	public function setpassword($val)
	{
		$this->_password =  $val;
	}

	public function setfirstname($val)
	{
		$this->_firstname =  $val;
	}

	public function setlastname($val)
	{
		$this->_lastname =  $val;
	}

	public function setemail($val)
	{
		$this->_email =  $val;
	}

	public function setphone($val)
	{
		$this->_phone =  $val;
	}

	public function setaddress($val)
	{
		$this->_address =  $val;
	}

	public function setlastlogin($val)
	{
		$this->_lastlogin =  $val;
	}

	public function setlast_password_change($val)
	{
		$this->_last_password_change =  $val;
	}

	public function setcan_publish_cmt($val)
	{
		$this->_can_publish_cmt =  $val;
	}


	/**
	*   @desc   SELECT METHOD / LOAD
	*/

	function select($id)
	{
		$sql =  "SELECT * FROM admin_users WHERE admin_user_id  = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_admin_user_id = $row[0]['admin_user_id'];
		$this->_username = $row[0]['username'];
		$this->_password = $row[0]['password'];
		$this->_firstname = $row[0]['firstname'];
		$this->_lastname = $row[0]['lastname'];
		$this->_email = $row[0]['email'];
		$this->_phone = $row[0]['phone'];
		$this->_address = $row[0]['address'];
		$this->_lastlogin = $row[0]['lastlogin'];
		$this->_last_password_change = $row[0]['last_password_change'];
		$this->_can_publish_cmt = $row[0]['can_publish_cmt'];
	}


	/**
	*   @desc   DELETE
	*/

	function delete($id)
	{
		$sql = "DELETE FROM admin_users WHERE admin_user_id  = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	*   @desc   INSERT
	*/

	function insert()
	{
		$this->admin_user_id  = ""; // clear key for autoincrement

		$sql = "INSERT INTO admin_users ( admin_user_id,username,password,firstname,lastname,email,phone,address,lastlogin,last_password_change,can_publish_cmt ) VALUES ( '".$this->_admin_user_id."','".$this->_username."','".$this->_password."','".$this->_firstname."','".$this->_lastname."','".$this->_email."','".$this->_phone."','".$this->_address."','".$this->_lastlogin."','".$this->_last_password_change."','".$this->_can_publish_cmt."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	*   @desc   UPDATE
	*/

	function update($id)
	{

		$sql = " UPDATE admin_users SET  admin_user_id = '".$this->_admin_user_id."' , username = '".$this->_username."' , password = '".$this->_password."' , firstname = '".$this->_firstname."' , lastname = '".$this->_lastname."' , email = '".$this->_email."' , phone = '".$this->_phone."' , address = '".$this->_address."' , lastlogin = '".$this->_lastlogin."' , last_password_change = '".$this->_last_password_change."' , can_publish_cmt = '".$this->_can_publish_cmt."'  WHERE admin_user_id  = $id ";
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