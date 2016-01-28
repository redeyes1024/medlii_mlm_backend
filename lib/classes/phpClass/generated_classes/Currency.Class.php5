<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        Currency
* GENERATION DATE:  16.07.2011
* CLASS FILE:       /home/www/Occupy/hbpanel/lib/classes/phpClass/generated_classes/Currency.Class.php5
* FOR MYSQL TABLE:  currency
* FOR MYSQL DB:     occupy
* -------------------------------------------------------
*
*/

class Currency
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iCurrencyId;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iCurrencyId;
	protected $_vCurrencyName;
	protected $_vCode;
	protected $_eStatus;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iCurrencyId = null;
		$this->_vCurrencyName = null;
		$this->_vCode = null;
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


	public function getiCurrencyId()
	{
		return $this->_iCurrencyId;
	}

	public function getvCurrencyName()
	{
		return $this->_vCurrencyName;
	}

	public function getvCode()
	{
		return $this->_vCode;
	}

	public function geteStatus()
	{
		return $this->_eStatus;
	}


	/**
	 *   @desc   SETTER METHODS
	 */


	public function setiCurrencyId($val)
	{
		$this->_iCurrencyId =  $val;
	}

	public function setvCurrencyName($val)
	{
		$this->_vCurrencyName =  $val;
	}

	public function setvCode($val)
	{
		$this->_vCode =  $val;
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
		$sql =  "SELECT * FROM currency WHERE iCurrencyId = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iCurrencyId = $row[0]['iCurrencyId'];
		$this->_vCurrencyName = $row[0]['vCurrencyName'];
		$this->_vCode = $row[0]['vCode'];
		$this->_eStatus = $row[0]['eStatus'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM currency WHERE iCurrencyId = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iCurrencyId = ""; // clear key for autoincrement

		$sql = "INSERT INTO currency ( vCurrencyName,vCode,eStatus ) VALUES ( '".$this->_vCurrencyName."','".$this->_vCode."','".$this->_eStatus."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE currency SET  vCurrencyName = '".$this->_vCurrencyName."' , vCode = '".$this->_vCode."' , eStatus = '".$this->_eStatus."'  WHERE iCurrencyId = $id ";
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
