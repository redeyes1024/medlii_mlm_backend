<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        Property
* GENERATION DATE:  16.07.2011
* CLASS FILE:       /home/www/Occupy/hbpanel/lib/classes/phpClass/generated_classes/Property.Class.php5
* FOR MYSQL TABLE:  property
* FOR MYSQL DB:     occupy
* -------------------------------------------------------
*
*/

class Property
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iPropertyId;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iPropertyId;
	protected $_iOwnerId;
	protected $_iPropertytypeId;
	protected $_ePropertyStatus;
	protected $_eSaleStatus;
	protected $_dSoldDate;
	protected $_dOpenHouseStartTime;
	protected $_dOpenHouseEndTime;
	protected $_ePets;
	protected $_vReferenceNo;
	protected $_vAddress;
	protected $_iCountryId;
	protected $_iStateId;
	protected $_iZipcode;
	protected $_fPrice;
	protected $_iCurrencyId;
	protected $_vThumbImage;
	protected $_iNoOfRoom;
	protected $_iNoOfBathroom;
	protected $_fLatitude;
	protected $_fLongitude;
	protected $_vYearBuilt;
	protected $_fArea;
	protected $_vDescription;
	protected $_dCreated;
	protected $_dModified;
	protected $_eStatus;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iPropertyId = null;
		$this->_iOwnerId = null;
		$this->_iPropertytypeId = null;
		$this->_ePropertyStatus = null;
		$this->_eSaleStatus = null;
		$this->_dSoldDate = null;
		$this->_dOpenHouseStartTime = null;
		$this->_dOpenHouseEndTime = null;
		$this->_ePets = null;
		$this->_vReferenceNo = null;
		$this->_vAddress = null;
		$this->_iCountryId = null;
		$this->_iStateId = null;
		$this->_iZipcode = null;
		$this->_fPrice = null;
		$this->_iCurrencyId = null;
		$this->_vThumbImage = null;
		$this->_iNoOfRoom = null;
		$this->_iNoOfBathroom = null;
		$this->_fLatitude = null;
		$this->_fLongitude = null;
		$this->_vYearBuilt = null;
		$this->_fArea = null;
		$this->_vDescription = null;
		$this->_dCreated = null;
		$this->_dModified = null;
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


	public function getiPropertyId()
	{
		return $this->_iPropertyId;
	}

	public function getiOwnerId()
	{
		return $this->_iOwnerId;
	}

	public function getiPropertytypeId()
	{
		return $this->_iPropertytypeId;
	}

	public function getePropertyStatus()
	{
		return $this->_ePropertyStatus;
	}

	public function geteSaleStatus()
	{
		return $this->_eSaleStatus;
	}

	public function getdSoldDate()
	{
		return $this->_dSoldDate;
	}

	public function getdOpenHouseStartTime()
	{
		return $this->_dOpenHouseStartTime;
	}

	public function getdOpenHouseEndTime()
	{
		return $this->_dOpenHouseEndTime;
	}

	public function getePets()
	{
		return $this->_ePets;
	}

	public function getvReferenceNo()
	{
		return $this->_vReferenceNo;
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

	public function getiZipcode()
	{
		return $this->_iZipcode;
	}

	public function getfPrice()
	{
		return $this->_fPrice;
	}

	public function getiCurrencyId()
	{
		return $this->_iCurrencyId;
	}

	public function getvThumbImage()
	{
		return $this->_vThumbImage;
	}

	public function getiNoOfRoom()
	{
		return $this->_iNoOfRoom;
	}

	public function getiNoOfBathroom()
	{
		return $this->_iNoOfBathroom;
	}

	public function getfLatitude()
	{
		return $this->_fLatitude;
	}

	public function getfLongitude()
	{
		return $this->_fLongitude;
	}

	public function getvYearBuilt()
	{
		return $this->_vYearBuilt;
	}

	public function getfArea()
	{
		return $this->_fArea;
	}

	public function getvDescription()
	{
		return $this->_vDescription;
	}

	public function getdCreated()
	{
		return $this->_dCreated;
	}

	public function getdModified()
	{
		return $this->_dModified;
	}

	public function geteStatus()
	{
		return $this->_eStatus;
	}


	/**
	 *   @desc   SETTER METHODS
	 */


	public function setiPropertyId($val)
	{
		$this->_iPropertyId =  $val;
	}

	public function setiOwnerId($val)
	{
		$this->_iOwnerId =  $val;
	}

	public function setiPropertytypeId($val)
	{
		$this->_iPropertytypeId =  $val;
	}

	public function setePropertyStatus($val)
	{
		$this->_ePropertyStatus =  $val;
	}

	public function seteSaleStatus($val)
	{
		$this->_eSaleStatus =  $val;
	}

	public function setdSoldDate($val)
	{
		$this->_dSoldDate =  $val;
	}

	public function setdOpenHouseStartTime($val)
	{
		$this->_dOpenHouseStartTime =  $val;
	}

	public function setdOpenHouseEndTime($val)
	{
		$this->_dOpenHouseEndTime =  $val;
	}

	public function setePets($val)
	{
		$this->_ePets =  $val;
	}

	public function setvReferenceNo($val)
	{
		$this->_vReferenceNo =  $val;
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

	public function setiZipcode($val)
	{
		$this->_iZipcode =  $val;
	}

	public function setfPrice($val)
	{
		$this->_fPrice =  $val;
	}

	public function setiCurrencyId($val)
	{
		$this->_iCurrencyId =  $val;
	}

	public function setvThumbImage($val)
	{
		$this->_vThumbImage =  $val;
	}

	public function setiNoOfRoom($val)
	{
		$this->_iNoOfRoom =  $val;
	}

	public function setiNoOfBathroom($val)
	{
		$this->_iNoOfBathroom =  $val;
	}

	public function setfLatitude($val)
	{
		$this->_fLatitude =  $val;
	}

	public function setfLongitude($val)
	{
		$this->_fLongitude =  $val;
	}

	public function setvYearBuilt($val)
	{
		$this->_vYearBuilt =  $val;
	}

	public function setfArea($val)
	{
		$this->_fArea =  $val;
	}

	public function setvDescription($val)
	{
		$this->_vDescription =  $val;
	}

	public function setdCreated($val)
	{
		$this->_dCreated =  $val;
	}

	public function setdModified($val)
	{
		$this->_dModified =  $val;
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
		$sql =  "SELECT * FROM property WHERE iPropertyId = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iPropertyId = $row[0]['iPropertyId'];
		$this->_iOwnerId = $row[0]['iOwnerId'];
		$this->_iPropertytypeId = $row[0]['iPropertytypeId'];
		$this->_ePropertyStatus = $row[0]['ePropertyStatus'];
		$this->_eSaleStatus = $row[0]['eSaleStatus'];
		$this->_dSoldDate = $row[0]['dSoldDate'];
		$this->_dOpenHouseStartTime = $row[0]['dOpenHouseStartTime'];
		$this->_dOpenHouseEndTime = $row[0]['dOpenHouseEndTime'];
		$this->_ePets = $row[0]['ePets'];
		$this->_vReferenceNo = $row[0]['vReferenceNo'];
		$this->_vAddress = $row[0]['vAddress'];
		$this->_iCountryId = $row[0]['iCountryId'];
		$this->_iStateId = $row[0]['iStateId'];
		$this->_iZipcode = $row[0]['iZipcode'];
		$this->_fPrice = $row[0]['fPrice'];
		$this->_iCurrencyId = $row[0]['iCurrencyId'];
		$this->_vThumbImage = $row[0]['vThumbImage'];
		$this->_iNoOfRoom = $row[0]['iNoOfRoom'];
		$this->_iNoOfBathroom = $row[0]['iNoOfBathroom'];
		$this->_fLatitude = $row[0]['fLatitude'];
		$this->_fLongitude = $row[0]['fLongitude'];
		$this->_vYearBuilt = $row[0]['vYearBuilt'];
		$this->_fArea = $row[0]['fArea'];
		$this->_vDescription = $row[0]['vDescription'];
		$this->_dCreated = $row[0]['dCreated'];
		$this->_dModified = $row[0]['dModified'];
		$this->_eStatus = $row[0]['eStatus'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM property WHERE iPropertyId = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iPropertyId = ""; // clear key for autoincrement

		$sql = "INSERT INTO property ( iOwnerId,iPropertytypeId,ePropertyStatus,eSaleStatus,dSoldDate,dOpenHouseStartTime,dOpenHouseEndTime,ePets,vReferenceNo,vAddress,iCountryId,iStateId,iZipcode,fPrice,iCurrencyId,vThumbImage,iNoOfRoom,iNoOfBathroom,fLatitude,fLongitude,vYearBuilt,fArea,vDescription,dCreated,dModified,eStatus ) VALUES ( '".$this->_iOwnerId."','".$this->_iPropertytypeId."','".$this->_ePropertyStatus."','".$this->_eSaleStatus."','".$this->_dSoldDate."','".$this->_dOpenHouseStartTime."','".$this->_dOpenHouseEndTime."','".$this->_ePets."','".$this->_vReferenceNo."','".$this->_vAddress."','".$this->_iCountryId."','".$this->_iStateId."','".$this->_iZipcode."','".$this->_fPrice."','".$this->_iCurrencyId."','".$this->_vThumbImage."','".$this->_iNoOfRoom."','".$this->_iNoOfBathroom."','".$this->_fLatitude."','".$this->_fLongitude."','".$this->_vYearBuilt."','".$this->_fArea."','".$this->_vDescription."','".$this->_dCreated."','".$this->_dModified."','".$this->_eStatus."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE property SET  iOwnerId = '".$this->_iOwnerId."' , iPropertytypeId = '".$this->_iPropertytypeId."' , ePropertyStatus = '".$this->_ePropertyStatus."' , eSaleStatus = '".$this->_eSaleStatus."' , dSoldDate = '".$this->_dSoldDate."' , dOpenHouseStartTime = '".$this->_dOpenHouseStartTime."' , dOpenHouseEndTime = '".$this->_dOpenHouseEndTime."' , ePets = '".$this->_ePets."' , vReferenceNo = '".$this->_vReferenceNo."' , vAddress = '".$this->_vAddress."' , iCountryId = '".$this->_iCountryId."' , iStateId = '".$this->_iStateId."' , iZipcode = '".$this->_iZipcode."' , fPrice = '".$this->_fPrice."' , iCurrencyId = '".$this->_iCurrencyId."' , vThumbImage = '".$this->_vThumbImage."' , iNoOfRoom = '".$this->_iNoOfRoom."' , iNoOfBathroom = '".$this->_iNoOfBathroom."' , fLatitude = '".$this->_fLatitude."' , fLongitude = '".$this->_fLongitude."' , vYearBuilt = '".$this->_vYearBuilt."' , fArea = '".$this->_fArea."' , vDescription = '".$this->_vDescription."' , dCreated = '".$this->_dCreated."' , dModified = '".$this->_dModified."' , eStatus = '".$this->_eStatus."'  WHERE iPropertyId = $id ";
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
