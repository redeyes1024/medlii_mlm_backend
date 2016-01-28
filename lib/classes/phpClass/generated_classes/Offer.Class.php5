<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        Offer
* GENERATION DATE:  16.06.2011
* CLASS FILE:       /home/www/DealFinder/hbpanel/lib/classes/phpClass/generated_classes/Offer.Class.php5
* FOR MYSQL TABLE:  offer
* FOR MYSQL DB:     dealfinder
* -------------------------------------------------------
*
*/

class Offer
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iOfferId;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iOfferId;
	protected $_iRestaurantId;
	protected $_vDiscount;
	protected $_dOfferDate;
	protected $_vCheckInStartTime;
	protected $_vCheckInEndTime;
	protected $_vCheckOutTime;
	protected $_iNoSeats;
	protected $_eOfferFor;
	protected $_eOpen;
	protected $_dCreated;
	protected $_eStatus;
	protected $_eIs_free;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iOfferId = null;
		$this->_iRestaurantId = null;
		$this->_vDiscount = null;
		$this->_dOfferDate = null;
		$this->_vCheckInStartTime = null;
		$this->_vCheckInEndTime = null;
		$this->_vCheckOutTime = null;
		$this->_iNoSeats = null;
		$this->_eOfferFor = null;
		$this->_eOpen = null;
		$this->_dCreated = null;
		$this->_eStatus = null;
		$this->_eIs_free = null;
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


	public function getiOfferId()
	{
		return $this->_iOfferId;
	}

	public function getiRestaurantId()
	{
		return $this->_iRestaurantId;
	}

	public function getvDiscount()
	{
		return $this->_vDiscount;
	}

	public function getdOfferDate()
	{
		return $this->_dOfferDate;
	}

	public function getvCheckInStartTime()
	{
		return $this->_vCheckInStartTime;
	}

	public function getvCheckInEndTime()
	{
		return $this->_vCheckInEndTime;
	}

	public function getvCheckOutTime()
	{
		return $this->_vCheckOutTime;
	}

	public function getiNoSeats()
	{
		return $this->_iNoSeats;
	}

	public function geteOfferFor()
	{
		return $this->_eOfferFor;
	}

	public function geteOpen()
	{
		return $this->_eOpen;
	}

	public function getdCreated()
	{
		return $this->_dCreated;
	}

	public function geteStatus()
	{
		return $this->_eStatus;
	}

	public function geteIs_free()
	{
		return $this->_eIs_free;
	}


	/**
	 *   @desc   SETTER METHODS
	 */


	public function setiOfferId($val)
	{
		$this->_iOfferId =  $val;
	}

	public function setiRestaurantId($val)
	{
		$this->_iRestaurantId =  $val;
	}

	public function setvDiscount($val)
	{
		$this->_vDiscount =  $val;
	}

	public function setdOfferDate($val)
	{
		$this->_dOfferDate =  $val;
	}

	public function setvCheckInStartTime($val)
	{
		$this->_vCheckInStartTime =  $val;
	}

	public function setvCheckInEndTime($val)
	{
		$this->_vCheckInEndTime =  $val;
	}

	public function setvCheckOutTime($val)
	{
		$this->_vCheckOutTime =  $val;
	}

	public function setiNoSeats($val)
	{
		$this->_iNoSeats =  $val;
	}

	public function seteOfferFor($val)
	{
		$this->_eOfferFor =  $val;
	}

	public function seteOpen($val)
	{
		$this->_eOpen =  $val;
	}

	public function setdCreated($val)
	{
		$this->_dCreated =  $val;
	}

	public function seteStatus($val)
	{
		$this->_eStatus =  $val;
	}

	public function seteIs_free($val)
	{
		$this->_eIs_free =  $val;
	}


	/**
	 *   @desc   SELECT METHOD / LOAD
	 */

	function select($id)
	{
		$sql =  "SELECT * FROM offer WHERE iOfferId = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iOfferId = $row[0]['iOfferId'];
		$this->_iRestaurantId = $row[0]['iRestaurantId'];
		$this->_vDiscount = $row[0]['vDiscount'];
		$this->_dOfferDate = $row[0]['dOfferDate'];
		$this->_vCheckInStartTime = $row[0]['vCheckInStartTime'];
		$this->_vCheckInEndTime = $row[0]['vCheckInEndTime'];
		$this->_vCheckOutTime = $row[0]['vCheckOutTime'];
		$this->_iNoSeats = $row[0]['iNoSeats'];
		$this->_eOfferFor = $row[0]['eOfferFor'];
		$this->_eOpen = $row[0]['eOpen'];
		$this->_dCreated = $row[0]['dCreated'];
		$this->_eStatus = $row[0]['eStatus'];
		$this->_eIs_free = $row[0]['eIs_free'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM offer WHERE iOfferId = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iOfferId = ""; // clear key for autoincrement

		$sql = "INSERT INTO offer ( iRestaurantId,vDiscount,dOfferDate,vCheckInStartTime,vCheckInEndTime,vCheckOutTime,iNoSeats,eOfferFor,eOpen,dCreated,eStatus,eIs_free ) VALUES ( '".$this->_iRestaurantId."','".$this->_vDiscount."','".$this->_dOfferDate."','".$this->_vCheckInStartTime."','".$this->_vCheckInEndTime."','".$this->_vCheckOutTime."','".$this->_iNoSeats."','".$this->_eOfferFor."','".$this->_eOpen."','".$this->_dCreated."','".$this->_eStatus."','".$this->_eIs_free."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE offer SET  iRestaurantId = '".$this->_iRestaurantId."' , vDiscount = '".$this->_vDiscount."' , dOfferDate = '".$this->_dOfferDate."' , vCheckInStartTime = '".$this->_vCheckInStartTime."' , vCheckInEndTime = '".$this->_vCheckInEndTime."' , vCheckOutTime = '".$this->_vCheckOutTime."' , iNoSeats = '".$this->_iNoSeats."' , eOfferFor = '".$this->_eOfferFor."' , eOpen = '".$this->_eOpen."' , dCreated = '".$this->_dCreated."' , eStatus = '".$this->_eStatus."' , eIs_free = '".$this->_eIs_free."'  WHERE iOfferId = $id ";
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
