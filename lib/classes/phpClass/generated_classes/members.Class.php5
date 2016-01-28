<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        members
* GENERATION DATE:  05.05.2011
* CLASS FILE:       /home/mobile/iPhoneWS/Kitchen/hbpanel/lib/classes/phpClass/generated_classes/members.Class.php5
* FOR MYSQL TABLE:  members
* FOR MYSQL DB:     theculinaryexchange
* -------------------------------------------------------
*
*/

class members
{


	/**
	*   @desc Variable Declaration with default value
	*/

	protected $member_id;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_member_id;
	protected $_firstname;
	protected $_lastname;
	protected $_age;
	protected $_fav_food;
	protected $_intrigues;
	protected $_about_yourself;
	protected $_country;
	protected $_state;
	protected $_city;
	protected $_address;
	protected $_contact_no;
	protected $_mobile_no;
	protected $_email;
	protected $_username;
	protected $_password;
	protected $_photo;
	protected $_registration_date;
	protected $_logged_in;
	protected $_login_time;
	protected $_deleted;
	protected $_privacy;
	protected $_confirmed;



	/**
	*   @desc   CONSTRUCTOR METHOD
	*/

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_member_id = null;
		$this->_firstname = null;
		$this->_lastname = null;
		$this->_age = null;
		$this->_fav_food = null;
		$this->_intrigues = null;
		$this->_about_yourself = null;
		$this->_country = null;
		$this->_state = null;
		$this->_city = null;
		$this->_address = null;
		$this->_contact_no = null;
		$this->_mobile_no = null;
		$this->_email = null;
		$this->_username = null;
		$this->_password = null;
		$this->_photo = null;
		$this->_registration_date = null;
		$this->_logged_in = null;
		$this->_login_time = null;
		$this->_deleted = null;
		$this->_privacy = null;
		$this->_confirmed = null;
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


	public function getmember_id()
	{
		return $this->_member_id;
	}

	public function getfirstname()
	{
		return $this->_firstname;
	}

	public function getlastname()
	{
		return $this->_lastname;
	}

	public function getage()
	{
		return $this->_age;
	}

	public function getfav_food()
	{
		return $this->_fav_food;
	}

	public function getintrigues()
	{
		return $this->_intrigues;
	}

	public function getabout_yourself()
	{
		return $this->_about_yourself;
	}

	public function getcountry()
	{
		return $this->_country;
	}

	public function getstate()
	{
		return $this->_state;
	}

	public function getcity()
	{
		return $this->_city;
	}

	public function getaddress()
	{
		return $this->_address;
	}

	public function getcontact_no()
	{
		return $this->_contact_no;
	}

	public function getmobile_no()
	{
		return $this->_mobile_no;
	}

	public function getemail()
	{
		return $this->_email;
	}

	public function getusername()
	{
		return $this->_username;
	}

	public function getpassword()
	{
		return $this->_password;
	}

	public function getphoto()
	{
		return $this->_photo;
	}

	public function getregistration_date()
	{
		return $this->_registration_date;
	}

	public function getlogged_in()
	{
		return $this->_logged_in;
	}

	public function getlogin_time()
	{
		return $this->_login_time;
	}

	public function getdeleted()
	{
		return $this->_deleted;
	}

	public function getprivacy()
	{
		return $this->_privacy;
	}

	public function getconfirmed()
	{
		return $this->_confirmed;
	}


	/**
	*   @desc   SETTER METHODS
	*/


	public function setmember_id($val)
	{
		$this->_member_id =  $val;
	}

	public function setfirstname($val)
	{
		$this->_firstname =  $val;
	}

	public function setlastname($val)
	{
		$this->_lastname =  $val;
	}

	public function setage($val)
	{
		$this->_age =  $val;
	}

	public function setfav_food($val)
	{
		$this->_fav_food =  $val;
	}

	public function setintrigues($val)
	{
		$this->_intrigues =  $val;
	}

	public function setabout_yourself($val)
	{
		$this->_about_yourself =  $val;
	}

	public function setcountry($val)
	{
		$this->_country =  $val;
	}

	public function setstate($val)
	{
		$this->_state =  $val;
	}

	public function setcity($val)
	{
		$this->_city =  $val;
	}

	public function setaddress($val)
	{
		$this->_address =  $val;
	}

