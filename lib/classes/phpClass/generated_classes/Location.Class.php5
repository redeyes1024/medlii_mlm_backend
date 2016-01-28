<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        Location
* GENERATION DATE:  28.06.2011
* CLASS FILE:       /home/www/DealFinder/hbpanel/lib/classes/phpClass/generated_classes/Location.Class.php5
* FOR MYSQL TABLE:  client_location
* FOR MYSQL DB:     dealfinder
* -------------------------------------------------------
*
*/

class Location
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iLocationID;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iLocationID;
	protected $_iClientId;
	protected $_vLocationName;
	protected $_iCity;
	protected $_iStateId;
	protected $_iCountryId;
	protected $_vPostcode;
	protected $_vLatitude;
	protected $_vLongitude;
	protected $_eNotify;
	protected $_fDistance;
	protected $_eStatus;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iLocationID = null;
		$this->_iClientId = null;
		$this->_vLocationName = null;
		$this->_iCity = null;
		$this->_iStateId = null;
		$this->_iCountryId = null;
		$this->_vPostcode = null;
		$this->_vLatitude = null;
		$this->_vLongitude = null;
		$this->_eNotify = null;
		$this->_fDistance = null;
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


	public function getiLocationID()
	{
		return $this->_iLocationID;
	}

	public function getiClientId()
	{
		return $this->_iClientId;
	}

	public function getvLocationName()
	{
		return $this->_vLocationName;
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

	public function geteNotify()
	{
		return $this->_eNotify;
	}

	public function getfDistance()
	{
		return $this->_fDistance;
	}

	public function geteStatus()
	{
		return $this->_eStatus;
	}


	/**
	 *   @desc   SETTER METHODS
	 */


	public function setiLocationID($val)
	{
		$this->_iLocationID =  $val;
	}

	public function setiClientId($val)
	{
		$this->_iClientId =  $val;
	}

	public function setvLocationName($val)
	{
		$this->_vLocationName =  $val;
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

	public function seteNotify($val)
	{
		$this->_eNotify =  $val;
	}

	public function setfDistance($val)
	{
		$this->_fDistance =  $val;
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
		$sql =  "SELECT * FROM client_location WHERE iLocationID = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iLocationID = $row[0]['iLocationID'];
		$this->_iClientId = $row[0]['iClientId'];
		$this->_vLocationName = $row[0]['vLocationName'];
		$this->_iCity = $row[0]['iCity'];
		$this->_iStateId = $row[0]['iStateId'];
		$this->_iCountryId = $row[0]['iCountryId'];
		$this->_vPostcode = $row[0]['vPostcode'];
		$this->_vLatitude = $row[0]['vLatitude'];
		$this->_vLongitude = $row[0]['vLongitude'];
		$this->_eNotify = $row[0]['eNotify'];
		$this->_fDistance = $row[0]['fDistance'];
		$this->_eStatus = $row[0]['eStatus'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM client_location WHERE iLocationID = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iLocationID = ""; // clear key for autoincrement

		$sql = "INSERT INTO client_location ( iClientId,vLocationName,iCity,iStateId,iCountryId,vPostcode,vLatitude,vLongitude,eNotify,fDistance,eStatus ) VALUES ( '".$this->_iClientId."','".$this->_vLocationName."','".$this->_iCity."','".$this->_iStateId."','".$this->_iCountryId."','".$this->_vPostcode."','".$this->_vLatitude."','".$this->_vLongitude."','".$this->_eNotify."','".$this->_fDistance."','".$this->_eStatus."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE client_location SET  iClientId = '".$this->_iClientId."' , vLocationName = '".$this->_vLocationName."' , iCity = '".$this->_iCity."' , iStateId = '".$this->_iStateId."' , iCountryId = '".$this->_iCountryId."' , vPostcode = '".$this->_vPostcode."' , vLatitude = '".$this->_vLatitude."' , vLongitude = '".$this->_vLongitude."' , eNotify = '".$this->_eNotify."' , fDistance = '".$this->_fDistance."' , eStatus = '".$this->_eStatus."'  WHERE iLocationID = $id ";
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
