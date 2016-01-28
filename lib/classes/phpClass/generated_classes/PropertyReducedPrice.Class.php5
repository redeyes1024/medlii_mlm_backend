<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        PropertyReducedPrice
* GENERATION DATE:  18.07.2011
* CLASS FILE:       /home/www/Occupy/hbpanel/lib/classes/phpClass/generated_classes/PropertyReducedPrice.Class.php5
* FOR MYSQL TABLE:  propertyreducedprice
* FOR MYSQL DB:     occupy
* -------------------------------------------------------
*
*/

class PropertyReducedPrice
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iReducedId;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iReducedId;
	protected $_iPropertyId;
	protected $_dLastChange;
	protected $_fPreviousPrice;
	protected $_fNewPrice;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iReducedId = null;
		$this->_iPropertyId = null;
		$this->_dLastChange = null;
		$this->_fPreviousPrice = null;
		$this->_fNewPrice = null;
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


	public function getiReducedId()
	{
		return $this->_iReducedId;
	}

	public function getiPropertyId()
	{
		return $this->_iPropertyId;
	}

	public function getdLastChange()
	{
		return $this->_dLastChange;
	}

	public function getfPreviousPrice()
	{
		return $this->_fPreviousPrice;
	}

	public function getfNewPrice()
	{
		return $this->_fNewPrice;
	}


	/**
	 *   @desc   SETTER METHODS
	 */


	public function setiReducedId($val)
	{
		$this->_iReducedId =  $val;
	}

	public function setiPropertyId($val)
	{
		$this->_iPropertyId =  $val;
	}

	public function setdLastChange($val)
	{
		$this->_dLastChange =  $val;
	}

	public function setfPreviousPrice($val)
	{
		$this->_fPreviousPrice =  $val;
	}

	public function setfNewPrice($val)
	{
		$this->_fNewPrice =  $val;
	}


	/**
	 *   @desc   SELECT METHOD / LOAD
	 */

	function select($id)
	{
		$sql =  "SELECT * FROM propertyreducedprice WHERE iReducedId = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iReducedId = $row[0]['iReducedId'];
		$this->_iPropertyId = $row[0]['iPropertyId'];
		$this->_dLastChange = $row[0]['dLastChange'];
		$this->_fPreviousPrice = $row[0]['fPreviousPrice'];
		$this->_fNewPrice = $row[0]['fNewPrice'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM propertyreducedprice WHERE iReducedId = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iReducedId = ""; // clear key for autoincrement

		$sql = "INSERT INTO propertyreducedprice ( iPropertyId,dLastChange,fPreviousPrice,fNewPrice ) VALUES ( '".$this->_iPropertyId."','".$this->_dLastChange."','".$this->_fPreviousPrice."','".$this->_fNewPrice."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE propertyreducedprice SET  iPropertyId = '".$this->_iPropertyId."' , dLastChange = '".$this->_dLastChange."' , fPreviousPrice = '".$this->_fPreviousPrice."' , fNewPrice = '".$this->_fNewPrice."'  WHERE iReducedId = $id ";
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
