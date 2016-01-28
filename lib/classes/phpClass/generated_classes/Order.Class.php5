<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        Order
* GENERATION DATE:  15.04.2011
* CLASS FILE:       /home/mobile/iPhoneWS/Restaurant/hbpanel/lib/classes/phpClass/generated_classes/Order.Class.php5
* FOR MYSQL TABLE:  orders
* FOR MYSQL DB:     restaurant
* -------------------------------------------------------
*
*/

class Order
{


	/**
	*   @desc Variable Declaration with default value
	*/

	protected $iOrderId;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iOrderId;
	protected $_vOrderCode;
	protected $_iRestaurantId;
	protected $_eStatus;



	/**
	*   @desc   CONSTRUCTOR METHOD
	*/

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iOrderId = null;
		$this->_vOrderCode = null;
		$this->_iRestaurantId = null;
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


	public function getiOrderId()
	{
		return $this->_iOrderId;
	}

	public function getvOrderCode()
	{
		return $this->_vOrderCode;
	}

	public function getiRestaurantId()
	{
		return $this->_iRestaurantId;
	}

	public function geteStatus()
	{
		return $this->_eStatus;
	}


	/**
	*   @desc   SETTER METHODS
	*/


	public function setiOrderId($val)
	{
		$this->_iOrderId =  $val;
	}

	public function setvOrderCode($val)
	{
		$this->_vOrderCode =  $val;
	}

	public function setiRestaurantId($val)
	{
		$this->_iRestaurantId =  $val;
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
		$sql =  "SELECT * FROM orders WHERE iOrderId = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iOrderId = $row[0]['iOrderId'];
		$this->_vOrderCode = $row[0]['vOrderCode'];
		$this->_iRestaurantId = $row[0]['iRestaurantId'];
		$this->_eStatus = $row[0]['eStatus'];
	}


	/**
	*   @desc   DELETE
	*/

	function delete($id)
	{
		$sql = "DELETE FROM orders WHERE iOrderId = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	*   @desc   INSERT
	*/

	function insert()
	{
		$this->iOrderId = ""; // clear key for autoincrement

		$sql = "INSERT INTO orders ( vOrderCode,iRestaurantId,eStatus ) VALUES ( '".$this->_vOrderCode."','".$this->_iRestaurantId."','".$this->_eStatus."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	*   @desc   UPDATE
	*/

	function update($id)
	{

		$sql = " UPDATE orders SET  vOrderCode = '".$this->_vOrderCode."' , iRestaurantId = '".$this->_iRestaurantId."' , eStatus = '".$this->_eStatus."'  WHERE iOrderId = $id ";
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