	public function setcontact_no($val)
	{
		$this->_contact_no =  $val;
	}

	public function setmobile_no($val)
	{
		$this->_mobile_no =  $val;
	}

	public function setemail($val)
	{
		$this->_email =  $val;
	}

	public function setusername($val)
	{
		$this->_username =  $val;
	}

	public function setpassword($val)
	{
		$this->_password =  $val;
	}

	public function setphoto($val)
	{
		$this->_photo =  $val;
	}

	public function setregistration_date($val)
	{
		$this->_registration_date =  $val;
	}

	public function setlogged_in($val)
	{
		$this->_logged_in =  $val;
	}

	public function setlogin_time($val)
	{
		$this->_login_time =  $val;
	}

	public function setdeleted($val)
	{
		$this->_deleted =  $val;
	}

	public function setprivacy($val)
	{
		$this->_privacy =  $val;
	}

	public function setconfirmed($val)
	{
		$this->_confirmed =  $val;
	}


	/**
	*   @desc   SELECT METHOD / LOAD
	*/

	function select($id)
	{
		$sql =  "SELECT * FROM members WHERE member_id = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_member_id = $row[0]['member_id'];
		$this->_firstname = $row[0]['firstname'];
		$this->_lastname = $row[0]['lastname'];
		$this->_age = $row[0]['age'];
		$this->_fav_food = $row[0]['fav_food'];
		$this->_intrigues = $row[0]['intrigues'];
		$this->_about_yourself = $row[0]['about_yourself'];
		$this->_country = $row[0]['country'];
		$this->_state = $row[0]['state'];
		$this->_city = $row[0]['city'];
		$this->_address = $row[0]['address'];
		$this->_contact_no = $row[0]['contact_no'];
		$this->_mobile_no = $row[0]['mobile_no'];
		$this->_email = $row[0]['email'];
		$this->_username = $row[0]['username'];
		$this->_password = $row[0]['password'];
		$this->_photo = $row[0]['photo'];
		$this->_registration_date = $row[0]['registration_date'];
		$this->_logged_in = $row[0]['logged_in'];
		$this->_login_time = $row[0]['login_time'];
		$this->_deleted = $row[0]['deleted'];
		$this->_privacy = $row[0]['privacy'];
		$this->_confirmed = $row[0]['confirmed'];
	}


	/**
	*   @desc   DELETE
	*/

	function delete($id)
	{
		$sql = "DELETE FROM members WHERE member_id = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	*   @desc   INSERT
	*/

	function insert()
	{
		$this->member_id = ""; // clear key for autoincrement

		$sql = "INSERT INTO members ( firstname,lastname,age,fav_food,intrigues,about_yourself,country,state,city,address,contact_no,mobile_no,email,username,password,photo,registration_date,logged_in,login_time,deleted,privacy,confirmed ) VALUES ( '".$this->_firstname."','".$this->_lastname."','".$this->_age."','".$this->_fav_food."','".$this->_intrigues."','".$this->_about_yourself."','".$this->_country."','".$this->_state."','".$this->_city."','".$this->_address."','".$this->_contact_no."','".$this->_mobile_no."','".$this->_email."','".$this->_username."','".$this->_password."','".$this->_photo."','".$this->_registration_date."','".$this->_logged_in."','".$this->_login_time."','".$this->_deleted."','".$this->_privacy."','".$this->_confirmed."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	*   @desc   UPDATE
	*/

	function update($id)
	{

		$sql = " UPDATE members SET  firstname = '".$this->_firstname."' , lastname = '".$this->_lastname."' , age = '".$this->_age."' , fav_food = '".$this->_fav_food."' , intrigues = '".$this->_intrigues."' , about_yourself = '".$this->_about_yourself."' , country = '".$this->_country."' , state = '".$this->_state."' , city = '".$this->_city."' , address = '".$this->_address."' , contact_no = '".$this->_contact_no."' , mobile_no = '".$this->_mobile_no."' , email = '".$this->_email."' , username = '".$this->_username."' , password = '".$this->_password."' , photo = '".$this->_photo."' , registration_date = '".$this->_registration_date."' , logged_in = '".$this->_logged_in."' , login_time = '".$this->_login_time."' , deleted = '".$this->_deleted."' , privacy = '".$this->_privacy."' , confirmed = '".$this->_confirmed."'  WHERE member_id = $id ";
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