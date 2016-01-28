<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        Advertisement
* GENERATION DATE:  16.04.2011
* CLASS FILE:       /home/mobile/iPhoneWS/Restaurant/hbpanel/lib/classes/phpClass/generated_classes/Advertisement.Class.php5
* FOR MYSQL TABLE:  advertisement
* FOR MYSQL DB:     restaurant
* -------------------------------------------------------
*
*/

class Advertisement
{


	/**
	*   @desc Variable Declaration with default value
	*/

	protected $iAdvertisementId;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iAdvertisementId;
	protected $_iRestaurantId;
	protected $_vSmallImage;
	protected $_vLargeImage_bb;
	protected $_vLargeImage_ipad;
	protected $_vLargeImage_iphone;
	protected $_dStartDate;
	protected $_dEndDate;
	protected $_tDescription;
	protected $_eStatus;



	/**
	*   @desc   CONSTRUCTOR METHOD
	*/

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iAdvertisementId = null;
		$this->_iRestaurantId = null;
		$this->_vSmallImage = null;
		$this->_vLargeImage_bb = null;
		$this->_vLargeImage_ipad = null;
		$this->_vLargeImage_iphone = null;
		$this->_dStartDate = null;
		$this->_dEndDate = null;
		$this->_tDescription = null;
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


	public function getiAdvertisementId()
	{
		return $this->_iAdvertisementId;
	}

	public function getiRestaurantId()
	{
		return $this->_iRestaurantId;
	}

	public function getvSmallImage()
	{
		return $this->_vSmallImage;
	}

	public function getvLargeImage_bb()
	{
		return $this->_vLargeImage_bb;
	}

	public function getvLargeImage_ipad()
	{
		return $this->_vLargeImage_ipad;
	}

	public function getvLargeImage_iphone()
	{
		return $this->_vLargeImage_iphone;
	}

	public function getdStartDate()
	{
		return $this->_dStartDate;
	}

	public function getdEndDate()
	{
		return $this->_dEndDate;
	}

	public function gettDescription()
	{
		return $this->_tDescription;
	}

	public function geteStatus()
	{
		return $this->_eStatus;
	}


	/**
	*   @desc   SETTER METHODS
	*/


	public function setiAdvertisementId($val)
	{
		$this->_iAdvertisementId =  $val;
	}

	public function setiRestaurantId($val)
	{
		$this->_iRestaurantId =  $val;
	}

	public function setvSmallImage($val)
	{
		$this->_vSmallImage =  $val;
	}

	public function setvLargeImage_bb($val)
	{
		$this->_vLargeImage_bb =  $val;
	}

	public function setvLargeImage_ipad($val)
	{
		$this->_vLargeImage_ipad =  $val;
	}

	public function setvLargeImage_iphone($val)
	{
		$this->_vLargeImage_iphone =  $val;
	}

	public function setdStartDate($val)
	{
		$this->_dStartDate =  $val;
	}

	public function setdEndDate($val)
	{
		$this->_dEndDate =  $val;
	}

	public function settDescription($val)
	{
		$this->_tDescription =  $val;
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
		$sql =  "SELECT * FROM advertisement WHERE iAdvertisementId = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iAdvertisementId = $row[0]['iAdvertisementId'];
		$this->_iRestaurantId = $row[0]['iRestaurantId'];
		$this->_vSmallImage = $row[0]['vSmallImage'];
		$this->_vLargeImage_bb = $row[0]['vLargeImage_bb'];
		$this->_vLargeImage_ipad = $row[0]['vLargeImage_ipad'];
		$this->_vLargeImage_iphone = $row[0]['vLargeImage_iphone'];
		$this->_dStartDate = $row[0]['dStartDate'];
		$this->_dEndDate = $row[0]['dEndDate'];
		$this->_tDescription = $row[0]['tDescription'];
		$this->_eStatus = $row[0]['eStatus'];
	}


	/**
	*   @desc   DELETE
	*/

	function delete($id)
	{
		$sql = "DELETE FROM advertisement WHERE iAdvertisementId = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	*   @desc   INSERT
	*/

	function insert()
	{
		$this->iAdvertisementId = ""; // clear key for autoincrement

		$sql = "INSERT INTO advertisement ( iRestaurantId,vSmallImage,vLargeImage_bb,vLargeImage_ipad,vLargeImage_iphone,dStartDate,dEndDate,tDescription,eStatus ) VALUES ( '".$this->_iRestaurantId."','".$this->_vSmallImage."','".$this->_vLargeImage_bb."','".$this->_vLargeImage_ipad."','".$this->_vLargeImage_iphone."','".$this->_dStartDate."','".$this->_dEndDate."','".$this->_tDescription."','".$this->_eStatus."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	*   @desc   UPDATE
	*/

	function update($id)
	{

		$sql = " UPDATE advertisement SET  iRestaurantId = '".$this->_iRestaurantId."' , vSmallImage = '".$this->_vSmallImage."' , vLargeImage_bb = '".$this->_vLargeImage_bb."' , vLargeImage_ipad = '".$this->_vLargeImage_ipad."' , vLargeImage_iphone = '".$this->_vLargeImage_iphone."' , dStartDate = '".$this->_dStartDate."' , dEndDate = '".$this->_dEndDate."' , tDescription = '".$this->_tDescription."' , eStatus = '".$this->_eStatus."'  WHERE iAdvertisementId = $id ";
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