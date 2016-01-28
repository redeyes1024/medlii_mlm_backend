<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        OfferClient
* GENERATION DATE:  28.06.2011
* CLASS FILE:       /home/www/DealFinder/hbpanel/lib/classes/phpClass/generated_classes/OfferClient.Class.php5
* FOR MYSQL TABLE:  offer_client
* FOR MYSQL DB:     dealfinder
* -------------------------------------------------------
*
*/

class OfferClient
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iOfferClientId;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iOfferClientId;
	protected $_iOfferId;
	protected $_iClientId;
	protected $_iBidSeasts;
	protected $_vCheckInTime;
	protected $_dBidTime;
	protected $_eShow;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iOfferClientId = null;
		$this->_iOfferId = null;
		$this->_iClientId = null;
		$this->_iBidSeasts = null;
		$this->_vCheckInTime = null;
		$this->_dBidTime = null;
		$this->_eShow = null;
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


	public function getiOfferClientId()
	{
		return $this->_iOfferClientId;
	}

	public function getiOfferId()
	{
		return $this->_iOfferId;
	}

	public function getiClientId()
	{
		return $this->_iClientId;
	}

	public function getiBidSeasts()
	{
		return $this->_iBidSeasts;
	}

	public function getvCheckInTime()
	{
		return $this->_vCheckInTime;
	}

	public function getdBidTime()
	{
		return $this->_dBidTime;
	}

	public function geteShow()
	{
		return $this->_eShow;
	}


	/**
	 *   @desc   SETTER METHODS
	 */


	public function setiOfferClientId($val)
	{
		$this->_iOfferClientId =  $val;
	}

	public function setiOfferId($val)
	{
		$this->_iOfferId =  $val;
	}

	public function setiClientId($val)
	{
		$this->_iClientId =  $val;
	}

	public function setiBidSeasts($val)
	{
		$this->_iBidSeasts =  $val;
	}

	public function setvCheckInTime($val)
	{
		$this->_vCheckInTime =  $val;
	}

	public function setdBidTime($val)
	{
		$this->_dBidTime =  $val;
	}

	public function seteShow($val)
	{
		$this->_eShow =  $val;
	}


	/**
	 *   @desc   SELECT METHOD / LOAD
	 */

	function select($id)
	{
		$sql =  "SELECT * FROM offer_client WHERE iOfferClientId = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iOfferClientId = $row[0]['iOfferClientId'];
		$this->_iOfferId = $row[0]['iOfferId'];
		$this->_iClientId = $row[0]['iClientId'];
		$this->_iBidSeasts = $row[0]['iBidSeasts'];
		$this->_vCheckInTime = $row[0]['vCheckInTime'];
		$this->_dBidTime = $row[0]['dBidTime'];
		$this->_eShow = $row[0]['eShow'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM offer_client WHERE iOfferClientId = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iOfferClientId = ""; // clear key for autoincrement

		$sql = "INSERT INTO offer_client ( iOfferId,iClientId,iBidSeasts,vCheckInTime,dBidTime,eShow ) VALUES ( '".$this->_iOfferId."','".$this->_iClientId."','".$this->_iBidSeasts."','".$this->_vCheckInTime."','".$this->_dBidTime."','".$this->_eShow."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE offer_client SET  iOfferId = '".$this->_iOfferId."' , iClientId = '".$this->_iClientId."' , iBidSeasts = '".$this->_iBidSeasts."' , vCheckInTime = '".$this->_vCheckInTime."' , dBidTime = '".$this->_dBidTime."' , eShow = '".$this->_eShow."'  WHERE iOfferClientId = $id ";
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
