<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:         RestaurantMenu
* GENERATION DATE:  16.06.2011
* CLASS FILE:       /home/www/DealFinder/hbpanel/lib/classes/phpClass/generated_classes/ RestaurantMenu.Class.php5
* FOR MYSQL TABLE:  restaurant_menu
* FOR MYSQL DB:     dealfinder
* -------------------------------------------------------
*
*/

class  RestaurantMenu
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iMenuId;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iMenuId;
	protected $_iRestaurantId;
	protected $_vCourse;
	protected $_fPrice;
	protected $_eStatus;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iMenuId = null;
		$this->_iRestaurantId = null;
		$this->_vCourse = null;
		$this->_fPrice = null;
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


	public function getiMenuId()
	{
		return $this->_iMenuId;
	}

	public function getiRestaurantId()
	{
		return $this->_iRestaurantId;
	}

	public function getvCourse()
	{
		return $this->_vCourse;
	}

	public function getfPrice()
	{
		return $this->_fPrice;
	}

	public function geteStatus()
	{
		return $this->_eStatus;
	}


	/**
	 *   @desc   SETTER METHODS
	 */


	public function setiMenuId($val)
	{
		$this->_iMenuId =  $val;
	}

	public function setiRestaurantId($val)
	{
		$this->_iRestaurantId =  $val;
	}

	public function setvCourse($val)
	{
		$this->_vCourse =  $val;
	}

	public function setfPrice($val)
	{
		$this->_fPrice =  $val;
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
		$sql =  "SELECT * FROM restaurant_menu WHERE iMenuId = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iMenuId = $row[0]['iMenuId'];
		$this->_iRestaurantId = $row[0]['iRestaurantId'];
		$this->_vCourse = $row[0]['vCourse'];
		$this->_fPrice = $row[0]['fPrice'];
		$this->_eStatus = $row[0]['eStatus'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM restaurant_menu WHERE iMenuId = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iMenuId = ""; // clear key for autoincrement

		$sql = "INSERT INTO restaurant_menu ( iRestaurantId,vCourse,fPrice,eStatus ) VALUES ( '".$this->_iRestaurantId."','".$this->_vCourse."','".$this->_fPrice."','".$this->_eStatus."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE restaurant_menu SET  iRestaurantId = '".$this->_iRestaurantId."' , vCourse = '".$this->_vCourse."' , fPrice = '".$this->_fPrice."' , eStatus = '".$this->_eStatus."'  WHERE iMenuId = $id ";
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
