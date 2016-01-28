<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        favourite
* GENERATION DATE:  08.07.2011
* CLASS FILE:       /home/www/DealFinder/hbpanel/lib/classes/phpClass/generated_classes/favourite.Class.php5
* FOR MYSQL TABLE:  favorite
* FOR MYSQL DB:     dealfinder
* -------------------------------------------------------
*
*/

class favourite
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iFavoriteId;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iFavoriteId;
	protected $_iRestaurantId;
	protected $_iClientId;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iFavoriteId = null;
		$this->_iRestaurantId = null;
		$this->_iClientId = null;
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


	public function getiFavoriteId()
	{
		return $this->_iFavoriteId;
	}

	public function getiRestaurantId()
	{
		return $this->_iRestaurantId;
	}

	public function getiClientId()
	{
		return $this->_iClientId;
	}


	/**
	 *   @desc   SETTER METHODS
	 */


	public function setiFavoriteId($val)
	{
		$this->_iFavoriteId =  $val;
	}

	public function setiRestaurantId($val)
	{
		$this->_iRestaurantId =  $val;
	}

	public function setiClientId($val)
	{
		$this->_iClientId =  $val;
	}


	/**
	 *   @desc   SELECT METHOD / LOAD
	 */

	function select($id)
	{
		$sql =  "SELECT * FROM favorite WHERE iFavoriteId = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iFavoriteId = $row[0]['iFavoriteId'];
		$this->_iRestaurantId = $row[0]['iRestaurantId'];
		$this->_iClientId = $row[0]['iClientId'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM favorite WHERE iFavoriteId = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iFavoriteId = ""; // clear key for autoincrement

		$sql = "INSERT INTO favorite ( iRestaurantId,iClientId ) VALUES ( '".$this->_iRestaurantId."','".$this->_iClientId."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE favorite SET  iRestaurantId = '".$this->_iRestaurantId."' , iClientId = '".$this->_iClientId."'  WHERE iFavoriteId = $id ";
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
