<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        Restaurant
* GENERATION DATE:  14.06.2011
* CLASS FILE:       /home/www/DealFinder/hbpanel/lib/classes/phpClass/generated_classes/Restaurant.Class.php5
* FOR MYSQL TABLE:  restaurant
* FOR MYSQL DB:     dealfinder
* -------------------------------------------------------
*
*/

class Restaurant
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iRestaurantId;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iRestaurantId;
	protected $_vOwnerFName;
	protected $_vOwnerLName;
	protected $_vEmail;
	protected $_vPassword;
	protected $_vRestaurantName;
	protected $_vPhone;
	protected $_vAddress;
	protected $_iCity;
	protected $_iStateId;
	protected $_iCountryId;
	protected $_vPostcode;
	protected $_vLatitude;
	protected $_vLongitude;
	protected $_iCuisineType;
	protected $_iCategory;
	protected $_fAvgPrice;
	protected $_vDescription;
	protected $_eStatus;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iRestaurantId = null;
		$this->_vOwnerFName = null;
		$this->_vOwnerLName = null;
		$this->_vEmail = null;
		$this->_vPassword = null;
		$this->_vRestaurantName = null;
		$this->_vPhone = null;
		$this->_vAddress = null;
		$this->_iCity = null;
		$this->_iStateId = null;
		$this->_iCountryId = null;
		$this->_vPostcode = null;
		$this->_vLatitude = null;
		$this->_vLongitude = null;
		$this->_iCuisineType = null;
		$this->_iCategory = null;
		$this->_fAvgPrice = null;
		$this->_vDescription = null;
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


	public function getiRestaurantId()
	{
		return $this->_iRestaurantId;
	}

	public function getvOwnerFName()
	{
		return $this->_vOwnerFName;
	}

	public function getvOwnerLName()
	{
		return $this->_vOwnerLName;
	}

	public function getvEmail()
	{
		return $this->_vEmail;
	}

	public function getvPassword()
	{
		return $this->_vPassword;
	}

	public function getvRestaurantName()
	{
		return $this->_vRestaurantName;
	}

	public function getvPhone()
	{
		return $this->_vPhone;
	}

	public function getvAddress()
	{
		return $this->_vAddress;
	}

	public function getiCity()
	{
		return $this->_iCity;
	}

	public function getiStateId()
	{
		return $this->_iStateId;
	}

	public function getiCountryId()
	{
		return $this->_iCountryId;
	}

	public function getvPostcode()
	{
		return $this->_vPostcode;
	}

	public function getvLatitude()
	{
		return $this->_vLatitude;
	}

	public function getvLongitude()
	{
		return $this->_vLongitude;
	}

	public function getiCuisineType()
	{
		return $this->_iCuisineType;
	}

	public function getiCategory()
	{
		return $this->_iCategory;
	}

	public function getfAvgPrice()
	{
		return $this->_fAvgPrice;
	}

	public function getvDescription()
	{
		return $this->_vDescription;
	}

	public function geteStatus()
	{
		return $this->_eStatus;
	}


	/**
	 *   @desc   SETTER METHODS
	 */


	public function setiRestaurantId($val)
	{
		$this->_iRestaurantId =  $val;
	}

	public function setvOwnerFName($val)
	{
		$this->_vOwnerFName =  $val;
	}

	public function setvOwnerLName($val)
	{
		$this->_vOwnerLName =  $val;
	}

	public function setvEmail($val)
	{
		$this->_vEmail =  $val;
	}

	public function setvPassword($val)
	{
		$this->_vPassword =  $val;
	}

	public function setvRestaurantName($val)
	{
		$this->_vRestaurantName =  $val;
	}

	public function setvPhone($val)
	{
		$this->_vPhone =  $val;
	}

	public function setvAddress($val)
	{
		$this->_vAddress =  $val;
	}

	public function setiCity($val)
	{
		$this->_iCity =  $val;
	}

	public function setiStateId($val)
	{
		$this->_iStateId =  $val;
	}

	public function setiCountryId($val)
	{
		$this->_iCountryId =  $val;
	}

	public function setvPostcode($val)
	{
		$this->_vPostcode =  $val;
	}

	public function setvLatitude($val)
	{
		$this->_vLatitude =  $val;
	}

	public function setvLongitude($val)
	{
		$this->_vLongitude =  $val;
	}

	public function setiCuisineType($val)
	{
		$this->_iCuisineType =  $val;
	}

	public function setiCategory($val)
	{
		$this->_iCategory =  $val;
	}

	public function setfAvgPrice($val)
	{
		$this->_fAvgPrice =  $val;
	}

	public function setvDescription($val)
	{
		$this->_vDescription =  $val;
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
		$sql =  "SELECT * FROM restaurant WHERE iRestaurantId = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iRestaurantId = $row[0]['iRestaurantId'];
		$this->_vOwnerFName = $row[0]['vOwnerFName'];
		$this->_vOwnerLName = $row[0]['vOwnerLName'];
		$this->_vEmail = $row[0]['vEmail'];
		$this->_vPassword = $row[0]['vPassword'];
		$this->_vRestaurantName = $row[0]['vRestaurantName'];
		$this->_vPhone = $row[0]['vPhone'];
		$this->_vAddress = $row[0]['vAddress'];
		$this->_iCity = $row[0]['iCity'];
		$this->_iStateId = $row[0]['iStateId'];
		$this->_iCountryId = $row[0]['iCountryId'];
		$this->_vPostcode = $row[0]['vPostcode'];
		$this->_vLatitude = $row[0]['vLatitude'];
		$this->_vLongitude = $row[0]['vLongitude'];
		$this->_iCuisineType = $row[0]['iCuisineType'];
		$this->_iCategory = $row[0]['iCategory'];
		$this->_fAvgPrice = $row[0]['fAvgPrice'];
		$this->_vDescription = $row[0]['vDescription'];
		$this->_eStatus = $row[0]['eStatus'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM restaurant WHERE iRestaurantId = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iRestaurantId = ""; // clear key for autoincrement

		$sql = "INSERT INTO restaurant ( vOwnerFName,vOwnerLName,vEmail,vPassword,vRestaurantName,vPhone,vAddress,iCity,iStateId,iCountryId,vPostcode,vLatitude,vLongitude,iCuisineType,iCategory,fAvgPrice,vDescription,eStatus ) VALUES ( '".$this->_vOwnerFName."','".$this->_vOwnerLName."','".$this->_vEmail."','".$this->_vPassword."','".$this->_vRestaurantName."','".$this->_vPhone."','".$this->_vAddress."','".$this->_iCity."','".$this->_iStateId."','".$this->_iCountryId."','".$this->_vPostcode."','".$this->_vLatitude."','".$this->_vLongitude."','".$this->_iCuisineType."','".$this->_iCategory."','".$this->_fAvgPrice."','".$this->_vDescription."','".$this->_eStatus."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE restaurant SET  vOwnerFName = '".$this->_vOwnerFName."' , vOwnerLName = '".$this->_vOwnerLName."' , vEmail = '".$this->_vEmail."' , vPassword = '".$this->_vPassword."' , vRestaurantName = '".$this->_vRestaurantName."' , vPhone = '".$this->_vPhone."' , vAddress = '".$this->_vAddress."' , iCity = '".$this->_iCity."' , iStateId = '".$this->_iStateId."' , iCountryId = '".$this->_iCountryId."' , vPostcode = '".$this->_vPostcode."' , vLatitude = '".$this->_vLatitude."' , vLongitude = '".$this->_vLongitude."' , iCuisineType = '".$this->_iCuisineType."' , iCategory = '".$this->_iCategory."' , fAvgPrice = '".$this->_fAvgPrice."' , vDescription = '".$this->_vDescription."' , eStatus = '".$this->_eStatus."'  WHERE iRestaurantId = $id ";
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
